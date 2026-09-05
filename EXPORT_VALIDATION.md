# Export Validation Report

Tento dokument obsahuje detaily o procese a validácii exportu CI4 JU aplikácie z GitHubu do spustiteľného ZIP archívu.

## Zdroj (Source)

*   **Source Branch:** `main`
*   **HEAD Commit:** `6b60c7820017390f7ca73de677cd06c6aacbc27b` (Merge pull request #38 from delf61/docs/audit-accounting-ppv-9447990650302189323)
*   **Dátum exportu:** Aktuálny dátum z tasku.

## Systémové požiadavky (Requirements)

Zistené z konfigurácie projektu a súboru `composer.json`:
*   **PHP:** `>= 8.2` (vyžadované frameworkom a projektom)
*   **CodeIgniter 4:** `^4.7`
*   **Databáza:** MariaDB (alebo MySQL), ovládač `MySQLi`, character set `utf8mb4_general_ci`.
*   **Composer:** Pre inštaláciu PHP balíkov.
*   **Operačný systém:** Kompatibilný s XAMPP na Windows (na spustenie lokálneho behového prostredia).

## Obsah ZIP archívu (Content)

ZIP archív obsahuje všetky zdrojové kódy CodeIgniter 4 aplikácie nutné na lokálny beh a dump testovacej/migračnej databázy:
*   `ci4_app/` - Zdrojový kód CI4 vrátane `composer.json`, `composer.lock`, `app`, `public`, atď.
*   `ci4_app/.env.example` - Šablóna nastavenia prostredia pripravená na lokálny vývoj (baseURL, development environment, DB credentials).
*   `migration_dump/ju_migration.sql.gz` - Kompletný GZIP-ovaný SQL dump so štruktúrou aj historickými dátami (pôvodne z `migration_dump/`).
*   `LOCAL_SETUP.md` - Podrobný návod na spustenie projektu.

### Vylúčené súbory (Excluded)
Nasledujúce súbory neboli do archívu zahrnuté, nakoľko sa na distribučnom zariadení nevyžadujú, generujú sa automaticky, alebo by predstavovali bezpečnostné či výkonnostné riziko:
*   Všetky súbory a priečinky týkajúce sa veršovacieho systému Gitu (`.git/`, `.gitignore`).
*   Závislosti projektu (`vendor/`), nakoľko sa pri prvom spustení inštalujú pomocou `composer install`.
*   Testy (`ci4_app/tests/`, `phpunit.dist.xml`), pretože prostredie nie je určené na spúšťanie test suite, ale na review funkčnosti aplikácie.
*   Adresáre pre cache, logy a sessions (`ci4_app/writable/cache/*`, `ci4_app/writable/logs/*`, `ci4_app/writable/session/*`).
*   Analytické reporty a zdrojové python scripty na extrakciu (napr. `*.py`, `*.md` okrem `LOCAL_SETUP.md`, atď.).
*   Pôvodné `.zip` archívy zdrojových FAND dát (napr. `JU_DATA_ORIGINAL.zip`, `ju_dbf.zip`).

## Konfigurácia databázy a spustenia (Database Setup & Start)

*   **Vytvorenie DB:** V prostredí MariaDB vytvorenie DB `ju_migration` a rozbalenie/import dumpu `ju_migration.sql.gz`.
*   **URL:** Aplikácia využíva po spustení príkazu `php spark serve` predvolenú URL: `http://localhost:8080/`. Z CI4 aplikácie sa všetky webové požiadavky obsluhujú cez koreňový adresár `public/`.

## Testy a Limitácie (PHPUnit & Limitations)

### PHPUnit
V prostredí prípravy (sandboxe bez aktívnej služby MariaDB databázy) príkaz `vendor/bin/phpunit` skončil s chybami, ktoré poukazujú výhradne na nemožnosť spojiť sa so službou databázy (`Connection refused`). To znamená, že unit / integračné testy nemožno lokálne v prípravnom sandoboxe dokončiť s výsledkom PASS bez aktívnej DB. Samotný beh test suite s 39 chybami databázového pripojenia avšak prebehol do konca. (Tento výsledok korešponduje s realitou prostredia, testy nezlyhali na vnútornej nekonzistencii aplikačnej logiky, ale na chýbajúcej DB).

### Známe obmedzenia (Limitations)
1. **Databázové pripojenie v sandboxe:** Validácia plného smoke-testu pPV (`Accounting -> Počiatočný stav`) vrátane CREATE/UPDATE/DELETE nebola možná priamo pred tvorbou tohto exportu kvôli chýbajúcemu bežiacemu MariaDB serveru. Tento test musí užívateľ vykonať na pripravenom cieľovom XAMPP stroji presne podľa `LOCAL_SETUP.md`.
2. **Nepribalený Vendor adresár:** Distribúcia bez `vendor` adresára vyžaduje u užívateľa pripojenie na internet pri prvom spustení `composer install`. (To je štandard, avšak nutné poznamenať).

## Zdieľanie ZIP Exportu na GitHube (Release)

*   **Názov ZIP súboru:** `JU-CI4-main-6b60c78.zip`
*   **Source Commit:** `6b60c78`
*   **SHA-256 Hash:** `68d67a0e46c6cb3304422aef6b9050ee648446d3d50c1a9edbcf7d3d048ca22a`
*   **GitHub Release / Tag:** Na GitHube vytvorte nový Release s názvom `JU CI4 6b60c78` (naviazaný na tento commit) a priložte vytvorený ZIP ako Release Asset.

**Upozornenie:** GitHub upload/release permission is unavailable pre bota/agenta v tomto sandbox prostredí, a preto nebolo možné vykonať automatický upload ZIP súboru priamo do Release.
Užívateľ (alebo CI/CD pipeline) musí tento ZIP archív vytvorený v pracovnom prostredí manuálne nahrať do GitHub Releases ako Asset.
