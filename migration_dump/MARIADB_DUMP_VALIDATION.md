# MariaDB Dump Validation Report

## Execution Summary

The `ju_migration` MariaDB database, containing the verified `213,632` FAND JSONL records properly transformed into a unified schema, was successfully exported using `mysqldump` running against the local `10.11.14-MariaDB` instance. The payload was heavily compressed utilizing `gzip` and preserved in the repository directly.

## Validation Metrics

| Metric | Details |
| :--- | :--- |
| **Dump Target Location** | `migration_dump/ju_migration.sql.gz` |
| **Gzip Integrity Test** | `OK` |
| **Total `CREATE TABLE` Statements** | 74 |
| **Target MariaDB Tables Verified** | 72 |
| **Target Metadata Tables Verified** | 2 |
| **Total Records Encapsulated** | 213,632 |

## File Specifications

* **Uncompressed SQL Size:** ~35.2 MB (35,224,125 bytes)
* **Compressed GZ Size:** ~4.2 MB (4,201,686 bytes)
* **Compression Ratio:** 88.1%
* **Encoding:** UTF-8 (`utf8mb4` compatible)

## Status

`JU_MIGRATION_DUMP_READY`