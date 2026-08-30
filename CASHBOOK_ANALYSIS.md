# 1. Executive Summary

The Cashbook (`Peňažný denník` / `pd`) module is the core transactional accounting ledger of the DOS JU application. It records all financial transactions, differentiating between income/expense and cash/bank operations. The module uses dynamic schema loading depending on the accounting year. Due to historical schema variations in the `pd` table and complex business logic tied to `pPD`, `pPDsuma`, and `pPDkod` procedures, a careful structural approach is required.

# 2. Legacy Functions Analyzed

* **`pPD`**: The main interface/datový editor for the Cashbook. It allows entry, editing, and viewing of transactions. Uses different UI states depending on context (browse mode vs edit mode), handles filtering, and calculates running balances.
* **`pPDsuma`**: Calculates summary totals for the cashbook. It aggregates income/expenses, computes running totals (`A123`, `SumaPD`), factors in depreciation (`IKzp`, `Leasing`), and calculates tax bases.
* **`pPDkod`**: Handles coding of operations (income/expense classification). It triggers sub-procedures (`pVydaje_Kod`, `pPrijmy_Kod`) when amounts are entered into expense or income fields.

# 3. `pd` Complete Schema

**CONFIRMED** schema extracted from `PRINTER.TXT`:

| Field | Type | Size | Description |
|---|---|---|---|
| `a` | D | 6 | Date (Dátum) |
| `b` | A | 13 | Internal document number/linking (Označovanie položiek) |
| `zp` | D | 6 | Date of taxable supply (Dátum zdaniteľného plnenia) |
| `kodOP` | F | 6 | Operation code |
| `c` | A | 13 | External document reference |
| `d` | A | 56 | Text description (Popisný text) |
| `r` | B | 1 | Total item flag (Celková položka) |
| `p` | B | 1 | Continuous item flag (Priebežná položka) |
| `a1` | F | 6 | Cash Income (Príjem v hotovosti) |
| `a2` | F | 6 | Cash Expense (Výdaj v hotovosti) |
| `a3` | F | 6 | Bank Income (Príjem na bežný účet) |
| `a4` | F | 6 | Bank Expense (Výdaj z bežného účtu) |
| `Vydaj` | A | 1 | Expense breakdown code |
| `a7` | F | 6 | Expense: Small assets |
| `a8` | F | 6 | Expense: Unused / Other |
| `a9` | F | 6 | Expense: Wages |
| `a10` | F | 6 | Expense: Wage taxes |
| `a11` | F | 6 | Expense: Insurance / DDP |
| `a12` | F | 6 | Expense: Operational overhead |
| `a13` | F | 6 | Expense: Fuel / SC |
| `a14` | F | 6 | Expense: Assets acquisition |
| `a15` | F | 6 | Expense: Goods |
| `a16` | F | 6 | Expense: Income tax, VAT |
| `a17` | F | 6 | Expense: Personal account of entrepreneur |
| `po` | A | 30 | Note (Poznámka) |
| `dph` | F | 6 | VAT rate in % |
| `hal_p` | F | 6 | Penny settlement for exact VAT amount |

*Note: Calculated fields include `Aky_Vydaj`, `rok`, `mena`, `typ_vyd`, `hod_vyd`, `hod_pri`, `DPH_Sk`, `zn_p`, `zn`, `sDPH`, `hot_prijem`, `hot_vydaj`, `ucet_prijem`, `ucet_vydaj`.*

# 4. `pd` Schema/Year Variants

**CONFIRMED**: The `pd` table uses different schemas historically (`YEAR_VARIANT`).
* **Record lengths found**: 196 bytes (mostly 1992-2026) and 191 bytes.
* The 196-byte schema aligns perfectly with the 235 internal mapped sizes in FAND type calculation (FAND uses internal compression/pointers, actual disk size 196).
* The 191-byte schema exists but lacks records. The historical schema changes are likely due to VAT or Euro adoption (e.g. `hal_p`, `dph` additions).
* For migration, a single CI4 model CANNOT safely represent all historical variants directly if structural shifts occurred.
* **Proposed Handling**: Use a normalized schema with `_year` discriminator and map EXACT_COMPATIBLE fields, handling legacy currencies (SKK vs EUR) via conversion flags derived from `paramcat.rok_s`.

# 5. Keys and Indexes

* **`pd`**: `#K @ b;`
  * Primary Key (`@`): `b` (Internal document reference).
  * Index: `Vydaje Vydaj;` (Index on the expense type breakdown).
* **`paramcat`**: `#K @ @`
  * Global configuration, effectively single-record or keyless singleton.
* **`dovod_bu`**: Unverified primary key, likely `n`. Contains 26 records.

# 6. Actual Data Findings

* `pd`: Distributed across year folders (e.g., `DELF2022/PD.000` has 89 records, `Delf2004/PD.000` has 517 records). The total extraction yielded thousands of records.
* `paramcat`: Global (`PARAMCAT.000` has 1 record). Contains system-wide params (like `rok_s` = Year).
* `dovod_bu`: Global (`DOVOD_BU.000` has 26 records). Length 40. Contains text descriptions for bank operations.
* Transaction identifiers (`b`) reset or repeat between years. Therefore, MariaDB primary key must be composite `(b, _year)` or an auto-increment surrogate key with `(b, _year)` as a `UNIQUE` constraint.

# 7. `pPD` Business Logic

* **Creation/Editing**: Driven by `edit(PD, ePD...)`.
* **Cash/Bank Distinction**: Hardcoded columns:
  * `a1` (Cash Income) vs `a3` (Bank Income)
  * `a2` (Cash Expense) vs `a4` (Bank Expense)
* **VAT**: VAT is dynamically calculated based on the `dph` column. The code checks the year to determine rounding (`DPH_Sk := cond(rok < 2009 : (hod_vyd * (dph/100)) round 1, else : (hod_vyd * (dph/100)) round 2)`).
* **Document Numbering**: `b` contains the document string.

# 8. `pPDsuma` Calculations

* Calculates income taxes, running totals, and integrates with other modules (e.g. `Leasing`, `StraDoch` - Social/Health insurance).
* Summarizes by iterating `SC`, `IKzp` (depreciation).
* Results are displayed in the `SumaPD` table/view.

# 9. `pPDkod` Logic

* Triggers classification (`pVydaje_Kod`, `pPrijmy_Kod`) to populate breakdown columns (`a7`-`a17`) ensuring that the total expense/income matches the categorized amounts.

# 10. `dovod_bu` Analysis

* **Purpose**: A lookup dictionary (codebook) for bank operation reasons.
* **Structure**: Single field `n : A,40`.
* **Scope**: Global (not year-dependent).
* Users select values from this table to populate descriptions. It should become a simple dictionary table in the CI4 architecture.

# 11. `paramcat` Analysis

* **Purpose**: Global parameter catalog.
* **Structure**: Contains `Rok` (Current accounting year) and `SC` (Counter).
* **Usage**: Used to determine the active year for currency rules (SKK vs EUR transition in 2009).
* It does NOT belong directly to Cashbook; it is a global configuration dependency.

# 12. Relationships/Dependencies

* **Confirmed Links**:
  * Cashbook (`pd`) <-> `dovod_bu` (Lookup for text).
  * Cashbook (`pd`) <-> Invoices (`kz`/`kp`, inferred through external document reference `c`).
  * Cashbook (`pd`) depends on `paramcat` (for year context and currency logic).
  * Cashbook (`pd`) totals depend on `Leasing`, `IKzp`, `StraDoch`.

# 13. Migration Scope

### Core Cashbook
* `pd` table extraction into normalized MariaDB.
* CI4 `CashbookService` handling CRUD operations and cash/bank/expense allocations.
* `pPDsuma` logic translation for reporting endpoints.

### Supporting Data
* `dovod_bu` must be migrated as a global dictionary.
* `paramcat` must be migrated to a global settings service.

### Future Dependencies
* `Leasing` and `StraDoch` integrations should be deferred or stubbed until those modules are migrated.

# 14. Proposed CI4 Architecture

* **Models**:
  * `CashbookModel`: Maps to `pd`, enforcing the `_year` discriminator and surrogate PK.
  * `BankReasonModel`: Maps to `dovod_bu`.
* **Services**:
  * `CashbookService`: Implements `pPDkod` categorization validation, VAT calculations, and `pPDsuma` aggregation logic.
* **Controllers**:
  * `CashbookController`: REST endpoints for frontend grids.
* **Architecture Note**: Do NOT use a single model strictly tied to the legacy 196-byte structure if a 191-byte variant contains records. Extract raw JSONL per year and handle schema normalization during the MariaDB seeding phase.

# 15. Migration Risks

* **Rating: HIGH**
* **Reasons**:
  * `pd` is structurally variant across years.
  * SKK to EUR currency transition rules are hardcoded in FAND calculated fields based on `paramcat.rok`.
  * `pPDsuma` calculates complex tax bases dependent on external modules that are not yet migrated.
  * The `b` identifier is reused across years, risking PK collisions if not properly scoped by `_year`.

# 16. Confirmed Facts

* `pd` uses columns `a1`-`a4` for income/expense and `a7`-`a17` for categorization.
* SKK/EUR transition occurred in 2009.
* `dovod_bu` is a simple global codebook.
* PK in MariaDB must be a composite of `(b, _year)` or an auto-increment ID.

# 17. Unverified Items

* The exact mapping of the 191-byte schema variant (needs binary extraction analysis if it contains records).
* How `pd` explicitly links to `platby`/`uhrady` (inferred via document `c`, but exact join condition is unverified).

# 18. Recommendation

**REQUIRES IMPLEMENTATION DECISION**
Implementation should NOT begin immediately. The `pPDsuma` logic heavily depends on unmigrated modules (`Leasing`, `StraDoch`, `IKzp`). We recommend either migrating those dependencies first OR explicitly scoping the first Cashbook iteration to exclude cross-module tax reporting. Furthermore, the 191-byte `pd` schema needs binary verification if it contains any records before locking the CI4 Model structure.
