# JULES TASK — Forensic Extraction PropertyManagement

## 1. Scope
This document outlines the forensic extraction of the legacy FAND module `PropertyManagement` targeting future CI4 migration into `PropertyController` and `UtilityService` according to `MIGRATION_MAP.md`.

## 2. Legacy functions
The module covers the following legacy functions:
- `pDomacnost`
- `pVyuctSBD`
- `pVyuctSSE`
- `pVyucH2OSasa`
- `pOdpoceTeplo`

## 3. Source evidence
These functions are referenced in:
- `JU.TTT`: `'Plat. predpisy - byt SBD' : proc(pDomacnost)`, `pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`.
- `JU.RDB`: Definitions like `PpDomacnost`, `PpVyuctSBD`, `PpVyuctSSE`, `PpVyucH2OSasa`, `PpOdpoceTeplo`.
- `JU.CAT`: Maps logical tables (e.g., `elsasa`, `h2o_sasa`, `teplo`, `byt`) to physical `.000` files.

However, the exact calculation formulas and conditional branches are compiled in binary structures within `.RDB` or `.000` definition files, which are not accessible as plain text via strings/grep. The explicit logic mapping is marked as an `OPEN ISSUE`.

## 4. Table/field mapping
- **Legacy `byt.000`** → MariaDB `byt`: Fields include `mr`, `mo`, `a1`, `a2a`-`a2h`, `a3`-`a5`, `b1`-`b10`.
- **Legacy `bytudaje.000`** → MariaDB `bytudaje`: OPEN ISSUE — Table does not exist in the migration database.
- **Legacy `elsasa.000`** → MariaDB `elsasa`: Fields include `mp`, `mr`, `el_v`, `spotreba_v`, `el_n`, `spotreba_n`, `sk_v`, `sk_n`, `dni`, `den_spo_v_`, `den_spo_n_`, `den_spo_v`, `den_spo_n`, `pausal`, `dph`, `vymena`.
- **Legacy `h2o_sasa.000`** → MariaDB `h2osasa`: Fields include `mp`, `mr`, `h2o_v`, `h2o_n`, `sk_v`, `sk_n`, `dph`, `spotreba`, `dni`, `priemer_l`, `priemer`.
- **Legacy `teplo.000`** → MariaDB `teplo`: Fields include `mr`, `mo`, `zac_ob`, `kon_ob`, `zac_ku`, `kon_ku`, `zac_sp`, `kon_sp`, `zac_de`, `kon_de`.
- **Legacy `vyuctsse.000`** → MariaDB `vyucsse`: Fields include `mr`, `mo`, `zac_el`, `kon_el`, `j_cena`, `pausal`, `el`.
- **Legacy `vyuctspp.000`** → MariaDB `vyucspp`: Fields include `mr`, `mo`, `zac_pl`, `kon_pl`, `j_cena`, `pausal`, `pl`.

## 5. pDomacnost
- **Inputs:** `byt` (`a1`, `a3`-`a5`, `b1`-`b10`). `bytudaje` (missing).
- **Calculations:** OPEN ISSUE — specific extraction of calculation logic is blocked by binary format.
- **Outputs:** Values in `byt`.

## 6. pVyuctSBD
- **Inputs:** `byt`.
- **Calculations:** OPEN ISSUE — specific extraction of calculation logic is blocked by binary format.
- **Outputs:** OPEN ISSUE.

## 7. pVyuctSSE
- **Inputs:** `elsasa` (`el_v`, `spotreba_v`), `vyucsse` (`zac_el`, `kon_el`, `j_cena`, `pausal`).
- **Calculations:** OPEN ISSUE — specific extraction of calculation logic is blocked by binary format.
- **Outputs:** Values in `elsasa`.

## 8. pVyucH2OSasa
- **Inputs:** `h2osasa` (`h2o_v`, `h2o_n`, `sk_v`, `sk_n`, `dph`, `spotreba`, `dni`, `priemer_l`, `priemer`).
- **Calculations:** OPEN ISSUE — specific extraction of calculation logic is blocked by binary format.
- **Outputs:** Values in `h2osasa`.

## 9. pOdpoceTeplo
- **Inputs:** `teplo` (`zac_ob`, `kon_ob`, `zac_ku`, `kon_ku`, `zac_sp`, `kon_sp`, `zac_de`, `kon_de`).
- **Calculations:** OPEN ISSUE — specific extraction of calculation logic is blocked by binary format.
- **Outputs:** Values in `teplo`.

## 10. Database verification
Tables verified via MariaDB query:
- `byt`: 30 records, max year 2005.
- `bytudaje`: 0 records (Table doesn't exist) -> OPEN ISSUE — no real legacy dataset available.
- `elsasa`: 61 records, max year 2020.
- `h2osasa`: 30 records, max year 2025.
- `teplo`: 4 records, max year 2005.
- `vyucsse`: 8 records, max year 2003.
- `vyucspp`: 26 records, max year 2005.

## 11. Available datasets
- `elsasa`: 2020
- `h2osasa`: 2025
- `byt`: 2005
- `teplo`: 2005 (very few records)
- `vyucsse`: 2003
- `vyucspp`: 2005

## 12. Recommended Golden datasets
- **ElSasa:** Target Year 2020 (source: MariaDB max date).
- **H2OSasa:** Target Year 2025 (source: MariaDB max date).
- **Byt / Teplo / VyucSSE / VyucSPP:** The dataset is extremely old (2003-2005) with very few records. Selecting an ideal year is difficult. Using the max year available (2005) is the only fallback.

## 13. Floating-point / rounding risks
- All amounts are stored in MariaDB as `DECIMAL(7,2)`, `DECIMAL(7,3)`, `DECIMAL(6,2)`, `DECIMAL(5,1)`.
- OPEN ISSUE — Specific legacy FAND Real48 rounding procedures are undocumented in available source texts.

## 14. Dependencies
- Needs actual `.RDB` or `.000` text-exported structures to get calculation formulas.
- Needs MariaDB configured with `ju_migration_test`.

## 15. OPEN ISSUE
- Complete calculation algorithms for all 5 functions are inaccessible without binary extraction.
- `bytudaje` table is missing.
- Insufficient modern datasets for `teplo`, `vyucsse`, `vyucspp`, and `byt`.

## 16. Recommended CI4 migration architecture
CI4 migration should implement:
- Models: `BytModel`, `ElsasaModel`, `H2osasaModel`, `TeploModel`, `VyucsseModel`, `VyucsppModel`.
- Service: `UtilityService` to contain the extraction algorithms.
- Controller: `PropertyController` to expose endpoints.
Presently, NO components exist.

## 17. Recommended validation strategy
- Golden tests should query raw inputs for a specific valid year (e.g., 2025 for `h2osasa`).
- Calculate expected outputs dynamically using pure logic (once extracted), entirely separate from `UtilityService`.
- Assert CI4 output matches the dynamically calculated expectation.

---
### Report Summary
- **Functions analysed:** 5/5
- **Tables verified:** 7 (1 missing - `bytudaje`)
- **Fields verified:** Mapped against MariaDB schema.
- **Datasets available:** Sufficient for elsasa (2020) and h2osasa (2025). Obsolete for others (2003-2005).
- **Recommended Golden year/dataset:** 2025 for H2OSasa, 2020 for ElSasa.
- **OPEN ISSUES:** Calculation formulas missing from plaintext; `bytudaje` missing.
- **CI4 files created:** 0
- **Unrelated files changed:** 0
