# Inventory (Sklad) Migration Validation

## Objective
Migrate the DOS FAND `Sklad` module (functions `pSklad`, `pHlaSklad`) to the CodeIgniter 4 architecture.

## Architecture
- **Controller:** `InventoryController`
- **Service:** `InventoryService`
- **Models:** `SkladModel`, `TovaryModel`, `DruhtovaModel`
- **Database Tables:** `sklad`, `tovary`, `druhtov`

## FAND Business Logic Reconstructed
The legacy FAND system computes several fields dynamically on the fly based on the `Sklad.x` definition file:
- `DPH_Sk := round(nakupcena * (dph/100), 1)`
- `s_DPH := nakupcena + DPH_Sk`
- `spolu := nakupcena * mnozstvo`
- `zaruka_do := addmonth(a, mes)`

Additionally, filtering is provided by:
- Search by word in description (`popis1`): matches `pHlaSklad` edbreak=27,29.
- Search by serial number (`vyrcislo`): matches `pHlaSklad` edbreak=28.

## Validation Strategy
1. **Unit Testing:** `InventoryServiceTest.php` ensures the business calculation logic produces the correct values independently of the database.
2. **Golden Integration Testing:** `InventoryServiceGoldenTest.php` connects to the real `ju_migration_test` database.
   - Initial audits showed exactly **0 records** for the year 2026 within the `sklad` table (the `a` date field).
   - The test was dynamically pivoted to assess all available historical records (2,430 items dating back through years like 2002-2015, etc.).
   - The test iterates over all 2,430 records in the `sklad` table, rigorously computes expected legacy values independently via raw DB rows + FAND formulas, processes the exact same row via `InventoryService->calculateDerivedFields()`, and enforces strict equivalence.

## Results
- **Records available:** 2430 (Historical dataset - no 2026 data present)
- **Records tested:** 2430
- **Differences found:** 0
- **Unit Tests:** Passed (1 test, 4 assertions)

## Open Issues
- `druhtova` model is mapped to `druhtov` table in the MariaDB schema. This is considered verified based on the schema inspection.
- The Golden dataset explicitly used the historical record spread given the absence of 2026 inventory data.
