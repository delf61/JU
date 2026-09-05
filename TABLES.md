# Complete Table Inventory

This file documents all `F*` data-file definitions identified in JU.RDB.

## FParamCat

- **FAND object name**: `FParamCat`
- **Corresponding physical file**: Likely `paramcat.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `tema` : `A,5;`
  - `text` : `T;`
- **Indexes**: Unknown.

## Fparam

- **FAND object name**: `Fparam`
- **Corresponding physical file**: Likely `param.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Rok` : `D,'YYYY';`
  - `SC` : `F,3,0;`
- **Indexes**: Unknown.

## FPar

- **FAND object name**: `FPar`
- **Corresponding physical file**: Likely `par.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `s01` : `F,3,0;`
  - `s08` : `F,3,0;`
  - `KP` : `F,3,0;`
  - `KZ` : `F,3,0;`
  - `zak` : `F,3,0;`
  - `ME` : `F,3,0;`
  - `uc` : `F,3,0;`
  - `sc` : `F,3,0;`
  - `pd` : `F,3,0;`
  - `dat` : `B;`
  - `a` : `A,30;`
  - `b` : `A,30;`
  - `c` : `A,8;`
  - `Titul` : `A,5;`
  - `Nazov` : `A,20;`
  - `Meno` : `A,10;`
  - `Priezv` : `A,15;`
  - `Miesto` : `A,20;`
  - `browse` : `B;`
  - `Datum` : `D,'DD.MM.YYYY';`
  - `Dat0` : `D,'MM.YYYY';`
  - `Dat1` : `D,'DD.MM.YYYY';`
  - `Dat2` : `D,'DD.MM.YYYY';`
  - `cislo` : `F,5,0;`
  - `pocet` : `F,5,0;`
  - `a1` : `F,6.2;  {Prijem`
- **Indexes**: Unknown.

## FKalendar.x

- **FAND object name**: `FKalendar.x`
- **Corresponding physical file**: Likely `kalendar.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a1234` : `F,6.2;`
  - `doklad` : `A,1;`
  - `prvy` : `B;`
  - `posl` : `B;`
  - `MinCas` : `D,'DD.MM.YYYY';`
  - `AktCas` : `D,'DD.MM.YYYY';`
  - `NameSearch` : `A,25 ;   { pole pro zad`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FDoklady

- **FAND object name**: `FDoklady`
- **Corresponding physical file**: Likely `doklady.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ok` : `B ;`
  - `nazmie` : `A,50;`
  - `Zaciat` : `D,'hh:mm';`
  - `koniec` : `D,'hh:mm';`
- **Indexes**: Unknown.

## FSadzbDPH

- **FAND object name**: `FSadzbDPH`
- **Corresponding physical file**: Likely `sadzbdph.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `var_sym` : `A,10;`
  - `kon_sym` : `A,10;`
  - `spc_sym` : `A,10;`
  - `intkodtov` : `F,10,0;`
- **Indexes**: Unknown.

## FStaty.x

- **FAND object name**: `FStaty.x`
- **Corresponding physical file**: Likely `staty.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Kod` : `A,3;`
  - `Trasa` : `A,6;`
  - `zaciatok` : `D,'DD.MM.YYYY';`
  - `zaciatoh` : `D,'hh:mm';`
  - `koniec` : `D,'DD.MM.YYYY';`
  - `konieh` : `D,'hh:mm';`
  - `zac_km` : `F,5,0;`
  - `vzd` : `F,4,0;`
  - `tra` : `F,3,0;`
  - `z` : `A,20;`
  - `do` : `A,20;`
  - `kam` : `A,40;`
  - `ucel` : `A,40;`
  - `cena_PHM` : `F,3.2;`
  - `dph_dol` : `F,2.1;`
  - `dph_hor` : `F,2.1;`
  - `kurzy` : `A,70;       { cesta k s`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FKraje.x

- **FAND object name**: `FKraje.x`
- **Corresponding physical file**: Likely `kraje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `BA` : `A,4;`
  - `CU` : `A,12;`
  - `banka` : `A,35;`
  - `zv` : `D,'DD.';    { pravidelne mesacne`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FOkresy.x

- **FAND object name**: `FOkresy.x`
- **Corresponding physical file**: Likely `okresy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Datum` : `D,'DD.MM.YYYY';`
  - `TypeDay` : `F,1.0;`
  - `Jmeno` : `A,25!;`
  - `Meno` : `A,25!;`
  - `T` : `T!;`
  - `sc` : `F,2,0;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FMesta.x

- **FAND object name**: `FMesta.x`
- **Corresponding physical file**: Likely `mesta.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `d` : `A,20;    {text                }`
  - `B` : `A,1;     {Skratka             }`
  - `AN` : `B;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FBanky.x

- **FAND object name**: `FBanky.x`
- **Corresponding physical file**: Likely `banky.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `DPH_Dol` : `F,2.1;`
  - `DPH_Hor` : `F,2.1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FTrasy.x

- **FAND object name**: `FTrasy.x`
- **Corresponding physical file**: Likely `trasy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `od` : `D,'DD.MM.YYYY';`
  - `do` : `D,'DD.MM.YYYY';`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUdajO.x

- **FAND object name**: `FUdajO.x`
- **Corresponding physical file**: Likely `udajo.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Stat` : `A,3;`
  - `Nazov` : `A,33;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FCinnosti.x

- **FAND object name**: `FCinnosti.x`
- **Corresponding physical file**: Likely `cinnosti.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KOD` : `A,'!';`
  - `NAZOV` : `A,20!;      { 60 }`
  - `KM2` : `F,4,0;`
  - `OBY` : `F,6,0;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUdaje

- **FAND object name**: `FUdaje`
- **Corresponding physical file**: Likely `udaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KOD` : `A,'!!';`
  - `NAZOV` : `A,20!;    { 60 }`
  - `KRAJ` : `A,1;`
  - `KM2` : `F,4,0;`
  - `OBY` : `F,6,0;`
- **Indexes**: Unknown.

## FUdajea

- **FAND object name**: `FUdajea`
- **Corresponding physical file**: Likely `udajea.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `kod` : `A,4;`
  - `NAZOV` : `A,20 ;     { 60 }`
  - `OKRES` : `A,'!!';`
  - `TEL` : `A,8 ;`
  - `PSC` : `A,5 ;`
- **Indexes**: Unknown.

## FVydaje.x

- **FAND object name**: `FVydaje.x`
- **Corresponding physical file**: Likely `vydaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KODban` : `A,4!;`
  - `SKRATKA` : `A,10!;`
  - `popis` : `A,40!;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUcty.x

- **FAND object name**: `FUcty.x`
- **Corresponding physical file**: Likely `ucty.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `tra` : `F,3,0;`
  - `z` : `A,20;`
  - `do` : `A,20;`
  - `vzd` : `F,4,0;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUcet.x

- **FAND object name**: `FUcet.x`
- **Corresponding physical file**: Likely `ucet.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `mesto_2_km_pocet` : `F,2,0;`
  - `mesto_5_km_pocet` : `F,2,0;`
  - `mesto_10_km_pocet` : `F,2,0;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUcetImpo.x

- **FAND object name**: `FUcetImpo.x`
- **Corresponding physical file**: Likely `ucetimpo.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KODcin` : `F,3,0;`
  - `cinnos` : `A,60;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fkurzy.x

- **FAND object name**: `Fkurzy.x`
- **Corresponding physical file**: Likely `kurzy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `kodop` : `F,3,0;`
  - `firma` : `A,30;`
  - `meno` : `A,30;`
  - `cinnos` : `A,60; { cinnosti }`
  - `ulica` : `A,20;`
  - `psc` : `A,6;`
  - `miesto` : `A,20;`
  - `tlf` : `A,15;`
  - `tlfa` : `A,15;`
  - `tlfb` : `A,40;`
  - `fax` : `A,15;`
  - `ICO` : `A,10;`
  - `PenUst` : `A,20;`
  - `Cu` : `A,20;`
  - `Pozn` : `A,60;`
  - `DRC` : `A,15;`
  - `ICPD` : `A,15;`
  - `var_sym` : `A,10;`
  - `kon_sym` : `A,10;`
  - `spc_sym` : `A,10;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FPV

- **FAND object name**: `FPV`
- **Corresponding physical file**: Likely `pv.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ku` : `D,'DD.MM.';`
  - `x` : `F,6.2;              {z`
- **Indexes**: Unknown.

## FstraDoch.x

- **FAND object name**: `FstraDoch.x`
- **Corresponding physical file**: Likely `stradoch.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `BA` : `A,4;`
  - `Cu` : `A,20;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FDoprPros.x

- **FAND object name**: `FDoprPros.x`
- **Corresponding physical file**: Likely `doprpros.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `meno` : `A,10;`
  - `priezv` : `A,15;`
  - `titul` : `A,5;`
  - `nazov` : `A,40;`
  - `ICO` : `A,10;`
  - `DIC` : `A,10;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FAuto.x

- **FAND object name**: `FAuto.x`
- **Corresponding physical file**: Likely `auto.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ICPD` : `A,15;`
  - `drcDPH` : `A,15;`
  - `DatDPH` : `D,'DD.MM.YYYY';`
  - `Q_M` : `A,1!;`
  - `sadzba` : `F,2.1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FSumaPD

- **FAND object name**: `FSumaPD`
- **Corresponding physical file**: Likely `sumapd.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `uli` : `A,20;`
  - `cis` : `A,5;`
  - `PSC` : `A,6;`
  - `miesto` : `A,20;`
  - `tlf` : `A,13;`
  - `tlf1` : `A,13;`
  - `mobil` : `A,13;`
  - `mobil1` : `A,13;`
  - `fax` : `A,13;`
  - `fax1` : `A,13;`
  - `email` : `A,28;`
  - `hodsadzba` : `F,2.2;`
  - `PRGhodsadzba` : `F,2.2;`
- **Indexes**: Unknown.

## FPD

- **FAND object name**: `FPD`
- **Corresponding physical file**: Likely `pd.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Kod` : `A,1;`
  - `d` : `A,20;    {Popisny text                                               }`
  - `v` : `B;       {                                                           }`
  - `r` : `B;       {Celkove prijmy ?                                           }`
  - `p` : `B;       {Priebezne prijmy ?                                         }`
  - `m` : `B;       {tovar                                                      }`
  - `b` : `B;       {tovar vrateny dodavatelovi                                 }`
  - `z` : `B;       {zak`
- **Indexes**: Unknown.

## FSC.x

- **FAND object name**: `FSC.x`
- **Corresponding physical file**: Likely `sc.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `kod` : `A,1;`
  - `d` : `A,30;   { Popisny text                                  }`
  - `pv` : `B;      { vydaj - true    prijem - false                }`
  - `r` : `B;      { Celkove vydavky ?                             }`
  - `p` : `B;      { Priebezne vydavky ?                           }`
  - `b7` : `B;      { drobn`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fold_Auto.x

- **FAND object name**: `Fold_Auto.x`
- **Corresponding physical file**: Likely `old_auto.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `b11` : `B;      { poistne zo zakona                             }`
  - `b12` : `B;      { rezia`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FEvi_Auto.x

- **FAND object name**: `FEvi_Auto.x`
- **Corresponding physical file**: Likely `evi_auto.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `b13` : `B;      { PHM pre SC                                    }`
  - `b14` : `B;      { HaN invest. majetok (ZP)                      }`
  - `b15` : `B;      { tovar - zak`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FIKzp

- **FAND object name**: `FIKzp`
- **Corresponding physical file**: Likely `ikzp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `b16` : `B;      { dan z prijmu                                  }`
  - `b17` : `B;      { osobny ucet                                   }`
  - `b20` : `B;      { material                                      }`
- **Indexes**: Unknown.

## FIKdkp

- **FAND object name**: `FIKdkp`
- **Corresponding physical file**: Likely `ikdkp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KODVYD` : `A,1;`
  - `D` : `A,30;         { popis }`
  - `PV` : `B;            { vydaj - true    prijem - false                }`
  - `R` : `B;            { celkove }`
  - `P` : `B;            { priebezne }`
  - `M` : `B;            { predaj tovaru              }`
  - `B` : `B;            { tovar vrateny dodavatelovi }`
  - `Z` : `B;            { zakazky - sluzby, vyrobky  }`
  - `B7` : `B;           { drobn`
- **Indexes**: Unknown.

## FLeasing

- **FAND object name**: `FLeasing`
- **Corresponding physical file**: Likely `leasing.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `B12` : `B;          { rezia                                         }`
  - `B13` : `B;          { PHM pre SC                                    }`
  - `B14` : `B;          { HaN invest. majetok (ZP)                      }`
  - `B15` : `B;          { tovar - zak`
- **Indexes**: Unknown.

## FZamestna.x

- **FAND object name**: `FZamestna.x`
- **Corresponding physical file**: Likely `zamestna.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `B16` : `B;          { dan z prijmu                                  }`
  - `B17` : `B;          { osobny ucet                                   }`
  - `B20` : `B;          { material                                      }`
  - `POCET` : `F,5`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FDohoda

- **FAND object name**: `FDohoda`
- **Corresponding physical file**: Likely `dohoda.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `X` : `B;            { pravidelna platba }`
  - `SUMA` : `F,6.2;`
- **Indexes**: Unknown.

## FEZ.x

- **FAND object name**: `FEZ.x`
- **Corresponding physical file**: Likely `ez.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ba` : `A,4;                {Banka - kod}`
  - `pr` : `A,6;                {predcislie}`
  - `cu` : `A,12;               {Banka -`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fevizak.dbf

- **FAND object name**: `Fevizak.dbf`
- **Corresponding physical file**: Likely `evizak.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `zv_od` : `D,'DD.MM.YYYY';  {PMZV od}`
  - `zv_do` : `D,'DD.MM.YYYY';  {PMZV do}`
  - `os` : `B;                  {A=osobny, N=podnikatelsky}`
  - `popis` : `A,20;`
- **Indexes**: Unknown.

## FDen_Prac.x

- **FAND object name**: `FDen_Prac.x`
- **Corresponding physical file**: Likely `den_prac.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ba` : `A,4;                {Banka - kod}`
  - `cu` : `A,12;               {Banka -`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FSklad.x

- **FAND object name**: `FSklad.x`
- **Corresponding physical file**: Likely `sklad.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `datum` : `D,'DD.MM.YYYY';`
  - `v_s` : `A,10;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fskla2008.x

- **FAND object name**: `Fskla2008.x`
- **Corresponding physical file**: Likely `skla2008.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';      {vypis zo dna}`
  - `b` : `A,8;                 {interne oznacenie}`
  - `c` : `A,13;                {Oznacenie : cislo faktury, resp. VS}`
  - `d` : `D,'DD.MM.YYYY';      {den realizacie platby}`
  - `ba` : `A,4;                {Banka - kod}`
  - `cu` : `A,12;               {Banka -`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fsesit.dbf

- **FAND object name**: `Fsesit.dbf`
- **Corresponding physical file**: Likely `sesit.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ua` : `A,40;               {Ucel platby}`
  - `pa` : `F,6.2;              {Prijem - vydaj}`
  - `qa` : `B;                  {Priebezna polozka ?}`
  - `ra` : `B;                  {Celkova polozka ?}`
  - `ba1` : `A,4;               {Banka part`
- **Indexes**: Unknown.

## FKZ.x

- **FAND object name**: `FKZ.x`
- **Corresponding physical file**: Likely `kz.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `nova` : `B;`
  - `vydaj` : `A,1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FKZpol.x

- **FAND object name**: `FKZpol.x`
- **Corresponding physical file**: Likely `kzpol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `datum` : `D,'DD.MM.YYYY';`
  - `krajina` : `A,15;`
  - `mnoz` : `F,4,0;`
  - `kod` : `A,3;`
  - `d_nakup` : `F,3.3;`
  - `d_predaj` : `F,3.3;`
  - `d_kurz_NBS` : `F,3.3;`
  - `v_nakup` : `F,3.3;`
  - `v_predaj` : `F,3.3;`
  - `v_kurz_NBS` : `F,3.3;`
  - `zaujimave` : `B;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FKP.x

- **FAND object name**: `FKP.x`
- **Corresponding physical file**: Likely `kp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';      { zo dna                 }`
  - `b` : `A,8;                 { Oznacenie              }`
  - `ph` : `F,6.2;              { PoY. stav - poklad`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FKPpol.x

- **FAND object name**: `FKPpol.x`
- **Corresponding physical file**: Likely `kppol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `h` : `A,13;                { Doklad                 }`
  - `pu` : `F,6.2;              { PoY. stav  - ucet      }`
  - `u` : `A,13;                { Doklad                 }`
  - `m` : `F,6.2;               { majetok                }`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FREKL.x

- **FAND object name**: `FREKL.x`
- **Corresponding physical file**: Likely `rekl.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `HaN` : `F,6.2;             { HaN invest. majetok    }`
  - `poh` : `F,6.2;             { poh-ad`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FREKLpol.x

- **FAND object name**: `FREKLpol.x`
- **Corresponding physical file**: Likely `reklpol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `rok` : `F,4,0;`
  - `strata` : `F,6.2;`
  - `nezdan_suma` : `F,6.2;`
  - `hra_min_prijmu` : `F,6.2;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FUhrady.x

- **FAND object name**: `FUhrady.x`
- **Corresponding physical file**: Likely `uhrady.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `skr` : `A,3;`
  - `prostr` : `A,20;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FMesiace

- **FAND object name**: `FMesiace`
- **Corresponding physical file**: Likely `mesiace.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Kod` : `A,3;`
  - `Typ` : `A,20;`
  - `SPZ` : `A,10;`
  - `ehme` : `F,2.1;   { EHK mesto }`
  - `eh90` : `F,2.1;   { EHK 90 }`
  - `eh120` : `F,2.1;   { EHK 120 }`
  - `esme` : `F,2.1;   { ES  mesto }`
  - `esmi` : `F,2.1;   { ES  mimo mesta }`
  - `esko` : `F,2.1;   { ES  kombinovana }`
  - `STN` : `F,2.1;    { STN priemern`
- **Indexes**: Unknown.

## FEkonom

- **FAND object name**: `FEkonom`
- **Corresponding physical file**: Likely `ekonom.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `koef` : `F,1.1;    { STN koef. - spotreba v meste }`
  - `Pal` : `A,20;`
  - `LPG` : `F,2.1;`
  - `Fir` : `B;        { auto je zahrnut`
- **Indexes**: Unknown.

## FSpotPrie

- **FAND object name**: `FSpotPrie`
- **Corresponding physical file**: Likely `spotprie.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Pou` : `B;        { Aktualne sa pouziva }`
  - `motor` : `F,1.1;`
  - `nadrz` : `F,2,0;`
  - `nadrz_LPG` : `F,2,0;`
- **Indexes**: Unknown.

## FSpotreba.x

- **FAND object name**: `FSpotreba.x`
- **Corresponding physical file**: Likely `spotreba.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY'; {Datum                                               }`
  - `PO` : `F,4.0;`
  - `P1` : `F,6.2;  {hotovost`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fsc_roky

- **FAND object name**: `Fsc_roky`
- **Corresponding physical file**: Likely `sc_roky.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a20` : `F,6.2; {Majetok} {PD}`
  - `a22` : `F,6.2; {DPH    }`
  - `zZP` : `F,6.2;            { ZP na zac. obdobia }`
  - `odpisy` : `F,6.2;`
  - `ZP` : `F,6.2;            { ZP na kon. obdobia }`
  - `leas` : `F,6.2;`
  - `ucet_prijem` : `F,6.2;  {`
- **Indexes**: Unknown.

## Fvyrocia

- **FAND object name**: `Fvyrocia`
- **Corresponding physical file**: Likely `vyrocia.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `strata` : `F,6.2;     { strata za predosle uctovne obdobie }`
  - `dochodok` : `F,6.2;   { rocny dochodok za predosle uctovne obdobie }`
  - `nezdan_suma` : `F,6.2;`
  - `rok_1` : `A,4;`
  - `hra_min_prijmu` : `F,6.2;`
- **Indexes**: Unknown.

## Fdelf

- **FAND object name**: `Fdelf`
- **Corresponding physical file**: Likely `delf.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY'; {Datum                                               }`
  - `b` : `A,13;    {Oznacovanie poloziek dennika - interne prepojenie so subormi PD }`
  - `zp` : `D,'DD.MM.YYYY';    { datum zdanitelneho plnenia }`
  - `kodOP` : `F,3,0;`
  - `c` : `A,13;    {Externe oznacenie dokladu - ak existuje ... }`
  - `d` : `A,56;    {Popisny text                                               }`
  - `r` : `B;       {Celkova polozka ?                                          }`
  - `p` : `B;       {Priebezna polozka ?`
- **Indexes**: Unknown.

## Fdph

- **FAND object name**: `Fdph`
- **Corresponding physical file**: Likely `dph.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Vydaj` : `A,1;                              {      Rozpis vydavkov       }`
  - `a7` : `F,6.2;  {drobny HaN majetok`
- **Indexes**: Unknown.

## Fpohl.dbf

- **FAND object name**: `Fpohl.dbf`
- **Corresponding physical file**: Likely `pohl.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `dph` : `F,2.1; { sadzba dane v % pd}`
  - `hal_p` : `F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}`
  - `hal` : `F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}`
- **Indexes**: Unknown.

## FPoklDokl

- **FAND object name**: `FPoklDokl`
- **Corresponding physical file**: Likely `pokldokl.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `zaciatok` : `D,'DD.MM.YYYY';`
  - `zaciatoh` : `D,'hh:mm';`
  - `koniec` : `D,'DD.MM.YYYY';`
  - `konieh` : `D,'hh:mm';`
  - `BB` : `F,3.0;`
  - `B` : `A,8;`
  - `prostr` : `A,3;                     {Pouz. dopr. prostr. A, V, Au, AuV}`
  - `CES` : `F,4.2;`
  - `UBY` : `F,4.2;`
  - `KAM` : `A,40;`
  - `UCEL1` : `A,40;`
  - `UCEL2` : `A,40;`
  - `BenKM` : `F,4.2;`
  - `PocKM` : `F,4.2;`
  - `MENO` : `A,20;`
  - `BYDL` : `A,30;`
  - `dat` : `D,'DD.MM.YYYY';`
  - `KONST` : `F,3.2;`
  - `CeBenz` : `F,3.2;`
  - `CeLpg` : `F,3.2;`
  - `DPH` : `F,2.1;`
- **Indexes**: Unknown.

## Frevolv

- **FAND object name**: `Frevolv`
- **Corresponding physical file**: Likely `revolv.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `BenPocetMiest` : `F,1,0;`
  - `PocetMiest` : `F,1,0;`
- **Indexes**: Unknown.

## FBytUdaje

- **FAND object name**: `FBytUdaje`
- **Corresponding physical file**: Likely `bytudaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `datum` : `D,'DD.MM.YYYY';`
  - `zaciatok` : `D,'hh:mm';`
  - `koniec` : `D,'hh:mm';`
  - `bb` : `F,3,0;`
  - `tra` : `F,3,0;`
  - `mesto_2_km_pocet` : `F,2,0;`
  - `mesto_5_km_pocet` : `F,2,0;`
  - `mesto_10_km_pocet` : `F,2,0;`
  - `odkial` : `A,20;`
  - `kam` : `A,20;`
  - `ucel` : `A,40;`
  - `Zac_km` : `F,6,0;`
  - `Kon_km` : `F,6,0;`
  - `konst` : `F,3.2;`
  - `cena_PHM` : `F,3.2;`
  - `Kod` : `A,3;`
  - `nova` : `B;`
  - `dph` : `F,2.1; { sadzba dane v % }`
- **Indexes**: Unknown.

## FDomUdaje

- **FAND object name**: `FDomUdaje`
- **Corresponding physical file**: Likely `domudaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `LPG` : `B;`
  - `text_1` : `A,40;`
  - `text_2` : `A,40;`
  - `text_3` : `A,40;`
- **Indexes**: Unknown.

## FVyuctSBD

- **FAND object name**: `FVyuctSBD`
- **Corresponding physical file**: Likely `vyuctsbd.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `datum` : `D,'DD.MM.YYYY';`
  - `zaciatok` : `D,'hh:mm';`
  - `koniec` : `D,'hh:mm';`
  - `bb` : `F,3,0;`
  - `tra` : `F,3,0;`
  - `mesto_2_km_pocet` : `F,2,0;`
  - `mesto_5_km_pocet` : `F,2,0;`
  - `mesto_10_km_pocet` : `F,2,0;`
  - `odkial` : `A,20;`
  - `kam` : `A,20;`
  - `ucel` : `A,40;`
  - `Zac_km` : `F,6,0;`
  - `Kon_km` : `F,6,0;`
  - `konst` : `F,3.2;`
  - `cena_PHM` : `F,3.2;`
  - `Kod` : `A,3;`
  - `nova` : `B;`
  - `dph` : `F,2.1; { sadzba dane v % }`
  - `PHM_zac` : `F,2.1;`
- **Indexes**: Unknown.

## FByt.x

- **FAND object name**: `FByt.x`
- **Corresponding physical file**: Likely `byt.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `LPG` : `B;`
  - `text_1` : `A,40;`
  - `text_2` : `A,40;`
  - `text_3` : `A,40;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FPoist_ne

- **FAND object name**: `FPoist_ne`
- **Corresponding physical file**: Likely `poist_ne.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do IK}`
  - `b` : `A,8;                {Inventarne cislo}`
  - `C` : `F,4.0;`
  - `vy` : `A,30;              {Vyrobca / Miesto a sidlo}`
  - `n` : `A,40;               {Typ / Nazov}`
  - `vc` : `A,15;              {Vyrobne cislo}`
  - `rv` : `D,'YYYY';          {Rok vyroby    dikzp }`
  - `hb` : `D,'DD.MM.YYYY';    {    datum                       }`
  - `h` : `F,6.2;              { obstarav. cena s DPH           }`
  - `p` : `A,13;               { Doklad}`
  - `u` : `F,6.2;              {   vyska odpisu do zac. aktual. ob`
- **Indexes**: Unknown.

## FPoistky

- **FAND object name**: `FPoistky`
- **Corresponding physical file**: Likely `poistky.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `hz` : `F,6.2;             {hodnota ZP na zaciatku aktual. zuctovacieho obdobia}`
  - `r` : `A,13;               {Doklad}`
  - `d` : `A,50;               {Dodavatel / Miesto a sidlo}`
  - `v` : `D,'DD.MM.YYYY';     {Vyradenie z IK}`
  - `sv` : `A,35;              {Sposob vyradenia}`
  - `SO` : `A,'$';             {Sp`
- **Indexes**: Unknown.

## FVyuctSSE.x

- **FAND object name**: `FVyuctSSE.x`
- **Corresponding physical file**: Likely `vyuctsse.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `fdo` : `A,10;  { faktura od dodavatela  - oznac. dodavatela}`
  - `fd` : `A,8;    { faktura od dodavatela  - interne oznac. JU}`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FVyuSSESa.x

- **FAND object name**: `FVyuSSESa.x`
- **Corresponding physical file**: Likely `vyussesa.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do IK}`
  - `b` : `A,8;                {Inventarne cislo}`
  - `C` : `F,4.0;`
  - `n` : `A,40;               {Typ / Nazov}`
  - `mn` : `F,4.0;             {Mnozstvo}`
  - `jc` : `F,6.2;             {Jednotkova cena}`
  - `hb` : `D,'DD.MM.YYYY';    { datum  - hotovos`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FElSasa.x

- **FAND object name**: `FElSasa.x`
- **Corresponding physical file**: Likely `elsasa.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `h` : `F,6.2;              { vyplatene v hotovosti }`
  - `p` : `A,13;               {Oznacenie dokladu}`
  - `u` : `F,6.2;              { vyplatene cez ucet    }`
  - `r` : `A,13;               {Oz`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FVyucVeol.x

- **FAND object name**: `FVyucVeol.x`
- **Corresponding physical file**: Likely `vyucveol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `d` : `A,30;               {Dodavatel / Miesto a sidlo}`
  - `v` : `D,'DD.MM.YYYY';     {Vyradenie z IK}`
  - `sv` : `A,35;              {Sposob vyradenia}`
  - `FDO` : `A,10;`
  - `FD` : `A,8;`
  - `FV` : `A,8;`
  - `DPH` : `F,2.1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FH2O_Sasa.x

- **FAND object name**: `FH2O_Sasa.x`
- **Corresponding physical file**: Likely `h2o_sasa.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do FL}`
  - `b` : `A,8;                {Inventarne cislo}`
  - `vy` : `A,30;              {Vyrobca / Miesto a sidlo}`
  - `n` : `A,40;               {Typ / Nazov}`
  - `vc` : `A,15;              {Vyrobne cislo}`
  - `rv` : `D,'YYYY';          {Rok vyroby}`
  - `hz` : `F,6.2;             {Nadob`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FBaterie.x

- **FAND object name**: `FBaterie.x`
- **Corresponding physical file**: Likely `baterie.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `pois` : `F,6.2;`
  - `mes` : `F,2,0;            {doba trvania LZ v mesiacoch}`
  - `d` : `A,30;               {Dodavatel / Miesto a s`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FBat_nabi

- **FAND object name**: `FBat_nabi`
- **Corresponding physical file**: Likely `bat_nabi.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ls` : `A,30;              {LS / Miesto a sidlo}`
  - `v` : `D,'DD.MM.YYYY';     {Vyradenie z IK}`
  - `sv` : `A,35;              {Sposob vyradenia}`
  - `RO` : `F,2.0;             {Rok spl`
- **Indexes**: Unknown.

## FTeplo.x

- **FAND object name**: `FTeplo.x`
- **Corresponding physical file**: Likely `teplo.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `zamest` : `A,25;`
  - `RC` : `A,'999999-9999';`
  - `doklad` : `A,10;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FVyuctSPP.x

- **FAND object name**: `FVyuctSPP.x`
- **Corresponding physical file**: Likely `vyuctspp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `uli` : `A,20;`
  - `PSC` : `A,6;`
  - `miesto` : `A,20;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FInkaso.x

- **FAND object name**: `FInkaso.x`
- **Corresponding physical file**: Likely `inkaso.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do ME}`
  - `b` : `A,8;                {Interne oznacenie ME - v PD ako polozka c}`
  - `zamest` : `A,25; {nesmie sa dat editovat !!!!}`
  - `n` : `A,40;               {Text}`
  - `v` : `F,6.2;              {v??ka odmeny}`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FInkaSasa.x

- **FAND object name**: `FInkaSasa.x`
- **Corresponding physical file**: Likely `inkasasa.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Datum prijatia zakazky}`
  - `b` : `A,8;                {Interne oznacenie zakazky}`
  - `KODOP` : `F,3.0;`
  - `zc` : `A,10;              {Zakazkove cislo}`
  - `od` : `A,50;              {zakaznik}`
  - `dz` : `A,10;              {Druh zakazky}`
  - `n` : `A,40;               {Nazov}`
  - `bk` : `D,'DD.MM.YYYY';    {Datum ukoncenia zakazky - den fakturacie}`
  - `ob` : `A,13;              {Doklad o fakturacii}`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FPlatby.x

- **FAND object name**: `FPlatby.x`
- **Corresponding physical file**: Likely `platby.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Hodiny` : `F,3.1;       {Dalsie udaje pre dolozenie ceny}`
  - `PRACE` : `F,2.0;`
  - `PRIJEM` : `A,1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FDruhDruh.x

- **FAND object name**: `FDruhDruh.x`
- **Corresponding physical file**: Likely `druhdruh.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `BK` : `D,'DD.MM.YYYY';`
  - `BM` : `F,4.2;`
  - `A` : `D,'DD.MM.YYYY';`
  - `B` : `A,8;`
  - `OD` : `A,41;`
  - `OB` : `A,11;`
  - `HODINY` : `F,2.0;`
  - `PRACE` : `F,2.0;`
  - `SPOLU` : `A,7;`
  - `KODOP` : `A,4;`
  - `KODPRI` : `A,1;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FDruhTova.x

- **FAND object name**: `FDruhTova.x`
- **Corresponding physical file**: Likely `druhtova.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';  { EZ     Datum prijatia zakazky    }`
  - `b` : `A,8;                    { Interne oznacenie zakazky }`
  - `DATUM` : `D,'DD.MM.YYYY';`
  - `Zaciat` : `D,'hh:mm';`
  - `Koniec` : `D,'hh:mm';`
  - `u_zakaz` : `B;              { pr`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FObchody.x

- **FAND object name**: `FObchody.x`
- **Corresponding physical file**: Likely `obchody.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `TEXT_1` : `A,60;`
  - `TEXT_2` : `A,60;`
  - `TEXT_3` : `A,60;`
  - `bb` : `F,3,0;`
  - `program` : `B;`
  - `TEXT` : `A,255;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FTovary.x

- **FAND object name**: `FTovary.x`
- **Corresponding physical file**: Likely `tovary.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `INTKODTOV` : `F,10,0;`
  - `A` : `D,'DD.MM.YYYY';`
  - `B` : `A,8;`
  - `POPIS1` : `A,38;`
  - `VYDaj` : `A,1;`
  - `MNOZSTVO` : `F,3.0;`
  - `MERJEDN` : `A,3;`
  - `nakupcena` : `F,6.2;`
  - `DPH` : `F,2.0;`
  - `VYRCISLO` : `A,19;`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FNakup_o.x

- **FAND object name**: `FNakup_o.x`
- **Corresponding physical file**: Likely `nakup_o.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do IK - prijem}`
  - `b` : `A,8;                { KZ.b }`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## FNakup_t.x

- **FAND object name**: `FNakup_t.x`
- **Corresponding physical file**: Likely `nakup_t.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `popis1` : `A,40;`
  - `popis2` : `A,40;`
  - `mnozstvo` : `F,4.0;`
  - `na_vydaj` : `F,4.0;`
  - `nakupcena` : `F,6.2;      {Jednotkova cena s DPH}`
  - `d` : `A,50;               {Dodavatel / Miesto a sidlo}`
  - `v` : `D,'DD.MM.YYYY';     {zaruka_do}`
  - `sv` : `A,35;              {Sposob vyradenia}`
- **Indexes**: Yes (explicit `.x` suffix indicates an index file exists).

## Fdpd.dbf

- **FAND object name**: `Fdpd.dbf`
- **Corresponding physical file**: Likely `dpd.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `fdo` : `A,10;  { faktura od dodavatela  - oznac. dodavatela }`
  - `fd` : `A,8;    { faktura od dodavatela  - interne oznac`
- **Indexes**: Unknown.

## Fdkp.dbf

- **FAND object name**: `Fdkp.dbf`
- **Corresponding physical file**: Likely `dkp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `dph` : `F,2.1; { sadzba dane v % }`
  - `vyrcislo` : `A,25;`
  - `merjedn` : `A,3;`
  - `intkodtov` : `F,10,0;`
  - `mes` : `F,2,0;      { zaruka }`
- **Indexes**: Unknown.

## Fdkppol.dbf

- **FAND object name**: `Fdkppol.dbf`
- **Corresponding physical file**: Likely `dkppol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do IK - prijem}`
  - `b` : `A,8;                { KZ.b }`
- **Indexes**: Unknown.

## Fdkraje.dbf

- **FAND object name**: `Fdkraje.dbf`
- **Corresponding physical file**: Likely `dkraje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `popis1` : `A,40;`
  - `popis2` : `A,40;`
  - `mnozstvo` : `F,4.0;`
  - `na_vydaj` : `F,4.0;`
  - `nakupcena` : `F,6.2;      {Jednotkova cena s DPH}`
  - `d` : `A,50;               {Dodavatel / Miesto a sidlo}`
  - `v` : `D,'DD.MM.YYYY';     {Vyradenie z IK - vydaj}`
  - `sv` : `A,35;              {Sposob vyradenia}`
- **Indexes**: Unknown.

## Fdokresy.dbf

- **FAND object name**: `Fdokresy.dbf`
- **Corresponding physical file**: Likely `dokresy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `fdo` : `A,10;  { faktura od dodavatela  - oznac. dodavatela }`
  - `fd` : `A,8;    { faktura od dodavatela  -`
- **Indexes**: Unknown.

## Fdmesta.dbf

- **FAND object name**: `Fdmesta.dbf`
- **Corresponding physical file**: Likely `dmesta.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `dph` : `F,2.1; { sadzba dane v % }`
  - `vyrcislo` : `A,25;`
  - `merjedn` : `A,3;`
  - `intkodtov` : `F,10,0;`
  - `mes` : `F,2,0;      { zaruka }`
- **Indexes**: Unknown.

## Fdbanky.dbf

- **FAND object name**: `Fdbanky.dbf`
- **Corresponding physical file**: Likely `dbanky.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do KZ}`
  - `b` : `A,8;                {Interne oznacenie Z}`
  - `kodOP` : `F,3,0;`
  - `od` : `A,50;              {Dodavatel}`
  - `n` : `A,40;               {Text}`
  - `x` : `F,6.2;              {z`
- **Indexes**: Unknown.

## Fdkurzy.dbf

- **FAND object name**: `Fdkurzy.dbf`
- **Corresponding physical file**: Likely `dkurzy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `pc` : `F,6.2;             { uhradene }`
  - `splat` : `D,'DD.MM.YYYY'; {splatn`
- **Indexes**: Unknown.

## Fdudaje.dbf

- **FAND object name**: `Fdudaje.dbf`
- **Corresponding physical file**: Likely `dudaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `stala` : `A,1;`
  - `mes` : `F,2,0;`
  - `uhr_do` : `F,2,0;`
  - `od_ucet` : `A,20;`
  - `var_sym` : `A,`
- **Indexes**: Unknown.

## Fdprijmy.dbf

- **FAND object name**: `Fdprijmy.dbf`
- **Corresponding physical file**: Likely `dprijmy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `kon_sym` : `A,10;`
  - `spc_sym` : `A,10;`
  - `spc_mes` : `F,2,0;`
  - `dph` : `F,2.1;  { sadzba dane v % nad 15 }`
  - `dph_1` : `F,2.1; { sadzba dane v % do 15 }`
  - `Vydaj` : `A,1;`
  - `Zp` : `D,'DD.MM.YYYY'; { Zdanitelne obdobie }`
  - `U_H` : `A,1;  { ucet=U, hotovost=H, mix=X }`
- **Indexes**: Unknown.

## Fdvydaje.dbf

- **FAND object name**: `Fdvydaje.dbf`
- **Corresponding physical file**: Likely `dvydaje.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `vyrovn` : `F,1.2;`
  - `bb` : `F,3,0;`
  - `hod` : `D,'hh:mm';`
- **Indexes**: Unknown.

## Fducty.dbf

- **FAND object name**: `Fducty.dbf`
- **Corresponding physical file**: Likely `ducty.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `A` : `D,'DD.MM.YYYY';`
  - `B` : `A,8;`
  - `INTKODTOV` : `F,10.0;`
  - `POPIS1` : `A,40;`
  - `POPIS2` : `A,40;`
  - `KODVYD` : `A,1;`
  - `MNOZSTVO` : `F,6.2;`
  - `MERJEDN` : `A,3;`
  - `NAKUPCENA` : `F,6.2;`
  - `DPH` : `F,2.1;`
  - `VYRCISLO` : `A,25;`
  - `Vydaj` : `A,1;`
  - `mes` : `F,2,0;      { zaruka }`
- **Indexes**: Unknown.

## Fducet.dbf

- **FAND object name**: `Fducet.dbf`
- **Corresponding physical file**: Likely `ducet.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do KP}`
  - `b` : `A,8;                {Interne oznacenie P}`
  - `KODOP` : `F,3.0;`
  - `od` : `A,50;              {Odberatel}`
  - `n` : `A,40;               {Text}`
  - `z` : `F,6.2;             {pohladavka bez dane}`
  - `pc` : `F,6.2;             { uhradene  }`
  - `dph` : `F,2.1;`
  - `ds` : `D,'DD.MM.YYYY';`
  - `zp` : `D,'DD.MM.YYYY';    {zdanitelne plnenie}`
- **Indexes**: Unknown.

## Fdstrata.dbf

- **FAND object name**: `Fdstrata.dbf`
- **Corresponding physical file**: Likely `dstrata.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KODPRI` : `A,1;`
  - `U_H` : `A,1;`
  - `TOVAR` : `F,6.2;`
  - `SPOSOB_UHR` : `A,25;`
  - `OBJEDNAVKA` : `A,25;`
  - `zamok` : `A,1;`
  - `PRIJEM` : `A,1;`
- **Indexes**: Unknown.

## Fdpokldok

- **FAND object name**: `Fdpokldok`
- **Corresponding physical file**: Likely `dpokldok.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `bb` : `F,3,0;`
  - `hod` : `D,'hh:mm';`
- **Indexes**: Unknown.

## Fdauto.dbf

- **FAND object name**: `Fdauto.dbf`
- **Corresponding physical file**: Likely `dauto.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `ArcIntCis` : `A,1;`
  - `zaloha` : `F,6.2;`
- **Indexes**: Unknown.

## Fdtrasy.dbf

- **FAND object name**: `Fdtrasy.dbf`
- **Corresponding physical file**: Likely `dtrasy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do KZ}`
  - `b` : `A,8;                {Interne oznacenie Z}`
  - `c` : `D,'DD.MM.YYYY';     {Zaradenie do KP}`
  - `d` : `A,8;                {Interne oznacenie P}`
  - `popis1` : `A,40;`
  - `popis2` : `A,40;`
  - `Prijem` : `A,1;`
  - `mnozstvo` : `F,6.2;     { skutocne }`
  - `mnozstvo_z` : `F,6.2;   { do zakaznickej fa. }`
  - `merjedn` : `A,3;`
  - `nakupcena` : `F,6.2;    { bez DPH }`
  - `op` : `F,2.6;          { obch. prir.}`
  - `op_z` : `F,2.6;        { obch. prir. do zakaznickej fa. }`
  - `dph` : `F,2.1;`
  - `vyrcislo` : `A,25`
- **Indexes**: Unknown.

## Fdsumapd.dbf

- **FAND object name**: `Fdsumapd.dbf`
- **Corresponding physical file**: Likely `dsumapd.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `pomintkodtov` : `F,10,0;`
  - `intkodtov` : `F,10,0;`
  - `prace` : `T;`
- **Indexes**: Unknown.

## Fdsc.dbf

- **FAND object name**: `Fdsc.dbf`
- **Corresponding physical file**: Likely `dsc.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `e` : `D,'DD.MM.YYYY';     {Zaradenie do REKL}`
  - `f` : `A,8;                {Interne oznacenie REKL}`
  - `kodOP` : `F,3,0;`
  - `dod` : `A,50;             {Dodavatel}`
  - `kodOP1` : `F,3,0;`
  - `odb` : `A,50;             {odberatel}`
  - `bb` : `F,3,0;`
  - `hod` : `D,'hh:mm';`
  - `g` : `D,'DD.MM.YYYY';   { vybavenie reklamacie }`
  - `bb1` : `F,3,0;`
  - `hod1` : `D,'hh:mm';`
- **Indexes**: Unknown.

## Fdikzp.dbf

- **FAND object name**: `Fdikzp.dbf`
- **Corresponding physical file**: Likely `dikzp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `e` : `D,'DD.MM.YYYY';   { datum reklamacie }`
  - `f` : `A,8;`
  - `INTKODTOV` : `F,10.0;`
  - `POPIS1` : `A,40;`
  - `zavada` : `A,75;`
  - `POPIS2` : `A,40;`
  - `KODVYD` : `A,1;`
  - `MNOZSTVO` : `F,6.2;`
  - `MERJEDN` : `A,3;`
  - `NAKUPCENA` : `F,6.2;`
  - `DPH` : `F,2.1;`
  - `VYRCISLO` : `A,25;`
  - `Vydaj` : `A,1;`
  - `mes` : `F,2,0;      { zaruka }`
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do KZ}`
  - `b` : `A,8;                {Interne oznacenie Z}`
  - `c` : `D,'DD.MM.YYYY';     {Zaradenie do KP}`
  - `d` : `A,8;                {Interne oznacenie P}`
- **Indexes**: Unknown.

## Fdikdkp.dbf

- **FAND object name**: `Fdikdkp.dbf`
- **Corresponding physical file**: Likely `dikdkp.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Datum interneho dokladu}`
  - `b` : `A,8;                {Interne oznacenie Pohladavky, resp. Zavazku}`
  - `c` : `A,13;               {Oznacenie : cislo faktury, resp. VS}`
  - `pb` : `D,'DD.MM.YYYY';    {datum uhrady}`
  - `pc` : `F,6.2;             {uhradena ciastka}`
  - `od_ucet` : `A,20;       {ucet partnera pri platbe prev. prikazom}`
  - `prirad_kz` : `B;        { true - do KZ }`
  - `prirad_kp` : `B;        { true - do KP }`
- **Indexes**: Unknown.

## Fdsklad.dbf

- **FAND object name**: `Fdsklad.dbf`
- **Corresponding physical file**: Likely `dsklad.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Cislo` : `A,8;`
  - `Datum` : `D,'MM.YYYY';`
- **Indexes**: Unknown.

## FdRekl.dbf

- **FAND object name**: `FdRekl.dbf`
- **Corresponding physical file**: Likely `drekl.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Mnozstvo` : `F,6.2;`
  - `Mnozstvo1` : `F,6.2;`
- **Indexes**: Unknown.

## Fdevizak.dbf

- **FAND object name**: `Fdevizak.dbf`
- **Corresponding physical file**: Likely `devizak.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `PrijemC` : `F,8.2;`
  - `VydajC` : `F,8.2;`
  - `PrijemP` : `F,8.2;`
  - `VydajP` : `F,8.2;`
  - `Celkom` : `F,8.2;`
  - `Spolu` : `F,8.2;`
- **Indexes**: Unknown.

## Fdkz.dbf

- **FAND object name**: `Fdkz.dbf`
- **Corresponding physical file**: Likely `dkz.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `CeKor` : `F,5.2;`
  - `Prirazka` : `F,2.2;`
  - `Clo` : `F,2.2;`
  - `JCD` : `A,15;`
  - `CeKorMn` : `F,7.2;`
  - `CePrirMn` : `F,7.2;`
  - `CeKorPrirDaMn` : `F,8.2;`
  - `Pohladavky` : `F,8.2;`
  - `Uhrady` : `F,8.2;`
  - `Zisk` : `F,7.2;`
  - `Firma` : `A,14;`
  - `DatV` : `D,'DD.MM.YYYY';`
- **Indexes**: Unknown.

## Fdkzpol.dbf

- **FAND object name**: `Fdkzpol.dbf`
- **Corresponding physical file**: Likely `dkzpol.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `DPH` : `F,6.2; {DPH    }`
  - `s_DPH` : `F,6.2; {DPH    }`
  - `VydNez` : `F,6.2; {nezaradene vydaje`
- **Indexes**: Unknown.

## Fduhrady.dbf

- **FAND object name**: `Fduhrady.dbf`
- **Corresponding physical file**: Likely `duhrady.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Reklam` : `F,6.2;`
  - `Sluzby` : `F,6.2;`
  - `Osobuc` : `F,6.2;`
  - `Poist` : `F,6.2;`
  - `Zaloha` : `F,6.2;`
- **Indexes**: Unknown.

## Fddph.dbf

- **FAND object name**: `Fddph.dbf`
- **Corresponding physical file**: Likely `ddph.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `kod` : `A,3;`
  - `LITRE` : `F,6.2;`
  - `KM` : `F,6.0;`
  - `Sk_za_PHM` : `F,6.2;`
  - `Sk_za_PHM_bez_DPH` : `F,6.2;`
  - `SERVIS` : `F,6.2;`
  - `invest` : `F,6.2;`
  - `opravy` : `F,6.2;`
  - `ine` : `F,6.2;`
  - `mesiace` : `F,4,0;`
  - `ZACIA_KM` : `F,6.2;`
  - `Koniec_KM` : `F,6.2;`
  - `spotr_posled` : `F,2.2;`
  - `litre_posled` : `F,2.2;`
  - `LITRE_lpg` : `F,6.2;`
  - `KM_lpg` : `F,6.0;`
  - `Sk_za_LPG` : `F,6.2;`
  - `Sk_za_LPG_bez_DPH` : `F,6.2;`
  - `uspora` : `F,6.2;`
  - `usp_LPG` : `F,6.2;`
  - `usp_LPG_bez_DPH` : `F,6.2;`
  - `usp_fikt` : `F,6.2;`
  - `body_Shell` : `F,5,0;`
  - `kosacka` : `F,2.2;`
- **Indexes**: Unknown.

## Fdbyt.dbf

- **FAND object name**: `Fdbyt.dbf`
- **Corresponding physical file**: Likely `dbyt.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `KOD` : `A,3;`
  - `DATUM` : `D,'DD.MM.YYYY';`
  - `LITRE` : `F,2.2;`
  - `SK_NA_1L` : `F,2.3;`
  - `SK_BE_1L` : `F,2.3;`
  - `ZACIA_KM` : `F,6.0;`
  - `KONIEC_KM` : `F,6.0;`
  - `L_NA_100_K` : `F,2.4;`
  - `SK_NA_1_KM` : `F,2.4;`
  - `SERVIS` : `F,4.1;`
  - `SO_SERV_1_` : `F,2.4;`
  - `INE` : `F,4.1;`
  - `POPIS` : `A,40;`
  - `OPRAVA` : `F,4.1;`
  - `INVEST` : `F,4.1;`
  - `N15` : `A,9;`
  - `hod` : `D,'hh:mm';`
  - `MIESTO` : `A,40;`
  - `FIRMA` : `A,10;`
  - `DPH` : `F,2.1;`
  - `DO_PLNA` : `B;`
- **Indexes**: Unknown.

## FdElSasa.dbf

- **FAND object name**: `FdElSasa.dbf`
- **Corresponding physical file**: Likely `delsasa.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `PALIVO` : `A,1;             { ' '-95, '+'-VPower, '8'-98, '*'-VPower100 }`
  - `body_Shell` : `F,3,0;`
  - `ucet` : `B;`
  - `kosacka` : `F,2.2;`
  - `zlava` : `F,1.2;`
- **Indexes**: Unknown.

## Fdinkaso.dbf

- **FAND object name**: `Fdinkaso.dbf`
- **Corresponding physical file**: Likely `dinkaso.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `rok` : `D,'YYYY';`
  - `spolu` : `F,6.2;`
- **Indexes**: Unknown.

## Fdplatby.dbf

- **FAND object name**: `Fdplatby.dbf`
- **Corresponding physical file**: Likely `dplatby.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `Sk_za_PHM` : `F,5.2; km : F,4,0; mesiace : F,2,0;`
  - `Litre` : `F,5.2; Sk : F,2.2; Sk_real : F,2.2; {Spotreba}`
  - `Pocet` : `F,2,0; Spotr : F,4.2;`
- **Indexes**: Unknown.

## Fddruhy.dbf

- **FAND object name**: `Fddruhy.dbf`
- **Corresponding physical file**: Likely `ddruhy.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `DATUM` : `D,'DD.MM.';`
  - `TEXT` : `A,31;`
- **Indexes**: Unknown.

## Fdtovary.dbf

- **FAND object name**: `Fdtovary.dbf`
- **Corresponding physical file**: Likely `dtovary.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `DATUM` : `D,'DD.MM.YYYY';`
  - `CAS` : `A,5;`
  - `TRVaNie` : `F,3.0;`
  - `zakaznik` : `A,30;`
  - `TEXT` : `A,255;`
  - `nazmie` : `A,50;`
- **Indexes**: Unknown.

## Fdteplo.dbf

- **FAND object name**: `Fdteplo.dbf`
- **Corresponding physical file**: Likely `dteplo.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `OD` : `D,'DD.MM.YYYY'; {Datum                                               }`
  - `DO` : `D,'DD.MM.YYYY'; {Datum                                               }`
  - `DPH1` : `F,2.1;`
  - `DPH2` : `F,2.1;`
  - `SUM1VSTUP` : `F,6.2;`
  - `DPH1VSTUP` : `F,5.2;`
  - `SUM2VSTUP` : `F,6.2;`
  - `DPH2VSTUP` : `F,5.2;`
  - `SUM1VYSTUP` : `F,6.2;`
  - `DPH1VYSTUP` : `F,5.2;`
  - `SUM2VYSTUP` : `F,6.2;`
  - `DPH2VYSTUP` : `F,5.2;   { HaNIM za 12 poslednych mesiacov }`
  - `DPHPAR4` : `F,5.0;`
  - `SUM_PAR_69` : `F,6.2;`
  - `DPH_PAR_69` : `F,5.2;`
  - `ODPOCET_PAR_69` : `F,5.2;`
  - `R13` : `F,5.0;`
  - `ArcIntCis` : `A,1;`
- **Indexes**: Unknown.

## Fvystav.dbf

- **FAND object name**: `Fvystav.dbf`
- **Corresponding physical file**: Likely `vystav.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `a` : `D,'DD.MM.YYYY';     {Zaradenie do KP}`
  - `od` : `A,50;              {Odberatel}`
  - `n` : `A,40;               {Text}`
  - `z` : `F,6.2;             {poh`
- **Indexes**: Unknown.

## Fzav2003.dbf

- **FAND object name**: `Fzav2003.dbf`
- **Corresponding physical file**: Likely `zav2003.000` (INFERRED based on standard PC FAND naming)
- **Fields**: *(INFERRED sequential mapping from TTT blocks)*
  - `dph` : `F,2.1;`
  - `ds` : `D,'DD.MM.YYYY';`
  - `rc` : `F,6.2;`
- **Indexes**: Unknown.

## Migration relevance

This inventory maps out the scope of the legacy MS-DOS application. Because the exact business logic and table schemas are locked behind PC FAND's binary pointer format, a specialized PC FAND decompiler is necessary to extract the final `CREATE TABLE` and raw procedural logic to accurately write CodeIgniter 4 controllers and MariaDB schemas. What is documented here provides the architectural blueprint of what objects exist and their inferred purposes.
