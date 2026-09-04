# Lokálne spustenie CodeIgniter 4 JU

Tento návod popisuje postup na lokálne spustenie exportovanej verzie aplikácie JU (CodeIgniter 4) na systéme Windows s využitím XAMPP, bez použitia Gitu.

## A. Príprava prostredia (Požiadavky)

Na vašom lokálnom počítači musíte mať nainštalované nasledujúce nástroje s ich minimálnymi verziami:
- **XAMPP** (alebo ekvivalent) s **PHP 8.2** alebo novším.
- **MariaDB / MySQL** (súčasť XAMPP).
- **Composer** (pre inštaláciu závislostí PHP aplikácie).

*Poznámka:* PHP musí mať povolené rozšírenia `intl`, `mbstring`, `json`, a `mysqli` / `mysqlnd`.

## B. Rozbalenie ZIP archívu

1. Prijatý ZIP archív (napríklad `JU-CI4-main-<commit>.zip`) rozbaľte do vami zvoleného priečinka, ktorý slúži na vývoj, napríklad do domovského adresára používateľa alebo priamo do `C:\xampp\htdocs\JU`.
2. Archív obsahuje priamo aplikačný priečinok `ci4_app` a dump databázy v priečinku `migration_dump`.

## C. Inštalácia závislostí pomocou Composera

ZIP archív zámerne neobsahuje priečinok `vendor/` so závislosťami (z dôvodu zníženia veľkosti a zamedzenia chýb pri prenose).

1. Otvorte terminál (Príkazový riadok, PowerShell).
2. Prejdite do adresára `ci4_app`:
   ```bash
   cd cesta/k/rozbalenemu/ci4_app
   ```
3. Spustite príkaz na inštaláciu:
   ```bash
   composer install
   ```

*Po dokončení príkazu uvidíte novovytvorený priečinok `vendor`.*

## D. Konfigurácia prostredia (Environment)

1. V adresári `ci4_app` nájdite súbor `.env.example`.
2. Tento súbor skopírujte alebo premenujte na `.env` (odstráňte príponu `.example`).
3. Súbor `.env` už obsahuje predvyplnené základné nastavenia:
   - `CI_ENVIRONMENT = development`
   - `app.baseURL = 'http://localhost:8080/'`
   - Pripojenie k databáze (predvolene používateľ `root` bez hesla pre databázu `ju_migration`).
4. Ak máte vo svojom lokálnom MariaDB / MySQL nastavené heslo pre používateľa `root`, upravte v súbore `.env` riadok `database.default.password` a doplňte vaše heslo.

## E. Vytvorenie a inicializácia databázy

1. Spustite MariaDB (cez XAMPP Control Panel).
2. Otvorte nástroj na správu databázy (napríklad phpMyAdmin na `http://localhost/phpmyadmin` alebo iný klient).
3. Vytvorte novú databázu s názvom `ju_migration` (Character set: `utf8mb4_general_ci`).
4. Rozbaľte GZIP súbor s dumpom databázy, ktorý sa nachádza v stiahnutom balíku:
   ```text
   migration_dump/ju_migration.sql.gz
   ```
   *(Môžete použiť nástroj 7-Zip, alebo priamo v phpMyAdmin importovať tento `.gz` archív, ak podporuje tento formát).*
5. Naimportujte SQL kód z tohto súboru do databázy `ju_migration`. Tento súbor obsahuje kompletnú štruktúru aj existujúce historické dáta potrebné pre beh aplikácie.

## F. Sprístupnenie a práva (ak je to potrebné)

Uistite sa, že priečinky pre logy, session a cache vo vnútri priečinka `writable` existujú a sú zapisovateľné pre webový server (v prostredí Windows XAMPP by s tým nemal byť problém, inak vytvorte adresáre `writable/cache`, `writable/logs`, `writable/session`).

## G. Lokálne spustenie aplikácie

Najjednoduchší a odporúčaný spôsob na naštartovanie aplikácie pri vývoji je pomocou vstavaného PHP servera cez CI4 `spark`.

1. V termináli v adresári `ci4_app` spustite:
   ```bash
   php spark serve
   ```
2. Do konzoly sa vypíše informácia o spustení, zvyčajne na adrese `http://localhost:8080`.
3. Otvorte webový prehliadač a prejdite na túto adresu.

*Alternatíva (Apache VirtualHost):*
Ak chcete aplikáciu spúšťať štandardne cez XAMPP (Apache), musíte nastaviť VirtualHost tak, aby `DocumentRoot` smeroval do priečinka `ci4_app/public` (nie do hlavného koreňového priečinka projektu). Prípadne, ak ste projekt rozbalili do `htdocs/JU`, prístup bude `http://localhost/JU/ci4_app/public`.

## H. Prvé overenie (Smoke Test)

Skontrolujte, či aplikácia funguje podľa očakávania, so špeciálnym zameraním na novo implementovaný modul:

1. Otvorte hlavnú stránku aplikácie (`http://localhost:8080/`). Mala by sa zobraziť bez chybového hlásenia.
2. Prejdite do sekcie **Accounting (Účtovníctvo) -> Počiatočný stav (Initial State, `pPV`)**.
3. **READ:** Existujúce záznamy z databázy by sa mali načítať a zobraziť.
4. **CREATE:** Pokúste sa vytvoriť nový záznam. Skontrolujte, či systém automaticky a korektne inicializuje číslo dokumentu (`b`) na formát `00-001-YYYY` a dynamicky nastaví `rok` a `mena`.
5. **UPDATE:** Vyberte existujúci záznam a upravte jeho hodnoty (napr. text alebo sumu). Uložte a overte, že sa zmeny zapísali.
6. **DELETE:** Skúste testovací záznam vymazať a uistite sa, že z databázy skutočne zmizne.

Všetky úpravy by mali byť perzistentné priamo v databáze `ju_migration`, ktorú ste vytvorili a naplnili v kroku E.

Týmto je verzia aplikácie CI4 plne spustiteľná na lokálnom Windows PC bez nutnosti použitia gitu a produkčných konfiguračných tajomstiev.
