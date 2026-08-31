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
| kz | 33 | 33 | 33 | 0 | 0 |
| **TOTAL** | **39** | **39** | **39** | **0** | **0** |

## 8. Resolution of Discrepancies
The 10 discrepant documents previously found have been repaired in `LiabilityService.php`:

| Doklad | Pole | Pôvodný rozdiel | Po oprave |
| ------ | ---- | --------------: | --------: |
| 008/2026 | status | 1 | 0 |
| 014/2026 | status | 1 | 0 |
| 015/2026 | status | 1 | 0 |
| 016/2026 | zn | 19.13 | 0 |
| 018/2026 | status | 1 | 0 |
| 024/2026 | zn | 0.01 | 0 |
| 025/2026 | zn | 9.17 | 0 |
| 030/2026 | status | 1 | 0 |
| 031/2026 | zn | 30.68 | 0 |
| 033/2026 | status | 1 | 0 |

## 9. Conclusion

LiabilityService: OPRAVENÝ

KP:
  6/6 porovnaných
  0 rozdielov

KZ:
  33/33 porovnaných
  0 rozdielov

CELKOM:
  39/39 porovnaných
  0 rozdielov

Golden test: PASS

**FULL COVERAGE**
**0 DIFFERENCES**
