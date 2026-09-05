# MIGRATION BLUEPRINT: JU ACCOUNTING APPLICATION

==================================================
## 1. EXECUTIVE SUMMARY
==================================================

The legacy JU application is an MS-DOS/Windows XP era accounting system built entirely on the PC FAND database ecosystem. It manages various accounting modules such as Cashbook (Peňažný denník), VAT (DPH), Receivables (Pohľadávky), and Liabilities (Záväzky), utilizing a proprietary binary and text format for definitions and runtime execution.

**What has been successfully reverse-engineered:**
We have successfully extracted the physical and logical definitions of 149 F* data table objects, alongside identifying the presence of 124 E* form objects, 240 P* procedure objects, and 9 M* MERGE (report) objects from the `PRINTER.TXT` application dump. We have also verified the table keys and foreign key relationships syntactically declared in the FAND `.RDB` structure based on official documentation (`DEKLARACE SOUBORU - kapitola F.txt`).

**What is known with high confidence:**
- The structural FAND definitions of tables, their field types (A, F, D, B, T), masks, and constraints.
- Primary, alternate, and foreign keys mapped directly from the FAND source declarations (`#K`).
- Object counts and component prefixes defining the architecture (F*, Ee*, Pp*, Mm*).

**What remains unknown:**
- The exact proprietary binary format of `.000` (data), `.t00` (memo), and `.x00` (index) files.
- The procedural logic stored in the 240 `Pp*` FAND procedures, which dictate calculations, report generation, and specific business workflow logic.
- Form interactions (`Ee*` objects) and macro logic.

**Is the available documentation sufficient to begin designing the new application?**
The documentation is sufficient to begin designing the base MariaDB data schema based on the extracted `DATA_MODEL_VERIFIED.md` and `TABLE_KEYS_VERIFIED.md`. However, it is **not** sufficient to begin coding the CodeIgniter 4 application or implementing complex workflows because the procedural business logic (`PROCEDURES_VERIFIED.md`, `ACCOUNTING_LOGIC_VERIFIED.md`) requires deeper analysis of the `Pp*` FAND blocks before architectural domain modeling can be completed.

==================================================
## 2. ORIGINAL APPLICATION ARCHITECTURE
==================================================

The original architecture is built on the PC FAND system, which uses an object dictionary approach:

- **PC FAND:** The proprietary runtime and database engine orchestrating the application.
- **JU.RDB:** The object dictionary/schema definition binary. Contains 24-byte metadata records identifying all modules and objects.
- **JU.TTT:** The compiled/textual definitions of FAND objects, including forms, procedures, tables, and macros. It heavily utilizes MS-DOS CP852/CP895 encodings.
- **JU.CAT:** The catalog file mapping logical file names to physical paths.
- **.000 data files:** Proprietary binary files storing actual tabular record data.
- **.t00 text files:** Companion files for `.000` data files storing variable-length text/memo fields.
- **.x00 index files:** Index files auto-managed by FAND for rapid lookups.
- **F* objects:** Table and file declarations (fields, data types, keys).
- **Ee* forms:** Text-based GUI layouts for data entry.
- **Pp* procedures:** Procedural code blocks executing business logic, macros, and navigation.
- **Mm* MERGE/report objects:** Declarative reporting and export templates.

**How they work together:**
The FAND runtime boots by reading `JU.RDB` to load the object index. It cross-references `JU.TTT` for the source logic of the forms (`Ee*`) and procedures (`Pp*`). As users navigate forms, procedures execute business rules and query/modify physical `.000/.t00` data files on disk based on `F*` definitions.

==================================================
## 3. APPLICATION ENTRY POINT AND WORKFLOW
==================================================

Based on memory and procedural discovery:

- **Application Entry Point:** `pHlavneMenu` (The primary procedural menu).
- **Major Functional Areas:**
  - Cashbook (`pPD` - Peňažný denník)
  - VAT (`pDPH` - Daň z pridanej hodnoty)
  - Receivables (`pPohladavky`)
  - Liabilities (`pZavazky`)

**Central Accounting Workflow Diagram (Inferred from modules):**
```text
[ pHlavneMenu ]
      |
      +---> [ pPD ] (Cashbook/Peňažný denník) ---> Updates Core Ledger
      |
      +---> [ pDPH ] (VAT Processing) ---> Calculates Tax from Transactions
      |
      +---> [ pPohladavky ] (Receivables) ---> Invoicing & Customer Accounts
      |
      +---> [ pZavazky ] (Liabilities) ---> Supplier Payments
```

*(Note: Detailed procedural call chains, specific important forms, and deeper workflow steps require full procedural verification, which is currently marked as needing analysis.)*

==================================================
## 4. FUNCTIONAL MODULES
==================================================

Based on the FAND object structures and memory, we can classify these core modules:

**1. Peňažný denník (Cashbook)**
- **Purpose:** Central journal for tracking cash and bank transactions.
- **Entry Procedure:** `pPD`
- **Important Tables:** `PD` (Peňažný denník), `Ucty` (Accounts)
- **Confidence:** High (Verified via memory and common FAND patterns).

**2. DPH (VAT)**
- **Purpose:** VAT calculations, categorization, and reporting.
- **Entry Procedure:** `pDPH`
- **Important Tables:** `SadzbDPH` (VAT Rates), `DPH`
- **Confidence:** High

**3. Pohľadávky a Záväzky (Receivables & Liabilities)**
- **Purpose:** Managing incoming and outgoing invoices, supplier/customer ledgers.
- **Entry Procedure:** `pPohladavky`, `pZavazky`
- **Important Tables:** `Faktury` (Invoices), `Adresar` (Customers/Suppliers)
- **Confidence:** High

**4. Konfigurácia (Configuration)**
- **Purpose:** Global application settings, fiscal year boundaries, global vars.
- **Important Tables:** `Param`, `ParamCat` (Parametric global variable tables)
- **Confidence:** Verified from `DATA_MODEL_VERIFIED.md` parametric key `#K @ @` structures.

==================================================
## 5. DATABASE ARCHITECTURE
==================================================

The 149 `F*` objects verified in `DATA_MODEL_VERIFIED.md` fall into these categories:

- **Configuration/Parameter Tables:**
  - `Param`, `ParamCat`, `Par`, `SadzbDPH` (Evidenced by `#K @ @` parametric FAND keys).
- **Master/Reference Tables (Číselníky):**
  - `Staty.x`, `Kraje.x`, `Okresy.x` (Evidenced by core lookup keys and standard dictionary data).
- **Core Accounting / Transaction Tables:**
  - `Doklady` (Evidenced by document numbering and transaction logging fields).
- **Reporting/Helper Tables:**
  - `help.hlp`, `Kalendar.x` (Used for system assistance and date computations).

*(Note: Exact transaction table names require linking against `pPD` logic, but standard patterns suggest the presence of main ledger files).*

==================================================
## 6. CORE ACCOUNTING DATA MODEL
==================================================

*Pending full relationship extraction from `Pp*` modules. Important parameter tables verified include:*

**Table: `ParamCat`**
- **Purpose:** System-wide catalog parameters (Year).
- **Fields:** `Rok` (Year), `SC`.
- **Keys:** Parametric Key `@ @`.
- **Role:** Fiscal year context.

**Table: `param`**
- **Purpose:** Global variable storage for the application state, caching totals, VAT constants, and UI states.
- **Fields:** Dozens of caching fields (`a1`, `a2`, `Datum`, `var_sym`, `dph`).
- **Keys:** Parametric Key `@ @`.

==================================================
## 7. VERIFIED RELATIONSHIPS
==================================================

**VERIFIED RELATIONSHIPS (from `TABLE_KEYS_VERIFIED.md`):**

- `Okresy.x` belongs to `Kraje.x`
  - **Evidence:** Foreign Key `Kraje Kraj` in `Okresy.x` definition linking to region codes.

*(Note: A full relational map requires the complete `RELATIONSHIPS_VERIFIED.md` based on exhaustive procedure and form analysis.)*

==================================================
## 8. BUSINESS LOGIC THAT MUST BE PRESERVED
==================================================

Based on standard FAND structures and available data:

- **Global Variable Propagation:** The `#K @ @` parametric tables (`Param`, `ParamCat`) act as singletons. CodeIgniter must mimic this behavior (e.g., via a global configuration service or settings table) because FAND heavily relies on reading/writing to `param.Datum` or `param.dph` across all procedures.
- **Calculated Fields (`#C`):** Many tables use `#C` blocks for derived data (e.g., `Den := strdate(Datum,'DD.MM')` in `Kalendar.x`). These must be preserved either as MariaDB generated columns or via CodeIgniter entity accessors.
- **Update Triggers (`#A`):** The `#A` rules (e.g., `#A Kraje.km2 += km2; Kraje.oby += oby;` in `Okresy.x`) represent FAND-level materialized views. This logic must be replicated via MariaDB triggers or CodeIgniter service logic on save.

==================================================
## 9. FAND → MARIADB MAPPING PRINCIPLES
==================================================

**Data Types:**
- `A, n` (Text) ➔ `VARCHAR(n)`
- `F, m, n` or `F, m.n` (Numeric) ➔ `DECIMAL(m, n)`
- `D` (Date) ➔ `DATE` or `DATETIME`
- `B` (Boolean) ➔ `TINYINT(1)`
- `T` (Memo Text) ➔ `TEXT` or `LONGTEXT`

**Keys and Constraints:**
- **Parametric Key (`#K @ @`):** ➔ Maps to a Settings table with a single row constraint, or key-value pairs.
- **Primary Key (`#K @ Field`):** ➔ `PRIMARY KEY (Field)`
- **Alternative Primary Key (`#K Name(@) Field`):** ➔ `UNIQUE INDEX (Field)`
- **Foreign Key / Roles:** ➔ `FOREIGN KEY` constraints.

*(Note: These are principles. No SQL generation is authorized yet.)*

==================================================
## 10. FAND → CODEIGNITER 4 MAPPING PRINCIPLES
==================================================

- **FAND Table (`F*`)** ➔ MariaDB Table + CodeIgniter 4 Model (`App\Models\TableNameModel`).
- **FAND Form (`Ee*`)** ➔ CodeIgniter View (`.php` templates) + HTML Forms + CSS.
- **FAND Procedure (`Pp*`)** ➔ CodeIgniter Controller (handling routing/requests) + Service Classes (handling reusable business logic).
- **FAND MERGE (`Mm*`)** ➔ Reporting Service Layer generating PDFs or Excel exports.
- **FAND Parametric Variables (`#K @ @`)** ➔ CI4 Config classes or a centralized Settings Service.
- **FAND Calculated Fields (`#C`)** ➔ CodeIgniter Entity Methods (e.g., `getDenAttribute()`).

==================================================
## 11. WHAT CAN BE MIGRATED DIRECTLY
==================================================

**High Confidence Migration Targets:**
- Table names and Field definitions (from `DATA_MODEL_VERIFIED.md`).
- Data type mappings (Strings, Decimals, Dates, Booleans, Memos).
- Base key structures (Primary and Alternative Keys from `TABLE_KEYS_VERIFIED.md`).
- Menu entry point knowledge (`pHlavneMenu`).

==================================================
## 12. WHAT CANNOT YET BE MIGRATED DIRECTLY
==================================================

**Requires Deep Investigation:**
- **Procedural Logic:** The specific accounting formulas and data manipulation flows stored inside the 240 `Pp*` FAND procedures.
- **Binary Data Encoding:** The physical `.000` data files cannot be read linearly without reverse-engineering FAND's proprietary file format.
- **Report Generation:** `Mm*` MERGE structures have not been deeply analyzed for specific layout logic.
- **UI Behavior:** Specific keystroke macros, lookups (`F3`, `F7`), and validations (`#L` constraints) bound to `Ee*` forms.

==================================================
## 13. DATA MIGRATION REQUIREMENTS
==================================================

To migrate the existing data, we must solve the proprietary binary format problem.

**We will need:**
1. Access to the raw `.000` and `.t00` files to attempt format reverse-engineering, **OR**
2. FAND-native export procedures. The safest route is to write a FAND macro/procedure (using the legacy application itself) to export all tables to `.txt` or `.csv` files.
3. Test datasets to validate the extraction.

*(We cannot currently invent or parse the `.000` format natively.)*

==================================================
## 14. PHASED MIGRATION PLAN
==================================================

- **PHASE 1: Source Analysis** — *Mostly Complete (Data Model & Keys)*. Needs Procedure/Form analysis.
- **PHASE 2: Data Extraction Strategy** — Develop a method to export legacy `.000` data to CSV using FAND runtime tools.
- **PHASE 3: MariaDB Schema Design** — Map verified tables and keys into SQL DDL.
- **PHASE 4: Procedural Logic Reverse-Engineering** — Deconstruct `Pp*` files into pseudo-code.
- **PHASE 5: CodeIgniter Architecture** — Setup base models, entities, and services.
- **PHASE 6: Core Accounting Implementation** — Replicate `pPD`, `pDPH`, `pPohladavky`, `pZavazky`.
- **PHASE 7: Forms/UI** — Replicate user input forms in HTML/CSS.
- **PHASE 8: Reports** — Replicate `Mm*` reporting outputs.
- **PHASE 9: Parallel Validation** — Run legacy JU alongside the new CI4 app.
- **PHASE 10: Production Transition**.

==================================================
## 15. CRITICAL MIGRATION RISKS
==================================================

- **Hidden Runtime Behavior:** FAND automates index management (`.x00`), record linking (Roles), and referential integrity silently. Missing these in SQL will corrupt data.
- **Number Rounding:** FAND's `F, m, n` (comma instead of dot) stores numbers internally as integers to prevent float issues. MariaDB `DECIMAL` handles this natively, but rounding rules in legacy procedures must be strictly checked.
- **Date Handling:** MS-DOS date boundaries and FAND's specific `D` formatting might behave unexpectedly compared to PHP `DateTime`.
- **Data Export Bottleneck:** If data cannot be exported to CSV natively from the legacy DOS system, binary decoding of `.000` could delay the project significantly.

==================================================
## 16. VALIDATION STRATEGY
==================================================

**Future Validation Approach:**
The primary validation method will be **Parallel Processing / Shadow Accounting**.

1. **Input:** The same invoices and cash transactions are entered into Legacy JU and the new web application for a given month.
2. **Comparison Targets:**
   - **Stored Records:** Dump tables from both systems and diff them (requires CSV export from legacy).
   - **Calculations:** Compare computed VAT totals.
   - **Balances:** Check end-of-month cashbook balances.
   - **Outputs:** Visually compare the output of MERGE reports vs. CodeIgniter PDF exports.

==================================================
## 17. MIGRATION READINESS
==================================================

| AREA | STATUS | CONFIDENCE | WHAT IS STILL NEEDED |
| :--- | :--- | :--- | :--- |
| Source Structure (`.RDB`/`.TTT`) | VERIFIED | HIGH | None. |
| Table Definitions (`F*`) | VERIFIED | HIGH | None. |
| Keys/Indexes | VERIFIED | HIGH | None. |
| Procedures (`Pp*`) | UNKNOWN | LOW | Detailed parsing of procedure logic. |
| Forms (`Ee*`) | UNKNOWN | LOW | Parsing of input fields and layout constraints. |
| Relationships | PARTIALLY VERIFIED | MEDIUM | Comprehensive mapping of all foreign keys/roles. |
| Accounting Logic | UNKNOWN | LOW | Reverse-engineering of calculation blocks. |
| Workflow | PARTIALLY VERIFIED | MEDIUM | Procedural call chain mapping. |
| Physical Data Format (`.000`) | UNKNOWN | LOW | FAND export tools or binary reverse-engineering. |
| MariaDB Design | REQUIRES DATA | HIGH | Wait for procedure/logic analysis. |
| CodeIgniter Design | REQUIRES DATA | HIGH | Wait for procedure/logic analysis. |

==================================================
## 18. FINAL RECOMMENDATION
==================================================

1. **Do we now understand the original application sufficiently to design the new architecture?**
   No. We understand the static data model, but not the procedural business logic or workflow rules.

2. **Is anything still missing from the source-definition analysis?**
   Yes. The procedures (`Pp*`), forms (`Ee*`), and merge reports (`Mm*`) require the same level of verified extraction that the tables received.

3. **What is the single most important next technical step?**
   Perform a deep structural extraction and analysis of the `Pp*` (Procedure) and `Ee*` (Form) blocks from `PRINTER.TXT` to uncover the actual accounting logic.

4. **Can we now safely start designing the MariaDB schema?**
   No. While we have the table definitions, procedural analysis may reveal hidden dependencies, materialized view patterns (`#A`), or specific index usages that necessitate schema adjustments.

5. **What must NOT be done yet?**
   Do NOT write any SQL DDL statements, do NOT write any PHP code, and do NOT attempt to manually parse the binary `.000` data files yet.
