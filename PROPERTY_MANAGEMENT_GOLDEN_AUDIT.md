# PROPERTY MANAGEMENT GOLDEN TEST AUDIT

## 1. Executive Summary

GOLDEN VALIDATION: OPEN ISSUE

The forensic audit of the Golden Validation suite for `PropertyManagement` indicates that the validation logic for `pVyucH2OSasa` (water) is sound, independent, and correctly utilizes historical database outputs for assertions. However, datasets for `pVyuctSSE` (electricity), `pDomacnost` (byt), and `pOdpoceTeplo` (heat) are not properly validated. The electricity test is correctly skipped due to dataset limitations (sequential meter states are broken), while the apartment and heat modules lack Golden Tests entirely due to insufficient historical records. No tautological/circular test logic was found in the active validations following the recent corrections.

## 2. Golden test files audited
- `ci4_app/tests/app/Services/PropertyManagementGoldenTest.php`
- `ci4_app/app/Services/PropertyManagementService.php`

## 3. Database datasets and exact counts

Querying the test database directly against `ju_migration_test`:
- `byt` (pDomacnost): 30 records (Max year 2005)
- `elsasa` (pVyuctSSE): 61 records (Max year 2020)
- `h2osasa` (pVyucH2OSasa): 30 records (Max year 2025)
- `teplo` (pOdpoceTeplo): 4 records (Max year 2005)

## 4. Independent expected-value verification

The current implementation in `PropertyManagementGoldenTest.php` correctly avoids tautological design. Instead of generating the expected value using the `PropertyManagementService`, it directly asserts the service's output against the raw historical data snapshot stored in the database:
`$legacySpotreba = (float)($record['spotreba'] ?? 0.0);`
This proves that the independent verification rule is strictly followed. The expected values come from legacy FAND calculation snapshots.

## 5. Dataset coverage matrix

| Modul | DB records | Golden records | Pokrytie | Independent expected | FAND evidence | Výsledok |
| ----- | ---------: | -------------: | -------: | -------------------- | ------------- | -------- |
| `pVyucH2OSasa` | 30 | 30 | 100% | YES | YES | OPEN ISSUE |
| `pVyuctSSE` | 61 | 0 | 0% | NO | YES | OPEN ISSUE |
| `pDomacnost` | 30 | 0 | 0% | NO | PARTIAL | OPEN ISSUE |
| `pOdpoceTeplo`| 4 | 0 | 0% | NO | NO | BLOCKED |
| `pVyuctSBD` | 30 | 0 | 0% | NO | NO | BLOCKED |

## 6. Formula/source verification

- **pVyucH2OSasa (`spotreba`):** The legacy PRINTER.TXT logic (`spotreba := h2o_v - h2o_na_konci_v`) is cleanly translated into `PropertyManagementService.php`. The test loads `spotreba` into `$legacySpotreba` and independently asserts against the service output with `0.01` tolerance. FAND rollover conditions (`h2o_na_konci_v` resetting to 0 when `h2o_v` drops) are correctly verified.

## 7. Findings

1. **Water Validation is Trustworthy:** `testGoldenWater2025` accurately loops through 30 `h2osasa` records. It maintains a loop-state for the previous meter reading (`$previousRecord`), calls the service, and then asserts the result directly against `$record['spotreba']` from the database. Assertions succeed, properly verifying the FAND rollover conditions.
2. **Electricity Validation is Skipped Correctly:** `testGoldenElectricity2020` is explicitly marked as skipped because the `elsasa` dataset records do not form a strict contiguous timeline (missing offsets cause false-positive failures). This is a safe and correct approach rather than faking test data.
3. **Missing Assertions for `spotreba == 0`:** The water test currently only asserts `if ($legacySpotreba > 0)`. It correctly skips testing null/empty consumptions, but it inherently means that cases where the consumption is exactly 0 are not validated.

## 8. OPEN ISSUE

- **OPEN ISSUE:** The test `testGoldenWater2025` only asserts consumption if the legacy spotreba is greater than 0. This masks potential errors where the service might return a non-zero value, but the legacy database actually intended `0`.
- **OPEN ISSUE:** `elsasa` (electricity) lacks a testable contiguous dataset.
- **OPEN ISSUE:** `byt` and `teplo` lack sufficient datasets for robust Golden validation.

## 9. Required corrections

1. In `PropertyManagementGoldenTest.php`, the condition `if ($legacySpotreba > 0)` should ideally be broadened to `if ($legacySpotreba >= 0 && $record['h2o_v'] !== null)` to ensure zero-consumption scenarios (like closed apartments) are correctly validated. However, per instructions ("Nemeň produkčný CI4 kód ani testy iba aby prešli"), I am simply noting this as a methodological finding.

## 10. Final verdict

**GOLDEN VALIDATION: OPEN ISSUE**

The tested portion (`pVyucH2OSasa`) uses a sound, independent methodology directly asserting against legacy DB snapshots. However, the validation coverage is heavily restricted by dataset limitations (skipping electricity and apartments) and a methodological gap (skipping `0` assertions).
