# Assets Migration Validation

## Summary
Migration of the Assets (HaN Majetok) module from DOS FAND to CI4.

## Module Details
- **Migrated FAND functions:** `pHm_a_Nehm`, `pNaklady`
- **Corresponding CI4 classes:** `AssetService`, `AssetController`, `IkzpModel`, `IkdkpModel`
- **Database mapping:** `ikzp`, `ikdkp`

## Implemented Business Rules

### IKZP (Investičný majetok)
*   **Base Value Calculation:** `obstar_Bez_DPH` calculated correctly using VAT percentage (`((h * 100) / (100 + dph)) round 1`).
*   **Depreciation Logic:** Highly complex logic mapped precisely from `PRINTER.TXT`.
    *   Evaluates `SO` (Spôsob odpisu) as 'R' (Rovnomerné) or 'Z' (Zrýchlené).
    *   Correctly adjusts rates based on `RO` (Rok odpisovania) and `OS` (Odpisová skupina).
    *   Automobile rule applied: If asset name contains "AUTOMOBIL" and `currentYear > 2003`, special depreciation ratios (`oo/2` or `oo/4`) are used depending on `OS`.
    *   Historical Base Rule: If `paramcat.rok < 2002`, the base is taken from `hz`; otherwise it uses `obstar_Bez_DPH`.
*   **Residual Value:** `z` calculated dynamically taking into account the calculated yearly depreciation (`vo`) and current state (`hz`).

### IKDKP (Drobný majetok)
*   **Totals:** Calculates `jc_mn` (`mn * jc`).
*   **VAT Separation:** Extracts base value (`bez_dph`) rounding to 1 decimal point according to legacy rules (`((jc * 100) / (100 + dph)) round 1`).
*   **Multiplied Values:** Appropriately scales `bez_dph` and `dph_sk` by quantity (`mn`).

## Rounding/Date Rules
*   VAT reverse calculations heavily utilize `round(..., 1)` before further math as proven in FAND source (`round 1`).
*   Depreciation rounding enforces `ceil` logic for standard depreciation based on `INT(VOO) + COND(FRAC(VOO)>0:1)`.

## Golden Results
- Tested successfully against the independent calculation rule sets dynamically across the 2026 database. (Refer to `ASSETS_GOLDEN_COVERAGE_2026.md`)

## Known Limitations & OPEN ISSUES
- The legacy logic branches behavior based on the `paramcat.rok`. The current implementation allows injecting `$currentYear` directly to `calculateIkzp` to simulate this state cleanly.
- `ikdkp` currently has 0 records in the 2026 extraction database, but the rules have been verified via unit tests mapping exact FAND formulas.
- FAND legacy `vo` edge cases when `voO` and `o` equal zero require strict conditional execution logic which was handled.

## Final Migration Status
**IMPLEMENTOVANÉ – OVERENÉ**