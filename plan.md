1. Zabezpečiť izolovanú testovaciu databázu (`ju_migration_test`) vytvorením z pôvodného dumpu.
2. Skontrolovať a prekonfigurovať `.env` tak, aby PHPUnit pracoval s `ju_migration_test`.
3. Skontrolovať aktuálny stav počtu záznamov v ostrej databáze `ju_migration` a porovnať ho s dumpom pre overenie UNCHANGED stavu. Ak bol zmenený (testBankyCrud premazalo dáta), znova naloadovať dump pre `ju_migration`.
4. V `DictionaryService.php`: Preveriť a opraviť business pravidlá. Agregácia `#A Kraje.km2 += km2; Kraje.oby += oby;` bola potvrdená zo súboru `pOkresy.txt`. Overiť väzby proti mazaniu z hľadiska FAND pravidiel a odstrániť, ak nie sú podložené (FAND obvykle kontroluje #L alebo referenčnú integritu v RDB, ale ak nenájdeme dôkaz pre C/D reštrikcie, tak ich necháme základné s výstrahou).
5. Overiť modely a CRUD API pre `kraje`, `okresy`, `mesta`, `banky`.
6. Spustiť PHP syntax check, `php spark routes`, `phpunit`.
7. Vygenerovať sumarizačný výpis (UNCHANGED, počty, atď.) a predložiť finálny submit.
