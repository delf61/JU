# Forensic Audit: Accounting - Počiatočný stav (pPV)

## 1. Executive Summary
This document provides a forensic audit and implementation readiness assessment for the DOS FAND JU function `pPV` (Počiatočný stav), mapped to the CodeIgniter 4 (CI4) module `Accounting`, using the MariaDB table `pocstav` (migrated from legacy `dpocstav.dbf`).

## 2. Existing CI4 State
Currently, there is no existing implementation of `AccountingController`, `InitialStateService`, or any models related to the `pv` or `pocstav` table in the CI4 application.
- Controller: Not found (`AccountingController.php` does not exist)
- Service: Not found (`InitialStateService.php` does not exist)
- Model: Not found (`PocstavModel.php` or `PvModel.php` does not exist)

## 3. Legacy Procedure Inventory
- **DOS Function:** `pPV`
- **Legacy Source Table:** `PV.000` (exported as `dpocstav.dbf`)
- **MariaDB Migrated Table:** `pocstav`

## 4. Forensic Source Evidence
A deep forensic search into legacy FAND sources (`PRINTER.TXT`) reveals:
- The function `pPV` is explicitly defined as a direct editor macro for the `PV` table.
- Source code evidence:
  ```pascal
   P  pPV         
  BEGIN
    edit(PV, ePV, mode='01??', ctrl='',
         head=' DATOVí EDITOR                                                         __.__.__',
         last='                      Editujte Łdaje, resp.  Esc-Koniec edit cie ',
         ww=(46,4,76,23,=''!,^S,^B,^E,^B));
  END;
  ```
- The `PV` table data is strictly manually entered via the FAND `edit()` function, mapping exactly to a flat data input form `ePV`. There are no dynamic runtime calculations within `pPV` itself.
- FAND form `ePV` layout:
  ```pascal
  #_ PV a, b, mena, ph, pu, han, poh, zav, m;
         Ku dňu __________
      Označenie ________

       Popis           ___
    ÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄÄ
     Pokladňa     __________
     Bank. Účet   __________
     HaN majetok  __________
     Pohľadávky   __________
     Záväzky      __________
     Majetok      __________
  ```
- The data from `PV` is passively aggregated into the dynamic cashbook summary calculation `SumaPD[1]` when generating reports (`pPDsuma` and `mPDsuma_`):
  ```pascal
  SumaPD[1].P1 := PV[1].PH; SumaPD[1].P2 := PV[1].PU;
  ```

## 5. Database Forensic Findings
The MariaDB table `pocstav` exists and contains 390 records.

Table Schema:
```sql
Field      Type          Null    Key    Default    Extra
a          date          YES            NULL
b          varchar(8)    YES            NULL
ph         decimal(9,2)  YES            NULL
h          varchar(13)   YES            NULL
pu         decimal(9,2)  YES            NULL
u          varchar(13)   YES            NULL
m          decimal(9,2)  YES            NULL
han        decimal(9,2)  YES            NULL
poh        decimal(9,2)  YES            NULL
zav        decimal(9,2)  YES            NULL
arcintcis  varchar(1)    YES            NULL
```

Data Sample (LIMIT 10 ORDER BY a DESC):
```text
a           b       ph      pu       han     poh     zav     m
2025-01-01          0.00    4593.46  0.00    0.00    0.00    0.00
2024-01-01          0.00    0.00     0.00    0.00    0.00    0.00
2023-01-01          0.00    0.00     0.00    0.00    0.00    0.00
2020-01-01          0.00    0.00     0.00    0.00    0.00    0.00
```
- Total Records: 390
- Date Range (`a`): 1991 to 2025

## 6. Field Mapping
Legacy form variables map directly to `pocstav` columns:
- `a` = Dátum (`Ku dňu`)
- `b` = Označenie
- `ph` = Pokladňa počiatočný stav
- `pu` = Bankový účet počiatočný stav
- `han` = HaN majetok
- `poh` = Pohľadávky
- `zav` = Záväzky
- `m` = Majetok

## 7. Business Logic / Formula Evidence
`pPV` contains NO complex calculation logic. It is a strict CRUD interface for setting initial state constants (e.g., beginning-of-year cash/bank balances) which are later dynamically fetched by other modules, primarily `Cashbook` (Peňažný denník) via `SumaPD[1].P1 := PV[1].PH;`.
- Formula: `N/A` (Direct data entry)

## 8. Golden Dataset Assessment
- **Status:** DB VERIFIED
- **Dataset:** 390 records available, extending through 2025, which provides a full dataset for basic CRUD operations.
- **Verification Method:** Because this module lacks calculation logic and only stores constants, DB verification is sufficient to prove readiness for CRUD API endpoints. No calculated output golden tests are required.

## 9. OPEN ISSUES
There are no major open issues preventing the migration of this CRUD module. However, the exact usage of `h` and `u` (likely text descriptors for `ph` and `pu`) and `m` needs minor attention during implementation.

1.  **ID:** OI-ACCOUNTING-001
2.  **Claim:** `pocstav` table maps to `pv` in CI4 logic.
3.  **Source:** `MIGRATION_MAP.md` states table is `pv`, database actually has it as `pocstav`.
4.  **Evidence:** `SHOW TABLES` has `pocstav` but not `pv`. FAND script confirms FAND exported `pv` to `dpocstav.dbf`.
5.  **Missing:** N/A
6.  **Why not VERIFIED:** Need to adjust CI4 Model name/table property to use `pocstav` instead of `pv`.
7.  **Impact:** Fails if looking for `pv`.
8.  **Next Step:** CI4 implementation must configure the model to point to the `pocstav` table.

## 10. CI4 Implementation Scope
The CI4 module `Accounting` for `InitialStateService` (`pPV`) must strictly be a CRUD wrapper over the `pocstav` table. It does not require complex calculation logic.

- Create `PocstavModel.php`.
- Create `InitialStateService.php` to fetch the initial state by year/date.
- Create `AccountingController.php` for API exposure.

## 11. Implementation Readiness
**READY**
The function `pPV` is purely a FAND DBF table editor (`edit(PV, ePV, ...)`). The data is fully available in MariaDB under `pocstav`. There is no hidden FAND business logic to reverse-engineer.

## 12. Test Strategy
- Unit tests: Create `InitialStateServiceTest` asserting that the service accurately retrieves initial state constants for a given year directly from the `pocstav` table.
- Golden Test: Not strictly applicable as there are no runtime calculations to match against FAND reference outputs. A basic schema and DB retrieval test is sufficient.

## 13. Final Gate Decision
The FAND `pPV` macro maps directly to a pure CRUD table (`pocstav`). It is entirely **READY** for CI4 implementation as a standard Model/Service pairing to feed data to other modules (like Cashbook).
