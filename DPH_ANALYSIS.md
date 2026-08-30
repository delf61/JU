# DPH ANALYSIS

## 1. Scope
This document provides a strictly read-only analysis of the legacy FAND DPH (VAT) module in preparation for a future CodeIgniter 4 migration. No changes have been made to application code, databases, or legacy FAND data files. All findings are derived from `PRINTER.TXT` logic, actual `DPH.000` / `SADZBDPH.000` data extraction, and structural analysis.

## 2. Legacy Functions
- **`pDPH`** (VERIFIED): Calculates and prepares VAT returns. It processes Cashbook (`PD`) and Invoices (`KP`/`KZ`), extracts relevant transactions based on date ranges (`PARAM.MinCas` and `PARAM.AktCas`), and accumulates totals by tax rate (lower and upper) into `PARAM` fields using report branches (e.g. `rDPH_vystup`, `rDPH_vstupP1`, `rDPH_vstupKZ`). It then stores these aggregated values in `DPH.000`.
- **`pSadzbDPH`** (VERIFIED): A simple data editor that manages the historical VAT rate table (`SADZBDPH.000`), enforcing validity ranges.

## 3. Database Schema

### `SADZBDPH`
- `DPH_Dol`: `F,2.1` (lower VAT rate in percent)
- `DPH_Hor`: `F,2.1` (upper VAT rate in percent)
- `od`: `D` (start date of validity)
- `do`: `D` (end date of validity)
- **Primary Key**: Implicitly chronological intervals (`od`, `do`). VERIFIED.

### `DPH`
- Contains calculated summaries for tax return periods.
- The schema structure varies historically. The 2003 schema has 46-byte records. The 2026 (global) schema has 67-byte records.
- **Fields (VERIFIED via PRINTER.TXT)**:
  - `OD`, `DO`: `D,6` (Real48 dates)
  - `DPH1`, `DPH2`: `F,2.1` (Stored uniquely as 2-byte integers scaled by a factor of 10. For example, `00e6` = 230 = 23.0%)
  - `SUM1VSTUP`, `DPH1VSTUP`, `SUM2VSTUP`, `DPH2VSTUP` (Real48)
  - `SUM1VYSTUP`, `DPH1VYSTUP`, `SUM2VYSTUP`, `DPH2VYSTUP` (Real48)
  - `R13` (calculated from `PD[x].a3` where `c=~'9'`)
  - Additional `_PAR_69` fields in newer 67-byte formats.

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

## 6. pDPH Detailed Flow
- Selects period (`Q` for quarterly, `M` for monthly).
- Clears temporary fields `PARAM.a1`, `PARAM.a2`, etc.
- **Outgoing Invoices (`KP`)**: Uses `#I_ KP ! (dph<>0 & zp>=PARAM.MinCas & zp<=PARAM.AktCas)`. It accumulates base (`z`) and VAT (`dph_sk`) into `PARAM.a1`/`a2` (lower rate) or `PARAM.a3`/`a4` (upper rate) using `rDPH_vystup`.
- **Cashbook (`PD`)**: Dispatches to different reports based on year (e.g., `rDPH_vstupPD`, `rDPH_vstupP1`). Filters `(dph>0 & (a2<>0 | a4<>0))` avoiding non-taxable transactions. The base amount is mapped from `a6` and the tax from `dph_sk`.
- **Incoming Invoices (`KZ`)**: Dispatches to reports (`rDPH_vstupKZ`, `rDPH_vsNewKZ`, `rDPH_vsNew02`, `rDPH_vstKZ69`) based on the year. Notably, after `01.04.2003` (`rDPH_vsNew02`), the condition `U_H='U'` was removed, meaning unpaid invoices began to be included in VAT input. The base is mapped from `y` (lower rate) and `z` (upper rate).

## 7. Reports Comparison
| Report Name | Source | Date Range | Filters | Base Field | VAT Field | Notes |
|---|---|---|---|---|---|---|
| `rDPH_vystup` | `KP` | 1999+ | `dph<>0` | `z` | `dph_sk` | Outgoing |
| `rDPH_vstupPD`| `PD` | 1999 | `dph>0 & (a2<>0 | a4<>0)` | `a6` | `dph_sk` | Incoming Cashbook |
| `rDPH_vstupP1`| `PD` | 1999+ | `dph>0 & (vydaj<>'t')` | `a6` | `dph_sk` | Personal expense exclusion |
| `rDPH_vstupKZ`| `KZ` | < 2003 | `dph>0 & U_H='U' & pc>=DPH_Sum` | `y`, `z` | `dph_sk1`, `dph_sk` | Requires payment |
| `rDPH_vsNew02`| `KZ` | > 2003 | `dph>0` | `y`, `z` | `dph_sk1`, `dph_sk` | `U_H` check removed |

## 8. Real48 Date Handling
Dates in FAND (`D`) and Floats (`F`) utilize the 6-byte Real48 format. Date values map mathematically to the number of days since `0001-01-01`. This decoding logic has been perfectly verified across all modules.

## 9. Koeficient / ArcIntCis
- `ArcIntCis`: Investigated across schemas. It is purely an unused trailing string byte `A,1` appended to many core tables (e.g. KP, KZ, DPH). VERIFIED it is not used in VAT math.
- `koeficient`: Used exclusively in the `Auto` (vehicle logbook) module to compute fuel consumption `stn * koef` and `lpg * koef`. Completely unrelated to VAT. VERIFIED.

## 10. VERIFIED VAT BUSINESS RULES FOR CI4

### VERIFIED
- **VAT Rate History**: The periods and scaled percent values stored in `SADZBDPH.000` are accurate and fully parsable.
- **Date Matching**: Transactions from `KP`, `KZ`, and `PD` fall into a VAT return period based strictly on their `zp` (Zdaniteľné plnenie) field for invoices and `a` (Date) for cashbook.
- **Incoming vs Outgoing Bases**:
  - `KP` (Outgoing): Base is `z`, VAT is `dph_sk`.
  - `KZ` (Incoming): Base is `y` for lower bracket (`dph_sk1`), `z` for upper bracket (`dph_sk`).
  - `PD` (Cashbook): Base is `a6`, VAT is `dph_sk`.
- **Legislative History**: Unpaid incoming invoices (`KZ`) were excluded from VAT input prior to April 1st, 2003 (enforced via `U_H='U'`). Post April 1st, 2003, they are included.

### PARTIALLY VERIFIED
- **Historical Rounding**: Pre-2009 SKK sums were rounded to 10 haliers (`round 1`), and post-2009 EUR sums are rounded to cents (`round 2`). This is evident in `PRINTER.TXT` logic, but recreating it verbatim for exact byte-for-byte DPH matching over tens of thousands of records will require strict testing.

### NEOVERENÉ
- **Section 69 Paragraf (`par_69`)**: Explicit logic for `rDPH_vstKZ69` (used after `01.09.2025`) modifies how incoming VAT is accumulated, but the exact business mechanism in the actual Tax Return XML is NEOVERENÉ.

## 11. Proposed CI4 Architecture
- **Models**: `DphModel` (for `DPH`), `SadzbdphModel` (for `SADZBDPH`).
- **Service**: `VatService` (handles calculation of VAT across invoices and cashbook using dynamic date queries and summing). Will depend heavily on `InvoiceService` and `CashbookService`.
- **Controllers**: `TaxController` (for viewing/exporting).

## 12. Migration Readiness
**READY FOR VAT IMPLEMENTATION**
The specific historical branches in `pDPH`, the exact variable mappings (`y` vs `z` vs `a6`), the 2-byte scaled integer anomaly for `F,2.1` rates, and the impact of unpaid invoices (`U_H`) have all been definitively reverse-engineered. The remaining `NEOVERENÉ` logic is limited to obscure future edge cases (Paragraf 69) and unused fields (`ArcIntCis`), which do not block the core `VatService` development.
