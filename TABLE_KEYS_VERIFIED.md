# TABLE KEYS VERIFIED

This file contains the definitively verified keys for all tables extracted from `PRINTER.TXT` based on `#K` sections, interpreting primary keys (`@`), alternative keys (`Name(@)`), and foreign keys according to `DEKLARACE SOUBORU - kapitola F.txt`.

## Verified Keys

### Table: ParamCat

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: param

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: Par

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: Kalendar.x

Keys:
- `@ * Datum` -> **Primary Key (Own Key)**
- `iDen (@) * Den` -> **Alternative Primary Key**
- `iJmeno (@) *~Jmeno` -> **Alternative Primary Key**
- `iMeno (@) *~Meno` -> **Alternative Primary Key**

### Table: SadzbDPH

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: Staty.x

Keys:
- `@ stat` -> **Primary Key (Own Key)**
- `iNazSta (@) * ~Nazov` -> **Alternative Primary Key**

### Table: Kraje.x

Keys:
- `@ * kod` -> **Primary Key (Own Key)**

### Table: Okresy.x

Keys:
- `@ * kod` -> **Primary Key (Own Key)**
- `Kraje Kraj` -> **Foreign Key (or other linkage)**

### Table: Mesta.x

Keys:
- `@ * ~Nazov` -> **Primary Key (Own Key)**
- `Okresy Okres` -> **Foreign Key (or other linkage)**

### Table: Banky.x

Keys:
- `@ kodBAn` -> **Primary Key (Own Key)**

### Table: Trasy.x

Keys:
- `@ tra` -> **Primary Key (Own Key)**
- `iTrZDo (@) * z,do` -> **Alternative Primary Key**
- `iTrDoZ (@) * do,z` -> **Alternative Primary Key**
- `iTrZ (@) * z` -> **Alternative Primary Key**
- `iTrDo (@) * do` -> **Alternative Primary Key**

### Table: UdajO.x

Keys:
- `@ ~NazMie` -> **Primary Key (Own Key)**
- `iAbcU (@) * ~Firmen` -> **Alternative Primary Key**
- `iNazMie_ (@) * ~NazMie_` -> **Alternative Primary Key**
- `iNaz_Mie (@) * ~Naz_Mie` -> **Alternative Primary Key**
- `iKodOP (@) kodOP` -> **Alternative Primary Key**

### Table: Cinnosti.x

Keys:
- `@ kodcin` -> **Primary Key (Own Key)**

### Table: Udaje

Keys:
- `@ @ Banky BA` -> **Parametric Key (Global Variable definition)**

### Table: Udajea

Keys:
- `@ Kod` -> **Primary Key (Own Key)**
- `@ Kod` -> **Primary Key (Own Key)**

### Table: Vydaje.x

Keys:
- `@ Kodvyd` -> **Primary Key (Own Key)**

### Table: Ucty.x

Keys:
- `@ ba, cu` -> **Primary Key (Own Key)**
- `Banky ba` -> **Foreign Key (or other linkage)**

### Table: Ucet.x

Keys:
- `@ * a,~b` -> **Primary Key (Own Key)**
- `iBc (@) * bc` -> **Alternative Primary Key**
- `banky BA` -> **Foreign Key (or other linkage)**
- `iUcet (@) * BA, CU, a, ~b` -> **Alternative Primary Key**
- `iUcetb (@) * ~b` -> **Alternative Primary Key**
- `ucty BA, CU` -> **Foreign Key (or other linkage)**

### Table: UcetImpo.x

Keys:
- `@ * ba, cu, datum, v_s` -> **Primary Key (Own Key)**

### Table: kurzy.x

Keys:
- `@ datum, kod` -> **Primary Key (Own Key)**
- `iKurz (@) * kod,datum` -> **Alternative Primary Key**

### Table: PV

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: straDoch.x

Keys:
- `@ rok` -> **Primary Key (Own Key)**

### Table: DoprPros.x

Keys:
- `@ skr` -> **Primary Key (Own Key)**

### Table: Auto.x

Keys:
- `@ Kod` -> **Primary Key (Own Key)**

### Table: PD

Keys:
- `@ b` -> **Primary Key (Own Key)**
- `Vydaje Vydaj` -> **Foreign Key (or other linkage)**

### Table: SC.x

Keys:
- `@ * zaciatok, zaciatoh` -> **Primary Key (Own Key)**
- `iSCzac (@) * zaciatok` -> **Alternative Primary Key**
- `iSC (@) * bb` -> **Alternative Primary Key**
- `iSCislo (@) cislo` -> **Alternative Primary Key**
- `DoprPros prostr` -> **Foreign Key (or other linkage)**
- `Auto prostr` -> **Foreign Key (or other linkage)**

### Table: old_Auto.x

Keys:
- `@ * datum, zaciatok` -> **Primary Key (Own Key)**

### Table: Evi_Auto.x

Keys:
- `@ * datum, zaciatok` -> **Primary Key (Own Key)**
- `iEa (@) * bb` -> **Alternative Primary Key**
- `Auto Kod` -> **Foreign Key (or other linkage)**
- `Trasy tra` -> **Foreign Key (or other linkage)**
- `iKod (@) * kod` -> **Alternative Primary Key**
- `iKodBb (@) * kod,bb` -> **Alternative Primary Key**

### Table: IKzp

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**

### Table: IKdkp

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**

### Table: Leasing

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**

### Table: Zamestna.x

Keys:
- `@ zamest` -> **Primary Key (Own Key)**

### Table: Dohoda

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**

### Table: EZ.x

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**
- `iNazMie_ od` -> **Foreign Key (or other linkage)**
- `iKodOP kodOP` -> **Foreign Key (or other linkage)**
- `kalendar a` -> **Foreign Key (or other linkage)**
- `Vydaje Prijem` -> **Foreign Key (or other linkage)**
- `iEZ_ob (@) * ob8` -> **Alternative Primary Key**

### Table: Den_Prac.x

Keys:
- `@ * a,b` -> **Primary Key (Own Key)**
- `EZ a,b` -> **Foreign Key (or other linkage)**
- `kalendar datum` -> **Foreign Key (or other linkage)**

### Table: Sklad.x

Keys:
- `@ a,b,intkodtov` -> **Primary Key (Own Key)**
- `iKodTov (@) * intkodtov` -> **Alternative Primary Key**

### Table: skla2008.x

Keys:
- `@ a,b,intkodtov` -> **Primary Key (Own Key)**
- `iKodTov2008 (@) * intkodtov` -> **Alternative Primary Key**

### Table: KZ.x

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**
- `iKz_abs (@) a,~b, stala` -> **Alternative Primary Key**
- `iKz_s (@) * stala` -> **Alternative Primary Key**
- `iKz_b (@) * b` -> **Alternative Primary Key**
- `iKz_bsr (@) ~b, stala, rok` -> **Alternative Primary Key**
- `iKz_Vs (@) * vs` -> **Alternative Primary Key**
- `iKz_Vs1 (@) * vs1` -> **Alternative Primary Key**
- `iKz_Vss (@) * vs, splat` -> **Alternative Primary Key**
- `Vydaje Vydaj` -> **Foreign Key (or other linkage)**
- `iKodOP kodOP` -> **Foreign Key (or other linkage)**
- `iKz_VssZn (@) * vs, splat, zn` -> **Alternative Primary Key**

### Table: KZpol.x

Keys:
- `@ a,b, intkodtov` -> **Primary Key (Own Key)**
- `sklad a,b, intkodtov` -> **Foreign Key (or other linkage)**
- `KZ a,b` -> **Foreign Key (or other linkage)**
- `iKZpol (@) * a,b` -> **Alternative Primary Key**
- `iKtKZ (@)  intkodtov` -> **Alternative Primary Key**

### Table: KP.x

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**
- `Vydaje KodPri` -> **Foreign Key (or other linkage)**
- `iKodOP kodOP` -> **Foreign Key (or other linkage)**
- `iKp_b (@) * b` -> **Alternative Primary Key**

### Table: KPpol.x

Keys:
- `@ c,~d, intkodtov` -> **Primary Key (Own Key)**
- `Kp c,d` -> **Foreign Key (or other linkage)**
- `Kz a,b` -> **Foreign Key (or other linkage)**
- `Sklad a,b,intkodtov` -> **Foreign Key (or other linkage)**
- `Vydaje prijem` -> **Foreign Key (or other linkage)**
- `iKtKP (@) * intkodtov` -> **Alternative Primary Key**
- `iKZpolABI (@) * a, b, intkodtov` -> **Alternative Primary Key**
- `iPomKtKP (@) * pomintkodtov` -> **Alternative Primary Key**
- `iKPcd (@) * c, d` -> **Alternative Primary Key**

### Table: REKL.x

Keys:
- `@ e,~f` -> **Primary Key (Own Key)**
- `iREKL_b (@) * f` -> **Alternative Primary Key**
- `iREKL_bsr (@) ~f, rok` -> **Alternative Primary Key**
- `iKodOP kodOP` -> **Foreign Key (or other linkage)**

### Table: REKLpol.x

Keys:
- `@ e,f, intkodtov` -> **Primary Key (Own Key)**
- `Sklad a,b,intkodtov` -> **Foreign Key (or other linkage)**
- `iKodTov intkodtov` -> **Foreign Key (or other linkage)**
- `REKL e,f` -> **Foreign Key (or other linkage)**
- `iREKLpol (@) * e,f` -> **Alternative Primary Key**
- `iKtREKL (@) * intkodtov` -> **Alternative Primary Key**
- `iKtKZ intkodtov` -> **Foreign Key (or other linkage)**
- `iKtKP intkodtov` -> **Foreign Key (or other linkage)**
- `iKZpolABI c, d, intkodtov` -> **Foreign Key (or other linkage)**
- `KZ a,b` -> **Foreign Key (or other linkage)**

### Table: Uhrady.x

Keys:
- `@ * a,~b` -> **Primary Key (Own Key)**
- `KP a,b` -> **Foreign Key (or other linkage)**
- `KZ a,b` -> **Foreign Key (or other linkage)**
- `iUcetb c_b` -> **Foreign Key (or other linkage)**
- `PD c` -> **Foreign Key (or other linkage)**

### Table: Mesiace

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**

### Table: Ekonom

Keys:
- `@ * Datum` -> **Primary Key (Own Key)**

### Table: SpotPrie

Keys:
- `@ @` -> **Parametric Key (Global Variable definition)**
- `Auto Kod` -> **Foreign Key (or other linkage)**

### Table: Spotreba.x

Keys:
- `@ * kod, zacia_km` -> **Primary Key (Own Key)**
- `iDat (@) * kod, datum, hod` -> **Alternative Primary Key**
- `iDat_ (@) * kod, datum` -> **Alternative Primary Key**
- `iKodA (@) * kod` -> **Alternative Primary Key**
- `Auto Kod` -> **Foreign Key (or other linkage)**
- `Cerp_K (Spotreba) kod, Koniec_km` -> **Foreign Key (Role definition)**
- `Cerp_K_1 (Spotreba) kod, km_na_Konci` -> **Foreign Key (Role definition)**

### Table: delf

Keys:
- `udajo nazmie` -> **Foreign Key (or other linkage)**
- `iNazMie_ NazMie` -> **Foreign Key (or other linkage)**

### Table: BytUdaje

Keys:
- `@@` -> **Primary Key (Own Key)**

### Table: VyuctSBD

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `VyuSBD_1 (VyuctSBD) mo` -> **Foreign Key (Role definition)**

### Table: Byt.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `Byt_1 (Byt) mo` -> **Foreign Key (Role definition)**

### Table: Poist_ne

Keys:
- `@ poi_kod` -> **Primary Key (Own Key)**

### Table: Poistky

Keys:
- `Poist_ne poi_kod` -> **Foreign Key (or other linkage)**

### Table: VyuctSSE.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `SSE_1 (VyuctSSE) mo` -> **Foreign Key (Role definition)**
- `iKel (@) * kon_el` -> **Alternative Primary Key**
- `SSE_2 (iKel) kon_el` -> **Foreign Key (Role definition)**

### Table: ElSasa.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `elSa_k (ElSasa) mp` -> **Foreign Key (Role definition)**

### Table: VyucVeol.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `VEOL_1 (VyucVEOL) mo` -> **Foreign Key (Role definition)**
- `iKh2o (@) * kon_h2o` -> **Alternative Primary Key**
- `VEOL_2 (iKh2o) kon_h2o` -> **Foreign Key (Role definition)**

### Table: H2O_Sasa.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `h2oSa_k (h2o_Sasa) mp` -> **Foreign Key (Role definition)**

### Table: Baterie.x

Keys:
- `@ kod` -> **Primary Key (Own Key)**
- `}` -> **Foreign Key (or other linkage)**

### Table: Teplo.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `Tep1 (Teplo) mo` -> **Foreign Key (Role definition)**
- `iOb (@) * kon_ob` -> **Alternative Primary Key**
- `ob_2 (iOb) kon_ob` -> **Foreign Key (Role definition)**
- `iKu (@) * kon_ku` -> **Alternative Primary Key**
- `ku_2 (iKu) kon_ku` -> **Foreign Key (Role definition)**
- `iSp (@) * kon_sp` -> **Alternative Primary Key**
- `sp_2 (iSp) kon_sp` -> **Foreign Key (Role definition)**
- `iDe (@) * kon_de` -> **Alternative Primary Key**
- `de_2 (iDe) kon_de` -> **Foreign Key (Role definition)**

### Table: VyuctSPP.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `SPP_1 (VyuctSPP) mo` -> **Foreign Key (Role definition)**
- `iKpl (@) * kon_pl` -> **Alternative Primary Key**
- `SPP_2 (iKpl) kon_pl` -> **Foreign Key (Role definition)**

### Table: Inkaso.x

Keys:
- `@ mr` -> **Primary Key (Own Key)**
- `Ink_1 (Inkaso) mo` -> **Foreign Key (Role definition)**

### Table: Platby.x

Keys:
- `@ a,~b` -> **Primary Key (Own Key)**
- `iPlatby_abs (@) a,~b, stala` -> **Alternative Primary Key**
- `iPlatby_s (@) * stala` -> **Alternative Primary Key**
- `iPlatby_bsr (@) ~b, stala, rok` -> **Alternative Primary Key**
- `iPlatby_Vs (@) * vs` -> **Alternative Primary Key**
- `iPlatby_Vss (@) * vs, splat` -> **Alternative Primary Key**
- `iPlatby_VssZn (@) * vs, splat, x` -> **Alternative Primary Key**

### Table: DruhDruh.x

Keys:
- `@ d_b` -> **Primary Key (Own Key)**
- `iDD (@) * ~d` -> **Alternative Primary Key**

### Table: DruhTova.x

Keys:
- `@ b` -> **Primary Key (Own Key)**
- `iDruh (@) * ~d` -> **Alternative Primary Key**
- `druhdruh d_b` -> **Foreign Key (or other linkage)**

### Table: Obchody.x

Keys:
- `@ kod` -> **Primary Key (Own Key)**
- `iObchod (@) * ~mesto, ~nazov` -> **Alternative Primary Key**

### Table: Tovary.x

Keys:
- `@ kod` -> **Primary Key (Own Key)**
- `iTovar (@) * ~d` -> **Alternative Primary Key**
- `DruhTova kod_d` -> **Foreign Key (or other linkage)**
- `iKod_d (@) * kod_d` -> **Alternative Primary Key**

### Table: Nakup_o.x

Keys:
- `@ * kod` -> **Primary Key (Own Key)**
- `obchody kod_o` -> **Foreign Key (or other linkage)**
- `Nak_d_k (@) * datum, kod_o` -> **Alternative Primary Key**
- `Nak_t (@) * tlac` -> **Alternative Primary Key**

### Table: Nakup_t.x

Keys:
- `@ * kod` -> **Primary Key (Own Key)**
- `Nak_d_k datum, kod_o` -> **Foreign Key (or other linkage)**
- `obchody kod_o` -> **Foreign Key (or other linkage)**
- `tovary kod_t` -> **Foreign Key (or other linkage)**
- `iNakup_o (@) * datum, kod_o, ~tovar` -> **Alternative Primary Key**
- `iNak (@) * datum, kod_o` -> **Alternative Primary Key**
- `iObch (@) * kod_o` -> **Alternative Primary Key**
- `iNakT (@) * datum, kod, kod_o, kod_t` -> **Alternative Primary Key**
- `iNT (@) * kod_t` -> **Alternative Primary Key**
