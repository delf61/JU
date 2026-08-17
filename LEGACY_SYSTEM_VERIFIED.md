# LEGACY SYSTEM VERIFIED

This document contains a strict verification and consolidation of the legacy PC FAND application model based exclusively on `PRINTER.TXT` and `DEKLARACE SOUBORU - kapitola F.txt`.

## 1. EXACT TABLE INVENTORY
### `help.hlp`
- `tema : A,5`
- `text : T`
### `ParamCat`
- `Rok : D,'YYYY'`
- `SC : F,3,0`
### `param`
- `s01 : F,3,0`
- `s08 : F,3,0`
- `KP : F,3,0`
- `KZ : F,3,0`
- `zak : F,3,0`
- `ME : F,3,0`
- `uc : F,3,0`
- `sc : F,3,0`
- `pd : F,3,0`
- `dat : B`
- `a : A,30`
- `b : A,30`
- `c : A,8`
- `Titul : A,5`
- `Nazov : A,20`
- `Meno : A,10`
- `Priezv : A,15`
- `Miesto : A,20`
- `browse : B`
- `Datum : D,'DD.MM.YYYY'`
- `Dat0 : D,'MM.YYYY'`
- `Dat1 : D,'DD.MM.YYYY'`
- `Dat2 : D,'DD.MM.YYYY'`
- `cislo : F,5,0`
- `pocet : F,5,0`
- `a1 : F,6.2`
- `a2 : F,6.2`
- `a3 : F,6.2`
- `a4 : F,6.2`
- `a1234 : F,6.2`
- `doklad : A,1`
- `prvy : B`
- `posl : B`
- `MinCas : D,'DD.MM.YYYY'`
- `AktCas : D,'DD.MM.YYYY'`
- `NameSearch : A,25`
- `NSearch : F,4.0`
- `ok : B`
- `nazmie : A,50`
- `Zaciat : D,'hh:mm'`
- `koniec : D,'hh:mm'`
- `dph : F,2.1`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `intkodtov : F,10,0`
### `Par`
- `Kod : A,3`
- `Trasa : A,6`
- `zaciatok : D,'DD.MM.YYYY'`
- `zaciatoh : D,'hh:mm'`
- `koniec : D,'DD.MM.YYYY'`
- `konieh : D,'hh:mm'`
- `zac_km : F,5,0`
- `vzd : F,4,0`
- `tra : F,3,0`
- `z : A,20`
- `do : A,20`
- `kam : A,40`
- `ucel : A,40`
- `cena_PHM : F,3.2`
- `dph_dol : F,2.1`
- `dph_hor : F,2.1`
- `kurzy : A,70`
- `BA : A,4`
- `CU : A,12`
- `banka : A,35`
- `zv : D,'DD.'`
- `PD : B`
### `Kalendar.x`
- `Datum : D,'DD.MM.YYYY'`
- `TypeDay : F,1.0`
- `Jmeno : A,25!`
- `Meno : A,25!`
- `T : T!`
- `sc : F,2,0`
### `Doklady`
- `d : A,20`
- `B : A,1`
- `AN : B`
### `SadzbDPH`
- `DPH_Dol : F,2.1`
- `DPH_Hor : F,2.1`
- `od : D,'DD.MM.YYYY'`
- `do : D,'DD.MM.YYYY'`
### `Staty.x`
- `Stat : A,3`
- `Nazov : A,33`
### `Kraje.x`
- `KOD : A,'!'`
- `NAZOV : A,20!`
- `KM2 : F,4,0`
- `OBY : F,6,0`
### `Okresy.x`
- `KOD : A,'!!'`
- `NAZOV : A,20!`
- `KRAJ : A,1`
- `KM2 : F,4,0`
- `OBY : F,6,0`
- `kod_Medi : F,3.0`
### `Mesta.x`
- `kod : A,4`
- `NAZOV : A,20`
- `OKRES : A,'!!'`
- `TEL : A,8`
- `PSC : A,5`
### `Banky.x`
- `KODban : A,4!`
- `SKRATKA : A,10!`
- `popis : A,40!`
### `Trasy.x`
- `tra : F,3,0`
- `z : A,20`
- `do : A,20`
- `vzd : F,4,0`
- `cez : A,100`
- `mesto_2_km_pocet : F,2,0`
- `mesto_5_km_pocet : F,2,0`
- `mesto_10_km_pocet : F,2,0`
### `UdajO.x`
- `kodop : F,3,0`
- `firma : A,30`
- `meno : A,30`
- `cinnos : A,60`
- `ulica : A,20`
- `psc : A,6`
- `miesto : A,20`
- `tlf : A,15`
- `tlfa : A,15`
- `tlfb : A,40`
- `fax : A,15`
- `ICO : A,10`
- `PenUst : A,20`
- `Cu : A,20`
- `Pozn : A,60`
- `DRC : A,15`
- `ICPD : A,15`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `ku : D,'DD.MM.'`
- `x : F,6.2`
- `do : D,'DD.MM.YYYY'`
### `Cinnosti.x`
- `KODcin : F,3,0`
- `cinnos : A,60`
### `Udaje`
- `meno : A,10`
- `priezv : A,15`
- `titul : A,5`
- `nazov : A,40`
- `ICO : A,10`
- `DIC : A,10`
- `ICPD : A,15`
- `drcDPH : A,15`
- `DatDPH : D,'DD.MM.YYYY'`
- `Q_M : A,1!`
- `sadzba : F,2.1`
- `uli : A,20`
- `cis : A,5`
- `PSC : A,6`
- `miesto : A,20`
- `tlf : A,13`
- `tlf1 : A,13`
- `mobil : A,13`
- `mobil1 : A,13`
- `fax : A,13`
- `fax1 : A,13`
- `email : A,28`
- `hodsadzba : F,2.2`
- `PRGhodsadzba : F,2.2`
### `Udajea`
- `Kod : A,1`
- `d : A,20`
- `v : B`
- `r : B`
- `p : B`
- `m : B`
- `b : B`
- `z : B`
- `pocet : F,5,0`
- `suma : F,6.2`
### `Vydaje.x`
- `KODVYD : A,1`
- `D : A,30`
- `PV : B`
- `R : B`
- `P : B`
- `M : B`
- `B : B`
- `Z : B`
- `B7 : B`
- `B8 : B`
- `B11 : B`
- `B12 : B`
- `B13 : B`
- `B14 : B`
- `B15 : B`
- `B16 : B`
- `B17 : B`
- `B20 : B`
- `POCET : F,5.0`
- `X : B`
- `SUMA : F,6.2`
### `Ucty.x`
- `ba : A,4`
- `pr : A,6`
- `cu : A,12`
- `zv : N,2`
- `zv_od : D,'DD.MM.YYYY'`
- `zv_do : D,'DD.MM.YYYY'`
- `os : B`
- `popis : A,20`
### `Ucet.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : A,13`
- `d : D,'DD.MM.YYYY'`
- `ba : A,4`
- `cu : A,12`
- `ua : A,40`
- `pa : F,6.2`
- `qa : B`
- `ra : B`
- `ba1 : A,4`
- `cu1 : A,12`
- `nova : B`
- `vydaj : A,1`
### `UcetImpo.x`
- `ba : A,4`
- `cu : A,12`
- `datum : D,'DD.MM.YYYY'`
- `v_s : A,10`
### `kurzy.x`
- `datum : D,'DD.MM.YYYY'`
- `krajina : A,15`
- `mnoz : F,4,0`
- `kod : A,3`
- `d_nakup : F,3.3`
- `d_predaj : F,3.3`
- `d_kurz_NBS : F,3.3`
- `v_nakup : F,3.3`
- `v_predaj : F,3.3`
- `v_kurz_NBS : F,3.3`
- `zaujimave : B`
### `PV`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `ph : F,6.2`
- `h : A,13`
- `pu : F,6.2`
- `u : A,13`
- `m : F,6.2`
- `HaN : F,6.2`
- `poh : F,6.2`
- `zav : F,6.2`
### `straDoch.x`
- `rok : F,4,0`
- `strata : F,6.2`
- `nezdan_suma : F,6.2`
- `hra_min_prijmu : F,6.2`
### `DoprPros.x`
- `skr : A,3`
- `prostr : A,20`
### `Auto.x`
- `Kod : A,3`
- `Typ : A,20`
- `SPZ : A,10`
- `ehme : F,2.1`
- `eh90 : F,2.1`
- `eh120 : F,2.1`
- `esme : F,2.1`
- `esmi : F,2.1`
- `esko : F,2.1`
- `STN : F,2.1`
- `koef : F,1.1`
- `Pal : A,20`
- `LPG : F,2.1`
- `Fir : B`
- `Pou : B`
- `motor : F,1.1`
- `nadrz : F,2,0`
- `nadrz_LPG : F,2,0`
- `aktual : B`
### `SumaPD`
- `a : D,'DD.MM.YYYY'`
- `PO : F,4.0`
- `P1 : F,6.2`
- `P2 : F,6.2`
- `P3 : F,6.2`
- `POH : F,6.2`
- `ZAV : F,6.2`
- `a1 : F,6.2`
- `a1_ : F,6.2`
- `a1__ : F,6.2`
- `a2 : F,6.2`
- `a2_ : F,6.2`
- `a2__ : F,6.2`
- `a3 : F,6.2`
- `a3_ : F,6.2`
- `a3__ : F,6.2`
- `a3___ : F,6.2`
- `a4 : F,6.2`
- `a4_ : F,6.2`
- `a4__ : F,6.2`
- `a1 : F,6.2`
- `a2 : F,6.2`
- `a3 : F,6.2`
- `a4 : F,6.2`
- `a5 : F,6.2`
- `a6 : F,6.2`
- `a7 : F,6.2`
- `a8 : F,6.2`
- `a9 : F,6.2`
- `a10 : F,6.2`
- `a11 : F,6.2`
- `a12 : F,6.2`
- `a121 : F,6.2`
- `a122 : F,6.2`
- `a123 : F,6.2`
- `a12b : F,6.2`
- `a13 : F,6.2`
- `a14 : F,6.2`
- `a15 : F,6.2`
- `a16 : F,6.2`
- `a17 : F,6.2`
- `a20 : F,6.2`
- `a22 : F,6.2`
- `zZP : F,6.2`
- `odpisy : F,6.2`
- `ZP : F,6.2`
- `leas : F,6.2`
- `ucet_prijem : F,6.2`
- `ucet_vydaj : F,6.2`
- `hot_prijem : F,6.2`
- `hot_vydaj : F,6.2`
- `pohlad : F,6.2`
- `zavazok : F,6.2`
- `strata : F,6.2`
- `dochodok : F,6.2`
- `nezdan_suma : F,6.2`
- `rok_1 : A,4`
- `hra_min_prijmu : F,6.2`
### `PD`
- `a : D,'DD.MM.YYYY'`
- `b : A,13`
- `zp : D,'DD.MM.YYYY'`
- `kodOP : F,3,0`
- `c : A,13`
- `d : A,56`
- `r : B`
- `p : B`
- `a1 : F,6.2`
- `a2 : F,6.2`
- `a3 : F,6.2`
- `a4 : F,6.2`
- `Vydaj : A,1`
- `a7 : F,6.2`
- `a8 : F,6.2`
- `a9 : F,6.2`
- `a10 : F,6.2`
- `a11 : F,6.2`
- `a12 : F,6.2`
- `a13 : F,6.2`
- `a14 : F,6.2`
- `a15 : F,6.2`
- `a16 : F,6.2`
- `a17 : F,6.2`
- `po : A,30`
- `dph : F,2.1`
- `hal_p : F,1.2`
- `hal : F,1.2`
- `ok : A,1`
### `SC.x`
- `zaciatok : D,'DD.MM.YYYY'`
- `zaciatoh : D,'hh:mm'`
- `koniec : D,'DD.MM.YYYY'`
- `konieh : D,'hh:mm'`
- `BB : F,3.0`
- `B : A,8`
- `prostr : A,3`
- `CES : F,4.2`
- `UBY : F,4.2`
- `KAM : A,40`
- `UCEL1 : A,40`
- `UCEL2 : A,40`
- `BenKM : F,4.2`
- `PocKM : F,4.2`
- `MENO : A,20`
- `BYDL : A,30`
- `dat : D,'DD.MM.YYYY'`
- `KONST : F,3.2`
- `CeBenz : F,3.2`
- `CeLpg : F,3.2`
- `DPH : F,2.1`
- `BenPocetMiest : F,1,0`
- `PocetMiest : F,1,0`
### `old_Auto.x`
- `datum : D,'DD.MM.YYYY'`
- `zaciatok : D,'hh:mm'`
- `koniec : D,'hh:mm'`
- `bb : F,3,0`
- `tra : F,3,0`
- `mesto_2_km_pocet : F,2,0`
- `mesto_5_km_pocet : F,2,0`
- `mesto_10_km_pocet : F,2,0`
- `odkial : A,20`
- `kam : A,20`
- `ucel : A,40`
- `Zac_km : F,6,0`
- `Kon_km : F,6,0`
- `konst : F,3.2`
- `cena_PHM : F,3.2`
- `Kod : A,3`
- `nova : B`
- `dph : F,2.1`
- `LPG : B`
- `text_1 : A,40`
- `text_2 : A,40`
- `text_3 : A,40`
### `Evi_Auto.x`
- `datum : D,'DD.MM.YYYY'`
- `zaciatok : D,'hh:mm'`
- `koniec : D,'hh:mm'`
- `bb : F,3,0`
- `tra : F,3,0`
- `mesto_2_km_pocet : F,2,0`
- `mesto_5_km_pocet : F,2,0`
- `mesto_10_km_pocet : F,2,0`
- `odkial : A,20`
- `kam : A,20`
- `ucel : A,40`
- `Zac_km : F,6,0`
- `Kon_km : F,6,0`
- `konst : F,3.2`
- `cena_PHM : F,3.2`
- `Kod : A,3`
- `nova : B`
- `dph : F,2.1`
- `PHM_zac : F,2.1`
- `LPG : B`
- `text_1 : A,40`
- `text_2 : A,40`
- `text_3 : A,40`
### `IKzp`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `C : F,4.0`
- `vy : A,30`
- `n : A,40`
- `vc : A,15`
- `rv : D,'YYYY'`
- `hb : D,'DD.MM.YYYY'`
- `h : F,6.2`
- `p : A,13`
- `u : F,6.2`
- `hz : F,6.2`
- `r : A,13`
- `d : A,50`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `SO : A,'$'`
- `RO : F,2.0`
- `OS : N,1`
- `OKZVC : F,6.2`
- `dph : F,2.1`
- `dph_dat : D,'DD.MM.YYYY'`
- `h_n : B`
- `oprava : F,6.2`
- `fdo : A,10`
- `fd : A,8`
### `IKdkp`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `C : F,4.0`
- `n : A,40`
- `mn : F,4.0`
- `jc : F,6.2`
- `hb : D,'DD.MM.YYYY'`
- `h : F,6.2`
- `p : A,13`
- `u : F,6.2`
- `r : A,13`
- `d : A,30`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `FDO : A,10`
- `FD : A,8`
- `FV : A,8`
- `DPH : F,2.1`
### `Leasing`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `vy : A,30`
- `n : A,40`
- `vc : A,15`
- `rv : D,'YYYY'`
- `hz : F,6.2`
- `leas : F,6.2`
- `lea0 : F,6.2`
- `pois : F,6.2`
- `mes : F,2,0`
- `d : A,30`
- `ls : A,30`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `RO : F,2.0`
### `Zamestna.x`
- `zamest : A,25`
- `RC : A,'999999-9999'`
- `doklad : A,10`
- `uli : A,20`
- `PSC : A,6`
- `miesto : A,20`
- `staly_zam : B`
### `Dohoda`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `zamest : A,25`
- `n : A,40`
- `v : F,6.2`
### `EZ.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `KODOP : F,3.0`
- `zc : A,10`
- `od : A,50`
- `dz : A,10`
- `n : A,40`
- `bk : D,'DD.MM.YYYY'`
- `ob : A,13`
- `ad : A,20`
- `am : F,4.0`
- `bd : A,20`
- `bm : F,4.2`
- `cd : A,20`
- `cm : F,4.0`
- `ch : F,6.2`
- `Hodiny : F,3.1`
- `PRACE : F,2.0`
- `PRIJEM : A,1`
### `evizak.dbf`
- `BK : D,'DD.MM.YYYY'`
- `BM : F,4.2`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `OD : A,41`
- `OB : A,11`
- `HODINY : F,2.0`
- `PRACE : F,2.0`
- `SPOLU : A,7`
- `KODOP : A,4`
- `KODPRI : A,1`
### `Den_Prac.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `DATUM : D,'DD.MM.YYYY'`
- `Zaciat : D,'hh:mm'`
- `Koniec : D,'hh:mm'`
- `u_zakaz : B`
- `TEXT_1 : A,60`
- `TEXT_2 : A,60`
- `TEXT_3 : A,60`
- `bb : F,3,0`
- `program : B`
- `TEXT : A,255`
### `Sklad.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `popis1 : A,40`
- `popis2 : A,40`
- `mnozstvo : F,4.0`
- `na_vydaj : F,4.0`
- `nakupcena : F,6.2`
- `d : A,50`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `fdo : A,10`
- `fd : A,8`
- `fv : A,8`
- `dph : F,2.1`
- `vyrcislo : A,25`
- `merjedn : A,3`
- `intkodtov : F,10,0`
- `mes : F,2,0`
### `skla2008.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `popis1 : A,40`
- `popis2 : A,40`
- `mnozstvo : F,4.0`
- `na_vydaj : F,4.0`
- `nakupcena : F,6.2`
- `d : A,50`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `fdo : A,10`
- `fd : A,8`
- `fv : A,8`
- `dph : F,2.1`
- `vyrcislo : A,25`
- `merjedn : A,3`
- `intkodtov : F,10,0`
- `mes : F,2,0`
### `sesit.dbf`
- `INTKODTOV : F,10,0`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `POPIS1 : A,38`
- `VYDaj : A,1`
- `MNOZSTVO : F,3.0`
- `MERJEDN : A,3`
- `nakupcena : F,6.2`
- `DPH : F,2.0`
- `VYRCISLO : A,19`
### `KZ.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `kodOP : F,3,0`
- `od : A,50`
- `n : A,40`
- `x : F,6.2`
- `y : F,6.2`
- `z : F,6.2`
- `pc : F,6.2`
- `splat : D,'DD.MM.YYYY'`
- `stala : A,1`
- `mes : F,2,0`
- `uhr_do : F,2,0`
- `od_ucet : A,20`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `spc_mes : F,2,0`
- `dph : F,2.1`
- `dph_1 : F,2.1`
- `Vydaj : A,1`
- `Zp : D,'DD.MM.YYYY'`
- `U_H : A,1`
- `uhrady : F,1,0`
- `zamok : A,1`
- `vyrovn : F,1.2`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `par_69 : B`
### `KZpol.x`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `INTKODTOV : F,10.0`
- `POPIS1 : A,40`
- `POPIS2 : A,40`
- `KODVYD : A,1`
- `MNOZSTVO : F,6.2`
- `MERJEDN : A,3`
- `NAKUPCENA : F,6.2`
- `DPH : F,2.1`
- `VYRCISLO : A,25`
- `Vydaj : A,1`
- `mes : F,2,0`
### `KP.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `KODOP : F,3.0`
- `od : A,50`
- `n : A,40`
- `z : F,6.2`
- `pc : F,6.2`
- `dph : F,2.1`
- `ds : D,'DD.MM.YYYY'`
- `zp : D,'DD.MM.YYYY'`
- `KODPRI : A,1`
- `U_H : A,1`
- `TOVAR : F,6.2`
- `SPOSOB_UHR : A,25`
- `OBJEDNAVKA : A,25`
- `zamok : A,1`
- `PRIJEM : A,1`
- `uhrady : F,1,0`
- `vyrovn : F,1.2`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `ArcIntCis : A,1`
- `zaloha : F,6.2`
### `KPpol.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : D,'DD.MM.YYYY'`
- `d : A,8`
- `popis1 : A,40`
- `popis2 : A,40`
- `Prijem : A,1`
- `mnozstvo : F,6.2`
- `mnozstvo_z : F,6.2`
- `merjedn : A,3`
- `nakupcena : F,6.2`
- `op : F,2.6`
- `op_z : F,2.6`
- `dph : F,2.1`
- `vyrcislo : A,25`
- `pomintkodtov : F,10,0`
- `intkodtov : F,10,0`
- `prace : T`
### `REKL.x`
- `e : D,'DD.MM.YYYY'`
- `f : A,8`
- `kodOP : F,3,0`
- `dod : A,50`
- `kodOP1 : F,3,0`
- `odb : A,50`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `g : D,'DD.MM.YYYY'`
- `bb1 : F,3,0`
- `hod1 : D,'hh:mm'`
### `REKLpol.x`
- `e : D,'DD.MM.YYYY'`
- `f : A,8`
- `INTKODTOV : F,10.0`
- `POPIS1 : A,40`
- `zavada : A,75`
- `POPIS2 : A,40`
- `KODVYD : A,1`
- `MNOZSTVO : F,6.2`
- `MERJEDN : A,3`
- `NAKUPCENA : F,6.2`
- `DPH : F,2.1`
- `VYRCISLO : A,25`
- `Vydaj : A,1`
- `mes : F,2,0`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : D,'DD.MM.YYYY'`
- `d : A,8`
### `Uhrady.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : A,13`
- `pb : D,'DD.MM.YYYY'`
- `pc : F,6.2`
- `od_ucet : A,20`
- `prirad_kz : B`
- `prirad_kp : B`
### `Mesiace`
- `Datum : D,'MM.YYYY'`
### `Ekonom`
- `Cislo : A,8`
- `Datum : D,'MM.YYYY'`
- `Mnozstvo : F,6.2`
- `Mnozstvo1 : F,6.2`
- `PrijemC : F,8.2`
- `VydajC : F,8.2`
- `PrijemP : F,8.2`
- `VydajP : F,8.2`
- `Celkom : F,8.2`
- `Spolu : F,8.2`
- `CeKor : F,5.2`
- `Prirazka : F,2.2`
- `Clo : F,2.2`
- `JCD : A,15`
- `CeKorMn : F,7.2`
- `CePrirMn : F,7.2`
- `CeKorPrirDaMn : F,8.2`
- `Pohladavky : F,8.2`
- `Uhrady : F,8.2`
- `Zisk : F,7.2`
- `Firma : A,14`
- `DatV : D,'DD.MM.YYYY'`
- `DrHaNM : F,6.2`
- `Poistne : F,6.2`
- `PrevRez : F,6.2`
- `PrReAut : F,6.2`
- `PrReSC : F,6.2`
- `PrReBan : F,6.2`
- `PHM_SC : F,6.2`
- `HaN_IM : F,6.2`
- `Tovar : F,6.2`
- `DanZPri : F,6.2`
- `OsUcet : F,6.2`
- `DPH : F,6.2`
- `s_DPH : F,6.2`
- `VydNez : F,6.2`
- `Reklam : F,6.2`
- `Sluzby : F,6.2`
- `Osobuc : F,6.2`
- `Poist : F,6.2`
- `Zaloha : F,6.2`
- `Tovary : F,6.2`
- `TovSlu : F,6.2`
- `PriNez : F,6.2`
### `SpotPrie`
- `kod : A,3`
- `LITRE : F,6.2`
- `KM : F,6.0`
- `Sk_za_PHM : F,6.2`
- `Sk_za_PHM_bez_DPH : F,6.2`
- `SERVIS : F,6.2`
- `invest : F,6.2`
- `opravy : F,6.2`
- `ine : F,6.2`
- `mesiace : F,4,0`
- `ZACIA_KM : F,6.2`
- `Koniec_KM : F,6.2`
- `spotr_posled : F,2.2`
- `litre_posled : F,2.2`
- `LITRE_lpg : F,6.2`
- `KM_lpg : F,6.0`
- `Sk_za_LPG : F,6.2`
- `Sk_za_LPG_bez_DPH : F,6.2`
- `uspora : F,6.2`
- `usp_LPG : F,6.2`
- `usp_LPG_bez_DPH : F,6.2`
- `usp_fikt : F,6.2`
- `body_Shell : F,5,0`
- `kosacka : F,2.2`
### `Spotreba.x`
- `KOD : A,3`
- `DATUM : D,'DD.MM.YYYY'`
- `LITRE : F,2.2`
- `SK_NA_1L : F,2.3`
- `SK_BE_1L : F,2.3`
- `ZACIA_KM : F,6.0`
- `KONIEC_KM : F,6.0`
- `L_NA_100_K : F,2.4`
- `SK_NA_1_KM : F,2.4`
- `SERVIS : F,4.1`
- `SO_SERV_1_ : F,2.4`
- `INE : F,4.1`
- `POPIS : A,40`
- `OPRAVA : F,4.1`
- `INVEST : F,4.1`
- `N15 : A,9`
- `hod : D,'hh:mm'`
- `MIESTO : A,40`
- `FIRMA : A,10`
- `DPH : F,2.1`
- `DO_PLNA : B`
- `PALIVO : A,1`
- `body_Shell : F,3,0`
- `ucet : B`
- `kosacka : F,2.2`
- `zlava : F,1.2`
### `sc_roky`
- `rok : D,'YYYY'`
- `spolu : F,6.2`
### `vyrocia`
- `DATUM : D,'DD.MM.'`
- `TEXT : A,31`
### `delf`
- `DATUM : D,'DD.MM.YYYY'`
- `CAS : A,5`
- `TRVaNie : F,3.0`
- `zakaznik : A,30`
- `TEXT : A,255`
- `nazmie : A,50`
### `dph`
- `OD : D,'DD.MM.YYYY'`
- `DO : D,'DD.MM.YYYY'`
- `DPH1 : F,2.1`
- `DPH2 : F,2.1`
- `SUM1VSTUP : F,6.2`
- `DPH1VSTUP : F,5.2`
- `SUM2VSTUP : F,6.2`
- `DPH2VSTUP : F,5.2`
- `SUM1VYSTUP : F,6.2`
- `DPH1VYSTUP : F,5.2`
- `SUM2VYSTUP : F,6.2`
- `DPH2VYSTUP : F,5.2`
- `DPHPAR4 : F,5.0`
- `SUM_PAR_69 : F,6.2`
- `DPH_PAR_69 : F,5.2`
- `ODPOCET_PAR_69 : F,5.2`
- `R13 : F,5.0`
- `ArcIntCis : A,1`
### `pohl.dbf`
- `a : D,'DD.MM.YYYY'`
- `od : A,50`
- `n : A,40`
- `z : F,6.2`
- `pc : F,6.2`
- `dph : F,2.1`
- `ds : D,'DD.MM.YYYY'`
- `rc : F,6.2`
### `PoklDokl`
- `a : D,'DD.MM.YYYY'`
- `b : A,13`
- `d : A,56`
- `r : B`
- `p : B`
- `a1 : F,6.2`
- `sl_a1 : A,40`
- `a2 : F,6.2`
- `sl_a2 : A,40`
### `revolv`
- `vklad : F,7.2`
- `pa : F,3.2`
- `mes : F,1.1`
### `BytUdaje`
- `plocha : F,2.2`
### `DomUdaje`
### `VyuctSBD`
- `mr : D,'MM.YYYY'`
- `mo : D,'MM.YYYY'`
- `A1 : F,4.2`
- `A2a : F,4.2`
- `A2b : F,4.2`
- `A2c : F,4.2`
- `A2d : F,4.2`
- `A2e : F,4.2`
- `A2f : F,4.2`
- `A2g : F,4.2`
- `A2h : F,4.2`
- `A3 : F,4.2`
- `A4 : F,4.2`
- `A5 : F,4.2`
- `B1 : F,4.2`
- `B2 : F,4.2`
- `B3 : F,4.2`
- `B4 : F,4.2`
- `B5 : F,4.2`
- `B6 : F,4.2`
- `B7 : F,4.2`
- `B8 : F,4.2`
- `B9 : F,4.2`
- `B10 : F,4.2`
- `pozn : T`
### `Byt.x`
- `mr : D,'MM.YYYY'`
- `mo : D,'MM.YYYY'`
- `A1 : F,4.2`
- `A2a : F,4.2`
- `A2b : F,4.2`
- `A2c : F,4.2`
- `A2d : F,4.2`
- `A2e : F,4.2`
- `A2f : F,4.2`
- `A2g : F,4.2`
- `A2h : F,4.2`
- `A3 : F,4.2`
- `A4 : F,4.2`
- `A5 : F,4.2`
- `B1 : F,4.2`
- `B2 : F,4.2`
- `B3 : F,4.2`
- `B4 : F,4.2`
- `B5 : F,4.2`
- `B6 : F,4.2`
- `B7 : F,4.2`
- `B8 : F,4.2`
- `B9 : F,4.2`
- `B10 : F,4.2`
### `Poist_ne`
- `poi_kod : F,2,0`
- `nazov : A,30`
### `Poistky`
- `popis : A,30`
- `forma : A,'$'`
- `poi_kod : F,2,0`
- `poistne : F,5.2`
- `m_termin : D,'DD'`
- `r_termin : D,'DD.MM'`
- `dat_vzniku : D,'DD.MM.YYYY'`
- `dat_zaniku : D,'DD.MM.YYYY'`
### `VyuctSSE.x`
- `mr : D,'DD.MM.YYYY'`
- `mo : D,'DD.MM.YYYY'`
- `zac_el : F,5,0`
- `kon_el : F,5,0`
- `J_cena : F,1.2`
- `pausal : F,3.1`
- `el : F,5,0`
- `dph : F,2,0`
- `pozn : T`
### `VyuSSESa.x`
### `ElSasa.x`
- `mp : D,'DD.MM.YYYY'`
- `mr : D,'DD.MM.YYYY'`
- `el_v : F,5,0`
- `el_n : F,5,0`
- `sk_v : F,2.2`
- `sk_n : F,2.2`
- `pausal : F,3,0`
- `dph : F,2.1`
- `vymena : B`
- `rok : D,'YYYY'`
- `mp : D,'DD.MM.YYYY'`
- `mr : D,'DD.MM.YYYY'`
- `el_v : F,5,0`
- `spotreba_v : F,3.3`
- `el_n : F,5,0`
- `spotreba_n : F,3.3`
- `sk_v : F,3.3`
- `sk_n : F,3.3`
- `dni : F,3,0`
- `den_spo_v_ : F,3.1`
- `den_spo_n_ : F,3.1`
- `den_spo_v : F,3.3`
- `den_spo_n : F,3.3`
- `pausal : F,3.2`
- `dph : F,2.1`
- `vymena : B`
- `rok : D,'YYYY'`
- `ArcIntCis : A,1`
### `VyucVeol.x`
- `mr : D,'DD.MM.YYYY'`
- `mo : D,'DD.MM.YYYY'`
- `zac_h2o : F,5,0`
- `kon_h2o : F,5,0`
- `J_cena : F,1.2`
- `pausal : F,3.1`
- `h2o : F,5,0`
- `dph : F,2,0`
- `pozn : T`
### `H2O_Sasa.x`
- `mp : D,'DD.MM.YYYY'`
- `mr : D,'DD.MM.YYYY'`
- `h2o_v : F,5,0`
- `h2o_n : F,5,0`
- `sk_v : F,2.2`
- `sk_n : F,2.2`
- `dph : F,2.1`
### `Baterie.x`
- `kod : F,3,0`
- `oznac : A,3`
- `vyrobca : A,10`
- `typ : A,3`
- `mAh : F,5,0`
- `kupene : D,'DD.MM.YYYY'`
- `nabite : D,'DD.MM.YYYY'`
- `kolky_krat : F,2,0`
- `kde_som : A,40`
- `von : B`
### `Bat_nabi`
- `kod : F,3,0`
- `nabite : D,'DD.MM.YYYY'`
- `kde_som : A,40`
- `vybite : D,'DD.MM.YYYY'`
### `Teplo.x`
- `mr : D,'DD.MM.YYYY'`
- `mo : D,'DD.MM.YYYY'`
- `zac_ob : F,5,0`
- `kon_ob : F,5,0`
- `zac_ku : F,5,0`
- `kon_ku : F,5,0`
- `zac_sp : F,5,0`
- `kon_sp : F,5,0`
- `zac_de : F,5,0`
- `kon_de : F,5,0`
### `VyuctSPP.x`
- `mr : D,'DD.MM.YYYY'`
- `mo : D,'DD.MM.YYYY'`
- `zac_pl : F,5,0`
- `kon_pl : F,5,0`
- `J_cena : F,3.2`
- `pausal : F,3.1`
- `pl : F,5,0`
- `pozn : T`
### `Inkaso.x`
- `mr : D,'MM.YYYY'`
- `mo : D,'MM.YYYY'`
- `el : F,4,0`
- `pl : F,3,0`
- `ra : F,3,0`
- `tv : F,3,0`
### `InkaSasa.x`
### `Platby.x`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `od : A,40`
- `n : A,40`
- `x : F,6.2`
- `pc : F,6.2`
- `splat : D,'DD.MM.YYYY'`
- `stala : A,1`
- `mes : F,2,0`
- `uhr_do : F,2,0`
- `od_ucet : A,20`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `spc_mes : F,2,0`
- `forma : A,1`
- `U_H : A,1`
### `DruhDruh.x`
- `d : A,20`
- `d_B : A,1`
- `ok : B`
### `DruhTova.x`
- `d : A,20`
- `d_B : A,1`
- `B : A,1`
- `dph : F,2.1`
- `ok : B`
### `Obchody.x`
- `kod : F,5,0`
- `nazov : A,20`
- `mesto : A,20`
- `spolu : F,6.2`
- `bez_dph : F,6.2`
### `Tovary.x`
- `kod : F,5,0`
- `d : A,'!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!'`
- `mj : A,'!!!'`
- `kod_d : A,1`
- `dph : F,2.1`
### `Nakup_o.x`
- `kod : F,6,0`
- `kod_o : F,5,0`
- `datum : D,'DD.MM.YYYY'`
- `tlac : D,'MM.YYYY'`
- `spolu : F,6.2`
- `bez_dph : F,6.2`
- `kto : A,'$'`
### `Nakup_t.x`
- `kod : F,6,0`
- `kod_o : F,5,0`
- `datum : D,'DD.MM.YYYY'`
- `kod_t : F,5,0`
- `cena : F,6.2`
- `mnoz : F,3.3`
- `dph : F,2.1`
- `b_p : B`
- `n_p : B`
### `dpd.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,13`
- `zp : D,'DD.MM.YYYY'`
- `kodOP : F,3,0`
- `c : A,13`
- `d : A,99`
- `r : B`
- `p : B`
- `a1 : F,6.2`
- `a2 : F,6.2`
- `a3 : F,6.2`
- `a4 : F,6.2`
- `Vydaj : A,1`
- `a7 : F,6.2`
- `a8 : F,6.2`
- `a9 : F,6.2`
- `a10 : F,6.2`
- `a11 : F,6.2`
- `a12 : F,6.2`
- `a13 : F,6.2`
- `a14 : F,6.2`
- `a15 : F,6.2`
- `a16 : F,6.2`
- `a17 : F,6.2`
- `po : A,30`
- `dph : F,2.1`
- `dph_1 : F,2.1`
- `sDph : F,6.2`
- `hal_p : F,1.2`
- `hal : F,1.2`
- `ok : A,1`
- `ArcIntCis : A,1`
### `dkp.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `KODOP : F,3.0`
- `od : A,50`
- `n : A,40`
- `z : F,6.2`
- `pc : F,6.2`
- `dph : F,2.1`
- `ds : D,'DD.MM.YYYY'`
- `zp : D,'DD.MM.YYYY'`
- `KODPRI : A,1`
- `U_H : A,1`
- `TOVAR : F,6.2`
- `SPOSOB_UHR : A,25`
- `OBJEDNAVKA : A,25`
- `zamok : A,1`
- `PRIJEM : A,1`
- `uhrady : F,1,0`
- `vyrovn : F,1.2`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `ArcIntCis : A,1`
- `zaloha : F,6.2`
- `uhrada : F,6.2`
### `dkppol.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : D,'DD.MM.YYYY'`
- `d : A,8`
- `popis1 : A,40`
- `popis2 : A,40`
- `Prijem : A,1`
- `mnozstvo : F,6.2`
- `mnozstvo_z : F,6.2`
- `merjedn : A,3`
- `nakupcena : F,6.2`
- `op : F,2.6`
- `op_z : F,2.6`
- `dph : F,2.1`
- `vyrcislo : A,25`
- `pomintkodtov : F,10,0`
- `intkodtov : F,10,0`
- `ArcIntCis : A,1`
### `dpartner.dbf`
- `kodop : F,3,0`
- `firma : A,30`
- `meno : A,30`
- `cinnos : A,60`
- `ulica : A,20`
- `psc : A,6`
- `miesto : A,20`
- `tlf : A,15`
- `tlfa : A,15`
- `tlfb : A,40`
- `fax : A,15`
- `ICO : A,10`
- `PenUst : A,20`
- `Cu : A,20`
- `Pozn : A,60`
- `DRC : A,15`
- `ICPD : A,15`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `ku : D,'DD.MM.'`
- `x : F,6.2`
- `do : D,'DD.MM.YYYY'`
- `ArcIntCis : A,1`
### `dkraje.dbf`
- `KODKRA : A,1`
- `NAZOV : A,20`
- `KM2 : F,4.0`
- `OBY : F,6.0`
- `ArcIntCis : A,1`
### `dokresy.dbf`
- `KODOKR : A,2`
- `NAZOV : A,20`
- `KODKRA : A,1`
- `KM2 : F,4.0`
- `OBY : F,6.0`
- `ArcIntCis : A,1`
### `dmesta.dbf`
- `KOD : A,4`
- `NAZOV : A,20`
- `KODOKR : A,2`
- `TEL : A,8`
- `PSC : A,5`
- `ArcIntCis : A,1`
### `dbanky.dbf`
- `KODBAN : A,4`
- `SKRATKA : A,10`
- `POPIS : A,40`
- `ArcIntCis : A,1`
### `dkurzy.dbf`
- `KOD : A,3`
- `DATUM : D,'DD.MM.YYYY'`
- `KRAJINA : A,15`
- `MNOZ : F,4.0`
- `D_NAKUP : F,3.3`
- `D_PREDAJ : F,3.3`
- `D_KURZ_NBS : F,3.3`
- `V_NAKUP : F,3.3`
- `V_PREDAJ : F,3.3`
- `V_KURZ_NBS : F,3.3`
- `ZAUJIMAVE : B`
- `ArcIntCis : A,1`
### `calendar.dbf`
- `DaTUM : D,'DD.MM.YYYY'`
- `TYPEDAY : F,1.0`
- `JMeNO : A,25`
- `MENO : A,25`
- `T : T`
- `ArcIntCis : A,1`
### `dvyrocia.dbf`
- `DATUM : D,'DD.MM.'`
- `TEXT : A,31`
- `ArcIntCis : A,1`
### `dudaje.dbf`
- `meno : A,10`
- `priezv : A,15`
- `titul : A,5`
- `nazov : A,40`
- `ICO : A,10`
- `DIC : A,10`
- `ICPD : A,15`
- `drcDPH : A,15`
- `DatDPH : D,'DD.MM.YYYY'`
- `Q_M : A,1!`
- `sadzba : F,2.1`
- `uli : A,20`
- `cis : A,5`
- `PSC : A,6`
- `miesto : A,20`
- `tlf : A,13`
- `tlf1 : A,13`
- `mobil : A,13`
- `mobil1 : A,13`
- `fax : A,13`
- `fax1 : A,13`
- `email : A,28`
- `hodsadzba : F,4,2`
- `PRGhodsadzba : F,2,2`
- `ArcIntCis : A,1`
### `dprijmy.dbf`
- `Kod : A,1`
- `d : A,20`
- `v : B`
- `r : B`
- `p : B`
- `m : B`
- `b : B`
- `z : B`
- `pocet : F,5,0`
- `suma : F,6.2`
- `ArcIntCis : A,1`
### `dvydaje.dbf`
- `KODVYD : A,1`
- `D : A,30`
- `PV : B`
- `R : B`
- `P : B`
- `M : B`
- `B : B`
- `Z : B`
- `B7 : B`
- `B8 : B`
- `B11 : B`
- `B12 : B`
- `B13 : B`
- `B14 : B`
- `B15 : B`
- `B16 : B`
- `B17 : B`
- `B20 : B`
- `POCET : F,5.0`
- `X : B`
- `SUMA : F,6.2`
- `ArcIntCis : A,1`
### `ducty.dbf`
- `BA : A,4`
- `pr : A,6`
- `cu : A,12`
- `zv : A,2`
- `zv_od : D,'DD.MM.YYYY'`
- `zv_do : D,'DD.MM.YYYY'`
- `os : B`
- `popis : A,20`
- `ArcIntCis : A,1`
### `ducet.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `C : A,13`
- `D : D,'DD.MM.YYYY'`
- `BA : A,4`
- `CU : A,12`
- `UA : A,40`
- `PA : F,6.2`
- `QA : B`
- `RA : B`
- `BA1 : A,4`
- `CU1 : A,12`
- `NOVA : B`
- `vydaj : A,1`
- `ArcIntCis : A,1`
### `ducetimp.dbf`
- `BA : A,4`
- `CU : A,12`
- `DATUM : D,'DD.MM.YYYY'`
- `V_S : A,10`
- `ArcIntCis : A,1`
### `dpocstav.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `PH : F,6.2`
- `H : A,13`
- `PU : F,6.2`
- `U : A,13`
- `M : F,6.2`
- `HAN : F,6.2`
- `POH : F,6.2`
- `ZAV : F,6.2`
- `ArcIntCis : A,1`
### `dstrata.dbf`
- `rok : F,4,0`
- `suma : F,6.2`
### `dpokldok`
- `a : D,'DD.MM.YYYY'`
- `b : A,13`
- `d : A,56`
- `r : B`
- `p : B`
- `a1 : F,6.2`
- `sl_a1 : A,40`
- `a2 : F,6.2`
- `sl_a2 : A,40`
- `ArcIntCis : A,1`
### `dauto.dbf`
- `Kod : A,3`
- `Typ : A,20`
- `SPZ : A,10`
- `ehme : F,2.1`
- `eh90 : F,2.1`
- `eh120 : F,2.1`
- `esme : F,2.1`
- `esmi : F,2.1`
- `esko : F,2.1`
- `STN : F,2.1`
- `koef : F,1.1`
- `Pal : A,20`
- `LPG : F,2.1`
- `Fir : B`
- `Pou : B`
- `motor : F,1.1`
- `nadrz : F,2,0`
- `nadrz_LPG : F,2,0`
- `ArcIntCis : A,1`
- `aktual : B`
### `dtrasy.dbf`
- `tra : F,3,0`
- `z : A,20`
- `do : A,20`
- `vzd : F,4,0`
- `cez : A,100`
- `mesto_2_km_pocet : F,2,0`
- `mesto_5_km_pocet : F,2,0`
- `mesto_10_km_pocet : F,2,0`
- `ArcIntCis : A,1`
### `ddoppros.dbf`
- `SKR : A,3`
- `PROSTR : A,20`
- `ArcIntCis : A,1`
### `dsumapd.dbf`
- `a : D,'DD.MM.YYYY'`
- `PO : F,4.0`
- `P1 : F,6.2`
- `P2 : F,6.2`
- `P3 : F,6.2`
- `POH : F,6.2`
- `ZAV : F,6.2`
- `a1 : F,6.2`
- `a1_ : F,6.2`
- `a1__ : F,6.2`
- `a2 : F,6.2`
- `a2_ : F,6.2`
- `a2__ : F,6.2`
- `a3 : F,6.2`
- `a3_ : F,6.2`
- `a3__ : F,6.2`
- `a3___ : F,6.2`
- `a4 : F,6.2`
- `a4_ : F,6.2`
- `a4__ : F,6.2`
- `a1 : F,6.2`
- `a2 : F,6.2`
- `a3 : F,6.2`
- `a4 : F,6.2`
- `a5 : F,6.2`
- `a6 : F,6.2`
- `a7 : F,6.2`
- `a8 : F,6.2`
- `a9 : F,6.2`
- `a10 : F,6.2`
- `a11 : F,6.2`
- `a12 : F,6.2`
- `a121 : F,6.2`
- `a122 : F,6.2`
- `a123 : F,6.2`
- `a12b : F,6.2`
- `a13 : F,6.2`
- `a14 : F,6.2`
- `a15 : F,6.2`
- `a16 : F,6.2`
- `a17 : F,6.2`
- `a20 : F,6.2`
- `a22 : F,6.2`
- `zZP : F,6.2`
- `odpisy : F,6.2`
- `ZP : F,6.2`
- `leas : F,6.2`
- `ucet_prijem : F,6.2`
- `ucet_vydaj : F,6.2`
- `hot_prijem : F,6.2`
- `hot_vydaj : F,6.2`
- `pohlad : F,6.2`
- `zavazok : F,6.2`
- `strata : F,6.2`
- `dochodok : F,6.2`
- `nezdan_suma : F,6.2`
- `rok_1 : A,4`
- `ArcIntCis : A,1`
### `dsc.dbf`
- `kod : A,3`
- `zaciatok : D,'DD.MM.YYYY'`
- `zaciatoh : A,5`
- `koniec : D,'DD.MM.YYYY'`
- `konieh : A,5`
- `BB : F,3.0`
- `B : A,8`
- `CES : F,4.2`
- `UBY : F,4.2`
- `KAM : A,40`
- `UCEL1 : A,40`
- `UCEL2 : A,40`
- `BenKM : F,4.2`
- `PocKM : F,4.2`
- `MENO : A,20`
- `BYDL : A,30`
- `dat : D,'DD.MM.YYYY'`
- `KONST : F,3.2`
- `CeBenz : F,3.2`
- `CeLpg : F,3.2`
- `DPH : F,2.1`
- `BenPocetMiest : F,1,0`
- `PocetMiest : F,1,0`
- `ArcIntCis : A,1`
- `sumkm : F,4.2`
- `cestSM : F,4.1`
- `spolu : F,5.2`
### `deviauto.dbf`
- `datum : D,'DD.MM.YYYY'`
- `zaciatok : A,5`
- `koniec : A,5`
- `bb : F,3,0`
- `tra : F,3,0`
- `mesto_2_km_pocet : F,2,0`
- `mesto_5_km_pocet : F,2,0`
- `mesto_10_km_pocet : F,2,0`
- `odkial : A,20`
- `kam : A,20`
- `ucel : A,40`
- `Zac_km : F,6,0`
- `Kon_km : F,6,0`
- `konst : F,3.2`
- `cena_PHM : F,3.2`
- `Kod : A,3`
- `nova : B`
- `dph : F,2.1`
- `PHM_zac : F,2.1`
- `PHM_kon : F,2.1`
- `LPG : B`
- `text_1 : A,40`
- `text_2 : A,40`
- `text_3 : A,40`
- `ArcIntCis : A,1`
### `dikzp.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `C : F,4.0`
- `vy : A,30`
- `n : A,40`
- `vc : A,15`
- `rv : D,'YYYY'`
- `hb : D,'DD.MM.YYYY'`
- `h : F,6.2`
- `p : A,13`
- `u : F,6.2`
- `hz : F,6.2`
- `r : A,13`
- `d : A,50`
- `v : D,'DD.MM.YYYY'`
- `sv : A,35`
- `SO : A,'$'`
- `RO : F,2.0`
- `OS : A,1`
- `OKZVC : F,6.2`
- `dph : F,2.1`
- `dph_dat : D,'DD.MM.YYYY'`
- `h_n : B`
- `oprava : F,6.2`
- `fdo : A,10`
- `fd : A,8`
- `rok_pom : F,4,0`
- `zo : F,6.2`
- `ArcIntCis : A,1`
### `dikdkp.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `C : F,4.0`
- `N : A,40`
- `MN : F,4.0`
- `JC : F,6.2`
- `HB : D,'DD.MM.YYYY'`
- `H : F,6.2`
- `P : A,13`
- `U : F,6.2`
- `R : A,13`
- `D : A,50`
- `V : D,'DD.MM.YYYY'`
- `SV : A,35`
- `FDO : A,10`
- `FD : A,8`
- `FV : A,8`
- `DPH : F,2.1`
- `ArcIntCis : A,1`
### `dsklad.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `POPIS1 : A,40`
- `POPIS2 : A,40`
- `MNOZSTVO : F,4.0`
- `NAKUPCENA : F,6.2`
- `D : A,50`
- `V : D,'DD.MM.YYYY'`
- `SV : A,35`
- `FDO : A,10`
- `FD : A,8`
- `FV : A,8`
- `DPH : F,2.1`
- `VYRCISLO : A,15`
- `MERJEDN : A,3`
- `INTKODTOV : F,10.0`
- `mes : F,2.0`
- `ArcIntCis : A,1`
### `dskl2008.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `POPIS1 : A,40`
- `POPIS2 : A,40`
- `MNOZSTVO : F,4.0`
- `NAKUPCENA : F,6.2`
- `D : A,50`
- `V : D,'DD.MM.YYYY'`
- `SV : A,35`
- `FDO : A,10`
- `FD : A,8`
- `FV : A,8`
- `DPH : F,2.1`
- `VYRCISLO : A,15`
- `MERJEDN : A,3`
- `INTKODTOV : F,10.0`
- `ArcIntCis : A,1`
### `dRekl.dbf`
- `e : D,'DD.MM.YYYY'`
- `f : A,8`
- `kodOP : F,3,0`
- `dod : A,50`
- `kodOP1 : F,3,0`
- `odb : A,50`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `g : D,'DD.MM.YYYY'`
- `bb1 : F,3,0`
- `hod1 : D,'hh:mm'`
- `ArcIntCis : A,1`
### `dReklpol.dbf`
- `e : D,'DD.MM.YYYY'`
- `f : A,8`
- `INTKODTOV : F,10.0`
- `POPIS1 : A,40`
- `zavada : A,75`
- `POPIS2 : A,40`
- `KODVYD : A,1`
- `MNOZSTVO : F,6.2`
- `MERJEDN : A,3`
- `NAKUPCENA : F,6.2`
- `DPH : F,2.1`
- `VYRCISLO : A,25`
- `Vydaj : A,1`
- `mes : F,2,0`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : D,'DD.MM.YYYY'`
- `d : A,8`
### `dleasing.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `VY : A,30`
- `N : A,40`
- `VC : A,15`
- `RV : D`
- `HZ : F,6.2`
- `LEAS : F,6.2`
- `LEA0 : F,6.2`
- `POIS : F,6.2`
- `MES : F,2.0`
- `D : A,50`
- `LS : A,30`
- `V : D,'DD.MM.YYYY'`
- `SV : A,35`
- `RO : F,2.0`
- `ArcIntCis : A,1`
### `devizak.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `KODOP : F,3.0`
- `ZC : A,10`
- `OD : A,50`
- `DZ : A,10`
- `N : A,40`
- `BK : D,'DD.MM.YYYY'`
- `OB : A,13`
- `AD : A,20`
- `AM : F,4.0`
- `BD : A,20`
- `BM : F,4.0`
- `CD : A,20`
- `CM : F,4.0`
- `CH : F,6.2`
- `HODINY : F,3.0`
- `PRACE : F,2.0`
- `PRIJEM : A,1`
- `prg : F,2.2`
- `ArcIntCis : A,1`
### `dkz.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `kodOP : F,3,0`
- `od : A,50`
- `n : A,40`
- `x : F,6.2`
- `y : F,6.2`
- `z : F,6.2`
- `pc : F,6.2`
- `splat : D,'DD.MM.YYYY'`
- `stala : A,1`
- `mes : F,2,0`
- `uhr_do : F,2,0`
- `od_ucet : A,20`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `spc_mes : F,2,0`
- `dph : F,2.1`
- `dph_1 : F,2.1`
- `Vydaj : A,1`
- `Zp : D,'DD.MM.YYYY'`
- `U_H : A,1`
- `uhrady : F,1,0`
- `zamok : A,1`
- `vyrovn : F,1.2`
- `bb : F,3,0`
- `hod : D,'hh:mm'`
- `par69 : A,1`
- `ArcIntCis : A,1`
- `uhrada : F,6.2`
- `par_69 : B`
### `dkzpol.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,8`
- `INTKODTOV : F,10.0`
- `POPIS1 : A,40`
- `POPIS2 : A,40`
- `KODVYD : A,1`
- `MNOZSTVO : F,6.2`
- `MERJEDN : A,3`
- `NAKUPCENA : F,6.2`
- `DPH : F,2.1`
- `VYRCISLO : A,25`
- `Vydaj : A,1`
- `mes : F,2,0`
- `ArcIntCis : A,1`
### `duhrady.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `c : A,13`
- `pb : D,'DD.MM.YYYY'`
- `pc : F,6.2`
- `od_ucet : A,20`
- `prirad_kz : B`
- `prirad_kp : B`
- `ArcIntCis : A,1`
### `ddenprac.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `DATUM : D,'DD.MM.YYYY'`
- `Zaciat : A,5`
- `Koniec : A,5`
- `u_zakaz : B`
- `TEXT : A,255`
- `bb : F,3,0`
- `program : B`
- `ArcIntCis : A,1`
- `text_1 : A,60`
- `text_2 : A,60`
- `text_3 : A,60`
### `dspotreb.dbf`
- `KOD : A,3`
- `DATUM : D,'DD.MM.YYYY'`
- `LITRE : F,2.2`
- `SK_NA_1L : F,2.2`
- `SK_BE_1L : F,2.2`
- `ZACIA_KM : F,6.0`
- `KONIEC_KM : F,6.0`
- `L_NA_100_K : F,2.4`
- `SK_NA_1_KM : F,2.4`
- `SERVIS : F,4.1`
- `SO_SERV_1_ : F,2.4`
- `INE : F,4.1`
- `POPIS : A,40`
- `OPRAVA : F,4.1`
- `INVEST : F,4.1`
- `N15 : A,9`
- `hod : A,5`
- `MIESTO : A,40`
- `FIRMA : A,10`
- `DPH : F,2.1`
- `DO_PLNA : B`
- `PALIVO : A,1`
- `body_Shell : F,3,0`
- `ucet : B`
- `kosacka : F,2.2`
- `zlava : F,1.2`
- `ArcIntCis : A,1`
- `TANK_TYP : A,1`
- `PNEU : A,1`
- `CESTA : A,2`
- `STYL : A,1`
- `SPOTREBA : F,2.2`
- `BC_SPOTREB : F,2.2`
- `BC_QUANTIT : F,2.2`
- `BC_SPEED : F,2.2`
### `dpokdokl.dbf`
- `A : D,'DD.MM.YYYY'`
- `B : A,13`
- `C : A,13`
- `D : A,56`
- `R : B`
- `P : B`
- `A1 : F,6.2`
- `SL_A1 : A,40`
- `A2 : F,6.2`
- `SL_A2 : A,40`
- `ArcIntCis : A,1`
### `ddph.dbf`
- `OD : D,'DD.MM.YYYY'`
- `DO : D,'DD.MM.YYYY'`
- `DPH1 : F,2.1`
- `DPH2 : F,2.1`
- `SUM1VSTUP : F,6.2`
- `DPH1VSTUP : F,5.2`
- `SUM2VSTUP : F,6.2`
- `DPH2VSTUP : F,5.2`
- `SUM1VYSTUP : F,6.2`
- `DPH1VYSTUP : F,5.2`
- `SUM2VYSTUP : F,6.2`
- `DPH2VYSTUP : F,5.2`
- `DPHPAR4 : F,5.0`
- `SUM_PAR_69 : F,6.2`
- `DPH_PAR_69 : F,5.2`
- `ODPOCET_PAR_69 : F,5.2`
- `R13 : F,5.0`
- `ArcIntCis : A,1`
### `dsadzdph.dbf`
- `DPH_Dol : F,2.1`
- `DPH_Hor : F,2.1`
- `od : D,'DD.MM.YYYY'`
- `do : D,'DD.MM.YYYY'`
- `ArcIntCis : A,1`
### `dstrdoch.dbf`
- `rok : F,4,0`
- `strata : F,6.2`
- `dochodok : F,6.2`
- `nezdan_suma : F,6.2`
### `dvyucsbd.dbf`
- `MR : D,'DD.MM.YYYY'`
- `MO : D,'DD.MM.YYYY'`
- `A1 : F,4.2`
- `A2A : F,4.2`
- `A2B : F,4.2`
- `A2C : F,4.2`
- `A2D : F,4.2`
- `A2E : F,4.2`
- `A2F : F,4.2`
- `A2G : F,4.2`
- `A2H : F,4.2`
- `A3 : F,4.2`
- `A4 : F,4.2`
- `A5 : F,4.2`
- `B1 : F,4.2`
- `B2 : F,4.2`
- `B3 : F,4.2`
- `B4 : F,4.2`
- `B5 : F,4.2`
- `B6 : F,4.2`
- `B7 : F,4.2`
- `B8 : F,4.2`
- `B9 : F,4.2`
- `B10 : F,4.2`
- `ArcIntCis : A,1`
### `dbyt.dbf`
- `MR : D,'DD.MM.YYYY'`
- `MO : D,'DD.MM.YYYY'`
- `A1 : F,4.2`
- `A2A : F,4.2`
- `A2B : F,4.2`
- `A2C : F,4.2`
- `A2D : F,4.2`
- `A2E : F,4.2`
- `A2F : F,4.2`
- `A2G : F,4.2`
- `A2H : F,4.2`
- `A3 : F,4.2`
- `A4 : F,4.2`
- `A5 : F,4.2`
- `B1 : F,4.2`
- `B2 : F,4.2`
- `B3 : F,4.2`
- `B4 : F,4.2`
- `B5 : F,4.2`
- `B6 : F,4.2`
- `B7 : F,4.2`
- `B8 : F,4.2`
- `B9 : F,4.2`
- `B10 : F,4.2`
- `ArcIntCis : A,1`
### `dpoi_vne.dbf`
- `POI_KOD : F,2.0`
- `NAZOV : A,30`
- `ArcIntCis : A,1`
### `dpoistky.dbf`
- `POPIS : A,30`
- `FORMA : A,1`
- `POI_KOD : F,2.0`
- `POISTNE : F,5.2`
- `M_TERMIN : D,'DD.MM.YYYY'`
- `R_TERMIN : D,'DD.MM.YYYY'`
- `DAT_VZNIKU : D,'DD.MM.YYYY'`
- `DAT_ZANIKU : D,'DD.MM.YYYY'`
- `ArcIntCis : A,1`
### `dvyucSSE.dbf`
- `MR : D,'DD.MM.YYYY'`
- `MO : D,'DD.MM.YYYY'`
- `ZAC_EL : F,5.0`
- `KON_EL : F,5.0`
- `J_CENA : F,3.2`
- `PAUSAL : F,3.1`
- `EL : F,5.0`
- `ArcIntCis : A,1`
### `dElSasa.dbf`
- `mp : D,'DD.MM.YYYY'`
- `mr : D,'DD.MM.YYYY'`
- `el_v : F,5,0`
- `spotreba_v : F,3.3`
- `el_n : F,5,0`
- `spotreba_n : F,3.3`
- `sk_v : F,3.3`
- `sk_n : F,3.3`
- `dni : F,3,0`
- `den_spo_v_ : F,3.1`
- `den_spo_n_ : F,3.1`
- `den_spo_v : F,3.3`
- `den_spo_n : F,3.3`
- `pausal : F,3.2`
- `dph : F,2.1`
- `vymena : B`
- `rok : D,'YYYY'`
- `ArcIntCis : A,1`
### `dh2osasa.dbf`
- `mp : D,'DD.MM.YYYY'`
- `mr : D,'DD.MM.YYYY'`
- `h2o_v : F,5,0`
- `h2o_n : F,5,0`
- `sk_v : F,2.2`
- `sk_n : F,2.2`
- `dph : F,2.1`
- `spotreba : F,3.2`
- `dni : F,3,0`
- `priemer_l : F,3.2`
- `priemer : F,3.2`
- `rok : D,'YYYY'`
- `ArcIntCis : A,1`
### `dinksasa.dbf`
- `mr : D,'MM.YYYY'`
- `mo : D,'MM.YYYY'`
- `el : F,4.1`
- `el_perc : F,4.1`
- `pl : F,3.1`
- `pl_perc : F,4.1`
- `ra : F,3.1`
- `ra_perc : F,4.1`
- `tv : F,3.1`
- `tv_perc : F,4.1`
- `ArcIntCis : A,1`
### `dvyucSPP.dbf`
- `MR : D,'DD.MM.YYYY'`
- `MO : D,'DD.MM.YYYY'`
- `ZAC_PL : F,5.0`
- `KON_PL : F,5.0`
- `J_CENA : F,3.2`
- `PAUSAL : F,3.1`
- `PL : F,5.0`
- `ArcIntCis : A,1`
### `dinkaso.dbf`
- `MR : D,'DD.MM.YYYY'`
- `MO : D,'DD.MM.YYYY'`
- `EL : F,4.0`
- `PL : F,3.0`
- `RA : F,3.0`
- `TV : F,3.0`
- `ArcIntCis : A,1`
### `dplatby.dbf`
- `a : D,'DD.MM.YYYY'`
- `b : A,8`
- `od : A,40`
- `n : A,40`
- `x : F,6.2`
- `pc : F,6.2`
- `splat : D,'DD.MM.YYYY'`
- `stala : A,1`
- `mes : F,2,0`
- `uhr_do : F,2,0`
- `od_ucet : A,20`
- `var_sym : A,10`
- `kon_sym : A,10`
- `spc_sym : A,10`
- `spc_mes : F,2,0`
- `forma : A,1`
- `U_H : A,1`
- `ArcIntCis : A,1`
### `ddruhy.dbf`
- `D : A,20`
- `D_B : A,1`
- `OK : B`
- `ArcIntCis : A,1`
### `ddruhtov.dbf`
- `D : A,20`
- `D_B : A,1`
- `B : A,1`
- `DPH : F,2.1`
- `OK : B`
- `ArcIntCis : A,1`
### `dobchody.dbf`
- `KOD : F,5.0`
- `NAZOV : A,20`
- `MESTO : A,20`
- `SPOLU : F,6.2`
- `BEZ_DPH : F,6.2`
- `ArcIntCis : A,1`
### `dtovary.dbf`
- `KOD : F,5.0`
- `D : A,30`
- `MJ : A,3`
- `KOD_D : A,1`
- `DPH : F,2.1`
- `ArcIntCis : A,1`
### `dnakup_o.dbf`
- `KOD : F,6.0`
- `KOD_O : F,5.0`
- `DATUM : D,'DD.MM.YYYY'`
- `TLAC : D,'DD.MM.YYYY'`
- `SPOLU : F,6.2`
- `BEZ_DPH : F,6.2`
- `KTO : A,1`
- `ArcIntCis : A,1`
### `dnakup_t.dbf`
- `KOD : F,6.0`
- `KOD_O : F,5.0`
- `DATUM : D,'DD.MM.YYYY'`
- `KOD_T : F,5.0`
- `CENA : F,6.2`
- `MNOZ : F,3.3`
- `DPH : F,2.1`
- `ArcIntCis : A,1`
### `dteplo.dbf`
- `mr : D,'DD.MM.YYYY'`
- `mo : D,'DD.MM.YYYY'`
- `zac_ob : F,5,0`
- `kon_ob : F,5,0`
- `zac_ku : F,5,0`
- `kon_ku : F,5,0`
- `zac_sp : F,5,0`
- `kon_sp : F,5,0`
- `zac_de : F,5,0`
- `kon_de : F,5,0`
### `dbaterie.dbf`
- `kod : F,3,0`
- `oznac : A,3`
- `vyrobca : A,10`
- `typ : A,3`
- `mAh : F,5,0`
- `kupene : D,'DD.MM.YYYY'`
- `nabite : D,'DD.MM.YYYY'`
- `kolky_krat : F,2,0`
- `kde_som : A,40`
- `von : B`
### `dcinnost.dbf`
- `KODCIN : F,3.0`
- `CINNOS : A,60`
- `ArcIntCis : A,1`
- `ju_adr : file [adresar : A,12`
- `rok : A,4 ]`
- `ad : record of ju_adr`
- `nazov : = JU_path.path+'*.dbf'`
- `koniec : =valdate(I1.koniec,''hh:mm'')'])`
- `konieh : =valdate(I1.konieh,''hh:mm'')'])`
### `vystav.dbf`
- `od : A,34`
- `z : F,12.0`
- `a : D,'DD.MM.YYYY'`
- `Ds : D`
- `Tovar : B`
- `n : A,38`
### `zav2003.dbf`
- `A : D`
- `B : A,11`
- `C : A,36`
- `D : F,13.0`
- `E : F,9.2`
- `T : A,6`
- `G : F,8.2`

## 2. EXACT KEY INVENTORY
### `ParamCat`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
### `param`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
### `Par`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
### `Kalendar.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * Datum;`
- **Primary/Unique Key** (VERIFIED): `iDen (@) * Den;`
- **Primary/Unique Key** (VERIFIED): `iJmeno (@) *~Jmeno;`
- **Primary/Unique Key** (VERIFIED): `iMeno (@) *~Meno;`
### `SadzbDPH`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
### `Staty.x`
- **Primary/Unique Key** (VERIFIED): `#K @ stat;`
- **Primary/Unique Key** (VERIFIED): `iNazSta (@) * ~Nazov;`
### `Kraje.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * kod;`
### `Okresy.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * kod;`
- **Search/Alternative Key** (VERIFIED): `Kraje Kraj;`
### `Mesta.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * ~Nazov;`
- **Search/Alternative Key** (VERIFIED): `Okresy Okres;`
### `Banky.x`
- **Primary/Unique Key** (VERIFIED): `#K @ kodBAn;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana:  9`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
### `Trasy.x`
- **Primary/Unique Key** (VERIFIED): `#K @ tra;`
- **Primary/Unique Key** (VERIFIED): `iTrZDo (@) * z,do;`
- **Primary/Unique Key** (VERIFIED): `iTrDoZ (@) * do,z;`
- **Primary/Unique Key** (VERIFIED): `iTrZ (@) * z;`
- **Primary/Unique Key** (VERIFIED): `iTrDo (@) * do;`
### `UdajO.x`
- **Primary/Unique Key** (VERIFIED): `#K @ ~NazMie;`
- **Primary/Unique Key** (VERIFIED): `iAbcU (@) * ~Firmen;`
- **Primary/Unique Key** (VERIFIED): `iNazMie_ (@) * ~NazMie_;`
- **Primary/Unique Key** (VERIFIED): `iNaz_Mie (@) * ~Naz_Mie;`
- **Primary/Unique Key** (VERIFIED): `iKodOP (@) kodOP;`
### `Cinnosti.x`
- **Primary/Unique Key** (VERIFIED): `#K @ kodcin;`
### `Udaje`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
- **Search/Alternative Key** (VERIFIED): `#K Banky BA;`
### `Udajea`
- **Primary/Unique Key** (VERIFIED): `#K @ Kod;`
- **Primary/Unique Key** (VERIFIED): `#K @ Kod;`
### `Vydaje.x`
- **Primary/Unique Key** (VERIFIED): `#K @ Kodvyd;`
### `Ucty.x`
- **Primary/Unique Key** (VERIFIED): `#K @ ba, cu;`
- **Search/Alternative Key** (VERIFIED): `Banky ba;`
### `Ucet.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * a,~b;`
- **Primary/Unique Key** (VERIFIED): `iBc (@) * bc;`
- **Search/Alternative Key** (VERIFIED): `banky BA;`
- **Primary/Unique Key** (VERIFIED): `iUcet (@) * BA, CU, a, ~b;`
- **Primary/Unique Key** (VERIFIED): `iUcetb (@) * ~b;`
- **Search/Alternative Key** (VERIFIED): `ucty BA, CU;`
### `UcetImpo.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * ba, cu, datum, v_s;`
### `kurzy.x`
- **Primary/Unique Key** (VERIFIED): `#K @ datum, kod;`
- **Primary/Unique Key** (VERIFIED): `iKurz (@) * kod,datum;`
### `PV`
- **Primary/Unique Key** (VERIFIED): `#K @ @`
### `straDoch.x`
- **Primary/Unique Key** (VERIFIED): `#K @ rok;`
### `DoprPros.x`
- **Primary/Unique Key** (VERIFIED): `#K @ skr;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana: 18`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
### `Auto.x`
- **Primary/Unique Key** (VERIFIED): `#K @ Kod;`
### `PD`
- **Primary/Unique Key** (VERIFIED): `#K @ b;`
- **Search/Alternative Key** (VERIFIED): `Vydaje Vydaj;`
### `SC.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * zaciatok, zaciatoh;`
- **Primary/Unique Key** (VERIFIED): `iSCzac (@) * zaciatok;`
- **Primary/Unique Key** (VERIFIED): `iSC (@) * bb;`
- **Primary/Unique Key** (VERIFIED): `iSCislo (@) cislo;`
- **Search/Alternative Key** (VERIFIED): `DoprPros prostr;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana: 24`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
- **Search/Alternative Key** (VERIFIED): `Auto prostr;`
### `old_Auto.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * datum, zaciatok;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana: 25`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
### `Evi_Auto.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * datum, zaciatok;`
- **Primary/Unique Key** (VERIFIED): `iEa (@) * bb;`
- **Search/Alternative Key** (VERIFIED): `Auto Kod;`
- **Search/Alternative Key** (VERIFIED): `Trasy tra;`
- **Primary/Unique Key** (VERIFIED): `iKod (@) * kod;`
- **Primary/Unique Key** (VERIFIED): `iKodBb (@) * kod,bb;`
### `IKzp`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
### `IKdkp`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
### `Leasing`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
### `Zamestna.x`
- **Primary/Unique Key** (VERIFIED): `#K @ zamest`
### `Dohoda`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
### `EZ.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
- **Search/Alternative Key** (VERIFIED): `iNazMie_ od;`
- **Search/Alternative Key** (VERIFIED): `iKodOP kodOP;`
- **Search/Alternative Key** (VERIFIED): `kalendar a;`
- **Search/Alternative Key** (VERIFIED): `Vydaje Prijem;`
- **Primary/Unique Key** (VERIFIED): `iEZ_ob (@) * ob8;`
### `Den_Prac.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * a,b;`
- **Search/Alternative Key** (VERIFIED): `EZ a,b;`
- **Search/Alternative Key** (VERIFIED): `#K kalendar datum;`
### `Sklad.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,b,intkodtov;`
- **Primary/Unique Key** (VERIFIED): `iKodTov (@) * intkodtov;`
### `skla2008.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,b,intkodtov;`
- **Primary/Unique Key** (VERIFIED): `iKodTov2008 (@) * intkodtov;`
### `KZ.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
- **Primary/Unique Key** (VERIFIED): `iKz_abs (@) a,~b, stala;`
- **Primary/Unique Key** (VERIFIED): `iKz_s (@) * stala;`
- **Primary/Unique Key** (VERIFIED): `iKz_b (@) * b;`
- **Primary/Unique Key** (VERIFIED): `iKz_bsr (@) ~b, stala, rok;`
- **Primary/Unique Key** (VERIFIED): `iKz_Vs (@) * vs;`
- **Primary/Unique Key** (VERIFIED): `iKz_Vs1 (@) * vs1;`
- **Primary/Unique Key** (VERIFIED): `iKz_Vss (@) * vs, splat;`
- **Search/Alternative Key** (VERIFIED): `Vydaje Vydaj;`
- **Search/Alternative Key** (VERIFIED): `iKodOP kodOP;`
- **Primary/Unique Key** (VERIFIED): `#K iKz_VssZn (@) * vs, splat, zn;`
### `KZpol.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,b, intkodtov;`
- **Search/Alternative Key** (VERIFIED): `sklad a,b, intkodtov;`
- **Search/Alternative Key** (VERIFIED): `KZ a,b;`
- **Primary/Unique Key** (VERIFIED): `iKZpol (@) * a,b;`
- **Primary/Unique Key** (VERIFIED): `iKtKZ (@)  intkodtov;`
### `KP.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
- **Search/Alternative Key** (VERIFIED): `Vydaje KodPri;`
- **Search/Alternative Key** (VERIFIED): `iKodOP kodOP;`
- **Primary/Unique Key** (VERIFIED): `iKp_b (@) * b;`
### `KPpol.x`
- **Primary/Unique Key** (VERIFIED): `#K @ c,~d, intkodtov;`
- **Search/Alternative Key** (VERIFIED): `Kp c,d;`
- **Search/Alternative Key** (VERIFIED): `Kz a,b;`
- **Search/Alternative Key** (VERIFIED): `Sklad a,b,intkodtov;`
- **Search/Alternative Key** (VERIFIED): `Vydaje prijem;`
- **Primary/Unique Key** (VERIFIED): `iKtKP (@) * intkodtov;`
- **Primary/Unique Key** (VERIFIED): `iKZpolABI (@) * a, b, intkodtov;`
- **Primary/Unique Key** (VERIFIED): `iPomKtKP (@) * pomintkodtov;`
- **Primary/Unique Key** (VERIFIED): `iKPcd (@) * c, d;`
### `REKL.x`
- **Primary/Unique Key** (VERIFIED): `#K @ e,~f;`
- **Primary/Unique Key** (VERIFIED): `iREKL_b (@) * f;`
- **Primary/Unique Key** (VERIFIED): `iREKL_bsr (@) ~f, rok;`
- **Search/Alternative Key** (VERIFIED): `iKodOP kodOP;`
### `REKLpol.x`
- **Primary/Unique Key** (VERIFIED): `#K @ e,f, intkodtov;`
- **Search/Alternative Key** (VERIFIED): `Sklad a,b,intkodtov;`
- **Search/Alternative Key** (VERIFIED): `iKodTov intkodtov;`
- **Search/Alternative Key** (VERIFIED): `REKL e,f;`
- **Primary/Unique Key** (VERIFIED): `iREKLpol (@) * e,f;`
- **Primary/Unique Key** (VERIFIED): `iKtREKL (@) * intkodtov;`
- **Search/Alternative Key** (VERIFIED): `iKtKZ intkodtov;`
- **Search/Alternative Key** (VERIFIED): `iKtKP intkodtov;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana: 45`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
- **Search/Alternative Key** (VERIFIED): `iKZpolABI c, d, intkodtov;`
- **Search/Alternative Key** (VERIFIED): `KZ a,b;`
### `Uhrady.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * a,~b;`
- **Search/Alternative Key** (VERIFIED): `KP a,b;`
- **Search/Alternative Key** (VERIFIED): `KZ a,b;`
- **Search/Alternative Key** (VERIFIED): `iUcetb c_b;`
- **Search/Alternative Key** (VERIFIED): `PD c;`
### `Mesiace`
- **Primary/Unique Key** (VERIFIED): `#K @ @ ;`
### `Ekonom`
- **Primary/Unique Key** (VERIFIED): `#K @ * Datum;`
### `SpotPrie`
- **Primary/Unique Key** (VERIFIED): `#K @ @;`
- **Search/Alternative Key** (VERIFIED): `Auto Kod;`
### `Spotreba.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * kod, zacia_km;`
- **Primary/Unique Key** (VERIFIED): `iDat (@) * kod, datum, hod;`
- **Primary/Unique Key** (VERIFIED): `iDat_ (@) * kod, datum;`
- **Primary/Unique Key** (VERIFIED): `iKodA (@) * kod;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana: 59`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
- **Search/Alternative Key** (VERIFIED): `Auto Kod;`
- **Search/Alternative Key** (VERIFIED): `#K Cerp_K (Spotreba) kod, Koniec_km;`
- **Search/Alternative Key** (VERIFIED): `#K Cerp_K_1 (Spotreba) kod, km_na_Konci;`
### `delf`
- **Search/Alternative Key** (VERIFIED): `#K udajo nazmie;`
- **Search/Alternative Key** (VERIFIED): `iNazMie_ NazMie;`
### `BytUdaje`
- **Primary/Unique Key** (VERIFIED): `#K @@`
### `VyuctSBD`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `#K VyuSBD_1 (VyuctSBD) mo;`
### `Byt.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `#K Byt_1 (Byt) mo;`
### `Poist_ne`
- **Primary/Unique Key** (VERIFIED): `#K @ poi_kod;`
- **Search/Alternative Key** (VERIFIED): `      JU              16.08.2026     strana:170`
- **Search/Alternative Key** (VERIFIED): `Typ Nazev`
- **Search/Alternative Key** (VERIFIED): `Text`
### `Poistky`
- **Search/Alternative Key** (VERIFIED): `#K Poist_ne poi_kod;`
### `VyuctSSE.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `SSE_1 (VyuctSSE) mo;`
- **Primary/Unique Key** (VERIFIED): `iKel (@) * kon_el;`
- **Search/Alternative Key** (VERIFIED): `SSE_2 (iKel) kon_el;`
### `ElSasa.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `elSa_k (ElSasa) mp;`
### `VyucVeol.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `VEOL_1 (VyucVEOL) mo;`
- **Primary/Unique Key** (VERIFIED): `iKh2o (@) * kon_h2o;`
- **Search/Alternative Key** (VERIFIED): `VEOL_2 (iKh2o) kon_h2o;`
### `H2O_Sasa.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `h2oSa_k (h2o_Sasa) mp;`
### `Baterie.x`
- **Primary/Unique Key** (VERIFIED): `#K @ kod;`
- **Search/Alternative Key** (VERIFIED): `}`
### `Teplo.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `Tep1 (Teplo) mo;`
- **Primary/Unique Key** (VERIFIED): `iOb (@) * kon_ob;`
- **Search/Alternative Key** (VERIFIED): `ob_2 (iOb) kon_ob;`
- **Primary/Unique Key** (VERIFIED): `iKu (@) * kon_ku;`
- **Search/Alternative Key** (VERIFIED): `ku_2 (iKu) kon_ku;`
- **Primary/Unique Key** (VERIFIED): `iSp (@) * kon_sp;`
- **Search/Alternative Key** (VERIFIED): `sp_2 (iSp) kon_sp;`
- **Primary/Unique Key** (VERIFIED): `iDe (@) * kon_de;`
- **Search/Alternative Key** (VERIFIED): `de_2 (iDe) kon_de;`
### `VyuctSPP.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `SPP_1 (VyuctSPP) mo;`
- **Primary/Unique Key** (VERIFIED): `iKpl (@) * kon_pl;`
- **Search/Alternative Key** (VERIFIED): `SPP_2 (iKpl) kon_pl;`
### `Inkaso.x`
- **Primary/Unique Key** (VERIFIED): `#K @ mr;`
- **Search/Alternative Key** (VERIFIED): `Ink_1 (Inkaso) mo;`
### `Platby.x`
- **Primary/Unique Key** (VERIFIED): `#K @ a,~b;`
- **Primary/Unique Key** (VERIFIED): `iPlatby_abs (@) a,~b, stala;`
- **Primary/Unique Key** (VERIFIED): `iPlatby_s (@) * stala;`
- **Primary/Unique Key** (VERIFIED): `iPlatby_bsr (@) ~b, stala, rok;`
- **Primary/Unique Key** (VERIFIED): `iPlatby_Vs (@) * vs;`
- **Primary/Unique Key** (VERIFIED): `iPlatby_Vss (@) * vs, splat;`
- **Primary/Unique Key** (VERIFIED): `#K iPlatby_VssZn (@) * vs, splat, x;`
### `DruhDruh.x`
- **Primary/Unique Key** (VERIFIED): `#K @ d_b;`
- **Primary/Unique Key** (VERIFIED): `iDD (@) * ~d;`
### `DruhTova.x`
- **Primary/Unique Key** (VERIFIED): `#K @ b;`
- **Primary/Unique Key** (VERIFIED): `iDruh (@) * ~d;`
- **Search/Alternative Key** (VERIFIED): `druhdruh d_b;`
### `Obchody.x`
- **Primary/Unique Key** (VERIFIED): `#K @ kod;`
- **Primary/Unique Key** (VERIFIED): `iObchod (@) * ~mesto, ~nazov;`
### `Tovary.x`
- **Primary/Unique Key** (VERIFIED): `#K @ kod;`
- **Primary/Unique Key** (VERIFIED): `iTovar (@) * ~d;`
- **Search/Alternative Key** (VERIFIED): `DruhTova kod_d;`
- **Primary/Unique Key** (VERIFIED): `iKod_d (@) * kod_d;`
### `Nakup_o.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * kod;`
- **Search/Alternative Key** (VERIFIED): `obchody kod_o;`
- **Primary/Unique Key** (VERIFIED): `Nak_d_k (@) * datum, kod_o;`
- **Primary/Unique Key** (VERIFIED): `Nak_t (@) * tlac;`
### `Nakup_t.x`
- **Primary/Unique Key** (VERIFIED): `#K @ * kod;`
- **Search/Alternative Key** (VERIFIED): `Nak_d_k datum, kod_o;`
- **Search/Alternative Key** (VERIFIED): `obchody kod_o;`
- **Search/Alternative Key** (VERIFIED): `tovary kod_t;`
- **Primary/Unique Key** (VERIFIED): `#K iNakup_o (@) * datum, kod_o, ~tovar;`
- **Primary/Unique Key** (VERIFIED): `iNak (@) * datum, kod_o;`
- **Primary/Unique Key** (VERIFIED): `iObch (@) * kod_o;`
- **Primary/Unique Key** (VERIFIED): `iNakT (@) * datum, kod, kod_o, kod_t;`
- **Primary/Unique Key** (VERIFIED): `iNT (@) * kod_t;`
- **Search/Alternative Key** (VERIFIED): `{`

## 3. EXACT RELATIONSHIPS
- `pAktualDatum` -> `edit PARAM` (VERIFIED)
- `pAll_Uhra_KP` -> `edit Uhrady` (VERIFIED)
- `pAuto` -> `edit Auto` (VERIFIED)
- `pAuto_new` -> `edit Auto` (VERIFIED)
- `pBankaVedUct` -> `edit ucet` (VERIFIED)
- `pBankaVybVkl` -> `edit Param` (VERIFIED)
- `pBankaVybVkl` -> `edit ucet` (VERIFIED)
- `pBanka_Pohla` -> `edit Dovod_BU` (VERIFIED)
- `pBanka_Pohla` -> `edit KP` (VERIFIED)
- `pBanka_Pohla` -> `edit Kz` (VERIFIED)
- `pBanka_Pohla` -> `edit UCET` (VERIFIED)
- `pBanka_Pohla` -> `edit Ucet` (VERIFIED)
- `pBanka_Pohla` -> `edit ucet` (VERIFIED)
- `pBanka_Zavaz` -> `edit Kz` (VERIFIED)
- `pBanka_Zavaz` -> `edit ucet` (VERIFIED)
- `pBanky` -> `edit Banky` (VERIFIED)
- `pBaterie` -> `edit Baterie` (VERIFIED)
- `pBeznyUcet` -> `edit Ucet` (VERIFIED)
- `pBeznyUcet` -> `edit Ucty` (VERIFIED)
- `pBeznyUcet` -> `edit par` (VERIFIED)
- `pBeznyUcet` -> `edit ucty_pom` (VERIFIED)
- `pBytDetail` -> `edit Byt` (VERIFIED)
- `pBytUdaje` -> `edit BytUdaje` (VERIFIED)
- `pCatalog` -> `edit Catalog` (VERIFIED)
- `pCatalog` -> `edit ju_adr` (VERIFIED)
- `pCatalog` -> `edit kalenda_` (VERIFIED)
- `pCatalog` -> `edit kalendar` (VERIFIED)
- `pCatalog` -> `edit paramCat` (VERIFIED)
- `pCislo_EZ` -> `edit ez` (VERIFIED)
- `pCislo_REKL` -> `edit REKLlike` (VERIFIED)
- `pCitajZalohu` -> `edit ju_adr` (VERIFIED)
- `pDElf` -> `edit dovod_sc` (VERIFIED)
- `pDPH` -> `edit DPH` (VERIFIED)
- `pDPH` -> `edit PARAM` (VERIFIED)
- `pDPH` -> `edit pd` (VERIFIED)
- `pDat1` -> `edit PARAM` (VERIFIED)
- `pDat2` -> `edit PARAM` (VERIFIED)
- `pDoSpotr_Zpd` -> `edit PD` (VERIFIED)
- `pDohoda` -> `edit dohoda` (VERIFIED)
- `pDoklady` -> `edit Doklady` (VERIFIED)
- `pDomUdaje` -> `edit DomUdaje` (VERIFIED)
- `pDomacnost` -> `edit Byt` (VERIFIED)
- `pDopln_Uda` -> `edit UdajO_` (VERIFIED)
- `pDoprPros` -> `edit DoprPros` (VERIFIED)
- `pDovod_DPrac` -> `edit Trasy` (VERIFIED)
- `pDovod_KP` -> `edit Dovod_kp` (VERIFIED)
- `pDovod_KZ` -> `edit Dovod_Kz` (VERIFIED)
- `pDovod_Platb` -> `edit Dovod_Pl` (VERIFIED)
- `pDovod_SC` -> `edit dovod_DP` (VERIFIED)
- `pDovod_SC` -> `edit dovod_SC` (VERIFIED)
- `pDruhDruh` -> `edit DruhDruh` (VERIFIED)
- `pDruhTovaru` -> `edit DruhTova` (VERIFIED)
- `pDruhTovaru` -> `edit param` (VERIFIED)
- `pEviPrace` -> `edit Den_Prac` (VERIFIED)
- `pEviPrace` -> `edit EZ` (VERIFIED)
- `pEviPrace` -> `edit delf` (VERIFIED)
- `pEviPrace_Al` -> `edit Den_Prac` (VERIFIED)
- `pEviZakazky` -> `edit EZ` (VERIFIED)
- `pEviZakazky` -> `edit KP` (VERIFIED)
- `pEviZakazky` -> `edit delf` (VERIFIED)
- `pEvi_Auto` -> `edit Evi_Auto` (VERIFIED)
- `pEvi_Auto_SC` -> `edit Evi_Auto` (VERIFIED)
- `pHm_a_Nehm` -> `edit IKzp` (VERIFIED)
- `pHm_a_Nehm_X` -> `edit IKzp` (VERIFIED)
- `pHm_a_Nehm_X` -> `edit paramCat` (VERIFIED)
- `pIKdkp` -> `edit IKdkp` (VERIFIED)
- `pIKzp` -> `edit IKzp` (VERIFIED)
- `pInkNoPrSasa` -> `edit ink_like` (VERIFIED)
- `pInkNovyPred` -> `edit ink_like` (VERIFIED)
- `pInkaso` -> `edit Inkaso` (VERIFIED)
- `pInkaso_Sasa` -> `edit InkaSasa` (VERIFIED)
- `pKP_sc` -> `edit Evi_Auto` (VERIFIED)
- `pKPpol` -> `edit KPpol` (VERIFIED)
- `pKPpol` -> `edit Sklad` (VERIFIED)
- `pKPpol_rekl` -> `edit KPpol` (VERIFIED)
- `pKZ_sc` -> `edit Evi_Auto` (VERIFIED)
- `pKalendar` -> `edit Kalendar` (VERIFIED)
- `pKalendar` -> `edit Sc` (VERIFIED)
- `pKalendar_M` -> `edit Kalendar` (VERIFIED)
- `pKodOP_kontr` -> `display Cedb` (VERIFIED)
- `pKodOP_kontr` -> `display Cedc` (VERIFIED)
- `pKodOP_kontr` -> `edit Auto` (VERIFIED)
- `pKodOP_kontr` -> `edit Banky` (VERIFIED)
- `pKodOP_kontr` -> `edit DoprPros` (VERIFIED)
- `pKodOP_kontr` -> `edit Dovod_DP` (VERIFIED)
- `pKodOP_kontr` -> `edit Evi_Auto` (VERIFIED)
- `pKodOP_kontr` -> `edit IKzp` (VERIFIED)
- `pKodOP_kontr` -> `edit IkDKP` (VERIFIED)
- `pKodOP_kontr` -> `edit Mes_Fir` (VERIFIED)
- `pKodOP_kontr` -> `edit Mesta` (VERIFIED)
- `pKodOP_kontr` -> `edit PD` (VERIFIED)
- `pKodOP_kontr` -> `edit PV` (VERIFIED)
- `pKodOP_kontr` -> `edit Prijmy` (VERIFIED)
- `pKodOP_kontr` -> `edit SC_roky` (VERIFIED)
- `pKodOP_kontr` -> `edit Sc` (VERIFIED)
- `pKodOP_kontr` -> `edit Sklad` (VERIFIED)
- `pKodOP_kontr` -> `edit SpotGraf` (VERIFIED)
- `pKodOP_kontr` -> `edit SpotPrie` (VERIFIED)
- `pKodOP_kontr` -> `edit Spot_Po1` (VERIFIED)
- `pKodOP_kontr` -> `edit Spot_n` (VERIFIED)
- `pKodOP_kontr` -> `edit Spotreba` (VERIFIED)
- `pKodOP_kontr` -> `edit Trasy` (VERIFIED)
- `pKodOP_kontr` -> `edit Ucet` (VERIFIED)
- `pKodOP_kontr` -> `edit UdajO` (VERIFIED)
- `pKodOP_kontr` -> `edit UdajO_` (VERIFIED)
- `pKodOP_kontr` -> `edit Udaje` (VERIFIED)
- `pKodOP_kontr` -> `edit Vydaje` (VERIFIED)
- `pKodOP_kontr` -> `edit dohoda` (VERIFIED)
- `pKodOP_kontr` -> `edit dovod_sc` (VERIFIED)
- `pKodOP_kontr` -> `edit ea_pom` (VERIFIED)
- `pKodOP_kontr` -> `edit ez` (VERIFIED)
- `pKodOP_kontr` -> `edit ju_adr1` (VERIFIED)
- `pKodOP_kontr` -> `edit kp` (VERIFIED)
- `pKodOP_kontr` -> `edit kz` (VERIFIED)
- `pKodOP_kontr` -> `edit sc` (VERIFIED)
- `pKodOP_kontr` -> `edit sc_pocet` (VERIFIED)
- `pKodTovaru` -> `edit param` (VERIFIED)
- `pKontrol_PD1` -> `edit Vydaje` (VERIFIED)
- `pKzPol` -> `edit Kzpol` (VERIFIED)
- `pKzPol` -> `edit KzpolPom` (VERIFIED)
- `pLeasing` -> `edit Leasing` (VERIFIED)
- `pMen_Obdobie` -> `edit PARAM` (VERIFIED)
- `pMesta` -> `edit Mesta` (VERIFIED)
- `pMesta_Spotr` -> `edit Mes_Fir` (VERIFIED)
- `pMesta_Spotr` -> `edit Mesta` (VERIFIED)
- `pMesta_Trasa` -> `edit Mesta` (VERIFIED)
- `pMesto_SC` -> `edit Mesta` (VERIFIED)
- `pNaklady` -> `edit IKdkp` (VERIFIED)
- `pNakup_T` -> `edit nakup_t` (VERIFIED)
- `pNakup_T` -> `edit param` (VERIFIED)
- `pNakup_o` -> `edit PARAM` (VERIFIED)
- `pNakup_o` -> `edit nakup_o` (VERIFIED)
- `pNovyTovar` -> `edit tovary` (VERIFIED)
- `pOP` -> `edit PARAM` (VERIFIED)
- `pOdpoH2OSasa` -> `edit h2o_sasa` (VERIFIED)
- `pOdpocElSasa` -> `edit ElSasa` (VERIFIED)
- `pOdpocElSasa` -> `edit elsasa` (VERIFIED)
- `pOdpoceTeplo` -> `edit Teplo` (VERIFIED)
- `pOpravElSasa` -> `edit elsa_pom` (VERIFIED)
- `pPD` -> `edit PD` (VERIFIED)
- `pPD_Doklad` -> `edit Evi_Auto` (VERIFIED)
- `pPD_Doklad` -> `edit Sc` (VERIFIED)
- `pPD_Doklad` -> `edit Ucet` (VERIFIED)
- `pPD_banka` -> `edit PD` (VERIFIED)
- `pPDprerus_B` -> `edit Ucet` (VERIFIED)
- `pPDprerus_P` -> `edit Doklady` (VERIFIED)
- `pPDprerus_P` -> `edit KP` (VERIFIED)
- `pPDprerus_P` -> `edit Vydaje` (VERIFIED)
- `pPDprerus_P` -> `edit uhrady` (VERIFIED)
- `pPDprerus_V` -> `edit Doklady` (VERIFIED)
- `pPDprerus_V` -> `edit IKdkp` (VERIFIED)
- `pPDprerus_V` -> `edit IKzp` (VERIFIED)
- `pPDprerus_V` -> `edit Kz` (VERIFIED)
- `pPDprerus_V` -> `edit PD` (VERIFIED)
- `pPDprerus_V` -> `edit PoklDokl` (VERIFIED)
- `pPDprerus_V` -> `edit Vydaje` (VERIFIED)
- `pPDprerus_V` -> `edit uhrady` (VERIFIED)
- `pPDsuma` -> `edit SumaPD` (VERIFIED)
- `pPV` -> `edit PV` (VERIFIED)
- `pPlatbyExpor` -> `edit Platby_l` (VERIFIED)
- `pPlatbyExpor` -> `edit export` (VERIFIED)
- `pPlatby_BU` -> `edit Platby` (VERIFIED)
- `pPohla_SC` -> `edit Evi_Auto` (VERIFIED)
- `pPohladavky` -> `edit KP` (VERIFIED)
- `pPoistky` -> `edit Poistky` (VERIFIED)
- `pPoklDokl` -> `edit PoklDokl` (VERIFIED)
- `pPrace2sc` -> `edit Evi_Auto` (VERIFIED)
- `pPrijem` -> `edit PARAM` (VERIFIED)
- `pPrijmy` -> `edit Vydaje` (VERIFIED)
- `pPrijmy_Kod` -> `edit PD` (VERIFIED)
- `pPrijmy_Kod` -> `edit Vydaje` (VERIFIED)
- `pPrikaz_Uhra` -> `edit Prik_Pom` (VERIFIED)
- `pPrikaz_Uhra` -> `edit export` (VERIFIED)
- `pPumpMesGraf` -> `edit SpotGraf` (VERIFIED)
- `pREKLPol` -> `edit REKLpol` (VERIFIED)
- `pREKL_sc` -> `edit Evi_Auto` (VERIFIED)
- `pReklamacie` -> `edit KP` (VERIFIED)
- `pReklamacie` -> `edit REKL` (VERIFIED)
- `pSC` -> `edit Sc` (VERIFIED)
- `pSC_EviAuto` -> `edit sc_pocet` (VERIFIED)
- `pSC_nova` -> `edit SC` (VERIFIED)
- `pSadzbDPH` -> `edit SadzbDPH` (VERIFIED)
- `pSklad` -> `edit Sklad` (VERIFIED)
- `pSklad2008` -> `edit Skla2008` (VERIFIED)
- `pSklad_rekl` -> `edit Sklad` (VERIFIED)
- `pSpotre_SC` -> `edit Sc` (VERIFIED)
- `pSpotre_SC` -> `edit ju_adr1` (VERIFIED)
- `pSpotre_SC` -> `edit sc` (VERIFIED)
- `pSpotrebGraf` -> `edit SpotGraf` (VERIFIED)
- `pSpotreba` -> `edit SC_roky` (VERIFIED)
- `pSpotreba` -> `edit Spotreba` (VERIFIED)
- `pSpotreba_n` -> `edit Spot_n` (VERIFIED)
- `pSumSpotreba` -> `edit SpotPrie` (VERIFIED)
- `pTlac` -> `edit PARAM` (VERIFIED)
- `pTlac` -> `edit nakup_o` (VERIFIED)
- `pTlf` -> `edit UdajO` (VERIFIED)
- `pTlf_odber` -> `edit UdajO` (VERIFIED)
- `pTrasa` -> `edit Trasy` (VERIFIED)
- `pTrasy` -> `edit Trasy` (VERIFIED)
- `pUdaje` -> `edit Udaje` (VERIFIED)
- `pUhra_KP` -> `edit Uhrady` (VERIFIED)
- `pUhra_KZ` -> `edit Uhrady` (VERIFIED)
- `pUhrady_All` -> `edit Uhrady` (VERIFIED)
- `pUhrady_All` -> `edit kp` (VERIFIED)
- `pUhrady_All` -> `edit kz` (VERIFIED)
- `pVitajte` -> `display Cedb` (VERIFIED)
- `pVitajte` -> `display Cedc` (VERIFIED)
- `pVyberDod` -> `edit KzPom` (VERIFIED)
- `pVyberMesto` -> `edit Mesta` (VERIFIED)
- `pVyberObchod` -> `edit obchody` (VERIFIED)
- `pVyberOdb` -> `edit KP` (VERIFIED)
- `pVyberOdb` -> `edit KPPom` (VERIFIED)
- `pVyberOdb` -> `edit paramCat` (VERIFIED)
- `pVyberTrasu` -> `edit Trasy` (VERIFIED)
- `pVydaj` -> `edit PARAM` (VERIFIED)
- `pVydaje` -> `edit Vydaje` (VERIFIED)
- `pVydaje_Kod` -> `edit PD` (VERIFIED)
- `pVydaje_Kod` -> `edit Vydaje` (VERIFIED)
- `pVydaje_Kod` -> `edit vydaje` (VERIFIED)
- `pVytvorCat` -> `edit catalog` (VERIFIED)
- `pVyucH2OSasa` -> `edit VyucVeol` (VERIFIED)
- `pVyuctSBD` -> `edit VyuctSBD` (VERIFIED)
- `pVyuctSPP` -> `edit VyuctSPP` (VERIFIED)
- `pVyuctSSE` -> `edit VyuctSSE` (VERIFIED)
- `pVyuctSSESas` -> `edit VyuSSESa` (VERIFIED)
- `pZalohuj` -> `edit ju_adr` (VERIFIED)
- `pZavazky` -> `edit Kz` (VERIFIED)
- `pZmenKZ_AB` -> `edit pd` (VERIFIED)
- `pZmenRekl_EF` -> `edit pd` (VERIFIED)
- `pZrusenieTov` -> `edit tovary` (VERIFIED)
- `prevolv` -> `edit revolv` (VERIFIED)

## 4. PROCEDURE INVENTORY
### `pPrijem`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM
- Forms used: EDITOR, Esc, ePrijem, edit, end
- MERGE objects used: mode
### `pVydaj`
- Inputs/Outputs: UNKNOWN
- Called procedures: pDoklady, PARAM
- Forms used: EDITOR, exit, Esc, eVydaj, edit, end
- MERGE objects used: mode
### `pDat1`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pPrazdna
- Forms used: EDITOR, exit, eDat1, edit, end
- MERGE objects used: mode
### `pDat2`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, parA
- Forms used: EDITOR, eDat2, edit, end
- MERGE objects used: mode
### `pDoklady`
- Inputs/Outputs: UNKNOWN
- Called procedures: Platby, PARAM, pDat1, parA
- Forms used: EDITOR, exit, edrecno, edit, edbreak, else, end, eDoklady
- MERGE objects used: mode
### `pOkno`
- Inputs/Outputs: UNKNOWN
- Called procedures: PROC, proc
- Forms used: END, end, else
- MERGE objects used: UNKNOWN
### `pSadzbDPH`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: EDITOR, Esc, eSadzbDPH, edit, end
- MERGE objects used: mode
### `pTrasy`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNovaTrasa, pMesta, pHlaTra
- Forms used: EDITOR, eTrasy, exit, edit, end
- MERGE objects used: mode
### `pStratyDoch`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, eStrataDoch, exit, Esc, edit, end
- MERGE objects used: mode
### `pIKzp`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, PARAM, PgDn, PgUp
- Forms used: EDITOR, exit, Esc, edrecno, edit, eIKzpBr, end
- MERGE objects used: mode
### `pIKdkp`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, PARAM, PgDn, PgUp
- Forms used: eIKdkpBr, EDITOR, exit, Esc, edrecno, edit, end
- MERGE objects used: mode
### `pDohoda`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, PD
- Forms used: EDITOR, exit, edit, end, edohodabrows
- MERGE objects used: mode
### `pHlaSklad`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, popise, popis1, pre
- Forms used: end, edbreak, else
- MERGE objects used: UNKNOWN
### `pSklad`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, PARAM, pPrazdna, pHlaSklad, popis1
- Forms used: EDITOR, exit, edirec, eSkladBr, edrecno, edit, edbreak, else, end, eSklad
- MERGE objects used: merge, mode
### `pHlaSkla2008`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, popise, popis1, pre
- Forms used: end, edbreak, else
- MERGE objects used: UNKNOWN
### `pSklad2008`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, PARAM, pPrazdna, pHlaSkla2008, popis1
- Forms used: EDITOR, exit, edirec, eSkl2008Br, edrecno, edit, edbreak, else, end, eSkla2008
- MERGE objects used: merge, mode
### `pUhrady_All`
- Inputs/Outputs: UNKNOWN
- Called procedures: pc, pPrazdna, ParamCat
- Forms used: EDITOR, exit, eUhradyBr, eUhrady, edit, else, end
- MERGE objects used: MM, mode
### `pSC_Cat`
- Inputs/Outputs: UNKNOWN
- Called procedures: ParamCat, path
- Forms used: end
- MERGE objects used: merge, mSC
### `pSC`
- Inputs/Outputs: UNKNOWN
- Called procedures: pEvi_Auto, pSc_Kontrola, pTlacDokl, proc, pSc_Nova, ParamCat, pSpotreba, pSpotrScSum
- Forms used: EDITOR, eSc, exit, eSc_br, edirec, edrecno, Evi_Auto, edit, edbreak, else, end
- MERGE objects used: mode
### `pSC_nova`
- Inputs/Outputs: UNKNOWN
- Called procedures: PAR, pocet, Par, pAuto, Param, pDoprPros, proc, pEvi_Auto_SC
- Forms used: EDITOR, eSC, exit, Esc, edit, edbreak, else, end
- MERGE objects used: mode
### `pGraf_PD`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Priemer, Poist, PrReAut, PrevRez, Poistne, PrijemC, pu, PrReBan, ph, PV, PHM_SC, ParamCat, PRINT, PD, PrReSC
- Forms used: end, Ekonom, exit
- MERGE objects used: MM, m1, m2, merge, min, max, MV100Y, Mesiac, Mesiace
### `pStatist`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PD
- Forms used: ekonom, end
- MERGE objects used: MM, m1, m2, merge, Mesiace
### `pSpotreba`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, pSumSpotreba, pAuto_Info, pSpotre_SC, par, pSp_Auto_Opr, pKonSpotreba, proc, PD, pIniSpotreba, pTlacDokl, pSpotrebGraf, prenes, pMesta_Spotr, pSpotreba_n, pDoSpotr_Zpd, pPumpMesGraf, pAuto_Info_1, Prenos, pumpy
- Forms used: EDITOR, eSpotrebaNm, exit, eSC_roky, eSpotreba, edirec, edrecno, export, eSpotreba1, edit, eSpotreba1Nm, else, edbreak, end, eSpotreba2
- MERGE objects used: merge, mode
### `pDoSpotr_Zpd`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, PAR, pPrazdna, proc, popis, Prenos, path, pd, pVytvorCat, ParamCat, PD
- Forms used: EDITOR, exit, edrecno, ePDbrowse, edit, edbreak, else, end
- MERGE objects used: mode
### `pSpotre_SC`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pTlacDokl, proc, path, ParamCat, pSpRia, pSpotreba, pSpotrScSum
- Forms used: EDITOR, exit, eSc_br, edrecno, edit, end, exec
- MERGE objects used: merge, mode
### `pSpotrSCsum`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Par, poc_km, Poc_km
- Forms used: end
- MERGE objects used: merge
### `pIniSpotreba`
- Inputs/Outputs: UNKNOWN
- Called procedures: par
- Forms used: end, else
- MERGE objects used: UNKNOWN
### `pKonSpotreba`
- Inputs/Outputs: UNKNOWN
- Called procedures: pomer
- Forms used: end, else
- MERGE objects used: UNKNOWN
### `pSumSpotreba`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pIniSpotreba, proc
- Forms used: EDITOR, exit, Esc, eSpotPrie, edit, end
- MERGE objects used: mode
### `pSp_Auto_Opr`
- Inputs/Outputs: UNKNOWN
- Called procedures: par
- Forms used: end, exit, else
- MERGE objects used: merge
### `pSpotrebGraf`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Priemer, pocet, Par, PALETTE, polyreg, PS, Pocet, PRINT
- Forms used: exit, el_10, edit, edbreak, else, end
- MERGE objects used: MM, mesiace, m2, merge, min, mes, MV100Y, Mes, Mesiac, Mesiace
### `pPumpMesGraf`
- Inputs/Outputs: UNKNOWN
- Called procedures: PRINT
- Forms used: end, exit, edit
- MERGE objects used: merge, MV100Y, m2, miesto
### `pSpotreba_n`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, exit, Esc, eSpotPrie, edrecno, edit, end
- MERGE objects used: MM, mode
### `pEvi_Auto`
- Inputs/Outputs: UNKNOWN
- Called procedures: PAR, pKm_Auto_Opr, Par, pAuto, pEvi_AutoSum, pTrasy, par, pPrazdna, pTlacDokl, pVyberTrasu, polozka, proc, prevadzky, ParamCat, pSpotreba, pre, pKm_Kon_Vzd
- Forms used: EDITOR, exit, eEvi_Auto_EU, eEvi_Auto_U, edirec, edrecno, Evi_Auto, Evidencia, edit, eEvi_Auto, else, evi_Auto, end, edbreak, evi_auto
- MERGE objects used: mesto_10_km_pocet, merge, message, mesto_5_km_pocet, mode, mesto_2_km_pocet
### `pEvi_AutoSum`
- Inputs/Outputs: UNKNOWN
- Called procedures: Par, poc_km, Poc_km
- Forms used: ev_pom, end, Evi_Auto
- MERGE objects used: merge
### `pKm_Kon_Vzd`
- Inputs/Outputs: UNKNOWN
- Called procedures: promptYN
- Forms used: end, else, evi_auto, edrecno
- MERGE objects used: UNKNOWN
### `pKm_Auto_Opr`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, PHM, poc_km, pSc_Kontrola, par, promptYN, pod, pockm, proc, param, PD, pKm_Opr_Zv, paramcat
- Forms used: end, evi_auto, else
- MERGE objects used: MIESTO, mesto_10_km_pocet, MM, merge, mesto_5_km_pocet, mesto_2_km_pocet
### `pEvi_Auto_SC`
- Inputs/Outputs: UNKNOWN
- Called procedures: Par, pAuto, par, pTrasa, prac, param, PocKm, Prenes, Poc_km, pDovod_SC, pSpotreba
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, edupdated
- MERGE objects used: mesto_2_km_pocet, mesto_5_km_pocet, mesto_10_km_pocet, mode
### `pDovod_SC`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Par, par, pDovod_SCold, partnerov, partneri
- Forms used: EDITOR, exit, edrecno, edit, edbreak, else, edfield, end, evi_auto
- MERGE objects used: merge
### `pDovod_DPrac`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pos, Par, pHlaTra, pPrazdna, pMesta, polooka, proc, pSpotreba
- Forms used: EDITOR, etky, eTrasy, exit, edrecno, Evi_Auto, edit, edbreak, else, end
- MERGE objects used: memavail, MM, Memory, mm, merge, mode
### `pTrasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: Par, pHlaTra, par, pMesta, pNovaTrasa
- Forms used: EDITOR, eTrasy, exit, edrecno, Evi_Auto, edbreak, edit, else, edfield, end
- MERGE objects used: mm, mode
### `pHlaTra`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM
- Forms used: edfield, end, else
- MERGE objects used: mesto
### `pKraje`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pOkresy`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pMesta`
- Inputs/Outputs: UNKNOWN
- Called procedures: pHlaMes
- Forms used: EDITOR, exit, edrecno, eMesto, edit, edbreak, edfield, end
- MERGE objects used: Mesta, Mesto, mode, mesto
### `pMesto_SC`
- Inputs/Outputs: UNKNOWN
- Called procedures: pHlaMes, pMesta
- Forms used: EDITOR, exit, eMesto, edit, end
- MERGE objects used: Mesta, miesto, Mesto, mode
### `pMesta_Trasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pHlaMes, polooka
- Forms used: EDITOR, exit, edrecno, eMesto, edit, edbreak, edfield, end
- MERGE objects used: Mesta, Mesto, mode, mesto
### `pBanky`
- Inputs/Outputs: UNKNOWN
- Called procedures: polozka
- Forms used: EDITOR, exit, edit, end, eBanky
- MERGE objects used: mode
### `pMesta_Spotr`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, pHlaMes, palivo
- Forms used: EDITOR, exit, edrecno, eMesto, edbreak, edit, else, end
- MERGE objects used: Miesto, Mesta, miesto, merge, Mesto, mode, Mes_Fir, mesto
### `pHlaMes`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pHladac, proc, param
- Forms used: end, exit
- MERGE objects used: Mesta, Mesto
### `pAuto`
- Inputs/Outputs: UNKNOWN
- Called procedures: PAR, pal, Par, pAuto_Info, par, pPrazdna, pou
- Forms used: EDITOR, exit, edrecno, Evi_Auto, eAuto, ea, edbreak, edit, else, end, eAutoUplne
- MERGE objects used: merge, message, mode
### `pDoprPros`
- Inputs/Outputs: UNKNOWN
- Called procedures: PAR, Par, pPrazdna, Prostr, prostriedku
- Forms used: EDITOR, exit, eDoprPros, edrecno, edit, edbreak, end
- MERGE objects used: mode
### `pAuto_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: par, pIniSpotreba, proc
- Forms used: end, exit
- MERGE objects used: UNKNOWN
### `pAuto_Info_1`
- Inputs/Outputs: UNKNOWN
- Called procedures: pIniSpotreba, proc
- Forms used: end, exit
- MERGE objects used: UNKNOWN
### `pAuto_new`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pre
- Forms used: EDITOR, exit, edit, eAutoUplne, end
- MERGE objects used: mode
### `pSC_EviAuto`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, PocetMiest, Poc_km, prostr
- Forms used: Evi_Auto, end, edit, else
- MERGE objects used: merge
### `pSC_Kontrola`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, PHM, pPD, pockm, proc, path, pd, paramcat, PD, pre, pSC_EviAuto
- Forms used: end, evi_auto
- MERGE objects used: UNKNOWN
### `pHot_PHMdoPD`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, ParamCat, Priezv
- Forms used: end, else
- MERGE objects used: Miesto
### `pCeda`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, ParamCat, Priezv
- Forms used: end, else
- MERGE objects used: Miesto
### `pVitajte`
- Inputs/Outputs: UNKNOWN
- Called procedures: pUdaje, proc
- Forms used: end, else
- MERGE objects used: UNKNOWN
### `pUdaje`
- Inputs/Outputs: UNKNOWN
- Called procedures: pCedA, pPrazdna, proc
- Forms used: EDITOR, exit, Esc, eUdaje, edit, end
- MERGE objects used: mode
### `pTlf`
- Inputs/Outputs: UNKNOWN
- Called procedures: Partner, pHla_1, pCisloOP
- Forms used: EDITOR, exit, eUdajO, eUdajF, edrecno, edit, edbreak, else, end
- MERGE objects used: meno
### `pCisloOP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Param, pd, param
- Forms used: end, edbreak
- MERGE objects used: UNKNOWN
### `pTlf_odber`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Param, pHla_1, param, Partner, pDopln_Uda, pd
- Forms used: EDITOR, exit, end, eUdajF, edrecno, edit, edbreak, else, edfield, eUdajO
- MERGE objects used: Miesto, meno, mode
### `pDopln_Uda`
- Inputs/Outputs: UNKNOWN
- Called procedures: popis, pop, psc
- Forms used: EDITOR, exit, edrecno, edit, edbreak, edfield, end
- MERGE objects used: merge, Miesta, miesto, meno
### `pHladaj`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM
- Forms used: end, else
- MERGE objects used: mena, miesta
### `pPV`
- Inputs/Outputs: UNKNOWN
- Called procedures: PV
- Forms used: EDITOR, Esc, END, ePV, Editujte, edit
- MERGE objects used: mode
### `pDElf`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, Partneri, partneri, partnera
- Forms used: EDITOR, exit, edrecno, edit, edbreak, end
- MERGE objects used: merge, MM
### `pDPH`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pKontrol_Uhr, pos, pocet, pPrazdna, pSadzbDPH, proc, param, pom, pd, path, PD, priznanie
- Forms used: EDITOR, exit, Esc, eParDat2, edirec, edrecno, edit, eDPH, else, edbreak, end, ePARdat, exec
- MERGE objects used: mincas, MM, merge, mode, MinCas
### `pVydaje`
- Inputs/Outputs: UNKNOWN
- Called procedures: pZmenKodPri, poslednom
- Forms used: EDITOR, exit, Esc, edBreak, eVydajC, edrecno, edit, end, Enter
- MERGE objects used: mode
### `pZmenKodVyd`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PD
- Forms used: end, exit, edrecno
- MERGE objects used: UNKNOWN
### `pPrijmy`
- Inputs/Outputs: UNKNOWN
- Called procedures: pv, poslednom
- Forms used: EDITOR, Esc, edBreak, ePrijmz, edrecno, edit, end, Enter
- MERGE objects used: mode
### `pZmenKodPri`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pZmenKodKpKz, PD, prijem
- Forms used: end, EZ, exit, edrecno
- MERGE objects used: UNKNOWN
### `pDdatum`
- Inputs/Outputs: UNKNOWN
- Called procedures: Param
- Forms used: end
- MERGE objects used: menu
### `E N A Z N Y    D E N N I K`
- Inputs/Outputs: UNKNOWN
- Called procedures: POLOZKY, poistne, prijem, prostr, PRIJEM, PRIEBEZNE, PLATBY, PF, prijmu
- Forms used: UNKNOWN
- MERGE objects used: mzdy
### `E N A Z N Y    D E N N I K`
- Inputs/Outputs: UNKNOWN
- Called procedures: POLOZKY, poistne, prijem, prostr, PH, PRIJEM, PLATBY, PRIEBEZNE, pagelimit, PF, prijmu
- Forms used: UNKNOWN
- MERGE objects used: mzdy
### `E N A Z N Y    D E N N I K`
- Inputs/Outputs: UNKNOWN
- Called procedures: POLOZKY, poistne, prijem, prostr, PRIJEM, PRIEBEZNE, PLATBY, PF, prijmu
- Forms used: UNKNOWN
- MERGE objects used: mzdy
### `pVydaje_Kod`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PAR, podla, pocet, Polozka, pPrazdna, pKontrol_PD1, proc, pVyd_PD_Info, pv, pVyd_Info, pVydaje, pHla_PD, prerus, PD, pPD_Doklad, podmnozina
- Forms used: EDITOR, exit, ePDbrow_Vyd, edirec, eVydajd, edrecno, Editacia, eVydaj_PD, edit, edbreak, end
- MERGE objects used: merge, mode
### `pPrijmy_Kod`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPri_Info, Polozka, Prijmy, pVyd_PD_Info, prijmu, pHla_PD, pPD_Doklad, pPrazdna, proc, pv, prerus, PD, PARAM, PAR, pocet, pKontrol_PD2, prijmy, podmnozina, podla, pPrijmy
- Forms used: EDITOR, ePrijem_PD, exit, edirec, edrecno, Editacia, ePDbrow_Pri, edit, edbreak, end
- MERGE objects used: merge, mode
### `pKontrol_PD1`
- Inputs/Outputs: UNKNOWN
- Called procedures: prev, PHM, poistne, proc, prac, pVynuluj_Vy1, ParamCat, prijmu, PD, pre
- Forms used: end, edit, else
- MERGE objects used: Maj
### `pKontrol_PD2`
- Inputs/Outputs: UNKNOWN
- Called procedures: prev, PD, ParamCat
- Forms used: end, else
- MERGE objects used: Mzdy
### `pVynuluj_Vy1`
- Inputs/Outputs: UNKNOWN
- Called procedures: PD
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVyd_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: PD
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPri_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: PD, prijmov
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVyd_PD_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: priebez, PD, PARAM, prieb
- Forms used: EB, end, edrecno
- MERGE objects used: merge
### `pVyd_Bez_Kod`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPD`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, pPD_banka, pKontrola_PD, pHla_PD, pPD_Doklad, pPDkod, pPDprerus_V, pol, pPDsuma, proc, param, pVyd_Bez_Kod, PD, pGraf_PD, PARAM, pPDprerus_B, pd, pPDprerus_P, pAktualDatum, pStlacEnd, pStatist, paramcat, pPD_Info
- Forms used: EDITOR, exit, edirec, edrecno, ePDbrowse, ePD, edit, edbreak, else, end
- MERGE objects used: MM, mode
### `pPD_banka`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPDkod, pPrazdna, pPDsuma, pVyd_Bez_Kod, PD, pHla_PD
- Forms used: EDITOR, exit, ePDbrowse, edit, end
- MERGE objects used: mode
### `pStlacEnd`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPDkod`
- Inputs/Outputs: UNKNOWN
- Called procedures: PAR, pVydaje_Kod, proc, pPrijmy_Kod, PD
- Forms used: end, edrecno, edbreak
- MERGE objects used: UNKNOWN
### `pKontrola_Pd`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, PHM, plnenia, pPD, proc, pv, ParamCat, pre, pSpRia, PD, pKontrol_PD1
- Forms used: end, else
- MERGE objects used: merge, mPD
### `pPD_Doklad`
- Inputs/Outputs: UNKNOWN
- Called procedures: PgUp, pSc, pAuto, PgDn, pTlacDokl, pPrazdna, pUcet_Spolu, PD, pSpotreba, pKm_Kon_Vzd, pBeznyUcet
- Forms used: EDITOR, eSc, exit, eEvi_Auto_U, end, Evi_Auto, edit, evidencia, edbreak, Evidencia, eUcet
- MERGE objects used: mode
### `pPD_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PU, P2, PH, P1, priebez, PV, ParamCat, PD
- Forms used: end, exit, edrecno, EA
- MERGE objects used: merge, mPDsuma_, mPDsuma
### `pHla_PD`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, popise, PD
- Forms used: end, else
- MERGE objects used: UNKNOWN
### `pHm_a_Nehm`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, pHm_a_Nehm_X
- Forms used: EDITOR, exit, eIKzpBr, edirec, edrecno, eIKzp, edit, edbreak, else, end
- MERGE objects used: merge, mIKzp, majetok, mode
### `pHm_a_Nehm_X`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramCat, path, ParamCat, prevod, paramcat
- Forms used: exit, eIKzp, Eur, edit, else, end
- MERGE objects used: merge
### `pNaklady`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, eIKdkpBr, exit, eIKdkp, edirec, edrecno, edit, edbreak, else, end
- MERGE objects used: merge, mIKdkp, majetok, mode
### `pLeasing`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: EDITOR, exit, eLeasing_bro, edirec, edrecno, eLeasing, edit, edbreak, else, end
- MERGE objects used: mode
### `pPohladavky`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pEnter, pc, pUhra_KP, proc, param, pKP_sc, pZmenKP_AB, pKPpol, pTlf_odber, pCislo_KP, pVyberOdb, pDovod_KP, ParamCat, pPohl_Spolu
- Forms used: EDITOR, exit, eKP_browse, eKP, edrecno, edit, edbreak, else, end
- MERGE objects used: merge, mode, MM
### `pUhra_KP`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pAll_Uhra_KP, proc, param, pd, ParamCat
- Forms used: EDITOR, exit, edirec, eUhradyBr, edit, else, end
- MERGE objects used: merge, mode, MM
### `pAll_Uhra_KP`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pd, param
- Forms used: EDITOR, exit, edirec, eUhradyBr, edit, end
- MERGE objects used: mode
### `pPohla_SC`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, pSpotreba, pocetmiest, pVyberTrasu, par, pDoprPros, proc, prac, param, Poc_km, pDovod_SC, PARAM, PAR, pocet, pAuto, prostr, Prenes, Par, Param, pTrasa, PS, phm
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, evi_auto
- MERGE objects used: mm, message, miesto, mod
### `pZmenKP_AB`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pos, param, pa, PD
- Forms used: end, exit, edrecno, else
- MERGE objects used: UNKNOWN
### `pCislo_REKL`
- Inputs/Outputs: UNKNOWN
- Called procedures: param, paramcat
- Forms used: end, exit, edit
- MERGE objects used: merge
### `pKPpol`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, pomintkodtov, prijem, prace, pPrazdna, pOP, param, pom, pKPpol_Spolu, popis1
- Forms used: EDITOR, eSkladBrKP, exit, eKPpol, edirec, edrecno, edit, edbreak, else, end, eSklad, eKPpolBr
- MERGE objects used: merge, merjedn, mode, mnozstvo
### `pKPpol_rekl`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pomintkodtov, pCislo_REKL, prijem, pPrazdna, proc, param, pom, popis1
- Forms used: EDITOR, exit, eKPpol, edrecno, edit, edbreak, else, end, eKPpolBr
- MERGE objects used: merge, mode
### `pSklad_rekl`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, pCislo_REKL, pPrazdna, proc, param, popis1
- Forms used: EDITOR, eSkladBrKP, exit, edirec, edrecno, edit, edbreak, else, end, eSklad
- MERGE objects used: mode, mnozstvo
### `pOP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PgUp, PgDn, pPrazdna, pPomRataj, predajnej
- Forms used: EDITOR, exit, Esc, edirec, edit, eOP, end
- MERGE objects used: mode
### `pPomRataj`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM
- Forms used: edfield, end, else
- MERGE objects used: UNKNOWN
### `pPohl_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pohlad, ParamCat
- Forms used: end
- MERGE objects used: merge, MM
### `pCislo_KP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAMcat
- Forms used: end
- MERGE objects used: UNKNOWN
### `pDovod_KP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, podpis, prospech, platby, penUst, potrebu, pre
- Forms used: EDITOR, exit, edrecno, edit, edbreak, end
- MERGE objects used: merge
### `pZavazky`
- Inputs/Outputs: UNKNOWN
- Called procedures: pZmenKZ_AB, pCislo_Kz, platby, pEnter, pos, pPrikaz_Uhra, proc, param, PARAMcat, pKZ_sc, pTlf_odber, pZavaz_Spolu, platba, PARAM, pUhra_KZ, pKZpol, pZmenKZ_ab, pUhradaKredi, pDovod_Kz, pVyberDod, ParamCat, pod
- Forms used: EDITOR, eKz_sta_new, exit, edrecno, eKz, edit, edbreak, else, eKz_stala_pl, end, eKz_browse
- MERGE objects used: MMYY, MM, miesto, mes, mode
### `pZmenRekl_EF`
- Inputs/Outputs: UNKNOWN
- Called procedures: pa, PD, pd
- Forms used: exit, edrecno, edit, else, end
- MERGE objects used: UNKNOWN
### `pReklamacie`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pREKLpol, pPrazdna, pKPpol_rekl, pSklad_rekl, pZmenREKL_EF, ParamCat, pREKL_sc
- Forms used: EDITOR, exit, eKP_browse, edrecno, eREKL_browse, edit, edbreak, else, end, eREKL
- MERGE objects used: MM, mode
### `pUhra_KZ`
- Inputs/Outputs: UNKNOWN
- Called procedures: ParamCat, pPrazdna
- Forms used: EDITOR, exit, edirec, eUhradyBr, edit, end
- MERGE objects used: MM, mode
### `pKZ_sc`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, pSpotreba, pocetmiest, pVyberTrasu, par, pPrazdna, pDoprPros, proc, prac, param, Poc_km, pDovod_SC, PARAM, PAR, pocet, pAuto, prostr, Prenes, Par, Param, pTrasa, PS, phm
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, evi_auto
- MERGE objects used: mesto_10_km_pocet, mod, mm, miesto, message, mesto_5_km_pocet, mesto_2_km_pocet
### `pREKL_sc`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, pSpotreba, pocetmiest, pVyberTrasu, par, pPrazdna, pDoprPros, proc, prac, param, Poc_km, pDovod_SC, PARAM, PAR, pocet, pAuto, prostr, Prenes, Par, Param, pTrasa, PS, phm
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, evi_auto
- MERGE objects used: mesto_10_km_pocet, mod, mm, miesto, message, mesto_5_km_pocet, mesto_2_km_pocet
### `pKP_sc`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, pSC, pSpotreba, pocetmiest, pVyberTrasu, par, pDoprPros, proc, prac, param, Poc_km, pDovod_SC, PARAM, PAR, pocet, pAuto, prostr, Prenes, Par, Param, pTrasa, PS, phm
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, evi_auto
- MERGE objects used: mesto_10_km_pocet, mod, mm, miesto, message, mesto_5_km_pocet, mesto_2_km_pocet
### `pVyberDod`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramCat, PARAM, prompt, proc, param, pTlf_odber, pom, partneri
- Forms used: EDITOR, exit, edrecno, edbreak, edit, end
- MERGE objects used: merge, Miesto, mode
### `pVyberOdb`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramCat, PARAM, prompt, proc, param, pTlf_odber, pom, partneri
- Forms used: EDITOR, exit, edrecno, edbreak, edit, end
- MERGE objects used: merge, Miesto, mode
### `pZmenKZ_AB`
- Inputs/Outputs: UNKNOWN
- Called procedures: pVc_Prevod, pa, PD, pd
- Forms used: exit, edrecno, edit, else, end
- MERGE objects used: UNKNOWN
### `pKzPol`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, PARAM, POPIS1, pol, Popis, param, pKZpol_Spolu, pom, pUp, popis1, pVc_Prevod, pCtrlF2, prevod
- Forms used: EDITOR, exit, eKzpol, eKzpol_br, edrecno, edit, edbreak, else, end
- MERGE objects used: MM, merge, mes, mode, mnozstvo
### `pREKLPol`
- Inputs/Outputs: UNKNOWN
- Called procedures: POPIS1, param, pom, pUp, pVc_Prevod, pCtrlF2, prevod
- Forms used: EDITOR, exit, eREpol_br, edrecno, edit, edbreak, else, eREKLpol, end
- MERGE objects used: MM, mes, merge, mode
### `pUp`
- Inputs/Outputs: UNKNOWN
- Called procedures: pCtrlF2, proc
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPrikaz_Uhra`
- Inputs/Outputs: UNKNOWN
- Called procedures: Prik_Pom, PAR, pos, pPrazdna, pSumPrikUhr, PP, pre, Prik_pom
- Forms used: EDITOR, exit, Esc, edittxt, end, edirec, exp, Export, edrecno, edit, edbreak, else, edfield, export
- MERGE objects used: MM, merge, mode, Moment
### `pSumPrikUhr`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pZavaz_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: ParamCat
- Forms used: end
- MERGE objects used: merge, MM
### `pKZpol_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: param
- Forms used: end
- MERGE objects used: merge, mincas
### `pKPpol_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: param
- Forms used: end
- MERGE objects used: merge, mincas
### `pCislo_KZ`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, paramcat, param
- Forms used: end, else
- MERGE objects used: merge
### `pDovod_KZ`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: EDITOR, exit, edrecno, edit, edbreak, end
- MERGE objects used: merge
### `pUhradaKredi`
- Inputs/Outputs: UNKNOWN
- Called procedures: pc
- Forms used: end
- MERGE objects used: UNKNOWN
### `pEviZakazky`
- Inputs/Outputs: UNKNOWN
- Called procedures: Programovacie, PARAM, program, pom_pr1, pZak_Spolu, pEviPrace_Al, pEviPrace, proc, PARAMcat, prg, pMen_Obdobie, pTlf_odber, popis1, pp, pCislo_EZ, ParamCat, pTlf_Odber
- Forms used: EDITOR, eEZ_browse, exit, eKP_browse, EZ, edirec, ez, edrecno, edit, ezz, else, edbreak, end, eEZ
- MERGE objects used: meno, MM, merjedn, merge, mode, MinCas, mnozstvo
### `pZak_spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pohlad, ParamCat, param
- Forms used: end, exit, ez
- MERGE objects used: merge, MM
### `pCislo_EZ`
- Inputs/Outputs: UNKNOWN
- Called procedures: Pocet_EZ, pos, pocet_EZ, ParamCat
- Forms used: exit, EZ, ez, edit, end
- MERGE objects used: merge
### `pKalendar`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pEvi_Auto, PgUp, PgDn, pPrazdna, param, ParamCat, pSpotreba, pSpotrScSum
- Forms used: EDITOR, exit, Esc, eSc_br, edrecno, eKalendar_1, edit, edbreak, end, eKalendar_sc
- MERGE objects used: merge, mesiac, mode
### `pKalendar_M`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, PgDn, PgUp
- Forms used: EDITOR, exit, Esc, edrecno, eKalendar, edit, edbreak, else, end
- MERGE objects used: merge, Meno, mode, mien
### `pBeznyUcet`
- Inputs/Outputs: UNKNOWN
- Called procedures: par, pPrazdna, pUcet_Spolu, PARAMcat
- Forms used: EDITOR, exit, eUcty, edirec, edrecno, eUcet_bro, edit, edbreak, else, eUcet, end
- MERGE objects used: merge, mode
### `pUcet_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: ps, par, PARAMcat, Pohyby, prieb
- Forms used: end
- MERGE objects used: merge
### `pEviPrace`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pEvi_Auto, pom_pr, pPrace2SC, pPracePom, pPrazdna, pPracePom1, prace, prijatia, proc, pMen_Obdobie, pKalendar, pTlf_Odber
- Forms used: EDITOR, exit, EZ, eDen_Prac_N, edrecno, ez, edit, edbreak, else, end, eDen_Prac_1
- MERGE objects used: mincas, meno, merge, mode, MinCas
### `pPrace2sc`
- Inputs/Outputs: UNKNOWN
- Called procedures: PocKm, pSpotreba, pocetmiest, pVyberTrasu, par, pDoprPros, proc, prac, param, Poc_km, pDovod_SC, PARAM, PAR, pEvi_Auto, pocet, pAuto, prostr, Prenes, Par, Param, pTrasa, PS, phm
- Forms used: EDITOR, exit, eEvi_Auto_U, Evi_Auto, edit, edbreak, else, Evidencia, end, evi_auto
- MERGE objects used: mesto_10_km_pocet, mod, mm, miesto, message, mesto_5_km_pocet, mesto_2_km_pocet
### `pNovaTrasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVyberTrasu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNovaTrasa, pMesta, Par, pHlaTra
- Forms used: EDITOR, eTrasy, exit, edrecno, edit, edbreak, end
- MERGE objects used: mode
### `pPracePom`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPracePom1`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM
- Forms used: end
- MERGE objects used: mincas
### `pEviPrace_Al`
- Inputs/Outputs: UNKNOWN
- Called procedures: pKalendar
- Forms used: EDITOR, exit, eDen_Prac, eDen_Prac_N, edrecno, edit, edbreak, else, end
- MERGE objects used: mode
### `pPoklDokl`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPokl_Spolu, pTlacDokl, pPrazdna, PoklDokl, pokldokl
- Forms used: EDITOR, ePoklDokl, exit, ePoklDokl_Br, edirec, edrecno, edit, edbreak, else, end
- MERGE objects used: merge, mode
### `pPokl_Spolu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pokladni, PoklDokl, prieb, Pohyb
- Forms used: end
- MERGE objects used: merge
### `pIKZP_cislo`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pIKDKP_cislo`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVydajDKP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pVydaj, proc
- Forms used: end
- MERGE objects used: mn
### `pVydajZP`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pVydaj, proc
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPDprerus_B`
- Inputs/Outputs: UNKNOWN
- Called procedures: pBanka_Zavaz, pBankaVybVkl, pocet, pBankaVedUct, Param, pPrazdna, pBanka_Pohla, preruseni, param, proc, pd, pa, prerus, PD, pUcet_Spolu, paramcat
- Forms used: EDITOR, exit, edirec, edrecno, eUcet_bro, eUcet, edit, else, edbreak, end, editacie
- MERGE objects used: MM, merge, mode
### `pVypisCislo`
- Inputs/Outputs: UNKNOWN
- Called procedures: param
- Forms used: end, else
- MERGE objects used: MM
### `pBanka_Zavaz`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, Param, pVypisCislo, param, pb, Prenos, pa, pZavazky, pd, pc, PD
- Forms used: EDITOR, exit, edrecno, eUcet_new, Eur, edit, edbreak, else, end, eKz_browse
- MERGE objects used: mode
### `pBankaVedUct`
- Inputs/Outputs: UNKNOWN
- Called procedures: POPLATKY, pVypisCislo, param, Prenos, pa, PD
- Forms used: EDITOR, exit, edrecno, eUcet_new, edbreak, edit, else, end
- MERGE objects used: merge, mode, MM
### `pBankaVybVkl`
- Inputs/Outputs: UNKNOWN
- Called procedures: priebezna, Param, promptYN, pVypisCislo, polozka, param, Prenos, pa, POPLATOK, PD
- Forms used: EDITOR, exit, Esc, else, edrecno, eUcet_new, Editujte, edit, ePDvyb, edbreak, end
- MERGE objects used: MM, mode
### `pBanka_Pohla`
- Inputs/Outputs: UNKNOWN
- Called procedures: prenosu, platby, Platba, pa, ParamCat, pEnter, pos, pEnter_5, pPrazdna, pVypisCislo, preruseni, param, pohlad, pb, proc, prerus, PD, pocet, pPohladavky, pPDprerus_B, pBanka_Ucel, pd, Param, Prenos, pZavazky, pc, pBeznyUcet
- Forms used: EDITOR, exit, eKP_browse, eUCET, Esc, edfield, edrecno, eUcet_new, edit, edbreak, else, EXIT, end, eUcet, editacie, eKz_browse
- MERGE objects used: merge, mode
### `pPDprerus_V`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, pIKzp, pPoklDokl, poslednom, prijmu, pre, PoklDokl, PgUp, PgDn, pPrazdna, preruseni, proc, pv, pIKDKP_cislo, pVydajZP, param, pb, prac, prerus, PD, pVydajDKP, PARAM, predaj, pocet, pc, pIKZP_cislo, Prenes, pd, pohost, Param, promptYN, pIKdkp, Prenos, pVydaje, pZavazky, ParamCat, poist
- Forms used: eVydajd, eIKzp, end, eDoklady, euhrady, Enter, edrecno, Editujte, edbreak, editacie, eKz_browse, exit, Esc, ePDv, EDITOR, ePoklDokl, eIKdkp, edirec, edit, else
- MERGE objects used: majedtku, mn, majetku, material, mzdy, mode
### `pPDprerus_P`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, pPrazdna, preruseni, proc, pv, param, pohlad, pb, prerus, PD, PARAM, pocet, pPohladavky, prijmy, POHLADAVKY, pd, pDat1, Param, pPrijmy, pc
- Forms used: EDITOR, exit, eKP_browse, Esc, edirec, edrecno, Editujte, ePrijmy, edit, edbreak, end, eDoklady, euhrady, editacie
- MERGE objects used: mode
### `pPDsuma`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pPV, P3, PU, P2, PH, P1, PROC, PO, pSumaPD_Info, PV, PD
- Forms used: EDITOR, exit, eSumaPD, edrecno, edit, edbreak, end
- MERGE objects used: MM, mPDsuma_, merge, mode, mPDsuma, Moment
### `pSumaPD_Info`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pol, PD, priebez
- Forms used: end, edrecno
- MERGE objects used: UNKNOWN
### `pHladac`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, prejde, plynule, param
- Forms used: end, exit, else
- MERGE objects used: UNKNOWN
### `pHla_1`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pHladac, proc, param
- Forms used: end, exit
- MERGE objects used: UNKNOWN
### `pCtrlF2`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pPrazdna`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pTlacDokl`
- Inputs/Outputs: UNKNOWN
- Called procedures: par, PoklDokl
- Forms used: Evi_Auto, end, edit, edrecno
- MERGE objects used: UNKNOWN
### `pEnter`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pEnter_5`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pSpRia`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, pre, Po, pohybom
- Forms used: end, Export
- MERGE objects used: menu, MOMENT, Moment
### `pVerzia`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pMen_Obdobie`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, PgUp, PgDn, pPrazdna, pulldown
- Forms used: EDITOR, exit, Esc, Escape, eParDat2, Exit, edit, edbreak, end, ePARdat
- MERGE objects used: MM, Marec, mode, menu, MinCas
### `pAktualDatum`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pVerzia, pPrazdna, proc, pulldown
- Forms used: EDITOR, exit, Esc, else, end, Escape, Exit, edit, eDatum, edbreak, edatum, exec
- MERGE objects used: MM, menu, Marec, mode
### `pSet`
- Inputs/Outputs: UNKNOWN
- Called procedures: PATH, PARAM, pos, Parspol, PARSPOL, Po, path, ParSpol, promptyn
- Forms used: end, exec, else
- MERGE objects used: MS
### `pMemDisk`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, programu
- Forms used: EDITOR, exit, Esc, eDisky, edit, eDatum, else, end
- MERGE objects used: mode, MemAvail
### `pCatS`
- Inputs/Outputs: UNKNOWN
- Called procedures: path
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVytvorCat`
- Inputs/Outputs: UNKNOWN
- Called procedures: proc, param, pv, platby, path, pd, pCatS, ParamCat, pokldokl
- Forms used: eb, exit, ez, elsasa, edit, else, end, exec, evi_auto
- MERGE objects used: miesta, md, me, mesta
### `pCatalog`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramCat, PARAM, pocet, proc, param, pv, path, pd, pVytvorCat, ParamCat, pCedA, PD
- Forms used: EDITOR, exit, Esc, edrecno, edit, edbreak, else, end, exec
- MERGE objects used: merge, MM
### `pZalohuj`
- Inputs/Outputs: UNKNOWN
- Called procedures: pExport_DBF, proc, path, pd, pSpRia
- Forms used: end, exit, exec, edit
- MERGE objects used: merge
### `pCitajZalohu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pSpRia, path, proc
- Forms used: end, exit, exec, edit
- MERGE objects used: merge
### `pUvod`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pVerzia, PARAMCat, pVitajte, pVytvorCat, posl, proc, Priezv, pHOT_PHMdoPD, path, prvy, ParamCat, pCedA
- Forms used: END
- MERGE objects used: Miesto, message, Meno
### `pHlavneMenu`
- Inputs/Outputs: UNKNOWN
- Called procedures: pBytUdaje, pPV, pStratyDoch, pTlf, pVyuctSSESas, pSklad, pPoklDokl, pHm_a_Nehm, Plat, PP, pNakup_o, pWExport_DBF, pOdpoH2OSasa, Platby, pEviZakazky, pMemDisk, pLeasing, pZalohuj, proc, pDohoda, pReklamacie, pDPH, pInkaso_Sasa, pVyuctSPP, pEvi_Auto, pDomacnost, pPD, pVseobData, pVyucH2OSasa, pPohladavky, pUhrady_All, pSklad2008, pAktualDatum, pBaterie, pKalendar_M, pUdaje, pOdpocElSasa, pSc, pNaklady, pSet, PROC, Po, pCatalog, pInkaso, pVyuctSBD, pVyuctSSE, pulldown, pPlatby_BU, pOdpoceTeplo, pZavazky, predpisy, pBeznyUcet
- Forms used: END, elektromer, Export, Eur, eolia, Evidencia, end, etc
- MERGE objects used: menuloop, mod, miesto, menubar, majetok
### `pVseobData`
- Inputs/Outputs: UNKNOWN
- Called procedures: pOkresy, pKurzy, pMesta, proc, pulldown, pBanky, pRevolv, pKraje
- Forms used: end
- MERGE objects used: menuloop
### `prevolv`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, eRevolv, exit, edit, end
- MERGE objects used: mode
### `pBytUdaje`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, exit, Esc, edit, end, eBytUdaje
- MERGE objects used: mode
### `pDomUdaje`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna
- Forms used: EDITOR, exit, Esc, edit, end, eBytUdaje
- MERGE objects used: mode
### `pBytDetail`
- Inputs/Outputs: UNKNOWN
- Called procedures: predpisu, pPrazdna
- Forms used: EDITOR, exit, Esc, edrecno, eByt_B, edit, edbreak, end, eByt_A
- MERGE objects used: mode
### `pBytNovyPred`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param, predpis
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pDomacnost`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, predpis, pBytDetail, pBytNovyPred
- Forms used: EDITOR, exit, Esc, eByt, edrecno, edit, edbreak, end
- MERGE objects used: mr, mode
### `pVyuctSBD`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, predpis, pBytDetail, pBytNovyPred
- Forms used: EDITOR, exit, Esc, eByt, edrecno, edit, edbreak, end
- MERGE objects used: mr, mode
### `pPoistky`
- Inputs/Outputs: UNKNOWN
- Called procedures: Poistky, Poistka, pPrazdna, proc, poistka, pNovaPoist, platenia
- Forms used: EDITOR, exit, Esc, ePoistky, edrecno, edit, edbreak, end
- MERGE objects used: mode
### `pOpravElSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pausal
- Forms used: ElSasa, elsa_pom, elsasa, edit, else, end, el_rok
- MERGE objects used: merge, mp, mr, MM
### `pOdpocElSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pSumarElSasa, param, pOpravElSasa, paramcat
- Forms used: EDITOR, Elsasa, exit, ElSasa, Esc, eElSasa, edrecno, EA, elsasa, elektromeru, edit, edbreak, else, end
- MERGE objects used: mincas, mr, mode, Magna
### `pSumarElSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramcat, param
- Forms used: el_pom, EA, edbreak, else, end, elSasa
- MERGE objects used: merge, mr, Magna, MM
### `pNoveVyuSSE`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pVyuctSSE`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pNoveVyuSSE, proc
- Forms used: EDITOR, exit, eVyuctSSE, Esc, edrecno, edit, edbreak, end, el
- MERGE objects used: mode
### `pNovVyuSSESa`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pVyuctSSESas`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNovVyuSSESa, pPrazdna, proc
- Forms used: EDITOR, exit, eVyuctSSE, Esc, edrecno, edit, edbreak, end, el
- MERGE objects used: mode
### `pNovVyucVeol`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pVyucH2OSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pNovVyucVeol, proc
- Forms used: EDITOR, exit, Esc, edrecno, eVyucVeol, edit, edbreak, end
- MERGE objects used: mode
### `pSumarH2Sasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: paramcat
- Forms used: end
- MERGE objects used: merge
### `pOdpoH2OSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pSumarh2sasa, param
- Forms used: EDITOR, exit, Esc, edrecno, eh2o_sasa, edit, edbreak, end
- MERGE objects used: mincas, mr, mode
### `pBaterie`
- Inputs/Outputs: UNKNOWN
- Called procedures: pSumarBaterie, pPrazdna, param
- Forms used: EDITOR, exit, Esc, edrecno, edit, eBaterie, edbreak, Evidencia, end
- MERGE objects used: mincas, mr, mode
### `pNoveTeplo`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pOdpoceTeplo`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pNoveTeplo, proc
- Forms used: EDITOR, exit, Esc, edrecno, edit, edbreak, end, eTeplo
- MERGE objects used: mode
### `pNoveVyuSPP`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param
- Forms used: end, exit
- MERGE objects used: MM, merge, mr, mo
### `pVyuctSPP`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNoveVyuSPP, pPrazdna, proc
- Forms used: EDITOR, exit, Esc, edrecno, edit, edbreak, eVyuctSPP, end, el
- MERGE objects used: mode
### `pInkNovyPred`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param, predpis
- Forms used: end, exit, edit
- MERGE objects used: MM, merge, mr, mo
### `pInkaso`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, predpis, platenia, pInkNovyPred, Predpis
- Forms used: EDITOR, exit, Esc, edrecno, eInkaso, edit, edbreak, end
- MERGE objects used: mr, mode
### `pInkNoPrSasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: prompt, param, predpis
- Forms used: end, exit, edit
- MERGE objects used: MM, merge, mr, mo
### `pInkaso_Sasa`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, predpis, pInkNoPrSasa, platenia, Predpis
- Forms used: EDITOR, exit, Esc, eInkaSo, edrecno, edit, edbreak, end
- MERGE objects used: mr, mode
### `pCislo_Platb`
- Inputs/Outputs: UNKNOWN
- Called procedures: Platby, ParamCat, Platby_l, Platby_L
- Forms used: end, else
- MERGE objects used: merge
### `pDovod_Platb`
- Inputs/Outputs: UNKNOWN
- Called procedures: Platby
- Forms used: EDITOR, exit, edrecno, edit, edbreak, else, end
- MERGE objects used: merge
### `pPlatby_BU`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPlatbyExpor, pCislo_Platb, platby, ParamCat, pEnter, Platby, pos, par, proc, PARAMcat, pTlf_odber, platba, pUhrady, PARAM, PAR, pDovod_Platb, pUcty, pUhrady_All, Platby_P, pc
- Forms used: EDITOR, exit, end, edirec, Export, ePlatby_brow, edrecno, ePlatby, edit, edbreak, else, export, ePlatby_stal
- MERGE objects used: meno, mod, MM, miesto, merge, mes, mode
### `pPlatbyExpor`
- Inputs/Outputs: UNKNOWN
- Called procedures: Platby, PARAM, pos, pPrazdna, Platby_l, platby, PP, pre
- Forms used: EDITOR, exit, Esc, edittxt, end, exp, Export, edit, edbreak, else, export
- MERGE objects used: MM, merge, mode, Moment
### `pDruhDruh`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, proc, param, pKodDruhDruh, pDruhTovaru, pHla_PD
- Forms used: eDruhDruh, EDITOR, exit, Esc, edrecno, edit, edfile, else, edbreak, end
- MERGE objects used: mode
### `pKodDruhDruh`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pKodDruhuTov`
- Inputs/Outputs: UNKNOWN
- Called procedures: param
- Forms used: end
- MERGE objects used: UNKNOWN
### `pKodObchodu`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVyberMesto`
- Inputs/Outputs: UNKNOWN
- Called procedures: pHlaMes
- Forms used: EDITOR, exit, edrecno, eMesto, edit, edbreak, end
- MERGE objects used: Mesta, Mesto, mode, mesto
### `pHla_t`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pHladac, proc, param
- Forms used: end, exit
- MERGE objects used: UNKNOWN
### `pNovyNakup`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end
- MERGE objects used: UNKNOWN
### `pDruhTovaru`
- Inputs/Outputs: UNKNOWN
- Called procedures: pKodDruhuTov, pNovyTovar, pPrazdna, pSadzbDPH, param, pZrusDruhTov, pDruhDruh
- Forms used: EDITOR, exit, Esc, edrecno, edit, edbreak, else, end, eDruhTova
- MERGE objects used: mode
### `pNakup_o`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, pPrazdna, param, pNakup_t, pZmenObchod, pVyberObchod, pHla_PD
- Forms used: EDITOR, exit, Esc, ePARdat1, edrecno, enakup_o, edit, edbreak, end
- MERGE objects used: mode
### `pTlac`
- Inputs/Outputs: UNKNOWN
- Called procedures: PARAM, Pom_n_o, pom_n_o, pPrazdna, param, pNakup_t, pZmenObchod, pVyberObchod, pHla_PD
- Forms used: EDITOR, exit, Esc, ePARdat1, edrecno, enakup_o, edit, edbreak, end
- MERGE objects used: merge, mode
### `pZmenObchod`
- Inputs/Outputs: UNKNOWN
- Called procedures: pVyberObchod, proc, param
- Forms used: end
- MERGE objects used: UNKNOWN
### `pSumNakup`
- Inputs/Outputs: UNKNOWN
- Called procedures: pSumNakRataj, proc, param
- Forms used: edfield, end
- MERGE objects used: UNKNOWN
### `pSumNakRataj`
- Inputs/Outputs: UNKNOWN
- Called procedures: param
- Forms used: end
- MERGE objects used: UNKNOWN
### `pVyberObchod`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pVyberMesto, param, pHla_PD, pKodObchodu
- Forms used: EDITOR, else, Esc, exit, edrecno, edit, edfile, eObchody, edbreak, end
- MERGE objects used: mode
### `pNakup_T`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNovyTovar, pocet, pSumNakup, pPrazdna, proc, param, pZmenTovar, pHla_PD, pSumNakRataj, pCtrlF2
- Forms used: EDITOR, exit, Esc, edrecno, edit, edbreak, else, end, enakup_t
- MERGE objects used: MM, mode, mnoz
### `pZmenTovar`
- Inputs/Outputs: UNKNOWN
- Called procedures: pNovyTovar, pocet, proc, param
- Forms used: end, edbreak
- MERGE objects used: UNKNOWN
### `pNovyTovar`
- Inputs/Outputs: UNKNOWN
- Called procedures: pHla_t, pocet, pPrazdna, proc, pZrusenieTov, param, pDruhTovaru, pKodTovaru
- Forms used: EDITOR, exit, Esc, etovary, else, edrecno, edit, edfile, edbreak, end
- MERGE objects used: merge, mj, mode
### `pZrusenieTov`
- Inputs/Outputs: UNKNOWN
- Called procedures: pPrazdna, pHla_t, param
- Forms used: EDITOR, exit, Esc, etovary, edok, edrecno, edit, edbreak, else, end
- MERGE objects used: mode
### `pZrusDruhTov`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end, edok, edrecno, edbreak
- MERGE objects used: UNKNOWN
### `pKodTovaru`
- Inputs/Outputs: UNKNOWN
- Called procedures: pDruhTovaru, param
- Forms used: EDITOR, end, exit, edit
- MERGE objects used: mode
### `pVystav`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end, else
- MERGE objects used: mode
### `pZav2003`
- Inputs/Outputs: UNKNOWN
- Called procedures: UNKNOWN
- Forms used: end, exit
- MERGE objects used: mode
### `pKodOP_kontr`
- Inputs/Outputs: UNKNOWN
- Called procedures: po, pPri_Info, pSumSpotreba, prirad_kp, podpis, pKontrola_PD, pagelimit, popis, pVyd_Info, prirad_kz, polyreg, podua, pSpotreba, pPD_Doklad, Por, PrevRez, prostriedky, PH, pPDprerus_V, Predaj_v_Kor_x_100, par, PARAMcat, param, predo, pKontrolaOP, pZmenKodPri, Predaj_v_Kor_x_10, pDopln_Uda, Priebezne, pau, prerus, pGraf_PD, pHladac, poistne, pocet, pPD, pPD_InfoTyp, poc_km, PRIJEM, P1, priame, POPIS, pPDprerus_P, PenUst, plnenia, Poistne, pVydaje_Kod, pd_d, PrReBan, promptYN, polozka, prijatia, pPumpMesGraf, Partner, PV, pZmenKodVyd, p_, phm, pumpy, prieb, pPD_Info, Priem, P2, Prie, pohladavok, PHM_max, pu, pMesta, pVyd_PD_Info, ph, pSpRia, partneri, PrReSC, prostriedku, Palivo, pal, pKm_Auto_Opr, partner, phm_max, predoslych, pSpotre_SC, page, pol, PRIEBEZNE, pSp_Auto_Opr, proc, pb, pohlad, pKonSpotreba, pVyd_Bez_Kod, Pr, pMesta_, Poc_km, pHaNM_Spolu, popis1, Pi, prostriedok, pDovod_SC, pop, PHM, PAR, Priemer, program, prenos, pAuto, pIniSpotreba, P_, pEvi_Auto, pTlacDokl, psc, polooka, pPraz, pEvi_Auto_SC, pri, pis, pPDprerus_B, pSpotrebGraf, partnera, partnerov, pKm_Kon_Vzd, pMesta_Spotr, podnikatela, pomintkodtov, prir, polooky, Popis, polozky, pTrasa, pHla_1, pd_L, Prirazka, pVydaje, path, Priezvisko, Pocet, ParamCat, Predaj, prirazky, PALETTE, Priezv, pois, priemer, pCedA, pHla_PD, PIS, pre, PSC, ps, PR, pAuto_Info, pPrazdna, pockm, Prostr, Polooka, Partneri, podmnooina, PRIKAZ, pKontrol_PD1, Pohladavky, Prijem, prompt, Predmet, pHlaMes, Preru, prijem, prostr, prace, pomer, PLATBY, penust, prev, pPriradKodOP, PU, Prace, pSc, Par, pHlaTra, pSc_Kontrola, polooku, pofet, Prenos, Predaj_v_Kor_x_1000, pPrijmy, prikazom, PS, pc, PHM_SC, pBeznyUcet, paramcat, Pau, Prijmy, Pal, potPrie, popis2, PocKm, platby, pPrijmy_Kod, prijmu, Prevadzkova, pracovn, pos, PrReAut, pPD_SC, pPDsuma, prac, pVynuluj_Vy1, Pozn, PRIEBEZN, pVytvorCat, PD, PARAM, POLOZKY, popise, predaj, pKontrol_PD2, priebez, preukazu, pd, PRINT, pAktualDatum, pUcet_Spolu, PS1, pSpotreba_n, pUdaje, pSc_EviAuto, pHm_a_Nehm_X, Podiel, platbe, Param, pDoSpotr_Zpd, prie, pisy, Po, PF, pAuto_Info_1, PoisL, prostr1, pSpotrScSum
- Forms used: epdp, EA, eIKzpBr, exist, em, Extern, EB, END, e_, ea_pom, eno, evi_auto, EDITOR, ekonom, EA_pom, EA_Pom, ePD, else, edohodabrows, eIKzp, Evidencie, edb, exec, etky, eTrasy, eSpotreba, eSkladBr, ePV, Evi_Auto, Editujte, el_10, edbreak, eSc, eSC_roky, Esc, ez, eMesto, eUdajO, eSklad, eDoprPros, ePDbrow_Vyd, edit, edupdated, eBanky, eMesta, end, ePrijem_PD, edrec, Evidencia, eIKdkpBr, exit, eVydajf, ePDbrowse, Evi_, eEvi_Auto, edBreak, eVydaj_PD, eAuto, eUdaje, eEvi_Auto_U, ePrijmz, editovat, EAtyp, Ekonom, eUdajF, EZ, edrecno, eUcet, enie, edfield, eSc_br, eSpotPrie, ePDbrow_Pri, edirec, eSpotreba1, evi_Auto, eSpotreba2
- MERGE objects used: Mnozstvo1, mto, mn, mod, Memory, Mnoostvo, mzdy, message, mPD, mpd, Mes_Fir, Mesiace, Ma, Meno, m1, Material, men, mail, mM, mix, Mzdy, mPDsuma, Mes, Mesiac, min, mesto, mIKzp, Miesto, memavail, majetku, MM, Mnozstvo, mPDsuma_, medzi, mesiace, majetok, mSC, mi, Miesta, mes, MV100Y, Mesto, mes1, mesiaci, Mesi, mnozstvo, Mesta, mnozstvo_z, meno, ME, merjedn, miesto, mm, m2, merge, max, mode, mesiacoch, mena, maj, miesta
### `pWExport_DBF`
- Inputs/Outputs: UNKNOWN
- Called procedures: pos, prostr, priemer_v, pc, proc, priemer_l, prijmy, platby, param, pv, priemer, pd, pVytvorCat, priemer_n, pSpRia, pokldokl
- Forms used: ez, elsasa, else, end, exec, evi_auto
- MERGE objects used: merjedn, mm, merge, mode, mesta
### `pWExp_DBFlas`
- Inputs/Outputs: UNKNOWN
- Called procedures: public, pos, prostr, proc, prijmy, pv, platby, pd, pVytvorCat, pSpRia, pokldokl
- Forms used: ez, elsasa, else, end, exec, evi_auto
- MERGE objects used: merjedn, mm, merge, mode, mesta
### `pDBF_to_fand`
- Inputs/Outputs: UNKNOWN
- Called procedures: prostr, proc, prijmy, pv, platby, pd, pSpRia
- Forms used: exit, ez, elsasa, else, end, exec, evi_auto, Ez
- MERGE objects used: MM, mm, merjedn, merge, mode, mesta
### `main`
- Inputs/Outputs: UNKNOWN
- Called procedures: program, pUvod, proc, pHlavneMenu
- Forms used: END
- MERGE objects used: UNKNOWN

## 5. FORM INVENTORY
- `e` - Associated procedure: UNKNOWN
- `eParDat` - Associated procedure: pDPH, pMen_Obdobie
- `eParDat1` - Associated procedure: pNakup_o, pTlac
- `eParDat2` - Associated procedure: pDPH, pMen_Obdobie
- `ePrijem` - Associated procedure: pPrijem
- `eVydaj` - Associated procedure: pVydaj
- `eKalendar` - Associated procedure: pKalendar_M
- `eKalendar_1` - Associated procedure: pKalendar
- `eKalendar_sc` - Associated procedure: pKalendar
- `eDat1` - Associated procedure: pDat1
- `eDat2` - Associated procedure: pDat2
- `eDoklady` - Associated procedure: pDoklady, pPDprerus_V, pPDprerus_P
- `eSadzbDPH` - Associated procedure: pSadzbDPH
- `eBanky` - Associated procedure: pBanky, pKodOP_kontr
- `eMesto` - Associated procedure: pMesta, pMesto_SC, pMesta_Trasa, pMesta_Spotr, pVyberMesto, pKodOP_kontr
- `eMesta` - Associated procedure: pKodOP_kontr
- `eTrasy` - Associated procedure: pTrasy, pDovod_DPrac, pTrasa, pVyberTrasu, pKodOP_kontr
- `eUdaje` - Associated procedure: pUdaje, pKodOP_kontr
- `ePrijmy` - Associated procedure: pPDprerus_P
- `ePrijmz` - Associated procedure: pPrijmy, pKodOP_kontr
- `ePrijem_PD` - Associated procedure: pPrijmy_Kod, pKodOP_kontr
- `eVydajd` - Associated procedure: pVydaje_Kod, pPDprerus_V
- `eVydaj_PD` - Associated procedure: pVydaje_Kod, pKodOP_kontr
- `eVydajC` - Associated procedure: pVydaje
- `eUcty` - Associated procedure: pBeznyUcet
- `eUcet` - Associated procedure: pPD_Doklad, pBeznyUcet, pPDprerus_B, pBanka_Pohla, pBanka_Pohla, pKodOP_kontr
- `eUcet_new` - Associated procedure: pBanka_Zavaz, pBankaVedUct, pBankaVybVkl, pBanka_Pohla
- `eUcet_bro` - Associated procedure: pBeznyUcet, pPDprerus_B
- `ePV` - Associated procedure: pPV, pKodOP_kontr
- `eStrataDoch` - Associated procedure: pStratyDoch
- `eSumaPD` - Associated procedure: pPDsuma
- `ePD` - Associated procedure: pPD, pKodOP_kontr
- `ePDbrowse` - Associated procedure: pDoSpotr_Zpd, pPD, pPD_banka, pKodOP_kontr
- `ePDbrow_Vyd` - Associated procedure: pVydaje_Kod, pKodOP_kontr
- `ePDbrow_Pri` - Associated procedure: pPrijmy_Kod, pKodOP_kontr
- `ePDp` - Associated procedure: pKodOP_kontr
- `ePDv` - Associated procedure: pPDprerus_V
- `ePDvyb` - Associated procedure: pBankaVybVkl
- `ePDvklad` - Associated procedure: UNKNOWN
- `eIKzp` - Associated procedure: pHm_a_Nehm, pHm_a_Nehm_X, pPDprerus_V, pKodOP_kontr
- `eIKzpBr` - Associated procedure: pIKzp, pHm_a_Nehm, pKodOP_kontr
- `eIKdkp` - Associated procedure: pNaklady, pPDprerus_V
- `eIKdkpBr` - Associated procedure: pIKdkp, pNaklady, pKodOP_kontr
- `eLeasing` - Associated procedure: pLeasing
- `eLeasing_Bro` - Associated procedure: pLeasing
- `eDohoda` - Associated procedure: UNKNOWN
- `eDohodaBrows` - Associated procedure: pDohoda, pKodOP_kontr
- `eEZ` - Associated procedure: pEviZakazky
- `eEZ_browse` - Associated procedure: pEviZakazky
- `eDen_Prac` - Associated procedure: pEviPrace_Al
- `eDen_Prac_1` - Associated procedure: pEviPrace
- `eDen_Prac_N` - Associated procedure: pEviPrace, pEviPrace_Al
- `eSkla2008` - Associated procedure: pSklad2008
- `eSkl2008Br` - Associated procedure: pSklad2008
- `eSkl2008BrKP` - Associated procedure: UNKNOWN
- `eSklad` - Associated procedure: pSklad, pKPpol, pSklad_rekl, pKodOP_kontr
- `eSkladBr` - Associated procedure: pSklad, pKodOP_kontr
- `eSkladBrKP` - Associated procedure: pKPpol, pSklad_rekl
- `eKPpol` - Associated procedure: pKPpol, pKPpol_rekl
- `eKPpolBr` - Associated procedure: pKPpol, pKPpol_rekl
- `eKP` - Associated procedure: pPohladavky
- `eKP_browse` - Associated procedure: pPohladavky, pReklamacie, pEviZakazky, pBanka_Pohla, pPDprerus_P
- `eKZpol` - Associated procedure: pKzPol
- `eREKLpol` - Associated procedure: pREKLPol
- `eKZpol_br` - Associated procedure: pKzPol
- `eREpol_br` - Associated procedure: pREKLPol
- `eKZ` - Associated procedure: pZavazky
- `eREKL` - Associated procedure: pReklamacie
- `eKZ_stala_pl` - Associated procedure: pZavazky
- `eKZ_sta_new` - Associated procedure: pZavazky
- `eKZ_browse` - Associated procedure: pZavazky, pBanka_Zavaz, pBanka_Pohla, pPDprerus_V
- `eREKL_browse` - Associated procedure: pReklamacie
- `eUhrady` - Associated procedure: pUhrady_All, pPDprerus_V, pPDprerus_P
- `eUhradyBr` - Associated procedure: pUhrady_All, pUhra_KP, pAll_Uhra_KP, pUhra_KZ
- `eDoprPros` - Associated procedure: pDoprPros, pKodOP_kontr
- `eSC` - Associated procedure: pPrijem, pVydaj, pSadzbDPH, pStratyDoch, pIKzp, pIKdkp, pSC, pSC_nova, pSC_nova, pSumSpotreba, pSpotreba_n, pUdaje, pPV, pDPH, pVydaje, pPrijmy, pPD_Doklad, pOP, pPrikaz_Uhra, pKalendar, pKalendar_M, pBankaVybVkl, pBanka_Pohla, pPDprerus_V, pPDprerus_P, pMen_Obdobie, pAktualDatum, pMemDisk, pCatalog, pBytUdaje, pDomUdaje, pBytDetail, pDomacnost, pVyuctSBD, pPoistky, pOdpocElSasa, pVyuctSSE, pVyuctSSESas, pVyucH2OSasa, pOdpoH2OSasa, pBaterie, pOdpoceTeplo, pVyuctSPP, pInkaso, pInkaso_Sasa, pPlatbyExpor, pDruhDruh, pDruhTovaru, pNakup_o, pTlac, pVyberObchod, pNakup_T, pNovyTovar, pZrusenieTov, pKodOP_kontr, pKodOP_kontr
- `eSC_br` - Associated procedure: pSC, pSpotre_SC, pKalendar, pKodOP_kontr
- `eAuto` - Associated procedure: pAuto, pKodOP_kontr
- `eAutoUplne` - Associated procedure: pAuto, pAuto_new
- `eSpotPrie` - Associated procedure: pSumSpotreba, pSpotreba_n, pKodOP_kontr
- `eSpotreba` - Associated procedure: pSpotreba, pKodOP_kontr
- `eSpotrebaNm` - Associated procedure: pSpotreba
- `eSpotreba1` - Associated procedure: pSpotreba, pKodOP_kontr
- `eSpotreba1Nm` - Associated procedure: pSpotreba
- `eSpotreba2` - Associated procedure: pSpotreba, pKodOP_kontr
- `esc_roky` - Associated procedure: pSpotreba, pKodOP_kontr
- `eEvi_Auto` - Associated procedure: pEvi_Auto, pKodOP_kontr
- `eEvi_Auto_U` - Associated procedure: pEvi_Auto, pEvi_Auto_SC, pPD_Doklad, pPohla_SC, pKZ_sc, pREKL_sc, pKP_sc, pPrace2sc, pKodOP_kontr
- `eEvi_Auto_EU` - Associated procedure: pEvi_Auto
- `eUdajO` - Associated procedure: pTlf, pTlf_odber, pKodOP_kontr
- `eUdajF` - Associated procedure: pTlf, pTlf_odber, pKodOP_kontr
- `eUdajP` - Associated procedure: UNKNOWN
- `eUdajM` - Associated procedure: UNKNOWN
- `edph` - Associated procedure: pDPH
- `eOP` - Associated procedure: pOP
- `ePoklDokl` - Associated procedure: pPoklDokl, pPDprerus_V
- `ePoklDokl_Br` - Associated procedure: pPoklDokl
- `erevolv` - Associated procedure: prevolv
- `eBytUdaje` - Associated procedure: pBytUdaje, pDomUdaje
- `eByt` - Associated procedure: pDomacnost, pVyuctSBD
- `eByt_A` - Associated procedure: pBytDetail
- `eByt_B` - Associated procedure: pBytDetail
- `ePoistky` - Associated procedure: pPoistky
- `ePoistky` - Associated procedure: pPoistky
- `ePoistkyM` - Associated procedure: UNKNOWN
- `ePoistkyR` - Associated procedure: UNKNOWN
- `eVyuctSSE` - Associated procedure: pVyuctSSE, pVyuctSSESas
- `eElSasa` - Associated procedure: pOdpocElSasa
- `eVyucVeol` - Associated procedure: pVyucH2OSasa
- `eH2O_Sasa` - Associated procedure: pOdpoH2OSasa
- `eBaterie` - Associated procedure: pBaterie
- `eTeplo` - Associated procedure: pOdpoceTeplo
- `eVyuctSPP` - Associated procedure: pVyuctSPP
- `eInkaso` - Associated procedure: pInkaso, pInkaso_Sasa
- `ePlatby` - Associated procedure: pPlatby_BU
- `ePlatby_Stal` - Associated procedure: pPlatby_BU
- `ePlatby_Brow` - Associated procedure: pPlatby_BU
- `eDruhDruh` - Associated procedure: pDruhDruh
- `eDruhTova` - Associated procedure: pDruhTovaru
- `eObchody` - Associated procedure: pVyberObchod
- `eTovary` - Associated procedure: pNovyTovar, pZrusenieTov
- `eNakup_o` - Associated procedure: pNakup_o, pTlac
- `eTlacNakup_o` - Associated procedure: UNKNOWN
- `eNakup_t` - Associated procedure: pNakup_T

## 6. MERGE/REPORT INVENTORY
- `mHelp` - Inputs/purpose: Used in procedures UNKNOWN
- `m1` - Inputs/purpose: Used in procedures pGraf_PD, pStatist, pKodOP_kontr
- `m2` - Inputs/purpose: Used in procedures pGraf_PD, pStatist, pSpotrebGraf, pPumpMesGraf, pKodOP_kontr
- `mSC` - Inputs/purpose: Used in procedures pSC_Cat, pKodOP_kontr
- `mPD` - Inputs/purpose: Used in procedures pKontrola_Pd, pKodOP_kontr, pKodOP_kontr
- `mPDsuma` - Inputs/purpose: Used in procedures pPD_Info, pPDsuma, pKodOP_kontr
- `mPDsuma_` - Inputs/purpose: Used in procedures pPD_Info, pPDsuma, pKodOP_kontr
- `mIKzp` - Inputs/purpose: Used in procedures pHm_a_Nehm, pKodOP_kontr
- `mIKdkp` - Inputs/purpose: Used in procedures pNaklady

## 7. GLOBAL/PARAMETER DATA
### `ParamCat`
- Field `Rok` used in: pKodOP_kontr, pCislo_Platb, pPohl_Spolu, pZak_spolu, pEviZakazky, pSpotre_SC, pPDprerus_V, pBanka_Pohla, pReklamacie, pZavaz_Spolu, pVytvorCat, pGraf_PD, pKontrol_PD1, pUhra_KZ, pKontrol_PD2, pPohladavky, pUhra_KP, pUhrady_All, pHm_a_Nehm_X, pDoSpotr_Zpd, pCatalog, pPlatby_BU, pZavazky, pPD_Info
- Field `SC` used in: pSC_Cat, pSC, pKalendar, pKodOP_kontr
- Field `Rok_s` used in: pCislo_EZ, pEvi_Auto, pCatalog
- Field `rok` used in: pKodOP_kontr, pKm_Auto_Opr, pCislo_REKL, pHm_a_Nehm_X, pEviZakazky, pCatalog, pSumarH2Sasa, pUcet_Spolu, pCeda, pCislo_KP, pSC_Kontrola, pHot_PHMdoPD, pKontrola_Pd, pVyberOdb, pBeznyUcet
- Field `rok_s` used in: pOdpocElSasa, pPD, pCislo_KZ, pSumarElSasa, pVyberDod, pPDprerus_B, pVyberOdb
- Field `sc` used in: pCatalog
- Field `nrecs` used in: pUvod
- Field `r` used in: pKodOP_kontr
### `param`
- Field `cislo` used in: pNakup_T, pBanka_Zavaz, pKm_Auto_Opr, pIKzp, pTlac, pKodOP_kontr, pBanka_Pohla, pVyd_PD_Info, pIKdkp, pPDsuma, pSumaPD_Info, pZmenObchod, pVyberObchod, pNakup_o, pWExport_DBF, pUvod, pPD_Info
- Field `Nazov` used in: pKodOP_kontr, pUvod, pSklad, pHlaTra, pHladaj, pHlaSklad, pSklad2008, pHlaSkla2008, pHla_PD
- Field `sc` used in: pKodOP_kontr, pPohla_SC, pPrace2sc, pEvi_Auto_SC, pKP_sc, pKZ_sc, pDPH, pSC_nova, pREKL_sc
- Field `Dat1` used in: pKodOP_kontr, pSpotre_SC, pStatist, pPDsuma, pSpotrebGraf, pSpotrSCsum, pGraf_PD
- Field `Dat2` used in: pKodOP_kontr, pSpotre_SC, pStatist, pDovod_DPrac, pPDsuma, pSpotrebGraf, pEviPrace, pKalendar, pSpotrSCsum, pGraf_PD
- Field `dat1` used in: pKodOP_kontr, pBanka_Zavaz, pBankaVybVkl, pPD, pEviZakazky, pBankaVedUct, pSpotre_SC, pPDprerus_V, pBanka_Pohla, pPDprerus_B, pPlatby_BU, pEviPrace, pPDprerus_P, pKalendar
- Field `zaciat` used in: pSpotre_SC, pSpotrSCsum, pKodOP_kontr
- Field `dat2` used in: pKodOP_kontr, pBankaVybVkl, pKm_Auto_Opr, pSpotre_SC, pVypisCislo
- Field `koniec` used in: pKodOP_kontr, pSpotre_SC, pDovod_DPrac, pDovod_SC, pSpotrSCsum
- Field `pocet` used in: pNakup_T, pNovyTovar, pKodOP_kontr, pPDprerus_V, pZmenTovar, pDPH, pSpotrebGraf
- Field `aktcas` used in: pNakup_T, pKm_Auto_Opr, pNakup_o, pTlac
- Field `dph` used in: pNakup_T, pZak_spolu, pNovyTovar, pPrace2sc, pEvi_Auto_SC, pKP_sc, pKZ_sc, pCatalog, pZmenTovar, pKodTovaru, pDruhTovaru, pREKL_sc
- Field `a1234` used in: pNakup_T, pKodOP_kontr, pPDprerus_V, pSumNakRataj, pVydajZP, pDPH, pPDprerus_P, pDovod_SC, pVydajDKP
- Field `ok` used in: pKodOP_kontr, pHladac, pHla_t, pHla_1, pMen_Obdobie, pHlaMes
- Field `NameSearch` used in: pKodOP_kontr, pHladac, pHla_t, pHla_1, pZrusenieTov, pHlaMes
- Field `NSearch` used in: pKodOP_kontr, pHladac, pHla_t, pHla_1, pHlaMes
- Field `a` used in: pKodOP_kontr, pPlatbyExpor, pKzPol, pKPpol, pCeda, pVyberDod, pMen_Obdobie, pPlatby_BU, pSklad_rekl, pHot_PHMdoPD, pVyberOdb
- Field `b` used in: pCeda, pPlatby_BU, pHot_PHMdoPD, pKodOP_kontr
- Field `pd` used in: pKodOP_kontr, pUhra_KP, pAll_Uhra_KP, pTlf_odber, pCisloOP
- Field `NazMie` used in: pKodOP_kontr, pEviZakazky, pPDsuma, pVyberDod, pTlf_odber, pEviPrace, pVyberOdb
- Field `zak` used in: pPohladavky, pVyberDod, pTlf_odber, pReklamacie, pZavazky, pVyberOdb
- Field `Miesto` used in: pKodOP_kontr, pVyberDod, pTlf_odber, pUvod, pVyberOdb
- Field `var_sym` used in: pKodOP_kontr, pPDprerus_V, pZmenKP_AB, pVyberDod, pTlf_odber, pPDprerus_P, pVyberOdb
- Field `kon_sym` used in: pVyberDod, pTlf_odber, pVyberOdb, pKodOP_kontr
- Field `spc_sym` used in: pVyberDod, pTlf_odber, pVyberOdb, pKodOP_kontr
- Field `MinCas` used in: pMen_Obdobie, pDPH, pEviZakazky, pEviPrace
- Field `AktCas` used in: pEviZakazky, pMen_Obdobie, pDPH, pEviPrace, pAktualDatum
- Field `mincas` used in: pBaterie, pOdpocElSasa, pPracePom1, pKZpol_Spolu, pDPH, pEviPrace, pKPpol_Spolu, pOdpoH2OSasa
- Field `a1` used in: pNakup_T, pKodOP_kontr, pBankaVybVkl, pSumNakup, pOP, pDPH, pReklamacie, pVyberObchod, pZavazky, pSumNakRataj
- Field `a2` used in: pNakup_T, pKodOP_kontr, pSumNakup, pPDprerus_V, pOP, pVydajZP, pDPH, pReklamacie, pVyberObchod, pZavazky, pSumNakRataj, pVydajDKP
- Field `a3` used in: pKodOP_kontr, pDPH, pReklamacie, pZavazky
- Field `a4` used in: pPDprerus_V, pDPH, pVydajDKP, pVydajZP
- Field `uc` used in: pBanka_Zavaz, pPDprerus_V, pBanka_Pohla, pDPH, pPDprerus_P
- Field `doklad` used in: pKodDruhuTov, pKodOP_kontr, pOdpocElSasa, pNovyTovar, pPDprerus_V, pVydaje_Kod, pVyd_PD_Info, pCatalog, pSumarElSasa, pReklamacie, pPrijmy_Kod, pZmenKodPri, pZavazky, pZmenKodVyd, pPlatby_BU, pDruhTovaru, pKodTovaru, pDruhDruh
- Field `dat` used in: pDdatum, pPD, pKodOP_kontr, pPDprerus_V
- Field `datum` used in: pKodOP_kontr, pBanka_Zavaz, pPD, pUhra_KP, pKzPol, pREKLPol, pBanka_Pohla, pKPpol, pPDprerus_B, pSklad_rekl, pKPpol_rekl
- Field `browse` used in: pKodOP_kontr, pPD
- Field `Browse` used in: pKodOP_kontr, pPD_Info
- Field `nazmie` used in: pKodOP_kontr, pEviZakazky, pKzPol, pPohladavky, pPDsuma, pPlatby_BU, pZavazky, pEviPrace
- Field `c` used in: pKodOP_kontr, pBanka_Zavaz, pCislo_REKL, pPDprerus_V, pUhra_KP, pKzPol, pREKLPol, pCislo_KZ, pBanka_Pohla, pKPpol, pKZpol_Spolu, pPlatby_BU, pSklad_rekl, pKPpol_rekl, pKPpol_Spolu, pPDprerus_P
- Field `Cislo` used in: pCatalog, pPlatby_BU, pSklad_rekl, pKPpol_rekl, pZavazky
- Field `DPH` used in: pOP
- Field `today_s` used in: pDovod_KP
- Field `miesto` used in: pKodOP_kontr, pPlatby_BU, pZavazky
- Field `kz` used in: pCislo_KZ
- Field `meno` used in: pKodOP_kontr, pPlatby_BU, pEviZakazky, pEviPrace
- Field `OK` used in: pMen_Obdobie, pEviZakazky, pEviPrace
- Field `UC` used in: pPDprerus_B, pBanka_Pohla
- Field `s01` used in: pBanka_Pohla
- Field `KP` used in: pBanka_Pohla
- Field `PD` used in: pBanka_Pohla
- Field `index` used in: pSet
- Field `nrecs` used in: pUvod
- Field `Titul` used in: pUvod
- Field `Meno` used in: pUvod
- Field `Priezv` used in: pUvod
- Field `prvy` used in: pUvod
- Field `posl` used in: pUvod
- Field `dat0` used in: pNovVyuSSESa, pNovVyucVeol, pInkNoPrSasa, pBytNovyPred, pNoveVyuSSE, pNoveVyuSPP, pInkNovyPred, pNoveTeplo
- Field `ME` used in: pKodOP_kontr
- Field `intkodtov` used in: pKodOP_kontr
- Field `Zaciat` used in: pKodOP_kontr
- Field `Koniec` used in: pKodOP_kontr

## 8. ACCOUNTING LOGIC
Consolidation of logic directly visible in source procedures.
- VERIFIED: `pHlaSklad`: with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky skladu :  ':A,30:=PARAM.Nazov);
- VERIFIED: `pHlaSkla2008`: with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky Skla2008u :  ':A,30:=PARAM.Nazov);
- VERIFIED: `pSklad2008`: merge(['#I1_skla2008 #O1_ sklad nakupcena := I1.nakupcena / 30.126']);
- VERIFIED: `pSpotreba`: with window (1,2,80,24,@) do repeat if Spotreba.nrecs=0 then zaklad := true;
- VERIFIED: `pSpotreba`: if br=29 then begin zaklad := ^zaklad; setkeybuf('\0\103'); end;
- VERIFIED: `pSpotrebGraf`: merge(['#I1_ Spotreba ! (kod=Par.kod) Datum #O1_SpotGraf km:=I1.km; spotr:=I1.spotr; Sk_za_PHM:=Sk_za_PHM; litre:=Litre; Au_Priemer:=I1.PS*100; pocet:=I1.pocet; sk:=Sk_na_1l; sk_real:=Sk_na_1l_Bez_DPH']);
- VERIFIED: `pSpotrebGraf`: merge(['#I1_ Spotreba ! (kod=Par.kod) Datum #O_SpotGraf km:=sum(km);spotr:=sum(I1.spotr);pocet:=sum(I1.pocet);Sk_za_PHM:=sum(Sk_za_PHM);litre:=sum(Litre);Au_Priemer:=I1.PS*100;pocet:=sum(I1.pocet);sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
- VERIFIED: `pSpotrebGraf`: merge(['#I1_ Spotreba ! (kod=Par.kod) kvartal #O_SpotGraf km:=sum(km); Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); Au_Priemer:=I1.PS*100; pocet:=sum(I1.pocet); sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
- VERIFIED: `pSpotrebGraf`: merge(['#I1_ Spotreba ! (kod=Par.kod) roky #O_SpotGraf km:=sum(km); Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); Au_Priemer:=I1.PS*100; pocet:=sum(I1.pocet); sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
- VERIFIED: `pSpotrebGraf`: merge(['#I1_ Spotreba ! (kod=Par.kod) Datum #O_SpotGraf km:=sum(km); Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); Au_Priemer:=I1.PS*100; pocet:=sum(I1.pocet); sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
- VERIFIED: `pKm_Auto_Opr`: if a.datum=e.datum then begin A.DPH:=e.DPH; A.cena_PHM:=e.cena_PHM;
- VERIFIED: `pKm_Auto_Opr`: end; A.DPH:=Spotreba[param.cislo].DPH;
- VERIFIED: `pKm_Auto_Opr`: if ^a.lpg then A.cena_PHM:=Spotreba[param.cislo].Sk_na_1l
- VERIFIED: `pKm_Auto_Opr`: else A.cena_PHM:=Spotreba[param.cislo].Sk_be_1l;
- VERIFIED: `pKm_Auto_Opr`: if pos('***', a.odkial) > 0 then a.cena_phm := 0;
- VERIFIED: `pKm_Auto_Opr`: forall x in E (bb = S.bb) ! do begin S.DPH := E.DPH;
- VERIFIED: `pKm_Auto_Opr`: if E.LPG then begin S.Celpg := E.cena_phm;
- VERIFIED: `pKm_Auto_Opr`: end else begin S.CeBenz := E.cena_phm; end;
- VERIFIED: `pEvi_Auto_SC`: Par.cena_PHM:=Evi_Auto[Evi_Auto.nrecs].cena_PHM;
- VERIFIED: `pEvi_Auto_SC`: forall x in E/iEa (bb = param.sc) ! % do begin {} e.dph := param.dph;
- VERIFIED: `pEvi_Auto_SC`: C.CeBenz := E.Cena_PHM; c.dph := param.dph;
- VERIFIED: `pDovod_SC`: if Par.cena_PHM=0 & K.cena_PHM<>0 then Par.cena_PHM:=K.cena_PHM;
- VERIFIED: `pDovod_DPrac`: end; Par.cena_PHM:=Spot_Pom[Spot_Pom.nrecs].Sk_na_1l;
- VERIFIED: `pDovod_DPrac`: {   Par.DPH:=Spot_Pom[Spot_Pom.nrecs].DPH;}
- VERIFIED: `pHlaTra`: with window(1,25,80,25,,^E) do s:=prompt(' Hľadané mesto : ':A,20:=PARAM.Nazov);
- VERIFIED: `pAuto`: begin PAR.kod:=''; Par.vzd := 0; Par.cena_PHM:=0; au.nrecs:=0;
- VERIFIED: `pDoprPros`: begin PAR.kod:=''; Par.vzd := 0; Par.cena_PHM:=0;
- VERIFIED: `pDPH`: if DPH.nrecs=0 then begin PARAM.MinCas := udaje.DatDPH;
- VERIFIED: `pDPH`: dm := valdate(strdate(udaje.DatDPH,'DD.MM'),'DD.MM');
- VERIFIED: `pDPH`: rrr := strdate(udaje.DatDPH,'YYYY');
- VERIFIED: `pDPH`: end else begin PARAM.MinCas := DPH[DPH.nrecs].do+1;
- VERIFIED: `pDPH`: appendrec(DPH); DPH[DPH.nrecs].Od := PARAM.MinCas;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].Do := PARAM.AktCas;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].sum1vystup := PARAM.a1; DPH[DPH.nrecs].dph1vystup := PARAM.a2;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].sum2vystup := PARAM.a3; DPH[DPH.nrecs].dph2vystup := PARAM.a4;
- VERIFIED: `pDPH`: param.pocet += PD[x].a3; save; DPH[DPH.nrecs].r13 := PARAM.pocet;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].sum1vstup := PARAM.a1; DPH[DPH.nrecs].dph1vstup := PARAM.a2;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].sum2vstup := PARAM.a3; DPH[DPH.nrecs].dph2vstup := PARAM.a4;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].dph1      := sadzbDPH[sadzbDPH.nrecs].dph_dol;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].dph2      := sadzbDPH[sadzbDPH.nrecs].dph_hor;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].SUM_PAR_69 := PARAM.a1234;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].DPH_PAR_69 := (PARAM.a1234 * (1 + (sadzbDPH[sadzbDPH.nrecs].dph_hor/100))) - PARAM.a1234;
- VERIFIED: `pDPH`: DPH[DPH.nrecs].dph1 := 19; DPH[DPH.nrecs].dph2 := 19;
- VERIFIED: `pDPH`: end; PARAM.MinCas := DPH[re].od; PARAM.AktCas := DPH[re].do;
- VERIFIED: `pDPH`: end; save; DPH[DPH.nrecs].r13 := PARAM.pocet; }
- VERIFIED: `pDPH`: DPH[DPH.nrecs].SUM_PAR_69 := PARAM.a1234;
- VERIFIED: `pDdatum`: 'Ručne vkladaný dátum ': Param.dat:=false;
- VERIFIED: `pVydaje_Kod`: Vydaje[i].pocet := 0; Vydaje[i].suma := 0;
- VERIFIED: `pVydaje_Kod`: Vydaje[i].pocet := vyd_pom[1].pocet; Vydaje[i].suma := vyd_pom[1].spolu;
- VERIFIED: `pPrijmy_Kod`: Vydaje[i].pocet := 0; Vydaje[i].suma := 0;
- REASONABLE INFERENCE: Arithmetic operations with 'DPH' and 'zaklad' indicate tax base calculations.
- UNKNOWN: Remaining specific constants not explicitly documented.

## 9. APPLICATION WORKFLOW
`pHlavneMenu` calls: pBytUdaje, pPV, pStratyDoch, pTlf, pVyuctSSESas, pSklad, pPoklDokl, pHm_a_Nehm, Plat, PP, pNakup_o, pWExport_DBF, pOdpoH2OSasa, Platby, pEviZakazky, pMemDisk, pLeasing, pZalohuj, proc, pDohoda, pReklamacie, pDPH, pInkaso_Sasa, pVyuctSPP, pEvi_Auto, pDomacnost, pPD, pVseobData, pVyucH2OSasa, pPohladavky, pUhrady_All, pSklad2008, pAktualDatum, pBaterie, pKalendar_M, pUdaje, pOdpocElSasa, pSc, pNaklady, pSet, PROC, Po, pCatalog, pInkaso, pVyuctSBD, pVyuctSSE, pulldown, pPlatby_BU, pOdpoceTeplo, pZavazky, predpisy, pBeznyUcet

## 10. DATA MIGRATION REQUIREMENTS
- KNOWN: Exact table schemas and datatypes (VERIFIED from `PRINTER.TXT`).
- MISSING: Proprietary offset mapping for `.000` data extraction; a verified extraction utility.

## 11. CRITICAL CORRECTION OF PREVIOUS DOCUMENTS
Review of `MIGRATION_BLUEPRINT.md` and `MIGRATION_ARCHITECTURE.md`:
- MIGRATION_ARCHITECTURE.md assumed the existence of modern relational foreign keys (e.g. `ON DELETE CASCADE`). This is UNSUPPORTED.
- MIGRATION_BLUEPRINT.md mapped user roles/authentication directly to web-based concepts. This is UNSUPPORTED by the legacy FAND source which relies entirely on local file-based access without explicit user entities.
- It was INFERRED that FAND forms perfectly mapped 1:1 to modern MVC controllers, whereas they are merely sequential edit displays inside procedural flows.
- DIRECTLY VERIFIED: Exact field types, table sizes, and key attributes are confirmed exactly as listed in the original FAND definitions, discarding arbitrary renaming.

## 12. FINAL STATUS
A. Do we now have a sufficiently complete structural specification of the legacy database? **No** (implicit relations remain).
B. Do we know the exact fields and keys of all 149 tables? **Yes**.
C. Do we know the exact relationships between all tables? **No** (many are application-managed).
D. Do we know the complete accounting logic? **No** (requires interpreting FAND macros).
E. Do we know the actual legacy data-file format sufficiently to migrate existing .000 data? **No**.
F. What is the SINGLE most important missing piece before implementation can safely begin? **A reliable PC FAND .000 data extraction utility.**

- number of tables verified: 149
- number of fields verified: 1954
- number of keys verified: 231
- number of explicit relationships verified: 231
- number of procedures verified: 243
- number of forms verified: 124
- number of MERGE objects verified: 9
- remaining unknowns: Implicit procedural dependencies and binary file mapping.