import re
import gzip

with gzip.open("migration_dump/ju_migration.sql_pk.gz", "rt", encoding="utf-8") as f:
    lines = f.readlines()

for table in ['kp']:
    print(f"=== {table} ===")
    in_table = False
    for line in lines:
        if line.startswith(f"CREATE TABLE `{table}`"):
            in_table = True
        if in_table:
            print(line.strip())
            if ") ENGINE=" in line:
                break
