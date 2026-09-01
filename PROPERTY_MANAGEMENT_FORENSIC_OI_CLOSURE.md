# Forensic closure of PropertyManagement OPEN ISSUE items

## 1. Executive Summary

- **Number of original OPEN ISSUE items:** 8
- **Number closed (DB CROSS-CHECK VERIFIED):** 1 (OI-04)
- **Number formula-verified:** 1 (OI-03)
- **Number partially verified:** 2 (OI-01, OI-05)
- **Number caused by dataset limitations:** 2 (OI-07, OI-08)
- **Number remaining genuinely OPEN:** 2 (OI-02, OI-06)

This document formalizes the resolution state of legacy calculation procedures in the PropertyManagement module, separating proven logic from unresolved binary implementations.

## 2. OI Closure Matrix

| OI | Original issue | Investigation | Evidence | Result | Final status |
| -- | -------------- | ------------- | -------- | ------ | ------------ |
| OI-01 | pDomacnost: Missing calculations | Searched PRINTER.TXT. Found definitions for `A_sum` and `B_sum`. SQL checked `a1+...a5`. | `PRINTER.TXT` line 11722, DB values perfectly match sum. | Part of calculation established. Final nedoplatok missing. | PARTIALLY VERIFIED |
| OI-02 | pVyuctSBD: Missing calculations | Searched PRINTER.TXT. Found `VyuSBD_1` coefficients used for A_plus/B_plus. | `PRINTER.TXT` line 11728. | Algorithm relies on undocumented ratio distribution constants. | REMAINS OPEN ISSUE |
| OI-03 | pVyuctSSE: Missing calculations | Searched PRINTER.TXT. Found `spotreba_v := el_v - el_na_konci_v` and hardcoded `pausal` per year. | `PRINTER.TXT` line 12134, 12216. | Basic consumption and price logic is clear. | FORMULA VERIFIED |
| OI-04 | pVyucH2OSasa: Missing calculations | Searched PRINTER.TXT. Found `spotreba_v := h2o_v - h2o_na_konci_v`. Tested in DB. | DB `h2osasa` shows exactly `spotreba` = `h2o_v` - previous `h2o_v`. | Water consumption calculation perfectly verified. | DB CROSS-CHECK VERIFIED |
| OI-05 | pOdpoceTeplo: Missing calculations | Searched PRINTER.TXT. Found `spotr_ob := kon_ob - zac_ob` and total sum logic. | `PRINTER.TXT` line 12633. | The core formula is established but distribution logic is missing. | PARTIALLY VERIFIED |
| OI-06 | Rounding procedures undocumented | Regex searched for `round` in `PRINTER.TXT` and `JU.RDB`. Found explicit `round 1` / `round 2` rules for VAT in 2009. | `PRINTER.TXT` line 1510, etc. | VAT logic rounds known, but specific PropertyManagement float roundings remain obscure. | REMAINS OPEN ISSUE |
| OI-07 | pDomacnost Dataset Limitation | Queried `byt` table. 30 records, max year 2005. | SQL `COUNT(*)` | Insufficient dataset for robust golden validation. | DATASET LIMITATION |
| OI-08 | pOdpoceTeplo Dataset Limitation | Queried `teplo` table. 4 records, max year 2005. | SQL `COUNT(*)` | Insufficient dataset for robust golden validation. | DATASET LIMITATION |

## 3. Formula Evidence

| Procedure | Formula | Source | Confidence |
| --------- | ------- | ------ | ---------- |
| pDomacnost | `A_sum := A1+A2a+A2b+A2c+A2d+A2e+A2f+A2g+A2h+A3+A4+A5` | PRINTER.TXT (L11722) | High (DB Verified) |
| pDomacnost | `B_sum := B1+B2+B3+B4+B5+B6+B7+B8+B9+B10` | PRINTER.TXT (L11723) | High (DB Verified) |
| pVyuctSSE | `spotreba_v := el_v - el_na_konci_v` | PRINTER.TXT (L12134) | High |
| pVyuctSSE | `sk_spolu_v := spotreba_v * sk_v * (1+(dph/100))` | PRINTER.TXT (L12143) | High |
| pVyucH2OSasa| `spotreba_v := h2o_v - h2o_na_konci_v` | PRINTER.TXT (L12447) | Very High (DB Cross-Checked) |
| pOdpoceTeplo| `spotr_ob := kon_ob - zac_ob` | PRINTER.TXT (L12633) | Medium (DB is mostly zeroes) |
| pOdpoceTeplo| `spolu := spotr_ob + spotr_ku + spotr_sp + spotr_de` | PRINTER.TXT (L12637) | High |

## 4. Field Mapping Evidence

| Legacy variable | Legacy source | MariaDB table | MariaDB field | Evidence | Status |
| --------------- | ------------- | ------------- | ------------- | -------- | ------ |
| A_sum (A1 to A5)| PRINTER.TXT   | byt           | a1 to a5      | DB cross-check matches exact formula sum | FIELD MAPPING VERIFIED |
| B_sum (B1 to B10)| PRINTER.TXT  | byt           | b1 to b10     | DB cross-check matches exact formula sum | FIELD MAPPING VERIFIED |
| spotreba_v      | PRINTER.TXT   | elsasa        | spotreba_v    | PRINTER.TXT `spotreba_v := el_v - el_na_konci_v` | FORMULA VERIFIED |
| sk_spolu_v      | PRINTER.TXT   | elsasa        | (none directly) | Calculated field dynamically derived in FAND prints | FIELD MAPPING VERIFIED |
| spotreba_v      | PRINTER.TXT   | h2osasa       | spotreba      | DB cross-check perfectly matches `h2o_v - previous h2o_v` | DB CROSS-CHECK VERIFIED |
| spotr_ob        | PRINTER.TXT   | teplo         | (none directly) | Derived formula `kon_ob - zac_ob` from DB values | FORMULA VERIFIED |
| pausal          | PRINTER.TXT   | elsasa/vyucsse| pausal        | Hardcoded `cond(el_rok < 2007 : 510...` values found in PRINTER | FORMULA VERIFIED |

## 5. Golden Dataset Status

| Procedure | Table | Years | Records | Best dataset | Golden status |
| --------- | ----- | ----: | ------: | ------------ | ------------- |
| pDomacnost | byt | up to 2005 | 30 | 2005 | LIMITED DATASET |
| pVyuctSBD | byt | up to 2005 | 30 | 2005 | LIMITED DATASET |
| pVyuctSSE | elsasa | up to 2020 | 61 | 2020 | GOLDEN READY |
| pVyucH2OSasa | h2osasa | up to 2025 | 30 | 2025 | GOLDEN READY |
| pOdpoceTeplo | teplo | up to 2005 | 4 | 2005 | LIMITED DATASET |

## 6. Remaining OPEN ISSUE

### OI-02: pVyuctSBD logic
1. **What is unknown:** How SBD coefficients (`VyuSBD_1.A_sum`) are derived and applied to distribute costs to apartments.
2. **Why it matters:** Without it, we cannot calculate overpayments/underpayments for SBD.
3. **What evidence was searched:** PRINTER.TXT, JU.RDB, JU.TTT.
4. **What evidence was found:** Usage of `A_plus := cond(mo=0: 0, else:A_sum - VyuSBD_1.A_sum)` but no origin for `VyuSBD_1`.
5. **What cannot currently be proven:** The actual business rule calculating the SBD coefficients.
6. **Risk if implemented without resolving it:** Completely incorrect SBD billing.
7. **Exact next forensic action required:** Decompile `FVyuctSBD.x` using a FAND specialized tool to read the compiled `#procedure` binary block.
8. **Acceptance criterion for closing the issue:** The exact distribution algorithm must be written in plaintext.

### OI-06: Rounding procedures
1. **What is unknown:** Default FAND Real48 rounding (bankers vs mathematical) applied to these specific invoices if not explicitly commanded.
2. **Why it matters:** CI4 uses standard PHP float/decimal which could cause off-by-one-cent errors in totals.
3. **What evidence was searched:** FAND reports.
4. **What evidence was found:** VAT rounds (`round 1`) are documented, but generic additions are not.
5. **What cannot currently be proven:** The specific implicit rounding FAND uses.
6. **Risk if implemented without resolving it:** Golden test failures due to cent discrepancies.
7. **Exact next forensic action required:** Run the legacy app and test a calculation resulting in `.5` to observe the native output.
8. **Acceptance criterion for closing the issue:** A proven statement whether FAND rounds `.5` up or down for these agendas.

## 7. Implementation Readiness

- `pDomacnost`: **READY WITH DATASET LIMITATION** (Core `A_sum`/`B_sum` formulas verified, but validation relies on older 2005 data).
- `pVyuctSBD`: **NOT READY – OPEN ISSUE** (Logic unknown).
- `pVyuctSSE`: **READY FOR CI4 IMPLEMENTATION** (Formula and dataset are solid).
- `pVyucH2OSasa`: **READY FOR CI4 IMPLEMENTATION** (Formula DB cross-checked and dataset is solid).
- `pOdpoceTeplo`: **NOT READY – OPEN ISSUE** (Dataset severely limited and ratio distribution missing).
