# DOS JU Analysis

This document provides an analysis of the legacy DOS JU application, extracting the business logic, workflow, and dependencies without delving into mechanical 1:1 reconstruction.

## 1. Application Structure and Workflow (Menu)
Based on the `pHlavneMenu` procedure, the application is divided into several main operational sections:

### 1.1 Doklady (Documents / Accounting Entries)
- **Počiatočný stav (pPV):** Initial balance setup.
- **Peňažný denník (pPD):** The core Cashbook (Peňažný denník). It interacts heavily with the `pd` (transakcie) table and utilizes secondary processes like `pKontrola_PD`, `pPDkod` (operation codes), and `pPDsuma` (summarizations).
- **HaN majetok (pHm_a_Nehm):** Intangible and tangible assets management, interacting with `ikzp` (Investičný majetok) and `ikdkp` (drobný majetok).
- **Drobný HaN majetok (pNaklady):** Minor assets.
- **Kniha pracovných ciest (pSc):** Business trips.
- **Kniha jázd (pEvi_Auto):** Vehicle logbook.
- **Evidencia zákaziek (pEviZakazky):** Order management.
- **Kniha vyšlých f. / pohľadávok (pPohladavky):** Receivables / Outgoing invoices.
- **Kniha došlých f. / záväzkov (pZavazky):** Liabilities / Incoming invoices.
- **Sklad (pSklad):** Inventory / Warehouse management.
- **Úhrady (pUhrady_All):** Payments management.
- **DPH (pDPH):** VAT processing.

### 1.2 Pomôcky (Tools / Utilities)
- **Zmena spracovávaného obdobia:** Working year / period context switcher (explains the historical year-based architecture).
- **Nezdaniteľná suma, účt. straty (pStratyDoch):** Tax deductibles and losses.
- **Osobné údaje (pUdaje), Obchodní partneri (pTlf), Všeobecné databázy (pVseobData):** Codebooks and settings (Partners, Cities, etc.).

### 1.3 Dom Sása / Byt BB (Property Management)
- Specific modules for property management including rent/inkaso, electricity, water, gas, heating (`pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`).

## 2. Business Logic and Procedures
The application relies heavily on `edit(...)` functions which bring up specific forms (e.g. `ePD`, `eIKzp`).

- **pPD (Peňažný denník):** Represents the core transactional loop. It uses `pd.nrecs` and appends records. It supports advanced filtering (Alt+F2 for specific document types), B-Tree indexing searches (F9 Hľadaj), and dynamic summaries (`F3 Sumár`).
- **MERGE Operations:**
  FAND's `MERGE` is essentially the equivalent of SQL `INSERT INTO ... SELECT ...`, `UPDATE ... FROM`, and `GROUP BY`.
  - Found uses in `pPDsuma` / `mPDsuma`: Aggregating financial totals across categories (e.g., `spolu+=sum(I1.hod_vyd)`).
  - Used in `pBanka_Pohla`: Matching accounts and updating statuses.
  - Used heavily in `pSpotrebGraf`: Aggregating fuel consumption (`km:=sum(km); spotr:=sum(I1.spotr)`).
  - These are data transformation pipelines (ETL) and analytical queries which should be translated into pure MariaDB SQL queries or CI4 Service aggregations, NOT loop-based procedural code.

## 3. Data Relationships (DB)
- The fundamental transactional table is `pd` (year-variant, variations detected).
- Entities like `ikzp`, `zavazky` (implicitly inside documents or separate tables like `kp`, `kppol`), `dph` are connected to `pd` through business logic rather than strict DB foreign keys.
- FAND lacks real DB-level Foreign Keys; relationships are enforced in forms (`#L` constraints in `PRINTER.TXT`).
- Data is heavily year-partitioned (e.g., `pd` has versions across years), which the migration has consolidated.

## 4. Unknown / Requires Verification
- FAND utilizes implicit state logic (e.g., `PARAM.datum`, `PARAM.doklad`). The exact scoping of these variables across FAND modules requires verification during the rewriting of individual services, but can generally be modeled as User Session Data or Request Context.
- `pKontrola_PD` logic needs verification to see if it modifies data or just validates constraints.
