# Verified Forms (E* Objects)

## e

```fand
{}
#_param aa;
_
```

## eParDat

```fand
{}
#_PARAM MinCas, AktCas;

  Od  __________

  Do  __________
```

## eParDat1

```fand
{}
#_PARAM AktCas;

     __________
```

## eParDat2

```fand
{}
#_PARAM MinCas, AktCas;
 __________ - __________
```

## ePrijem

```fand
#_PARAM   1:a1, 2: a3;
            Príjem [Koruny]

   hotovosť __________   účet __________
```

## eVydaj

```fand
#_PARAM a2;
             Výdaj [Koruny]

          hotovosť __________
```

## eKalendar

```fand
{}
 Dátum       Deň  Meno (SK)                 Jméno (CZ)               Pozn.
──────────────────────────────────────────────────────────────────────────
#_ kalendar datum,Akyden,Sviato,Meno,Jmeno,T;
 __________ __ __ _________________________ _________________________  _
```

## eKalendar_1

```fand
{}
 Dátum       Deň
──────────────────
                         JU              16.08.2026     strana:  6
Typ Nazev
Text
#_ kalendar datum, Akyden, Sviato;
 __________ __ __
```

## eKalendar_sc

```fand
{}
 Dátum       Deň   SC
──────────────────────
#_ kalendar datum, Akyden, Sviato, sc;
 __________ __ __ ___

    cal         

begin
{ merge(['#I1_Kalendar #O1_ Calendar']); }
  copyfile(calendar, 'a.txt'/fix, nocancel);
  copyfile('a.txt', 'b.txt', mode='KW', nocancel);
  copyfile('b.txt'/fix, calendar, nocancel);
end;

    ------------
```

## eKalendar_sc

```fand
{}
 Dátum       Deň   SC
──────────────────────
#_ kalendar datum, Akyden, Sviato, sc;
 __________ __ __ ___

    cal         

begin
{ merge(['#I1_Kalendar #O1_ Calendar']); }
  copyfile(calendar, 'a.txt'/fix, nocancel);
  copyfile('a.txt', 'b.txt', mode='KW', nocancel);
  copyfile('b.txt'/fix, calendar, nocancel);
end;

    ------------
```

## eKalendar_sc

```fand
{}
 Dátum       Deň   SC
──────────────────────
#_ kalendar datum, Akyden, Sviato, sc;
 __________ __ __ ___

    cal         

begin
{ merge(['#I1_Kalendar #O1_ Calendar']); }
  copyfile(calendar, 'a.txt'/fix, nocancel);
  copyfile('a.txt', 'b.txt', mode='KW', nocancel);
  copyfile('b.txt'/fix, calendar, nocancel);
end;

    ------------
```

## eDat1

```fand
{}
#_ PARAM dat1, a1234;

 dátum __________   uhradené __________ Sk
```

## eDat2

```fand
{}
#_PARAM   dat2;
  Príkaz na úhradu zo dňa :  __________
```

## eDoklady

```fand
{}
#_ Doklady d, b;
 ____________________ _
```

## eSadzbDPH

```fand
{}
 Sadzba DPH %         Platnosť
 dolná  horná      od          do
──────────────────────────────────────
#_ SadzbDPH DPH_Dol, DPH_hor, od, do;
 _____  _____  __________  __________

                         JU              16.08.2026     strana:  8
Typ Nazev
Text
```

## eBanky

```fand
{}
 Kód                   Názov                    Skratka
──────────────────────────────────────────────────────────
#_Banky kodBAn, popis, skratka;
 ____ ________________________________________ __________
```

## eMesto

```fand
{}
        Mestá
──────────────────────
#_ Mesta nazov;
 ____________________
```

## eMesta

```fand
{}
         Názov          Tlf.    PSČ         Okres             Kraj
───────────────────────────────────────────────────────────────────────────
#_ Mesta nazov, tel, psc, nazokres, nazkraj;
 ____________________ ________ _____ __________________ __________________
```

## eTrasy

```fand
{}
        Odkiaľ               Cez               Kam         Vzdial. Mesto [km]
──────────────────────────────────────────────────────────── [km]  2 ─ 5 ─ 10─
#_ trasy z, cez, do, vzd, mesto_2_km_pocet, mesto_5_km_pocet, mesto_10_km_pocet;
 ____________________ ________________ ____________________ _____ ___ ___ ___
```

## eUdaje

```fand
#_ Udaje  nazov,  uli,  PSC, miesto,
          ICO,      DatDPH,  sadzba,
          DIC,               DIC_nove,
          drcDPH,            ICPD,
      tlf, tlf1,  fax, fax1,
    mobil, mobil1, email, hodsadzba, PRGhodsadzba;
    Obch. názov ________________________________________
          Ulica __________________
     PSČ Miesto ______ ____________________


    IČO __________      Plátca DPH od __________ Sadzba DPH _____ %

 ┌─────── do 30.04.2004 ─────────┬──────────── od 01.05.2004 ───────┐
 │         DIČ __________        │    DIČ pre daň _______________   │
 │ DIČ pre DPH _______________   │     IČ pre DPH _______________   │
 └───────────────────────────────┴──────────────────────────────────┘
           Tel ____ _________                 Fax ____ ________
         Mobil ____ _________    E-mail ____________________________
   Akt. hod. sadzba servis ______ Eur  programovanie ______ Eur

    eUdaje      

#_ Udaje    meno,   priezv,  titul,
            nazov,  uli,     cis,
                             PSC,
          hodsadzba,         miesto,
          ICO,      DatDPH,  sadzba,
          DIC,               DIC_nove,
                         JU              16.08.2026     strana: 12
Typ Nazev
Text
          drcDPH,            ICPD,
      tlf, tlf1,  fax, fax1,
    mobil, mobil1, email;
    Meno  __________  Priezisko _______________   Titul _____
    Obch. názov ________________________________________
                                  Ulica  __________________ ___
                                  PSČ    ______
     Akt. hod. sadzba _____ Sk    Miesto ____________________

    IČO __________      Plátca DPH od __________ Sadzba DPH _____ %

 ┌─────── do 30.04.2004 ─────────┬──────────── od 01.05.2004 ───────┐
 │         DIČ __________        │    DIČ pre daň _______________   │
 │ DIČ pre DPH _______________   │     IČ pre DPH _______________   │
 └───────────────────────────────┴──────────────────────────────────┘
           Tel ____ _________                 Fax ____ ________
         Mobil ____ _________    E-mail ____________________________
```

## eUdaje

```fand
#_ Udaje  nazov,  uli,  PSC, miesto,
          ICO,      DatDPH,  sadzba,
          DIC,               DIC_nove,
          drcDPH,            ICPD,
      tlf, tlf1,  fax, fax1,
    mobil, mobil1, email, hodsadzba, PRGhodsadzba;
    Obch. názov ________________________________________
          Ulica __________________
     PSČ Miesto ______ ____________________


    IČO __________      Plátca DPH od __________ Sadzba DPH _____ %

 ┌─────── do 30.04.2004 ─────────┬──────────── od 01.05.2004 ───────┐
 │         DIČ __________        │    DIČ pre daň _______________   │
 │ DIČ pre DPH _______________   │     IČ pre DPH _______________   │
 └───────────────────────────────┴──────────────────────────────────┘
           Tel ____ _________                 Fax ____ ________
         Mobil ____ _________    E-mail ____________________________
   Akt. hod. sadzba servis ______ Eur  programovanie ______ Eur

    eUdaje      

#_ Udaje    meno,   priezv,  titul,
            nazov,  uli,     cis,
                             PSC,
          hodsadzba,         miesto,
          ICO,      DatDPH,  sadzba,
          DIC,               DIC_nove,
                         JU              16.08.2026     strana: 12
Typ Nazev
Text
          drcDPH,            ICPD,
      tlf, tlf1,  fax, fax1,
    mobil, mobil1, email;
    Meno  __________  Priezisko _______________   Titul _____
    Obch. názov ________________________________________
                                  Ulica  __________________ ___
                                  PSČ    ______
     Akt. hod. sadzba _____ Sk    Miesto ____________________

    IČO __________      Plátca DPH od __________ Sadzba DPH _____ %

 ┌─────── do 30.04.2004 ─────────┬──────────── od 01.05.2004 ───────┐
 │         DIČ __________        │    DIČ pre daň _______________   │
 │ DIČ pre DPH _______________   │     IČ pre DPH _______________   │
 └───────────────────────────────┴──────────────────────────────────┘
           Tel ____ _________                 Fax ____ ________
         Mobil ____ _________    E-mail ____________________________
```

## ePrijmy

```fand
{}
         Príjmy
────────────────────────
#_Vydaje d, kod;
 ____________________ _
```

## ePrijmz

```fand
#_Vydaje d, kod, r, p, b17, m, b, z;
  Charakter príjmu :
  ____________________

  Kód príjmu       _

  Stĺpce v PD    <A/N>

  celkové          _
  priebežné        _
  os. ucet         _

  Súvisí s :     <A/N>

  predaj tovaru    _
  vratenie tovaru  _
  predaj výrobkov,
  služieb a iné    _
```

## ePrijem_PD

```fand
{}
   Popis príjmu        Počet     Suma
────────────────────── v PD ───── Sk ───
#_Vydaje d, kod, pocet        , suma;
 __________________ _ ______ __________
```

## eVydajd

```fand
{}
       Výdaje
────────────────────────
#_ Vydaje d, kodvyd;
 ____________________ _
```

## eVydaj_PD

```fand
{}
   Popis výdaja        Počet    Suma
────────────────────── v PD ──── Sk ────
#_Vydaje d, kodvyd, pocet      , suma;
 __________________ _ ______ __________
```

## eVydajC

```fand
{}
#_ Vydaje d, kodvyd, r, p, b7, b8, b11, b12, b13, b14, b15, b16, b17, b20, x;
  Popis výdaja :
  ____________________
  Kód výdaja       _
  Stĺpce v PD    <A/N>
  celkové          _
  priebežné        _

  drobný HaN maj.  _
  mzdy zamest.     _
  soc. poistenie   _
  réžia            _
  PHM pre SC       _
                         JU              16.08.2026     strana: 15
Typ Nazev
Text
  HaN majetok      _
  nákup tovaru     _
  daň z príjmu     _
  osobný účet      _
  nákup materiálu  _

  Pravidelná plat. _
```

## eUcty

```fand
{}
  Číslo účtu  Kód             Názov banky           Forma zasielanie
───────────────────────────────────────────────────────── výpisov k ─
#_ Ucty cu, ba, banka, os, zv;
 ____________ ____ ____________________________________ _     __
```

## eUcet

```fand
Realizov.   Por.               Popis operácie               Čiastka  C P
──── dňa ──── 50 ────────────────────────────────────────────── Sk ────────
#_ Ucet  d, b, ua, pa, ra, qa;
 __________ ______ ________________________________________ __________ _ _
```

## eUcet_new

```fand
{}
#_ Ucet d,
        a,  b,
        c,
        ua,           ra,
        pa, cu1, ba1, qa;
  Realiz. dňa  __________
  Výpis zo dňa __________ Označenie 50-________
  Var. symbol  __________
  Účel platby  ________________________________________  Celkové   _
  Suma spolu   __________ Sk  účet OP ____________ ____  Priebežné _
```

## eUcet_bro

```fand
Výpis    Por    ┌── Spolu ───┐         ┌── Členenie - prenos do PD ───┐
── zo dňa ─ 50 ── Príjem ─── Výdaj ──── Celkové ─ Priebež.─── Iné ─── Úroky ─
#_ Ucet a, b, ps, vs, spolu, prieb, ine, urok;
 __________ ___ __________ __________ __________ __________ ________ _______
```

## ePV

```fand
#_ PV a, b, mena, ph, pu, han, poh, zav, m;
       Ku dňu __________
    Označenie ________

     Popis           ___
  ─────────────────────────
   Pokladňa     __________

   Bank. účet   __________

   HaN majetok  __________

   Pohľadávky   __________

   Záväzky      __________

   Majetok      __________
```

## eStrataDoch

```fand
{}
  rok  nezda.suma   strata   min.príjem
───────────────────────────── odvody SP ─
#_ straDoch rok, nezdan_suma, strata, hra_min_prijmu;
 _____ __________ __________ __________
```

## eSumaPD

```fand
{}
#_ SumaPD       P1,              P2,
          a1,   a1__, hot_prijem,   a3,    a3__, ucet_prijem,     a1a3,
          a2,   a2__,  hot_vydaj,   a4,    a4__,  ucet_vydaj,     a2a4,
        a1a2, a1a2__,      a1a2_, a3a4,  a3a4__,       a3a4_,  a1a2a3a4,
                         JU              16.08.2026     strana: 21
Typ Nazev
Text
                HOTOVOST,          ucet,       a122,
                                               a123,
          a13,     zdan_prijem,                a121,
          a17,        dochodok,                 a12,
          a16,     ddp_od_2005,                a12b,
          a22,     odpocit_vyd,               rezia,
          a14,   nezdan_zaklad,                leas,
                                                a11,
          zZP,          zaklad,                 a15,
           ZP,            dane,              odpisy,
                 rok_1, strata,                  a7,
hra_min_prijmu,   dan_k_uhrade,                 a21;
                Hotovosť                            Účet
              __________ ──────── POČ.STAV ─── __________
          ┌──────────┼──────────┐          ┌──────────┼──────────┐
     Priebež.      Iné      Celkové     Priebež.    Iné      Celkové   H+Ú
 + __________ __________ __________ __________ __________ __________ _______ +
 - __________ __________ __________ __________ __________ __________ _______ -
─────────────────────────────────────────────────────────────────────────────
 = __________ __________ __________ __________ __________ __________ _______ =
          └──────────┼──────────┘          └──────────┼──────────┘
              __________ ──────── AKT.STAV ─── __________  auto __________ ─┐
                                                             SC __________ ─┤
   PHM > SC __________    Zdanit. príjmy __________         iné __________ ─┤
   os. účet __________    Dôchodok       __________      všeob. __________ ─┤
   daň z pr.__________    DopDochSpor  - __________       banka __________ ─┤
        DPH __________    Odpoč. výd.  - __________ ─┬─ réžia   __________ ─┘
  nák.HaNIM __________    Nezdan. suma - __________  ├─ leasing __________
                          ─────────────────────────  ├─ poistné __________
     HaN IM __________   Základ pre výp. __________  ├─ tovar   __________
  Po odpise __________      Daň z príjmu __________  ├─ odpisy  __________ 
 min. príjmy pre odvod       strata ____ __________  ├─ D.HaN M.__________
 do SocPoi  __________      daň k úhrade __________  └─ Vyk.prác__________
```

## ePD

```fand
{}
#_ PD   a,  b,        {a_h, a_u,}
        c,  d,
        vydaj,   Aky_vydaj, r, p, dph,
        a1,  a3,     a5, a18, DPH_Sk_p, zn_p,
        a2,  a4,     a6, a19, DPH_Sk,   zn,   hal,
        a17, a12,   a13,
        a14, a7,
        a16, a15,
        a9,  a11,
        a10, a21;

                                Peňažný denník

  Dátum vykonania zápisu  __________                      Stav
                                                 Hotovosť      Účet
    Druh a číslo dokladu  _____________         ──────────  ──────────
          Externý doklad  _____________
          Text __________________________________________________
          Typ výdaja/príjmu _ ______________________________
 ──────────────────────────────────────────────────────────────────────────
           hotovosť     účet     celkom _   prieb. _ DPH _____ %    s DPH
  Príjem __________ __________ __________ __________ __________ __________
  Výdaj  __________ __________ __________ __________ __________ __________
 ────────────────────────────────────────────── Halierové vyrovnanie _____
                        Rozpis výdavkov :
           Os. účet __________      Réžia __________ PHM pre SC __________
             HaN IM __________    D HaN M __________
  Daň z príjmu, DPH __________      Tovar __________
 Dohoda o Pr. činn. __________   Zák. poi.__________
  Daň z Dohody o Pč __________        Iné __________
```

## ePDbrowse

```fand
{}
      Dátum      Popis                            Celkové    Čiastka Typ
───────────────────────────────────────────────── bez DPH ──── s DPH ─────────
#_ PD a, akyden, d40, celkove, sDPH, typ_vyd, vydaj, ok{, kontr};
 __________ __ ________________________________ __________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok{, kontr};
 __________ __ __________ ________________________________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok, kontr;
 __________ __ __________ ______________________________ __________ _  _  _ _
```

## ePDbrowse

```fand
{}
      Dátum      Popis                            Celkové    Čiastka Typ
───────────────────────────────────────────────── bez DPH ──── s DPH ─────────
#_ PD a, akyden, d40, celkove, sDPH, typ_vyd, vydaj, ok{, kontr};
 __________ __ ________________________________ __________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok{, kontr};
 __________ __ __________ ________________________________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok, kontr;
 __________ __ __________ ______________________________ __________ _  _  _ _
```

## ePDbrowse

```fand
{}
      Dátum      Popis                            Celkové    Čiastka Typ
───────────────────────────────────────────────── bez DPH ──── s DPH ─────────
#_ PD a, akyden, d40, celkove, sDPH, typ_vyd, vydaj, ok{, kontr};
 __________ __ ________________________________ __________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok{, kontr};
 __________ __ __________ ________________________________ __________ _  _  _

    ePDbrowse   
{}
      Dátum      Doklad     Popis                           Celkové  Typ
─────────────────────────────────────────────────────────── bez DPH ──────────
#_ PD a, akyden, b2, d40, celkove, typ_vyd, vydaj, ok, kontr;
 __________ __ __________ ______________________________ __________ _  _  _ _
```

## ePDbrow_Vyd

```fand
{ePDbrow_Vyd}
  Datum      Doklad     Popis                              Suma     Typ Kod
══════════════════════════════════════════════════════════════════════════════
#_ PD a, b2, d40, hod_vyd, typ_vyd, vydaj;
 __________ __________ ________________________________ __________   _   _
```

## ePDbrow_Pri

```fand
{ePDbrow_Vyd}
  Datum      Doklad     Popis                              Suma     Typ Kod
══════════════════════════════════════════════════════════════════════════════
#_ PD a, b2, d40, hod_pri, typ_vyd, vydaj;
 __________ __________ ________________________________ __________   _   _

    ePDbrow_PrVy
{ePDbrow_Vyd}
  Datum      Doklad     Popis                              Suma   H/U Typ Kod
══════════════════════════════════════════════════════════════════════════════
#_ PD a, b2, d40, hod_PriVyd, typ_PriVyd, typ_vyd, vydaj;
 __________ __________ ________________________________ __________ _   _   _
```

## ePDbrow_Pri

```fand
{ePDbrow_Vyd}
  Datum      Doklad     Popis                              Suma     Typ Kod
══════════════════════════════════════════════════════════════════════════════
#_ PD a, b2, d40, hod_pri, typ_vyd, vydaj;
 __________ __________ ________________________________ __________   _   _

    ePDbrow_PrVy
{ePDbrow_Vyd}
  Datum      Doklad     Popis                              Suma   H/U Typ Kod
══════════════════════════════════════════════════════════════════════════════
#_ PD a, b2, d40, hod_PriVyd, typ_PriVyd, typ_vyd, vydaj;
 __________ __________ ________________________________ __________ _   _   _
```

## ePDp

```fand
{}
#_PD a, a1, d;
 datum __________   hotovost __________ [Sk]

 popis _____________________________________
```

## ePDv

```fand
{}
#_ PD a, a2, dph, dph_sk, d;

                         JU              16.08.2026     strana: 27
Typ Nazev
Text
 datum __________
       prenos do PD (bez DPH) __________ Sk
        DPH _____ %       DPH __________ Sk
 popis ___________________________________
```

## ePDvyb

```fand
{}
#_ Param dat1, a1;

      - Výber z BÚ  /  + Vklad na BÚ

  Dátum __________     Suma __________ Sk
```

## ePDvklad

```fand
#_ PD a, a1;
      Vklad os. financií v hotovosti

  Dátum __________     Suma __________ Sk

                
{ Evidencia hmotneho majetku }
```

## ePDvklad

```fand
#_ PD a, a1;
      Vklad os. financií v hotovosti

  Dátum __________     Suma __________ Sk

                
{ Evidencia hmotneho majetku }
```

## eIKzp

```fand
{           Obrazovka pre inventarne karty ZP }
#_ IKzp  a,  b,  vy,   d,    n,   vc,   rv,   h_n,
                                         h, mena,
         dph_dat,             dph,  dph_sk, mena,
                            obstar_Bez_DPH, mena,
                                    oprava, mena,
              SO,             RO,       OS,
                                        hz, mena,
                                        vo, mena,
                                         z, mena,
         v,  sv;

                  Inventárna karta  HaN investič. majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  08-________
    Výrobca       ______________________________
    Dodávateľ     ______________________________
    Typ / Nazov   ________________________________________
    Výrobné číslo _______________ Rok výroby ____  Hmotný IM _ (A/N)

    DPH uplatnená k         Obstarávacia cena s DPH __________ ___
      __________                   DPH _____ %  DPH __________ ___
                          Obstarávacia cena bez DPH __________ ___
                                             Oprava __________ ___
    Spôsob odpisovania (Z/R) _   Rok odpisovania ___   Odpis. skupina _
                         JU              16.08.2026     strana: 29
Typ Nazev
Text
       Hodnota ZP na začiatku zúčtovacieho obdobia  __________ ___
                           Odpisy za daňové obdobie __________ ___
                                   Zostatková cena  __________ ___
    Vyradenie z IK __________  Spôsob ___________________________________


    eIKzp       
{ 1998      Obrazovka pre inventarne karty ZP }
#_ IKzp  a,  b,  vy,   d,    n,   vc,  rv,
       hb,  h,   p,   u,    r,   o,
       SO, RO,  OS,
       hz,  vo,  z,
       v,  sv;
                  Inventárna karta  HaN investič. majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  08-________
    Výrobca       ______________________________
    Dodávateľ     ______________________________
    Typ / Nazov   ________________________________________
    Výrobné číslo _______________        Rok výroby  ____

    Dodávka uhradená dňa __________ ─── v hotovosti __________  ─┬─ Údaje z  
                                          doklad _____________  ─┤  Peňažného
                         .......... ─── cez účet    __________  ─┤   denníka 
                                          doklad _____________  ─┘
                               Obstarávacia cena    __________ [Korún]

    Spôsob odpisovania (Z/R) _   Rok odpisovania ___   Odpis. skupina _
    Hodnota ZP na začiatku zúčtovacieho obdobia     __________ [Korún]
                       Odpisy za daňové obdobie     __________ [Korún]
                                Zostatková cena     __________ [Korún]
    Vyradenie z IK __________  Spôsob ___________________________________
```

## eIKzp

```fand
{           Obrazovka pre inventarne karty ZP }
#_ IKzp  a,  b,  vy,   d,    n,   vc,   rv,   h_n,
                                         h, mena,
         dph_dat,             dph,  dph_sk, mena,
                            obstar_Bez_DPH, mena,
                                    oprava, mena,
              SO,             RO,       OS,
                                        hz, mena,
                                        vo, mena,
                                         z, mena,
         v,  sv;

                  Inventárna karta  HaN investič. majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  08-________
    Výrobca       ______________________________
    Dodávateľ     ______________________________
    Typ / Nazov   ________________________________________
    Výrobné číslo _______________ Rok výroby ____  Hmotný IM _ (A/N)

    DPH uplatnená k         Obstarávacia cena s DPH __________ ___
      __________                   DPH _____ %  DPH __________ ___
                          Obstarávacia cena bez DPH __________ ___
                                             Oprava __________ ___
    Spôsob odpisovania (Z/R) _   Rok odpisovania ___   Odpis. skupina _
                         JU              16.08.2026     strana: 29
Typ Nazev
Text
       Hodnota ZP na začiatku zúčtovacieho obdobia  __________ ___
                           Odpisy za daňové obdobie __________ ___
                                   Zostatková cena  __________ ___
    Vyradenie z IK __________  Spôsob ___________________________________


    eIKzp       
{ 1998      Obrazovka pre inventarne karty ZP }
#_ IKzp  a,  b,  vy,   d,    n,   vc,  rv,
       hb,  h,   p,   u,    r,   o,
       SO, RO,  OS,
       hz,  vo,  z,
       v,  sv;
                  Inventárna karta  HaN investič. majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  08-________
    Výrobca       ______________________________
    Dodávateľ     ______________________________
    Typ / Nazov   ________________________________________
    Výrobné číslo _______________        Rok výroby  ____

    Dodávka uhradená dňa __________ ─── v hotovosti __________  ─┬─ Údaje z  
                                          doklad _____________  ─┤  Peňažného
                         .......... ─── cez účet    __________  ─┤   denníka 
                                          doklad _____________  ─┘
                               Obstarávacia cena    __________ [Korún]

    Spôsob odpisovania (Z/R) _   Rok odpisovania ___   Odpis. skupina _
    Hodnota ZP na začiatku zúčtovacieho obdobia     __________ [Korún]
                       Odpisy za daňové obdobie     __________ [Korún]
                                Zostatková cena     __________ [Korún]
    Vyradenie z IK __________  Spôsob ___________________________________
```

## eIKzpBr

```fand
{           Obrazovka pre inventarne karty HaN maj. }
 Zaradenie  Popis                                  Začiatok  Rok S   Koniec
─────────────────────────────────────────────────── obdobia ──── k ─ obdobia ─
#_ IKzp doklad, n, o_s, ro, os, z;
 __________ _____________________________________ __________ ___ _ __________
```

## eIKdkp

```fand
{           Obrazovka pre inventarne karty DKP }
#_ IKdkp                    a,                        b,
                            n,
                            d,
                          fdo,           fd,              mn,
                                         jc, mena,     jc_mn,       mena,
                           dph,      dph_sk, mena, dph_sk_mn,       mena,
                                    bez_dph, mena,      bez_dph_mn, mena,
                             v,          fv,
                            sv;

                 Inventárna karta drobného HaN majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  01-________

    Typ / Názov  ________________________________________
    Dodávateľ    ______________________________
    Doklad dodávateľa __________
    Interné označenie dokladu dodávateľa ________  množstvo _____

    Obstarávacia cena s DPH __________ ___           Spolu __________ ___
           DPH _____ %  DPH __________ ___                 __________ ___
     Prenos do PD - bez DPH __________ ___                 __________ ___

    Vyradenie z IK __________   Doklad pre odberateľa ________
            Spôsob ___________________________________

    eIKdkp      
{ 1998      Obrazovka pre inventarne karty DKP }

#_IKdkp 1:a,   2:b,  3:n,
        4:jc,  5:mn,
        6:hb,  7:h,  8:p,  9:u, 10: r,
       11:o,
       12:d,  13:v, 14:sv;
                         JU              16.08.2026     strana: 31
Typ Nazev
Text

                 Inventárna karta drobného HaN majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  01-________

    Typ / Názov  ________________________________________

    Jednotková cena  __________ [Korún]    Množstvo _____

    Dodávka uhradená dňa __________ ─── v hotovosti __________  ─┬─ Údaje z  
                                          doklad _____________  ─┤  Peňažného
                         .......... ─── cez účet    __________  ─┤   denníka 
                                          doklad _____________  ─┘
    Obstarávacia cena __________ [Korún]
    Dodavateľ ______________________________

    Vyradenie z IK __________  Spôsob ___________________________________
```

## eIKdkp

```fand
{           Obrazovka pre inventarne karty DKP }
#_ IKdkp                    a,                        b,
                            n,
                            d,
                          fdo,           fd,              mn,
                                         jc, mena,     jc_mn,       mena,
                           dph,      dph_sk, mena, dph_sk_mn,       mena,
                                    bez_dph, mena,      bez_dph_mn, mena,
                             v,          fv,
                            sv;

                 Inventárna karta drobného HaN majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  01-________

    Typ / Názov  ________________________________________
    Dodávateľ    ______________________________
    Doklad dodávateľa __________
    Interné označenie dokladu dodávateľa ________  množstvo _____

    Obstarávacia cena s DPH __________ ___           Spolu __________ ___
           DPH _____ %  DPH __________ ___                 __________ ___
     Prenos do PD - bez DPH __________ ___                 __________ ___

    Vyradenie z IK __________   Doklad pre odberateľa ________
            Spôsob ___________________________________

    eIKdkp      
{ 1998      Obrazovka pre inventarne karty DKP }

#_IKdkp 1:a,   2:b,  3:n,
        4:jc,  5:mn,
        6:hb,  7:h,  8:p,  9:u, 10: r,
       11:o,
       12:d,  13:v, 14:sv;
                         JU              16.08.2026     strana: 31
Typ Nazev
Text

                 Inventárna karta drobného HaN majetku 

    Dátum zaradenia do IK __________   Inventárne číslo  01-________

    Typ / Názov  ________________________________________

    Jednotková cena  __________ [Korún]    Množstvo _____

    Dodávka uhradená dňa __________ ─── v hotovosti __________  ─┬─ Údaje z  
                                          doklad _____________  ─┤  Peňažného
                         .......... ─── cez účet    __________  ─┤   denníka 
                                          doklad _____________  ─┘
    Obstarávacia cena __________ [Korún]
    Dodavateľ ______________________________

    Vyradenie z IK __________  Spôsob ___________________________________
```

## eIKdkpBr

```fand
{           Obrazovka pre inventarne karty drobný HaN majetok }
 Zaradenie  Popis                                  Obstaráv.  Dodávateľ
─────01─────────────────────────────────────────── cena [Sk] ─────────────────
#_IKdkp doklad, n, jc, d;
 __________ ______________________________________ __________ _______________
```

## eLeasing

```fand
#_ Leasing
       a,  b,  vy,   n,   vc,     rv,
       d,                         hz, mena,
       ls,                      leas, mena,
                                pois, mena,
                                koef,
       mes,    mes1, mena,
               lea0, mena, mes, nakl, mena,
       RO,                        vo, mena;
                                L e a s i n g      

    Dátum zaradenia do FL __________
    Inventárne číslo      88-________
    Výrobca       ______________________________
    Typ / Nazov   ________________________________________
    Výrobné číslo _______________         Rok výroby  ____
    Dodávateľ     ______________________________    Cena  __________ ___

    Leas. spol.   ______________________________ Cena LS  __________ ___
                                                  poist.  __________ ___
                                                   koef.  __________
    doba trvania LZ v mes. ___ x __________ ___
    0. splátka                   __________ ___ / ___  =  __________ ___

    Rok splácania LZ ___    Prev. réžia za daňové obdobie __________ ___
```

## eLeasing_Bro

```fand
      L e a s i n g      

   Dátum     Doklad    Predmet leasingu     Cena      Leasing    Leas. spol.
── zarad.─────────────────────────────────────────────────────────────────────
#_ Leasing a, b, naz, hz, leas, ls_;
 __________ ________ ____________________ __________ __________ _____________

    ------------
```

## eLeasing_Bro

```fand
      L e a s i n g      

   Dátum     Doklad    Predmet leasingu     Cena      Leasing    Leas. spol.
── zarad.─────────────────────────────────────────────────────────────────────
#_ Leasing a, b, naz, hz, leas, ls_;
 __________ ________ ____________________ __________ __________ _____________

    ------------
```

## eDohoda

```fand
#_ dohoda    a,  b,  n,  v;
                   Evidencia prßc vykonan?ch na dohodu

       Dßtum zaradenia do ME  __________

                   Oznafenie  ________

                        Text  ________________________________________

                        suma  __________  [Kor˙n]
```

## eDohodaBrows

```fand
Dßtum    Oznaf.          PracovnÝk           Odmena       Da?
ŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮŮ Sk ŮŮŮŮŮŮŮŮ Sk ŮŮŮ
#_ dohoda  a,  b,  zamest,  v, dan;
 __________ ________ _________________________ __________ __________
```

## eEZ

```fand
{ez}
#_ EZ a, b, od,
   dz, bm, mena, prg, mena,
   n, bk, ob;
 Dátum prijatia zákazky  __________    Označenie  ________

 Zákazník     ________________________________________
                                        Hodinová sadzba
 Druh zákazky __________       servisné práce ________ ___
                                programovanie   ______ ___
 Popis        ________________________________________

 Dátum ukončenia zákazky __________  Faktúra _____________

    eEZ         

#_ EZ a, b, od, dz, n, bk, ob, ad, am, bd, bm, cd, cm, ch, dd, dm, dh;
                      Evidencia zákaziek a prác

     Dátum prijatia zákazky  __________   Označenie  ________

     Zákazník     ________________________________________

     Druh zákazky __________  Popis ________________________________________

     Dátum ukončenia zákazky __________   Faktúra  _____________

     ───────────────────────────────────────────────────────────────────────
                                druh                   množstvo    hodnota
     Dodaný materiál ──────┬─── ____________________    _____
                           └─── ____________________    _____
     Spotrebovaný mat. ────┬─── ____________________    _____     __________
                           └─── ____________________    _____     __________
```

## eEZ

```fand
{ez}
#_ EZ a, b, od,
   dz, bm, mena, prg, mena,
   n, bk, ob;
 Dátum prijatia zákazky  __________    Označenie  ________

 Zákazník     ________________________________________
                                        Hodinová sadzba
 Druh zákazky __________       servisné práce ________ ___
                                programovanie   ______ ___
 Popis        ________________________________________

 Dátum ukončenia zákazky __________  Faktúra _____________

    eEZ         

#_ EZ a, b, od, dz, n, bk, ob, ad, am, bd, bm, cd, cm, ch, dd, dm, dh;
                      Evidencia zákaziek a prác

     Dátum prijatia zákazky  __________   Označenie  ________

     Zákazník     ________________________________________

     Druh zákazky __________  Popis ________________________________________

     Dátum ukončenia zákazky __________   Faktúra  _____________

     ───────────────────────────────────────────────────────────────────────
                                druh                   množstvo    hodnota
     Dodaný materiál ──────┬─── ____________________    _____
                           └─── ____________________    _____
     Spotrebovaný mat. ────┬─── ____________________    _____     __________
                           └─── ____________________    _____     __________
```

## eEZ_browse

```fand
Kniha zákaziek a prác

   Dátum     Doklad            Odberateľ              Hod. ? x  Faktúra
────────────────────────────────────────────────────────────────────────
#_ EZ a, b, od, hodiny, prace, ob;
 __________ ________ ______________________________ ______ ___ ________
```

## eDen_Prac

```fand
{}
  Dátum      od    do           Zákazník
────────────────────────────────────────────────
#_ Den_Prac datum, zaciat, koniec, u_zakaz, nazmie;
 __________ _____ _____ _ _____________________
```

## eDen_Prac_1

```fand
{}
  Dátum          od    do                   Popis prác                  SC
────────────────────────────────────────────────────────────────────────────
                         JU              16.08.2026     strana: 36
Typ Nazev
Text
#_ Den_Prac datum, akyden, zaciat, koniec, u_zakaz, text_41, bb;
 __________ __ _____ _____ _ _________________________________________ ____
```

## eDen_Prac_N

```fand
{}
──────────────────────────────────────────────────────────────────────
#_ Den_Prac datum, akyden, zaciat, koniec, trvanie,
            program, u_zakaz,
            text_1, text_2, text_3;
   Dátum __________ __       od _____ do _____       spolu _____ hod.
         programovanie _ (A/N=servis)              u zákazníka _ (A/N)
   Práce ____________________________________________________________
         ____________________________________________________________
         ____________________________________________________________
──────────────────────────────────────────────────────────────────────

    ------------
```

## eDen_Prac_N

```fand
{}
──────────────────────────────────────────────────────────────────────
#_ Den_Prac datum, akyden, zaciat, koniec, trvanie,
            program, u_zakaz,
            text_1, text_2, text_3;
   Dátum __________ __       od _____ do _____       spolu _____ hod.
         programovanie _ (A/N=servis)              u zákazníka _ (A/N)
   Práce ____________________________________________________________
         ____________________________________________________________
         ____________________________________________________________
──────────────────────────────────────────────────────────────────────

    ------------
```

## eSkla2008

```fand
{}
#_ Sklad  popis1,  intkodtov,
         vyrcislo, mnozstvo, dph_sk,
         nakupcena, dph, s_DPH,
         a, b, fdo, mes, zaruka_do;
   Typ / Názov  ________________________________________ Kód___________
 V.č. _________________________  Množstvo _____          DPH __________ Sk
 Nákup. cena bez DPH __________ Sk  DPH _____ %  Nákup s DPH __________ Sk
         Príjem __________ ________ __________   Zár. ___ mes. __________
───────────────────────────────────────────────────────────────────────────

                         JU              16.08.2026     strana: 38
Typ Nazev
Text
```

## eSkl2008Br

```fand
{}
           Popis tovaru         Fa. dodav. Jedn.cena  Množ.    Spolu     DPH
─────────────────────────────────────────────── Sk ───────────── Sk ───── % ─
#_ Sklad popis1, fdo, nakupcena, mnozstvo, spolu, dph;
 ______________________________ __________ __________ _____ __________ _____
```

## eSkl2008BrKP

```fand
{}
           Popis tovaru        Fa. dodav.    V.č.   Jedn.cena  Množ. Výdaj
──────────────────────────────────────────────────────── Sk ───────────────
#_ Sklad popis1, fdo, vyrcislo, nakupcena, mnozstvo, na_vydaj;
 ____________________________ __________ __________ __________ _____ _____
```

## eSklad

```fand
{}
#_ Sklad  popis1,  intkodtov,
         vyrcislo, mnozstvo, dph_sk,
         nakupcena, dph, s_DPH,
         a, b, fdo, mes, zaruka_do;
   Typ / Názov  ________________________________________ Kód___________
 V.č. _________________________  Množstvo _____          DPH __________ Eur
 Nákup. cena bez DPH __________ Eur DPH _____ %  Nákup s DPH __________ Eur
         Príjem __________ ________ __________   Zár. ___ mes. __________
───────────────────────────────────────────────────────────────────────────
```

## eSkladBr

```fand
{}
           Popis tovaru         Fa. dodav. Jedn.cena  Množ.    Spolu     DPH
────────────────────────────────────────────── Eur ──────────── Eur ───── % ─
#_ Sklad popis1, fdo, nakupcena, mnozstvo, spolu, dph;
 ______________________________ __________ __________ _____ __________ _____
```

## eSkladBrKP

```fand
{}
           Popis tovaru        Fa. dodav.    V.č.   Jedn.cena  Množ. Výdaj
─────────────────────────────────────────────────────── Eur ───────────────
#_ Sklad popis1, fdo, vyrcislo, nakupcena, mnozstvo, na_vydaj;
 ____________________________ __________ __________ __________ _____ _____

    ------------
```

## eSkladBrKP

```fand
{}
           Popis tovaru        Fa. dodav.    V.č.   Jedn.cena  Množ. Výdaj
─────────────────────────────────────────────────────── Eur ───────────────
#_ Sklad popis1, fdo, vyrcislo, nakupcena, mnozstvo, na_vydaj;
 ____________________________ __________ __________ __________ _____ _____

    ------------
```

## eKPpol

```fand
{           Obrazovka pre KPpol }
#_ KPpol popis1, vyrcislo,
         popis2, prace,
         nakupcena, op, Bez_DPH, mnozstvo,
         dph, dph_sk,            vyrcislo,
                                 s_dph, s_dph_mn;
 Typ / Názov ________________________________________  Výr.č. _______________
 Upresnenie  ________________________________________   Práce _
 Nákup __________  OP __________ %  Predaj __________   Množstvo __________
 DPH _____  %         DPH __________           V.č. _________________________
─────────────────────────── Predaj s DPH __________ ─  Predaj ? __________ ───
```

## eKPpolBr

```fand
{           Obrazovka pre KPpol  }
                     Popis            Práce Množstvo     OP    Predaj
───────────────────────────────────────────────────────── % ── bez DPH ────
#_ KPpol popis1, prace, mnozstvo, op, bez_DPH;
 ______________________________________ _ __________ __________ __________
```

## eKP

```fand
{}
#_ KP  a, akyden, hod, b,
       ds, akyden1, zp,
       od, kodOP, n,
       z, mena,       dph, dph_Sk, mena,
       tovar, mena,            zn, mena,
       sluzby, mena,       vyrovn, mena,
                           zn_EUR, mena2,
                               pc, mena,
                           pohlad, mena;

    Dátum zaradenia     __________ __ _____ Označenie  24-________
    Dátum splatnosti    __________ __
    Dátum zdan. plnenia __________
    Odberateľ       ________________________________________  ____
    Text            ________________________________________

    Fakturácia bez DPH __________ ___         DPH _____ % __________ ___
                 Tovar __________ ___  Faktur. suma s DPH __________ ___
                Služby __________ ___       Halier. vyrovnanie _____ ___
                                                          __________ ___
                                         Uhradené - spolu __________ ___

                                               Pohľadávka __________ ___
```

## eKP_browse

```fand
Kniha pohľadávok

 Dátum  Doklad                 Odberateľ            Pohľadávka  Uhr K  SC Z
──────────24─────────────────────────────────────────────────────────────────
#_ KP den, b, od, pohlad, mena, uhr, uhrady_s, kod, bbs, zamok;
 _____ ________ _________________________________ __________ ___ _ _ _ ___ _

                         JU              16.08.2026     strana: 44
Typ Nazev
Text
```

## eKZpol

```fand
{           Obrazovka pre KZpol }
#_ KZpol popis1,    intkodtov,
         vyrcislo,  mnozstvo,  dph_sk,  mena,
         nakupcena, mena, dph, s_DPH, mena,
         spolu,     mes,       spolu_s_DPH;
   Typ / Názov  ________________________________________ Kód___________
 V.č. _________________________  Množstvo __________     DPH __________ ___
 Nákup. cena bez DPH __________ ___ DPH _____ %  Nákup s DPH __________ ___
────────────── Spolu __________ ── Záruka ___ mes. ─── Spolu __________ ───
```

## eREKLpol

```fand
{           Obrazovka pre REKLpol }
#_ REKLpol popis1,               merjedn,
           vyrcislo,  intkodtov, mnozstvo,
           a, b, var_sym,        kzpol_mnozstvo,
           c, d;
 Typ / Názov  ________________________________________      Množstvo ___
 V.č. _________________________ Kód ___________         reklam. __________
   DF __________ ________   Fa. dod. __________         prijaté __________
   VF __________ ________

───────────────────────────────────────────────────────────────────────────
```

## eKZpol_br

```fand
{           Obrazovka pre KZpol  }
                   Popis                     Cena   DPH Zár.
─────────────────────────────────────────── bez DPH  % ─────
#_ KZpol popis1, nakupcena, dph_s, mes;
 ________________________________________ __________ __ ___
```

## eREpol_br

```fand
{           Obrazovka pre REKLpol  }
                   Popis                     Množstvo     Výr. číslo
──────────────────────────────────────────────────────────────────────
#_ REKLpol popis1, mnozstvo, merjedn, vyrcislo;
 ________________________________________ __________ ___ ____________
```

## eKZ

```fand
{}
#_ KZ   a, akyden, b,
       zp, par_69, splat, akyden,
       od, ICPD,
       od_ucet, Vydaj, Aky_Vydaj, n,
       var_sym, kon_sym, {spc_sym,}
              x,
       dph_1, y,   DPH_Sk1,
       dph,   z,   DPH_Sk,    zn, mena,
                          zn_eur, mena2,
                              pc, mena,
       vyrovn, mena,     zavazok, mena;
       Dátum zaradenia  __________ __        Označenie 25-________
       Zdanite. plnenie __________ par.69 _ Splatná do __________ __
       Dodavateľ  ____________________________________ _______________
       Číslo účtu ____________________   druh výdaja _ _______________
       Text       ________________________________________
       Ext. ozn. (var. symbol)  __________  KS  __________

             dph %    bez dph      dph                 Fakturované
               0    __________                            s dph
             _____  __________  __________
             _____  __________  __________              __________ ___
                                                        __________ ___
                                               Uhradené __________ ___
             centové vyrovnanie _____ ___   Zostáva uhr.__________ ___
```

## eREKL

```fand
#_ REKL e, akyden, hod, f,
       dod, kodOP,
       odb, kodOP1;

       Dátum zaradenia  __________ __ _____    Označenie ________

       Dodávateľ       ________________________________________   ____

       Odberateľ       ________________________________________   ____
```

## eKZ_stala_pl

```fand
{}
#_ KZ b,            splat, akyden,
      od,           kodOP,
      n,
      var_sym,    var_ICO,
      kon_sym,         x, mena,
      spc_sym,         z, mena,
      od_ucet,         pc, mena;

       Označenie       25-________        Splatná do __________ __

       Platba pre      ________________________________________ ____

       Popis platby    ________________________________________

     Variabilný symbol __________ ─> pre prázdny údaj : __________
     Konštantný symbol __________                       __________ ___
                         JU              16.08.2026     strana: 49
Typ Nazev
Text
     Špecifický symbol __________               Čiastka __________ ___

            Číslo účtu ____________________    Uhradené __________ ___
```

## eKZ_sta_new

```fand
{}
#_ KZ mes,        uhr_do,
      od,         kodOP,
      od_ucet,     n,
      var_sym,   var_ICO,
      kon_sym,         x,
      spc_mes;

                Platba ___ x za rok   do ___ -ho v mesiaci

       Označenie       25-xxx (program vytvorí platby sám)

       Platba pre      ________________________________________ ____
       Číslo účtu      ____________________
       Popis platby    ________________________________________

     Variabilný symbol __________ ─> pre prázdny údaj : __________

     Konštantný symbol __________               Čiastka __________ Sk

     Špecifický symbol ___  ( -1 = 0498 v mesiaci 0598 )
```

## eKZ_browse

```fand
Kniha záväzkov

    Dátum    Doklad              Dodávateľ              Čiastka     Uhr V SC
───────────────25────────────────────────────────────────────────────────────
#_ KZ a, b, od, zn, mena, uhr, uhrady_s, vydaj, bbs;
 __________ ________ _______________________________ __________ ___ _ _ _ ___
```

## eREKL_browse

```fand
Kniha reklamácií

    Dátum    Doklad                       Dodávateľ                      SC
────────────────────────────────────────────────────────────────────────────
#_ REKL e, f, dod, bbs;
 __________ ________ __________________________________________________ ___
```

## eUhrady

```fand
{}
#_ Uhrady pb, b,
           a, od_ucet,
           c,
               pc;

  Realiz. dňa  __________     Označenie ________
  Vystav. dňa  __________       účet OP ____________________
  Var. symbol  __________
   Suma spolu  __________ Sk  + Pohľadávka   - Záväzok
```

## eUhradyBr

```fand
{}
   Dátum     Doklad         Dodávateľ  -  účel platby     Kód  čiastka  Uh
──────────────────────────────────────────────────────────────────────────────
#_ Uhrady a, b, c, pb, pc, od_ucet, prirad_kp, prirad_kz;
 __________ ________ _____________ __________ __________ ________________ _ _
```

## eDoprPros

```fand
{}
 Kód Dopravný prostriedok
──────────────────────────
#_DoprPros skr, prostr;
 ___ ____________________
```

## eSC

```fand
{}
#_ sc bb, zaciatok, akyden, zaciatoh,         koniec, konieh,
     prostr,    prostr1,
                kam,        cestsm, mena,       uby, mena, spolu, mena;

                        Evidencia pracovných ciest - 40 


     Por. ____ Začiatok: __________ __ _____ Koniec : __________ _____

       Dopr. prostriedok ___ ________________________________________

                    Kam: ________________________________________

                Cestovné _______ ___           Ubytovanie ________ ___

   ─────────────────────────────────────────────────────────────────────

                                                  Spolu _________ ___
```

## eSC_br

```fand
{}
  Č. Začiatok Koniec Kam                                  Kód   Cestovné
─ 40 ──────────────────────────────────────────────────── pro.── náklady
#_ sc cislo, zac_d, akyden, kon_d, kam, prostr, spolu;
 ___ _____ __ _____ _____________________________________ ___  _________
```

## eAuto

```fand
{}
 Typ auta                 ŠPZ    Kód   Spotreba  Palivo      LPG  Fir
───────────────────────────────────── mimo mesto ────────── l/100 ─ Akt
#_ Auto Typ, SPZ, kod, PS, MS, Pal, LPG, Fir, pou;
 ____________________ __________ ___ _____ _____ __________ _____  _ _
```

## eAutoUplne

```fand
{}
#_ Auto Typ, SPZ, kod, Pal, nadrz, stn, koef, stnmesto,
        eh90, eh120, ehme,  esmi, esko, esme,
        lpg,  koef, LPGmesto;

   Typ auta ____________________  ŠPZ __________  Kód  ___

  ┌────────────────────────────────────────────────  plná ──┐
  │ Palivo _______________ spotreba [ l / 100 km ]    ___ l │
  ├─────────────────────────────────────────────────────────┤
  │  STN   priem. _____      koef.  ____      mesto _____   │
  │  EHK   90km/h _____    120km/h _____      mesto _____   │
  │EU ES     mimo _____    kombin. _____      mesto _____   │
  ├─────────────────────────────────────────────────────────┤
  │            Palivo LPG spotreba [ l / 100 km ]           │
  ├─────────────────────────────────────────────────────────┤
  │        priem. _____      koef.  ____      mesto _____   │
  └─────────────────────────────────────────────────────────┘
```

## eSpotPrie

```fand
{}
#_ SpotPrie pal, km, KM_lpg, litre, LITRE_lpg,
            Sk_za_PHM, mena, Sk_za_LPG, mena,
            spotr, spotr_LPG,
            servis, mena, opravy, mena, invest, mena, ine, mena ;

                  ____________                 LPG

     Vzdialenost   _______     km           _______     km

      Tankovanie   __________  l            __________  l

          Palivo   __________  ___          __________  ___

 Priem. spotreba   ________ l/100km         ________ l/100km

                       Servis __________  ___
                       Opravy __________  ___
                   Investície __________  ___
                         JU              16.08.2026     strana: 61
Typ Nazev
Text
                   Iné vydaje __________  ___ (dane, poistné atd.)


    eSpotreba_U 
{}
 Dátum      Litre   Sk/1l   Sk     Začiatok    Koniec   Vzd. Spotreba
──────────────────────────────────────────────────────────────────────
#_ Spotreba datum, litre, SK_NA_1L, Sk_za_PHM_S, zacia_km, koniec_km, km_s, spotr;
__________ ______ ______ _______ _______ _______ ____ ______
```

## eSpotPrie

```fand
{}
#_ SpotPrie pal, km, KM_lpg, litre, LITRE_lpg,
            Sk_za_PHM, mena, Sk_za_LPG, mena,
            spotr, spotr_LPG,
            servis, mena, opravy, mena, invest, mena, ine, mena ;

                  ____________                 LPG

     Vzdialenost   _______     km           _______     km

      Tankovanie   __________  l            __________  l

          Palivo   __________  ___          __________  ___

 Priem. spotreba   ________ l/100km         ________ l/100km

                       Servis __________  ___
                       Opravy __________  ___
                   Investície __________  ___
                         JU              16.08.2026     strana: 61
Typ Nazev
Text
                   Iné vydaje __________  ___ (dane, poistné atd.)


    eSpotreba_U 
{}
 Dátum      Litre   Sk/1l   Sk     Začiatok    Koniec   Vzd. Spotreba
──────────────────────────────────────────────────────────────────────
#_ Spotreba datum, litre, SK_NA_1L, Sk_za_PHM_S, zacia_km, koniec_km, km_s, spotr;
__________ ______ ______ _______ _______ _______ ____ ______
```

## eSpotreba

```fand
{}
    Dátum   Litre  U  B/P  Cena s DPH  B   Začiatok Koniec Vzd.Spotr.  Úspora
───────────────────p─Sk/E/1l─ Sk/E ─Sk/E/1l ────────────────── l/100km ── LPG ─
#_ Spotreba datum, litre, DO_PLNA, SK_NA_1L, Sk_za_PHM_S, SK_Be_1L,
            zacia_km, koniec_km, km_s, cerp_spotr_s, sposob, kos, usp_LPG_s;
 __________ ______ ________ _______ _______ _______ _______ ___ _____ _ _____
```

## eSpotrebaNm

```fand
{}
    Dátum   Litre  U   Cena s DPH   Začiatok  Koniec Vzd. Spotr.  Firma
───────────────────p─ Eur/1l ─ Eur ──────────────────── l/100km ──────────
#_ Spotreba datum, litre, DO_PLNA, SK_NA_1L, Sk_za_PHM_S,
            zacia_km, koniec_km, km_s, cerp_spotr_s, sposob, firma;
 __________ ______ _ _______ _______ _______ _______ ____ _____ _ ________
```

## eSpotreba1

```fand
{}
 Dátum  Účet Zľava  Spolu ┌ DPH ┐     Hod.    Miesto     Firma   Shell   Kos.
─────── A/N ───── ─Sk/Eur % ─ Sk/Eur ──────────────────────────── body ───────
#_ Spotreba datum6, ucet, palivo, zlava, Sk_za_PHM_S, DPH_s, DPH_Sk, hod,
   miesto,  firma, body_Shell, kosacka;
 ______ _ _ _____ _______ __ _______ _____ ___________ __________ ____ ______
```

## eSpotreba1Nm

```fand
{}
 Dátum  Účet Zľava  Spolu ┌ DPH ┐     Hod.    Miesto     Firma   Shell rezer.
─────── A/N ───────── Eur % ── Eur ────────────────────────────── body ───────
#_ Spotreba datum6, ucet, palivo, zlava, Sk_za_PHM_S, DPH_s, DPH_Sk, hod,
   miesto,  firma, body_Shell, kosacka;
 ______ _ _ _____ _______ __ _______ _____ ___________ __________ ____ ______

    pShell      

var x : real; s : record of spotreba;
begin
{ forall x in s (datum>valdate('15.06.2004','DD.MM.YYYY')) ! % do begin
    s.body_shell := 0;
    if pos('SHELL',upcase(s.firma))>0 then s.body_shell := int(s.litre);
    writerec(s, x);
  end; }
  forall x in s (datum>valdate('12.05.2004','DD.MM.YYYY')) ! % do begin
    s.DO_PLNA:=true; writerec(s, x);
  end;
end;
```

## eSpotreba1Nm

```fand
{}
 Dátum  Účet Zľava  Spolu ┌ DPH ┐     Hod.    Miesto     Firma   Shell rezer.
─────── A/N ───────── Eur % ── Eur ────────────────────────────── body ───────
#_ Spotreba datum6, ucet, palivo, zlava, Sk_za_PHM_S, DPH_s, DPH_Sk, hod,
   miesto,  firma, body_Shell, kosacka;
 ______ _ _ _____ _______ __ _______ _____ ___________ __________ ____ ______

    pShell      

var x : real; s : record of spotreba;
begin
{ forall x in s (datum>valdate('15.06.2004','DD.MM.YYYY')) ! % do begin
    s.body_shell := 0;
    if pos('SHELL',upcase(s.firma))>0 then s.body_shell := int(s.litre);
    writerec(s, x);
  end; }
  forall x in s (datum>valdate('12.05.2004','DD.MM.YYYY')) ! % do begin
    s.DO_PLNA:=true; writerec(s, x);
  end;
end;
```

## eSpotreba2

```fand
{}
 Dátum       Servis Iné výd. Oprava Invest.             Popis
───────────── [Sk] ── [Sk] ── [Sk] ── [Sk] ─────────────────────────────────
#_ Spotreba datum, servis, INE, oprava, invest, popis;
 __________ _______ _______ _______ _______ ________________________________
```

## esc_roky

```fand
{}
  Rok   Sk do PD
──────────────────
#_SC_roky rok, spolu;
 ____  __________
```

## eEvi_Auto

```fand
{}
 Dátum    Deň   Od    Do    Zač.   Koniec Vzdial.     Kam     Náhrada LPG
──────────────────────────────────────────────────────────── Sk / Eur ──────
#_ evi_auto datum, AkyDen, zaciatok, koniec, zac_km, kon_km, poc_km, kam, spolu, LPG, cislo;
 __________ __ _____ _____ _______ _______ ______ ___________ _______ _ ___
```

## eEvi_Auto_U

```fand
{}
#_ evi_auto 1:datum, 2:zaciatok, 3:koniec, 4:odkial, 5:zac_km,
            9:cena_PHM, 10:PHM,        6:kam,    7:kon_km,
           11:bb,  12:ucel, 13:LPG,              8:poc_km, spolu, mesto_s;
 Dňa __________ hod _____-_____   Odkiaľ ____________________ _______ km
 PHM _______ > bez DPH _______ Sk/1l Kam ____________________ _______ km
 Účel ____ _________________________________ LPG _ A/N Vzdial. ______ km
───────────────────────────────── Náhrada Sk _______ ─── Mesto ______ km
```

## eEvi_Auto_EU

```fand
{}
#_ evi_auto datum,            odkial, zac_km,                PHM_zac,
            zaciatok, koniec,    kam, kon_km,                PS_km,
            bb,  ucel,                         LPG,          poc_km,
            cena_PHM, PHM,                                   spolu;
 Dňa __________ Odkiaľ ____________________ _______ km  PHM zač._____ l.
                         JU              16.08.2026     strana: 69
Typ Nazev
Text
 hod _____-_____   Kam ____________________ _______ km  PHM spo._____ l.
 Účel ____ _________________________________ LPG _ A/N Vzdial. ______ km
── cena PHM _______ Eur > bez DPH _______ Eur/1l ──── Náhrada _______ Eur
```

## eUdajO

```fand
{}
#_ UdajO 1:firma,                      3:ICO,
        2:meno,                        4:DRC, 5:ICPD,
       23:kodop,     6:cinnos,
        7:ulica,     8:PSC,         9:miesto,
       10:tlf,      11:tlfa,
       12:fax,      13:tlfb,
       14:PenUst,   15:Cu,
       16:Pozn,
       18 : var_sym,
       19 : kon_sym,   21 : x,
       20 : spc_sym,   22 : ku;

   Firma / úrad ______________________________     IČO __________
   Kontakt      ______________________________     DIČ _______________
                                                IČ DPH _______________
   Kód ____   Činnosť ________________________________________________

   Ulica ____________________   PSČ ______ Miesto ____________________

   Tlf 1 _______________                    Tlf 2 _______________
     Fax _______________     E-mail __________________________________
   Banka ____________________                č.ú. ____________________
   Pozn. ___________________________________________________________

   Variabilný symbol __________  ( pre KZ, KP )
   Konštantný symbol __________                     Záväzok __________
   Špecifický symbol __________                     Splatné ku  ______

────────────────────────────────────────────────────────────────────────
```

## eUdajF

```fand
{}
 Meno (Názov firmy)            Miesto
────────────────────────────────────────────────────
#_UdajO nazmie;
 __________________________________________________
```

## eUdajP

```fand
{}
#_UdajO meno,miesto;
 ______________________________ ____________________
```

## eUdajM

```fand
{}
#_UdajO miesto,FirMen;
 ____________________ ______________________________
```

## edph

```fand
{}
     Obdobie      DPH Vstup    DPH Vstup  dph §69    Výstup     Spolu
───────────── d % ──────── h % ────────────────────────────────────────────
#_ DPH do, dph1_s,dph1vstup, dph2_s,dph2vstup, DPH_PAR_69, dph2vystup,spolu, mena;
 Q __________  __ _________ __ _________ _________ _________ _________ ___
```

## eOP

```fand
#_ PARAM a1, a2;
   Požadovaná cena bez DPH __________
   Požadovaná cena s DPH   __________
```

## ePoklDokl

```fand
#_PoklDokl
       a,  b,  d,
       a1, sl_a1,
       a2, sl_a2;
                           Pokladničný doklad

  Dátum vykonania zápisu  __________

  Druh a číslo dokladu    __________

  Text  ________________________________________________________

  ──────────────────────────────────────────────────────────────────────────

  PRÍJEM [Sk]   hotovosť __________
                  slovom ________________________________________

  VÝDAJE [Sk]   hotovosť __________
                  slovom ________________________________________
```

## ePoklDokl_Br

```fand
Pokladničný doklad

   Zo dňa     Doklad      Príjem     Výdaj       Celkom   Priebežne
─────────────────────────────────────────────────────────────────────
#_ PoklDokl a,  b, a1, a2, Spolu, Prieb;
 __________ __________  __________ __________  __________ __________
```

## erevolv

```fand
{}
  Vklad Sk     p.a.  Poč.   Výnos     Spolu Sk
────────────── [%] ─ mes.────────────────────────
#_revolv vklad, pa, mes, vynos, spolu;
 ___________ _______ ____ __________ ___________
```

## eBytUdaje

```fand
{}
 Plocha
── m2 ───
#_ BytUdaje plocha;
 ______
```

## eByt

```fand
{}
 Obdobie   Spolu    Základné    Nárast      Dodávky     Nárast
──────────────────── nájomné ─ Sk ─── % ── a služby ── Sk ─── % ─
#_ Byt mr, AB_sum, A_sum, A_plus, A_perc, B_sum, B_plus, B_perc;
 _______ _________ _________ ______ _____ _________ ______ _____
```

## eByt_A

```fand
{}
                  A. Základné nájomné
───────────────────────────────────────────────────────────
#_Byt A1,A2a,A2b,A2c,A2d,A2e,A2f,A2g,A2h,A3,A4,A5,A_sum;

 1. Splátka investičného úveru - anuita           ________
 2. Fond ROÚ
    a) základná tvorba                            ________
    b) paušál na výťahy                           ________
    c) údržba STA                                 ________
    d) rezerva na reg. a mer. pristroje           ________
    e) pomerové merače tepla                      ________
    f) splátka fin. výpomoci z RHF                ________
    g) ostatné splátky (reg.ventily a iné)        ________
    h) splátky nákl. za opr.v byte                ________
 3.Príspevok na správu                            ________
 4.Odmena VČS                                     ________
 5.Odmena domovníka                               ________
───────────────────────────────────────────────────────────
                         JU              16.08.2026     strana:168
Typ Nazev
Text
   Spolu                                         _________
```

## eByt_B

```fand
{}
           B. Zálohy za dodávky a služby
───────────────────────────────────────────────────────────
#_Byt B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B_sum;

 1. Dodávka tepla na ÚK                           ________
 2. Teplo na ohrev TÚV                            ________
 3. Vodné a stočné TW                             ________
 4. Vodné a stočné SV                             ________
 S. Odvedenie zrážkových vôd                      ________
 6. Odvoz a uloženie domového odpadu              ________
 7. Spotreba elektr. energie v spoločných priest. ________
 8. Spotreba elektr. energie - výťah              ________
 9. Poistné                                       ________
 10.Daň z nehnuteľnosti                           ________
───────────────────────────────────────────────────────────
   Spolu                                         _________

    ============
```

## eByt_B

```fand
{}
           B. Zálohy za dodávky a služby
───────────────────────────────────────────────────────────
#_Byt B1,B2,B3,B4,B5,B6,B7,B8,B9,B10,B_sum;

 1. Dodávka tepla na ÚK                           ________
 2. Teplo na ohrev TÚV                            ________
 3. Vodné a stočné TW                             ________
 4. Vodné a stočné SV                             ________
 S. Odvedenie zrážkových vôd                      ________
 6. Odvoz a uloženie domového odpadu              ________
 7. Spotreba elektr. energie v spoločných priest. ________
 8. Spotreba elektr. energie - výťah              ________
 9. Poistné                                       ________
 10.Daň z nehnuteľnosti                           ________
───────────────────────────────────────────────────────────
   Spolu                                         _________

    ============
```

## ePoistky

```fand

```

## ePoistky

```fand
{}
          Popis poistenia      Mes     Pisťovňa         Dátum      Dátum
────────────────────────────── Roč ──────────────────── vzniku ─── zániku ──
#_Poistky popis, forma, poistovna, dat_vzniku, dat_zaniku;
 ______________________________ _ ___________________ __________ __________
```

## ePoistkyM

```fand
{}
  Poistné  Dát.
───────────────
#_Poistky poistne, m_termin;
 _________  __
```

## ePoistkyR

```fand
{}
  Poistné   Dátum
──────────────────
#_Poistky poistne, r_termin;
 _________  _____
```

## eVyuctSSE

```fand
{}
   Obdobie    Elektromer Spotr.JCena Paušál Spolu  DPH S DPH  Záloha - Nedopl.
─── koniec ─ zač.─ koniec─ kWh ─ Sk ── Sk ─── Sk ── % ─── Sk ── Sk ─ + Prepla.─
#_ VyuctSSE mr, zac_el, kon_el, spotr, j_cena, pausal, spolu, dph, sDph, el, rozdiel, pozn;
 __________ ______ ______ ____ _____ ______ ______ ___ ______ ______ ______ _
```

## eElSasa

```fand
{}
     Dátum      Stav [kWh] Spotreba [kWh] Dni Denná sp. [kWh] Denná sp. [Sk]
──────────────── VS ─── NS ─── VS ─── NS ─────── VS ─── NS ──── VS ─── NS ────
#_ ElSasa mr, akyden, el_v, el_n, spotreba_v, spotreba_n, {dni,}
          priemer_v, priemer_n, sk_priemer_v, sk_priemer_n, vymena;
__________ __ ______ ______ ________ ________ ______ ______ _______ _______ _
```

## eVyucVeol

```fand
{}
   Obdobie     Vodomer   Spotr.JCena Paušál Spolu  DPH S DPH  Záloha - Nedopl.
─── koniec ─ zač.─ koniec─  l. ─ Sk ── Sk ─── Sk ── % ─── Sk ── Sk ─ + Prepla.─
#_ VyucVEOL mr, zac_h2o, kon_h2o, spotr, j_cena, pausal, spolu, dph, sDph, h2o, rozdih2o, pozn;
 __________ ______ ______ ____ _____ ______ ______ ___ ______ ______ ______ _
```

## eH2O_Sasa

```fand
{}
     od         do      Stav   Spotreba  Dni   Denná spotreba
─────────────────────── [m3] ─── [m3] ───────── [l] ── [Sk] ──
#_ h2o_Sasa mp, mr, h2o_v, spotreba_v, dni,
          priemer_v, sk_priemer_v;
 __________ __________ ______   ______   ___  ________ _______

                         JU              16.08.2026     strana:177
Typ Nazev
Text
```

## eBaterie

```fand
{}
  Kód  Výrobca   Typ   mAh   Kúpené            Aktuálne miesto
────────────────────────────────────────────────────────────────────────────
#_ Baterie kod, vyrobca, typ, mAh, kupene, kde_som;
 ____ __________ ___ ______ __________ ____________________________________
```

## eTeplo

```fand
{}
   Obdobie    Obyvačka       Kuchyňa        Spálňa     Manov brloh
─── koniec ─ zač.─ koniec  zač.─ koniec  zač.─ koniec  zač.─ koniec  Spolem
#_Teplo mr, zac_ob,kon_ob, zac_ku,kon_ku, zac_sp,kon_sp, zac_de,kon_de, spolu;
 __________ ______ ______ ______ ______ ______ ______ ______ ______  ______
```

## eVyuctSPP

```fand
{}
   Obdobie     Plynomer    Spotr. JCena   Paušál   Spolu   Záloha - Nedopl.
─── koniec ─ zač.─ koniec ── m3 ─── Sk ──── Sk ───── Sk ──── Sk ─ + Prepla.─
#_ VyuctSPP mr, zac_pl, kon_pl, spotr, j_cena,  pausal, spolu, pl, pozn, rozdiel;
 __________ ______ ______ ______ _______  ______ _________ ______ _ ______
```

## eInkaso

```fand
{}
 Obdobie   Elektrina     Plyn      Rozhlas      TV      Spolu
─ koniec ── Sk ─── % ─ Sk ─── % ─ Sk ─── % ─ Sk ─── % ─── Sk ──
#_ Inkaso mr, el, el_perc, pl, pl_perc, ra, ra_perc, tv, tv_perc, In_sum;
 _______  _____ _____ ____ _____ ____ _____ ____ _____  ______
```

## ePlatby

```fand
#_ Platby  a, splat, akyden, b, od, od_ucet, n,
       var_sym, spc_sym, kon_sym, x, pc, zavazok;
     Dátum zaradenia __________        Splatná do __________ __
           Označenie 25-________

     Dodávateľ         ________________________________________
     Číslo účtu        ____________________
     Text              ________________________________________

     Variabilný symbol __________  Špecifický symbol __________
     Konštantný symbol __________

              Spolu Sk __________   Uhradené __________ Sk

                                Zostáva uhr. __________ Sk
```

## ePlatby_Stal

```fand
{}
#_ Platby mes, uhr_do, b, splat, akyden, od, od_ucet, n,
      var_sym, spc_sym, kon_sym, x, pc, zavazok;

                Platba ___ x za rok   do ___ -ho v mesiaci
                         JU              16.08.2026     strana:184
Typ Nazev
Text

       Označenie       25-________      Splatná do __________ __

       Platba pre      ________________________________________
       Číslo účtu      ____________________
       Popis platby    ________________________________________

     Variabilný symbol __________  Špecifický symbol __________
     Konštantný symbol __________

              Spolu Sk __________   Uhradené __________ Sk

                                Zostáva uhr. __________ Sk
```

## ePlatby_Brow

```fand
Kniha záväzkov

   Dátum     Doklad          Dodávateľ  -  Účel platby         Čiastka  Uh
────────────── 25 ────────────────────────────────────────────── [Sk] ─────
#_ KZ a, b, od_n, zn, uhr;
 __________ ________ ________________________________________ __________ _
```

## eDruhDruh

```fand
{}
      Druh tovaru
──────────────────────
#_druhdruh d;
 ____________________
```

## eDruhTova

```fand
{}
      Upresnenie       DPH          Druh
────────────────────────────────────────────────
#_ druhtova d, dph, druhy;
 ____________________ _____ ___________________
```

## eObchody

```fand
{}
         Názov               Miesto              Spolu Sk
──────────────────────────────────────────── bez DPH ─── s DPH ──
#_ Obchody nazov, mesto, bez_dph, spolu;
 ____________________ ____________________ __________ __________
```

## eTovary

```fand
{}
              Názov              Kod  Mj  DPH      Druh tovaru
────────────────────────────────────────── % ───────────────────────
#_ tovary d, kod_s, mj,                  dph, druhtova;
 ______________________________ ____ ___ _____ ____________________
```

## eNakup_o

```fand
{}
    Dátum             Obchod, miesto                      Spolu Sk
─────────────────────────────────────────────── bez DPH ──── DPH ─── s DPH ───
#_nakup_o datum, obchod, kto, bez_dph, dph, spolu;
 __________ ________________________________ _ __________ ________ __________
```

## eTlacNakup_o

```fand
{}
  Dátum             Obchod, miesto                      Spolu Sk
─────────────────────────────────────────────── bez DPH ──── DPH ─── s DPH ───
#_nakup_o tlac, obchod, kto, bez_dph, dph, spolu;
 _______ ________________________________ _ __________ ________ __________
```

## eNakup_t

```fand
{}
              Tovar                Cena     DPH  Množstvo  MJ    Spolu
────────────────────────────────── s DPH ─── % ─────────────────── Sk ───
#_ nakup_t tovar, cena, dph, mnoz, mj, spolu;
 ______________________________ __________ _____ ________ ___ __________
```
