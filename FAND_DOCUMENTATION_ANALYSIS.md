# FAND DOCUMENTATION ANALYSIS

## 1. Executive Summary
The newly added FAND documentation files `fandhlp.000` and `fandhlp.t00` have been successfully decoded and analyzed. They contain the comprehensive help system for the PC FAND programming environment in Czech (CP852). This provides authoritative answers to many of our previous reverse-engineering hypotheses. Our previous structural analysis is mostly correct, but the documentation reveals several crucial operational details, especially regarding the `.000` deleted records flag, network locking (LAN), and data types (string/memo limits).

## 2. What `fandhlp.000/.t00` actually contain
- `fandhlp.000` is the metadata and index pointing into the help texts. It has 941 records of 39 bytes.
- `fandhlp.t00` contains the actual help text bodies in FAND's standard `.t00` memo format.
- The texts cover PC FAND commands, functions, database operations (CRUD), file formats, text editors, limits, types, and multi-user (LAN) locking mechanisms.
- **Classification**: VERIFIED BY BINARY DATA

## 3. Relevant FAND architecture
FAND programs are procedural. They manipulate data directly using commands like `readrec`, `writerec`, `deleterec`, `recallrec`, `appendrec`. They operate on standard local files or shared files on a LAN. The environment includes a text editor, report generator, and data entry forms. There is a distinction between physical record counts (`NRECSABS`) and valid record counts (`NRECS`).
- **Classification**: DOCUMENTED

## 4. `.000` format — documented facts
- **Record Count/Deletion**: The documentation states under "ŚDAJE O SOUBORU" that there is `NRECS` (count of valid records) and `NRECSABS` (count of physical records including deleted ones).
- For non-indexed tables, `NRECS = NRECSABS` (deleted records are physically removed).
- **CRITICAL CORRECTION**: For indexed tables, records are NOT physically deleted immediately; they are marked as deleted. The `DELETEREC` command marks them deleted, and `RECALLREC` can restore them. Physical deletion happens during reorganization (e.g. `indexfile(..., compress)` or MERGE).
- **Header Structure**: "sdílenś datovś soubor bude míti délku 6 byte - tj prefix." This confirms the `.000` header is exactly 6 bytes.
- **Classification**: DOCUMENTED
- **Negative Count Anomaly**: Regarding `FA FF FF FF` (-6). The documentation mentions "LAN - TECHNIKA BLOKOVĆNő SOUBORU" (LAN Locking techniques). It is highly likely that a negative value in the first 4 bytes is used as a semaphore/lock state or dirty flag when a file is open in shared mode, meaning the actual record count might be temporarily overlaid by a lock ID or counter.
- **Classification**: HYPOTHESIS

## 5. `.T00` format — documented facts
- The documentation "ZĆPIS A ÇTENő TEXTU ZE SOUBORU" mentions that `string` types can be up to 65,000 bytes and map to `T` (volnś text - free text) fields. "Od verze 4.1 v nłkterśch pęípadech pracuje i s texty aĹ 2GB." (Since version 4.1 it works with texts up to 2GB in some cases).
- The `.t00` stores these `T` fields.
- "volnś text (T)" format.
- **Classification**: DOCUMENTED

## 6. `.X00` format — documented facts
- "INDEXOVANŁ SOUBOR": Index support is denoted by `.X00`.
- Used to keep the file sorted, prevent duplicates, speed up deletions (by marking them instead of physical shifting).
- Our B-tree/prefix-compression analysis is not explicitly detailed in the user-level help, as this is an internal engine implementation detail.
- **Classification**: DOCUMENTED (purpose), HYPOTHESIS (internal mechanics, previously VERIFIED BY BINARY DATA)

## 7. JU.CAT and logical/physical tables
- "SOUBORY V KATALOGU": Mentions `JménoSouboru... Buâ fyzická cesta v apostrofech nebo název dle katalogu.`
- This maps logical names to physical paths.
- **Classification**: DOCUMENTED

## 8. Year directory mechanism
- This is a JU application-level design, not a FAND-level mechanism, but FAND's dynamic path resolution (via variables/catalogs) enables it.
- **Classification**: DERIVED FROM DOCUMENTATION

## 9. Database operations relevant to JU
- `DELETEREC`, `RECALLREC`, `APPENDREC`
- `INDEXFILE(Název, compress)` to physically remove deleted records.
- `GETTXT`, `PUTTXT` for memo fields.
- Formats `FIX` and `VAR` for text imports/exports.
- `COPYFILE` for backups.
- **Classification**: DOCUMENTED

## 10. MERGE and related operations
- Mentioned as causing physical reorganization (dropping deleted records).
- **Classification**: DOCUMENTED

## 11. Comparison with our previous reverse engineering
- **.000 Header (6 bytes)**: DOCUMENTED.
- **Deleted records flag**: DOCUMENTED. Only for indexed files!
- **T fields (Memo)**: DOCUMENTED.
- **.X00 Indexes**: DERIVED FROM DOCUMENTATION (B-Tree internal structure is not in the help).

## 12. Corrections to previous assumptions
- **Deletion Prefix**: The 1-byte deletion flag is NOT present on all tables, ONLY on indexed ones (those with a `.X00` file / own keys). "U neindexovanśch souborľ dojde k fyzickému zruĘení vłty v souboru... U indexovanśch souborľ se vłta pouze oznaçí jako neplatná"
- **Classification**: DOCUMENTED
- **Negative Record Counts**: Values like `FA FF FF FF` are not negative record counts, but likely LAN locking semaphores or dirty flags that FAND uses temporarily.
- **Classification**: HYPOTHESIS

## 13. Current confidence matrix
- .000 data format: High (DOCUMENTED)
- Deletion flags: High (DOCUMENTED - only for indexed tables)
- .T00 text format: High (DOCUMENTED)
- .X00 index format: High (VERIFIED BY BINARY DATA structurally, internal tree mechanics inferred)

## 14. Implications for `fand_reader.py`
- `fand_reader.py` MUST conditionally expect the 1-byte deletion prefix ONLY if the table is indexed (has an `.X00` file or declared keys). Our current reader might be incorrectly assuming it or handling it dynamically.
- The first 4 bytes of `.000` header: If it's negative (e.g. `FA FF FF FF`), we cannot trust it as a record count and must infer the physical record count from the file size (which the documentation says is `filesize`).

## 15. Implications for the eventual full extraction
- Full extraction can proceed with confidence in the data integrity, provided we handle the deletion flag correctly based on index presence, and figure out the `FA FF FF FF` header anomaly.

## 16. Explicit unresolved questions
- The exact mapping of the negative value (like -6) in the first 4 bytes of a `.000` file header to a specific LAN lock state. FAND documentation confirms network locking modes but does not explicitly document the byte-level semaphore structure.
- **Classification**: UNKNOWN

## Final Report Status
A. Documentation successfully decoded: YES
B. `fandhlp.000` analysed: YES
C. `fandhlp.t00` analysed: YES
D. `DEKLARACE SOUBORU - kapitola F.txt` analysed: YES
E. Previous `.000` conclusions confirmed: PARTIAL (correction on deletion flag required)
F. Previous `.T00` conclusions confirmed: YES
G. Previous `.X00` conclusions confirmed: PARTIAL (internal structure not documented, but purpose is)
H. Important corrections discovered: Deletion prefix exists ONLY on indexed files.
I. Changes required to `fand_reader.py`: Conditionally handle the deletion prefix based on index presence. Fallback to file size division when count is negative.
J. Full extraction should proceed now: NO (Need to fix reader logic for index/deletion prefix and negative counts first).
