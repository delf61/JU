import json
import argparse
import sys
from fand_reader import FandReader

def export_table(table_name, year='2025'):
    reader = FandReader('/tmp/JU_DATA', year=year)

    try:
        res = reader.read_table(table_name)
    except Exception as e:
        print(f"Error reading table {table_name}: {e}", file=sys.stderr)
        sys.exit(1)

    # Serialize to JSON, ensuring datetime/special types are handled if any
    # Current reader returns standard Python types (str, int, float, bool, None)

    print(json.dumps(res['records'], ensure_ascii=False, indent=2))

if __name__ == '__main__':
    parser = argparse.ArgumentParser(description="Export FAND table to JSON")
    parser.add_argument("table", help="Logical table name")
    parser.add_argument("--year", default="2025", help="Year to resolve DELF folders")
    args = parser.parse_args()

    export_table(args.table, args.year)
