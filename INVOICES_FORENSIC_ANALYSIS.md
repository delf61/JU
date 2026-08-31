# INVOICES FORENSIC ANALYSIS (DOS FAND -> CI4)

## 1. Vybraný modul a dôvod výberu

**Modul:** Invoices (Kniha vyšlých faktúr / Pohľadávky & Kniha došlých faktúr / Záväzky)

**Dôvod výberu:** V aktuálnom `MIGRATION_MAP.md` je tento modul označený ako `NAVRHNUTÉ (Čiastočne)`. Ide o kľúčový účtovný modul, ktorý priamo súvisí s už implementovaným modulom DPH a Peňažným denníkom. Testovacia databáza obsahuje reprezentatívne dáta za rok 2026, čo umožňuje deterministický Golden Test vypočítaných hodnôt (`zn`, `dph`, `status`), ktoré sa využívajú pri vyhodnocovaní úhrad.

## 2. DOS FAND zdroje

- **Súbory:** `JU.RDB`, `JU.TTT`, `PRINTER.TXT`
- **Procedúry:** `pZavazky`, `pPohladavky`
- **Filtre a pohľady:** `#K @ a,~b` (Pohľadávky aj Záväzky), prepojenie s Platbami a Úhradami.

## 3. CI4 zdroje

- **Súbory:** `ci4_app/app/Services/ReceivableService.php`, `ci4_app/app/Services/LiabilityService.php`
- **Metódy:** `calculateStatus($invoice, $year)`

## 4. Databázové tabuľky

- `kp` (Kniha pohľadávok) - vyšlé faktúry (Receivables)
- `kz` (Kniha záväzkov) - došlé faktúry (Liabilities)

## 5. Použité obdobie 2026

- Rok: **2026** (`YEAR(a) = 2026`)
- Záznamy `kp`: 6 faktúr
- Záznamy `kz`: 33 faktúr

## 6. Forenzne odvodené FAND pravidlá a dátové dôkazy

Z `JU.TTT` a `PRINTER.TXT` boli pre výpočet celkovej sumy faktúry (`zn`), DPH a statusu úhrady (`Uhr`) identifikované tieto pravidlá a overené na reálnych dátach databázy `ju_migration_test`:

### Kniha záväzkov (`kz` - Došlé faktúry):

**Pravidlo 1: DPH a `par_69` (Reverse Charge)**
V FAND kóde je pravidlo pre DPH: `DPH_Sk := cond(rok < 2009 : (z * (dph/100)) round 1, else : cond( par_69 : 0, else : (z * (dph/100)) round 2)) : F,6.2;`
- **Dátový dôkaz:** Záznamy `kz` v roku 2026 s `par_69=1` (doklady `016/2026`, `025/2026`, `031/2026`) majú v FAND výsledné `DPH_Sk = 0`. V CI4 sa táto DPH započítava.
- **Matematický dôkaz (napr. doklad `016/2026`):**
  - `z = 83.17`, `dph = 23%`, `par_69 = 1`
  - FAND DPH: `0`
  - FAND ZN: `83.17 + 0 = 83.17`
  - CI4 DPH: `83.17 * 0.23 = 19.13`
  - CI4 ZN: `83.17 + 19.13 = 102.30`
  - **Rozdiel:** `19.13`. Tvrdenie, že CI4 počíta vyššie `zn` pre `par_69` faktúry je týmto bezpečne overené a dokázané.

**Pravidlo 2: Halierové vyrovnanie (`vyrovn`)**
FAND kód pre celkovú sumu záväzku: `zn := zn_x + zn_y + zn_z + vyrovn : F,6.2;`
- **Dátový dôkaz:** Záznam `kz` doklad `024/2026` má hodnotu `vyrovn = 0.01`. V CI4 (kde `vyrovn` chýba vo výpočte), je vypočítané `zn` menšie presne o `0.01`.
- **Matematický dôkaz:**
  - `z = 7.02`, `dph = 23%`, `vyrovn = 0.01`
  - FAND ZN: `7.02 + 1.61(dph) + 0.01 = 8.64`
  - CI4 ZN: `7.02 + 1.61(dph) = 8.63`

**Pravidlo 3: Status Úhrady a Tolerancia (< 0.1)**
FAND kód: `Uhr := cond (uhrada=0 & zn<>0 : '', zn = uhrada | zn - uhrada < 0.1 : '\xfe', zn > uhrada : '<', else : '>') : A,1;`
- **Dátový dôkaz:** V roku 2026 neexistuje **žiadny** záznam, ktorý by túto toleranciu využíval. Všetky uhradené záznamy v 2026 majú presnú zhodu `zn == uhrada`.
- Avšak dotaz do starších dát dokazuje reálne využitie tohto pravidla vo viac ako 30 prípadoch (napr. rok 2008 doklad `117/2008` so `zn = 5029.02` a `pc = 5029`, rozdiel `0.02`, FAND status: plne uhradené).

### Kniha pohľadávok (`kp` - Vyšlé faktúry):

FAND kód pre ZN: `zn := z + DPH_Sk + vyrovn : F,6.2;`
- **Dátový dôkaz:** CI4 `ReceivableService` už obsahuje `vyrovn` vo výpočte. Záznamy roku 2026 neobsahujú žiadne halierové rozdiely ani reverzný mechanizmus. Zhodujú sa s FAND na 100%.

## 8. Reprodukovateľný Golden výpočet a Výsledky 2026

Reprodukovateľný Golden výpočet bol vykonaný oddelene pre `kp` a `kz` simulovaním presných podmienok (`JU.TTT`) s využitím dátových extrakcií.

**Výsledok Golden Validácie 2026:**
- **Pohľadávky (`kp`):** Analyzovaných 6 záznamov. Zistené **0** rozdielov medzi FAND algoritmom a CI4.
- **Záväzky (`kz`):** Analyzovaných 33 záznamov. Zistené **4** rozdiely. Všetky 4 rozdiely sú presne definované nižšie.

**Discrepancy tabuľka (Záväzky - izolované rozdiely):**

| Dátum | Číslo Dokladu | FAND_ZN | CI4_ZN | Dôvod / Pravdepodobná príčina |
| :--- | :--- | :--- | :--- | :--- |
| 2026-05-01 | 016/2026 | 83.17 | 102.30 | CI4 ignoruje flag `par_69=1`, čím neoprávnene pripočíta DPH 19.13. |
| 2026-06-12 | 024/2026 | 8.64 | 8.63 | CI4 ignoruje pole `vyrovn=0.01` vo výpočte celkovej sumy ZN. |
| 2026-06-29 | 025/2026 | 39.87 | 49.04 | CI4 ignoruje flag `par_69=1`, čím neoprávnene pripočíta DPH 9.17. |
| 2026-08-04 | 031/2026 | 133.38 | 164.06 | CI4 ignoruje flag `par_69=1`, čím neoprávnene pripočíta DPH 30.68. |

## 12. OPEN ISSUES / UNKNOWN

- `OPEN ISSUE - NOT PROVEN`: Zatiaľ nebolo overené, či statusy faktúr (čiastočná úhrada, preplatok) sa historicky do `kz`/`kp` tabuliek ukladali natrvalo, alebo boli vo FAND rátané čisto len "za letu" pri zobrazení `edit(...)` okna.

## 13. Záver

Forenzná analýza nad rokom 2026 jasne a matematicky dokazuje systémovú odchýlku aktuálnej implementácie CI4 v module `LiabilityService` oproti pôvodnému FAND:
1. CI4 u Záväzkov nezohľadňuje §69 (`par_69`). Dátovo dokázané, že prítomnosť `par_69` u došlých faktúr vyžaduje nulovú DPH pre celkovú sumu záväzku (`zn`).
2. CI4 u Záväzkov nezohľadňuje pole `vyrovn`. Dátovo dokázané na doklade `024/2026`.
3. CI4 `calculateStatus` chýba `< 0.1` fuzzy logika pre dorovnanie uhradenosti faktúry (dokázané na historických dátach, hoci v roku 2026 k takémuto stavu nedošlo).

Modul `ReceivableService` (Pohľadávky) nevykazuje za rok 2026 žiadne rozdiely a je preukázateľne zhodný s historickým výpočtom.

## 14. Odporúčanie pre ďalšiu fázu

V nasledujúcej fáze implementácie je nutné upraviť metódu `LiabilityService::calculateStatus`:
- Doplniť pole `vyrovn` do vzorca `$zn`.
- Ak existuje `par_69 == true`, DPH pre účely celkovej platobnej sumy `$zn` sa nesmie pripočítať (musí byť 0).
- Zaviesť toleranciu platenia (`$zn - $uhrada < 0.1`).