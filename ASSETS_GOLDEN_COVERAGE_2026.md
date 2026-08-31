# Assets Golden Validation 2026

## Overview
This document details the golden validation coverage for the Assets (HaN Majetok) module, migrating legacy FAND functions `pHm_a_Nehm` and `pNaklady` into CodeIgniter 4's `AssetService`.

## Coverage Details

### Database & Tables
- **Database:** `ju_migration_test`
- **Tables Evaluated:** `ikzp`, `ikdkp`

### `ikzp` (Investičný majetok - Tangible/Intangible Assets)
- **2026 Records Available:** 1
- **2026 Records Evaluated:** 1
- **Skipped:** 0
- **Comparisons per record:** 9 (`obstar_Bez_DPH`, `dph_sk`, `o`, `o_s`, `oo`, `voO`, `vo`, `z`, `zo`)
- **Total Assertions for IKZP:** 9
- **Discrepancies:** 0

### `ikdkp` (Drobný majetok - Minor Assets)
- **2026 Records Available:** 0
- **2026 Records Evaluated:** 0
- **Skipped:** 0
- **Comparisons per record:** 5 (`jc_mn`, `bez_dph`, `bez_dph_mn`, `dph_sk`, `dph_sk_mn`)
- **Total Assertions for IKDKP:** 0
- **Discrepancies:** 0

## Discrepancies
No discrepancies were found between the independent FAND simulation and the `AssetService` logic.

## Final Result
**PASS** - 100% of available 2026 records evaluated and successfully matched expected outcomes based strictly on extracted `PRINTER.TXT` logic.