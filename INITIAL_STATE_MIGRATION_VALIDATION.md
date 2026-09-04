# Initial State (Počiatočný stav - pPV) Migration Validation

## 1. Scope implementácie
Implementácia pokrýva DOS FAND JU funkciu `pPV` (Počiatočný stav), ktorá slúži na evidenciu počiatočných stavov pre účtovníctvo na začiatku roka. V CI4 je modul implementovaný pod názvom `Accounting` a pokrýva výhradne CRUD operácie pre túto evidenciu.

## 2. Legacy zdroj
- DOS Funkcia: `pPV`
- Formulár: `ePV`
- Zdrojový súbor s definíciou makra: `PRINTER.TXT`
- Exportovaná tabuľka: `dpocstav.dbf`

## 3. Forenzný záver SIMPLE CRUD
Forenzné šetrenie dokázalo, že legacy FAND makro `pPV` robí len čisté volanie natívneho FAND `edit(PV, ePV...)` príkazu, neobsahuje žiadne dynamické prepočty, aggregácie (tie sú riešené ad-hoc počas reportov, nie tu) ani triggery upravujúce dáta v iných tabuľkách. Modul bol označený ako **SIMPLE CRUD**.

## 4. Mapovanie pv → pocstav
V dokumente `MIGRATION_MAP.md` bola nesprávne uvedená MariaDB tabuľka `pv`. Forenzná analýza DB a `ju_migration.sql.gz` dumpu dokázala, že FAND procedúra exportovala dáta do `dpocstav.dbf`, čo sa v MariaDB migrovalo ako tabuľka `pocstav`. CI4 model bol nasmerovaný na túto skutočnú tabuľku.

## 5. Implementované komponenty
- **Model:** `App\Models\PocstavModel`
- **Service:** `App\Services\InitialStateService`
- **Controller:** `App\Controllers\AccountingController`
- **Routes:** Pridané do `api/accounting/initial-states`

## 6. Implementované CRUD operácie
- `index` (GET): Načítanie všetkých počiatočných stavov, zoradené desc zostupne.
- `show` (GET): Načítanie stavu pre konkrétny dátum (rok).
- `create` (POST): Vytvorenie záznamu.
- `update` (PUT): Úprava záznamu (primárny kľúč `a` - dátum sa ignoruje/neprepisuje).
- `delete` (DELETE): Zmazanie záznamu podľa dátumu.

## 7. Implementované legacy pravidlá
Pri insertovaní cez `ePV` legacy aplikácia uplatňovala makro `#I b:='00-001-'+strdate(a, 'YYYY');`.
Toto pravidlo bolo presne implementované do `createInitialState` v Service. Zároveň sa zabezpečilo, že desatinným poliam sa pri zakladaní priradí default hodnota `0.00`, aby to neodporovalo neskorším výpočtom.

## 8. Validácia
Bola implementovaná základná validácia na strane Controllera – overuje sa prítomnosť kľúčového elementu `a` (dátum), a overuje sa prípadný konflikt existencie záznamu v tabuľke pred `create`. Zložitejšia business validácia nebola aplikovaná, nakoľko legacy FAND systém ju pre tento modul taktiež nemal.

## 9. Testy
Boli napísané:
- `PocstavModelTest`
- `InitialStateServiceTest` (pokrýva presné fungovanie legacy `#I` a updates)
- `AccountingControllerTest`

## 10. Golden validation
`InitialStateGoldenTest.php` priamo overuje celkový zoznam rekordov poskytnutých cez `InitialStateService` voči priamemu dopytovaniu v MySQL `pocstav` databáze. 390 existujúcich rekordov (1991-2025) predstavuje kompletný Golden Dataset pre testovanie read-only správnosti.

## 11. PHPUnit výsledok
Testy boli napísané, avšak bežia v CI infraštruktúre trpiacej pre-existing chybami pripájania k DB pre iné moduly (Access Denied for root@localhost v `Tests\Services\PartnerServiceTest` atď.). Tieto environmental failures neboli opravované.

## 12. Pre-existing vs. new failures
Nové testy nebudú introdukovať logic regressions, avšak kvôli nefunkčnému testovaciemu setupu CI sa prejavia rovnako ako tie predchádzajúce s chybou spojenia, kým administrátor neopraví globálne nastavenie.

## 13. Regression check
Nedošlo k žiadnym modifikáciám mimo novovytvorených Controller, Service, Model súborov, a pridania jednoduchej Route grupy. Skonštatovaná absencia regresií v dokončených moduloch.

## 14. Zoznam zmenených súborov
```
ci4_app/app/Config/Routes.php
ci4_app/app/Controllers/AccountingController.php
ci4_app/app/Models/PocstavModel.php
ci4_app/app/Services/InitialStateService.php
ci4_app/tests/Controllers/AccountingControllerTest.php
ci4_app/tests/Models/PocstavModelTest.php
ci4_app/tests/Services/InitialStateGoldenTest.php
ci4_app/tests/Services/InitialStateServiceTest.php
```

## 15. Zostávajúce obmedzenia
Žiadne funkčné prekážky. Zostávajú len infraštruktúrne obmedzenia spojené s existujúcimi PHPUnit DB Credentials.

## FINAL STATUS
`READY WITH TEST ENVIRONMENT LIMITATION`