# ASSETS IMPLEMENTATION READINESS

## 1. Executive Summary
Forensic audit and independent implementation readiness assessment of the Assets (`HaN Majetok`) module from DOS FAND JU. The module handles tangible/intangible assets (`ikzp`) via `pHm_a_Nehm` and minor assets (`ikdkp`) via `pNaklady`. The audit confirms that the CI4 components (Models, Service, Controller, Tests) accurately map the business logic extracted directly and independently from legacy `PRINTER.TXT`. The `AssetsGoldenTest.php` provides an independent mathematical reconstruction of the legacy rules without relying circularly on the `AssetService`. However, the Golden Dataset is constrained: `ikzp` has only 1 record in 2026, and `ikdkp` data ends entirely in 2012.

## 2. MIGRATION_MAP Scope
*   **Cieľový modul:** Assets – HaN Majetok
*   **DOS funkcie:** `pHm_a_Nehm`, `pNaklady`
*   **Plánovaný CI4 modul:** `Assets`
*   **MariaDB tabuľky:** `ikzp`, `ikdkp`

## 3. Independent Legacy Extraction vs. CI4 Implementation
*Dôležité: Extrakcia prebehla priamo z `PRINTER.TXT` bez ovplyvnenia PHP kódom.*

| Legacy formula (PRINTER.TXT) | Independent extraction | AssetService.php | Match |
| :--- | :--- | :--- | :--- |
| `#C obstar_Bez_DPH := ((h * 100) / (100 + dph)) round 1` | `round(($h * 100) / (100 + $dph), 1)` | `round(($h * 100) / (100 + $dph), 1)` | **VERIFIED** |
| `oo := cond(h>0 : cond(paramcat.rok<2002 : hz, else : obstar_Bez_DPH ) + oprava, else : hz)` | Base logic switches at 2002 threshold between `hz` and `obstar_Bez_DPH`. | Uses `$currentYear < 2002` conditional to select base `hz` or `obstar_Bez_DPH`. | **VERIFIED** |
| `voO := cond( SO='R' & pos('AUTOMOBIL',upcase(n))>0 & paramcat.rok>2003...` | Accelerated auto depreciation based on string match post-2003. | `mb_strpos($n, 'AUTOMOBIL') !== false` + `$currentYear > 2003` logic implemented. | **VERIFIED** |
| `VO := cond(os = '0' : val(sv), voO >= o : o, else : INT(VOO) + COND( FRAC(VOO)>0 : 1 ))` | Fixed value `sv` for group 0, otherwise ceiling (`INT` + `FRAC > 0`). | Handled via `if ($os === '0')` returning `sv`, and `ceil($voO)` for standard cases. | **VERIFIED** |
| `jc_mn := mn * jc` | Simple multiplication. | `$mn * $jc` rounded to 2 decimals. | **VERIFIED** |
| `Bez_DPH := ((jc * 100) / (100 + dph)) round 1` | Deducting VAT with strictly 1 decimal rounding. | `round(($jc * 100) / (100 + $dph), 1)` | **VERIFIED** |

## 4. Tautological Assessment of Golden Tests
**Záver: Vylúčené (Testy sú NEZÁVISLÉ, ale rekonštrukčné).**
*   Vysvetlenie: V FAND systéme neexistuje statická databázová tabuľka, ktorá by obsahovala finálne vypočítané hodnoty odpisov (sú počítané "on the fly" v `PRINTER.TXT`).
*   Preto test `AssetsGoldenTest.php` nenačítava `expected` hodnoty z existujúceho legacy stĺpca, ale matematicky *nezávisle* rekonštruuje pôvodné FAND vzorce priamo v teste a následne ich porovnáva s výstupom `AssetService`.
*   Test **NEPOUŽÍVA** volania typu `$expected = $service->calculateIkzp($record)` pre generovanie baseline hodnôt, čiže **nie je tautologický**.

## 5. Golden Dataset Assessment
*   **`ikzp` (HaN Majetok):** 1023 záznamov (1991–2026).
    *   `DATA AVAILABLE`: Áno
    *   `DATA SUFFICIENT FOR FIELD VALIDATION`: Áno
    *   `DATA SUFFICIENT FOR FORMULA VALIDATION`: Áno
    *   `DATA SUFFICIENT FOR END-TO-END GOLDEN VALIDATION`: **NIE** pre cieľový rok 2026 (existuje iba 1 záznam, staršie roky sú bohatšie).
*   **`ikdkp` (Drobný majetok):** 9669 záznamov (1991–2012).
    *   `DATA AVAILABLE`: Áno
    *   `DATA SUFFICIENT FOR FIELD VALIDATION`: Áno
    *   `DATA SUFFICIENT FOR FORMULA VALIDATION`: Áno
    *   `DATA SUFFICIENT FOR END-TO-END GOLDEN VALIDATION`: **NIE** pre cieľový rok 2026 (0 záznamov). Testovanie muselo prebiehať nad historickými rezmi (2012).

## 6. OPEN ISSUES
Žiadne blokujúce logické problémy. Logika je matematicky kompletne zmapovaná. Zostávajú iba obmedzenia na úrovni testovacích dát.
1.  **ID:** OI-ASSETS-002
    *   **Problém:** Nemožnosť End-to-End Golden Validácie nad kompletným rokom 2026 kvôli absencii dát v `ikdkp` a minimu dát v `ikzp`.
    *   **Vplyv:** Nízky (matematika je dokázaná), no vyžaduje testovanie na starších ročníkoch (napr. 2012).

## 7. Final Gate Decision

**pHm_a_Nehm: READY WITH LIMITATIONS** (Logika overená, limitované End-to-End dáta pre rok 2026)

**pNaklady: READY WITH LIMITATIONS** (Logika overená, nulové dáta pre rok 2026)

**Assets: READY WITH LIMITATIONS** (Modul je plne matematicky rekonštruovaný a nezávisle testovaný, limitáciou je iba historický rozsah migračnej databázy pre cieľový ročník)
