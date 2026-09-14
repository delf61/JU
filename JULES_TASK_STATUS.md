# JULES - Aktuálny stav úloh a CI4 JU migrácie

Tento dokument slúži na sledovanie môjho pokroku, evidenciu dokončených úloh a plánovanie ďalších krokov na základe inštrukcií používateľa.

## ✅ Hotové (nedávno dokončené)
- **Datový Editor eKP (Pohľadávky)**:
  - Kompletne vybudovaný modal pre pridanie Pohľadávky na obraz `PRINTER.TXT` so všetkými originálnymi DOS poľami.
  - Dynamické JS prepočty súm a DPH.
  - Optimalizované generovanie nového čísla faktúry metódou `generateNextB`.
- **Aktualizácia Databázy**:
  - Tabuľky `ju_migration` boli úspešne vyprázdnené a naplnené najnovšími údajmi zo súboru `delf_ju_nove.zip`.
  - Aktualizovaný dump v `ju_migration.sql_pk_new.gz` v koreni repozitára.
- **Migrácia DB a surových (raw) dát**: Všetky staré DOS FAND .dbf údaje boli úspešne naimportované do `ju_migration` MariaDB databázy so zachovaním Autoincrement PKs a štruktúry.
- **Smart Prílohy k faktúram (Záväzky)**:
  - Vytvorená samostatná tabuľka `kz_prilohy` s bezpečnými väzbami na doklady `b`.
  - Vybudované UI v module Záväzkov (modálne okno, zoznam príloh, náhľad).
  - Implementovaný **in-line preview** nahratých PDF / obrázkových dokumentov.
- **Skenovanie QR kódov (INVOICE by square)**:
  - Odklon od neohrabanej "automatickej" kamery; možnosť načítať QR kamerou alebo hardvérovou čítačkou je teraz dobrovoľná a nenápadná.
  - O dekódovanie (z LZMA Base32 na čitateľné XML tabulátorové data) sa stará robustný skript a PHP backend (`api/liabilities/decode-bysquare`).
  - Údaje automaticky predvyplnia FAND editor.
- **Datový Editor eKZ**:
  - Kompletne vybudovaný modal pre pridanie Záväzku na obraz tvojho `PRINTER.TXT` so všetkými originálnymi DOS poľami.
  - Optimalizované generovanie nového čísla faktúry metódou `generateNextB` (podobne ako `pCislo_Kz(1)`).
- **UI Vylepšenia**:
  - Globálne zatváranie **všetkých** modalov a okienok pomocou klávesy `Escape (Esc)`.
  - Integrácia kalendára **Flatpickr** do dátumových inputov (v slovenskom jazyku) pre rýchlu zmenu mesiacov a rokov.
  - Vycentrované hodinky doplnené do všetkých dátových pohľadov.

## ⏳ Čakajúce (na spracovanie / diskusiu)

- **Ďalšie FAND formuláre**:
  - Logbook (Kniha jázd) a Majetok – čakajú na presun z "Pripravuje sa".
- **Refaktoring frontend kódov**:
  - Dbať na malé a časté commity.

## 📝 Technické poznámky (pre JULES)
- Pri každom väčšom zásahu do UI / JS vykonaj menší commit s popisnou hláškou.
- Pre všetky testy spúšťaj `php -l` na modifikovaných súboroch a nespoliehaj sa len na PHPUnit (keďže v sandboxe môže naraziť na databázové spojenia mimo kontajner).
