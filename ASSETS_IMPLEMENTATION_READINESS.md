# ASSETS IMPLEMENTATION READINESS

## 1. Executive Summary
Forensic audit and implementation readiness assessment of the Assets (`HaN Majetok`) module from DOS FAND JU. The module handles tangible/intangible assets (`ikzp`) via `pHm_a_Nehm` and minor assets (`ikdkp`) via `pNaklady`. The audit reveals that the required CI4 components (Models, Service, Controller, Tests) already exist in the codebase. The business logic has been accurately extracted from legacy `PRINTER.TXT` and successfully mapped to PHP. However, golden validation is hampered by dataset limitations, particularly the absence of `ikdkp` records in the target migration year (2026).

## 2. MIGRATION_MAP Scope
*   **Cieľový modul:** Assets – HaN Majetok
*   **DOS funkcie:** `pHm_a_Nehm`, `pNaklady`
*   **Plánovaný CI4 modul:** `Assets`
*   **Controller:** `AssetController`
*   **Service:** `AssetService`
*   **MariaDB tabuľky:** `ikzp`, `ikdkp`
*   **Aktuálny status v MIGRATION_MAP.md:** `NAVRHNUTÉ` *(Upozornenie: Kód už reálne existuje).*

## 3. Existing CI4 Components
*   **AssetController:** EXISTUJE A JE POUŽITEĽNÉ (`ci4_app/app/Controllers/AssetController.php`)
*   **AssetService:** EXISTUJE A JE POUŽITEĽNÉ (`ci4_app/app/Services/AssetService.php`)
*   **IkzpModel:** EXISTUJE A JE POUŽITEĽNÉ (`ci4_app/app/Models/IkzpModel.php`)
*   **IkdkpModel:** EXISTUJE A JE POUŽITEĽNÉ (`ci4_app/app/Models/IkdkpModel.php`)
*   **Unit & Golden Tests:** EXISTUJE A JE POUŽITEĽNÉ (`ci4_app/tests/app/Services/AssetServiceTest.php`, `ci4_app/tests/app/Services/AssetsGoldenTest.php`)

## 4. Database Forensic Findings
**`ikzp` (Investičný majetok):**
*   **Existencia:** Áno (`ju_migration_test.ikzp`)
*   **Stĺpce (výber):** `a` (date), `b` (varchar), `n` (varchar), `h` (decimal), `hz` (decimal), `so` (varchar), `ro` (smallint), `os` (varchar), `dph` (decimal), `oprava` (decimal), `sv` (varchar), `rok_pom` (smallint)
*   **Počet záznamov:** 1023
*   **Rozsah dát:** 1991-09-17 až 2026-03-29 (iba 1 záznam pre rok 2026)

**`ikdkp` (Drobný majetok):**
*   **Existencia:** Áno (`ju_migration_test.ikdkp`)
*   **Stĺpce (výber):** `a` (date), `b` (varchar), `n` (varchar), `mn` (smallint), `jc` (decimal), `dph` (decimal)
*   **Počet záznamov:** 9669
*   **Rozsah dát:** 1991-09-17 až 2012-08-08 (0 záznamov pre rok 2026)

## 5. Legacy Source Findings
*   **`pHm_a_Nehm`:** Logika nájdená v `PRINTER.TXT`. Obsahuje zložité vetvenie pre odpisy (Rovnomerné `so='R'` / Zrýchlené `so='Z'`), závislé na rokoch odpisovania (`ro`) a odpisových skupinách (`os`). Identifikované bolo aj špeciálne pravidlo pre automobily (ak `n` obsahuje "AUTOMOBIL" a rok > 2003). Vzorce využívajú funkcie `INT`, `FRAC`, `COND`.
*   **`pNaklady`:** Logika nájdená v `PRINTER.TXT`. Vykonáva jednoduché agregácie: `jc_mn := mn * jc` a odpočet DPH: `Bez_DPH := ((jc * 100) / (100 + dph)) round 1`.

## 6. Proven Legacy Logic
*   **Výpočet základu DPH (IKZP/IKDKP):** Vzorec `((h * 100) / (100 + dph)) round 1` je bezpečne preukázaný z `PRINTER.TXT`. Zaokrúhľovanie na 1 desatinné miesto pred ďalšími výpočtami je striktne vyžadované FAND prostredím. (VERIFIED)
*   **Odpisová matematika (IKZP):** Rozhodovací strom založený na kombinácii `so`, `ro` a `os` bol presne namapovaný a testovaný v `AssetService`. Obsahuje zaokrúhľovanie nahor (`ceil`) pre vypočítanú hodnotu odpisu `vo`. (VERIFIED)

## 7. Field Mapping
*   `DOS h` → `ikzp.h` → Vstupná hodnota (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS hz` → `ikzp.hz` → Zostatková hodnota (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS dph` → `ikzp.dph` → Sadzba DPH (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS ro` → `ikzp.ro` → Rok odpisovania (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS so` → `ikzp.so` → Spôsob odpisu (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS os` → `ikzp.os` → Odpisová skupina (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS n` → `ikzp.n` → Názov majetku (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS oprava` → `ikzp.oprava` → Opravná položka (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS sv` → `ikzp.sv` → Špeciálna hodnota pre os=0 (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS jc` → `ikdkp.jc` → Jednotková cena (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS mn` → `ikdkp.mn` → Množstvo (VERIFIED - PRINTER.TXT / AssetService)
*   `DOS dph` → `ikdkp.dph` → Sadzba DPH (VERIFIED - PRINTER.TXT / AssetService)

## 8. Golden Dataset Assessment
*   **`ikzp` (HaN Majetok):** `LIMITED DATASET` (Pre cieľový rok 2026 existuje iba 1 záznam, pre 2024 je 6 záznamov). Historické roky obsahujú viac dát.
*   **`ikdkp` (Drobný majetok):** `NOT AVAILABLE` (Pre cieľový rok 2026 neexistujú žiadne dáta. Posledné dáta sú z roku 2012).

## 9. OPEN ISSUES
1.  **ID:** OI-ASSETS-001
2.  **Čo presne nevieme:** Nemôžeme plne overiť Golden Dataset pre modul Drobný majetok (`ikdkp`) v kontexte cieľového roka 2026, pretože chýbajú zdrojové dáta.
3.  **Čo vieme:** Tabuľka `ikdkp` končí v roku 2012 (33 záznamov pre rok 2012, 9669 celkovo). Kód v `AssetService` presne reflektuje `PRINTER.TXT`.
4.  **Čo tvrdí MIGRATION_MAP:** Status modulu je `NAVRHNUTÉ`.
5.  **Dostupný dôkaz:** Databázový dopyt (`SELECT MAX(a) FROM ikdkp`) vrátil `2012-08-08`.
6.  **Chýbajúci dôkaz:** Chýbajú aktuálne záznamy z obdobia 2026 na Golden Test.
7.  **Riziko pri implementácii:** Nízke, keďže matematika pre `ikdkp` je veľmi jednoduchá (násobenie a odpočet DPH).
8.  **Konkrétny krok potrebný na uzavretie issue:** Rozšíriť `AssetsGoldenTest.php` o validáciu starších rokov pre `ikdkp` (napr. 2012), aby sa testoval reálny Golden Dataset, a upraviť status v `MIGRATION_MAP.md`.

## 10. Implementation Readiness Matrix
*   `pHm_a_Nehm`: **READY WITH LIMITATIONS** (Logika dokázaná a implementovaná, limitovaný dataset pre rok 2026)
*   `pNaklady`: **READY WITH LIMITATIONS** (Logika dokázaná a implementovaná, nulový dataset pre rok 2026)
*   Celý modul `Assets`: **READY WITH LIMITATIONS**

## 11. Risks
*   Závislosť logiky od textových hodnôt v poli `n` (napr. hľadanie reťazca 'AUTOMOBIL'). Prípadné preklepy v legacy dátach by mohli spôsobiť chybné zaradenie odpisu.
*   Rozpor v dokumentácii: `MIGRATION_MAP.md` uvádza stav `NAVRHNUTÉ`, hoci CI4 komponenty sú už vyvinuté, testované a overené v repozitári.

## 12. Required Next Steps
1.  Upraviť `MIGRATION_MAP.md` pre modul Assets na stav `IMPLEMENTOVANÉ – OVERENÉ (s obmedzeným datasetom)`.
2.  Upraviť `AssetsGoldenTest.php` tak, aby pre `ikdkp` overoval rok 2012 a pre `ikzp` rok s väčším počtom dát (napr. 2012 alebo 2019), aby Golden Validácia mala reálnu výpovednú hodnotu nad rámec 1 záznamu.

## 13. Final Gate Decision

> **Assets: READY WITH LIMITATIONS**

> **pHm_a_Nehm: READY WITH LIMITATIONS**

> **pNaklady: READY WITH LIMITATIONS**
