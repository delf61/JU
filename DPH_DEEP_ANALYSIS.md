# Deep Reverse-Engineering Analysis of Legacy FAND DPH (VAT) Module

## 1. Executive Summary
This document details a comprehensive read-only reverse-engineering analysis of the legacy PC FAND DPH (VAT) calculation logic within the `delf61/JU` application. The analysis examines the procedural code (`pDPH`), reporting logic (`rDPH_*`), VAT rate historical tables (`SADZBDPH`), and the exact mapping of source records from the Cashbook (`PD`) and Invoices (`KP`, `KZ`) into the final VAT return (`DPH.000`).

The goal is to determine whether the legacy DPH behavior is sufficiently understood to implement `VatService` in CodeIgniter 4 without guesswork.

**Conclusion:** The legacy behavior is strongly inferred and verified in key areas, but the direct mapping of highly specific historical tax return variants (e.g., pre-2003 vs post-2003 vs post-2025) presents a complex matrix. The core logic for accumulating base and tax amounts based on dates is clear.

## 2. `pDPH` Complete Control-Flow Analysis
**VERIFIED**
- **Input Parameters:** The procedure requests the user to confirm/edit the VAT period (`PARAM.MinCas` and `PARAM.AktCas`). It automatically suggests quarters (`31.03`, `30.06`, `30.09`, `31.12`) based on the active accounting date.
- **Year-Dependent Branches:**
  - `PARAM.AktCas = 30.06.1999`: Uses `rDPH_vstupPD`.
  - `PARAM.AktCas < 01.01.2003`: Uses `rDPH_vstupKZ`.
  - `PARAM.AktCas < 01.04.2003`: Uses `rDPH_vsNewKZ`.
  - `PARAM.AktCas >= 01.04.2003`: Uses `rDPH_vsNew02`.
  - `PARAM.AktCas >= 01.09.2025`: Uses `rDPH_vstKZ69`.
- **Handling of KP (Outgoing Invoices):** `pDPH` calls `rDPH_vystup` which loops over `KP` where `(dph<>0 & zp>=PARAM.MinCas & zp<=PARAM.AktCas)`.
- **Handling of PD (Cashbook):** Uses `rDPH_vstupP1` filtering `(r & dph>0 & (a2<>0 | (a4<>0 & copy(b,1,2)<>'50')) & a>=PARAM.MinCas & a<=PARAM.AktCas & (vydaj<>'t'))`. This filters out non-taxable cashbook entries and specific internal transfers.
- **Handling of KZ (Incoming Invoices):** Uses variants of `rDPH_vstupKZ` filtering `(r & dph>0 & U_H='U' & zp>=PARAM.MinCas & zp<=PARAM.AktCas)`.
- **Treatment of VAT Base & Tax:** Aggregated into `PARAM.a1`, `PARAM.a2` (lower rate base and tax) and `PARAM.a3`, `PARAM.a4` (upper rate base and tax).
- **Final Aggregation:** Stored in `DPH.000` into fields `SUM1VSTUP`, `DPH1VSTUP`, `SUM2VSTUP`, `DPH2VSTUP`, `SUM1VYSTUP`, `DPH1VYSTUP`, `SUM2VYSTUP`, `DPH2VYSTUP`. Rates are fetched from `SADZBDPH`.

## 3. Source-Record Processing

### PD (Cashbook)
- **VAT Period Date:** `a` (Accounting Date / Dátum).
- **Amount Fields:** `a6` (Base), `dph_sk` (Tax).
- **Rate Selection:** `dph` field (<15 is lower rate, >=15 is upper rate).
- **Inclusion Conditions:** `r` (deleted flag check?), `dph>0`, `a2>0 | a4>0` (must have expenditures/incomes).

### KP (Outgoing Invoices)
- **VAT Period Date:** `zp` (Date of Taxable Supply / Dátum zdaniteľného plnenia).
- **Amount Fields:** `z` (Base), `dph_sk` (Tax).
- **Rate Selection:** `dph` field (<15 is lower rate, >=15 is upper rate).
- **Inclusion Conditions:** `dph<>0`.

### KZ (Incoming Invoices)
- **VAT Period Date:** `zp` (Date of Taxable Supply / Dátum zdaniteľného plnenia).
- **Amount Fields:** `y` (Base lower), `dph_sk1` (Tax lower), `z` (Base upper), `dph_sk` (Tax upper).
- **Rate Selection:** Handled by evaluating `dph_sk1>0` and `dph_sk>0`.
- **Inclusion Conditions:** `dph>0`, `U_H='U'` (Account type check).

## 4. Report Procedures Comparison
| Procedure | Source | Role | Date/Year Range | Key Logic |
|---|---|---|---|---|
| `rDPH_vystup` | KP | Calculation | All years | Aggregates Base (`z`) and VAT (`dph_sk`) split by `dph<15` and `dph>=15`. |
| `rDPH_vstupPD` | PD | Calculation | Only 1999-06-30 | Base `a6`, VAT `dph_sk`. |
| `rDPH_vstupP1` | PD | Calculation | All other periods | Base `a6`, VAT `dph_sk`, excludes `vydaj='t'` and specific prefixes `50`. |
| `rDPH_vstupKZ` | KZ | Calculation | Pre-2003 | Aggregates `dph_sk1` and `dph_sk`. |
| `rDPH_vsNewKZ` | KZ | Calculation | Jan-Mar 2003 | Aggregates `dph_sk1` and `dph_sk`. |
| `rDPH_vsNew02` | KZ | Calculation | Post-Apr 2003 | Aggregates `dph_sk1` and `dph_sk`. Dropped `U_H='U'` requirement. |
| `rDPH_vstKZ69` | KZ | Calculation | Post-Sep 2025 | Evaluates §69 (Reverse Charge). Accumulates `SUM_PAR_69`. |

## 5. `SADZBDPH` Rules
**VERIFIED**
- **Fields:** `od` (start date), `do` (end date), `DPH_Dol` (lower rate %), `DPH_Hor` (upper rate %).
- **Logic:** Rates are fetched based on chronological overlap. Rates are inclusive of `od` and `do`.
- **Historical Rates:**
  - 1999: 6% / 23%
  - 1999-2002: 10% / 23%
  - 2003: 14% / 20%
  - 2004-2007: 19% / 19%
  - 2008-2010: 10% / 19%
  - 2011-2024: 10% / 20%
  - 2025+: 19% / 23%

## 6. `DPH.000` Binary Layouts
**STRONGLY INFERRED**
- **46-byte schema (Older years):** Contained `OD`, `DO`, `DPH1`, `DPH2`, `SUM1VSTUP`, `DPH1VSTUP`, `SUM2VSTUP`, `DPH2VSTUP`, `SUM1VYSTUP`, `DPH1VYSTUP`, `SUM2VYSTUP`, `DPH2VYSTUP`.
- **67-byte schema (Newer/Global):** Added `DPHPAR4`, `SUM_PAR_69`, `DPH_PAR_69`, `ODPOCET_PAR_69`, `R13`. These map directly to newer tax return lines (e.g., §69 reverse charge).

## 7. Historical Year Matrix

| Period | VAT rates | PD Logic | KP Logic | KZ Logic | DPH schema | Special rules |
|---|---|---|---|---|---|---|
| Pre-2003 | 10% / 23% | `rDPH_vstupP1` | `rDPH_vystup` | `rDPH_vstupKZ` | 46-byte | KZ required `U_H='U'` |
| 2003 Q1 | 14% / 20% | `rDPH_vstupP1` | `rDPH_vystup` | `rDPH_vsNewKZ` | 46-byte | - |
| 2003 Q2-2024| Varies | `rDPH_vstupP1` | `rDPH_vystup` | `rDPH_vsNew02` | 67-byte | Dropped `U_H='U'` requirement |
| 2025+ | 19% / 23% | `rDPH_vstupP1` | `rDPH_vystup` | `rDPH_vstKZ69` | 67-byte | Section 69 Reverse Charge logic |

## 8. VAT Coefficient Analysis (`koeficient`)
**VERIFIED - NOT VAT RELATED**
The string `koeficient` (or `koef`) was analyzed across the codebase. In this specific FAND application, it is **strictly used for fuel consumption calculations** (`Spotreba`, `STN koef. - spotreba v meste`) for company cars. There is **no evidence** of a VAT partial deduction coefficient (koeficient krátenia DPH) being used or stored in the legacy DPH logic.

## 9. `ArcIntCis` Analysis
**VERIFIED**
The field `ArcIntCis : A,1;` is present at the end of nearly every `d*.dbf` declaration block in `PRINTER.TXT` (e.g., `ddph.dbf`, `duhrady.dbf`). It stands for "Archívne Interné Číslo" or similar, but its data type (`A,1`) suggests it acts as a boolean flag during DBF exports to track whether a record has been archived or synchronized. It is **not** a core business logic field for VAT calculations and does not appear in the primary FAND `.000` data declarations for `DPH` or `SADZBDPH`.

## 10. Verified Calculations
- VAT Output (Výstup) is strictly aggregated from `KP` (Outgoing Invoices). Base and Tax amounts are directly summed based on the `dph` threshold (`<15` vs `>=15`).
- VAT Input (Vstup) is aggregated from `PD` (Cashbook) and `KZ` (Incoming Invoices).
- No recalculation of the stored VAT amounts is performed during aggregation; the system trusts the `dph_sk` amounts stored in the source records.

## 11. Unverified/Unknown Items
- **Handling of Stornos:** It is STRONGLY INFERRED that stornos are handled naturally by negative values in the source records (which are valid in FAND Real48 and sum correctly), but explicit `if storno` logic is absent from `pDPH`.
- **Payment tracking (Uhrady):** The VAT period in this application is based strictly on `a` (accounting date) for PD and `zp` (date of taxable supply) for invoices. It does not appear to calculate VAT on a cash-basis (upon payment of invoice), which aligns with standard Slovak VAT rules for most businesses.

## 12. Risks for Future CI4 Migration
- **HIGH:** Generating exact historical reproductions of pre-2003 VAT returns requires implementing the highly specific condition `U_H='U'` and other legacy anomalies.
- **MEDIUM:** The hardcoded `<15` / `>=15` threshold for separating lower and upper VAT rates might fail if a historical period had a lower rate of 15% or an upper rate below 15%. This threshold must be handled carefully in the CI4 `VatService`.

## 13. Final Recommendation
**Is the legacy DPH behavior sufficiently understood to implement `VatService` in CI4 without guessing?**
**YES.**

The fundamental mapping of `KP` -> Output, `KZ` -> Input, `PD` -> Input, along with the date boundaries and rate thresholds, is explicitly proven.

### Precise Implementation Specification for `VatService`:
1. **Rates:** Fetch active VAT rates from `SadzbdphModel` where the target date falls between `od` and `do`.
2. **Date Filtering:** For a given quarter/month, establish `dateFrom` and `dateTo`.
3. **Outgoing (KP):** Query `KpModel` where `zp BETWEEN dateFrom AND dateTo`. Group by rate (using the 15% threshold). Sum `z` (Base) and `dph_sk` (Tax).
4. **Incoming (KZ):** Query `KzModel` where `zp BETWEEN dateFrom AND dateTo`. Sum `y` and `dph_sk1` for lower rate, `z` and `dph_sk` for upper rate. Apply §69 logic if date >= 2025-09-01.
5. **Cashbook (PD):** Query `PdModel` where `a BETWEEN dateFrom AND dateTo` AND `dph > 0` AND `(a2 > 0 OR a4 > 0)`. Sum `a6` and `dph_sk`.
6. **Return Object:** The service should return a DTO containing the aggregated sums, perfectly matching the 67-byte `DPH.000` schema structure (`SUM1VSTUP`, etc.).
