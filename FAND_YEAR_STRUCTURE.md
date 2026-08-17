# FAND Year Structure

## JU.CAT Resolution
- `JU.CAT` is a binary catalog file with a 6-byte header and 107-byte fixed-length records.
- It maps the logical FAND table name (e.g., `den_prac`) to an absolute physical file path (e.g., `S:\FAND\JU\DELF2026\den_prac.000`).

## Year Directories
- Global tables (like `dph`, `banky`) reside in the root `JU/` directory.
- Year-specific tables (like `den_prac`, `kalendar`) reside in `DELFxxxx` subdirectories.
- The physical schema for tables remains stable across all year directories (e.g., `DEN_PRAC.000` has identical 472-byte record lengths in `Delf2005` and `DELF2025`).
- A programmatic reader can partition the migrated data securely by extracting the year directly from the `DELFxxxx` folder name during processing.
