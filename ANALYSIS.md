# Analysis of JU Application

## Overview

The JU application is a legacy MS-DOS / Windows XP accounting application
running under PC FAND. It uses a set of specific files (JU.RDB, JU.TTT, JU.CAT)
to define its database structure, forms, procedures, and data locations.

## File Roles and Internal Structure

### 1. JU.RDB

**Directly established facts:**

- It is a binary file containing the definitions of the application's objects.
- Contains object names (e.g., FParamCat, EeParDat, PpPrijem) accompanied by a
  16-byte header/metadata structure.
- Objects can be classified by their prefix:
  - `F*`: File/Table definitions (e.g., FParamCat, FBanky.x, FPD, FAuto.x,
    FByt.x). There are 120 files defined.
  - `Ee*`: Form definitions (e.g., EeParDat, EeBanky, EeMesto). There are 110
    form definitions.
  - `Pp*`: Procedure/Macro definitions (e.g., PpPrijem, PpVydaj, PpDoklady).
    There are 171 procedure definitions.

**Reasonable inferences:**

- JU.RDB acts as a directory or symbol table for the objects used in the FAND
  application. It links object names to their corresponding implementations or
  definitions.

### 2. JU.TTT

**Directly established facts:**

- It is a text/binary hybrid file. It contains the actual source code or text
  for the objects defined in JU.RDB.
- It contains field definitions in PC FAND format (e.g., `SC : F,3,0;`,
  `Datum : D,'DD.MM.YYYY';`, `Meno : A,10;`).
- It contains business logic and macros, like assignment
  (`#C rok_s := strdate(rok,'YYYY')`), formulas (`cond(...)`), functions
  (`function Slovom(...)`), and parameter definitions (`#_PARAM`).
- It contains report definitions and form layouts, e.g., `#K @ @`, `A. Rozvaha`.

**Reasonable inferences:**

- JU.TTT is the "Text" file associated with the "Relational Data Base" (.RDB).
  It holds the FAND language source code, including procedural logic and form
  designs, which are referenced by index from JU.RDB.

### 3. Relationship between JU.RDB and JU.TTT

**Reasonable inferences:**

- JU.RDB acts as an index/header file, containing the names of objects and their
  locations/offsets/metadata within the JU.TTT file, which contains the actual
  source code bodies. PC FAND splits the application definition into these two
  files for efficient loading and execution.

### 4. JU.CAT

**Directly established facts:**

- JU.CAT is a binary catalog file mapping FAND database names to physical file
  paths.
- It contains entries mapping internal names to physical locations. Examples:
  - `den_prac` -> `S:\FAND\JU\DELF2026\den_prac.000`
  - `dph` -> `S:\FAND\JU\dph.000`
  - `auto` -> `S:\FAND\JU\auto.000`
  - `param` -> `S:\FAND\JU\DELF2026\param.000`

**Reasonable inferences:**

- This file allows the application to locate the actual `.000` data files on the
  disk. The presence of `S:\FAND\...` suggests this was previously mapped to a
  network drive or specific partition.

### 5. Data, Text, and Index Files Referencing

**Reasonable inferences:**

- **Data files (.000):** These store the actual records. They are physically
  located using the paths defined in JU.CAT. They correspond to the `F*`
  definitions in JU.RDB.
- **Text files (.t00):** These store variable-length text (memo fields). We see
  FAND field definitions like `text:T;`, which implies the use of `.t00` files
  for text storage.
- **Index files (.x00):** These store indexes for fast searching. Files defined
  in JU.RDB with a `.x` suffix (e.g., `FBanky.x`, `FAuto.x`) indicate that an
  index file (.x00) should exist for that table.

### 6. Identifiable Data-file Definitions

Based on JU.RDB, there are 120 tables. Some key tables identified:

- `FParamCat`, `Fparam`, `FPar`: Application parameters.
- `FDoklady`, `FPD` (Peňažný denník / Cashbook), `FPV` (Príjmy a Výdavky),
  `FUcty` (Accounts), `FBanky` (Banks).
- `FAuto` (Cars), `FTrasy` (Routes), `FSpotreba` (Fuel consumption),
  `FDoprPros` (Transport means).
- `FStaty` (Countries), `FKraje` (Regions), `FOkresy` (Districts),
  `FMesta` (Cities/Towns).
- `FSklad` (Warehouse/Inventory), `FKZ` (Kniha záväzkov),
  `FKP` (Kniha pohľadávok).
- `FByt` (Apartment), `FTeplo` (Heat), `FPlatby` (Payments).

### 7. Field Names, Data Types, and Structures

Based on JU.TTT extraction, field formats follow PC FAND conventions
(Name : Type,Length,Decimals):

- **A (Alphanumeric/String):** `Nazov : A,20;`, `Meno : A,10;`, `Priezv: A,15;`
- **F (Numeric/Float):** `cislo : F,5,0;`, `a1:F,6.2;` (e.g., Prijem),
  `dph : F,2.1;`
- **D (Date/Time):** `Datum : D,'DD.MM.YYYY';`, `Zaciat : D,'hh:mm';`
- **B (Boolean):** `dat:B;`, `browse: B;`
- **T (Text/Memo):** `text:T;`

### 8. Identifiable Procedures and Functions

171 `Pp*` definitions were found, which represent procedures. Examples:

- `PpPrijem`, `PpVydaj` (Income/Expense processing)
- `PpDoklady` (Document management)
- `PpAuto`, `PpTrasa` (Car and Route management)
- `PpSklad`, `PpSklad2008` (Inventory processing)

Also, custom functions were found in JU.TTT:

- `function Slovom(Cislo: real; Rod: real): string;` (Converts numbers to words,
  like "jednosto", "dvesto" - useful for printing invoices).

### 9. MERGE Definitions

**Directly established facts:**

- FAND MERGE operations are typically defined in `Mm*` objects. In JU.RDB, we
  see objects like `MmHelp`, `Mm1`, `Mm2`, `MmSC`. These indicate reports, batch
  processing, or data transformations.

### 10. Relationships and Dependencies

**Reasonable inferences:**

- Tables are hierarchical or relational. For instance, `FKraje.x`, `FOkresy.x`,
  `FMesta.x` form a geographic hierarchy. `FAuto.x` likely references `FTrasy.x`
  and `FSpotreba.x` to track vehicle usage.
- `FPD` (Cashbook) is the central accounting ledger, likely relying on
  `FDoklady` (Documents) and `FUcty` (Accounts).

### 11. Apparent Business/Accounting Logic

**Directly established facts:**

- Currency transition logic exists in the code:
  `mena := cond(val(paramcat.rok_s) < 2009 : 'Sk ', else : 'Eur')`. This shows
  the application handled the Slovak transition from Koruna (SKK) to Euro (EUR)
  in 2009.
- Number-to-word conversion is implemented in Slovak (`function Slovom...`).
- Double-entry/Single-entry concepts exist: `Prijem` (Income),
  `Vydaje` (Expenses). The name "JU" likely stands for "Jednoduché účtovníctvo"
  (Single-entry accounting).

### 12. Uncertainties

- The exact offsets mapping JU.RDB entries to JU.TTT strings cannot be precisely
  mapped without fully decoding the PC FAND binary format for RDB files.
- The actual data is missing, so we cannot verify the exact state of records,
  sequences, or constraints not explicitly defined in the TTT source code.

---

## Requirements for Migration to CodeIgniter 4 + MariaDB

### Information We Already Have

1. **Schema Definitions:** We have the exact field names, data types, lengths,
   and decimal precisions for all 120 database tables, extracted from JU.TTT.
2. **Table Inventory:** We know the names and purposes of all tables, forms, and
   procedures.
3. **Business Logic Extracts:** We have snippets of validation logic,
   calculations, and the Euro transition logic. We have the algorithm for
   converting numbers to Slovak words.
4. **Data Paths:** We know how the physical files were named and organized (via
   JU.CAT).

### Additional Information / Data Required

1. **Data Export:** The actual `.000`, `.t00`, and `.d00` files must be exported
   to a standard format (e.g., CSV, SQL dump) to migrate the historical
   accounting data into MariaDB. FAND tools or a custom converter will be needed
   for this step.
2. **Full TTT Parsing:** A more robust parser is needed to completely
   reconstruct the relational links (foreign keys) between tables, as PC FAND
   defines these implicitly in the procedural code or form definitions.
3. **Form Layouts:** The UI layout and fields for each form (`Ee*`) need to be
   mapped to HTML/CSS views in CodeIgniter. FAND's terminal-based coordinates
   need to be converted to modern web layouts.
4. **Procedure Translation:** The `Pp*` FAND macro procedures (which handle data
   entry, updates, reports, and calculations) must be rewritten in PHP as
   CodeIgniter controllers and models.
5. **Authentication/Authorization:** The legacy DOS system likely lacked modern
   security. A proper user login and role management system must be designed for
   the web application.


<!-- Full analysis appended via separate files, see TABLES.md, PROCEDURES.md, etc. for deep inventory -->
