# DPH ANALYSIS

## 1. Scope
This document provides a read-only analysis of the legacy FAND DPH (VAT) module in preparation for a future CodeIgniter 4 migration. No changes have been made to application code, databases, or legacy FAND data files. All findings are derived from `PRINTER.TXT` logic, actual `DPH.000` / `SADZBDPH.000` data extraction, and structural analysis.

## 2. Legacy Functions
- **`pDPH`** (VERIFIED): Calculates and prepares VAT returns. It processes Cashbook (`PD`) and Invoices (`KP`/`KZ`), extracts relevant transactions based on date ranges (`PARAM.MinCas` and `PARAM.AktCas`), and accumulates totals by tax rate (lower and upper) into `PARAM` fields using reports (`rDPH_vystup`, `rDPH_vstupP1`, `rDPH_vstupKZ`, etc.). It then stores these aggregated values in `DPH.000`.
- **`pSadzbDPH`** (VERIFIED): A simple data editor that manages the historical VAT rate table (`SADZBDPH.000`), enforcing validity ranges.

## 3. Database Schema

### `SADZBDPH`
- `DPH_Dol`: `F,2.1` (lower VAT rate in percent, e.g. 10.0%, 19.0%)
- `DPH_Hor`: `F,2.1` (upper VAT rate in percent, e.g. 20.0%, 23.0%)
- `od`: `D` (start date of validity)
- `do`: `D` (end date of validity)
- **Primary Key**: Implicitly chronological intervals (`od`, `do`). VERIFIED.

### `DPH`
- Contains calculated summaries for tax return periods.
- The schema structure varies historically. The 2003 schema has 46-byte records. The 2026 (global) schema has 67-byte records.
- **Fields (VERIFIED via PRINTER.TXT)**:
  - `OD`, `DO`: `D,6`
  - `DPH1`, `DPH2`: `F,2.1` (stored as scaled integers or floats in older years, and full Real48 in newer formats)
  - `SUM1VSTUP`, `DPH1VSTUP`, `SUM2VSTUP`, `DPH2VSTUP` (Real48 fields)
  - `SUM1VYSTUP`, `DPH1VYSTUP`, `SUM2VYSTUP`, `DPH2VYSTUP`
  - `R13` (calculated from `PD[x].a3` where `c=~'9'`)
  - Additional `_PAR_69` fields in newer formats.

## 4. Actual Data Analysis
- `SADZBDPH.000` contains 7 records from 1999 to 2100.
- `DPH.000` (global) contains 112 records of 67 bytes, starting from 1999-05-10.
- `Delf2003/DPH.000` contains 21 records of 46 bytes.
- This confirms that VAT periods can overlap chronologically (e.g., Q1, Q2, Q3, Q4 generated repeatedly as working records).

## 5. VAT Rate History (VERIFIED from data)
1. 1999-01-01 to 1999-06-30: 6% / 23%
2. 1999-07-01 to 2002-12-31: 10% / 23%
3. 2003-01-01 to 2003-12-31: 14% / 20%
4. 2004-01-01 to 2007-12-31: 19% / 19%
5. 2008-01-01 to 2010-12-31: 10% / 19%
6. 2011-01-01 to 2024-12-31: 10% / 20%
7. 2025-01-01 to 2100-12-31: 19% / 23%

## 6. pSadzbDPH
- It opens the `eSadzbDPH` form over the `SadzbDPH` table.
- Modifies historical records. Does not recalculate past periods automatically.

## 7. pDPH
- Selects period (`Q` for quarterly, `M` for monthly).
- Clears temporary fields `PARAM.a1`, `PARAM.a2`, etc.
- Uses `#I_ KP ! (dph<>0 & zp>=PARAM.MinCas & zp<=PARAM.AktCas)` to get outgoing invoices.
- Accumulates base (`z`) and VAT (`dph_sk`) into `PARAM.a1`/`a2` (lower rate) or `PARAM.a3`/`a4` (upper rate).
- Similar loops execute over `PD` (Cashbook) and `KZ` (Incoming invoices).
- For `PD`, it extracts records with `(dph>0 & (a2<>0 | a4<>0))` avoiding non-taxable transactions.
- Writes the total to a new `DPH` record.

## 8. Invoice Integration
- **KP (Outgoing Invoices)**: Filters by `zp` (zdaniteľné plnenie) within the date range. Uses `z` (base) and `dph_sk` (tax). Rate is determined by `dph` field.
- **KZ (Incoming Invoices)**: Filters by `zp` and additionally uses `dph_sk1` (lower rate) and `dph_sk` (upper rate) if both apply.

## 9. Cashbook Integration
- **PD (Cashbook)**: Filters by date `a`, requires `dph>0` and expenditure/income values `(a2>0 | a4>0)`.
- It distinguishes between different types of cashbook entries to classify them correctly in the VAT return.

## 10. Historical / Year-Dependent Rules
- `pDPH` explicitly checks years:
  - `< 01.01.2003`: `rDPH_vstupKZ`
  - `< 01.04.2003`: `rDPH_vsNewKZ`
  - `>= 01.04.2003`: `rDPH_vsNew02`
  - `>= 01.09.2025`: `rDPH_vstKZ69`
- Currency (`mena`) changes dynamically based on `< 01.01.2009` (`Sk` vs `Eur`).

## 11. Calculations and Rounding
- Cashbook: `hot_vydaj := cond(ok='n': 0, else : a2 + ((a2 * (dph/100)) round 1) ...`
- Note: Pre-2009 SKK rounding is `round 1` (to 10 haliers) or `round 0`. Post-2009 EUR rounding is `round 2` (to cents). This is VERIFIED from legacy procedures in Cashbook/DPH.

## 12. Dependencies
- **DIRECT**: `PD` (Cashbook), `KP` (Outgoing Invoices), `KZ` (Incoming invoices), `SADZBDPH` (Rates).
- **INDIRECT**: `PARAMCAT` (active year), `PARAM` (variables).

## 13. Proposed CI4 Architecture
- **Models**: `DphModel` (for `DPH`), `SadzbdphModel` (for `SADZBDPH`).
- **Service**: `VatService` (handles calculation of VAT across invoices and cashbook using dynamic date queries and summing).
- **Controllers**: `TaxController` (for viewing/exporting).

## 14. Migration Completeness Criteria
- `CORE`: Implement reading historical VAT rates and dynamically calculating VAT base and tax per quarter/month.
- `SECONDARY`: Generating XML formats for current Slovak Tax Authority (not FAND scope, but required for modern use).

## 15. Risks
- **HIGH**: Complex branching logic in `pDPH` for historical date boundaries (2003, 2025). Recreating the exact historical tax returns requires replicating these specific SQL filters.
- **MEDIUM**: Precision rounding differences between PHP/MariaDB and FAND's legacy `Real48` and manual `round 1` or `round 2` statements.

## 16. Open Questions / UNVERIFIED Items
- *NEOVERENÉ*: Exact handling of partial tax deductions (koeficient) if used in legacy data.
- *NEOVERENÉ*: How `ArcIntCis` is populated and used.

## 17. Recommended Implementation Order
1. Migrate `SADZBDPH` (VatRateModel).
2. Write queries to pull `KP`, `KZ`, and `PD` sums for a date range.
3. Compare CI4 generated sums with legacy `DPH.000` sums to verify accuracy.
4. Implement UI for VAT returns.

## 18. Final Recommendation
NOT READY – FURTHER ANALYSIS REQUIRED.
While the data structures and main loops are identified, recreating the exact `rDPH_vstup` variations (there are ~6 different report structures depending on the year) in a single CI4 service requires translating complex legacy FAND filter expressions (e.g. `U_H='U' & pc>=DPH_Sum & zp>=PARAM.MinCas`) directly into Query Builder.
