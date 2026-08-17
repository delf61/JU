# JU Application Workflow

## 1. Executive Summary

This document reconstructs the functional workflow of the legacy MS-DOS PC FAND accounting application (JU). It is based strictly on analyzing the source code documentation in `PRINTER.TXT` and the associated verified analysis files (`PROCEDURES_VERIFIED.md`, `FORMS_VERIFIED.md`, `TABLES_VERIFIED.md`, etc.).

The application is structured around a central main menu (`pHlavneMenu`) which serves as the primary entry point and orchestrates calls to various functional sub-modules (procedures). The application's core functionality revolves around accounting workflows, particularly focusing on the cashbook (Peňažný denník - `PD` table), income/expense tracking, VAT processing (DPH), invoicing (receivables/liabilities), and asset/inventory management.

The workflow relies heavily on the `pPD` procedure for managing cashbook entries and `pDPH` for VAT, along with numerous entry forms (Ee*) and reports (Mm* / PRINT commands).

## 2. Application Entry Point

**Verified Entry Point: `pHlavneMenu`**

- **Evidence:** The procedure `pHlavneMenu` defines the root `menubar` and `menuloop` structures. It contains a complete, nested hierarchy of pull-down menus that cover the entirety of the application's functionality.
- **Inference:** While there may be a smaller bootstrapper or startup script (like an autoexec equivalent or an index file executing `pHlavneMenu`), the functional root of the application logic is definitively `pHlavneMenu`.

## 3. Main Menu / Navigation

The `pHlavneMenu` structure is divided into four main sections. The primary accounting functionality is found under the "Doklady" (Documents) menu.

**Main Menu Structure (VERIFIED):**

1. **Doklady (Documents) - Core Accounting:**
   - Počiatočný stav (Initial state) → `pPV`
   - Peňažný denník (Cashbook) → `pPD`
   - HaN majetok (Tangible and Intangible Assets) → `pHm_a_Nehm`
   - Drobný HaN majetok (Small Assets) → `pNaklady`
   - Kniha pracovných ciest (Business Trips) → `pSc`
   - Kniha jázd (Logbook/Vehicles) → `pEvi_Auto`
   - Evidencia zákaziek (Order Management) → `pEviZakazky`
   - Kniha vyšlých f. / pohľadávok (Receivables/Issued Invoices) → `pPohladavky`
   - Kniha došlých f. / záväzkov (Liabilities/Received Invoices) → `pZavazky`
   - Reklamácie (Claims) → `pReklamacie`
   - Sklad (Inventory) → `pSklad`
   - Úhrady (Payments) → `pUhrady_All`
   - Bežný účet (Current Account) → `pBeznyUcet`
   - Pokladňa (Cash Register) → `pPoklDokl`
   - Leasing → `pLeasing`
   - DPH (VAT) → `pDPH`

2. **Pomôcky (Utilities/Settings):**
   - Zmena spracovávaného obdobia (Change processing period) → `pCatalog`
   - Nezdan. suma, účt. straty (Tax-free amounts, losses) → `pStratyDoch`
   - Kalendár (Calendar) → `pKalendar_M`
   - Osobné údaje (Personal Data) → `pUdaje`
   - Obchodní partneri & úrady (Business Partners & Authorities) → `pTlf`
   - Všeobecné databázy (General Databases) → `pVseobData`
   - System Utilities (`pSet`, `pMemDisk`, `pWExport_DBF`)

3. **Dom Sása & Byt BB (Specific Property Management):**
   - Custom accounting/invoicing specific to property locations (calls to `pInkaso`, `pVyuctSBD`, `pPlatby_BU`, etc.)

## 4. Functional Areas

### 4.1 Cashbook (Peňažný denník)

- **Entry procedure:** `pPD`
- **Forms:** `ePDbrowse`, `ePD`
- **Tables:** `PD` (Cashbook), `Hot` (Cash), `DD`, `MM`
- **Called procedures:** `pPDprerus_V`, `pKontrola_PD`, `pPDprerus_P`, `pPDprerus_B`
- **MERGE/report objects:** `mPD`, `mPDsuma`
- **Accounting logic:** Manages standard income and expense entries, classifying them into accounting columns (e.g., Materials, Wages, Services). Calculates totals and handles cash vs. bank transaction flags.
- **Outputs:** Reports `rPD11`, `rPD12`
- **Confidence:** VERIFIED. The structure and calls are clearly defined in the source.

### 4.2 VAT (DPH)

- **Entry procedure:** `pDPH`
- **Forms:** `ePARdat`, `eParDat2`, `eDPH`
- **Tables:** `DPH`, `PD`, `DD`, `IKZP`, `MM`, `A`
- **Called procedures:** `pSadzbDPH` (VAT rates), `pKontrol_Uhr`
- **MERGE/report objects:** Generates significant reporting output.
- **Accounting logic:** Processes input and output VAT, calculating the return amounts. Relies on parameter files (`PARdat`) for current tax period settings.
- **Outputs:** High volume of reports: `rDPH_prizna1`, `rDPH_vstupP1`, `rDPH_vstupIM`, `rDPH_vstKZ69`, `rDPH_potvrd`, `rDPH_vstupKZ`, `rDPH_vstupPD`, `rDPH_vsNewKZ`, `rDPH_vstIM4p`, `rDPH_prizna3`, `rDPH_vstuPHM`, `rDPH_vystup`, `rDPH_vsNew02`, `rDPH_prizna2`, `rDPH_vstupP2`, `rDPH_prizna4`.
- **Confidence:** VERIFIED.

### 4.3 Receivables (Kniha pohľadávok)

- **Entry procedure:** `pPohladavky`
- **Forms:** `eKP`, `eKP_browse`
- **Tables:** `KP` (Receivables), `ParamCat`, `K`, `DD`, `MM`
- **Called procedures:** `pTlf_odber` (Address book / Business partners)
- **MERGE/report objects:** Unknown (handled via PRINT commands or embedded reports).
- **Accounting logic:** Tracking issued invoices, expected amounts, and linking to the address book (UdajO/UdajF tables indirectly via `pTlf_odber`).
- **Outputs:** Likely prints invoices and statements, though specific report objects are not explicitly identified in the `pPohladavky` root block.
- **Confidence:** VERIFIED.

### 4.4 Liabilities (Kniha záväzkov)

- **Entry procedure:** `pZavazky`
- **Forms:** `eKz`, `eKz_browse`, `eKz_stala_pl`, `eKz_sta_new`
- **Tables:** `Kz` (Liabilities), `PARAMcat`, `ParamCat`, `K`, `DD`, `MM`
- **Called procedures:** `pTlf_odber`
- **MERGE/report objects:** Unknown.
- **Accounting logic:** Tracking received invoices and amounts due to suppliers.
- **Outputs:** Payment orders/lists.
- **Confidence:** VERIFIED.

### 4.5 Assets (Majetok)

- **Entry procedure:** `pHm_a_Nehm` (Tangible/Intangible), `pNaklady` (Small Assets)
- **Forms:** `eIKzp`, `eIKzpBr`, `eIKdkpBr`, `eIKdkp`
- **Tables:** `IKzp` (Investment Assets), `IKdkp` (Small Assets)
- **Called procedures:** `pHm_a_Nehm_X`
- **MERGE/report objects:** `mIKzp`, `mIKdkp`
- **Accounting logic:** Asset registry, likely handling depreciation (odpisy) calculations.
- **Confidence:** VERIFIED.

### 4.6 Vehicles and Logbook (Kniha jázd)

- **Entry procedure:** `pEvi_Auto`
- **Forms:** `eEvi_Auto`, `eEvi_Auto_U`, `eEvi_Auto_EU`
- **Tables:** `Evi_Auto`, `Auto`, `Par`, `PARAMcat`, `E`
- **Called procedures:** `pVyberTrasu` (Select route), `pAuto`, `pKm_Auto_Opr` (Mileage correction)
- **MERGE/report objects:** Embedded in application.
- **Accounting logic:** Tracks business vehicle usage, routes, mileage, and fuel consumption for tax deductions.
- **Confidence:** VERIFIED.

### 4.7 Inventory (Sklad)

- **Entry procedure:** `pSklad`
- **Forms:** `eSklad`, `eSkladBr`
- **Tables:** `Sklad`
- **Called procedures:** None from root.
- **MERGE/report objects:** None clearly identified at root.
- **Accounting logic:** Tracks item quantities, prices, and stock levels.
- **Confidence:** VERIFIED.

### 4.8 Business Partners (Adresár / Obchodní partneri)

- **Entry procedure:** `pTlf` (from menu), `pTlf_odber` (called from Invoices)
- **Forms:** `eUdajO`, `eUdajF`
- **Tables:** `UdajO` (Companies/Partners)
- **Called procedures:** None
- **Accounting logic:** Maintains contact and billing information (IČO, DIČ, bank accounts) for suppliers and customers.
- **Confidence:** VERIFIED.

## 5. Central Accounting Workflow

Based on the menu structure and procedure calls, the central accounting workflow operates as a series of independent ledgers that feed into overarching taxation and reporting functions.

```text
[ Business Partners (UdajO) ] ──┐
                                │
[ Inventory (Sklad) ] ──────────┼──> [ Receivables (KP) ] ───┐
                                │                            │
[ Assets (IKzp / IKdkp) ] ──────┼──> [ Liabilities (Kz) ] ───┼──> [ Payments (Uhrady_All) ]
                                │                            │
[ Vehicle Log (Evi_Auto) ] ─────┘                            │
                                                             v
[ Cash/Bank Entries (PoklDokl / BeznyUcet) ] ──────────> [ Cashbook (PD) ]
                                                             │
                                                             v
                                                         [ VAT (DPH) ]
                                                             │
                                                             v
                                                      [ Financial Reports ]
```

**Inference:**
The `PD` (Peňažný denník) table acts as the central ledger for all cash and bank movements. `KP` (Receivables) and `Kz` (Liabilities) track pending invoices. When invoices are paid (`Uhrady`), entries are likely generated or cross-referenced in the `PD`. The `DPH` module calculates taxes based on the transactional data stored in these ledgers.

## 6. Procedure Call Chains

Strongly supported procedure call chains:

1. **Cashbook Entry Flow:**
   `pHlavneMenu` → `pPD` → `pPDprerus_B` (Bank) / `pPDprerus_V` (Cash Out) / `pPDprerus_P` (Cash In) → Data Entry Form `ePD`
   - *Explanation:* User selects Cashbook, procedure handles logic routing based on payment type (Bank vs Cash), presenting the appropriate entry form.

2. **Invoice Entry Flow:**
   `pHlavneMenu` → `pPohladavky` (or `pZavazky`) → `pTlf_odber`
   - *Explanation:* When entering a new invoice, the user invokes the address book (`pTlf_odber`) to select or create the business partner, populating the invoice details.

3. **Vehicle Log Flow:**
   `pHlavneMenu` → `pEvi_Auto` → `pVyberTrasu`
   - *Explanation:* User enters vehicle log, calls route selection to automatically calculate distances.

## 7. Table Usage by Functional Area

| Functional Area | Primary Tables | Supportive Tables |
| :--- | :--- | :--- |
| **Cashbook** | `PD` | `Hot`, `DD`, `MM` |
| **Receivables** | `KP` | `UdajO`, `ParamCat`, `K` |
| **Liabilities** | `Kz` | `UdajO`, `ParamCat`, `K` |
| **VAT** | `DPH` | `PD`, `IKZP`, `A`, `DD` |
| **Assets** | `IKzp`, `IKdkp` | |
| **Logbook** | `Evi_Auto` | `Auto`, `Par` |
| **Inventory** | `Sklad` | |
| **Current Account** | `Ucet`, `Ucty` | `ucty_pom` |
| **Settings** | `Udaje`, `Param` | `ParamCat` |

## 8. Reports and Printing Workflow

The JU application relies on two primary mechanisms for reporting:

1. **FAND `report()` commands with `r*` definition objects:** Used extensively in VAT (`rDPH_*`), Cashbook (`rPD11`, `rPD12`), and Payment Orders (`rPrikaz_Uhra`).
2. **Direct string manipulation and `PRINT='MV100Y'`:** The FAND `graph()` and text output functions send formatted escape sequences directly to the printer (likely an MS-DOS compatible matrix or laser printer).

## 9. Facts / Inferences / Unknowns

### Facts (Verified via Source Code)

- The application is driven by `pHlavneMenu`.
- There are distinct sub-modules for Cashbook, VAT, Receivables, Liabilities, Inventory, and Assets.
- Business partner data (`UdajO`) is shared across Receivables and Liabilities via the `pTlf_odber` lookup.
- VAT processing (`pDPH`) relies on data aggregated from multiple tables, including the Cashbook (`PD`) and Assets (`IKZP`).

### Inferences (Strongly Supported by Naming/Structure)

- `Uhrady_All` manages the reconciliation between invoices (`KP`, `Kz`) and actual payments.
- The `PD` table is the definitive source of truth for the company's financial status, serving as the general ledger.

### Unknowns

- The exact algorithms for depreciation calculation in `pHm_a_Nehm`.
- The specific meaning of individual flags inside the `PD` table (e.g., specific one-letter codes for income/expense categorization).
- How end-of-year closure is technically handled (whether it creates a new database folder per year or flags records).

## 10. Migration Relevance

For the future CodeIgniter 4 + MariaDB migration, this workflow analysis indicates:

1. **Modular Architecture:** The new application should adopt a modular structure reflecting the current menu (e.g., `Controllers/Cashbook`, `Controllers/Invoices`, `Controllers/VAT`).
2. **Centralized Address Book:** The `UdajO` table must become a central `business_partners` table in MariaDB, referenced by foreign keys from invoices and cashbook entries.
3. **Ledger System:** The `PD` table logic must be carefully reverse-engineered during the coding phase, as it handles complex categorization for tax purposes.
4. **Independent Modules:** Features like the Vehicle Logbook (`Evi_Auto`) and Specific Property Management (Dom Sása) are highly uncoupled and can be migrated as standalone modules or plugins.

---

### Summary

- **Identified entry point:** `pHlavneMenu`
- **Number of major functional areas:** ~12 core accounting areas.
- **Most important procedures:** `pPD` (Cashbook), `pDPH` (VAT), `pPohladavky` (Receivables), `pZavazky` (Liabilities).
- **Most important tables:** `PD`, `KP`, `Kz`, `DPH`, `UdajO`.
- **Strongest verified workflow chains:** Cashbook entry routing, Invoice partner lookup.
- **Remaining unknowns:** Detailed calculation logic for VAT and Depreciation, specific meaning of legacy single-character codes in the database.
