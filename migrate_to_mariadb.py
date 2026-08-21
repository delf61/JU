import os
import json
import argparse
import sys
import glob
from schema_generator import generate_schema
import re

def sanitize_identifier(name):
    """Sanitize MariaDB identifiers (tables, columns)"""
    reserved = {"select", "insert", "update", "delete", "where", "group", "by", "order", "table", "index", "key", "year", "date", "text"}
    clean_name = name.lower().replace('.', '_').replace('-', '_')
    if clean_name in reserved:
        return f"{clean_name}_"
    return clean_name

def map_mariadb_type(field_info):
    """Map derived Python types to MariaDB types"""
    types = field_info['types']

    if field_info['is_t_field'] or field_info['max_length'] > 255:
        return "TEXT"

    if field_info.get('looks_like_date', False):
        return "VARCHAR(10)"

    if 'str' in types:
        max_len = field_info['max_length']
        if max_len == 0:
            return "VARCHAR(1)"
        if max_len <= 255:
            return f"VARCHAR({max_len})"
        else:
            return "TEXT"

    if 'float' in types:
        return "DECIMAL(15,4)"

    if 'int' in types:
        return "INT"

    if 'bool' in types:
        return "TINYINT(1)"

    return "VARCHAR(255)"

def escape_sql_string(val):
    """Escape a string for SQL INSERT safely"""
    if val is None:
        return "NULL"
    if isinstance(val, bool):
        return "1" if val else "0"
    if isinstance(val, (int, float)):
        return str(val)

    s = str(val)
    s = s.replace("'", "''")
    s = s.replace("\\", "\\\\")
    return f"'{s}'"

def generate_ddl(schema):
    """Generate MariaDB DDL for the unified schema and metadata"""
    ddl_statements = []

    ddl_statements.append("""
CREATE TABLE IF NOT EXISTS _migration_metadata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    table_name VARCHAR(100) NOT NULL,
    years_present VARCHAR(255),
    is_year_variant TINYINT(1),
    record_count INT,
    deleted_count INT,
    original_source_path VARCHAR(255),
    original_000_filename VARCHAR(255),
    indexed_status TINYINT(1),
    physical_record_length INT,
    migrated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS _migration_field_metadata (
    id INT AUTO_INCREMENT PRIMARY KEY,
    table_name VARCHAR(100) NOT NULL,
    mariadb_column VARCHAR(100) NOT NULL,
    original_fand_name VARCHAR(100) NOT NULL,
    original_fand_field_type VARCHAR(10) NOT NULL,
    original_string_size INT,
    inferred_type VARCHAR(50) NOT NULL,
    max_length INT,
    is_t_field TINYINT(1)
);
""")

    for table_name, table_info in sorted(schema.items()):
        clean_table_name = sanitize_identifier(table_name)

        create_stmt = f"CREATE TABLE IF NOT EXISTS `{clean_table_name}` (\n"
        create_stmt += "    `_migration_id` INT AUTO_INCREMENT PRIMARY KEY,\n"

        if table_info['is_year_variant']:
            create_stmt += "    `_year` VARCHAR(4) DEFAULT NULL,\n"

        create_stmt += "    `_fand_deleted` TINYINT(1) DEFAULT 0,\n"

        for field_name, field_info in table_info['fields'].items():
            clean_col_name = sanitize_identifier(field_name)
            col_type = map_mariadb_type(field_info)
            null_constraint = "NULL" if field_info['nullable'] else "NOT NULL"

            if len(field_info['types']) == 0:
                col_type = "VARCHAR(255)"
                null_constraint = "NULL"

            create_stmt += f"    `{clean_col_name}` {col_type} {null_constraint},\n"

        create_stmt = create_stmt.rstrip(",\n") + "\n);"
        ddl_statements.append(create_stmt)

    return "\n\n".join(ddl_statements)

def generate_dml(schema, data_dir, report_stats, output_file="mariadb_data.sql"):
    """Generate INSERT statements and populate data and metadata"""

    with open(output_file, 'w', encoding='utf-8') as f:
        for table_name, table_info in sorted(schema.items()):
            clean_table_name = sanitize_identifier(table_name)
            years_str = escape_sql_string(",".join(table_info['years']))
            is_variant = "1" if table_info['is_year_variant'] else "0"

            paths = ",".join(set([s['original_source_path'] for s in table_info.get('sources', []) if s['original_source_path']]))
            filenames = ",".join(set([s['original_000_filename'] for s in table_info.get('sources', []) if s['original_000_filename']]))
            indexed = "1" if any([s['indexed_status'] for s in table_info.get('sources', [])]) else "0"
            max_phys = max([s['physical_record_length'] for s in table_info.get('sources', [])] + [0])

            f.write(f"INSERT INTO _migration_metadata (table_name, years_present, is_year_variant, record_count, deleted_count, original_source_path, original_000_filename, indexed_status, physical_record_length) "
                                  f"VALUES ('{clean_table_name}', {years_str}, {is_variant}, {table_info['total_records']}, {table_info['deleted_records']}, {escape_sql_string(paths)}, {escape_sql_string(filenames)}, {indexed}, {max_phys});\n")

            for field_name, field_info in table_info['fields'].items():
                clean_col_name = sanitize_identifier(field_name)
                orig_name = escape_sql_string(field_info['original_name'])
                types_str = escape_sql_string(",".join(field_info['types']))
                is_t = "1" if field_info['is_t_field'] else "0"
                orig_type = escape_sql_string(field_info.get('original_fand_field_type', 'UNKNOWN'))
                orig_size = field_info.get('original_string_size', 0)

                f.write(f"INSERT INTO _migration_field_metadata (table_name, mariadb_column, original_fand_name, original_fand_field_type, original_string_size, inferred_type, max_length, is_t_field) "
                                      f"VALUES ('{clean_table_name}', '{clean_col_name}', {orig_name}, {orig_type}, {orig_size}, {types_str}, {field_info['max_length']}, {is_t});\n")

        filepaths = glob.glob(os.path.join(data_dir, "*.jsonl"))

        for filepath in filepaths:
            filename = os.path.basename(filepath)
            name_parts = filename.replace('.jsonl', '').rsplit('_', 1)
            if len(name_parts) == 2 and name_parts[1].isdigit():
                table_name = name_parts[0]
                year = name_parts[1]
            else:
                table_name = filename.replace('.jsonl', '')
                year = None

            clean_table_name = sanitize_identifier(table_name)
            table_schema = schema.get(table_name)
            if not table_schema:
                continue

            with open(filepath, 'r', encoding='utf-8') as json_f:
                for line in json_f:
                    if not line.strip():
                        continue
                    try:
                        record = json.loads(line.strip())
                        report_stats['total_imported'] += 1

                        cols = []
                        vals = []

                        if table_schema['is_year_variant']:
                            cols.append("`_year`")
                            vals.append(escape_sql_string(year))

                        is_deleted = record.get('__deleted__', False)
                        cols.append("`_fand_deleted`")
                        vals.append("1" if is_deleted else "0")
                        if is_deleted:
                            report_stats['total_deleted'] += 1

                        for key, val in record.items():
                            if key == '__deleted__':
                                continue

                            clean_col = sanitize_identifier(key)
                            cols.append(f"`{clean_col}`")

                            if table_schema['fields'][key].get('looks_like_date') and isinstance(val, str):
                                if "  .  ." in val or ".." in val:
                                    val = None

                            vals.append(escape_sql_string(val))

                            if val is None:
                                report_stats['total_nulls'] += 1

                        cols_str = ", ".join(cols)
                        vals_str = ", ".join(vals)

                        f.write(f"INSERT INTO `{clean_table_name}` ({cols_str}) VALUES ({vals_str});\n")

                    except Exception as e:
                        report_stats['total_failed'] += 1
                        report_stats['failed_details'].append(f"{filename}: {str(e)}")

def generate_report(schema, stats):
    """Generate migration statistics report"""
    total_files = sum(t['files_count'] for t in schema.values())

    report = f"""# MariaDB Migration Statistics Report

- **Number of source JSONL files**: {total_files}
- **Number of MariaDB tables**: {len(schema)}
- **Number of imported records**: {stats['total_imported']}
- **Number of skipped records**: {stats['total_skipped']}
- **Number of failed records**: {stats['total_failed']}
- **Number of NULL values**: {stats['total_nulls']}
- **Number of deleted FAND records**: {stats['total_deleted']}

## Errors
"""
    if stats['failed_details']:
        for detail in stats['failed_details'][:50]:
            report += f"- {detail}\n"
    else:
        report += "- None\n"

    report += "\n## Table-by-table record counts\n"
    for table_name, table_info in sorted(schema.items()):
        report += f"- `{table_name}`: {table_info['total_records']} records ({table_info['deleted_records']} deleted)\n"

    return report

def execute_sql_file(filepath, connection):
    """Execute a SQL file against a connection"""
    cursor = connection.cursor()
    with open(filepath, 'r', encoding='utf-8') as f:
        statement = ""
        for line in f:
            line = line.strip()
            if not line or line.startswith('--'):
                continue
            statement += line + " "
            if statement.endswith('; '):
                try:
                    cursor.execute(statement)
                except Exception as e:
                    print(f"Error executing statement: {e}")
                    print(statement[:100] + "...")
                statement = ""
    connection.commit()
    cursor.close()

def main():
    parser = argparse.ArgumentParser(description="Migrate FAND JSONL to MariaDB")
    parser.add_argument("--data-dir", default="full_extraction/data", help="Directory containing JSONL files")
    parser.add_argument("--manifest-path", default="full_extraction/FULL_EXTRACTION_MANIFEST.json", help="Path to manifest")
    parser.add_argument("--dry-run", action="store_true", help="Generate SQL without attempting to connect to MariaDB")

    # DB arguments
    parser.add_argument("--host", default="127.0.0.1", help="MariaDB host")
    parser.add_argument("--user", default="root", help="MariaDB user")
    parser.add_argument("--password", default="", help="MariaDB password")
    parser.add_argument("--database", default="ju_migration", help="MariaDB database")

    args = parser.parse_args()

    print("Analyzing schema...")
    schema = generate_schema(args.data_dir, args.manifest_path)

    print("Generating DDL...")
    ddl = generate_ddl(schema)
    with open("mariadb_schema.sql", "w", encoding="utf-8") as f:
        f.write(ddl)
    print("Saved schema to mariadb_schema.sql")

    print("Generating DML (INSERTs)...")
    stats = {
        'total_imported': 0,
        'total_skipped': 0,
        'total_failed': 0,
        'total_nulls': 0,
        'total_deleted': 0,
        'failed_details': []
    }

    generate_dml(schema, args.data_dir, stats, output_file="mariadb_data.sql")
    print("Saved data inserts to mariadb_data.sql")

    print("Generating report...")
    report = generate_report(schema, stats)
    with open("migration_report.md", "w", encoding="utf-8") as f:
        f.write(report)

    if not args.dry_run:
        print("Attempting to connect to MariaDB and execute scripts...")
        try:
            import mysql.connector
            conn = mysql.connector.connect(
                host=args.host,
                user=args.user,
                password=args.password
            )
            cursor = conn.cursor()
            cursor.execute(f"CREATE DATABASE IF NOT EXISTS {args.database}")
            cursor.execute(f"USE {args.database}")
            conn.commit()

            print("Executing schema...")
            execute_sql_file("mariadb_schema.sql", conn)

            print("Executing data inserts (this may take a while)...")
            execute_sql_file("mariadb_data.sql", conn)

            conn.close()
            print("Migration execution complete.")
        except Exception as e:
            print(f"Failed to execute against MariaDB: {e}")
            print("To retry later, run: mariadb < mariadb_schema.sql && mariadb < mariadb_data.sql")
    else:
        print("Dry-run complete. SQL scripts generated but not executed.")

if __name__ == "__main__":
    main()
