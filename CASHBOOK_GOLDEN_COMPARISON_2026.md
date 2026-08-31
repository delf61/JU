# CASHBOOK GOLDEN COMPARISON 2026

**1. Použitá verzia CI4 kódu:** `ci4_app/app/Services/CashbookService.php` (aktuálny stav)
**2. Testované obdobie:** `2026-01-01` až `2026-06-30` (H1 2026)
**3. Zdroj Golden dát:** `CASHBOOK_GOLDEN_2026.md` a `ju_migration_test` databáza
**4. Počet vstupných záznamov:** 72

---

## 5 & 6. CI4 výsledky vs FAND Golden výsledky

| Skupina / `vydaj` | FAND Golden počet | CI4 počet | FAND suma (a1+a3) | FAND suma (a2+a4) | CI4 suma a1 | CI4 suma a2 | CI4 suma a3 | CI4 suma a4 |
| ----------------- | ----------------: | --------: | ----------------: | ----------------: | ----------: | ----------: | ----------: | ----------: |
| 1                 | 35                | 35        | 0.00              | 2058.03           | 0.00        | 1206.40     | 0.00        | 851.63      |
| 4                 | 11                | 11        | 0.00              | 1965.94           | 0.00        | 0.00        | 0.00        | 1965.94     |
| 6                 | 1                 | 1         | 0.00              | 1869.11           | 0.00        | 0.00        | 0.00        | 1869.11     |
| D                 | 14                | 14        | 3384.31           | 223.04            | 0.00        | 0.00        | 3384.31     | 223.04      |
| H                 | 1                 | 1         | 700.00            | 0.00              | 700.00      | 0.00        | 0.00        | 0.00        |
| O                 | 1                 | 1         | 56.80             | 0.00              | 0.00        | 0.00        | 56.80       | 0.00        |
| Q                 | 1                 | 1         | 359.00            | 0.00              | 0.00        | 0.00        | 359.00      | 0.00        |
| S                 | 7                 | 7         | 2455.00           | 0.00              | 0.00        | 0.00        | 2455.00     | 0.00        |
| d                 | 1                 | 1         | 0.00              | 65.12             | 0.00        | 0.00        | 0.00        | 65.12       |

---

## 7. Discrepancy tabuľka

Porovnanie agregovaných súčtov:

| Kategória | FAND Golden | CI4 Service | Rozdiel |
|---|---|---|---|
| a1 (príjmy v hotovosti) | 700.00 | 700.00 | 0.00 |
| a2 (výdavky v hotovosti) | 1206.40 | 1206.40 | 0.00 |
| a3 (príjmy na účet) | 6255.11 | 6255.11 | 0.00 |
| a4 (výdavky z účtu) | 4974.84 | 4974.84 | 0.00 |
| Príjmy celkom (a1+a3) | 6955.11 | 6955.11 | 0.00 |
| Výdavky celkom (a2+a4) | 6181.24 | 6181.24 | 0.00 |

*Poznámka:* FAND Golden report definuje výpočet podľa logiky `a1+a3` (príjmy) a `a2+a4` (výdavky). CI4 `CashbookService::calculateTotals()` tieto hodnoty sčítava korektne: `income_cash` (a1), `expense_cash` (a2), `income_bank` (a3), `expense_bank` (a4). Ich súčet sa presne zhoduje s FAND Golden referenciou.

---

## 8. Analýza `50*`

V Golden reportoch sa pre `50*` záznamy uvádza: "Pravidlo 50* platí výhradne pre DPH reporty (rDPH_vstupPD)". CI4 `CashbookService::calculateTotals()` túto podmienku rešpektuje - v kóde sa žiadne filtrovanie podľa poľa `b` s prefixom `50` nevyskytuje. Zahrňuje všetkých 29 záznamov rovnako ako FAND.

---

## 9. Analýza `vydaj`

CI4 `CashbookService` nespracováva kód `vydaj` pri agregácii celkových súčtov (`a1` až `a4`), všetky záznamy sčituje na základe stĺpcov, bez ohľadu na znak vo `vydaj`. Podľa Golden reportu, FAND taktiež klasifikuje sumy do základov (`a1+a3` a `a2+a4`), čo sedí s CI4 súčtami. Ak by bolo potrebné robiť špecifické reporty alebo UI filtrovanie podľa `vydaj` kódu, CI4 CashbookService v aktuálnej forme iba iteruje riadky. Celkový výsledný súčet je však zhodný.

---

## 10. Analýza `a1+a3` / `a2+a4`

CI4 `CashbookService` správne zbiera `a1`, `a2`, `a3`, `a4` do premenných `income_cash`, `expense_cash`, `income_bank` a `expense_bank`. Príjmy a výdavky je možné vypočítať priamo sčítaním týchto hodnôt. Správanie plne odzrkadľuje logiku DOS FANDu.

---

## 11. Zoznam konkrétnych rozdielnych záznamov

Nenašli sa žiadne rozdielne záznamy. Všetkých 72 analyzovaných záznamov v CI4 odpovedá rovnakej agregácii a hodnotám ako FAND Golden.

---

## 12. Záver

**A. VERIFIED – CI4 CashbookService presne reprodukuje Golden**

Služba `CashbookService` spracováva príslušné polia (`a1-a4`) bezchybne, ignoruje `_fand_deleted` podľa očakávania, a zahŕňa všetky záznamy (vrátane tých, ktoré začínajú `50*`), čím presne dosahuje zhodné výsledky s pôvodnou FAND logikou pre Cashbook modul.
