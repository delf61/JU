import argparse
import os
import json
import traceback
import sys
from fand_reader import FandReader

def get_target_tables():
    if not os.path.exists("HISTORICAL_DATA_MAP.json"):
        print("ERROR: HISTORICAL_DATA_MAP.json not found.")
        sys.exit(1)

    with open("HISTORICAL_DATA_MAP.json", "r", encoding="utf-8") as f:
        data_map = json.load(f)

    targets = []

    for table_name, table_info in data_map.items():
        if not table_info.get("has_schema", False):
            continue

        for f in table_info.get("files", []):
            path = f.get("path")
            ext = f.get("ext")
            if ext == ".000":
                year = None
                path_parts = path.replace('\\', '/').split('/')
                for p in path_parts:
                    if p.upper().startswith("DELF") and len(p) == 8:
                        year = p[4:]

                targets.append({
                    "table": table_name,
                    "year": year,
                    "path": path
                })

    # Sort deterministically by path
    targets.sort(key=lambda x: x["path"].lower())
    return targets

def ensure_manifest_exists(manifest_path):
    if not os.path.exists(manifest_path):
        os.makedirs(os.path.dirname(manifest_path), exist_ok=True)
        with open(manifest_path, "w", encoding="utf-8") as f:
            json.dump({}, f, indent=2)

def load_manifest(manifest_path):
    if os.path.exists(manifest_path):
        with open(manifest_path, "r", encoding="utf-8") as f:
            try:
                return json.load(f)
            except:
                return {}
    return {}

def save_manifest(manifest_path, manifest):
    os.makedirs(os.path.dirname(manifest_path), exist_ok=True)
    with open(manifest_path, "w", encoding="utf-8") as f:
        json.dump(manifest, f, indent=2)

def main():
    parser = argparse.ArgumentParser(description="Extract FAND .000 files")
    parser.add_argument("--limit", type=int, default=None, help="Max number of files to process")
    parser.add_argument("--offset", type=int, default=0, help="Offset into the file list")
    args = parser.parse_args()

    manifest_path = "full_extraction/FULL_EXTRACTION_MANIFEST.json"
    data_dir = "full_extraction/data"
    os.makedirs(data_dir, exist_ok=True)

    ensure_manifest_exists(manifest_path)
    manifest = load_manifest(manifest_path)

    targets = get_target_tables()

    start_idx = args.offset
    end_idx = start_idx + args.limit if args.limit is not None else len(targets)

    selected_targets = targets[start_idx:end_idx]

    processed_count = 0
    success_count = 0
    error_count = 0
    skipped_count = 0
    total_records = 0
    empty_files = 0
    records_files = 0
    errors_list = []
    skipped_list = []

    for target in selected_targets:
        t_name = target["table"]
        t_year = target["year"]
        t_path = target["path"]

        manifest_key = t_path.replace("\\", "/")

        if manifest_key in manifest:
            status = manifest[manifest_key].get("status")
            if status in ["SUCCESS", "SKIPPED"]:
                print(f"Skipping {t_path} - already processed ({status})")
                skipped_count += 1
                skipped_list.append({"path": t_path, "reason": f"Already processed: {status}"})
                processed_count += 1
                continue

        manifest[manifest_key] = {
            "status": "ERROR",
            "error": "Interrupted",
            "table": t_name,
            "year": t_year,
            "source_path": t_path
        }

        print(f"Processing: {t_path} (Table: {t_name}, Year: {t_year})")

        try:
            reader = FandReader("JU_DATA_ORIGINAL", year=t_year)
            # Override mapping to directly use the exact physical path from HISTORICAL_DATA_MAP
            # Since FandReader tries to find file based on catalog or just in base dir,
            # and HISTORICAL_DATA_MAP lists paths relative to JU_DATA_ORIGINAL.
            # So we set it up to find it.
            # Using the protected _parse_000 is safer to force the exact file and schema without logic loop.
            import schema_parser
            schemas = schema_parser.parse_printer_txt("PRINTER.TXT")
            if t_name not in schemas:
                raise ValueError(f"Schema not found for {t_name}")

            full_path = os.path.join("JU_DATA_ORIGINAL", t_path)
            if not os.path.exists(full_path):
                # Try case insensitive match if necessary
                def find_ci_path(base, rel):
                    parts = rel.replace('\\', '/').split('/')
                    curr = base
                    for part in parts:
                        if not os.path.exists(curr): return None
                        found = False
                        for entry in os.listdir(curr):
                            if entry.lower() == part.lower():
                                curr = os.path.join(curr, entry)
                                found = True
                                break
                        if not found: return None
                    return curr

                full_path = find_ci_path("JU_DATA_ORIGINAL", t_path)
                if not full_path or not os.path.exists(full_path):
                    raise FileNotFoundError(f"File not found: {t_path}")

            res = reader._parse_000(full_path, schemas[t_name])
            records = res["records"]

            json_records = []
            for r in records:
                j = json.dumps(r)
                json_records.append(j)

            out_filename = f"{t_name}_{t_year}.jsonl" if t_year else f"{t_name}.jsonl"
            out_path = os.path.join(data_dir, out_filename)

            # ensure file is empty before writing
            with open(out_path, "w", encoding="utf-8") as f:
                pass

            with open(out_path, "a", encoding="utf-8") as f:
                for j in json_records:
                    f.write(j + "\n")

            active = sum(1 for r in records if not r.get("__deleted__", False))
            deleted = len(records) - active

            is_indexed = res.get("x00_path") is not None

            manifest[manifest_key] = {
                "status": "SUCCESS",
                "table": t_name,
                "year": t_year,
                "source_path": t_path,
                "output_jsonl_path": out_path,
                "record_count": active,
                "physical_record_count": len(records),
                "deleted_record_count": deleted,
                "is_indexed": is_indexed
            }

            success_count += 1
            total_records += len(records)
            if len(records) == 0:
                empty_files += 1
            else:
                records_files += 1

        except Exception as e:
            err_msg = f"{type(e).__name__}: {str(e)}"
            print(f"  ERROR: {err_msg}")

            manifest[manifest_key] = {
                "status": "ERROR",
                "table": t_name,
                "year": t_year,
                "source_path": t_path,
                "error": err_msg,
                "traceback": traceback.format_exc()
            }
            error_count += 1
            errors_list.append({"path": t_path, "table": t_name, "year": t_year, "error": err_msg})

        save_manifest(manifest_path, manifest)
        processed_count += 1

    report = f"""# Controlled Extraction Batch Report

## Summary
- **Total Selected**: {len(selected_targets)}
- **Processed in this run**: {processed_count}
- **SUCCESS**: {success_count}
- **ERROR**: {error_count}
- **SKIPPED**: {skipped_count}
- **Total Records Extracted (Physical)**: {total_records}
- **JSONL Files with Records**: {records_files}
- **Empty JSONL Files**: {empty_files}

## Indexed vs Non-Indexed
- **Indexed**: {sum(1 for v in manifest.values() if v.get("status") == "SUCCESS" and v.get("is_indexed") == True)}
- **Non-Indexed**: {sum(1 for v in manifest.values() if v.get("status") == "SUCCESS" and v.get("is_indexed") == False)}

## Errors
"""
    if errors_list:
        for err in errors_list:
            report += f"- `{err['path']}` (Table: {err['table']}, Year: {err['year']}): {err['error']}\n"
    else:
        report += "- None\n"

    report += "\n## Skipped\n"
    if skipped_list:
        for skip in skipped_list:
            report += f"- `{skip['path']}`: {skip['reason']}\n"
    else:
        report += "- None\n"

    with open("full_extraction/BATCH_REPORT.md", "w", encoding="utf-8") as f:
        f.write(report)

    print("\n--- BATCH COMPLETE ---")
    print(f"SUCCESS: {success_count}, ERROR: {error_count}, SKIPPED: {skipped_count}")

if __name__ == "__main__":
    main()
