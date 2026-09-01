# PROPERTY MANAGEMENT CI4 IMPLEMENTATION READINESS

## 1. Executive Summary

> Can PropertyManagement now be implemented in CI4?

**YES, PARTIALLY**

The modules governing strictly utility calculations (`pVyuctSSE` for electricity and `pVyucH2OSasa` for water) are ready for implementation due to verified calculation algorithms and substantial Golden Datasets. `pDomacnost` can be implemented with dataset limitations. Conversely, `pVyuctSBD` and `pOdpoceTeplo` remain severely blocked by unknown distribution logic or insufficient data and must not be implemented yet.

## 2. Procedure Readiness Matrix

| Procedure | Formula | Field mapping | Runtime branches | DB cross-check | Golden data | Status |
| --------- | ------- | ------------- | ---------------- | -------------- | ----------- | ------ |
| `pDomacnost` | PARTIAL | VERIFIED | OPEN | VERIFIED | LIMITED | **READY WITH DATASET LIMITATION** |
| `pVyuctSBD` | OPEN | OPEN | OPEN | OPEN | LIMITED | **BLOCKED – OPEN ISSUE** |
| `pVyuctSSE` | VERIFIED | VERIFIED | VERIFIED | VERIFIED | SUFFICIENT | **READY** |
| `pVyucH2OSasa`| VERIFIED | VERIFIED | VERIFIED | VERIFIED | SUFFICIENT | **READY** |
| `pOdpoceTeplo`| PARTIAL | VERIFIED | OPEN | PARTIAL | EMPTY/LIMITED | **BLOCKED – OPEN ISSUE** |

## 3. Proven Legacy Logic

- **pDomacnost**: `A_sum := a1 + a2a + a2b + a2c + a2d + a2e + a2f + a2g + a2h + a3 + a4 + a5`
- **pDomacnost**: `B_sum := b1 + b2 + b3 + b4 + b5 + b6 + b7 + b8 + b9 + b10`
- **pVyuctSSE**: `spotreba_v := el_v - el_na_konci_v`
- **pVyuctSSE**: `sk_spolu_v := spotreba_v * sk_v * (1+(dph/100))`
- **pVyuctSSE**: `pausal` is hardcoded dynamically by `el_rok` (e.g. 2005=510, 2007=178.5, 2013=303.67).
- **pVyucH2OSasa**: `spotreba_v := h2o_v - h2o_na_konci_v`
- **pOdpoceTeplo**: `spotr_ob := kon_ob - zac_ob`

## 4. Proven Field Mappings

| Legacy variable | Legacy source | MariaDB table | MariaDB field | Evidence | Status |
| --------------- | ------------- | ------------- | ------------- | -------- | ------ |
| A_sum items | PRINTER.TXT | byt | a1-a5 | Mathematical match via SQL | VERIFIED |
| B_sum items | PRINTER.TXT | byt | b1-b10 | Mathematical match via SQL | VERIFIED |
| spotreba_v | PRINTER.TXT | elsasa | spotreba_v | Mathematical logic match | VERIFIED |
| spotreba | PRINTER.TXT | h2osasa | spotreba | Mathematical difference exact match | VERIFIED |
| kon_ob | PRINTER.TXT | teplo | kon_ob | Matches DB schema | VERIFIED |
| pausal | PRINTER.TXT | elsasa | pausal | Hardcoded logic found in text | VERIFIED |

## 5. Golden Dataset Status

| Procedure | Table | Years | Records | Best dataset | Golden status |
| --------- | ----- | ----: | ------: | ------------ | ------------- |
| `pDomacnost` | byt | up to 2005 | 30 | 2005 | LIMITED DATASET |
| `pVyuctSBD` | byt | up to 2005 | 30 | 2005 | LIMITED DATASET |
| `pVyuctSSE` | elsasa | up to 2020 | 61 | 2020 | GOLDEN READY |
| `pVyucH2OSasa`| h2osasa | up to 2025 | 30 | 2025 | GOLDEN READY |
| `pOdpoceTeplo`| teplo | up to 2005 | 4 | 2005 | NOT SUITABLE FOR GOLDEN VALIDATION |

## 6. Remaining OPEN ISSUES

### OI-02: pVyuctSBD logic
1. **Missing evidence:** The ratio distribution algorithm (e.g., origin of `VyuSBD_1.A_sum`).
2. **Why it matters:** SBD settlement costs cannot be accurately allocated.
3. **Risk:** Incorrect SBD billing leading to financial mismatches.
4. **Required forensic action:** Binary decompilation of `FVyuctSBD.x`.
5. **Acceptance criterion:** Clear plain-text formulas mapping SBD coefficients.

### OI-05: pOdpoceTeplo logic
1. **Missing evidence:** Distribution methodology across apartments for total heat cost.
2. **Why it matters:** Prevents billing for heating.
3. **Risk:** Invalid invoices for heat.
4. **Required forensic action:** Binary decompilation of `FTeplo.x`.
5. **Acceptance criterion:** Full breakdown of ratio calculation for heat per square meter or meter read.

### OI-06: Rounding procedures
1. **Missing evidence:** Default FAND Real48 implicit rounding vs PHP float precision logic for property agendas.
2. **Why it matters:** Causes Golden test drift due to fractional cents.
3. **Risk:** Tests randomly failing over sub-penny rounding.
4. **Required forensic action:** Testing the live legacy app.
5. **Acceptance criterion:** Documented standard rounding behavior (.5 up or down).

## 7. CI4 Implementation Scope

### IMPLEMENT NOW
- **`pVyuctSSE`** (Electricity calculation algorithm and endpoints)
- **`pVyucH2OSasa`** (Water calculation algorithm and endpoints)

### IMPLEMENT WITH DATASET LIMITATION
- **`pDomacnost`** (Core calculation of `A_sum` and `B_sum` can be implemented, but the Golden dataset is too old/small to guarantee zero regressions for edge cases).

### DO NOT IMPLEMENT YET
- **`pVyuctSBD`** (Blocked by unknown ratio logic).
- **`pOdpoceTeplo`** (Blocked by unknown distribution logic and lack of data).

## 8. Proposed CI4 Architecture

**Legacy procedure**
      ↓
**CI4 Model(s)**
- `ElsasaModel` (table `elsasa`)
- `H2osasaModel` (table `h2osasa`)
- `BytModel` (table `byt`)
      ↓
**PropertyManagementService**
- `calculateElectricityConsumption(int $el_v, int $el_na_konci_v, int $rok): float`
- `calculateWaterConsumption(int $h2o_v, int $h2o_na_konci_v): float`
- `calculateASum(array $bytRow): float`
- `calculateBSum(array $bytRow): float`
      ↓
**PropertyManagementController**
- `GET /property/electricity`
- `GET /property/water`
- `GET /property/apartments`

## 9. Test Plan

### Unit tests
- Test `calculateElectricityConsumption` for standard case, `0` previous state, and year-based `pausal` determination.
- Test `calculateWaterConsumption` for exact subtraction.
- Test `calculateASum` / `calculateBSum` with valid and missing keys.

### Golden tests
- **Source table:** `elsasa`
- **Selected historical dataset/year:** 2020
- **Expected record count:** ~61
- **Independently calculated expected values:** Recalculate dynamic `spotreba_v` and `pausal` entirely in the test, bypassing `PropertyManagementService`, and assert against the Service output.
- **Tolerance:** `0.01` tolerance for specific decimal point mismatches (due to Real48 to Float translation).
- **Source table:** `h2osasa`
- **Selected historical dataset/year:** 2025
- **Expected record count:** 30

### Regression tests
Existing CI4 tests (Invoices, Receivables, etc.) must remain unaffected.

## 10. Final Gate Decision

PROPERTY MANAGEMENT CI4 IMPLEMENTATION STATUS:
PARTIALLY READY
