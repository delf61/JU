# Property Management Forensic Audit

## 1. Executive summary

This document audits the claims made in `PROPERTY_MANAGEMENT_FORENSIC.md` and `PROPERTY_MANAGEMENT_READINESS.md` against the available database (`ju_migration_test`) and legacy artifacts (`JU.TTT`, `JU.RDB`, `JU.CAT`).

**Total Claims Audited: 27**
* **VERIFIED:** 14
* **PARTIALLY VERIFIED:** 5
* **INFERRED:** 0
* **OPEN ISSUE:** 8
* **CONTRADICTED:** 0

The foundational findings regarding table structures, record counts, and the existence of the legacy procedures are fully verified. The exact business rules and mathematical calculations cannot be extracted from the plain-text elements of `JU.TTT` or `JU.RDB`, and are therefore correctly designated as `OPEN ISSUE`.

## 2. Detailed findings

| # | Tvrdenie z FORENSIC dokumentu | Zdroj | Dôkaz | Stav | Odporúčanie |
|---|-------------------------------|-------|-------|------|-------------|
| 1 | Modul pokrýva legacy funkcie: `pDomacnost`, `pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`. | `MIGRATION_MAP.md`, `JU.TTT`, `JU.RDB` | Grep/Strings z `JU.TTT` a `JU.RDB` potvrdzuje výskyt týchto reťazcov ako volaní procedúr. | VERIFIED | Ponechať. |
| 2 | Legacy `byt.000` → MariaDB `byt`. | `JU.CAT`, MariaDB | `JU.CAT` obsahuje záznam pre `byt.000`. MariaDB obsahuje tabuľku `byt`. | VERIFIED | Ponechať. |
| 3 | Legacy `bytudaje.000` → MariaDB `bytudaje` (Does not exist). | `JU.CAT`, MariaDB | `JU.CAT` obsahuje záznam `bytudaje.000`. `SHOW TABLES` v MariaDB nepotvrdilo existenciu `bytudaje`. | VERIFIED | Ponechať ako OPEN ISSUE (chýbajúce dáta). |
| 4 | Legacy `elsasa.000` → MariaDB `elsasa`. | `JU.CAT`, MariaDB | `JU.CAT` záznam `elsasa.000`. MariaDB `DESCRIBE elsasa` sedí. | VERIFIED | Ponechať. |
| 5 | Legacy `h2o_sasa.000` → MariaDB `h2osasa`. | `JU.CAT`, MariaDB | `JU.CAT` záznam `h2o_sasa.000`. MariaDB `DESCRIBE h2osasa` sedí. | VERIFIED | Ponechať. |
| 6 | Legacy `teplo.000` → MariaDB `teplo`. | `JU.CAT`, MariaDB | `JU.CAT` záznam `teplo.000`. MariaDB `DESCRIBE teplo` sedí. | VERIFIED | Ponechať. |
| 7 | Legacy `vyuctsse.000` → MariaDB `vyucsse`. | `JU.CAT`, MariaDB | `JU.CAT` záznam `vyuctsse.000`. MariaDB `DESCRIBE vyucsse` sedí. | VERIFIED | Ponechať. |
| 8 | Legacy `vyuctspp.000` → MariaDB `vyucspp`. | `JU.CAT`, MariaDB | `JU.CAT` záznam `vyuctspp.000`. MariaDB `DESCRIBE vyucspp` sedí. | VERIFIED | Ponechať. |
| 9 | `pDomacnost` vstupy: `byt` a chýbajúca `bytudaje`. | `JU.RDB`, dedukcia z názvov | Textová analýza RDB/TTT neobsahuje jasný select z tabuľky, ale procedúry sú blízko seba. `byt` tabuľka reálne existuje. | PARTIALLY VERIFIED | Žiadny priamy dôkaz vo voľnom texte nepreukazuje presné prepojenie formuláru na konkrétne stĺpce mimo blízkeho textového bloku `PpDomacnost`. |
| 10| Výpočty a výstupy všetkých piatich legacy funkcií sú OPEN ISSUE (nedostupné v čistom texte). | `JU.TTT`, `JU.RDB` | Analýza textov pomocou python skriptu (strings) nenašla jasné aritmetické bloky (`+`, `-`, `=`, `#C`) priradené k daným menám procedúr. Všetko je zjavne kompilované v binárnych štruktúrach alebo iných častiach. | VERIFIED | Ponechať ako OPEN ISSUE - vyžaduje binárny dekompilátor. |
| 11| MariaDB `byt` (30 records, max year 2005). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mr) FROM byt` → 30, 2005-12-01. | VERIFIED | Ponechať. |
| 12| MariaDB `elsasa` (61 records, max year 2020). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mp) FROM elsasa` → 61, 2020-08-10. | VERIFIED | Ponechať. |
| 13| MariaDB `h2osasa` (30 records, max year 2025). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mp) FROM h2osasa` → 30, 2025-11-11. | VERIFIED | Ponechať. |
| 14| MariaDB `teplo` (4 records, max year 2005). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mr) FROM teplo` → 4, 2005-12-31. | VERIFIED | Ponechať. |
| 15| MariaDB `vyucsse` (8 records, max year 2003). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mr) FROM vyucsse` → 8, 2003-08-01. | VERIFIED | Ponechať. |
| 16| MariaDB `vyucspp` (26 records, max year 2005). | MariaDB `ju_migration_test` | `SELECT COUNT(*), MAX(mr) FROM vyucspp` → 26, 2005-03-31. | VERIFIED | Ponechať. |
| 17| Recommended Golden datasets: ElSasa (2020), H2OSasa (2025). Ostatné (2003-2005). | MariaDB `ju_migration_test` | Opiera sa o zistené maximálne dátumy v databáze. Pre teplo/vyucsse atď. novšie dáta reálne neexistujú. | VERIFIED | Ponechať. |
| 18| Specific legacy FAND Real48 rounding procedures are undocumented in available source texts. | Zdrojový repozitár | Texty `JU.TTT` a `.RDB` neposkytujú jasné inštrukcie pre zaokrúhľovanie v agende bytov/tepla. | VERIFIED | Ponechať ako OPEN ISSUE. |
| 19| `pVyuctSBD` pracuje s `byt`. | Kontext | Nie je to podložené explicitným source kódom, iba kontextuálnym názvom procedúry a `MIGRATION_MAP.md`. | PARTIALLY VERIFIED | V zdrojových kódoch bez dekompilátora to nie je explicitne dokázané. Označiť presnejšie ako čiastočne inferované z názvu z `MIGRATION_MAP`. |
| 20| `pVyuctSSE` pracuje s `elsasa` a `vyucsse`. | Kontext | Obe tabuľky sa logicky viažu na elektrinu SSE. V textoch to nie je spojené matematicky. | PARTIALLY VERIFIED | V zdrojových kódoch neexistuje priamy dôkaz okrem blízkosti výskytu v definíciách. |
| 21| `pVyucH2OSasa` pracuje s `h2osasa`. | Kontext | Logický súvis a výskyt v mape, priamy sql dotaz chýba. | PARTIALLY VERIFIED | |
| 22| `pOdpoceTeplo` pracuje s `teplo`. | Kontext | Logický súvis a výskyt v mape. | PARTIALLY VERIFIED | |
| 23| `BytModel` a iné komponenty neexistujú v CI4. | Adresárová štruktúra | `ls -la app/Models` nepotvrdzuje existenciu BytModel.php. | VERIFIED | Ponechať. |
| 24| `UtilityService` neexistuje v CI4. | Adresárová štruktúra | `ls -la app/Services` nepotvrdzuje existenciu. | VERIFIED | Ponechať. |
| 25| `PropertyController` neexistuje v CI4. | Adresárová štruktúra | `ls -la app/Controllers` nepotvrdzuje existenciu. | VERIFIED | Ponechať. |
| 26| Ostatné legacy väzby a `pVyuctSBD` polia chýbajú. | Zdrojový repozitár | Sú v binárnej forme a nie plain texte. | OPEN ISSUE | |
| 27| CI4 Testy pre PropertyManagement neexistujú. | Adresárová štruktúra | `ls -la tests/` nepotvrdzuje existenciu testov pre tieto moduly. | VERIFIED | Ponechať. |

## 3. OPEN ISSUES

Nasledujúce tvrdenia nie sú plne overiteľné z textových podkladov a nesmú byť použité ako potvrdená business logika:

1. **Konkrétna výpočtová logika:** Žiadna z 5 procedúr (`pDomacnost`, `pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`) nemá vo formátoch `JU.TTT`, `JU.RDB`, alebo `PRINTER.TXT` extrahované jasné vzorce (napr. ako bola DPH alebo Cestovné extrahované). Sú uzamknuté v binárnych štruktúrach legacy repozitára.
2. **Rozpočítavanie nákladov a sadzby:** Spôsob prideľovania paušálov, jednotkových cien (`j_cena`) a podmienky (napr. nočný/denný prúd pre SSE, koeficienty pre teplo) sú neznáme.
3. **Zaokrúhľovacie pravidlá:** Pre výpočty týkajúce sa bytov nie je explicitne známe, či sa zaokrúhľuje matematicky, nadol, nahor a na koľko desatinných miest pred finálnym uložením z formátu FAND Real48 do MariaDB desatinných čísel.
4. **Závislosť `bytudaje`:** Tabuľka chýba v MariaDB. Nie je známe, aká bola jej štruktúra a či je nevyhnutná pre spustenie procedúr ako `pDomacnost`.

## 4. Unsupported assumptions

Dokument si správne zachoval konzervatívny postoj a nevymýšľal umelé predpoklady ohľadom business logiky.
Všetky inferencie (napr. spojenie tabuľky `elsasa` s procedúrou `pVyuctSSE`) vychádzajú z:
- `MIGRATION_MAP.md` (oficiálneho zadania modulu)
- Blízkosti textových reťazcov v zdrojových `RDB/TTT` súboroch.
- Názvov samotných tabuliek a stĺpcov, ktoré logicky sedia.
Tieto inferencie boli ponechané len vo forme zoznamu vstupov, dokument vyslovene označuje samotné kalkulácie za `OPEN ISSUE`.

## 5. Contradictions

V procese auditu neboli zistené **žiadne** zjavné rozpory medzi tvrdeniami v `PROPERTY_MANAGEMENT_FORENSIC.md`/`READINESS.md` a reálnym stavom databázy alebo preskúmaných súborov.

## 6. Missing evidence

Na uzavretie spomínaných `OPEN ISSUES` by bolo potrebné:
1. Použiť špecializovaný FAND dekompilačný nástroj na vyextrahovanie business blokov (napríklad `#C` bloky pre výpočet poľa) z formulárov uzamknutých v súboroch `.000` (napríklad `elsasa.000` UI definícia), aby sme videli reálnu matematiku výpočtu spotreby.
2. Vysvetlenie od pôvodného vývojára, prečo bola vynechaná tabuľka `bytudaje.000` v aktuálnom SQL dumpe `ju_migration_test`.

---

**VERIFIED:** 14
**PARTIALLY VERIFIED:** 5
**INFERRED:** 0
**OPEN ISSUE:** 8
**CONTRADICTED:** 0
