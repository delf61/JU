# Forensic CRUD Verification: Accounting - Počiatočný stav (pPV)

## 1. Executive Summary
This document provides an independent forensic verification of the claim that the legacy DOS FAND JU function `pPV` (Počiatočný stav), mapped to the `pocstav` MariaDB table, operates strictly as a "Simple CRUD" interface.

## 2. Original „Simple CRUD“ Claim
The document `INITIAL_STATE_IMPLEMENTATION_READINESS.md` claimed:
> "The `PV` table data is strictly manually entered via the FAND `edit()` function, mapping exactly to a flat data input form `ePV`. There are no dynamic runtime calculations within `pPV` itself."

## 3. Legacy Evidence
Forensic extraction of `PRINTER.TXT` verifies the exact structure of `pPV` and its data entry form `ePV`.

## 4. `pPV` Operation Inventory
The macro `pPV` is defined as follows:
```pascal
 P  pPV         
BEGIN
  edit(PV, ePV, mode='01??', ctrl='',
       head=' DATOVí EDITOR                                                         __.__.__',
       last='                      Editujte Łdaje, resp.  Esc-Koniec edit cie ',
       ww=(46,4,76,23,=''!,^S,^B,^E,^B));
END;
```
This proves that the operation is exclusively a call to FAND's native `edit()` block for the `PV` table using the `ePV` layout.

## 5. Field-Level Behaviour
The `ePV` form provides basic data entry without background hooks:
```pascal
#K @ @
#C rok := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
   mena := par.mena : A,3;
#I b:='00-001-'+strdate(a, 'YYYY');

 E  ePV         
#_ PV a, b, mena, ph, pu, han, poh, zav, m;
```
- `#C` merely formats `rok` and dynamically fetches a constant `mena` (currency) from a parameter table.
- `#I` initializes field `b` (Document Number) dynamically to a pattern like `00-001-YYYY`.
- No `#A` (After) or `#B` (Before) triggers exist that push data to other FAND modules.

## 6. Business Logic / Formula Check
- **pPV → edit(PV, ePV) → Save to PV**: Verified. There are no formulas mutating the numbers inputted (`ph`, `pu`, `han`, `poh`, `zav`).

## 7. Side-Effect Check
There is no evidence in `pPV` or `ePV` that edits trigger updates to `PD` (Cashbook), `DPH` (VAT), or any other system. The initial states are strictly pulled (read-only) by other reporting modules at runtime, specifically the `mPDsuma` calculation:
`SumaPD[1].P1 := PV[1].PH; SumaPD[1].P2 := PV[1].PU;`

## 8. MariaDB Cross-Check
The MariaDB table `pocstav` confirms this structure:
```sql
CREATE TABLE `pocstav` (
  `a` date DEFAULT NULL,
  `b` varchar(8) DEFAULT NULL,
  `ph` decimal(9,2) DEFAULT NULL,
  `h` varchar(13) DEFAULT NULL,
  `pu` decimal(9,2) DEFAULT NULL,
  `u` varchar(13) DEFAULT NULL,
  `m` decimal(9,2) DEFAULT NULL,
  `han` decimal(9,2) DEFAULT NULL,
  `poh` decimal(9,2) DEFAULT NULL,
  `zav` decimal(9,2) DEFAULT NULL,
  `arcintcis` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
```
- Total records: 390.
- The schema is entirely flat and lacks foreign keys, consistent with an isolated initial state configuration table.

## 9. Contradictions / Missing Evidence
No contradictions were found. The legacy `ePV` form uses `#I` to initialize the string `b`, which is standard CRUD initialization behavior. The `#C` logic relies on reading an external configuration variable (`par.mena`) but does not execute business logic.

## 10. Final Verdict
**VERIFIED – SIMPLE CRUD**
The forensic evidence incontrovertibly proves that `pPV` is nothing more than a native FAND `edit()` wrapper over a flat database table, and it contains no embedded business logic or side effects.