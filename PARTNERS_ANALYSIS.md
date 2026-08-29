# Partners Analysis (DOS JU -> CI4)

## 1. Tables

The `ju_migration` MariaDB database contains two primary tables relevant to this module:

1. **`partner`**
   - Contains business partners data.
   - The original DOS function is `pTlf`.
   - `MIGRATION_MAP.md` incorrectly referenced `udajo` and `udajea` as MariaDB tables, but the DB dump confirms the table is actually named `partner` (presumably renamed during extraction/migration).

2. **`udaje`**
   - Contains company/owner data.

### 1.1 `partner` Schema (MariaDB)
```sql
CREATE TABLE `partner` (
  `kodop` SMALLINT,
  `firma` VARCHAR(30),
  `meno` VARCHAR(30),
  `cinnos` VARCHAR(60),
  `ulica` VARCHAR(20),
  `psc` VARCHAR(6),
  `miesto` VARCHAR(20),
  `tlf` VARCHAR(15),
  `tlfa` VARCHAR(15),
  `tlfb` VARCHAR(40),
  `fax` VARCHAR(15),
  `ico` VARCHAR(10),
  `penust` VARCHAR(20),
  `cu` VARCHAR(20),
  `pozn` VARCHAR(60),
  `drc` VARCHAR(15),
  `icpd` VARCHAR(15),
  `var_sym` VARCHAR(10),
  `kon_sym` VARCHAR(10),
  `spc_sym` VARCHAR(10),
  `ku` DATE,
  `x` DECIMAL(9, 2),
  `do` DATE,
  `arcintcis` VARCHAR(1)
)
```

### 1.2 `udaje` Schema (MariaDB)
```sql
CREATE TABLE `udaje` (
  `meno` VARCHAR(10),
  `priezv` VARCHAR(15),
  `titul` VARCHAR(5),
  `nazov` VARCHAR(40),
  `ico` VARCHAR(10),
  `dic` VARCHAR(10),
  `icpd` VARCHAR(15),
  `drcdph` VARCHAR(15),
  `datdph` DATE,
  `q_m` VARCHAR(1),
  `sadzba` DECIMAL(4, 1),
  `uli` VARCHAR(20),
  `cis` VARCHAR(5),
  `psc` VARCHAR(6),
  `miesto` VARCHAR(20),
  `tlf` VARCHAR(13),
  `tlf1` VARCHAR(13),
  `mobil` VARCHAR(13),
  `mobil1` VARCHAR(13),
  `fax` VARCHAR(13),
  `fax1` VARCHAR(13),
  `email` VARCHAR(28),
  `hodsadzba` DECIMAL(7, 2),
  `prghodsadz` DECIMAL(5, 2),
  `arcintcis` VARCHAR(1)
)
```

## 2. Business Logic

### CONFIRMED

*   **Primary Keys:**
    *   The MariaDB schema does *not* define primary keys directly in the `CREATE TABLE` statements (or at least, none are visible in the basic schema output).
    *   For `partner`, `kodop` (kód obchodného partnera) is clearly the unique identifier (SMALLINT).
    *   For `udaje`, it appears to be a single-row configuration table (company data).

*   **Data Types & Constraints:**
    *   `partner.kodop` is SMALLINT.
    *   String fields have exact length constraints derived from the FAND schema (e.g. `partner.firma` VARCHAR(30)).

### UNVERIFIED

*   **Auto-incrementing `kodop`:** It is unverified if `kodop` was auto-incremented by DOS JU or entered manually. We will implement manual entry/validation or a simple "max() + 1" default without enforcing database-level auto-increment unless instructed otherwise.
*   **Foreign Keys:** No explicit foreign keys are defined in the schema dump for these tables.
