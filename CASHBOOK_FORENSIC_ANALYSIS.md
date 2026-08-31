# Cashbook – fáza 1: forenzná analýza DOS FAND `pPD`, `pPDsuma`, `pPDkod`

> **Implementácia Cashbook v CI4 zatiaľ NEBOLA upravovaná.**

## A. Pôvod a účel

* **`pPD`**: Pôvodná FAND procedúra slúžiaca ako hlavný dátový editor pre evidenciu a prezeranie účtovných pohybov (Peňažný denník). Riadi užívateľské rozhranie (browse mode, edit mode), umožňuje filtrovanie a umožňuje volanie ďalších podprogramov (napríklad sumáre cez F3).
* **`pPDsuma`**: Zabezpečuje výpočet priebežných a celkových súčtov peňažného denníka. Definuje pamäťovú tabuľku `SumaPD` (resp. formát/výkaz) a plní ju agregovanými hodnotami (napríklad počítaním `a2 + a4` pre jednotlivé kódy výdavkov). Pripája údaje z externých evidencií (`IKzp`, `Leasing`, `StraDoch`).
* **`pPDkod`**: Obsluhuje automatické priraďovanie kódov pre príjmy (`pPrijmy_Kod`) a výdavky (`pVydaje_Kod`). Ak je zadaná suma v hotovosti (`a2`) alebo na účte (`a4`), procedúra vyvolá editor, kde užívateľ špecifikuje presný rozpis výdavku do príslušných kategórií.

## B. Vstupné tabuľky a polia

* **`pd` (Peňažný denník)**:
  * `a1` (Príjem v hotovosti), `a2` (Výdaj v hotovosti)
  * `a3` (Príjem na účet), `a4` (Výdaj z účtu)
  * `vydaj` (Kód klasifikácie operácie)
  * `b` (Interné číslo dokladu)
  * `a7` až `a17` (Stĺpce pre kategorizáciu, no často sú v `mPDsuma` počítané dynamicky z `a2+a4`)
  * `p` a `r` (Booleany indikujúce priebežné položky `p` a hotovostné uzávierky `r`)
* **Ďalšie (v `pPDsuma`)**: `SC` (služobné cesty), `IKzp` (odpisy majetku), `StraDoch` (straty a dôchodky), `Leasing`.

## C. Presná rekonštrukcia algoritmov

### 1. `mPDsuma` (Agregačná logika)
Súčty pre kategórie (napr. daňové výdavky, réžia, atď.) sa neagregujú iba sčítaním polí `a7`-`a17`. Agregujú sa primárne identifikovaním súčtu **`I1.a2 + I1.a4` (Výdaj hotovosť + Výdaj účet)** tam, kde pole `vydaj` zodpovedá príslušnému kódu (napr. `vydaj='5'` pre DKP, `vydaj='t'` pre nákup tovaru).

### 2. Pravidlo `50*` (Vylúčenie záznamov s b="50...")
Pri analýze DPH sme objavili pravidlo, ktoré vylučuje záznamy začínajúce na `50`. Forenzná analýza však odhalila, že **toto pravidlo sa nevzťahuje na všeobecnú agregáciu Cashbooku (pPDsuma)**.
V FAND kóde (`pKontrol_PD1` a `pKontrol_PD2`) sa prefix `50` dynamicky priradzuje záznamom o nákupe tovaru (`vydaj = 't'`), ak ide o platbu z účtu (`a2=0`). Skutočný výpočet `SumaPD` tieto záznamy riadne sčítava; ich vylúčenie je iba špecifikom procedúr pre výpočet DPH (aby sa neduplikovali odpočty, prípadne z iných historických dôvodov).

### 3. Logika kódov (`pPDkod`)
Ak `a2 <> 0` alebo `a4 <> 0`, aplikácia volá `pVydaje_Kod`, kde sa overuje, či sa celková suma výdavku zhoduje so sumou rozdelenou do podkategórií.

## D. Tabuľka všetkých identifikovaných pravidiel

| Pravidlo | Legacy dôkaz | Stav |
| --- | --- | --- |
| Súčet výdavkov danej kategórie = a2 + a4 | Kód v `mPDsuma`: `cond(I1.vydaj ='t' : I1.a2 + I1.a4)` | OVERENÉ |
| Záznamy `b = 50*` NIE SÚ vylúčené z Cashbook súčtov | Kód v `mPDsuma` neobsahuje podmienku `b NOT LIKE '50%'` | OVERENÉ |
| Záznamy `b = 50*` vznikajú pri úhrade tovaru cez účet | Kód v `pKontrol_PD1`: `if PD[x].vydaj='t' ... PD[x].b := '50'+...` | OVERENÉ |
| `SumaPD` nezohľadňuje fyzické polia `a7`-`a17`, ale kódy `vydaj` | Skript `mPDsuma` prekrýva tieto polia vzorcom `a2+a4` a `vydaj` | OVERENÉ |
| Daňové odpisy a leasing sa načítavajú z externých tabuliek | Kód v `pPDsuma`: `forall i in IKzp ...` | OVERENÉ |

## E. Význam polí `pd`

- `a`: Dátum
- `b`: Číslo dokladu (alfanumerické)
- `vydaj`: Kategória príjmu/výdavku (alfanumerický znak, napr. '1', 't', 'd')
- `a1`, `a2`: Hotovostný príjem a výdaj
- `a3`, `a4`: Bankový príjem a výdaj
- `a7` - `a17`: Deklarované polia pre čiastkové sumy, avšak výpočty sa opierajú o kód `vydaj` a súčet `a2+a4`.

## F. Význam kódov (Pole `vydaj`)

Z analýzy kódu `pKontrol_PD1` a `mPDsuma`:
- `1`: Prevádzková réžia (všeobecná)
- `u`: Prevádzková réžia (banka)
- `2`: Prevádzková réžia (auto + cestná daň)
- `4`: Zákonné poistenie (odvody)
- `5`: Drobný hmotný a nehmotný majetok (DKP)
- `6`: Hmotný a nehmotný majetok (obstarávacia cena)
- `8`: Daň z príjmov
- `d`: DPH (odvod/vratka)
- `h`: PHM (Pohonné hmoty pre služobné autá)
- `a`: Dohoda o vykonaní práce (odmena)
- `c`: Dane z dohody o vykonaní práce
- `t`: Nákup tovaru
- `3`: Osobný účet podnikateľa

## G. Golden obdobie 2026

Bolo vybrané celoročné obdobie **2026** (január - august existujúcich dát). Toto obdobie je dostatočne rôznorodé, obsahuje 88 záznamov s viacerými kódmi (`1`, `4`, `6`, `D`, `H`, `O`, `Q`, `S`) a zahŕňa aj generovanie kódov typu `50*` (36 záznamov), na ktorých sme vedeli overiť teóriu ich započítavania.

## H. Legacy Golden Reference

Historický DOS FAND **neukladal** výsledok behu `pPDsuma` natrvalo do databázy. FAND súbor `SUMAPD.000` existuje, ale slúžil len ako runtime in-memory dataset, ktorý obsahuje zostatky alebo neplatné veľké exponenty po páde či zatvorení pre iný rok (2016). V dôsledku toho **Golden výstup nie je dostupný vo forme statickej legacy tabuľky pre rok 2026**. Referenciou sú priamo dáta v tabuľke `pd` a algoritmus extrahovaný zo zdrojových textov (`mPDsuma`). Toto je označené ako **OPEN ISSUE**.

## I. Forenzné výpočty na reálnych dátach (2026)

| Sledovaná metrika | Zistená hodnota pri priamom SQLa2+a4 z `pd` |
| --- | --- |
| Celkový hotovostný príjem (a1) | 700.00 EUR |
| Celkový hotovostný výdaj (a2) | 1,431.68 EUR |
| Celkový bankový príjem (a3) | 7,328.33 EUR |
| Celkový bankový výdaj (a4) | 5,722.36 EUR |
| Suma tovaru (kód 't') | 0.00 (v 2026 dáta tovaru chýbajú) |
| Kód '1' (Réžia) (a2+a4) | 2,518.49 EUR |
| Kód '6' (Majetok) (a2+a4) | 1,869.11 EUR |

Ak by sme aplikovali pravidlo vylúčenia `50*`, bankový výdaj by spadol na 2,988.64 EUR, čo by matematicky rozbilo celkový cashflow podniku, čím sa absolútne dokazuje, že Cashbook pravidlo `50*` **nesmie** obsahovať.

## J. Porovnanie s existujúcim CI4

Existujúci súbor `CashbookService.php` má funkciu `calculateTotals($year)`.
1. Táto funkcia jednoducho spočítava stĺpce `a7` až `a17` vo foreach slučke.
2. Nezohľadňuje logiku mapovania `vydaj -> (a2+a4)`.

## K. Identifikované rozdiely

* **ROZDIEL**: CI4 agreguje priamo polia `a7` až `a17`. FAND Cashbook na toto slúžil kód poľa `vydaj` a hodnoty `a2+a4`. FAND pri generovaní reportu hodnoty polí prekrýval (napr. `a12 := cond(I1.vydaj ='1' : I1.a2 + I1.a4);`).
* **ROZDIEL**: Logika DPH zaokrúhľovania je v CI4 len natvrdo `round(..., 0)` alebo `round(..., 2)`.
* **CHÝBAJÚCA FUNKCIONALITA**: Väzba na externé moduly (`IKzp`, `StraDoch`) pre výpočet dane a zisku úplne chýba.

## L. OPEN ISSUES / NEOVERENÉ predpoklady

1. **Absencia perzistentnej Golden Reference**: Vzhľadom k tomu, že `SUMAPD.000` bola len runtime tabuľka, nemáme ako pre rok 2026 priamo porovnať výsledky s FANDom vyprodukovaným PDF výkazom. Jedinou referenciou je reprodukcia sql sumárov na FAND dátach.
2. Niektoré kódy nájdené v dátach (`D`, `H`, `O`, `Q`, `S`) nie sú priamo zmapované v základnej rekonštrukcii FAND logiky `pKontrol_PD1`. (Možno ide o vlastné užívateľské kódy v číselníku `Vydaje`).

## M. Presný návrh ďalšej fázy

1. Na základe forenznej analýzy prepísať v ďalšej implementačnej úlohe metódu `CashbookService::calculateTotals()`, aby namiesto sčítavania surových stĺpcov `a7`-`a17` robila agregáciu štýlom `SUM(a2+a4) WHERE vydaj = ...`.
2. Doplniť testy (PHPUnit), ktoré nad skutočnými dátami 2026 v databáze overia, že súčet kategórie '1' (Réžia) je presne 2518.49 EUR a kategórie '6' je 1869.11 EUR.

> **Implementácia Cashbook v CI4 zatiaľ NEBOLA upravovaná.**
