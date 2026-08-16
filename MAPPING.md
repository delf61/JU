# JU.RDB to JU.TTT mapping and JU.CAT analysis

## JU.RDB to JU.TTT

- **FACT**: `JU.RDB` contains 16-byte records. The object name (e.g., `FBanky.x`) starts at byte offset 5.
- **INFERENCE**: The first 4 bytes of each 16-byte record in `JU.RDB` likely represent a pointer/offset linking to the start of the source code block in `JU.TTT`.
- **UNKNOWN**: Attempting to treat the first 2 or 4 bytes as standard Little-Endian offsets yielded values like `682e706c` which point outside the bounds of the 1.1MB `JU.TTT` file, indicating PC FAND uses a proprietary encoding, paging system, or offset calculation.

## JU.CAT Analysis

The JU.CAT file maps logical FAND objects to physical files.

- **FACT**: Examples include:
  - `den_prac` -> `S:\FAND\JU\DELF2026\den_prac.000`
  - `param` -> `S:\FAND\JU\DELF2026\param.000`
  - `dph` -> `S:\FAND\JU\dph.000`
- **INFERENCE**: The path `S:\FAND\JU\DELF2026\` suggests the data is year-specific (year 2026 directory), while files located at `S:\FAND\JU\` are likely shared/common data across years.

## Migration relevance

This inventory maps out the scope of the legacy MS-DOS application. Because the exact business logic and table schemas are locked behind PC FAND's binary pointer format, a specialized PC FAND decompiler is necessary to extract the final `CREATE TABLE` and raw procedural logic to accurately write CodeIgniter 4 controllers and MariaDB schemas. What is documented here provides the architectural blueprint of what objects exist and their inferred purposes.
