# PROPERTY_MANAGEMENT_FORENSIC_EXTRACTION

## 1. Executive Summary
Tento dokument predstavuje audit OPEN ISSUE zistených v rámci legacy FAND modulu `PropertyManagement` (`pDomacnost`, `pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`). Preskúmanie textových a binárnych zdrojov ukázalo, že matematická a business logika je uzamknutá vo forme `#procedure` blokov vo FAND `.RDB` a `.000` súboroch, z ktorých nebolo možné textovo extrahovať vzorce bez dekompilátora.
Databáza `ju_migration_test` bola priamo overená cez SQL. Na základe tohto auditu NIE JE odporúčané začať s programovaním `UtilityService` v CI4, kým nebude otvorená business logika explicitne objasnená.

## 2. Sources inspected
- **`JU.TTT`**: Analyzované, obsahujú len menovité odkazy na procedúry.
- **`JU.RDB`**: Analyzované cez `strings` a dekompilačný python skript. `#procedure` názvy existujú, ale matematické bloky `#C` neboli nájdené v čitateľnom tvare.
- **`JU.CAT`**: Analyzované cez `strings`, potvrdilo mapovanie tabuliek.
- **`PRINTER.TXT`**: Analyzované (neobsahuje parametre výpočtov).
- **Previous Audit Docs**: `PROPERTY_MANAGEMENT_READINESS.md`, `PROPERTY_MANAGEMENT_FORENSIC.md`, `PROPERTY_MANAGEMENT_FORENSIC_AUDIT.md`.
- **Database**: MariaDB `ju_migration_test` (priame SQL queries nad tabuľkami).

## 3. Complete OPEN ISSUE inventory

**Issue 1**
1. **ID:** OI-01
2. **Presné tvrdenie/problém:** Výpočtová logika, vzorce a zaokrúhľovanie pre legacy procedúru sú nedostupné (kompilované) a tabuľka bytudaje chýba.
3. **Legacy modul:** `pDomacnost`
4. **Dotknuté tabuľky:** `byt`, `bytudaje` (missing)
5. **Dotknuté polia:** `a1`, `a2a`-`h`, `a3`-`a5`, `b1`-`b10`
6. **Súčasný zdroj dôkazu:** Pokus o extrakciu `strings` z `JU.RDB` a `MIGRATION_MAP.md`.
7. **Čo presne chýba dokázať:** Znenie aritmetických operácií a väzba na polia medzi tabuľkami.
8. **Forensic extraction solution:** Nie je možné pomocou čistého textu, vyžaduje binárny dekompilátor, prečítať z `FByt.x` a `PpDomacnost`.

**Issue 2**
1. **ID:** OI-02
2. **Presné tvrdenie/problém:** Výpočtová logika, vzorce a zaokrúhľovanie pre legacy procedúru sú nedostupné (kompilované).
3. **Legacy modul:** `pVyuctSBD`
4. **Dotknuté tabuľky:** `byt`
5. **Dotknuté polia:** Nešpecifikované.
6. **Súčasný zdroj dôkazu:** Pokus o extrakciu `strings` z `JU.RDB` (`PpVyuctSBD`).
7. **Čo presne chýba dokázať:** Znenie aritmetických operácií a ktoré polia tabuľky `byt` sú do nej vstupom a výstupom.
8. **Forensic extraction solution:** Nie je možné pomocou čistého textu, vyžaduje binárny dekompilátor.

**Issue 3**
1. **ID:** OI-03
2. **Presné tvrdenie/problém:** Výpočtová logika, vzorce a zaokrúhľovanie pre legacy procedúru sú nedostupné (kompilované).
3. **Legacy modul:** `pVyuctSSE`
4. **Dotknuté tabuľky:** `elsasa`, `vyucsse`
5. **Dotknuté polia:** `el_v`, `spotreba`, `pausal`
6. **Súčasný zdroj dôkazu:** Pokus o extrakciu `strings` z `JU.RDB`.
7. **Čo presne chýba dokázať:** Ako sa počítajú paušály a spotreba nočný/denný prúd.
8. **Forensic extraction solution:** Nie je možné pomocou čistého textu, vyžaduje binárny dekompilátor, hľadať v `FVyuctSSE.x`.

**Issue 4**
1. **ID:** OI-04
2. **Presné tvrdenie/problém:** Výpočtová logika, vzorce a zaokrúhľovanie pre legacy procedúru sú nedostupné (kompilované).
3. **Legacy modul:** `pVyucH2OSasa`
4. **Dotknuté tabuľky:** `h2osasa`
5. **Dotknuté polia:** `h2o_v`, `h2o_n`, `sk_v`
6. **Súčasný zdroj dôkazu:** Pokus o extrakciu `strings` z `JU.RDB`.
7. **Čo presne chýba dokázať:** Výpočet celkovej ceny vody podľa metrov štvorcových alebo paušálu, algoritmus.
8. **Forensic extraction solution:** Nie je možné pomocou čistého textu, vyžaduje binárny dekompilátor, z `FH2O_Sasa.x`.

**Issue 5**
1. **ID:** OI-05
2. **Presné tvrdenie/problém:** Výpočtová logika, vzorce a zaokrúhľovanie pre legacy procedúru sú nedostupné (kompilované).
3. **Legacy modul:** `pOdpoceTeplo`
4. **Dotknuté tabuľky:** `teplo`
5. **Dotknuté polia:** `zac_ob`, `kon_ob`
6. **Súčasný zdroj dôkazu:** Pokus o extrakciu `strings` z `JU.RDB`.
7. **Čo presne chýba dokázať:** Výpočet sumy z rozdielu stavov meračov tepla.
8. **Forensic extraction solution:** Nie je možné pomocou čistého textu, vyžaduje binárny dekompilátor, z `FTeplo.x`.

**Issue 6**
1. **ID:** OI-06
2. **Presné tvrdenie/problém:** Specific legacy FAND Real48 rounding procedures are undocumented.
3. **Legacy modul:** Všetky 5.
4. **Dotknuté tabuľky:** `byt`, `elsasa`, `h2osasa`, `teplo`
5. **Dotknuté polia:** Všetky float polia (a1-b10, spotreby, sumy)
6. **Súčasný zdroj dôkazu:** `PROPERTY_MANAGEMENT_FORENSIC_AUDIT.md`.
7. **Čo presne chýba dokázať:** Či a na koľko miest sa zaokrúhľuje medzivýpočet.
8. **Forensic extraction solution:** Nie je možné pomocou textu, potrebné spustiť legacy DOS aplikáciu.

## 4. Database verification
Priamy SQL dotaz v databáze `ju_migration_test`:
- `byt` - Exists. Záznamy: 30. Max: 2005-12-01.
- `bytudaje` - **Neexistuje**. Záznamy: 0. Max: NULL.
- `elsasa` - Exists. Záznamy: 61. Max: 2020-08-10.
- `h2osasa` - Exists. Záznamy: 30. Max: 2025-11-11.
- `teplo` - Exists. Záznamy: 4. Max: 2005-12-31.
- `vyucsse` - Exists. Záznamy: 8. Max: 2003-08-01.
- `vyucspp` - Exists. Záznamy: 26. Max: 2005-03-31.

## 5. pDomacnost findings
- **vstupné tabuľky/polia:** `byt` (`a1`, `b1`-`b10`), chýbajúca `bytudaje`.
- **výstupné hodnoty:** Úpravy záznamov v `byt`.
- **väzby:** Nezistiteľné z textu.
- **výpočty/ceny/obdobia/zaokrúhľovanie/podmienky:** Nezistiteľné (Binárne).

## 6. pVyuctSBD findings
- **vstupné údaje:** `byt`
- **výpočet/zálohy/rozdiely/obdobie/zaokrúhľovanie:** Nezistiteľné (Binárne).

## 7. pVyuctSSE findings
- **vstupné údaje:** `elsasa` (`el_v`, `spotreba_v`), `vyucsse`.
- **väzby:** Predpokladaná väzba cez mesiac a rok z `vyucsse` na `elsasa`.
- **výpočet/cena/obdobie/zaokrúhľovanie:** Nezistiteľné (Binárne).

## 8. pVyucH2OSasa findings
- **vstupné údaje:** `h2osasa` (`h2o_v`, `h2o_n`, `spotreba`).
- **vodomery/spotreba/rozdelenie/obdobie/zaokrúhľovanie:** Nezistiteľné (Binárne).

## 9. pOdpoceTeplo findings
- **vstupné údaje:** `teplo` (`zac_ob`, `kon_ob`).
- **spotrebu/koeficienty/rozdelenie/zaokrúhľovanie:** Nezistiteľné (Binárne).

## 10. Field/table mappings
- `byt.000` -> `byt`
- `bytudaje.000` -> `bytudaje` (Table Missing)
- `elsasa.000` -> `elsasa`
- `h2o_sasa.000` -> `h2osasa`
- `teplo.000` -> `teplo`
- `vyuctsse.000` -> `vyucsse`
- `vyuctspp.000` -> `vyucspp`

## 11. Extracted formulas
- **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE**.
Žiadne `#C` vzorce vo voľnom texte neboli nájdené.

## 12. Historical branches
- **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE**.
Neexistujú textové dôkazy o dátumových if/else vetvách.

## 13. Rounding rules
- **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE**.
Zaokrúhľovacie procedúry neidentifikované.

## 14. Golden dataset candidates
| Modul | Tabuľka | Dostupné obdobie | Počet relevantných záznamov | Kandidát na Golden |
| :--- | :--- | ---: | ---: | :--- |
| `pDomacnost` | `byt` | 2005 | 30 | NIE (Too old, no specific calculations) |
| `pVyuctSBD` | `byt` | 2005 | 30 | NIE |
| `pVyuctSSE` | `elsasa` | 2020 | 61 | ÁNO |
| `pVyucH2OSasa`| `h2osasa` | 2025 | 30 | ÁNO |
| `pOdpoceTeplo`| `teplo` | 2005 | 4 | NIE |

## 15. Resolved issues
1. Zistené a potvrdené názvy a existencia tabuliek (`byt`, `elsasa`, `h2osasa`, `teplo`, `vyucsse`, `vyucspp`) pomocou priameho dopytu - **RESOLVED – DIRECT EVIDENCE**.
2. Preukázané volanie menu funkcií v `JU.TTT` a prepojenia FAND štruktúr v `JU.RDB` a mapovanie v `JU.CAT` - **RESOLVED – DIRECT EVIDENCE**.
3. Chýbajúca tabuľka `bytudaje` bola potvrdená priamym SQL dotazom - **RESOLVED – DIRECT EVIDENCE**.
4. Spárovanie `pVyuctSSE` s tabuľkou `elsasa` a `vyucsse` - **RESOLVED – STRONG INDIRECT EVIDENCE** (Na základe názvov v RDB a MIGRATION MAP).

## 16. Remaining OPEN ISSUE (s klasifikáciou)
- Issue OI-01: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (vzorčeky logiky neznáme).
- Issue OI-02: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (vzorčeky logiky neznáme).
- Issue OI-03: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (vzorčeky logiky neznáme).
- Issue OI-04: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (vzorčeky logiky neznáme).
- Issue OI-05: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (vzorčeky logiky neznáme).
- Issue OI-06: **OPEN ISSUE – BINARY FAND LOGIC NOT DECODABLE** (zaokrúhľovanie).
- Tabuľka bytudaje pre pDomacnost: **OPEN ISSUE – NO DATA**.
- Golden sety pre teplo, byt: **OPEN ISSUE – INSUFFICIENT SOURCE** / **NO GOLDEN DATA**.

## 17. Unsupported assumptions
Žiadne predpoklady neboli označené ako faktické business pravidlo. Akákoľvek väzba medzi `pVyuctSSE` a `elsasa` je podložená silnou nepriamou evidenciou z kontextu (MIGRATION_MAP.md), avšak konkrétny algoritmus zostáva neznámy.

## 18. Recommended next implementation step
Konkrétne kroky pre vyriešenie každej OPEN ISSUE z bodu 3:
- **Pre OI-01 (pDomacnost):** Použiť špecializovaný FAND dekompilátor, exportovať `FByt.x` definíciu do čistého textu na prečítanie `#procedure` (blok `PpDomacnost`).
- **Pre OI-02 (pVyuctSBD):** Získať čitateľný export pre formulár `FVyuctSBD.x` z dekompilátora pre získanie `#C` blokov.
- **Pre OI-03 (pVyuctSSE):** Spustiť DOSBox, vyvolať vyúčtovanie SSE ručne pre rok 2020 v legacy systéme a zapísať postupnosť výpočtov z obrazovky.
- **Pre OI-04 (pVyucH2OSasa):** Spustiť DOSBox, vyvolať vyúčtovanie Vody pre rok 2025 v legacy systéme a zapísať postupnosť výpočtov z obrazovky.
- **Pre OI-05 (pOdpoceTeplo):** Získať FAND čitateľný text pre `FTeplo.x` z dekompilátora na analýzu výpočtu spotreby.
- **Pre chýbajúce bytudaje (OI-01 časť):** Skontrolovať staršie zálohy, či sa tabuľka `.000` nenachádza niekde inde, alebo spustiť legacy DOS aplikáciu a zistiť, či je sekcia `Udaje` z menu vôbec povinná.
