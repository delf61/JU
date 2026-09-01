# PROPERTY MANAGEMENT CI4 MIGRATION VALIDATION

## 1. Implementované
- **Models:** `BytModel`, `ElsasaModel`, `H2osasaModel` (Mapped directly to `byt`, `elsasa`, `h2osasa`).
- **Service:** `PropertyManagementService`
  - `calculateASum`: Implements legacy `A_sum` from `PRINTER.TXT`.
  - `calculateBSum`: Implements legacy `B_sum` from `PRINTER.TXT`.
  - `calculateVyuctSSE`: Implements legacy `spotreba_v` and hardcoded `pausal` logic from `PRINTER.TXT`.
  - `calculateVyucH2OSasa`: Implements legacy `spotreba` logic from `PRINTER.TXT`.
- **Controller:** `PropertyManagementController` exposes these as simple JSON APIs.

## 2. Golden validácia
- **pVyuctSSE (`elsasa`)**:
  - Dataset: 61 records up to 2020.
  - Tested: Validated dynamic sequence of consumption against legacy FAND calculation independent expected values.
  - Tolerance: 0.01 for Float conversions.
  - Status: VALIDATED.
- **pVyucH2OSasa (`h2osasa`)**:
  - Dataset: 30 records up to 2025.
  - Tested: Validated meter rollover behavior against independent calculation.
  - Tolerance: 0.01 for Float conversions.
  - Status: VALIDATED.
- **pDomacnost (`byt`)**:
  - Status: IMPLEMENTED WITH DATASET LIMITATION. Dataset (2005) is too small to perform reliable full-history regressions.

## 3. Zostávajúce OPEN ISSUES
- **pVyuctSBD**: BLOCKED – OPEN ISSUE. Missing SBD ratio logic. Not implemented.
- **pOdpoceTeplo**: BLOCKED – OPEN ISSUE. Missing heat ratio distribution algorithms. Not implemented.
