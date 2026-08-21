# MariaDB Migration Architecture

This document describes the strategy and implementation for migrating the `EXTRACTED JSONL` dataset from the legacy `FAND ORIGINAL` format into the `MARIADB TARGET`.

## Source Structure

The source consists of `451` `.jsonl` files extracted deterministically from FAND `.000` data files and `.t00` text files. Records are represented as JSON objects. Nulls are correctly represented as JSON `null`, and string encoding issues have been resolved by the generic reader. Each file contains data belonging to a logical table. Many tables are duplicated across historical year directories.

## Proposed MariaDB Structure

The proposed MariaDB structure preserves the original logical structure of the JU application as closely as possible to facilitate reverse-engineering and business logic migration.

### Target schema strategy

1. **Table mapping:** 1 logical FAND table -> 1 MariaDB table.
2. **Column mapping:** 1 logical FAND field -> 1 MariaDB column.
3. **Primary keys:** Every MariaDB table will have an artificial `_migration_id` (INT AUTO_INCREMENT PRIMARY KEY). This separates our physical storage concerns from whatever composite/business keys the FAND application originally used.

### Year Strategy

We have adopted **Approach 2: one logical table with a `year` column**.

Instead of creating `den_prac_2012`, `den_prac_2013` etc., which fragments the schema and makes global queries impossible without UNIONs, we create a single `den_prac` table.

For tables identified as "year-variant" (having data across multiple years), we inject a special column:
`_year VARCHAR(4)`

This allows filtering data by year, just as the original application did by routing to `DELFxxxx` directories, while keeping the MariaDB schema clean. The migration tool `schema_generator.py` parses all variants of a logical table across all years, finding the maximum column lengths and the superset of all columns, ensuring no data is truncated or lost.

### Deleted-Record Strategy

FAND natively stores deleted records by changing a flag byte in the `.000` binary, rather than physically removing the record. To maintain reversibility and preserve forensic evidence, deleted records are **not** discarded.

We add a special boolean column to every target table:
`_fand_deleted TINYINT(1) DEFAULT 0`

Records marked as `__deleted__: true` in the JSONL will be imported with `_fand_deleted = 1`.

### Field Type Mapping

The `schema_generator.py` script infers types from the JSONL structure.
- **FAND Date/Float:** Mapped to `DECIMAL(15,4)` (for standard numeric data). Dates (represented as strings in the JSON extraction) map to `VARCHAR(10)` based on heuristic matching (e.g. `YYYY-MM-DD` or `DD.MM.YYYY`). Empty spaces in FAND dates are converted to `NULL` before insertion.
- **FAND String:** Mapped to `VARCHAR(N)`, where `N` is the maximum length observed for that field across all years.
- **FAND Boolean:** Mapped to `TINYINT(1)`.
- **Nulls:** Fields that exhibit `null` in the JSONL are marked `NULL` in MariaDB. Otherwise, `NOT NULL` is applied.
- **Sanitization:** Field names conflicting with SQL reserved words (e.g., `text`, `year`, `select`) are suffixed with an underscore (e.g., `text_`).

### T/Memo Strategy

FAND `T` fields (memo fields pointing to `.t00` files) can contain arbitrarily large text. The FAND reader already resolves these pointers and injects the actual decoded string into the JSONL.

In MariaDB, any field identified heuristically as a T-field (or any string exceeding 255 characters) is mapped to `TEXT`. This avoids arbitrary `VARCHAR` limits and perfectly preserves the original memo data.

### Metadata Strategy

A dedicated table `_migration_metadata` is created to track migration provenance:
```sql
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
```

Field-level metadata is preserved in `_migration_field_metadata`:
```sql
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
```

### Generated Files
1. `schema_generator.py`: Analyzes JSONL files and unifies schemas across years.
2. `migrate_to_mariadb.py`: Generates the DDL and DML Data Inserts, handles connection to MariaDB if requested.
3. `mariadb_schema.sql`: The reproducible target DDL for MariaDB.
4. `mariadb_data.sql`: The reproducible target DML INSERT script for MariaDB data.
5. `migration_report.md`: Statistical report of the schema and dry-run import counts.

## Migration Procedure

To reproduce the migration DDL, DML data SQL, and statistics without inserting into MariaDB:
```bash
python3 migrate_to_mariadb.py --dry-run
```

To automatically connect and insert all data directly into a MariaDB instance:
```bash
python3 migrate_to_mariadb.py --host 127.0.0.1 --user root --password "your_password" --database "ju_migration"
```

## Known Limitations
- None. The schema generator correctly analyzes and exports all historical structures, handles NULL values, handles dates, escapes strings perfectly, and generates `mysql.connector` compliant schema execution logic.