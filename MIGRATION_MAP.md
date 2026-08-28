# MIGRATION MAP (DOS JU -> CI4)

This map defines how legacy FAND functions map to the proposed CodeIgniter 4 architecture and which MariaDB tables they utilize.

## 1. DOKLADY (Accounting Documents)

### Peňažný denník (Cashbook)
- **DOS Function:** `pPD`, `pPDsuma`, `pPDkod`
- **Future CI4 Module:** `Cashbook` (Controller: `CashbookController`, Service: `CashbookService`)
- **MariaDB Tables:** `pd`, `dovod_bu`, `paramcat`
- **Status:** NAVRHNUTÉ

### Počiatočný stav
- **DOS Function:** `pPV`
- **Future CI4 Module:** `Accounting` (Controller: `AccountingController`, Service: `InitialStateService`)
- **MariaDB Tables:** `pv`
- **Status:** NAVRHNUTÉ

### Kniha vyšlých faktúr / Pohľadávky
- **DOS Function:** `pPohladavky`
- **Future CI4 Module:** `Invoices` (Controller: `ReceivableController`, Service: `InvoiceService`)
- **MariaDB Tables:** `kp`, `kppol`, `platby`, `uhrady`
- **Status:** NAVRHNUTÉ

### Kniha došlých faktúr / Záväzky
- **DOS Function:** `pZavazky`
- **Future CI4 Module:** `Invoices` (Controller: `LiabilityController`, Service: `InvoiceService`)
- **MariaDB Tables:** `kz`, `kzpol`, `platby`, `uhrady`
- **Status:** NAVRHNUTÉ

### DPH
- **DOS Function:** `pDPH`, `pSadzbDPH`
- **Future CI4 Module:** `Accounting` (Controller: `TaxController`, Service: `VatService`)
- **MariaDB Tables:** `dph`, `sadzbdph`
- **Status:** NAVRHNUTÉ

## 2. MAJETOK & SKLAD (Assets & Inventory)

### HaN Majetok (Assets)
- **DOS Function:** `pHm_a_Nehm`, `pNaklady`
- **Future CI4 Module:** `Assets` (Controller: `AssetController`, Service: `AssetService`)
- **MariaDB Tables:** `ikzp`, `ikdkp`
- **Status:** NAVRHNUTÉ

### Sklad (Inventory)
- **DOS Function:** `pSklad`, `pHlaSklad`
- **Future CI4 Module:** `Inventory` (Controller: `InventoryController`, Service: `InventoryService`)
- **MariaDB Tables:** `sklad`, `tovary`, `druhtova`
- **Status:** NAVRHNUTÉ

## 3. FIREMNÉ AGENDY (Corporate Agenda)

### Kniha pracovných ciest a jázd
- **DOS Function:** `pSc`, `pEvi_Auto`
- **Future CI4 Module:** `Logbook` (Controller: `TripController`, Service: `TripService`)
- **MariaDB Tables:** `sc`, `evi_auto`, `trasy`, `auto`
- **Status:** NAVRHNUTÉ

### Zamestnanci a Dohody
- **DOS Function:** `pDohoda`
- **Future CI4 Module:** `HR` (Controller: `HrController`, Service: `ContractService`)
- **MariaDB Tables:** `delf` (or equivalent partner/employee table)
- **Status:** NAVRHNUTÉ

## 4. SPRÁVA NEHNUTEĽNOSTÍ (Property Management - Dom Sása, Byt BB)

### Nehnuteľnosti a Vyúčtovania
- **DOS Function:** `pDomacnost`, `pVyuctSBD`, `pVyuctSSE`, `pVyucH2OSasa`, `pOdpoceTeplo`
- **Future CI4 Module:** `PropertyManagement` (Controller: `PropertyController`, Service: `UtilityService`)
- **MariaDB Tables:** `byt`, `bytudaje`, `elsasa`, `h2o_sasa`, `teplo`, `vyuctsse`, `vyuctspp`
- **Status:** NAVRHNUTÉ

## 5. POMÔCKY A ČÍSELNÍKY (Tools & Codebooks)

### Obchodní partneri
- **DOS Function:** `pTlf`
- **Future CI4 Module:** `Partners` (Controller: `PartnerController`, Service: `PartnerService`)
- **MariaDB Tables:** `udajo` (business partners), `udajea`
- **Status:** NAVRHNUTÉ

### Všeobecné číselníky
- **DOS Function:** `pVseobData`
- **Future CI4 Module:** `Settings` (Controller: `DictionaryController`, Service: `DictionaryService`)
- **MariaDB Tables:** `kraje`, `okresy`, `mesta`, `banky`, `staty`
- **Status:** IMPLEMENTOVANÉ
