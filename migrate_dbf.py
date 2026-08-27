import os
import glob
from dbfread import DBF
import json
import datetime
import zipfile
import subprocess

# SQL string escaping correctly for MariaDB
def escape_sql_string(val):
    if val is None:
        return "NULL"
    if isinstance(val, bool):
        return "1" if val else "0"
    if isinstance(val, (int, float)):
        return str(val)

    s = str(val)
    s = s.replace("\\", "\\\\")
    s = s.replace("'", "\\'")
    s = s.replace("\0", "\\0")
    s = s.replace("\n", "\\n")
    s = s.replace("\r", "\\r")
    s = s.replace("\x1a", "\\Z")
    return f"'{s}'"

def sanitize_identifier(name):
    name = name.lower()
    reserved_words = ["text", "year", "date", "time", "index", "order", "table", "select", "from", "where", "group", "by", "having", "desc", "asc"]
    if name in reserved_words:
        name = name + "_"
    return name

def main():
    if not os.path.exists("ju_dbf_data"):
        os.makedirs("ju_dbf_data")
        with zipfile.ZipFile("ju_dbf.zip", 'r') as zip_ref:
            zip_ref.extractall("ju_dbf_data")

    dbf_files = glob.glob("ju_dbf_data/**/*.DBF", recursive=True)
    if not dbf_files:
        dbf_files = glob.glob("ju_dbf_data/*.DBF")

    schema_statements = []
    data_statements = []

    schema_statements.append("SET NAMES utf8mb4;")
    schema_statements.append("SET FOREIGN_KEY_CHECKS = 0;")
    data_statements.append("SET NAMES utf8mb4;")
    data_statements.append("SET FOREIGN_KEY_CHECKS = 0;")

    report = "# DBF Migration Report\n\n"
    report += "| DBF File | MariaDB Table | DBF Record Count | Migrated Record Count | Match |\n"
    report += "|---|---|---|---|---|\n"

    for file_path in dbf_files:
        filename = os.path.basename(file_path)
        table_name = sanitize_identifier(os.path.splitext(filename)[0])
        print(f"Processing {filename} -> {table_name}")

        try:
            # We use cp852 for Slovak MS-DOS DBF encoding
            table = DBF(file_path, encoding='cp852', ignore_missing_memofile=True, raw=False)

            # Create schema
            columns = []
            for field in table.fields:
                col_name = sanitize_identifier(field.name)
                # Map DBF types to SQL types
                if field.type == 'C':
                    col_def = f"`{col_name}` VARCHAR({field.length})"
                elif field.type == 'N':
                    if field.decimal_count > 0:
                        col_def = f"`{col_name}` DECIMAL({field.length}, {field.decimal_count})"
                    else:
                        if field.length <= 4:
                            col_def = f"`{col_name}` SMALLINT"
                        elif field.length <= 9:
                            col_def = f"`{col_name}` INT"
                        else:
                            col_def = f"`{col_name}` BIGINT"
                elif field.type == 'F':
                    col_def = f"`{col_name}` DECIMAL({field.length}, {field.decimal_count})"
                elif field.type == 'D':
                    col_def = f"`{col_name}` DATE"
                elif field.type == 'L':
                    col_def = f"`{col_name}` TINYINT(1)"
                elif field.type == 'M':
                    col_def = f"`{col_name}` TEXT"
                else:
                    col_def = f"`{col_name}` VARCHAR({field.length})"

                columns.append(col_def)

            schema_stmt = f"DROP TABLE IF EXISTS `{table_name}`;\n"
            schema_stmt += f"CREATE TABLE `{table_name}` (\n  "
            schema_stmt += ",\n  ".join(columns)
            schema_stmt += "\n) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;"
            schema_statements.append(schema_stmt)

            # Insert data
            records = list(table)
            dbf_count = len(records)
            migrated_count = 0

            if records:
                col_names = [sanitize_identifier(f.name) for f in table.fields]
                col_names_str = ", ".join([f"`{c}`" for c in col_names])

                # Batch inserts
                batch_size = 1000
                for i in range(0, len(records), batch_size):
                    batch = records[i:i+batch_size]
                    values_list = []
                    for record in batch:
                        row_vals = []
                        for f in table.fields:
                            val = record.get(f.name)
                            if isinstance(val, str):
                                row_vals.append(escape_sql_string(val))
                            elif isinstance(val, datetime.date):
                                row_vals.append(f"'{val.strftime('%Y-%m-%d')}'")
                            elif val is None:
                                row_vals.append("NULL")
                            elif isinstance(val, bool):
                                row_vals.append("1" if val else "0")
                            else:
                                row_vals.append(str(val))

                        values_list.append(f"({', '.join(row_vals)})")
                        migrated_count += 1

                    if values_list:
                        insert_stmt = f"INSERT INTO `{table_name}` ({col_names_str}) VALUES\n"
                        insert_stmt += ",\n".join(values_list) + ";"
                        data_statements.append(insert_stmt)

            match = "Yes" if dbf_count == migrated_count else "No"
            report += f"| {filename} | {table_name} | {dbf_count} | {migrated_count} | {match} |\n"

        except Exception as e:
            print(f"Error processing {filename}: {e}")
            report += f"| {filename} | {table_name} | ERROR | ERROR | {e} |\n"

    schema_statements.append("SET FOREIGN_KEY_CHECKS = 1;")
    data_statements.append("SET FOREIGN_KEY_CHECKS = 1;")

    with open("dbf_schema.sql", "w", encoding="utf-8") as f:
        f.write("\n\n".join(schema_statements))

    with open("dbf_data.sql", "w", encoding="utf-8") as f:
        f.write("\n\n".join(data_statements))

    os.makedirs("migration_dump", exist_ok=True)
    with open("migration_dump/DBF_MIGRATION_REPORT.md", "w", encoding="utf-8") as f:
        f.write(report)

    print("Generating ju_migration.sql.gz...")
    with open("migration_dump/ju_migration.sql", "w", encoding="utf-8") as f:
        f.write("\n\n".join(schema_statements))
        f.write("\n\n")
        f.write("\n\n".join(data_statements))

    subprocess.run(["gzip", "-f", "migration_dump/ju_migration.sql"])
    print("Done generating SQL files from DBF and gzip.")

if __name__ == '__main__':
    main()
