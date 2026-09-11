import gzip
import re

with gzip.open('migration_dump/ju_migration.sql_pk.gz', 'rt', encoding='utf-8') as f:
    for line in f:
        if 'L. L. Fox CZ' in line and '016/2026' in line:
            print(line.strip())
