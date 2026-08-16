# Dependency and relationship analysis

## 1. Explicitly Identifiable Relationships

- **FACT**: `JU.CAT` maps logical file names to physical `.000` data files on the disk (e.g. `den_prac -> S:\FAND\JU\DELF2026\den_prac.000`).

## 2. Inferred Relationships based on Naming Conventions

- **INFERRED**: Forms (`Ee*`) are directly linked to Tables (`F*`) with the same suffix. Example: `EeBanky` -> `FBanky.x`, `EeMesto` -> `FMesta.x`.
- **INFERRED**: Table suffix `.x` indicates the presence of an Index file `.x00` associated with the data file `.000`.
- **UNKNOWN**: The specific Tables read or modified by each `Pp*` Procedure cannot be definitively mapped without a decompiler tool capable of parsing the `.TTT` block structures, as the text references are not grouped in isolatable code blocks.

## Migration relevance

This inventory maps out the scope of the legacy MS-DOS application. Because the exact business logic and table schemas are locked behind PC FAND's binary pointer format, a specialized PC FAND decompiler is necessary to extract the final `CREATE TABLE` and raw procedural logic to accurately write CodeIgniter 4 controllers and MariaDB schemas. What is documented here provides the architectural blueprint of what objects exist and their inferred purposes.
