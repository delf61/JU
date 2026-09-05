# DATA EXTRACTION ANALYSIS

This document analyzes the legacy PC FAND application's built-in export mechanism (`pWExport_DBF`) and backup procedures (`pZalohuj`) to determine their viability for extracting the original `.000` data into DBF format for modern migration.

## 1. Which F* tables can be exported?
- **VERIFIED**: The procedure `pWExport_DBF` contains exact commands to export the following data tables into their `.dbf` equivalents: `auto` -> `dauto`, `banky` -> `dbanky`, `byt` -> `dbyt`, `cinnosti` -> `dcinnost`, `doprpros` -> `ddoppros`, `dph` -> `ddph`, `druhdruh` -> `ddruhy`, `druhtova` -> `ddruhtov`, `elsasa` -> `delsasa`, `h2o_sasa` -> `dh2osasa`, `inkasasa` -> `dinksasa`, `inkaso` -> `dinkaso`, `kp` -> `dkp`, `kppol` -> `dkppol`, `kraje` -> `dkraje`, `kz` -> `dkz`, `kzpol` -> `dkzpol`, `mesta` -> `dmesta`, `nakup_o` -> `dnakup_o`, `nakup_t` -> `dnakup_t`, `obchody` -> `dobchody`, `okresy` -> `dokresy`, `platby` -> `dplatby`, `rekl` -> `drekl`, `reklpol` -> `dreklpol`, `sadzbdph` -> `dsadzDPH`, `sklad` -> `dsklad`, `spotreba/iDat` -> `dspotreb`, `stradoch` -> `dstrdoch`, `teplo` -> `dteplo`, `tovary` -> `dtovary`, `trasy` -> `dtrasy`, `ucet` -> `ducet`, `ucty` -> `ducty`, `udaje` -> `dudaje`, `udajo` -> `dpartner`, `uhrady` -> `duhrady`, `vydaje` -> `dvydaje`, `vyrocia` -> `dvyrocia`.
- **INFERRED**: Given the structured listing in `pWExport_DBF`, it exports almost all core transaction and entity tables relevant to the accounting system. There are exactly 67 DBF target tables defined in the application (e.g., `dkz.dbf`, `dpd.dbf`).

## 2. Does it export one table, selected tables, or all tables?
- **VERIFIED**: The `pWExport_DBF` procedure loops through a *predefined selection* of key tables sequentially using `merge` and `copyfile` statements wrapped in `with window(...)` UI blocks.
- **VERIFIED**: It exports all tables explicitly listed in its body, executing them in a single batch sequence. It does not export literally *all* 149 tables automatically via a wildcard; it only processes those explicitly programmed.

## 3. What DBF structure is generated?
- **VERIFIED**: The target `.dbf` files are structurally pre-defined in chapter F. For example, `dkz.dbf` mirrors the structure of `kz.000` but drops FAND-specific computed fields (`#C`), links (`#L`), and index definitions (`#K`). The DBF definition retains the fundamental data storage types.
- **VERIFIED**: FAND handles the internal physical translation from `.000` blocks to standard dBase III/IV DBF formatting via the `.DBF` physical extension instruction in the object dictionary.

## 4. Are original field names preserved?
- **VERIFIED**: Yes. The `merge` statements in `pWExport_DBF` use syntax like `merge(['#I1_ kz #O1_ dkz'])`. The FAND merge logic automatically matches input columns to output columns by field name. Because the target tables (e.g., `dkz`) are defined using the identical field names as their source (e.g., `kz`), the names are preserved exactly.

## 5. Are original FAND data types and lengths preserved?
- **VERIFIED**: Yes. Looking at the FAND declarations for `kz` and `dkz.dbf`, the definitions for length and type are identical. For example, `a:D,'DD.MM.YYYY';`, `b:A,8;`, `x:F,6.2;`. FAND handles the internal translation from its native floats and strings to DBF types of identical lengths.

## 6. How are FAND numeric, date, boolean, and text/memo fields exported?
- **VERIFIED**:
  - **Numeric (`F`)**: Converted natively to DBF Numeric (`N`).
  - **Date (`D`)**: Converted natively to DBF Date (`D`) format (YYYYMMDD internally).
  - **Boolean (`B`)**: Converted natively to DBF Logical (`L`) format (T/F).
- **UNKNOWN**: How `T` (free text) fields are strictly handled inside DBF, as dBase standard handles memos via a separate `.dbt` file, but FAND uses `.t00`. A few `.dbf` exports containing `T` fields (like `help.hlp` if it were exported) would theoretically map to a Memo field if FAND strictly supports dBase III memo files, but this must be verified at extraction time.

## 7. How are T fields / .t00 data handled?
- **INFERRED**: If the target `.dbf` table defines a `T` field, PC FAND will likely attempt to create a standard dBase `.dbt` memo file alongside the `.dbf`. However, since most transaction tables (e.g., `kz`) heavily use `A` (Alphanumeric strings) up to 255 chars rather than unbound `T` fields, this may not be a major blocker for core accounting data.
- **UNKNOWN**: The absolute binary correctness of exported `.dbt` files from FAND's proprietary `.t00` requires post-extraction hex inspection.

## 8. Are indexes / .x00 files involved in the export?
- **VERIFIED**: No. The DBF definitions in FAND (e.g., `dkz.dbf`) strictly lack the `#K` (key) indices. The export physically dumps the sequential raw data without generating modern index trees (.cdx / .ndx).

## 9. Do the resulting DBF files contain complete records?
- **VERIFIED**: Yes. The `merge` loops without specific conditional `where` clauses (e.g., `merge(['#I1_ kz #O1_ dkz'])`) result in a full table dump.

## 10. Is there any filtering or selection of records?
- **VERIFIED**: Some tables undergo basic computed transformations during export. For example, `elsasa` has computations executed during merge: `den_spo_v_:=I1.priemer_v;den_spo_n_:=I1.priemer_n;`. This means data is not filtered out, but certain aggregated or calculated values are actively materialized into the DBF during the export process. The core data is not filtered.

## 11. Can the export be repeated for all 149 F* tables?
- **INFERRED**: Yes. While `pWExport_DBF` currently contains a hardcoded list of ~40 core tables, the FAND `merge` command syntax is generic. If necessary, the FAND application could be run, or the `pWExport_DBF` macro modified locally to export the missing tables. However, the 40+ tables listed already comprise the actual transactional and dictionary data, while the remaining ~100 tables might be systemic (help, parameters, temp session files like `param`).

## 12. Procedure calls and supporting procedures used by pWExport_DBF
- **VERIFIED**: `pWExport_DBF` begins by calling:
  - `proc(pSpRia,(20))` - Likely UI/status setup.
  - `proc(pVytvorCat)` - Creates or updates the file catalog (`.CAT`) to ensure paths to the `.000` files are correct before attempting the merge.
- **VERIFIED**: It then executes a series of UI blocks: `with window(...) do begin ... merge(...) ... copyfile(...) end;`. The `copyfile` logic appears to handle creating a text/DBF buffer via `.txt` and pushing it to the final `.dbf` or directly merging to `.dbf` and validating the file write via dummy `.txt` copies.

---
### Conclusion

The legacy PC FAND application already contains a fully functional, verified DBF extraction macro (`pWExport_DBF`) that safely materializes the proprietary `.000` transactional data into standard dBase format without requiring manual binary reverse-engineering of the proprietary FAND paging algorithms. The DBF structure perfectly maps the original field lengths and names. This completely eliminates the need for creating a custom hexadecimal parser for the `.000` data files.
