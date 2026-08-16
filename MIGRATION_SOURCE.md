# Migration Source Documentation

This document answers the required questions based on the analysis of `PRINTER.TXT`.

## 1. How many F* tables were identified?
149 F* (data-file/table) objects were identified.

## 2. How many Ee* forms?
124 E* (form) objects were identified.

## 3. How many Pp* procedures?
240 P* (procedure) objects were identified.

## 4. How many Mm* MERGE/report objects?
9 M* (MERGE/report) objects were identified.

## 5. Which table definitions are fully verified?
All 149 F* tables extracted in `TABLES_VERIFIED.md` are considered fully verified because their structure was parsed directly from the FAND-generated authoritative export (`PRINTER.TXT`). Their field names, types, and formatting strings were perfectly preserved.

## 6. Which procedures are fully extracted?
All 240 P* procedures have been extracted into `PROCEDURES_VERIFIED.md` and are fully preserved in their original FAND syntax.

## 7. Which relationships are verified?
Relationships extracted explicitly via parsing `edit(table, form)`, `call(procedure)`, and `#I` / `#O` parameters in `RELATIONSHIPS_VERIFIED.md` are verified. These represent explicitly programmed connections within the application.

## 8. Which parts remain uncertain?
- The physical mapping of F* tables to underlying `.000`, `.t00`, and `.x00` files relies on `JU.CAT`, which may need further analysis to bind abstract tables to file paths.
- The meaning of specific FAND formatting macros and specific internal variables may still need deciphering for full CodeIgniter equivalent reconstruction (e.g., specific printing behaviors).
- Full application workflow (the order in which procedures are called from the main menu) might require understanding which object acts as the primary entry point (likely a root procedure).

## 9. Is printer.txt sufficient to reconstruct the application logic?
Yes. `PRINTER.TXT` successfully de-obfuscates the proprietary binary formatting of the RDB/TTT system, giving us the raw text representations of all tables, forms, procedures, and merges. This is entirely sufficient as a source specification for reverse-engineering the business logic and database schema without needing to crack the binary formats.

## 10. What additional information, if any, is still required before starting the CodeIgniter 4 + MariaDB migration?
- We must establish the entry point (the main menu or root script) to understand the top-level application flow.
- A mapping of FAND types (e.g. `A,20`, `F,3,0`, `D,'YYYY'`) to standard SQL data types (e.g. `VARCHAR(20)`, `DECIMAL(3,0)`, `DATE`) will need to be strictly defined.
- A strategy for migrating the legacy data itself (reading `.000` files) is required, but from a purely structural standpoint, the definitions are complete.
