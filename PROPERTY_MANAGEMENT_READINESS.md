# Property Management Readiness Audit

## A. Migration Scope

Based strictly on `MIGRATION_MAP.md`, the PropertyManagement module consists of:

**Legacy DOS Functions:**
- `pDomacnost`
- `pVyuctSBD`
- `pVyuctSSE`
- `pVyucH2OSasa`
- `pOdpoceTeplo`

**Future CI4 Architecture:**
- Controller: `PropertyController`
- Service: `UtilityService`

**MariaDB Target Tables:**
- `byt`
- `bytudaje` (Does not exist in `ju_migration_test`)
- `elsasa`
- `h2o_sasa` (exists as `h2osasa`)
- `teplo`
- `vyuctsse` (exists as `vyucsse`)
- `vyuctspp` (exists as `vyucspp`)

## B. Existing CI4 components

| Component | Exists | Status |
| :--- | :--- | :--- |
| `BytModel` | NO | - |
| `BytudajeModel` | NO | - |
| `ElsasaModel` | NO | - |
| `H2oSasaModel` | NO | - |
| `TeploModel` | NO | - |
| `VyuctsseModel` | NO | - |
| `VyuctsppModel` | NO | - |
| `UtilityService` | NO | - |
| `PropertyController`| NO | - |

_No existing unit tests or golden tests were found for this module._

## C. Legacy function mapping

Extracted from JU.CAT, JU.RDB, and legacy definitions. Procedures are referenced in JU.RDB (e.g., `PpDomacnost`, `PpVyuctSBD`) but the internal logic details (`#procedure` definitions) are compiled or missing from the plain text TTT/RDB representations provided.

| FAND function | Tables | CI4 target | Logic status |
| :--- | :--- | :--- | :--- |
| `pDomacnost` | `byt` | `PropertyController`/`UtilityService` | OPEN ISSUE - Logic compiled/missing in texts. Fields: a1, a2a-h, a3-a5, b1-b10 |
| `pVyuctSBD` | `vyucsbd` (not defined in map) | `PropertyController`/`UtilityService` | OPEN ISSUE - Logic compiled/missing in texts. |
| `pVyuctSSE` | `elsasa`, `vyucsse` | `PropertyController`/`UtilityService` | OPEN ISSUE - Logic compiled/missing in texts. Fields: el_v, spotreba, pausal |
| `pVyucH2OSasa` | `h2osasa` | `PropertyController`/`UtilityService` | OPEN ISSUE - Logic compiled/missing in texts. Fields: h2o_v, h2o_n, sk_v |
| `pOdpoceTeplo` | `teplo` | `PropertyController`/`UtilityService` | OPEN ISSUE - Logic compiled/missing in texts. Fields: zac_ob, kon_ob |

*Because the explicit field mapping, calculations, and rounding logic are not cleanly available in `JU.TTT` or `PRINTER.TXT` (only menu references exist), the logic status for all must currently remain an OPEN ISSUE until deeper binary extraction of FAND `.RDB`/`.000` forms.*

## D. Database availability

Validating the existence of tables and their records in the `ju_migration_test` MariaDB environment:

| Table | Exists | Records | Latest Record |
| :--- | :--- | :--- | :--- |
| `byt` | YES | 30 | 2005-12-01 |
| `bytudaje` | NO | 0 | N/A |
| `elsasa` | YES | 61 | 2020-08-10 |
| `h2osasa`| YES | 30 | 2025-11-11 |
| `teplo` | YES | 4 | 2005-12-31 |
| `vyucsse` | YES | 8 | 2003-08-01 |
| `vyucspp` | YES | 26 | 2005-03-31 |

## E. Golden validation readiness

| Agenda | Dataset Available | Target Golden Scope | OPEN ISSUE |
| :--- | :--- | :--- | :--- |
| Byt / SBD | YES | 2005 | No validation fields clearly known |
| ElSasa | YES | 2020 | Requires calculation logic analysis |
| H2OSasa | YES | 2025 | Requires calculation logic analysis |
| Teplo | YES | 2005 | Low record count (4), limited testing capability |
| VyucSSE | YES | 2003 | Requires calculation logic analysis |
| VyucSPP | YES | 2005 | Requires calculation logic analysis |

*A dataset exists for most tables, but establishing a clear Golden validation set requires deep understanding of FAND logic, as most test records are old (2003-2005), except for `elsasa` and `h2osasa`.*

## F. Risks

- **Missing legacy tables/data:** `bytudaje` does not exist in `ju_migration_test`.
- **Naming mismatch:** `vyuctsse` vs `vyucsse`, `vyuctspp` vs `vyucspp`, `h2o_sasa` vs `h2osasa`.
- **Obsolete Data:** Data for `byt`, `teplo`, `vyucsse`, and `vyucspp` is extremely old (2003-2005), which may not reflect newer business rules.
- **Unknown Logic:** The specific FAND calculations, constraints, logic rounding for bills/consumptions are compiled in `.RDB`/`.000` forms and not plain-text extractable from `JU.TTT`.
- **Missing components:** No CI4 components (`PropertyController`, `UtilityService`, or `Models`) currently exist.

## G. Recommended implementation order

1. Extract pure legacy business rules for each FAND function from `.000` dictionary tables using a specialized FAND reader, as text files are insufficient.
2. Correct `MIGRATION_MAP.md` table names to match MariaDB (`h2osasa`, `vyucsse`, `vyucspp`).
3. Define the `OPEN ISSUE` regarding the missing `bytudaje` table and seek clarification on whether it is needed.
4. Create CI4 Models mapping to actual MariaDB structures.
5. Create `UtilityService` focused on extracted calculation logic with standard PHPUnit tests.
6. Design and verify Golden validation tests for years with relevant data (e.g., 2005 for `byt`, 2025 for `h2osasa`).
7. Create `PropertyController` endpoints.

## Summary

1. **Čo už existuje:** Tabuľky v databáze `byt`, `elsasa`, `h2osasa`, `teplo`, `vyucsse`, `vyucspp` existujú s reálnymi dátami v testovacej databáze. Zoznam legacy procedúr je známy v `JU.RDB`/`JU.CAT`.
2. **Čo chýba:** Neexistujú absolútne žiadne CI4 Modely, Controllery, ani Servicy. Chýba tabuľka `bytudaje`.
3. **Čo je forensic potvrdené:** Legacy procedúry sú volané cez menu a ukladajú do existujúcich tabuliek `byt`, `elsasa` atď. Typy polí a počty záznamov boli presne zistené z MariaDB.
4. **Čo je OPEN ISSUE:** Výpočtová logika (vzorce, zaokrúhľovanie) pre legacy procedúry (`pDomacnost` a ďalšie) sa nenachádza v čitateľnom tvare v `JU.TTT`/`PRINTER.TXT` a vyžaduje hlbšiu binárnu analýzu. Chýba tabuľka `bytudaje`.
5. **Ďalší implementačný krok pre Julesa:** Vykonanie hlbšieho dumpu/analýzy FAND `.000` a `.RDB` štruktúr pomocou dedikovaného parsovacieho nástroja na získanie FAND výpočtovej logiky, nasledované návrhom CI4 Modelov.
