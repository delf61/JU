# TARGET MIGRATION ARCHITECTURE: JU ACCOUNTING APPLICATION

## 1. EXECUTIVE SUMMARY
The goal of this project is to modernize the legacy MS-DOS/PC FAND "JU" accounting application into a modern web-based application. The target architecture replaces the proprietary binary FAND runtime with a standard LAMP/LEMP stack using CodeIgniter 4 (PHP) as the application framework and MariaDB as the relational database. This document serves as the technical blueprint for the migration, establishing verifiable database mappings, architectural boundaries, and implementation strategies derived directly from the legacy `PRINTER.TXT` source, without dictating specific code or SQL implementations yet.

## 2. LEGACY APPLICATION OVERVIEW
- **Major Functional Modules (INFERRED from MIGRATION_BLUEPRINT.md):** Cashbook (Peňažný denník), VAT Processing (DPH), Receivables (Pohľadávky), Liabilities (Záväzky).
- **Main Workflow:** Boot via `pHlavneMenu`, branching into specific operational modules manipulating `.000` data files via specific FAND procedures.
- **Important Tables (VERIFIED):** `ParamCat`, `param`, `Doklady`, `SadzbDPH`, `Kalendar.x`, `Staty.x`, `Kraje.x`, `Okresy.x` among 149 total `F*` objects.
- **Important Procedures:** The entry `pHlavneMenu`, `pPD`, `pDPH`, `pPohladavky`, `pZavazky` (INFERRED), among 240 `Pp*` objects.
- **Forms:** 124 `Ee*` text-based UI forms bound to FAND tables.
- **MERGE/Report:** 9 `Mm*` declarative report templates for generating textual prints.

## 3. TARGET APPLICATION ARCHITECTURE
- **Framework:** CodeIgniter 4 (PHP 8.x).
- **Database:** MariaDB (10.x+).
- **Authentication:** Standard CodeIgniter 4 Session/Cookie based authentication with password hashing.
- **Authorization:** Role-Based Access Control (RBAC) (e.g., Admin vs. Accountant roles) enforced via CI4 Filters.
- **Controllers:** Thin controllers handling HTTP request parsing, authorization checks, and routing data to views. One controller per major module (e.g., `CashbookController`, `InvoiceController`).
- **Models:** CI4 Models (`CodeIgniter\Model`) strictly mapping to the migrated MariaDB tables, handling CRUD operations and validation rules.
- **Services/Domain Logic:** Fat services containing the migrated business logic (e.g., `VatCalculationService`, `EndOfMonthService`) decoupled from controllers to allow reuse in CLI/cron contexts.
- **Views:** Blade-like or native PHP CI4 views using a modern CSS framework (e.g., Bootstrap 5 or Tailwind) to replicate the legacy `Ee*` form workflows.
- **Reports:** Server-side PDF generation (e.g., via DomPDF/TCPDF) or CSV exports mimicking the `Mm*` legacy prints.
- **Background/Batch Operations:** CI4 CLI commands (cron jobs) for end-of-year rollovers or bulk data imports.

## 4. DATABASE MIGRATION MODEL
- **Table Naming:** Convert legacy FAND names (e.g., `SadzbDPH`) to lowercase snake_case (e.g., `sadzb_dph` or `vat_rates`).
- **Primary Keys:** Create a synthetic auto-incrementing `id` (`INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY`) for every MariaDB table, regardless of the FAND primary key, to ensure robust ORM compatibility.
- **Legacy Record Identifiers:** Keep the original FAND primary keys (e.g., `@ * kod`) as `UNIQUE` constraints (e.g., `legacy_kod VARCHAR(20) UNIQUE`) to maintain the legacy domain semantics and facilitate data migration.
- **Foreign Keys:** Map FAND roles and direct links to explicit MariaDB `FOREIGN KEY` constraints pointing to the synthetic `id`s.
- **Fields:**
  - `VARCHAR`: FAND `A,n` maps to `VARCHAR(n)`.
  - `DECIMAL`: FAND `F,m.n` maps to `DECIMAL(m,n)`.
  - `DATE`: FAND `D` maps to `DATE` or `DATETIME`.
  - `TIME`: FAND `D,'hh:mm'` maps to `TIME`.
  - `BOOLEAN`: FAND `B` maps to `TINYINT(1)`.
  - `TEXT`: FAND `T` maps to `TEXT`.
- **Nullable Fields & Defaults:** Allow `NULL` where FAND implicitly allowed empty states. Use explicit `DEFAULT` values mirroring `#I` (implicit) legacy FAND directives.

## 5. FAND TYPE → MARIADB TYPE MAPPING
| FAND Type | Description | MariaDB Type | Migration Consideration |
| :--- | :--- | :--- | :--- |
| `A, n` | Alphanumeric string | `VARCHAR(n)` | Ensure `utf8mb4` collation. Strip padding. |
| `F, m, n` | Numeric (implied comma) | `DECIMAL(m, n)` | FAND stores as int to avoid float math. Native DECIMAL handles this safely. |
| `D` | Date/Time | `DATE` / `DATETIME` | May need parsing from custom FAND masks (e.g. `'DD.MM.YYYY'`). |
| `B` | Boolean (`'A'`/`'N'`) | `TINYINT(1)` | Translate legacy True/False logic safely. |
| `T` | Memo/Free Text | `TEXT` | Extract from `.t00` companion files. |

## 6. KEY AND INDEX MIGRATION
- **Primary-key candidates:** FAND `#K @ Field` (VERIFIED). Should become `UNIQUE INDEX` in MariaDB, alongside a synthetic `id` PK.
- **Unique keys:** FAND alternative keys `#K Name(@) Field` (VERIFIED). Should become `UNIQUE INDEX` in MariaDB.
- **Lookup/search indexes:** FAND duplicate keys `#K @ * Field` (VERIFIED). Should become non-unique `INDEX` in MariaDB.
- **Implementation details:** FAND `.x00` files and automatic ordering indexes. Do not migrate the files; just rely on standard SQL `ORDER BY` and basic MariaDB indexes.

## 7. RELATIONSHIP MODEL
- **Table-to-Table (VERIFIED):** `Okresy.x` links to `Kraje.x` via `Kraje Kraj`. Migrate to explicit `FOREIGN KEY (kraj_id) REFERENCES kraje(id)`.
- **Procedure-to-Table (UNKNOWN):** Which exact `Pp*` updates `Doklady` requires deep parsing of the procedural code blocks.
- **Form-to-Table (UNKNOWN):** Which `Ee*` forms bind to which tables requires structural extraction of the `PRINTER.TXT` E-chapters.
- **Important dependencies:** Global state (`ParamCat` and `param`) is injected into almost all accounting calculations.

## 8. ACCOUNTING DOMAIN MODEL
(INFERRED from standard FAND constructs and `MIGRATION_BLUEPRINT.md`)
- **Cashbook (Peňažný denník):** Central ledger logging bank/cash movements.
- **Documents (Doklady):** Sequential vouchers proving transactions.
- **VAT (DPH):** Tax tracking tied to transaction items.
- **Configuration (Parametre):** Fiscal year tracking and currency (`Sk` vs `Eur`).

## 9. PROCEDURE MIGRATION STRATEGY
Do NOT convert `Pp*` directly to controllers 1:1.
- **Menu/Navigation Procedures:** Migrate to frontend routing/Controller logic.
- **Data Entry Macros (F3/F7):** Migrate to frontend UI (React/Vue/Vanilla JS) autocomplete/dropdown components.
- **Accounting Calculation Blocks:** Migrate to decoupled CodeIgniter Services (e.g., `VatService`).
- **Validation Blocks (`#L`):** Migrate to CodeIgniter Model Validation Rules.
- **Report Generators:** Migrate to CodeIgniter Controllers invoking PDF generation libraries.

## 10. FORM MIGRATION STRATEGY
Legacy `Ee*` forms are CLI-based text grids.
- **Data Entry Screens:** Map to HTML `<form>` views utilizing Bootstrap grids.
- **Search/List Screens:** Map to DataTables or CI4 paginated HTML tables with filtering.
- **Dialogs/Prompts:** Map to JavaScript modals (e.g., SweetAlert or Bootstrap Modals).
- **Reusable Components:** Create CI4 View Cells for common lookups (e.g., "Select Customer").

## 11. MERGE / REPORT MIGRATION
Legacy `Mm*` objects are template merges.
- **Printable Reports:** Generate via HTML-to-PDF (e.g., DomPDF) from CodeIgniter Views.
- **Data Transformations:** If used for export (e.g., banking files), implement as CI4 Service classes returning text/CSV streams.
- **Batch Operations:** Migrate to CI4 CLI Task Runners.

## 12. APPLICATION WORKFLOW
(INFERRED based on standard application topologies)
1. **Login Screen:** User authenticates.
2. **Main Dashboard:** Replaces `pHlavneMenu`. Shows quick links to Cashbook, Invoicing, Settings.
3. **Module Views:** e.g., `/cashbook` shows a paginated list of `PD` entries.
4. **CRUD Modals:** Clicking "New Entry" opens a dedicated web form mapping to the old `Ee*` layout logic.

## 13. LEGACY DATA MIGRATION
**Data is NOT in the repository.**
- **Extraction:** A custom FAND procedure must be written in the legacy system to dump `.000` data into `CSV` format. We cannot natively read `.000` binaries reliably.
- **Encoding:** Convert MS-DOS CP852 (Latin-2) CSV dumps to UTF-8 using `iconv` or PHP `mb_convert_encoding` during the CI4 seed/import phase.
- **Validation:** Write a CI4 Seeder/Migration script to read the CSVs, validate against Model rules, and insert into MariaDB.
- **Duplicate Detection:** Use the verified FAND Alternative Keys (`TABLE_KEYS_VERIFIED.md`) to catch uniqueness violations during import.

## 14. DATA COMPATIBILITY / ENCODING
The legacy application uses CP852/CP895. MariaDB must be configured with `utf8mb4` charset and `utf8mb4_unicode_ci` collation. The data import layer must aggressively sanitize and convert all incoming legacy strings to UTF-8 to prevent database corruption.

## 15. SECURITY MODEL
- **Users:** `users` table storing credentials.
- **Roles:** `roles` table (e.g., `sysadmin`, `accountant`, `viewer`).
- **Authentication:** CI4 Session/Cookie handling (or CI4 Shield).
- **Audit Logging:** Create an `audit_logs` table tracking who modified critical accounting records (replaces native FAND journal logs if they existed).

## 16. REPORTING AND PRINTING
FAND relied on direct LPT1/LPT2 printer spooling.
- **Web approach:** All reports will be rendered as styled HTML pages with CSS `@media print` rules for direct browser printing.
- **Export:** Buttons to generate PDFs or Excel (`.xlsx` via PhpSpreadsheet) for archival.

## 17. IMPLEMENTATION PHASES
- **Phase 1 – Infrastructure:** CI4 setup, MariaDB provisioning, Git pipeline.
- **Phase 2 – Database:** Map `DATA_MODEL_VERIFIED.md` to CI4 Migrations.
- **Phase 3 – Authentication:** Basic login and RBAC setup.
- **Phase 4 – Master/Reference Data:** CI4 CRUD controllers for tables like `Kraje.x`, `SadzbDPH`.
- **Phase 5 – Accounting Core:** Services and Models for `Doklady` and Cashbook.
- **Phase 6 – Legacy Data Migration:** Execution of the CSV import scripts.
- **Phase 7 – Reports:** Implementation of PDF generators mapping to `Mm*`.
- **Phase 8 – Validation against the original application:** Shadow testing.
- **Phase 9 – Production Deployment.**

## 18. MIGRATION RISKS
- **Undocumented Procedure Behavior:** Core calculations locked in unparsed `Pp*` files could cause balance mismatches.
- **Data Conversion:** Failure to properly parse `.000` files via legacy export could stall the project.
- **Implicit Relationships:** FAND often handles soft relations in UI code instead of schema limits.
- **Rounding:** PHP float math vs FAND decimal math could yield 0.01 differences over thousands of transactions.

## 19. WHAT IS READY FOR IMPLEMENTATION
- Base MariaDB DDL schema design (Tables, Columns, Types, Keys) based on `DATA_MODEL_VERIFIED.md`.
- CodeIgniter 4 initial project scaffolding and database connection setup.
- Scaffolding CodeIgniter Models for the 149 identified tables.

## 20. WHAT MUST STILL BE VERIFIED
- **Procedural Logic:** The exact line-by-line translation of the 240 `Pp*` FAND blocks into PHP logic.
- **Forms (`Ee*`):** The exact visual mapping of legacy forms to HTML.
- **Actual Legacy Data:** We need the actual `.000` dumps to verify the data migration strategy works.

## 21. RECOMMENDED FIRST IMPLEMENTATION STEP
**Generate the Database Migrations.** Write the CodeIgniter 4 Migration files (PHP classes) for the core parameter and reference tables (e.g., `Param`, `ParamCat`, `Staty.x`, `Kraje.x`) utilizing the mappings defined in `DATA_MODEL_VERIFIED.md`. This requires no procedural logic and establishes the physical foundation for the new architecture.
