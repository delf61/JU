import json
import os
import glob
from collections import defaultdict
import re

def looks_like_date(val_str):
    """Simple heuristic to check if a string looks like a date (e.g. YYYY-MM-DD or DD.MM.YYYY)"""
    if len(val_str) not in (10, 8):
        return False
    if re.match(r'^\d{4}-\d{2}-\d{2}$', val_str):
        return True
    if re.match(r'^\d{2}\.\d{2}\.\d{4}$', val_str):
        return True
    return False

def generate_schema(data_dir="full_extraction/data", manifest_path="full_extraction/FULL_EXTRACTION_MANIFEST.json"):
    """
    Analyzes JSONL files and manifest to return a unified schema representation,
    preserving original FAND field names for metadata mapping.
    """
    manifest = {}
    if os.path.exists(manifest_path):
        with open(manifest_path, 'r', encoding='utf-8') as f:
            manifest = json.load(f)

    # Build a lookup from JSONL filename to manifest entry to extract physical metadata
    jsonl_to_manifest = {}
    for source, info in manifest.items():
        if info.get("status") == "SUCCESS" and "output_jsonl_path" in info:
            base_jsonl = os.path.basename(info["output_jsonl_path"])
            jsonl_to_manifest[base_jsonl] = info

    tables = defaultdict(lambda: {
        'years': set(),
        'fields': defaultdict(lambda: {
            'types': set(),
            'max_length': 0,
            'nullable': False,
            'is_t_field': False,
            'original_name': '',
            'looks_like_date': True # Assume true until proven false by a string
        }),
        'total_records': 0,
        'deleted_records': 0,
        'files_count': 0,
        'sources': []
    })

    filepaths = glob.glob(os.path.join(data_dir, "*.jsonl"))

    for filepath in filepaths:
        filename = os.path.basename(filepath)
        manifest_info = jsonl_to_manifest.get(filename, {})

        name_parts = filename.replace('.jsonl', '').rsplit('_', 1)
        if len(name_parts) == 2 and name_parts[1].isdigit():
            table_name = name_parts[0]
            year = name_parts[1]
        else:
            table_name = filename.replace('.jsonl', '')
            year = "GLOBAL"

        tables[table_name]['sources'].append({
            'jsonl': filename,
            'original_source_path': manifest_info.get("source_path", ""),
            'original_000_filename': os.path.basename(manifest_info.get("source_path", "")) if manifest_info.get("source_path") else "",
            'indexed_status': manifest_info.get("is_indexed", False),
            'physical_record_length': manifest_info.get("record_count", 0),
            'year': year
        })

        with open(filepath, 'r', encoding='utf-8') as f:
            for line in f:
                if not line.strip():
                    continue
                try:
                    record = json.loads(line.strip())
                    tables[table_name]['total_records'] += 1

                    if record.get('__deleted__'):
                        tables[table_name]['deleted_records'] += 1

                    for key, value in record.items():
                        if key == '__deleted__':
                            continue

                        field_info = tables[table_name]['fields'][key]
                        field_info['original_name'] = key # Preserve original name exactly

                        if value is None:
                            field_info['nullable'] = True
                        elif isinstance(value, str):
                            field_info['types'].add('str')
                            field_info['max_length'] = max(field_info['max_length'], len(value))
                            if not looks_like_date(value):
                                field_info['looks_like_date'] = False
                        elif isinstance(value, bool):
                            field_info['types'].add('bool')
                            field_info['looks_like_date'] = False
                        elif isinstance(value, int):
                            field_info['types'].add('int')
                            field_info['looks_like_date'] = False
                        elif isinstance(value, float):
                            field_info['types'].add('float')
                            field_info['looks_like_date'] = False
                        else:
                            field_info['types'].add(type(value).__name__)
                            field_info['looks_like_date'] = False
                except json.JSONDecodeError:
                    pass

        tables[table_name]['years'].add(year)
        tables[table_name]['files_count'] += 1

    final_schema = {}
    for table_name, table_data in tables.items():
        is_year_variant = len([y for y in table_data['years'] if y != "GLOBAL"]) > 0

        fields = {}
        for field_name, field_data in table_data['fields'].items():
            types_list = list(field_data['types'])

            inferred_fand_type = "UNKNOWN"
            if 'str' in types_list:
                inferred_fand_type = "A" if field_data['max_length'] <= 255 else "T"
            elif 'float' in types_list or 'int' in types_list:
                inferred_fand_type = "F"
            elif 'bool' in types_list:
                inferred_fand_type = "B"

            fields[field_name] = {
                'original_name': field_data['original_name'],
                'types': types_list,
                'max_length': field_data['max_length'],
                'nullable': field_data['nullable'],
                'looks_like_date': field_data['looks_like_date'] and 'str' in types_list and field_data['max_length'] > 0,
                'original_fand_field_type': inferred_fand_type,
                'original_string_size': field_data['max_length'] if inferred_fand_type in ("A", "T") else 0
            }
            if 'str' in field_data['types'] and field_data['max_length'] > 255:
                fields[field_name]['is_t_field'] = True
            else:
                fields[field_name]['is_t_field'] = False

        final_schema[table_name] = {
            'is_year_variant': is_year_variant,
            'years': list(table_data['years']),
            'fields': fields,
            'total_records': table_data['total_records'],
            'deleted_records': table_data['deleted_records'],
            'files_count': table_data['files_count'],
            'sources': table_data['sources']
        }

    return final_schema

if __name__ == "__main__":
    schema = generate_schema()
    with open("schema_analysis.json", "w", encoding="utf-8") as f:
        json.dump(schema, f, indent=2)
    print(f"Generated schema for {len(schema)} tables.")
