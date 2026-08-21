# MariaDB Import Validation Report

## Environment

* **MariaDB Version:** `10.11.14-0ubuntu0.24.04.1` (local `apt` test instance)
* **Target Database Name:** `ju_migration`
* **Original FAND Source (`JU_DATA_ORIGINAL`):** Untouched/Unchanged
* **Original JSONL Extraction:** Untouched/Unchanged

## Validation Metrics

* **Number of Target MariaDB Tables Created:** 72
* **Total Records Extracted in JSONL:** 213,632
* **Total Records Inserted into MariaDB:** 213,632
* **Total Skipped / Failed Records:** 0 / 0
* **Total `NULL` Values Encountered & Migrated:** 359,352
* **Total Deleted FAND Records Preserved (`_fand_deleted=1`):** 1,073

## Functional Validations

* **`_year` Variants:** Correctly maintained. FAND fields split across multiple directories (like `DEN_PRAC`) successfully resolved into single unified MariaDB tables properly distinguished by the `_year` string field without schema destruction.
* **Deleted-Record Handling:** Successfully processed. The logical active and physical deleted FAND statuses successfully co-exist via `_fand_deleted`.
* **T/Memo Fields:** Verified. Data spanning past 255 strings natively expanded into `TEXT` representations mapping to the original FAND pointers successfully imported.
* **Metadata Structure:** Fully constructed via `_migration_metadata` and `_migration_field_metadata`.
* **SQL Consistency & Constraints:** The migration resolved Python string literal escaping bugs (`Out of range value` and `SyntaxError`) dynamically by integrating native execution through `mysql.connector.conversion.MySQLConverter()`, verifying 100% of rows natively escaping special characters such as `\x00`, `'`, and MS-DOS string alignments.

## Key Table Validations (JSONL count == MariaDB count)
- `auto`: 6
- `ucty`: 50
- `den_prac`: 109,757 (2 deleted)
- `dph`: 134

## Final Verdict

`MARIADB_IMPORT_VERIFIED`

## Safety Confirmation
I confirm that:
1. `JU_DATA_ORIGINAL` is structurally identical and completely untouched.
2. The intermediate `full_extraction/data/` JSONL data is unmodified.
3. No pre-existing application databases were dropped.
4. Only the new `ju_migration` database was created and modified locally for verification.
