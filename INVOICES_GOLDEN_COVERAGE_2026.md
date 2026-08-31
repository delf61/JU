# INVOICES GOLDEN COVERAGE 2026

## 1. Scope
The goal is to verify whether `InvoicesGoldenTest.php` performs a full-dataset golden validation against all available 2026 invoice records in `ju_migration_test` (both `kp` and `kz`), or if it only tests a partial subset.

## 2. Database Dataset
Direct SQL queries on `ju_migration_test` database filtering by the native date field `a`:

- `SELECT COUNT(*) FROM kp WHERE a >= '2026-01-01' AND a < '2027-01-01'` returns **6** records.
- `SELECT COUNT(*) FROM kz WHERE a >= '2026-01-01' AND a < '2027-01-01'` returns **33** records.

## 3. InvoicesGoldenTest Query Analysis
The `InvoicesGoldenTest` utilizes the CI4 Query Builder to fetch records dynamically for the 2026 period:
- `$builderKz->where('YEAR(a)', 2026);`
- `$builderKp->where('YEAR(a)', 2026);`

It iterates over all these records, and verifies their FAND forensic components individually.

## 4. kp Coverage
- Available 2026 records: 6
- Fetched by test: 6
- Evaluated by test: 6

## 5. kz Coverage
- Available 2026 records: 33
- Fetched by test: 33
- Evaluated by test: 33

## 6. Full-Dataset Verification
The test is officially a **FULL DATASET VERIFIED** test because the number of fetched and evaluated records matches the exact number of available database records for the specified period. Each record is processed individually.

## 7. Exact Comparison Counts

| Dataset | Dostupné 2026 | Testom načítané | Skutočne porovnané | Neporovnané | Rozdiely |
| :--- | :---: | :---: | :---: | :---: | :---: |
| kp | 6 | 6 | 6 | 0 | 0 |
| kz | 33 | 33 | 33 | 0 | 10 |
| **TOTAL** | **39** | **39** | **39** | **0** | **10** |

## 8. Exact Discrepancy Counts
Currently, because the `LiabilityService.php` application code was specifically requested **not to be modified** in this task to fix issues if found, the tests show 10 discrepancies across `kz` records. This is because the test logic now accurately checks the mathematical truth of the records against the CI4 service (which lacks the `abs($zn - $uhrada) < 0.1` tolerance patch, `$par_69`, and `$vyrovn` patches currently).

The 10 discrepant documents are:
- `kz` | 008/2026 | status | FAND: ■ | CI4: > | numerical diff: N/A | reason: Missing <0.1 tolerance logic.
- `kz` | 014/2026 | status | FAND: ■ | CI4: > | numerical diff: N/A | reason: Missing <0.1 tolerance logic.
- `kz` | 015/2026 | status | FAND: ■ | CI4: > | numerical diff: N/A | reason: Missing <0.1 tolerance logic.
- `kz` | 016/2026 | zn | FAND: 83.17 | CI4: 102.30 | diff: 19.13 | reason: par_69 flag not utilized, DPH not zeroed out.
- `kz` | 018/2026 | status | FAND: ■ | CI4: < | numerical diff: N/A | reason: Missing <0.1 tolerance logic.
- `kz` | 024/2026 | zn | FAND: 8.64 | CI4: 8.63 | diff: 0.01 | reason: vyrovn missing from sum.
- `kz` | 025/2026 | zn | FAND: 39.87 | CI4: 49.04 | diff: 9.17 | reason: par_69 flag not utilized, DPH not zeroed out.
- `kz` | 030/2026 | status | FAND: ■ | CI4: < | numerical diff: N/A | reason: Missing <0.1 tolerance logic.
- `kz` | 031/2026 | zn | FAND: 133.38 | CI4: 164.06 | diff: 30.68 | reason: par_69 flag not utilized, DPH not zeroed out.
- `kz` | 033/2026 | status | FAND: ■ | CI4: < | numerical diff: N/A | reason: Missing <0.1 tolerance logic.

## 9. List of uncovered records
None. 0 records are uncovered.

## 10. Conclusion

**FULL COVERAGE**
**10 DIFFERENCES**

The `InvoicesGoldenTest` fully tests all available `kp` and `kz` records for the year 2026. It guarantees full coverage of the 2026 migration dataset. As intended, it correctly detects the 10 discrepancies that exist between the current CodeIgniter 4 migration code and the historical legacy rules.
