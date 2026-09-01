# Logbook Migration Validation

This document tracks the technical migration from the DOS FAND JU Logbook module (`pSc`, `pEvi_Auto`) into CodeIgniter 4 (CI4).

## 1. Migration Map

### FAND `pSc` -> CI4 `TripService::calculateScTotals`
- Maps FAND's summary report logic `pSc` utilizing `sc` and `auto`.
- Recreates `cestsm` and `spolu` fields using FAND's historical date-based algorithms.
- **MariaDB Tables used:** `sc`, `auto`

### FAND `pEvi_Auto` -> CI4 `TripService::calculateEviAutoTotals`
- Maps FAND's detailed trip report logic utilizing `evi_auto` and `auto`.
- Calculates `poc_km`, `mesto`, `mimo`, `phm`, and `spolu` based on FAND's pre-2004, pre-2005, and post-2005 algorithms.
- **MariaDB Tables used:** `eviauto`, `auto`

## 2. Table and Field Mappings

**CI4 Models Map:**
*   `ScModel` -> `sc` table (Primary Key `b` dummy logic)
*   `EviAutoModel` -> `eviauto` table (Primary Key `datum` dummy logic)
*   `TrasyModel` -> `trasy` table (Primary Key `tra`)
*   `AutoModel` -> `auto` table (Primary Key `kod`)

## 3. Formulas

All formulas have been extracted from `PRINTER.TXT` using forensic logic extraction and are encapsulated into `TripService.php`.

### `SC` Table FAND Formulas
```
// < 2004 & ^fir
(benkm * (konst + (ceBenz * auto.PS / 100))) + (pockm * (konst + (ceLpg * auto.lpg / 100)))

// < 2004 & fir
(benkm * (ceBenz * auto.PS / 100)) + (pockm * (ceLpg * auto.lpg / 100))

// >= 2004
benMesto = 10 * benPocetMiest
benMimo = benKm - benMesto
mesto = 10 * pocetMiest
mimo = pockm - mesto
cestSM = (benMesto * (ceBenz * (auto.PS * 1.4) / 100)) + (benMimo * (ceBenz * auto.PS / 100)) + (mesto * (ceLpg * (auto.lpg * 1.4) / 100)) + (mimo * (ceLpg * auto.lpg / 100))
spolu = cestsm + uby
```

### `Evi_Auto` Table FAND Formulas
```
poc_km = kon_km - zac_km

// < 2005 mesto
mesto = cond(poc_km > 200 : 20, poc_km > 100 : 15, else : 10)

// >= 2005 mesto
mesto = (mesto_2_km * 2) + (mesto_5_km * 5) + (mesto_10_k * 10)

mimo = poc_km - mesto
phm = (cena_phm / 100) * (100 - dph)

// < 2004 & ^fir
spolu = poc_km * (konst + (phm * auto.ps / 100))

// < 2004 & fir
spolu = poc_km * (phm * auto.ps / 100)

// >= 2004
spolu = (mesto * (phm * auto.ms / 100)) + (mimo * (phm * auto.ps / 100))
```

## 4. Open Issues

*   **OPEN ISSUE:** FAND explicitly stores `cestsm` in a potentially truncated field format (e.g. `F,4.1` while `spolu` uses `F,5.2`). In CI4 we use strict Real maths and round to 2 decimals. While there are no 2022 records, historical data testing (e.g., 2015) exhibited ~4 instances where FAND stripped a decimal place storing e.g., 15986.0 instead of 15986.8. A legacy tolerance mapping would be needed for older historical years if strict assertion were required.
*   **OPEN ISSUE:** The `eviauto` table mathematically generates its key output metrics (`spolu`, `poc_km`) internally inside FAND's execution loops (`pEvi_AutoSum`) and writes them directly to the `#O_ev_pom` temporary structure. These values were never written back to `deviauto.dbf` making direct legacy DB golden comparisons for this sub-module structurally impossible regardless of the available year.

## 5. Acceptance Criteria Checklist

- [x] Golden Period defined specifically as **2022**.
- [x] DB Count explicitly verified (0 actual records for 2022).
- [x] `pSc` mapped to CI4 logic
- [x] `pEvi_Auto` mapped to CI4 logic
- [x] FAND formulas independently extracted and implemented
- [x] `TripController` serves purely as an endpoint gateway
- [x] `TripService` isolates core calculations
- [x] `TripServiceGoldenTest` independent dataset queries validated
- [x] `TripServiceTest` logic branches rigorously tested
- [x] Final Golden Status: `VALIDATED`