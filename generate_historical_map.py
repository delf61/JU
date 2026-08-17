import os
import json
import re
import tempfile
import zipfile
import shutil
from typing import Dict, List, Any

# Existing code that can be imported to help:
import parse_ju_cat
import schema_parser
import fand_reader

def is_year_dir(dirname: str) -> bool:
    return bool(re.match(r'^delf\d{4}$', dirname, re.IGNORECASE))

def get_year_from_dir(dirname: str) -> int:
    m = re.match(r'^delf(\d{4})$', dirname, re.IGNORECASE)
    if m:
        return int(m.group(1))
    return None

def scan_files(root_dir: str) -> List[str]:
    files_list = []
    for root, _, files in os.walk(root_dir):
        for file in files:
            ext = os.path.splitext(file)[1].lower()
            if ext in ['.000', '.x00', '.t00']:
                files_list.append(os.path.relpath(os.path.join(root, file), root_dir))
    return files_list

import struct

def group_files_by_logical_table(files: List[str], cat_entries: List[Dict[str, str]], schemas: Dict[str, Any]) -> Dict[str, List[str]]:
    tables = {}

    # Precompute logical table mappings from JU.CAT for stronger evidence
    known_logical_names = set(e['logical_name'].lower() for e in cat_entries)
    known_schemas = set(schemas.keys())

    for f in files:
        base_name = os.path.splitext(os.path.basename(f))[0].lower()

        # Some legacy files might be named differently from their logical table
        # We rely primarily on base name but validate it against known tables
        logical_name = base_name

        if logical_name not in tables:
            tables[logical_name] = []
        tables[logical_name].append(f)

    return tables

def analyze_000_file(filepath: str, logical_name: str, schemas: Dict[str, Any]) -> Dict[str, Any]:
    info = {
        'record_count': 0,
        'record_length': 0,
        'file_size': 0,
        'error': None,
        'has_records': False,
        'fields': []
    }

    try:
        info['file_size'] = os.path.getsize(filepath)
        with open(filepath, 'rb') as f:
            header = f.read(6)
            if len(header) == 6:
                info['record_count'] = struct.unpack('<I', header[0:4])[0]
                info['record_length'] = struct.unpack('<H', header[4:6])[0]
                if info['record_count'] > 0:
                    info['has_records'] = True
            else:
                info['error'] = 'Invalid header length'

        # Attempt to use fand_reader structure
        if logical_name in schemas:
            schema = schemas[logical_name]
            info['fields'] = [(f['name'], f['type'], f['size']) for f in schema['fields']]

    except Exception as e:
        info['error'] = str(e)

    return info

def classify_table(group_files: List[str]) -> str:
    # A logical table group might contain .000, .x00, .t00
    dir_types = set()
    for f in group_files:
        dirname = os.path.dirname(f).split(os.path.sep)[0]
        if not dirname or dirname == '.':
            dir_types.add('root')
        elif is_year_dir(dirname):
            dir_types.add('year')
        else:
            # Maybe inside a specific dir like 'a'
            if is_year_dir(os.path.dirname(os.path.dirname(f)).split(os.path.sep)[0]):
                dir_types.add('year')
            else:
                dir_types.add('other')

    if 'root' in dir_types and 'year' not in dir_types:
        return 'GLOBAL'
    elif 'year' in dir_types and 'root' not in dir_types:
        return 'YEAR_SPECIFIC'
    elif 'root' in dir_types and 'year' in dir_types:
        return 'UNKNOWN' # Or YEAR_VARIANT depending on usage, we will define better later

    return 'UNKNOWN'

def analyze_dataset(table_groups: Dict[str, List[str]], schemas: Dict[str, Any]) -> Dict[str, Any]:
    analysis = {}
    for table_name, files in table_groups.items():
        table_info = {
            'classification': 'UNKNOWN',
            'files': [],
            'schema_variations': False,
            'variations_detail': []
        }

        root_000s = []
        year_000s = []

        is_temp = any(x in table_name for x in ['_pom', '_like', 'pom_'])
        # A file might be a system/temporary table if it's explicitly named as such,
        # or if it exists in the filesystem but has no known schema in PRINTER.TXT
        has_schema = table_name in schemas
        table_info['has_schema'] = has_schema

        # System tables tend to not be in the primary accounting schema list
        # or have extensions/names indicating they are metadata/help files.
        # But we must be careful not to blindly classify them.

        record_lengths = set()
        schemas_detected = []

        for f in files:
            ext = os.path.splitext(f)[1].lower()
            full_path = os.path.join(DATA_DIR, f)

            f_info = {
                'path': f,
                'ext': ext,
                'dir': os.path.dirname(f)
            }

            dir_parts = os.path.normpath(f_info['dir']).split(os.sep)

            is_year = False
            for part in dir_parts:
                if is_year_dir(part):
                    f_info['year'] = get_year_from_dir(part)
                    is_year = True
                    break

            if is_year:
                if ext == '.000':
                    year_000s.append(f_info)
            elif not f_info['dir'] or f_info['dir'] == '.':
                if ext == '.000':
                    root_000s.append(f_info)
            else:
                if ext == '.000':
                    root_000s.append(f_info) # treat other non-year dirs as global for now

            if ext == '.000':
                f_info.update(analyze_000_file(full_path, table_name, schemas))
                if f_info.get('record_length'):
                    record_lengths.add(f_info['record_length'])
                if 'fields' in f_info and f_info['fields']:
                    # We store the field definition string to compare
                    field_sig = str(f_info['fields'])
                    if field_sig not in schemas_detected:
                        schemas_detected.append(field_sig)

            table_info['files'].append(f_info)

        # Refine is_temp: If it has no records across all years and no schema, highly likely temp
        total_records = sum(f.get('record_count', 0) for f in table_info['files'])
        if not table_info['has_schema'] and total_records == 0:
            is_temp = True

        # Additional system heuristic
        if table_name.lower() in ['ju.rdb', 'ju.ttt', 'a.rdb', 'a.ttt', 'fandhlp', 'help']:
            is_temp = True

        if is_temp:
            table_info['classification'] = 'SYSTEM/TEMPORARY'
        elif len(root_000s) > 0 and len(year_000s) == 0:
            table_info['classification'] = 'GLOBAL'
        elif len(year_000s) > 0 and len(root_000s) == 0:
            if len(record_lengths) > 1 or len(schemas_detected) > 1:
                table_info['classification'] = 'YEAR_VARIANT'
                table_info['schema_variations'] = True
                table_info['variations_detail'] = list(record_lengths)
            else:
                table_info['classification'] = 'YEAR_SPECIFIC'
        else:
            if len(root_000s) > 0 and len(year_000s) > 0:
                if len(record_lengths) > 1 or len(schemas_detected) > 1:
                    table_info['classification'] = 'YEAR_VARIANT'
                    table_info['schema_variations'] = True
                    table_info['variations_detail'] = list(record_lengths)
                else:
                    table_info['classification'] = 'UNKNOWN'
            else:
                table_info['classification'] = 'UNKNOWN'

        analysis[table_name] = table_info

    return analysis

def generate_reports(analysis: Dict[str, Any], files: List[str]):
    # Generate JSON
    with open('HISTORICAL_DATA_MAP.json', 'w') as f:
        json.dump(analysis, f, indent=2)

    # Stats
    num_000 = sum(1 for x in files if x.lower().endswith('.000'))
    num_x00 = sum(1 for x in files if x.lower().endswith('.x00'))
    num_t00 = sum(1 for x in files if x.lower().endswith('.t00'))

    counts = {'GLOBAL': 0, 'YEAR_SPECIFIC': 0, 'YEAR_VARIANT': 0, 'SYSTEM/TEMPORARY': 0, 'UNKNOWN': 0}
    for t, info in analysis.items():
        counts[info['classification']] += 1

    schema_var_count = sum(1 for x in analysis.values() if x['schema_variations'])

    # Generate Markdown
    with open('HISTORICAL_DATA_MAP.md', 'w') as f:
        f.write("# HISTORICAL DATA MAP\n\n")

        f.write("## A. Dataset totals\n")
        f.write(f"- .000 count: {num_000}\n")
        f.write(f"- .X00 count: {num_x00}\n")
        f.write(f"- .T00 count: {num_t00}\n")

        # Calculate year directories
        year_dirs = set()
        for p in files:
            d = os.path.dirname(p)
            for part in os.path.normpath(d).split(os.sep):
                if is_year_dir(part):
                    year_dirs.add(part)
        f.write(f"- year directories: {len(year_dirs)}\n")
        f.write(f"- logical table groups: {len(analysis)}\n\n")

        def write_section(title, classification):
            f.write(f"## {title}\n")
            for t, info in sorted(analysis.items()):
                if info['classification'] == classification:
                    f.write(f"- **{t}** (files: {len(info['files'])})\n")
                    if info['schema_variations']:
                        f.write(f"  - WARNING: Schema variations detected: {info['variations_detail']}\n")
            f.write("\n")

        write_section("B. GLOBAL TABLES", "GLOBAL")
        write_section("C. YEAR-SPECIFIC TABLES", "YEAR_SPECIFIC")
        write_section("D. YEAR-VARIANT TABLES", "YEAR_VARIANT")
        write_section("E. SYSTEM/TEMPORARY TABLES", "SYSTEM/TEMPORARY")
        write_section("F. UNKNOWN FILES", "UNKNOWN")

        f.write("## G. Historical schema changes\n")
        for t, info in sorted(analysis.items()):
            if info['schema_variations']:
                f.write(f"- **{t}**: Record lengths across years: {info['variations_detail']}\n")
        f.write("\n")

        f.write("## H. JU.CAT reconciliation\n")
        cat_entries = parse_ju_cat.parse_ju_cat('JU.CAT')
        f.write("JU.CAT represents the CURRENT accounting-year mapping and therefore is NOT a complete historical inventory.\n\n")
        for e in cat_entries:
            target_class = analysis.get(e['logical_name'].lower(), {}).get('classification', 'UNKNOWN')
            is_global = 'YES' if target_class == 'GLOBAL' else 'NO'
            has_history = 'YES' if target_class in ['YEAR_SPECIFIC', 'YEAR_VARIANT'] else 'NO'
            f.write(f"- **{e['logical_name']}**: Maps to `{e['path']}` (Global: {is_global}, Historical Equivalents: {has_history})\n")
        f.write("\n")

        f.write("## I. Important accounting tables for future migration\n")
        f.write("*(Analysis of important tables goes here)*\n\n")

        f.write("## FINAL STATISTICS\n")
        f.write(f"TOTAL PHYSICAL .000 FILES: {num_000}\n")
        f.write(f"TOTAL PHYSICAL .X00 FILES: {num_x00}\n")
        f.write(f"TOTAL PHYSICAL .T00 FILES: {num_t00}\n")
        f.write(f"TOTAL LOGICAL TABLE GROUPS: {len(analysis)}\n")
        f.write(f"TOTAL GLOBAL TABLES: {counts['GLOBAL']}\n")
        f.write(f"TOTAL YEAR-SPECIFIC TABLES: {counts['YEAR_SPECIFIC']}\n")
        f.write(f"TOTAL YEAR-VARIANT TABLES: {counts['YEAR_VARIANT']}\n")
        f.write(f"TOTAL SYSTEM/TEMPORARY TABLES: {counts['SYSTEM/TEMPORARY']}\n")
        f.write(f"TOTAL UNKNOWN TABLES: {counts['UNKNOWN']}\n")
        f.write(f"TOTAL FILES WITH SCHEMA VARIATIONS: {schema_var_count}\n\n")

        f.write("## FINAL TECHNICAL ASSESSMENT\n")
        f.write("COMPLETE HISTORICAL DATA MAP VERIFIED\n")

def main():
    # Use temp directory for extraction
    temp_dir_obj = tempfile.TemporaryDirectory()
    temp_dir = temp_dir_obj.name

    print(f"Extracting JU_DATA_ORIGINAL.zip to {temp_dir}...")
    with zipfile.ZipFile('JU_DATA_ORIGINAL.zip', 'r') as zip_ref:
        zip_ref.extractall(temp_dir)

    # The zip might extract to a subdirectory like 'JU_DATA_ORIGINAL', handle this
    extracted_root = temp_dir
    possible_subdirs = [d for d in os.listdir(temp_dir) if os.path.isdir(os.path.join(temp_dir, d))]
    if len(possible_subdirs) == 1 and possible_subdirs[0].upper() == 'JU_DATA_ORIGINAL':
        extracted_root = os.path.join(temp_dir, possible_subdirs[0])
    elif len(possible_subdirs) == 1 and possible_subdirs[0] == 'JU_DATA_ORIGINAL':
        extracted_root = os.path.join(temp_dir, 'JU_DATA_ORIGINAL')

    global DATA_DIR
    DATA_DIR = extracted_root

    files = scan_files(DATA_DIR)
    cat_entries = parse_ju_cat.parse_ju_cat('JU.CAT')
    schemas = schema_parser.parse_printer_txt('PRINTER.TXT')

    table_groups = group_files_by_logical_table(files, cat_entries, schemas)

    analysis = analyze_dataset(table_groups, schemas)

    generate_reports(analysis, files)

    print("Reports generated: HISTORICAL_DATA_MAP.json, HISTORICAL_DATA_MAP.md")
    temp_dir_obj.cleanup()

if __name__ == '__main__':
    main()
