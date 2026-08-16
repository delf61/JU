# Verified Tables (F* Objects)

## help.hlp

```fand
tema:A,5;
text:T;
```

## ParamCat

```fand
{Parametricky subor}

     Rok : D,'YYYY';
      SC : F,3,0;

#K @ @

#C rok_s := strdate(rok,'YYYY') : A,4;
```

## param

```fand
{Parametricky subor}

s01:F,3,0;
s08:F,3,0;
KP:F,3,0;
KZ:F,3,0;
zak:F,3,0;
ME:F,3,0;
uc:F,3,0;
sc:F,3,0;
pd:F,3,0;
dat:B;
a:A,30;
b:A,30;
c:A,8;
Titul : A,5;
Nazov : A,20;
Meno  : A,10;
Priezv: A,15;
Miesto: A,20;
browse: B;
Datum : D,'DD.MM.YYYY';
Dat0  : D,'MM.YYYY';
Dat1  : D,'DD.MM.YYYY';
Dat2  : D,'DD.MM.YYYY';
cislo : F,5,0;
pocet : F,5,0;
a1:F,6.2;  {Prijem  ────┬────  Hotovost  ────┬────  Penazne prostriedky}
a2:F,6.2;  {Vydaje  ────┘                    │                         }
a3:F,6.2;  {Prijem  ────┬────  Bezny ucet  ──┘                         }
a4:F,6.2;  {Vydaje  ────┘                                              }
a1234:F,6.2;
doklad:A,1;
prvy:B;
posl:B;
MinCas : D,'DD.MM.YYYY';
AktCas : D,'DD.MM.YYYY';
NameSearch : A,25 ;   { pole pro zadání řetězce }
NSearch    : F,4.0;   { délka pole - kvůli příp. významným mezerám ve stringu }
ok         : B ;
nazmie : A,50;
Zaciat : D,'hh:mm';
koniec : D,'hh:mm';

dph : F,2.1; { sadzba dane v % }
                         JU              16.08.2026     strana:  4
Typ Nazev
Text

var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;
intkodtov : F,10,0;

#K @ @

#C today_s := strdate(today,'DD.MM.YYYY') : A,10;
   aa := '' : A,1;
   mena := cond(val(paramcat.rok_s) < 2009 : 'Sk ', else : 'Eur') : A,3;
   mena2 := cond(val(paramcat.rok_s) < 2009 : 'Eur', else : 'Sk ') : A,3;
```

## Par

```fand
{Parametricky subor}

     Kod : A,3;
   Trasa : A,6;
zaciatok : D,'DD.MM.YYYY';
zaciatoh : D,'hh:mm';
  koniec : D,'DD.MM.YYYY';
  konieh : D,'hh:mm';
  zac_km : F,5,0;
     vzd : F,4,0;
     tra : F,3,0;
       z : A,20;
      do : A,20;
     kam : A,40;
    ucel : A,40;
cena_PHM : F,3.2;
 dph_dol : F,2.1;
 dph_hor : F,2.1;
   kurzy : A,70;       { cesta k súborom s info o kurzoch }
      BA : A,4;
      CU : A,12;
   banka : A,35;
      zv : D,'DD.';    { pravidelne mesacne zasielanie vypisov }
      PD : B;          { sc z pd - n = z EZ }
#K @ @
#C ucet := trailchar(' ',cu) + ' / ' + ba : A,20;
   mena := cond(val(paramcat.rok_s) < 2009 : 'Sk ', else : 'Eur') : A,3;
   mena2 := cond(val(paramcat.rok_s) < 2009 : 'Eur', else : 'Sk ') : A,3;

                         JU              16.08.2026     strana:  5
Typ Nazev
Text
```

## Kalendar.x

```fand
Datum : D,'DD.MM.YYYY';
TypeDay : F,1.0;
  Jmeno : A,25!;
   Meno : A,25!;
      T : T!;
     sc : F,2,0;
#C  Den := strdate(Datum,'DD.MM'):  A,5;
      D := datum mod 7:F,1,0;
 AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
 Sviato := cond(typeday=3:'Sv',D=6 | D=0:'ű', else:''):A,2;
    rok := strdate(datum, 'YYYY') : A,4;
   prvy := valdate('01.01.'+rok,'DD.MM.YYYY') : F,7,0;
  Dprvy := prvy mod 7:F,1,0;
{ dalsi := cond(D=1:1, D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;}
tyzden:= ((datum - prvy) div 7) + 1 : F,3,0;
#K @ * Datum;
   iDen (@) * Den;
   iJmeno (@) *~Jmeno;
   iMeno (@) *~Meno;
```

## Doklady

```fand
{      Doklady    }

  d:A,20;    {text                }
  B:A,1;     {Skratka             }
 AN:B;

                         JU              16.08.2026     strana:  7
Typ Nazev
Text
```

## SadzbDPH

```fand
DPH_Dol : F,2.1;
DPH_Hor : F,2.1;

od : D,'DD.MM.YYYY';
do : D,'DD.MM.YYYY';

#K @ @
```

## Staty.x

```fand
Stat:A,3;
Nazov:A,33;
#K @ stat;
   iNazSta (@) * ~Nazov;
```

## Kraje.x

```fand
KOD : A,'!';
NAZOV:A,20!;      { 60 }
KM2 : F,4,0;
OBY : F,6,0;

#K @ * kod;
```

## Okresy.x

```fand
KOD :A,'!!';
NAZOV:A,20!;    { 60 }
KRAJ:A,1;
KM2 : F,4,0;
OBY : F,6,0;

kod_Medi : F,3.0;

#K @ * kod;
   Kraje Kraj;

#C NazKraj := Kraje.Nazov : A,20;

#A Kraje.km2 += km2;
   Kraje.oby += oby;
```

## Mesta.x

```fand
kod : A,4;
NAZOV:A,20 ;     { 60 }
OKRES:A,'!!';
TEL:A,8 ;
PSC:A,5 ;

#K @ * ~Nazov;
   Okresy Okres;

#C NazKraj := Okresy.NazKraj : A,20;
   NazOkres := Okresy.Nazov : A,20;
```

## Banky.x

```fand
KODban  : A,4!;
SKRATKA : A,10!;
popis   : A,40!;

#K @ kodBAn;
                         JU              16.08.2026     strana:  9
Typ Nazev
Text

#C bapop := kodban + ' ' + popis : A,40;
```

## Trasy.x

```fand
tra : F,3,0;
  z : A,20;
 do : A,20;
vzd : F,4,0;

cez : A,100;

mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;

#K @ tra;
   iTrZDo (@) * z,do;
   iTrDoZ (@) * do,z;
   iTrZ (@) * z;
   iTrDo (@) * do;
```

## UdajO.x

```fand
{ Udaje o spolupracujucich firmach - adresa, telefon ... }

kodop:F,3,0;
 firma:A,30;
  meno:A,30;
cinnos:A,60; { cinnosti }
                         JU              16.08.2026     strana: 10
Typ Nazev
Text
 ulica:A,20;
   psc:A,6;
miesto:A,20;
   tlf:A,15;
  tlfa:A,15;
  tlfb:A,40;
   fax:A,15;
   ICO:A,10;
PenUst:A,20;
    Cu:A,20;
  Pozn:A,60;
   DRC:A,15;
  ICPD:A,15;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;

ku : D,'DD.MM.';
 x : F,6.2;              {záväzok bez dane v % 0 }

do : D,'DD.MM.YYYY';

#C Priezv:=copy(Meno, pos(' ', Meno)+1,16):A,16;
   nazmie:=cond(firma<>~'' : firma, else : meno) + miesto : A,50;
   naz_mie:=trailchar(' ',cond(firma<>~'' : firma, else : meno))+', '+miesto : A,50;
   firmen:=cond(Firma<>~'':Firma, else  :Meno ):A,30;
   nazmie_:=cond(firma<>~'' : firma, else : meno) + miesto : A,50;
#K @ ~NazMie;
   iAbcU (@) * ~Firmen;
   iNazMie_ (@) * ~NazMie_;
   iNaz_Mie (@) * ~Naz_Mie;
   iKodOP (@) kodOP;
#C Adresa:='        '+Meno+'\13\10'+
           '        '+Ulica+'\13\10'+
             Psc+'  '+Miesto:T;
#I kodOP := param.pd;
   icpd := 'SK' + DRC;


    ------------
```

## UdajO.x

```fand
{ Udaje o spolupracujucich firmach - adresa, telefon ... }

kodop:F,3,0;
 firma:A,30;
  meno:A,30;
cinnos:A,60; { cinnosti }
                         JU              16.08.2026     strana: 10
Typ Nazev
Text
 ulica:A,20;
   psc:A,6;
miesto:A,20;
   tlf:A,15;
  tlfa:A,15;
  tlfb:A,40;
   fax:A,15;
   ICO:A,10;
PenUst:A,20;
    Cu:A,20;
  Pozn:A,60;
   DRC:A,15;
  ICPD:A,15;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;

ku : D,'DD.MM.';
 x : F,6.2;              {záväzok bez dane v % 0 }

do : D,'DD.MM.YYYY';

#C Priezv:=copy(Meno, pos(' ', Meno)+1,16):A,16;
   nazmie:=cond(firma<>~'' : firma, else : meno) + miesto : A,50;
   naz_mie:=trailchar(' ',cond(firma<>~'' : firma, else : meno))+', '+miesto : A,50;
   firmen:=cond(Firma<>~'':Firma, else  :Meno ):A,30;
   nazmie_:=cond(firma<>~'' : firma, else : meno) + miesto : A,50;
#K @ ~NazMie;
   iAbcU (@) * ~Firmen;
   iNazMie_ (@) * ~NazMie_;
   iNaz_Mie (@) * ~Naz_Mie;
   iKodOP (@) kodOP;
#C Adresa:='        '+Meno+'\13\10'+
           '        '+Ulica+'\13\10'+
             Psc+'  '+Miesto:T;
#I kodOP := param.pd;
   icpd := 'SK' + DRC;


    ------------
```

## Cinnosti.x

```fand
KODcin:F,3,0;
cinnos:A,60;

#K @ kodcin;
```

## Udaje

```fand
{ Udaje o podnikatelovi  @ @ }

  meno:A,10;
priezv:A,15;
 titul:A,5;
 nazov:A,40;
   ICO:A,10;
   DIC:A,10;

  ICPD:A,15;
drcDPH:A,15;
DatDPH:D,'DD.MM.YYYY';
   Q_M:A,1!;
sadzba:F,2.1;

   uli:A,20;
   cis:A,5;
   PSC:A,6;
                         JU              16.08.2026     strana: 11
Typ Nazev
Text
miesto:A,20;
   tlf:A,13;
  tlf1:A,13;
 mobil:A,13;
mobil1:A,13;
   fax:A,13;
  fax1:A,13;
 email:A,28;
hodsadzba:F,2.2;
PRGhodsadzba:F,2.2;

#K @ @

#C bydl      := trailchar(' ',uli)+' '+cis+', ' + PSC+' '+ miesto : A,50;
   Cele_meno := cond(titul<>~'' : trailchar(' ',titul) + ' ') +
                trailchar(' ',Meno) + ' ' + priezv : A,25;
   Dan_urad  := copy(drcdph,pos('/',drcdph)+1,3) : A,3;
   drc1 := medz(copy(drcdph,1,pos('/',drcdph)-1)) : A,20;
   drc2 := medz(dan_urad) : A,6;
   dic_nove := leadchar(' ',replace('SK',ICPD,'')) : A,15;
#L priezv<>~'' : 'Priezvisko musí byť zadané !';
   nazov <>~'' : 'Názov firmy musí byť zadaný !';
   uli <>~'' : 'Adresa firmy musí byť zadaná !';
   PSC   <>~'' : 'Adresa firmy musí byť zadaná !';
   miesto<>~'' : 'Adresa firmy musí byť zadaná !';
   Q_M='Q'|Q_M='M' : ' Zadajte "Q" pre kvartálny, resp. "M" pre mesačný odvod DPH !';


    BankUcty    

BA : A,4;
Cu : A,20;

#K Banky BA;

#C PenUst:=Banky.popis:A,30;
```

## Udaje

```fand
{ Udaje o podnikatelovi  @ @ }

  meno:A,10;
priezv:A,15;
 titul:A,5;
 nazov:A,40;
   ICO:A,10;
   DIC:A,10;

  ICPD:A,15;
drcDPH:A,15;
DatDPH:D,'DD.MM.YYYY';
   Q_M:A,1!;
sadzba:F,2.1;

   uli:A,20;
   cis:A,5;
   PSC:A,6;
                         JU              16.08.2026     strana: 11
Typ Nazev
Text
miesto:A,20;
   tlf:A,13;
  tlf1:A,13;
 mobil:A,13;
mobil1:A,13;
   fax:A,13;
  fax1:A,13;
 email:A,28;
hodsadzba:F,2.2;
PRGhodsadzba:F,2.2;

#K @ @

#C bydl      := trailchar(' ',uli)+' '+cis+', ' + PSC+' '+ miesto : A,50;
   Cele_meno := cond(titul<>~'' : trailchar(' ',titul) + ' ') +
                trailchar(' ',Meno) + ' ' + priezv : A,25;
   Dan_urad  := copy(drcdph,pos('/',drcdph)+1,3) : A,3;
   drc1 := medz(copy(drcdph,1,pos('/',drcdph)-1)) : A,20;
   drc2 := medz(dan_urad) : A,6;
   dic_nove := leadchar(' ',replace('SK',ICPD,'')) : A,15;
#L priezv<>~'' : 'Priezvisko musí byť zadané !';
   nazov <>~'' : 'Názov firmy musí byť zadaný !';
   uli <>~'' : 'Adresa firmy musí byť zadaná !';
   PSC   <>~'' : 'Adresa firmy musí byť zadaná !';
   miesto<>~'' : 'Adresa firmy musí byť zadaná !';
   Q_M='Q'|Q_M='M' : ' Zadajte "Q" pre kvartálny, resp. "M" pre mesačný odvod DPH !';


    BankUcty    

BA : A,4;
Cu : A,20;

#K Banky BA;

#C PenUst:=Banky.popis:A,30;
```

## Udajea

```fand
like Udaje

    Prijmy.x    
{      Prijmy    }

Kod:A,1;
  d:A,20;    {Popisny text                                               }
  v:B;       {                                                           }
  r:B;       {Celkove prijmy ?                                           }
  p:B;       {Priebezne prijmy ?                                         }
  m:B;       {tovar                                                      }
  b:B;       {tovar vrateny dodavatelovi                                 }
  z:B;       {zakazky - sluzby, vyrobky                                  }

pocet : F,5,0; { počet položiek v aktuálnom PD }

suma : F,6.2;

#K @ Kod;

{#L (t | m | z | r | p): 'Aspoň jeden údaj musí byť A !';}

#I v:=false; r:=false; p:=false; m:=false; z:=false;

    Vydaje_.x   
{      Vydaje    }

kod:A,1;
  d:A,30;   { Popisny text                                  }
 pv:B;      { vydaj - true    prijem - false                }
  r:B;      { Celkove vydavky ?                             }
  p:B;      { Priebezne vydavky ?                           }
 b7:B;      { drobný HaN majetok (DKP)                      }
 b8:B;      { Dohoda o prac. činnosti + daň                 }
b11:B;      { poistne zo zakona                             }
b12:B;      { rezia                                         }
b13:B;      { PHM pre SC                                    }
b14:B;      { HaN invest. majetok (ZP)                      }
b15:B;      { tovar - zakúpený pre ďalší predaj             }
b16:B;      { dan z prijmu                                  }
b17:B;      { osobny ucet                                   }
b20:B;      { material                                      }

pocet : F,5,0; { počet položiek v aktuálnom PD }

  x:B;       { pravidelná platba ? }

suma : F,6.2;
                         JU              16.08.2026     strana: 13
Typ Nazev
Text

#K @ Kod;

#L (b7 | b8 | b11 | b12 | b13 | b14 | b15 | b16 | b17 | b20 | r | p):
   'Aspoň jeden údaj musí byť A !';
   (^r & ^p & b14) | (^r & ^p & b16) | (^r & ^p & b13) |
   ((r) & (b7 | b8 | b11 | b12 | b14 | b15) | b17 | b20) | p :
   'Chyba v zadaní charakteristík výdaja !';

#I  b7:=false;
    b8:=false;
   b11:=false;
   b12:=false;
   b13:=false;
   b14:=false;
   b15:=false;
   b16:=false;
   b17:=false;
   b20:=false;
     r:=false;
     p:=false;
```

## Udajea

```fand
like Udaje

    Prijmy.x    
{      Prijmy    }

Kod:A,1;
  d:A,20;    {Popisny text                                               }
  v:B;       {                                                           }
  r:B;       {Celkove prijmy ?                                           }
  p:B;       {Priebezne prijmy ?                                         }
  m:B;       {tovar                                                      }
  b:B;       {tovar vrateny dodavatelovi                                 }
  z:B;       {zakazky - sluzby, vyrobky                                  }

pocet : F,5,0; { počet položiek v aktuálnom PD }

suma : F,6.2;

#K @ Kod;

{#L (t | m | z | r | p): 'Aspoň jeden údaj musí byť A !';}

#I v:=false; r:=false; p:=false; m:=false; z:=false;

    Vydaje_.x   
{      Vydaje    }

kod:A,1;
  d:A,30;   { Popisny text                                  }
 pv:B;      { vydaj - true    prijem - false                }
  r:B;      { Celkove vydavky ?                             }
  p:B;      { Priebezne vydavky ?                           }
 b7:B;      { drobný HaN majetok (DKP)                      }
 b8:B;      { Dohoda o prac. činnosti + daň                 }
b11:B;      { poistne zo zakona                             }
b12:B;      { rezia                                         }
b13:B;      { PHM pre SC                                    }
b14:B;      { HaN invest. majetok (ZP)                      }
b15:B;      { tovar - zakúpený pre ďalší predaj             }
b16:B;      { dan z prijmu                                  }
b17:B;      { osobny ucet                                   }
b20:B;      { material                                      }

pocet : F,5,0; { počet položiek v aktuálnom PD }

  x:B;       { pravidelná platba ? }

suma : F,6.2;
                         JU              16.08.2026     strana: 13
Typ Nazev
Text

#K @ Kod;

#L (b7 | b8 | b11 | b12 | b13 | b14 | b15 | b16 | b17 | b20 | r | p):
   'Aspoň jeden údaj musí byť A !';
   (^r & ^p & b14) | (^r & ^p & b16) | (^r & ^p & b13) |
   ((r) & (b7 | b8 | b11 | b12 | b14 | b15) | b17 | b20) | p :
   'Chyba v zadaní charakteristík výdaja !';

#I  b7:=false;
    b8:=false;
   b11:=false;
   b12:=false;
   b13:=false;
   b14:=false;
   b15:=false;
   b16:=false;
   b17:=false;
   b20:=false;
     r:=false;
     p:=false;
```

## Udajea

```fand
like Udaje

    Prijmy.x    
{      Prijmy    }

Kod:A,1;
  d:A,20;    {Popisny text                                               }
  v:B;       {                                                           }
  r:B;       {Celkove prijmy ?                                           }
  p:B;       {Priebezne prijmy ?                                         }
  m:B;       {tovar                                                      }
  b:B;       {tovar vrateny dodavatelovi                                 }
  z:B;       {zakazky - sluzby, vyrobky                                  }

pocet : F,5,0; { počet položiek v aktuálnom PD }

suma : F,6.2;

#K @ Kod;

{#L (t | m | z | r | p): 'Aspoň jeden údaj musí byť A !';}

#I v:=false; r:=false; p:=false; m:=false; z:=false;

    Vydaje_.x   
{      Vydaje    }

kod:A,1;
  d:A,30;   { Popisny text                                  }
 pv:B;      { vydaj - true    prijem - false                }
  r:B;      { Celkove vydavky ?                             }
  p:B;      { Priebezne vydavky ?                           }
 b7:B;      { drobný HaN majetok (DKP)                      }
 b8:B;      { Dohoda o prac. činnosti + daň                 }
b11:B;      { poistne zo zakona                             }
b12:B;      { rezia                                         }
b13:B;      { PHM pre SC                                    }
b14:B;      { HaN invest. majetok (ZP)                      }
b15:B;      { tovar - zakúpený pre ďalší predaj             }
b16:B;      { dan z prijmu                                  }
b17:B;      { osobny ucet                                   }
b20:B;      { material                                      }

pocet : F,5,0; { počet položiek v aktuálnom PD }

  x:B;       { pravidelná platba ? }

suma : F,6.2;
                         JU              16.08.2026     strana: 13
Typ Nazev
Text

#K @ Kod;

#L (b7 | b8 | b11 | b12 | b13 | b14 | b15 | b16 | b17 | b20 | r | p):
   'Aspoň jeden údaj musí byť A !';
   (^r & ^p & b14) | (^r & ^p & b16) | (^r & ^p & b13) |
   ((r) & (b7 | b8 | b11 | b12 | b14 | b15) | b17 | b20) | p :
   'Chyba v zadaní charakteristík výdaja !';

#I  b7:=false;
    b8:=false;
   b11:=false;
   b12:=false;
   b13:=false;
   b14:=false;
   b15:=false;
   b16:=false;
   b17:=false;
   b20:=false;
     r:=false;
     p:=false;
```

## Vydaje.x

```fand
{      Vydaje    }

KODVYD:A,1;
D:A,30;         { popis }
PV:B;            { vydaj - true    prijem - false                }
R:B;            { celkove }
P:B;            { priebezne }
M:B;            { predaj tovaru              }
B:B;            { tovar vrateny dodavatelovi }
Z:B;            { zakazky - sluzby, vyrobky  }
B7:B;           { drobný HaN majetok (DKP)                      }
B8:B;           { Dohoda o prac. činnosti + daň                 }
B11:B;          { poistne zo zakona                             }
B12:B;          { rezia                                         }
B13:B;          { PHM pre SC                                    }
B14:B;          { HaN invest. majetok (ZP)                      }
B15:B;          { tovar - zakúpený pre ďalší predaj             }
B16:B;          { dan z prijmu                                  }
B17:B;          { osobny ucet                                   }
B20:B;          { material                                      }
POCET:F,5.0;    { počet položiek v aktuálnom PD }
X:B;            { pravidelna platba }
SUMA:F,6.2;

#C kod := kodvyd : A,1;

#K @ Kodvyd;

#L (b7 | b8 | b11 | b12 | b13 | b14 | b15 | b16 | b17 | b20 | r | p):
   'Aspoň jeden údaj musí byť A !';
   (^r & ^p & b14) | (^r & ^p & b16) | (^r & ^p & b13) |
   ((r) & (b7 | b8 | b11 | b12 | b14 | b15) | b17 | b20) | p :
   'Chyba v zadaní charakteristík výdaja !';

#I  b7:=false;
    b8:=false;
   b11:=false;
   b12:=false;
   b13:=false;
   b14:=false;
   b15:=false;
   b16:=false;
   b17:=false;
   b20:=false;
                         JU              16.08.2026     strana: 14
Typ Nazev
Text
     r:=false;
     p:=false;
```

## Ucty.x

```fand
ba:A,4;                {Banka - kod}
pr:A,6;                {predcislie}
cu:A,12;               {Banka - číslo účtu}
zv:N,2;                {pravidelne mesacne zasielanie vypisov}
zv_od:D,'DD.MM.YYYY';  {PMZV od}
zv_do:D,'DD.MM.YYYY';  {PMZV do}
os:B;                  {A=osobny, N=podnikatelsky}
popis:A,20;

#K @ ba, cu;
   Banky ba;

#C Banka := banky.popis : A,40;
```

## Ucet.x

```fand
{      Bezny ucet    }

a:D,'DD.MM.YYYY';      {vypis zo dna}
b:A,8;                 {interne oznacenie}
c:A,13;                {Oznacenie : cislo faktury, resp. VS}
d:D,'DD.MM.YYYY';      {den realizacie platby}
ba:A,4;                {Banka - kod}
cu:A,12;               {Banka - číslo účtu}
ua:A,40;               {Ucel platby}
pa:F,6.2;              {Prijem - vydaj}
qa:B;                  {Priebezna polozka ?}
ra:B;                  {Celkova polozka ?}
ba1:A,4;               {Banka partnera - kod}
cu1:A,12;              {Banka partnera - číslo účtu}
nova:B;
vydaj : A,1;

#C U1    := cond (pos('UROK',upcase(ua))>0 | pos('ÚROK',upcase(ua))>0 : 'A', else : 'N') : A,1;
   Urok  := cond ( ^ra & ^qa & U1='A' & pa>0 : pa ) : F,3.2;
   Ine   := cond ( ^ra & ^qa & U1='N' & pa>0 : pa ) : F,4.2; {Ine spolu}
   ps    := cond ( pa>0 : pa, else : 0) : F,6.2;        {Prijem spolu}
   vs    := cond ( pa<0 : pa, else : 0) : F,6.2;        {Vydaj spolu}
   Prieb := cond ( qa : pa ) : F,6.2; {Prieb spolu}
   Spolu := cond ( ra : pa ) : F,6.2; {Celk. spolu}
   rok   := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
   cislo := val(copy(b,1,pos('/',b)-1)) : F,3,0;
   bc := copy(c,1,8) : A,8;
#K @ * a,~b;
   iBc (@) * bc;
   banky BA;
   iUcet (@) * BA, CU, a, ~b;
   iUcetb (@) * ~b;
   ucty BA, CU;
#C zv := ucty.zv : A,2;
   zv_od := ucty.zv_od:D,'DD.MM.YYYY';
                         JU              16.08.2026     strana: 16
Typ Nazev
Text
#I b := Leadchar(' ',Str(Param.uc, 3, 0));
   a := d;
  BA := PAR.BA;
  CU := PAR.CU;
nova := true;
```

## UcetImpo.x

```fand
{}
ba    : A,4;                {Banka - kod}
cu    : A,12;               {Banka - číslo účtu}
datum : D,'DD.MM.YYYY';
v_s   : A,10;

#K @ * ba, cu, datum, v_s;
```

## kurzy.x

```fand
datum      : D,'DD.MM.YYYY';
krajina    : A,15;
mnoz       : F,4,0;
kod        : A,3;
d_nakup    : F,3.3;
d_predaj   : F,3.3;
d_kurz_NBS : F,3.3;
v_nakup    : F,3.3;
v_predaj   : F,3.3;
v_kurz_NBS : F,3.3;
zaujimave  : B;

#K @ datum, kod;
   iKurz (@) * kod,datum;
```

## PV

```fand
a:D,'DD.MM.YYYY';      { zo dna                 }
b:A,8;                 { Oznacenie              }
ph:F,6.2;              { PoY. stav - pokladŤa   }
h:A,13;                { Doklad                 }
pu:F,6.2;              { PoY. stav  - ucet      }
u:A,13;                { Doklad                 }
m:F,6.2;               { majetok                }

                         JU              16.08.2026     strana: 17
Typ Nazev
Text
HaN:F,6.2;             { HaN invest. majetok    }
poh:F,6.2;             { poh-ad vky             }
zav:F,6.2;             { z v,zky                }

#K @ @
#C rok := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
   mena := par.mena : A,3;
#I b:='00-001-'+strdate(a, 'YYYY');
```

## straDoch.x

```fand
rok  : F,4,0;
strata : F,6.2;
nezdan_suma : F,6.2;
hra_min_prijmu : F,6.2;
#K @ rok;
```

## DoprPros.x

```fand
skr : A,3;
prostr : A,20;

#K @ skr;

                         JU              16.08.2026     strana: 18
Typ Nazev
Text
```

## Auto.x

```fand
Kod : A,3;
Typ : A,20;
SPZ : A,10;
ehme : F,2.1;   { EHK mesto }
eh90 : F,2.1;   { EHK 90 }
eh120: F,2.1;   { EHK 120 }
esme : F,2.1;   { ES  mesto }
esmi : F,2.1;   { ES  mimo mesta }
esko : F,2.1;   { ES  kombinovana }
STN : F,2.1;    { STN priemerná spotreba }
koef: F,1.1;    { STN koef. - spotreba v meste }
Pal : A,20;
LPG : F,2.1;
Fir : B;        { auto je zahrnuté do majetku fyz. osoby }
Pou : B;        { Aktualne sa pouziva }
motor : F,1.1;
nadrz : F,2,0;
nadrz_LPG : F,2,0;
aktual : B;

#K @ Kod;
#C STNmesto := stn * koef : F,2.1;
   LPGmesto := lpg * koef : F,2.1;
   PS := cond ( esmi<>0 : esko, eh90<>0 & eh120<>0 : (eh90+eh120)/2,
                else : stn ) : F,2.1;
   MS := cond ( esme<>0 : esme, ehme<>0 : ehme, else : STNmesto ) : F,2.1;

    ------------
```

## Auto.x

```fand
Kod : A,3;
Typ : A,20;
SPZ : A,10;
ehme : F,2.1;   { EHK mesto }
eh90 : F,2.1;   { EHK 90 }
eh120: F,2.1;   { EHK 120 }
esme : F,2.1;   { ES  mesto }
esmi : F,2.1;   { ES  mimo mesta }
esko : F,2.1;   { ES  kombinovana }
STN : F,2.1;    { STN priemerná spotreba }
koef: F,1.1;    { STN koef. - spotreba v meste }
Pal : A,20;
LPG : F,2.1;
Fir : B;        { auto je zahrnuté do majetku fyz. osoby }
Pou : B;        { Aktualne sa pouziva }
motor : F,1.1;
nadrz : F,2,0;
nadrz_LPG : F,2,0;
aktual : B;

#K @ Kod;
#C STNmesto := stn * koef : F,2.1;
   LPGmesto := lpg * koef : F,2.1;
   PS := cond ( esmi<>0 : esko, eh90<>0 & eh120<>0 : (eh90+eh120)/2,
                else : stn ) : F,2.1;
   MS := cond ( esme<>0 : esme, ehme<>0 : ehme, else : STNmesto ) : F,2.1;

    ------------
```

## SumaPD

```fand
{ Sucty suboru PD }

a:D,'DD.MM.YYYY'; {Datum                                               }
PO:F,4.0;
P1:F,6.2;  {hotovost ───┬── POCIATOC. STAV }
P2:F,6.2;  {ucet    ────┤                                              }
P3:F,6.2;  {MAJETOK ────┤                                              }
POH:F,6.2; {pohlad. ────┤                                              }
ZAV:F,6.2; {záväzky ────┘                                              }
a1:F,6.2;  { ──Pr─┬─Prijem─┬──Hotovost──┬─Penazne prostriedky }
a1_:F,6.2; { ──Ce─┤        │            │                     }
a1__:F,6.2; {─Ine─┘        │            │                     }
a2:F,6.2;  { ──Pr─┬─Vydaje─┘            │                     }
a2_:F,6.2; { ──Ce─┤                     │                     }
a2__:F,6.2; {─Ine─┘                     │                     }
a3:F,6.2;  { ──Pr─┬─Prijem─┬─Bezny ucet─┘                     }
a3_:F,6.2; { ──Ce─┤        │                                  }
a3__:F,6.2;{ ──In─┴─┐      │                                  }
a3___:F,6.2;{──Urok─┘      │                                  }
a4:F,6.2;  { ──Pr─┬─Vydaje─┘                                  }
a4_:F,6.2; { ──Ce─┤                                           }
a4__:F,6.2;{ ─Ine─┘                                           }
{
a1:F,6.2;  {Prijem  ────┬────  Hotovost  ────┬────  Penazne prostriedky}
a2:F,6.2;  {Vydaje  ────┘                    │                         }
a3:F,6.2;  {Prijem  ────┬────  Bezny ucet  ──┤                         }
a4:F,6.2;  {Vydaje  ────┘                    │                         }
}
a5:F,6.2;  {Prijmy  ────┬────  Celkom    ────┘                         }
a6:F,6.2;  {Vydaje  ────┘                                              }
a7:F,6.2;  {Náklady - DKP                ────┬────  Rozpis vydavkov    }
a8:F,6.2;  {       nevyuzite PD          ────┤                         }
a9:F,6.2;  {Mzdy zamestnancom            ────┤                         }
a10:F,6.2; {Dane z miezd zamestnancov    ────┤                         }
                         JU              16.08.2026     strana: 19
Typ Nazev
Text
a11:F,6.2; {Poistne zo zakona + DDP      ────┤                         }
a12:F,6.2; {Prevadzkova rezia    vseob   ────┤ tlf + mobil             }
a121:F,6.2; {Prevadzkova rezia   ine     ────┤                         }
a122:F,6.2; {Prevadzkova rezia   auto    ────┤                         }
a123:F,6.2; {Prevadzkova rezia   SC      ────┤                         }
a12b:F,6.2; {Prevadzkova rezia   banka   ────┤                         }
a13:F,6.2; {PHM pre SC                   ────┤                         }
a14:F,6.2; {HaNIM - obstarav. cena       ────┤                         }
a15:F,6.2; {Tovar                        ────┤                         }
a16:F,6.2; {Dan z prijmu                 ────┤                         }
a17:F,6.2; {Osobny ucet podnikatela      ────┘                         }
a20:F,6.2; {Majetok} {PD}
a22:F,6.2; {DPH    }
zZP:F,6.2;            { ZP na zac. obdobia }
odpisy:F,6.2;
ZP: F,6.2;            { ZP na kon. obdobia }
leas:F,6.2;
ucet_prijem:F,6.2;  { ───┐             }
ucet_vydaj :F,6.2;  { ───┼─── aj s DPH }
hot_prijem:F,6.2;   { ───┤             }
hot_vydaj :F,6.2;   { ───┘             }
pohlad : F,6.2;
zavazok : F,6.2;
strata : F,6.2;     { strata za predosle uctovne obdobie }
dochodok : F,6.2;   { rocny dochodok za predosle uctovne obdobie }
nezdan_suma : F,6.2;
rok_1 : A,4;
hra_min_prijmu : F,6.2;

#C rezia := a12 + a121 + a122 + a123 + a12b : F,6.2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   a21      := a9 + a10 : F,6.2; { Doh. o vykonaní prác + odvedená daň }
   a18      := a1 + a3 : F,6.2; {Prijem ─┬─ Priebezne polozky }
   a19      := a2 + a4 : F,6.2; {Vydaje ─┘ }
zdan_prijem := a1_ + a3_ : F,6.2;
DDP_od_2005 := cond(a>valdate('31.12.2004','DD.MM.YYYY') &
                    a<valdate('01.01.2009','DD.MM.YYYY') :  12000,
                    a>valdate('31.12.2100','DD.MM.YYYY') : (12000 / 30.126) round 2,
                    a>valdate('31.12.2022','DD.MM.YYYY') &
                    a<valdate('01.01.2025','DD.MM.YYYY')  : 446.13,
                    else : 0 ) : F,6.2;
{
nezdan_suma := cond(a<valdate('01.01.2000','DD.MM.YYYY') : 21000,
                    a<valdate('01.01.2004','DD.MM.YYYY') : 38760,
                    a<valdate('01.01.2005','DD.MM.YYYY') : 80832,
                    a<valdate('01.01.2006','DD.MM.YYYY') : 87936,
                    a<valdate('01.01.2007','DD.MM.YYYY') : 90816,
                    a<valdate('01.01.2008','DD.MM.YYYY') : 95616,
                    a<valdate('01.01.2009','DD.MM.YYYY') : 98496,
                    a<valdate('01.01.2011','DD.MM.YYYY') : 4025.7,
                    a<valdate('01.01.2012','DD.MM.YYYY') : 3559.3,
                    a<valdate('01.01.2013','DD.MM.YYYY') : 3644.74,
                    a<valdate('01.01.2014','DD.MM.YYYY') : 3735.94,
                    a<valdate('01.01.2018','DD.MM.YYYY') : 3803.33,
                    a<valdate('01.01.2019','DD.MM.YYYY') : 3830.02,
                    a<valdate('01.01.2020','DD.MM.YYYY') : 3937.35,
                    a<valdate('01.01.2021','DD.MM.YYYY') : 4414.20,
                    a<valdate('01.01.2022','DD.MM.YYYY') : 4511.43,
                    a<valdate('01.01.2023','DD.MM.YYYY') : 4579.26,
                    a<valdate('01.01.2024','DD.MM.YYYY') : 4922.82,
                    else : 5646.48 ) : F,6.2;
}
vyziv_dieta := 0 * cond(a<valdate('01.01.2000','DD.MM.YYYY') :  9000,
                        a<valdate('01.01.2002','DD.MM.YYYY') : 11400,
                        a<valdate('01.01.2004','DD.MM.YYYY') : 16800,
                                                        else : 16800) : F,6.2;
                         JU              16.08.2026     strana: 20
Typ Nazev
Text
odpocit_vyd := a2_ + a4_ + odpisy + leas + a123 {SC}  : F,6.2;

nezdan_zaklad := cond( dochodok >= nezdan_suma : 0,
                       else : nezdan_suma - dochodok ) : F,6.2;

   zakl_1   := zdan_prijem - odpocit_vyd - vyziv_dieta - DDP_od_2005 : F,6.2;

   zaklad   := cond(a<valdate('01.01.2004','DD.MM.YYYY') :
                   (zakl_1 div 100) * 100, else : zakl_1) : F,6.2;

   dane := cond(a<valdate('01.01.2000','DD.MM.YYYY') :
                 cond(zaklad <=  60000 :           0.15 * zaklad,
                      zaklad <= 120000 :   9000 + (0.20 * (zaklad-60000)),
                      zaklad <= 180000 :  21000 + (0.25 * (zaklad-120000)),
                      zaklad <= 540000 :  36000 + (0.32 * (zaklad-180000)),
                      zaklad <=1080000 : 151000 + (0.40 * (zaklad-540000)),
                                  else : 367200 + (0.47 * (zaklad-1080000))),
                a<valdate('01.01.2002','DD.MM.YYYY') :
                 cond(zaklad <=  90000 :           0.12 * zaklad,
                      zaklad <= 150000 :  10800 + (0.20 * (zaklad-90000)),
                      zaklad <= 240000 :  22800 + (0.25 * (zaklad-150000)),
                      zaklad <= 396000 :  45300 + (0.30 * (zaklad-240000)),
                      zaklad <= 564000 :  92100 + (0.35 * (zaklad-396000)),
                      zaklad <=1128000 : 150900 + (0.40 * (zaklad-564000)),
                                  else : 376500 + (0.42 * (zaklad-1128000))),
                a<valdate('01.01.2004','DD.MM.YYYY') :
                 cond(zaklad <=  90000 :           0.10 * zaklad,
                      zaklad <= 180000 :   9000 + (0.20 * (zaklad-90000)),
                      zaklad <= 396000 :  27000 + (0.28 * (zaklad-180000)),
                      zaklad <= 564000 :  87480 + (0.35 * (zaklad-396000)),
                                  else : 146280 + (0.38 * (zaklad-564000))),

                a<valdate('01.01.2023','DD.MM.YYYY') : 0.19 * zaklad,

                else : 0.15 * zaklad

               ) : F,6.2;

   dan_k_uhrade := cond( dane > 0 : dane + strata, else : 0 ) : F,6.2;
   P1aP2    := P1 + P2 :F,6.2;
 c2 := cond(PARAM.Nazov<>~'': Trailchar(' ',PARAM.Nazov)+', '+trailchar(' ',PARAM.Miesto),
                      else  : Trailchar(' ',PARAM.Titul)+' '+Trailchar(' ',PARAM.Meno)+' '+
                              Trailchar(' ',PARAM.Priezv)+', '+trailchar(' ',PARAM.Miesto)):A,40;
 poi_real := cond(a<valdate('01.01.2004','DD.MM.YYYY') :  zaklad * 0.25 / 12,
                  a<valdate('01.01.2005','DD.MM.YYYY') : 2017 + 483,
                  else : 2017 + 847 )  : F,6.2;
  poi_mes := cond ( poi_real > 1324 : poi_real, else : 1324 ) : F,6.2;
      poi := poi_mes * 12 : F,6.2;
   Celkom := a1_ + a3_ - a2_ - a4_ + a1 + a3 - a2 - a4 : F,6.2;
   a1a2   := a1   - a2   : F,6.2;
   a1a2_  := hot_prijem - hot_vydaj  : F,6.2;
   a1a2__ := a1__ - a2__ : F,6.2;
   a3a4   := a3   - a4   : F,6.2;
   a3a4_  := ucet_prijem - ucet_vydaj : F,6.2;
   a3a4__ := a3__ - a4__ : F,6.2;
   a1a3   := a1 + hot_prijem + a1__ + a3 + a3__ + ucet_prijem : F,6.0;
   a2a4   := a2 + hot_vydaj + a2__ + a4 + a4__ + ucet_vydaj : F,6.0;
 a1a2a3a4 := a1a3 - a2a4 : F,6.0;
   hotovost := a1 + hot_prijem + a1__ - a2 - hot_vydaj - a2__ + p1 {poc stav} : F,6.2;
   ucet     := a3 + ucet_prijem+ a3__ - a4 - ucet_vydaj  - a4__ + p2 {poc stav} : F,6.2;
```

## PD

```fand
{ Penazny dennik }

{kontr:A,1;}
a:D,'DD.MM.YYYY'; {Datum                                               }
b:A,13;    {Oznacovanie poloziek dennika - interne prepojenie so subormi PD }
zp:D,'DD.MM.YYYY';    { datum zdanitelneho plnenia }
kodOP:F,3,0;
c:A,13;    {Externe oznacenie dokladu - ak existuje ... }
d:A,56;    {Popisny text                                               }
r:B;       {Celkova polozka ?                                          }
p:B;       {Priebezna polozka ?                                        }
a1:F,6.2;  {Prijem  ────┬────  Hotovost  ────┬────  Penazne prostriedky}
a2:F,6.2;  {Vydaje  ────┘                    │                         }
a3:F,6.2;  {Prijem  ────┬────  Bezny ucet  ──┘                         }
a4:F,6.2;  {Vydaje  ────┘                                              }
Vydaj : A,1;                              {      Rozpis vydavkov       }
a7:F,6.2;  {drobny HaN majetok           ────┬────      vydaj = 5      }
a8:F,6.2;  {       nevyuzite             ────┤                         }
a9:F,6.2;  {Mzdy zamestnancom            ────┤             "  = a      }
a10:F,6.2; {Dane z miezd zamestnancov    ────┤             "  = c      }
a11:F,6.2; {Poistne zo zakona + DDP      ────┤             "  = 4      }
a12:F,6.2; {Prevadzkova rezia            ────┤             "  = 1+2+7+u}
a13:F,6.2; {PHM pre SC                   ────┤             "  = h      }
a14:F,6.2; {HaNIM - obstarav. cena       ────┤             "  = 6      }
a15:F,6.2; {Tovar                        ────┤             "  = t      }
a16:F,6.2; {Dan z prijmu, DPH            ────┤             "  = 8+d    }
a17:F,6.2; {Osobny ucet podnikatela      ────┘             "  = 3      }

po :A,30;  {Poznamka                                                   }

dph:F,2.1; { sadzba dane v % pd}
hal_p : F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}
                         JU              16.08.2026     strana: 22
Typ Nazev
Text
hal : F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}

ok : A,1;

#K @ b;
   Vydaje Vydaj;
#C Aky_Vydaj := Vydaje.d : A,30;
   X := a mod 7:F,1,0;
   AkyDen := cond(X=1:'Po', X=2:'Ut', X=3:'St', X=4:'Št', X=5:'Pi', X=6:'So', X=0:'Ne'):A,2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   a2_ := cond(r : a2) : F,6.2;
   a4_ := cond(r : a4) : F,6.2;
   typ_vyd := cond(r : 'C', p : 'P', else : 'I') : A,1;
   a21 := a2_ + a4_ - a7 - a9 - a10 - a11 - a12 - a15 : F,6.2;
   hod_vyd := a2 + a4 : F,6.2;  { kz }
   hod_pri := a1 + a3 : F,6.2;  { kz }

   DPH_Sk := cond(rok < 2009 : (hod_vyd * (dph/100)) round 1,
                        else : (hod_vyd * (dph/100)) round 2) : F,6.2;
 DPH_Sk_p := cond(rok < 2009 : (hod_pri * (dph/100)) round 1,
                        else : (hod_pri * (dph/100)) round 2) : F,6.2;

    zn_p  := hod_pri + cond(hod_pri<>0 : hal) + DPH_Sk_p : F,6.2;
    zn    := hod_vyd + cond(hod_vyd<>0 : hal) + DPH_Sk : F,6.2;
 sDPH := zn_p - zn : F,6.2;
 hot_prijem:= cond(ok='n': 0, else : a1 + ((a1 * (dph/100)) round 1) +
              cond(a1<>0 : hal)) : F,6.2;  { ───┤             }
 hot_vydaj := cond(ok='n': 0, else : a2 + ((a2 * (dph/100)) round 1) +
              cond(a2<>0 : hal)) : F,6.2;  { ───┤             }
ucet_prijem:= cond(ok='n': 0, else : a3 + ((a3 * (dph/100)) round 1) +
              cond(a3<>0 : hal)) : F,6.2;  { ───┤             }
ucet_vydaj := cond(ok='n': 0, else : a4 + ((a4 * (dph/100)) round 1) +
              cond(a4<>0 : hal)) : F,6.2;  { ───┴─── aj s DPH }
   zp_dat := cond(zp = 0 : a, else : zp) : D,'DD.MM.YYYY';
   Datum := a : D,'MM.YYYY';
   SCislo := copy(b,6,3) : A,3;
   a5:=cond(r:a1+a3):F,6.2;
   {Prijmy  ────────┬─ Celkom ─────────┬──── Penazne prostriedky}
   a6:=cond(r:a2+a4-A14):F,6.2;{       │                }
   {Vydaje  ────────┘                  │                }
   a18:=cond(p:a1+a3):F,6.2;          {└─────────────┐  }
   {Prijem  ─────────────────┬── Priebezne polozky ──┘  }
   a19:=cond(p:a2+a4):F,6.2;{│                          }
   {Vydaj   ─────────────────┘                          }
   Celkove := a5 - a6 : F,6.2;
   Priebez := a18 - a19 : F,6.2;
   a1__ := cond(^r & ^p : a1):F,6.2;
   a2__ := cond(^r & ^p : a2):F,6.2;
   a3__ := cond(^r & ^p : a3):F,6.2;
   a4__ := cond(^r & ^p : a4):F,6.2;
   Ine  := cond(^r & ^p : a1+a3-a2-a4):F,6.2;
   B1:=COPY(B,3,3):A,3;
   B2:=COPY(B,1,10):A,10;
   B1F:=val(b1):F,3.0;
   AA:=STRDATE(A,'DD.MM.YYYY'):A,10;
   AB:=STRDATE(A,'DD.MM.YY'):A,8;
   d40:=copy(d,1,40):A,40;
   c2:=Trailchar(' ',PARAM.Titul)+' '+Trailchar(' ',PARAM.Meno)+' '+
       Trailchar(' ',PARAM.Priezv)+', '+trailchar(' ',PARAM.Miesto):A,40;
{   c2:=cond(PARAM.Nazov<>~'': Trailchar(' ',PARAM.Nazov)+', '+trailchar(' ',PARAM.Miesto),
                      else  : Trailchar(' ',PARAM.Titul)+' '+Trailchar(' ',PARAM.Meno)+' '+
                              Trailchar(' ',PARAM.Priezv)+', '+trailchar(' ',PARAM.Miesto)):A,40;}

                         JU              16.08.2026     strana: 23
Typ Nazev
Text
```

## SC.x

```fand
{ Cestovne prikazy }

zaciatok:D,'DD.MM.YYYY';
zaciatoh:D,'hh:mm';
koniec:D,'DD.MM.YYYY';
konieh:D,'hh:mm';
BB:F,3.0;
B:A,8;
prostr:A,3;                     {Pouz. dopr. prostr. A, V, Au, AuV}
CES:F,4.2;
UBY:F,4.2;
KAM:A,40;
UCEL1:A,40;
UCEL2:A,40;
BenKM:F,4.2;
PocKM:F,4.2;
MENO:A,20;
BYDL:A,30;
dat:D,'DD.MM.YYYY';
KONST:F,3.2;
CeBenz:F,3.2;
CeLpg :F,3.2;
DPH:F,2.1;

BenPocetMiest : F,1,0;
PocetMiest : F,1,0;

#C cislo := str(bb,'___'):A,3;
#K @ * zaciatok, zaciatoh;
   iSCzac (@) * zaciatok;
   iSC (@) * bb;
   iSCislo (@) cislo;
   DoprPros prostr;
                         JU              16.08.2026     strana: 24
Typ Nazev
Text
   Auto prostr;

#C Fir := Auto.Fir : B;
 benMesto := 10 * BenPocetMiest : F,4.2;
 benMimo := benKm - benMesto : F,4.2;
   mesto := 10 * PocetMiest : F,4.2;
    mimo := pocKm - mesto : F,4.2;
   rok := val(strdate(zaciatok,'YYYY')) : F,4,0;
   mena := par.mena : A,3;
   sumkm := pockm + benkm : F,4.2;
   Typ := Auto.typ : A,20;
   SPZ := Auto.SPZ : A,10;
   cestSM:= cond( ces > 0 : ces, else :
            val(str( cond( koniec<valdate('01.01.2004','DD.MM.YYYY') & ^fir :
                           (benkm * ( konst + ( ceBenz * auto.PS / 100 )))+
                           (pockm * ( konst + ( ceLpg  * auto.lpg / 100 ))),
                           koniec<valdate('01.01.2004','DD.MM.YYYY') & fir :
                           (benkm * ( cebenz * auto.ps / 100 ))+
                           (pockm * ( celpg  * auto.lpg / 100 )),
                           koniec>=valdate('01.01.2004','DD.MM.YYYY') :
                           (benMesto * ( cebenz * (auto.PS*1.4) / 100 )) +
                           (benMimo * ( cebenz * auto.PS / 100 ) ) +
                           (Mesto * ( ceLpg  * (auto.lpg*1.4) / 100 )) +
                           (mimo * ( ceLpg  * auto.lpg / 100 ) )),3,2))) : F,3.2;
   spolu := cestSM + uby : F,5.2;
  {cestSM:=pockm*(konst+(cebenz*6.2/100)):F,4.2; - pre FIAT do r.1996}
   zac_D:=strdate(zaciatok,'DD.MM'):A,6;
   kon_D:=strdate(koniec,'DD.MM'):A,6;
   au := Auto.typ : A,5;
   prostr1 := cond ( Auto.typ<>~'' : 'Auto vlastné ' + trailchar(' ',Auto.typ) +' '+ Auto.SPZ,
                             else  : DoprPros.prostr) : A,40;
   D      := zaciatok mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
#I bb := Param.sc;
   prostr := PAR.kod;
```

## old_Auto.x

```fand
{ Cestovne prikazy }

   datum : D,'DD.MM.YYYY';
zaciatok : D,'hh:mm';
  koniec : D,'hh:mm';
      bb : F,3,0;
     tra : F,3,0;
mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;
  odkial : A,20;
     kam : A,20;
    ucel : A,40;
  Zac_km : F,6,0;
  Kon_km : F,6,0;
   konst : F,3.2;
cena_PHM : F,3.2;
     Kod : A,3;
    nova : B;
     dph : F,2.1; { sadzba dane v % }

   LPG : B;
 text_1 : A,40;
 text_2 : A,40;
 text_3 : A,40;

#K @ * datum, zaciatok;

                         JU              16.08.2026     strana: 25
Typ Nazev
Text
```

## Evi_Auto.x

```fand
{ Cestovne prikazy }

   datum : D,'DD.MM.YYYY';
zaciatok : D,'hh:mm';
  koniec : D,'hh:mm';
      bb : F,3,0;
     tra : F,3,0;
mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;
  odkial : A,20;
     kam : A,20;
    ucel : A,40;
  Zac_km : F,6,0;
  Kon_km : F,6,0;
   konst : F,3.2;
cena_PHM : F,3.2;
     Kod : A,3;
    nova : B;
     dph : F,2.1; { sadzba dane v % }
  PHM_zac : F,2.1;

   LPG : B;
 text_1 : A,40;
 text_2 : A,40;
 text_3 : A,40;

#K @ * datum, zaciatok;
   iEa (@) * bb;
   Auto Kod;
   Trasy tra;
   iKod (@) * kod;
   iKodBb (@) * kod,bb;
#C Fir    := Auto.Fir : B;
    cislo := str(bb,'___'):A,3;
   rok := val(strdate(zaciatok,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   PS := cond ( LPG : Auto.LPG, else : Auto.PS ) : F,2.2;
   MS := cond ( LPG : Auto.LPGmesto, else : Auto.MS ) : F,2.2;
   Typ    := Auto.typ : A,20;
   SPZ    := Auto.SPZ : A,10;
   Poc_km := Kon_km - Zac_km : F,5,0; { sc }
   PS_km  := (poc_km * ps) / 100 : F,2.1;    { mnozstvo minuteho paliva - l }
   PHM_kon := PHM_zac - PS_km : F,2.1;
    mesto := cond(val(strdate(paramcat.rok,'YYYY'))<2005 :
                  cond(poc_km > 200 : 20, poc_km > 100 : 15, else : 10),
                  else : (mesto_2_km_pocet * 2) + (mesto_5_km_pocet * 5) +
                         (mesto_10_km_pocet * 10)) : F,4.1;
     mesto_s := str(mesto,6,0) : A,6;
     mimo := poc_Km - mesto : F,4.1;
      Phm := (cena_phm / 100) * (100 - dph) : F,3.2;
   spolu  := val(str(cond( datum<valdate('01.01.2004','DD.MM.YYYY') & ^fir :
                            poc_km * ( konst + ( PHM * PS / 100 )),
                           datum<valdate('01.01.2004','DD.MM.YYYY') & fir :
                                  poc_km * ( PHM * PS / 100 ),
                           else : mesto * ( PHM * MS / 100 ) +
                                   mimo * ( PHM * PS / 100 ) ),3,2)) : F,3.2;
 mesto_sk := mesto * ( PHM * MS / 100 ) : F,3.2;
  mimo_sk :=  mimo * ( PHM * PS / 100 ) : F,3.2;
   Den    := strdate(datum,'DD.MM'):  A,5;
   D      := datum mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
   PHM_max:= 0 : F,2.2;
   litre := 0 : F,2,2;
#I bb       := Param.sc;
   datum    := par.zaciatok;
                         JU              16.08.2026     strana: 26
Typ Nazev
Text
   zaciatok := par.zaciatoh;
   koniec   := Par.konieh;
   cena_PHM := Par.cena_PHM;
   Kod      := Par.kod;
   zac_km   := Par.Zac_km;
   kon_km   := Par.Zac_km + Par.vzd;
     odkial := par.z;
        kam := par.do;
       nova := true;
        dph := param.dph


    ------------
```

## Evi_Auto.x

```fand
{ Cestovne prikazy }

   datum : D,'DD.MM.YYYY';
zaciatok : D,'hh:mm';
  koniec : D,'hh:mm';
      bb : F,3,0;
     tra : F,3,0;
mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;
  odkial : A,20;
     kam : A,20;
    ucel : A,40;
  Zac_km : F,6,0;
  Kon_km : F,6,0;
   konst : F,3.2;
cena_PHM : F,3.2;
     Kod : A,3;
    nova : B;
     dph : F,2.1; { sadzba dane v % }
  PHM_zac : F,2.1;

   LPG : B;
 text_1 : A,40;
 text_2 : A,40;
 text_3 : A,40;

#K @ * datum, zaciatok;
   iEa (@) * bb;
   Auto Kod;
   Trasy tra;
   iKod (@) * kod;
   iKodBb (@) * kod,bb;
#C Fir    := Auto.Fir : B;
    cislo := str(bb,'___'):A,3;
   rok := val(strdate(zaciatok,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   PS := cond ( LPG : Auto.LPG, else : Auto.PS ) : F,2.2;
   MS := cond ( LPG : Auto.LPGmesto, else : Auto.MS ) : F,2.2;
   Typ    := Auto.typ : A,20;
   SPZ    := Auto.SPZ : A,10;
   Poc_km := Kon_km - Zac_km : F,5,0; { sc }
   PS_km  := (poc_km * ps) / 100 : F,2.1;    { mnozstvo minuteho paliva - l }
   PHM_kon := PHM_zac - PS_km : F,2.1;
    mesto := cond(val(strdate(paramcat.rok,'YYYY'))<2005 :
                  cond(poc_km > 200 : 20, poc_km > 100 : 15, else : 10),
                  else : (mesto_2_km_pocet * 2) + (mesto_5_km_pocet * 5) +
                         (mesto_10_km_pocet * 10)) : F,4.1;
     mesto_s := str(mesto,6,0) : A,6;
     mimo := poc_Km - mesto : F,4.1;
      Phm := (cena_phm / 100) * (100 - dph) : F,3.2;
   spolu  := val(str(cond( datum<valdate('01.01.2004','DD.MM.YYYY') & ^fir :
                            poc_km * ( konst + ( PHM * PS / 100 )),
                           datum<valdate('01.01.2004','DD.MM.YYYY') & fir :
                                  poc_km * ( PHM * PS / 100 ),
                           else : mesto * ( PHM * MS / 100 ) +
                                   mimo * ( PHM * PS / 100 ) ),3,2)) : F,3.2;
 mesto_sk := mesto * ( PHM * MS / 100 ) : F,3.2;
  mimo_sk :=  mimo * ( PHM * PS / 100 ) : F,3.2;
   Den    := strdate(datum,'DD.MM'):  A,5;
   D      := datum mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
   PHM_max:= 0 : F,2.2;
   litre := 0 : F,2,2;
#I bb       := Param.sc;
   datum    := par.zaciatok;
                         JU              16.08.2026     strana: 26
Typ Nazev
Text
   zaciatok := par.zaciatoh;
   koniec   := Par.konieh;
   cena_PHM := Par.cena_PHM;
   Kod      := Par.kod;
   zac_km   := Par.Zac_km;
   kon_km   := Par.Zac_km + Par.vzd;
     odkial := par.z;
        kam := par.do;
       nova := true;
        dph := param.dph


    ------------
```

## IKzp

```fand
{           Inventarne karty ZP }
a:D,'DD.MM.YYYY';     {Zaradenie do IK}
b:A,8;                {Inventarne cislo}
C:F,4.0;
vy:A,30;              {Vyrobca / Miesto a sidlo}
n:A,40;               {Typ / Nazov}
vc:A,15;              {Vyrobne cislo}
rv:D,'YYYY';          {Rok vyroby    dikzp }
hb:D,'DD.MM.YYYY';    {    datum                       }
h:F,6.2;              { obstarav. cena s DPH           }
p:A,13;               { Doklad}
u:F,6.2;              {   vyska odpisu do zac. aktual. obdobia  }
hz:F,6.2;             {hodnota ZP na zaciatku aktual. zuctovacieho obdobia}
r:A,13;               {Doklad}
d:A,50;               {Dodavatel / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {Vyradenie z IK}
sv:A,35;              {Sposob vyradenia}
SO:A,'$';             {Spôsob odpisu}
RO:F,2.0;             {Rok odpisovania}
OS:N,1;               {Odpisová skupina}
OKZVC:F,6.2;          {O koľko je zvýšená vstupná cena} {Vyska odpisu v % - rok 91,92}

dph : F,2.1;            { sadzba dane v % }
dph_dat:D,'DD.MM.YYYY'; {datum odpoctu DPH}

  h_n : B;              { A-hmotny / N-nehmotny }

oprava : F,6.2;       {zvysenie/znizenie o chybu v predoslych obdobiach}

fdo:A,10;  { faktura od dodavatela  - oznac. dodavatela}
fd:A,8;    { faktura od dodavatela  - interne oznac. JU}

#C obstar_Bez_DPH := ((h * 100) / (100 + dph)) round 1 : F,6.2;
   DPH_Sk := cond ( h>0 : h - obstar_Bez_DPH, else : 0) : F,6.2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := par.mena : A,3;
   o  := cond(ro>0 : hz + oprava, else : 0) : F,6.2;
   o_s:= hz + oprava : F,6.2;
   oo := cond(h>0 : cond(paramcat.rok<2002 : hz, else : obstar_Bez_DPH ) +
                         oprava, else : hz) : F,6.2;
 {  zvc:= o + okzvc : F,6.2;}
   voO:= cond( SO='R' & pos('AUTOMOBIL',upcase(n))>0 & paramcat.rok>2003 &
               OS='0' : oo / 2,
                         JU              16.08.2026     strana: 28
Typ Nazev
Text
               SO='R' & pos('AUTOMOBIL',upcase(n))>0 & paramcat.rok>2003 :
                       oo / 4,
               SO='R' & RO=1:
                 cond( OS='1': 0.01 * 14.2 * oo, OS='2': 0.01 *  6.2 * oo,
                       OS='3': 0.01 *  3.4 * oo, OS='4': 0.01 *  1.4 * oo,
                       OS='5': 0.01 *  1.0 * oo),
               SO='R' & RO>1:
                 cond( OS='1': 0.01 * 28.6 * oo, OS='2': 0.01 * 13.4 * oo,
                       OS='3': 0.01 *  6.9 * oo, OS='4': 0.01 *  3.4 * oo),
               SO='Z' & RO=1:
                 cond( OS='1': oo /  4, OS='2': oo /  8, OS='3': o / 15,
                       OS='4': oo / 30, OS='5': oo / 50),
               SO='Z' & RO>1:
                 cond( OS='1': 2 * hz / ( 5 - ( RO - 1 )), OS='2': 2 * hz / ( 9 - ( RO - 1 )),
                       OS='3': 2 * hz / (16 - ( RO - 1 )), OS='4': 2 * hz / (31 - ( RO - 1 )),
                       OS='5': 2 * hz / (51 - ( RO - 1 )))
              ) : F,6.2;
 { Vyska odpisov za danove obdobie }
   VO := {cond ( paramcat.rok=1991 : o * (od * kk) / 100, else :}
         cond(os = '0' : val(sv),
              voO >= o : o, else : INT(VOO) + COND( FRAC(VOO)>0 : 1 )){)} : F,6.2;
              VOoO:=  oo : F,6.2;
   z  := cond(ro>0 : o - vo, else : hz) : F,6.2;
   zo := oo - vooo : F,6.2;
 {   z  := cond(paramcat.rok<2002 : o, else : hz) - vo : F,6.2;     { Zostatkova cena }}
   doklad := strdate(a,'DDMMYY')+'-'+copy(b,1,3) : A,10;
#K @ a,~b;
#L SO='R' | SO='Z' :
   'Spôsob odpisovania : R - rovnomerné, Z - zrychlené.';
{  RO>0 : 'Rok uzívania je 1 a viac.'; }
   OS='0'|OS='1'|OS='2'|OS='3'|OS='4'|OS='5': 'Odpisová skupina je 0 az 5.';
#I hb:=PARAM.Dat1;
   p:=cond(PARAM.a2>0 : PARAM.doklad+'-01-'+
        cond(PARAM.pocet<10 :'00'+str(PARAM.pocet,1,0),
             PARAM.pocet<100:'0'+str(PARAM.pocet,2,0),
              else:str(PARAM.pocet,3,0)));
   r:=cond(PARAM.a2>0 : 'U-01-'+
           cond(PARAM.pocet<10 :'00'+str(PARAM.pocet,1,0),
                PARAM.pocet<100:'0'+str(PARAM.pocet,2,0),
                else:str(PARAM.pocet,3,0)));
```

## IKdkp

```fand
{           Inventarne karty DKP }
a:D,'DD.MM.YYYY';     {Zaradenie do IK}
b:A,8;                {Inventarne cislo}
C:F,4.0;
n:A,40;               {Typ / Nazov}
mn:F,4.0;             {Mnozstvo}
jc:F,6.2;             {Jednotkova cena}
hb:D,'DD.MM.YYYY';    { datum  - hotovosť     }
{hc:D,'DD.MM.YYYY';      datum  - účet         }
h:F,6.2;              { vyplatene v hotovosti }
p:A,13;               {Oznacenie dokladu}
u:F,6.2;              { vyplatene cez ucet    }
r:A,13;               {Oznacenie dokladu}
d:A,30;               {Dodavatel / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {Vyradenie z IK}
sv:A,35;              {Sposob vyradenia}
                         JU              16.08.2026     strana: 30
Typ Nazev
Text
FDO:A,10;
FD:A,8;
FV:A,8;
DPH:F,2.1;

#C jc_mn := mn * jc:F,6.2;    {Obstaravacia cena s DPH}
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := par.mena : A,3;
   bb := strdate(a,'YYYY') : A,4;
   doklad := strdate(a,'DDMMYY')+'-'+copy(b,1,3) : A,10;
   Bez_DPH := ((jc * 100) / (100 + dph)) round 1 : F,6.2;
   Bez_DPH_mn := Bez_DPH * mn : F,6.2;
   DPH_Sk := jc - Bez_DPH : F,6.2;
   DPH_Sk_mn := DPH_Sk * mn : F,6.2;
#K @ a,~b;
#L mn>0 : 'Množstvo je 1 alebo viac';
#I mn:=1;
   h:=PARAM.a2;
   u:=PARAM.a4;
  hb:=PARAM.Dat1;
{ hc:=PARAM.Dat2;}
   p:=cond(PARAM.a2>0 : PARAM.doklad+'-01-'+
                        cond(PARAM.pocet<10 :'00'+str(PARAM.pocet,1,0),
                             PARAM.pocet<100:'0'+str(PARAM.pocet,2,0),
                                        else:str(PARAM.pocet,3,0)));
   r:=cond(PARAM.a2>0 : 'U-01-'+
                        cond(PARAM.pocet<10 :'00'+str(PARAM.pocet,1,0),
                             PARAM.pocet<100:'0'+str(PARAM.pocet,2,0),
                                        else:str(PARAM.pocet,3,0)));
```

## Leasing

```fand
{ leasing }

a:D,'DD.MM.YYYY';     {Zaradenie do FL}
b:A,8;                {Inventarne cislo}
vy:A,30;              {Vyrobca / Miesto a sidlo}
n:A,40;               {Typ / Nazov}
vc:A,15;              {Vyrobne cislo}
rv:D,'YYYY';          {Rok vyroby}
hz:F,6.2;             {Nadobúdacia cena dodávateîa}
leas:F,6.2;           {Leasingová cena LS}
lea0:F,6.2;           {0-tá splátka}
pois:F,6.2;
mes:F,2,0;            {doba trvania LZ v mesiacoch}
d:A,30;               {Dodavatel / Miesto a sidlo             50}
ls:A,30;              {LS / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {Vyradenie z IK}
sv:A,35;              {Sposob vyradenia}
RO:F,2.0;             {Rok splácania}

#C mes1 := (leas - lea0) / mes : F,6.2;
   nakl := lea0 / mes : F,6.2;
   vo   := cond ( ro = 1 : 7 * nakl,
                  ro = 2 | ro = 3 : 12 * nakl,
                  ro = 4 : 5 * nakl ) : F,6.2;              {Vyska odpisov za danove obdobie}
   koef := (leas - pois) / hz : F,6.2;
   naz  := copy ( n, 1, 20) : A,20;
   ls_  := copy ( ls, 1, 20) : A,20;
                         JU              16.08.2026     strana: 32
Typ Nazev
Text
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
#K @ a,~b;
```

## Zamestna.x

```fand
zamest:A,25;
    RC:A,'999999-9999';
doklad:A,10;

   uli:A,20;
   PSC:A,6;
miesto:A,20;

staly_zam:B;

#K @ zamest
```

## Dohoda

```fand
{_ Evidencia prac vykonanych na dohoda _}

a:D,'DD.MM.YYYY';     {Zaradenie do ME}
b:A,8;                {Interne oznacenie ME - v PD ako polozka c}
zamest:A,25; {nesmie sa dat editovat !!!!}
n:A,40;               {Text}
v:F,6.2;              {v??ka odmeny}
                         JU              16.08.2026     strana: 33
Typ Nazev
Text

#C dan := v / 9 :F,6.2;

#K @ a,~b;

#L dan + v <= 4000 : 'Odmena + da? je maximßlne 4000 Sk (3600 + 400) !';

#I b:=Trailchar(' ',(Leadchar(' ',(Str(Param.ME, 3, 0)))))+
      '-'+strdate(a, 'YYYY');
```

## EZ.x

```fand
{ Evidencia zakaziek }

a:D,'DD.MM.YYYY';     {Datum prijatia zakazky}
b:A,8;                {Interne oznacenie zakazky}
KODOP:F,3.0;
zc:A,10;              {Zakazkove cislo}
od:A,50;              {zakaznik}
dz:A,10;              {Druh zakazky}
n:A,40;               {Nazov}
bk:D,'DD.MM.YYYY';    {Datum ukoncenia zakazky - den fakturacie}
ob:A,13;              {Doklad o fakturacii}
                      {Material dodany zakaznikovi}
ad:A,20;              {  │  ├── druh}
am:F,4.0;             {  │  └── mnozstvo}
bd:A,20;              {   ───── druh}
bm:F,4.2;             { hodinova sadzba }
                      {Material spotrebovany na zakazke}
cd:A,20;              {     ├── druh}
cm:F,4.0;             {     ├── mnozstvo}
ch:F,6.2;             {     └── hodnota}
                         JU              16.08.2026     strana: 34
Typ Nazev
Text
                      {Vynalozene priame naklady}
                      {Podiel rezijnej prirazky}
Hodiny : F,3.1;       {Dalsie udaje pre dolozenie ceny}
PRACE:F,2.0;
PRIJEM:A,1;

#C ob8 := copy(ob,1,8) : A,8;
#K @ a,~b;
   iNazMie_ od;  {udajo}
   iKodOP kodOP;
   kalendar a;
   Vydaje Prijem;
   iEZ_ob (@) * ob8;

#C Aky_Prijem := Vydaje.d : A,30;
   miesto:=cond(iKodOP.miesto<>~'' : iKodOP.miesto, else : iNazMie_.miesto):A,20;
   suma := hodiny * bm : F,6.2;
   prg := udaje.PRGhodsadzba : F,2.2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   faktura := cond(ob<>~'' | a<valdate('01.01.'+strdate(today,'YYYY'),'DD.MM.YYYY') : '?', else : '') : A,1;
#I od := PARAM.nazmie;
   a  := today;
   prijem := 'S';
   kodOP := param.zak;
```

## evizak.dbf

```fand
BK:D,'DD.MM.YYYY';
BM:F,4.2;
A:D,'DD.MM.YYYY';
B:A,8;
OD:A,41;
OB:A,11;
HODINY:F,2.0;
PRACE:F,2.0;
SPOLU:A,7;
KODOP:A,4;
KODPRI:A,1;
```

## Den_Prac.x

```fand
a : D,'DD.MM.YYYY';  { EZ     Datum prijatia zakazky    }
     b : A,8;                    { Interne oznacenie zakazky }
DATUM  : D,'DD.MM.YYYY';
Zaciat : D,'hh:mm';
Koniec : D,'hh:mm';
u_zakaz : B;              { práce vykonané u zákazníka ?    A => SC }
TEXT_1 : A,60;
TEXT_2 : A,60;
TEXT_3 : A,60;
    bb : F,3,0;
program : B;
TEXT : A,255;

#K @ * a,b;
   EZ a,b;
{  iDPsc (@) * bb; }
#C nazmie := EZ.od : A,40;
   miesto := EZ.miesto : A,20;
   text_41 := copy (text_1,1,41) : A,41;
#K kalendar datum;
#C Trvanie := (val(strdate(Koniec,'mm'))/60) -
              (val(strdate(Zaciat,'mm'))/60) : F,2.1;
   Den    := strdate(datum,'DD.MM'):  A,5;
   D      := datum mod 7:F,1,0;
                         JU              16.08.2026     strana: 35
Typ Nazev
Text
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
#A EZ.hodiny ! += cond (ez.exist : trvanie, else : 0);
{  KP.uhrady ! += cond (kp.exist & ((pc>0 & ^prirad_kz) | prirad_kp) : 1, else : 0);}
#I datum := PARAM.dat2;
   a := PARAM.dat1;
   b := PARAM.meno;
   text_1 := cond(b <> '004/2008' : 'Servisné práce',
             else : 'konverzia skladoveho programu pod Windows');
```

## Sklad.x

```fand
{           Sklad                }
a:D,'DD.MM.YYYY';     {Zaradenie do IK - prijem}
b:A,8;                { KZ.b }
{n:A,40;              {Typ / Nazov}}
popis1:A,40;
popis2:A,40;
mnozstvo:F,4.0;
na_vydaj:F,4.0;
nakupcena:F,6.2;      {Jednotkova cena s DPH}
d:A,50;               {Dodavatel / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {zaruka_do}
sv:A,35;              {Sposob vyradenia}

fdo:A,10;  { faktura od dodavatela  - oznac. dodavatela }
fd:A,8;    { faktura od dodavatela  - interne oznac. JU }
fv:A,8;    { faktura pre odberatela - interne oznac. JU }

dph:F,2.1; { sadzba dane v % }
vyrcislo:A,25;
merjedn:A,3;
intkodtov:F,10,0;
  mes : F,2,0;      { zaruka }

#C DPH_Sk := (nakupcena * (dph/100)) round 1 : F,6.2;
    s_DPH := nakupcena + DPH_Sk : F,6.2;
    DPH_s := str(dph,2,0) : A,2;
    spolu := nakupcena * mnozstvo : F,6.2;
 zaruka_do := addmonth(a, mes) : D,'DD.MM.YYYY';

#K @ a,b,intkodtov;
   iKodTov (@) * intkodtov;
```

## skla2008.x

```fand
{           Sklad                }
a:D,'DD.MM.YYYY';     {Zaradenie do IK - prijem}
b:A,8;                { KZ.b }
{n:A,40;              {Typ / Nazov}}
popis1:A,40;
popis2:A,40;
mnozstvo:F,4.0;
na_vydaj:F,4.0;
nakupcena:F,6.2;      {Jednotkova cena s DPH}
d:A,50;               {Dodavatel / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {Vyradenie z IK - vydaj}
sv:A,35;              {Sposob vyradenia}

fdo:A,10;  { faktura od dodavatela  - oznac. dodavatela }
                         JU              16.08.2026     strana: 37
Typ Nazev
Text
fd:A,8;    { faktura od dodavatela  - interne oznac. JU }
fv:A,8;    { faktura pre odberatela - interne oznac. JU }

dph:F,2.1; { sadzba dane v % }
vyrcislo:A,25;
merjedn:A,3;
intkodtov:F,10,0;
  mes : F,2,0;      { zaruka }

#C DPH_Sk := (nakupcena * (dph/100)) round 1 : F,6.2;
    s_DPH := nakupcena + DPH_Sk : F,6.2;
    DPH_s := str(dph,2,0) : A,2;
    spolu := nakupcena * mnozstvo : F,6.2;
 zaruka_do := addmonth(a, mes) : D,'DD.MM.YYYY';
#K @ a,b,intkodtov;
   iKodTov2008 (@) * intkodtov;
```

## sesit.dbf

```fand
INTKODTOV:F,10,0;
A:D,'DD.MM.YYYY';
B:A,8;
POPIS1:A,38;
VYDaj:A,1;
MNOZSTVO:F,3.0;
MERJEDN:A,3;
nakupcena:F,6.2;
DPH:F,2.0;
VYRCISLO:A,19;

    mSesit      

#I1_sesit
#O1_sesit i := replace('¬',i,'');
          cena := val(i);
          kodvyd := 't';
          merjedn := cond(merjedn=~'' : 'ks', else : merjedn);
          bb := copy(b,6,3)+'/'+copy(b,1,4)

    p_sesit     

var x, y : real; s : record of sesit; t : record of sklad;
begin
{  copyfile(sesit, 'a3.txt'/var, nocancel); copyfile('a3.txt', 'a4.txt', mode='WL', nocancel); copyfile('a4.txt'/var, sesit, nocancel);}

{ gotoxy(5,5); write(ord(copy(sesit[1].i,2,1))); delay(3000);}

  forall x in s % do begin


  end;
end;
```

## sesit.dbf

```fand
INTKODTOV:F,10,0;
A:D,'DD.MM.YYYY';
B:A,8;
POPIS1:A,38;
VYDaj:A,1;
MNOZSTVO:F,3.0;
MERJEDN:A,3;
nakupcena:F,6.2;
DPH:F,2.0;
VYRCISLO:A,19;

    mSesit      

#I1_sesit
#O1_sesit i := replace('¬',i,'');
          cena := val(i);
          kodvyd := 't';
          merjedn := cond(merjedn=~'' : 'ks', else : merjedn);
          bb := copy(b,6,3)+'/'+copy(b,1,4)

    p_sesit     

var x, y : real; s : record of sesit; t : record of sklad;
begin
{  copyfile(sesit, 'a3.txt'/var, nocancel); copyfile('a3.txt', 'a4.txt', mode='WL', nocancel); copyfile('a4.txt'/var, sesit, nocancel);}

{ gotoxy(5,5); write(ord(copy(sesit[1].i,2,1))); delay(3000);}

  forall x in s % do begin


  end;
end;
```

## sesit.dbf

```fand
INTKODTOV:F,10,0;
A:D,'DD.MM.YYYY';
B:A,8;
POPIS1:A,38;
VYDaj:A,1;
MNOZSTVO:F,3.0;
MERJEDN:A,3;
nakupcena:F,6.2;
DPH:F,2.0;
VYRCISLO:A,19;

    mSesit      

#I1_sesit
#O1_sesit i := replace('¬',i,'');
          cena := val(i);
          kodvyd := 't';
          merjedn := cond(merjedn=~'' : 'ks', else : merjedn);
          bb := copy(b,6,3)+'/'+copy(b,1,4)

    p_sesit     

var x, y : real; s : record of sesit; t : record of sklad;
begin
{  copyfile(sesit, 'a3.txt'/var, nocancel); copyfile('a3.txt', 'a4.txt', mode='WL', nocancel); copyfile('a4.txt'/var, sesit, nocancel);}

{ gotoxy(5,5); write(ord(copy(sesit[1].i,2,1))); delay(3000);}

  forall x in s % do begin


  end;
end;
```

## KZ.x

```fand
{ Evidencia zavazkov }

a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
kodOP:F,3,0;
od:A,50;              {Dodavatel}
n:A,40;               {Text}
x:F,6.2;              {záväzok bez dane v % 0 }
y:F,6.2;              {záväzok bez dane v % do 15 }
z:F,6.2;              {záväzok bez dane v % nad 15 }
pc:F,6.2;             { uhradene }
  splat : D,'DD.MM.YYYY'; {splatná do}
  stala : A,1;
    mes : F,2,0;
 uhr_do : F,2,0;
od_ucet : A,20;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;
spc_mes : F,2,0;
dph:F,2.1;  { sadzba dane v % nad 15 }
dph_1:F,2.1; { sadzba dane v % do 15 }
Vydaj : A,1;
                         JU              16.08.2026     strana: 39
Typ Nazev
Text
Zp : D,'DD.MM.YYYY'; { Zdanitelne obdobie }
U_H : A,1;  { ucet=U, hotovost=H, mix=X }

uhrady : F,1,0;

zamok : A,1;

vyrovn : F,1.2;
    bb : F,3,0;
   hod : D,'hh:mm';

par_69 : B;

{  iDPsc (@) * bb; }

#C vs1:= leadchar('0',leadchar(' ',var_sym)) : A,10;
   par69 := cond(par_69 : 'A', else : ' ') : A,1;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   mena2 := cond(rok < 2009 : 'Eur', else : 'Sk ') : A,3;
   bbs:= cond(bb=0 : '', else : str(bb,'000')) : A,3;
   vs := leadchar(' ',var_sym) : A,10;
   ks := leadchar('0',leadchar(' ',kon_sym)) : A,10;
 od_n := copy(od,1,20)+' '+copy(n,1,19) : A,40;
denmes:= strdate(a,'DD.MM') : A,5;
  n_1 := copy(n,1,15) : A,15;
{ n_1 := copy(n,1,pos(' ',n)-1) : A,20; }
 c := leadchar(' ',str(val(copy(b,1,pos('/',b)-1)+
                 cond(a<valdate('01.01.2000','DD.MM.YYYY') :
                           copy(b,pos('/',b)+3,2),
                      else:copy(b,pos('/',b)+1,4))),6,0)) :A,13;
pd_d := cond(pos(',',od)=0 | pos(',',od)>20 : copy(od,1,20),
                      else : copy(od,1,pos(',',od)-1))+' Fa '+b:A,40;
#K @ a,~b;
   iKz_abs (@) a,~b, stala;
   iKz_s (@) * stala;
   iKz_b (@) * b;
   iKz_bsr (@) ~b, stala, rok;
   iKz_Vs (@) * vs;
   iKz_Vs1 (@) * vs1;
   iKz_Vss (@) * vs, splat;
   Vydaje Vydaj;
   iKodOP kodOP;
#C Aky_Vydaj := Vydaje.d : A,30;
   uhrady_s := str(uhrady,'_') : A,1;
   ucet := iKodOP.cu : A,20;
   miesto := iKodOP.miesto:A,20;
   ICPD := replace(' ',iKodOP.ICPD,'') : A,15;
{   udajo}
   HaNIM  := Vydaje.b14 : B;
   r := Vydaje.r : B;       {Celkove vydavky ?                                          }
   p := Vydaje.p : B;       {Priebezne vydavky ?                                        }
   uhrada := pc : F,6.2;
  DPH_Sk1 := cond(rok < 2009 : (y * (dph_1/100)) round 1,
                        else : (y * (dph_1/100)) round 2) : F,6.2;
   DPH_Sk := cond(rok < 2009 : (z * (dph/100)) round 1,
                        else : cond( par_69 : 0,
                                       else : (z * (dph/100)) round 2)) : F,6.2;
  DPH_Sum := DPH_sk + DPH_Sk1 : F,6.2;
bez_DPH_Sum := x + y + z : F,6.2;
    zn_x  := x : F,6.2;
    zn_y  := y + DPH_Sk1 : F,6.2;
    zn_z  := z + DPH_Sk : F,6.2;
    zn    := zn_x + zn_y + zn_z + vyrovn : F,6.2;
    Uhr   := cond (uhrada=0 & zn<>0 : '', zn = uhrada | zn - uhrada < 0.1 : '■', zn > uhrada : '<', else : '>') : A,1;
  zavazok := cond( zn - uhrada < 0.1 : 0, else : zn - uhrada ) : F,6.2;
  zn_EUR := cond(rok < 2009 : zn / 30.126, else : zn * 30.126) : F,6.2;
                         JU              16.08.2026     strana: 40
Typ Nazev
Text
   cislo  := val(copy(b,1,pos('/',b)-1)) : F,3,0;
   a_s    := strdate(a,'DD.MM.YYYY') : A,10;
  zn_s    := replace(' ',str(zn,'___.___,__'),'-') : A,11;
  Var_ICO := udaje.DIC : A,10;
  aa      := ' ' : A,1;
   Den    := strdate(splat,'DD.MM'):  A,5;
   Da     := a mod 7:F,1,0;
   AkyDenA:= cond(Da=1:'Po', Da=2:'Ut', Da=3:'St', Da=4:'Št', Da=5:'Pi', Da=6:'So', Da=0:'Ne'):A,2;
   D      := splat mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
#K iKz_VssZn (@) * vs, splat, zn;
#L uhr_do > 0 & uhr_do < 31 : ' Zadanie dátumu úhrady je medzi 1 ao 31 !';
#I od     := PARAM.nazmie;
   od_ucet:= PARAM.miesto;
   stala  := PARAM.doklad;
{   vydaj  := 't';}
   mes    := 12;
   a      := today;
   zp     := a;
   b      := PARAM.c;
   dph_1  := sadzbDPH.dph_dol;
   dph    := sadzbDPH.dph_hor;
  var_sym := PARAM.var_sym;
  kon_sym := PARAM.kon_sym;
  spc_sym := PARAM.spc_sym;
        x := PARAM.a1;
        y := PARAM.a2;
        z := PARAM.a3;
    KodOP := param.zak;
    splat := a + 7;
```

## KZpol.x

```fand
A:D,'DD.MM.YYYY';
B:A,8;
INTKODTOV:F,10.0;
POPIS1:A,40;
POPIS2:A,40;
KODVYD:A,1;
MNOZSTVO:F,6.2;
MERJEDN:A,3;
NAKUPCENA:F,6.2;
DPH:F,2.1;
VYRCISLO:A,25;
Vydaj : A,1;
  mes : F,2,0;      { zaruka }

#K @ a,b, intkodtov;
   sklad a,b, intkodtov;
   KZ a,b;
   iKZpol (@) * a,b;
   iKtKZ (@)  intkodtov;

#C DPH_Sk := (nakupcena * (dph/100)) round 1 : F,6.2;
    s_DPH := nakupcena + DPH_Sk : F,6.2;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
    DPH_s := str(dph,2,0) : A,2;
    spolu := nakupcena * mnozstvo : F,6.2;
  spolu_s_DPH := s_DPH * mnozstvo : F,6.2;
      fdo := KZ.var_sym : A,10;
       fd := b : A,8;
        d := KZ.od : A,50;
    KODOP := kz.KODOP:F,3.0;
    dod   := kz.od:A,50;              {dodavatel}

                         JU              16.08.2026     strana: 41
Typ Nazev
Text
#A sklad.mnozstvo !! += mnozstvo;
   sklad.mes !! := mes;

#I merjedn := 'ks';
    mes    := 24;
```

## KP.x

```fand
{ Evidencia pohladavok }

a:D,'DD.MM.YYYY';     {Zaradenie do KP}
b:A,8;                {Interne oznacenie P}
KODOP:F,3.0;
od:A,50;              {Odberatel}
n:A,40;               {Text}
z :F,6.2;             {pohladavka bez dane}
pc:F,6.2;             { uhradene  }
dph : F,2.1;
ds:D,'DD.MM.YYYY';
zp:D,'DD.MM.YYYY';    {zdanitelne plnenie}
{rc:F,6.2;}

KODPRI:A,1;
U_H:A,1;
TOVAR:F,6.2;
SPOSOB_UHR:A,25;
OBJEDNAVKA:A,25;
zamok : A,1;
PRIJEM:A,1;

uhrady : F,1,0;

vyrovn : F,1.2;
    bb : F,3,0;
   hod : D,'hh:mm';

ArcIntCis : A,1;
zaloha : F,6.2;

{dkp}

#K @ a,~b;
   Vydaje KodPri;
   iKodOP kodOP;
   iKp_b (@) * b;

#C uhrada := pc {+ rc}: F,6.2;
   uhrady_s := str(uhrady,'_') : A,1;
   ucet := iKodOP.cu : A,20;
   miesto := iKodOP.miesto:A,20;
   bbs:= cond(bb=0 : '', else : str(bb,'000')) : A,3;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   mena2 := cond(rok < 2009 : 'Eur', else : 'Sk ') : A,3;
   Aky_prijem := vydaje.d : A,30;
   cislo  := val(copy(b,1,pos('/',b)-1)) : F,3,0;
     pd_d := 'Fa '+ b + ' ' +
             cond(pos(',',od)=0 | pos(',',od)>20 : copy(od,1,26),
                  else : copy(od,1,pos(',',od)-1)) : A,46;
   Den    := strdate(a,'DD.MM'):  A,5;
   D      := a mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
   Den1   := strdate(ds,'DD.MM'):  A,5;
   E      := ds mod 7:F,1,0;
   AkyDen1:= cond(e=1:'Po', e=2:'Ut', e=3:'St', e=4:'Št', e=5:'Pi', e=6:'So', e=0:'Ne'):A,2;
   DPH_Sk := cond(rok < 2009 : (z * (dph/100)) round 1,
                        else : (z * (dph/100)) round 2) : F,6.2;
                         JU              16.08.2026     strana: 42
Typ Nazev
Text
    zn    := z + DPH_Sk + vyrovn : F,6.2;
   Uhr    := cond ( today - a > 3 * 365 | (zn = uhrada & z<>0) |
                  (zn = uhrada & zn=0 & zamok='a') |
                  (zn= 0 & today - a > 30) : '■',
                    uhrada=0 : '', zn > uhrada : '<', else : '>') : A,1;
  zavazok := zn - uhrada : F,6.2;
   pohlad := zn - uhrada : F,6.2;
    zn_EUR := cond(rok < 2009 : zn / 30.126, else : zn * 30.126) : F,6.2;
   sluzby := z - tovar : F,6.2;
   kod := cond(sluzby=0 : 'T', tovar = 0 : 'S', else : 'Q') : A,1;

#I od := PARAM.nazmie;
    a := today;
   zp := a;
   dph := udaje.sadzba;
   tovar := z;
   KodOP := param.zak;
   ds := a + 5;
```

## KPpol.x

```fand
{_ kp polozky pohladavok - tovary a sluzby _}

a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
c:D,'DD.MM.YYYY';     {Zaradenie do KP}
d:A,8;                {Interne oznacenie P}
popis1:A,40;
popis2:A,40;
Prijem : A,1;
mnozstvo:F,6.2;     { skutocne }
mnozstvo_z:F,6.2;   { do zakaznickej fa. }
merjedn:A,3;
nakupcena:F,6.2;    { bez DPH }
op :F,2.6;          { obch. prir.}
op_z :F,2.6;        { obch. prir. do zakaznickej fa. }
dph:F,2.1;
vyrcislo:A,25;
pomintkodtov:F,10,0;
intkodtov:F,10,0;
prace:T;

#K @ c,~d, intkodtov;
   Kp c,d;
   Kz a,b;
   Sklad a,b,intkodtov;
   Vydaje prijem;
   iKtKP (@) * intkodtov;
   iKZpolABI (@) * a, b, intkodtov;
   iPomKtKP (@) * pomintkodtov;
   iKPcd (@) * c, d;
#C dph_s := str(dph,2,0) : A,2;
   KODOP1 := kp.KODOP:F,3.0;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   OD    := kp.od:A,50;              {Odberatel}
   n     := kp.n:A,40;               {Text}
   KODOP := kp.KODOP:F,3.0;
   dod   := kp.od:A,50;              {dodavatel}
   nakupcena_s := str(nakupcena,5,0) : A,5;
   nakupcena_mn := nakupcena * mnozstvo : F,6.2;
   op_s  := str(op,4,0) : A,4;
   Bez_DPH := nakupcena + ((nakupcena * op) / 100) : F,6.2;   { predaj bez DPH }
{  Bez_DPH := nakupcena * (1 + (op / 100)) : F,6.2;  __   { predaj bez DPH }}
   bez_DPH_s := str(bez_dph,5,0) : A,5;
   Bez_DPH_mn := Bez_DPH * mnozstvo : F,6.2;    { predaj bez DPH spolu }
   bez_DPH_mn_s := str(bez_dph_mn,7,0) : A,7;
                         JU              16.08.2026     strana: 43
Typ Nazev
Text
   S_DPH := int(10*(bez_DPH * (1 + (dph / 100))))/10 : F,6.2;   { predaj s DPH }
   S_DPH_s := str(S_dph,5,0) : A,5;
   S_DPH_mn := S_DPH * mnozstvo : F,6.2;        { predaj s DPH spolu }
   S_DPH_mn_s := str(s_dph_mn,7,0) : A,7;
   DPH_Sk := S_DPH - Bez_DPH : F,6.2;
   DPH_Sk_s := str(dph_sk,5,0) : A,5;
   Aky_Prijem := Vydaje.d : A,30;
#A sklad.Mnozstvo (Mnozstvo>=0:'Množstvo na sklade nemôže byť menšie ako 0 !!') !! += cond(prijem='T' : -Mnozstvo);
#I dph := udaje.sadzba;
   intkodtov:=param.intkodtov;
```

## REKL.x

```fand
{ Evidencia reklamacii }

e:D,'DD.MM.YYYY';     {Zaradenie do REKL}
f:A,8;                {Interne oznacenie REKL}
kodOP:F,3,0;
dod:A,50;             {Dodavatel}
kodOP1:F,3,0;
odb:A,50;             {odberatel}
    bb : F,3,0;
   hod : D,'hh:mm';
g:D,'DD.MM.YYYY';   { vybavenie reklamacie }
    bb1 : F,3,0;
   hod1 : D,'hh:mm';

#C rok := val(strdate(e,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
 denmes:= strdate(e,'DD.MM') : A,5;
 c := leadchar(' ',str(val(copy(f,1,pos('/',f)-1)+
                 cond(e<valdate('01.01.2000','DD.MM.YYYY') :
                           copy(f,pos('/',f)+3,2),
                      else:copy(f,pos('/',f)+1,4))),6,0)) :A,13;
   bbs:= cond(bb=0 : '', else : str(bb,'000')) : A,3;
   bbs1:= cond(bb1=0 : '', else : str(bb1,'000')) : A,3;

#K @ e,~f;
   iREKL_b (@) * f;
   iREKL_bsr (@) ~f, rok;
   iKodOP kodOP;
#C miesto := iKodOP.miesto:A,20;
{   udajo}
   cislo  := val(copy(f,1,pos('/',f)-1)) : F,3,0;
   a_s    := strdate(e,'DD.MM.YYYY') : A,10;
  Var_ICO := udaje.DIC : A,10;
  aa      := ' ' : A,1;
   Da     := e mod 7:F,1,0;
   AkyDen := cond(Da=1:'Po', Da=2:'Ut', Da=3:'St', Da=4:'Št', Da=5:'Pi', Da=6:'So', Da=0:'Ne'):A,2;
```

## REKLpol.x

```fand
e:D,'DD.MM.YYYY';   { datum reklamacie }
f:A,8;
INTKODTOV:F,10.0;
POPIS1:A,40;
zavada : A,75;
POPIS2:A,40;
KODVYD:A,1;
MNOZSTVO:F,6.2;
MERJEDN:A,3;
NAKUPCENA:F,6.2;
DPH:F,2.1;
VYRCISLO:A,25;
Vydaj : A,1;
  mes : F,2,0;      { zaruka }
a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
c:D,'DD.MM.YYYY';     {Zaradenie do KP}
d:A,8;                {Interne oznacenie P}

#K @ e,f, intkodtov;
   Sklad a,b,intkodtov;
   {sklad} iKodTov intkodtov;
   REKL e,f;
   iREKLpol (@) * e,f;
   iKtREKL (@) * intkodtov;
   {KZpol} iKtKZ intkodtov;
   {KPpol} iKtKP intkodtov;
                         JU              16.08.2026     strana: 45
Typ Nazev
Text
   {KPpol} iKZpolABI c, d, intkodtov;
   KZ a,b;
#C odb := REKL.odb : A,50;
   dod := REKL.dod : A,50;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   Prijem := iKZpolABI.Prijem : A,1;
   var_sym := KZ.var_sym : A,10;
   kzpol_mnozstvo := iKtKZ.mnozstvo : F,6.2;
#A sklad.Mnozstvo (Mnozstvo>=0:'Množstvo na sklade nemôže byť menšie ako 0 !!') !! += (-Mnozstvo);
{#A sklad.Mnozstvo (Mnozstvo>=0:'Množstvo na sklade nemôže byť menšie ako 0 !!') !! += cond(prijem='T' : -Mnozstvo);}
#I merjedn := 'ks';


    asdfasdaffff

#I1_kzpol
#O1_ sklad
```

## REKLpol.x

```fand
e:D,'DD.MM.YYYY';   { datum reklamacie }
f:A,8;
INTKODTOV:F,10.0;
POPIS1:A,40;
zavada : A,75;
POPIS2:A,40;
KODVYD:A,1;
MNOZSTVO:F,6.2;
MERJEDN:A,3;
NAKUPCENA:F,6.2;
DPH:F,2.1;
VYRCISLO:A,25;
Vydaj : A,1;
  mes : F,2,0;      { zaruka }
a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
c:D,'DD.MM.YYYY';     {Zaradenie do KP}
d:A,8;                {Interne oznacenie P}

#K @ e,f, intkodtov;
   Sklad a,b,intkodtov;
   {sklad} iKodTov intkodtov;
   REKL e,f;
   iREKLpol (@) * e,f;
   iKtREKL (@) * intkodtov;
   {KZpol} iKtKZ intkodtov;
   {KPpol} iKtKP intkodtov;
                         JU              16.08.2026     strana: 45
Typ Nazev
Text
   {KPpol} iKZpolABI c, d, intkodtov;
   KZ a,b;
#C odb := REKL.odb : A,50;
   dod := REKL.dod : A,50;
   rok_s := strdate(a,'YYYY') : A,4;
   rok := val(strdate(a,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   Prijem := iKZpolABI.Prijem : A,1;
   var_sym := KZ.var_sym : A,10;
   kzpol_mnozstvo := iKtKZ.mnozstvo : F,6.2;
#A sklad.Mnozstvo (Mnozstvo>=0:'Množstvo na sklade nemôže byť menšie ako 0 !!') !! += (-Mnozstvo);
{#A sklad.Mnozstvo (Mnozstvo>=0:'Množstvo na sklade nemôže byť menšie ako 0 !!') !! += cond(prijem='T' : -Mnozstvo);}
#I merjedn := 'ks';


    asdfasdaffff

#I1_kzpol
#O1_ sklad
```

## Uhrady.x

```fand
{ Evidencia úhrad pohladavok }
a:D,'DD.MM.YYYY';     {Datum interneho dokladu}
b:A,8;                {Interne oznacenie Pohladavky, resp. Zavazku}
c:A,13;               {Oznacenie : cislo faktury, resp. VS}
pb:D,'DD.MM.YYYY';    {datum uhrady}
pc:F,6.2;             {uhradena ciastka}
od_ucet : A,20;       {ucet partnera pri platbe prev. prikazom}
prirad_kz : B;        { true - do KZ }
prirad_kp : B;        { true - do KP }

#C c_b := copy(c,1,8) : A,8;
abs_pc := abs(pc) : F,6.2;
#K @ * a,~b;
   KP a,b;
   KZ a,b;
   iUcetb c_b; {ucet}
   PD c;

#C rok   := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
   cislo := val(copy(b,1,pos('/',b)-1)) : F,3,0;
   kodOP := cond (kp.exist & ((pc>0 & ^prirad_kz) | prirad_kp) : kp.kodOP,
                         JU              16.08.2026     strana: 50
Typ Nazev
Text
                  kz.exist & ((pc<0 & ^prirad_kp) | prirad_kz) : kz.kodOP,
                  else : 0) : F,3,0;
#A KP.pc ! += cond (kp.exist & ((pc>0 & ^prirad_kz) | prirad_kp) : pc, else : 0);
   KP.uhrady ! += cond (kp.exist & ((pc>0 & ^prirad_kz) | prirad_kp) : 1, else : 0);
   KZ.pc ! += cond (kz.exist & ((pc<0 & ^prirad_kp) | prirad_kz) :-pc, else : 0);
   KZ.uhrady ! += cond (kz.exist & ((pc<0 & ^prirad_kp) | prirad_kz) : 1, else : 0);
#I a := PARAM.dat1;
   b := PARAM.c;
   c := PARAM.var_sym;
  pb := today;
  pc := param.a1234;
od_ucet:=PARAM.NameSearch;
```

## Mesiace

```fand
{}
   Datum : D,'MM.YYYY';
#K @ @ ;
#C DatVyd:=valdate('01.'+str(datum,2,0)+'.'+strdate(today,'YYYY'),'DD.MM.YYYY') : D,'DD.MM.YYYY';

                         JU              16.08.2026     strana: 53
Typ Nazev
Text
```

## Ekonom

```fand
{}
   Cislo : A,8;
   Datum : D,'MM.YYYY';

Mnozstvo : F,6.2;
Mnozstvo1: F,6.2;

 PrijemC : F,8.2;
  VydajC : F,8.2;
 PrijemP : F,8.2;
  VydajP : F,8.2;
  Celkom : F,8.2;
   Spolu : F,8.2;

   CeKor : F,5.2;
Prirazka : F,2.2;
     Clo : F,2.2;
     JCD : A,15;
 CeKorMn : F,7.2;
CePrirMn : F,7.2;
CeKorPrirDaMn : F,8.2;
Pohladavky : F,8.2;
  Uhrady : F,8.2;
    Zisk : F,7.2;
   Firma : A,14;
   DatV  : D,'DD.MM.YYYY';

DrHaNM :F,6.2; {Nßklady - DKP                ŮŮŮŮTŮŮŮŮ  Rozpis vydavkov    }
Poistne:F,6.2; {P ÷_ oistne zo zakona            ŮŮŮŮ+                         }
PrevRez:F,6.2; {Prevadzkova rezia   ine     ŮŮŮŮ+                         }
PrReAut:F,6.2; {Prevadzkova rezia   auto    ŮŮŮŮ+                         }
PrReSC :F,6.2; {Prevadzkova rezia   SC      ŮŮŮŮ+                         }
PrReBan:F,6.2; {Prevadzkova rezia   banka   ŮŮŮŮ+                         }
PHM_SC :F,6.2; {PHM pre SC                   ŮŮŮŮ+                         }
HaN_IM :F,6.2; {HaNIM - obstarav. cena       ŮŮŮŮ+            u_               }
Tovar  :F,6.2; {Tovar                        ŮŮŮŮ+                         }
DanZPri:F,6.2; {Dan z prijmu                 ŮŮŮŮ+                         }
OsUcet :F,6.2; {Osobny ucet podnikatela      ŮŮŮŮ-                         }
DPH    :F,6.2; {DPH    }
s_DPH  :F,6.2; {DPH    }
VydNez :F,6.2; {nezaradene vydaje            ŮŮŮŮ+                         }
Reklam :F,6.2;
Sluzby :F,6.2;
Osobuc :F,6.2;
Poist  :F,6.2;
Zaloha :F,6.2;
Tovary :F,6.2; {Tovar                        ŮŮŮŮ+                         }
TovSlu :F,6.2; {Tovary aj sluzby Q           ŮŮŮŮ+                         }
PriNez :F,6.2; {nezaradene prijmy            ŮŮŮŮ+                         }

#K @ * Datum;
#C CiVyr := copy (Cislo, 1, 3) : N,3;
#C Mesiac := strdate(Datum,'YY.MM') : A,5;
   Date   := strdate(DatV,'DD.MM.YY') : A,8;
   Den    := val(strdate(DatV,'DD')) : F,2,0;
   Mes    := val(strdate(Datum,'MM')) : F,2,0;
   Nakup_v_Kor_x_1000  := CeKorMn / 1000       : F,5.2;
   ObPrir_v_Kor_x_1000 := CePrirMn / 1000      : F,5.2;
   Predaj_v_Kor_x_1000 := CeKorPrirDaMn / 1000 : F,5.2;
   Nakup_v_Kor_x_100   := CeKorMn / 100        : F,6.2;
   ObPrir_v_Kor_x_100  := CePrirMn / 100       : F,6.2;
   Predaj_v_Kor_x_100  := CeKorPrirDaMn / 100  : F,6.2;
   Nakup_v_Kor_x_10    := CeKorMn / 10         : F,7.2;
   ObPrir_v_Kor_x_10   := CePrirMn / 10        : F,7.2;
   Predaj_v_Kor_x_10   := CeKorPrirDaMn / 10   : F,7.2;
   Nakup_v_Korunach    := CeKorMn              : F,7.2;
                         JU              16.08.2026     strana: 54
Typ Nazev
Text
   ObPrir_v_Korunach   := CePrirMn             : F,7.2;
   Predaj_v_Korunach   := CeKorPrirDaMn        : F,8.2;
   Uhradene_v_Korunach := Mnozstvo             : F,8.2;
   Efektivnost         := CePrirMn / Mnozstvo  : F,7.2;
   c2:=Trailchar(' ',PARAM.Titul)+' '+Trailchar(' ',PARAM.Meno)+' '+
       Trailchar(' ',PARAM.Priezv)+', '+trailchar(' ',PARAM.Miesto):A,40;
```

## SpotPrie

```fand
kod : A,3;
LITRE:F,6.2;
KM:F,6.0;
Sk_za_PHM:F,6.2;
Sk_za_PHM_bez_DPH:F,6.2;
                         JU              16.08.2026     strana: 58
Typ Nazev
Text
SERVIS:F,6.2;
invest:F,6.2;
opravy:F,6.2;
ine:F,6.2;
mesiace : F,4,0;
ZACIA_KM:F,6.2;
Koniec_KM:F,6.2;
spotr_posled : F,2.2;
litre_posled : F,2.2;
LITRE_lpg:F,6.2;
KM_lpg:F,6.0;
Sk_za_LPG:F,6.2;
Sk_za_LPG_bez_DPH:F,6.2;
uspora:F,6.2;
usp_LPG:F,6.2;
usp_LPG_bez_DPH:F,6.2;
usp_fikt:F,6.2;
body_Shell : F,5,0;
kosacka:F,2.2;

#K @ @;
   Auto Kod;

#C Pal := Auto.pal : A,15;
   spotr := ( litre / km ) * 100 : F,2.4;
   spotr_lpg := ( litre_lpg / km_lpg ) * 100 : F,2.4;
   L_Prie := Litre div Mesiace : F,4,2;
   Km_Prie := Km div Mesiace : F,4,2;
   Sk_Prie := Sk_za_PHM div Mesiace : F,4,2;
#C mena := cond(paramcat.rok < 2009 : 'Sk ', else : 'Eur') : A,3;
   Sp_Prie := spotr : F,2.2;
   Sk_DPH := Sk_za_PHM - Sk_za_PHM_bez_DPH:F,6.2;
```

## Spotreba.x

```fand
KOD:A,3;
DATUM:D,'DD.MM.YYYY';
LITRE:F,2.2;
SK_NA_1L:F,2.3;
SK_BE_1L:F,2.3;
ZACIA_KM:F,6.0;
KONIEC_KM:F,6.0;
L_NA_100_K:F,2.4;
SK_NA_1_KM:F,2.4;
SERVIS:F,4.1;
SO_SERV_1_:F,2.4;
INE:F,4.1;
POPIS:A,40;
OPRAVA:F,4.1;
INVEST:F,4.1;
N15:A,9;
hod : D,'hh:mm';
MIESTO:A,40;
FIRMA:A,10;
DPH:F,2.1;
DO_PLNA:B;
{USPORA:F,6.2;}
PALIVO:A,1;             { ' '-95, '+'-VPower, '8'-98, '*'-VPower100 }
body_Shell : F,3,0;
ucet : B;
kosacka:F,2.2;
zlava:F,1.2;

#K @ * kod, zacia_km;
   iDat (@) * kod, datum, hod;
   iDat_ (@) * kod, datum;
   iKodA (@) * kod;
                         JU              16.08.2026     strana: 59
Typ Nazev
Text
   Auto Kod;
#C rok_s := strdate(datum,'YYYY') : A,4;
   rok := val(strdate(datum,'YYYY')) : F,4,0;
   mena := cond(rok < 2009 : 'Sk ', else : 'Eur') : A,3;

   kos_l := cond(kosacka > 0 : kosacka, else : 0) : F,2.2;
   kos_r := cond(kosacka < 0 : - kosacka, else : 0) : F,2.2;

   Sk_za_PHM := cond(rok < 2009 :
                   ((LITRE + kos_l) * SK_NA_1L ) round 1,
                     else :
                   ((LITRE + kos_l) * SK_NA_1L ) - zlava) : F,4.2;
   Sk_za_ben := cond(rok < 2009 :
                   ((LITRE + kos_l) * SK_be_1L ) round 1,
                     else :
                   ((LITRE + kos_l) * SK_be_1L ) - zlava) : F,4.2;
   kos := cond(kosacka > 0 : 'k', kosacka < 0 : '-', else : '') : A,1;
   datum6 := strdate(datum,'DDMMYY') : A,6;
   datum8 := strdate(datum,'DDMMYYYY') : A,8;
   Sk_be_1l_Bez_DPH := ((Sk_be_1l * 100) / (100 + dph)) round 1 : F,6.3;
   Sk_na_1l_Bez_DPH := cond (Sk_na_1l = 0 : Sk_be_1l_Bez_DPH,
                       else : ((Sk_na_1l * 100) / (100 + dph))) round 1 : F,6.3;
   uspora := (Sk_be_1l_Bez_DPH-Sk_na_1l_Bez_DPH)*(LITRE + kos_l) : F,6.2;
   Bez_DPH := cond(rok < 2009 :
                 ((Sk_za_PHM * 100) / (100 + dph)) round 1,
                 else :
                 ((Sk_za_PHM * 100) / (100 + dph)) round 2) : F,6.2;
   DPH_Sk := Sk_za_PHM - Bez_DPH : F,3.2;
   dph_s := str(dph,2,0) : A,2;
   Sk_za_PHM_S := str(Sk_za_PHM,'____,__') : A,7R;
   km := - ZACIA_KM + Koniec_KM : F,4,0;
   PS := cond ( uspora>0 : Auto.LPG, else : Auto.PS ) : F,2.2;
   l_ben := ((SpotPrie.spotr {Auto.ps} * km) / 100) * SK_be_1L : F,4.2;
   usp_LPG := cond ( uspora>0 : l_ben - Sk_za_PHM ) : F,4.2;
   usp_LPG_s := str ( usp_LPG,4,0 ) : A,4;
   l_ben_bez_DPH := ((SpotPrie.spotr * km) / 100) * SK_be_1L_bez_DPH : F,4.2;
   usp_LPG_bez_DPH := cond ( uspora>0 : l_ben_bez_DPH - bez_dph) : F,4.2;
   km_s := str(km, '___0') : A,4;
   Fir := Auto.Fir : B;
   max := cond(datum<valdate('01.01.2000','DD.MM.YYYY') |
               datum>valdate('31.12.2000','DD.MM.YYYY') : 1, else : 0.85) : F,6.2;
{  cestPD:= (val(str(          { ┌─ konst. treba opravit program - SC }
                 cond(^fir : km * ( 3 + ( SK_NA_1L_Bez_DPH * PS / 100 )),
                      else : km * ( SK_NA_1L_Bez_DPH * max * PS / 100 ) ),4,1))) round 1 : F,4.2;
   cestPD_s := str(cestPD, '_____,_') : A,7; }
#K Cerp_K (Spotreba) kod, Koniec_km;
#C litre_na_konci := Cerp_K.litre + kos_r : F,2.2;
   do_plna_na_konci := Cerp_K.do_plna : B;
   km_na_konci := Koniec_km + Cerp_K.km : F,6,0;
#K Cerp_K_1 (Spotreba) kod, km_na_Konci;
#C litre_na_konci_1 := Cerp_K_1.litre : F,2.2;
   cel := cond (uspora > 0 : SpotPrie.Spotr_LPG, else : SpotPrie.Spotr) : F,2.2;
   spotr := cond (uspora > 0 & litre_na_konci>0 : ( litre_na_konci / km ) * 100,
                  uspora > 0 & litre_na_konci=0 &
                  litre_na_konci_1>0 : ( litre_na_konci_1 / km ) * 100,
                 ( litre_na_konci / km ) * 100 >= cel - 3.5 &
                 ( litre_na_konci / km ) * 100 <= cel + 3.5 : ( litre_na_konci / km ) * 100,
                ((^do_plna & ^do_plna_na_konci & uspora = 0) | uspora = 0 |
                 (^do_plna & do_plna_na_konci)) &
                 ( litre / km ) * 100 >= cel - 2.0 &
                 ( litre / km ) * 100 <= cel + 2.0 : ( litre / km ) * 100,
            else : cel ) : F,2.2;
 sposob_b:= cond (uspora > 0 & litre_na_konci>0 : '0',
                  uspora > 0 & litre_na_konci=0 & litre_na_konci_1>0 : '1',
                 ( litre_na_konci / km ) * 100 >= cel - 3.5 &
                 ( litre_na_konci / km ) * 100 <= cel + 3.5 : '3',
                ((^do_plna & ^do_plna_na_konci & uspora = 0) | uspora = 0 |
                 (^do_plna & do_plna_na_konci)) &
                         JU              16.08.2026     strana: 60
Typ Nazev
Text
                 ( litre / km ) * 100 >= cel - 2.0 &
                 ( litre / km ) * 100 <= cel + 2.0 : '2',
            else : '4' ) : A,1;
cerp_spotr := cond ((litre_na_konci = 0 & litre=0) |
                    (litre_na_konci = 0 & litre_na_konci_1 = 0) : cel,
                     uspora = 0 : spotr,
                     uspora > 0 & litre_na_konci=0 &
                     litre_na_konci_1>0 : litre_na_konci_1 * 100 / km,
                    (^do_plna & ^do_plna_na_konci & uspora = 0) |
                    (^do_plna & do_plna_na_konci) : litre * 100 / km,
              else : litre_na_konci * 100 / km ) : F,2.2;
  cerp_spotr_s := str(cerp_spotr,2,2) : A,5;
  sposob   := cond ((litre_na_konci = 0 & litre=0) |
                    (litre_na_konci = 0 & litre_na_konci_1 = 0) : '5',
                     uspora = 0 : sposob_b,
                     uspora > 0 & litre_na_konci=0 &
                     litre_na_konci_1>0 : '6',
                    (^do_plna & ^do_plna_na_konci & uspora = 0) |
                    (^do_plna & do_plna_na_konci) : '7',
              else : '8' ) : A,1;
 pocet := 1 : F,2,0;
 Sk_na_1_km_  := Sk_za_PHM / km : F,2.4;
 Sk_na_1_km_s := ( Sk_za_PHM + servis + INE + servis + oprava + invest ) / km : F,2.4;
                { priemer na 1 km so servisom a in?mi v?dajmi }
 Kvartal := strdate(Datum,'YYYY')+'q'+
            cond(val(strdate(Datum,'MM'))<4 : '1',
                 val(strdate(Datum,'MM'))<7 : '2',
                 val(strdate(Datum,'MM'))<10: '3', else : '4') : A,7;
 Roky := strdate(Datum,'YYYY') : A,4;
#A SpotPrie.LITRE      !! += LITRE;
   SpotPrie.KM         !! += KM;
   SpotPrie.SERVIS     !! += SERVIS;
   SpotPrie.Sk_za_PHM  !! += Sk_za_PHM;
   SpotPrie.opravy     !! += oprava;
   SpotPrie.invest     !! += INvest;
   SpotPrie.ine        !! += ine;
#L PALIVO = ' ' | PALIVO = '+' | PALIVO = '8' | PALIVO = '*' :
   '" "-95  "+"-VPower "8"-98 "*"-VPower100' ;
#I Kod := Par.kod;
   ZACIA_KM := SpotPrie.zacia_km;
   koniec_KM := {auto.nadrz} (6000 / SpotPrie.spotr) + SpotPrie.zacia_km
                {SpotPrie.koniec_km};
   datum := today;
   dph := cond (uspora > 0 : sadzbDPH.DPH_dol, else : sadzbDPH.DPH_hor);
   SK_BE_1L := SK_NA_1L;
   DO_PLNA := true;
```

## sc_roky

```fand
rok : D,'YYYY';
spolu:F,6.2;

                         JU              16.08.2026     strana: 62
Typ Nazev
Text
```

## vyrocia

```fand
DATUM:D,'DD.MM.';
TEXT:A,31;
```

## delf

```fand
DATUM:D,'DD.MM.YYYY';
CAS:A,5;
TRVaNie:F,3.0;
zakaznik : A,30;
TEXT:A,255;
nazmie : A,50;

#C NazMie_ := copy(nazmie,1,40) : A,40;

#K udajo nazmie;
   iNazMie_ NazMie;
```

## dph

```fand
OD:D,'DD.MM.YYYY'; {Datum                                               }
DO:D,'DD.MM.YYYY'; {Datum                                               }
DPH1:F,2.1;
DPH2:F,2.1;
SUM1VSTUP:F,6.2;
DPH1VSTUP:F,5.2;
SUM2VSTUP:F,6.2;
DPH2VSTUP:F,5.2;
SUM1VYSTUP:F,6.2;
DPH1VYSTUP:F,5.2;
SUM2VYSTUP:F,6.2;
DPH2VYSTUP:F,5.2;   { HaNIM za 12 poslednych mesiacov }
DPHPAR4:F,5.0;
SUM_PAR_69:F,6.2;
DPH_PAR_69:F,5.2;
ODPOCET_PAR_69:F,5.2;
R13:F,5.0;
ArcIntCis : A,1;

#C dph1_s := str(dph1,'_0') : A,2;
   dph2_s := str(dph2,'_0') : A,2;
   vstup  := dph1vstup + dph2vstup + DPH_PAR_69 : F,5,0;
   vystup := dph1vystup + dph2vystup : F,5,0;
   spolu  := vstup - vystup - DPH_PAR_69 : F,5.2;
   mena   := cond(do < valdate('01.01.2009','DD.MM.YYYY') : 'Sk',
                                                     else : 'Eur') : A,3;
```

## pohl.dbf

```fand
a:D,'DD.MM.YYYY';     {Zaradenie do KP}
od:A,50;              {Odberatel}
n:A,40;               {Text}
z :F,6.2;             {pohľadávka}
pc:F,6.2;             {            └─ ciastka   }
dph : F,2.1;
ds:D,'DD.MM.YYYY';
rc:F,6.2;

{
#C uhrada := pc + rc : F,6.2;
   Aky_prijem := vydaje.d : A,30;
   pohlad := z - uhrada : F,6.2;

   DPH_Sk := (z * (dph/100)) round 1 : F,6.2;
    zn    := z + DPH_Sk : F,6.2;
  zavazok := zn - uhrada : F,6.2;
   sluzby := z - tovar : F,6.2;
}
                         JU              16.08.2026     strana:108
Typ Nazev
Text
```

## PoklDokl

```fand
a:D,'DD.MM.YYYY'; {Datum                                               }
b:A,13;    {Oznacovanie poloziek dennika a Styk s podriadenymi subormi }
d:A,56;    {Popisny text                                               }
r:B;       {Celkova polozka ?                                          }
p:B;       {Priebezna polozka ?                                        }
a1    : F,6.2;  {Prijem  ────┬────  Hotovost  ────  Penazne prostriedky}
sl_a1 : A,40;   {            │                                         }
a2    : F,6.2;  {Vydaje  ────┘                                         }
sl_a2 : A,40;

#C  druh := cond ( a1>0 : 'Príjem', else : 'Výdaj') : A,6;
   Spolu := cond ( r : a1 - a2 ) : F,6.2;
   Prieb := cond ( p : a1 - a2 ) : F,6.2;
   mena   := cond(a < valdate('01.01.2009','DD.MM.YYYY') : 'Sk',
                                                    else : 'Eur') : A,3;
```

## revolv

```fand
vklad : F,7.2;
pa    : F,3.2;
mes   : F,1.1;

#C vynos := vklad * ((pa / 100) / 12) * 0.85 * mes : F,6.2;
   spolu := vklad + vynos : F,7.2;
{   rok   := }
```

## BytUdaje

```fand
plocha : F,2.2;

#K @@
```

## DomUdaje

```fand
like bytudaje
```

## VyuctSBD

```fand
{}
mr : D,'MM.YYYY';
mo : D,'MM.YYYY';
A1 : F,4.2;
A2a : F,4.2;
A2b : F,4.2;
A2c : F,4.2;
A2d : F,4.2;
                         JU              16.08.2026     strana:166
Typ Nazev
Text
A2e : F,4.2;
A2f : F,4.2;
A2g : F,4.2;
A2h : F,4.2;
A3  : F,4.2;
A4  : F,4.2;
A5  : F,4.2;
B1  : F,4.2;
B2  : F,4.2;
B3  : F,4.2;
B4  : F,4.2;
B5  : F,4.2;
B6  : F,4.2;
B7  : F,4.2;
B8  : F,4.2;
B9  : F,4.2;
B10 : F,4.2;

pozn : T;

#K @ mr;

#C A_sum := A1+A2a+A2b+A2c+A2d+A2e+A2f+A2g+A2h+A3+A4+A5 : F,5.2;
   B_sum := B1+B2+B3+B4+B5+B6+B7+B8+B9+B10 : F,5.2;
   AB_sum:= A_sum + B_sum : F,5.2;

#K VyuSBD_1 (VyuctSBD) mo;
   {spotreba}
#C A_plus := cond(mo=0: 0, else:A_sum - VyuSBD_1.A_sum) : F,5,0;
   A_perc := (A_plus/VyuSBD_1.A_sum)*100 : F,2.1;
   B_plus := cond(mo=0: 0, else:B_sum - VyuSBD_1.B_sum) : F,5,0;
   B_perc := (B_plus/VyuSBD_1.B_sum)*100 : F,2.1;


    pomoc_text  

A. Základné nájomné
l.Splátka investičného úveru - anuita  181. Sk
2.Fond ROÚ
 a)základná tvorba  170. Sk
 b)paušál na výťahy  39. Sk
 c)údržba STA        20. Sk
 d)rezerva na reg. a mer. prístroje  17. Sk
 e)pomerové merače tepla  0. Sk
 f)splátka fin. výpomoci z RHF  0. Sk
 g)ostatné splátky (reg.ventily, vyrovnávka a iné) 0. Sk
 h)splátky nákl. za opr.v byte  0. Sk
3.Príspevok na správu  98. Sk
4.Odmena VČS 40. Sk
S.Odmena domovníka  0. Sk
Základné nájomné spolu  565. Sk

B. Zálohy za dodávky a služby
l.Dodávka tepla na ÚK 1 150. Sk
2.Teplo na ohrev TÚV  450. Sk
3.Vodné a stočné TV  81. Sk
4.Vodné a stočné SV  198. Sk
S.Odvedenie zrážkových vôd  10. Sk
6.Odvoz a uloženie domového odpadu  52. Sk
7.Spotreba elektr. energie v spoločných priest.  10. Sk
8.Spotreba elektr. energie - výťah  26. Sk
9.Poistné  6. Sk
lO.Daň z nehnuteľnosti  29. Sk
Zálohy za dodávky a služby spolu 2 012. Sk
Mesačný zálohový predpis c e l k o m 2 577. Sk

                         JU              16.08.2026     strana:167
Typ Nazev
Text
```

## VyuctSBD

```fand
{}
mr : D,'MM.YYYY';
mo : D,'MM.YYYY';
A1 : F,4.2;
A2a : F,4.2;
A2b : F,4.2;
A2c : F,4.2;
A2d : F,4.2;
                         JU              16.08.2026     strana:166
Typ Nazev
Text
A2e : F,4.2;
A2f : F,4.2;
A2g : F,4.2;
A2h : F,4.2;
A3  : F,4.2;
A4  : F,4.2;
A5  : F,4.2;
B1  : F,4.2;
B2  : F,4.2;
B3  : F,4.2;
B4  : F,4.2;
B5  : F,4.2;
B6  : F,4.2;
B7  : F,4.2;
B8  : F,4.2;
B9  : F,4.2;
B10 : F,4.2;

pozn : T;

#K @ mr;

#C A_sum := A1+A2a+A2b+A2c+A2d+A2e+A2f+A2g+A2h+A3+A4+A5 : F,5.2;
   B_sum := B1+B2+B3+B4+B5+B6+B7+B8+B9+B10 : F,5.2;
   AB_sum:= A_sum + B_sum : F,5.2;

#K VyuSBD_1 (VyuctSBD) mo;
   {spotreba}
#C A_plus := cond(mo=0: 0, else:A_sum - VyuSBD_1.A_sum) : F,5,0;
   A_perc := (A_plus/VyuSBD_1.A_sum)*100 : F,2.1;
   B_plus := cond(mo=0: 0, else:B_sum - VyuSBD_1.B_sum) : F,5,0;
   B_perc := (B_plus/VyuSBD_1.B_sum)*100 : F,2.1;


    pomoc_text  

A. Základné nájomné
l.Splátka investičného úveru - anuita  181. Sk
2.Fond ROÚ
 a)základná tvorba  170. Sk
 b)paušál na výťahy  39. Sk
 c)údržba STA        20. Sk
 d)rezerva na reg. a mer. prístroje  17. Sk
 e)pomerové merače tepla  0. Sk
 f)splátka fin. výpomoci z RHF  0. Sk
 g)ostatné splátky (reg.ventily, vyrovnávka a iné) 0. Sk
 h)splátky nákl. za opr.v byte  0. Sk
3.Príspevok na správu  98. Sk
4.Odmena VČS 40. Sk
S.Odmena domovníka  0. Sk
Základné nájomné spolu  565. Sk

B. Zálohy za dodávky a služby
l.Dodávka tepla na ÚK 1 150. Sk
2.Teplo na ohrev TÚV  450. Sk
3.Vodné a stočné TV  81. Sk
4.Vodné a stočné SV  198. Sk
S.Odvedenie zrážkových vôd  10. Sk
6.Odvoz a uloženie domového odpadu  52. Sk
7.Spotreba elektr. energie v spoločných priest.  10. Sk
8.Spotreba elektr. energie - výťah  26. Sk
9.Poistné  6. Sk
lO.Daň z nehnuteľnosti  29. Sk
Zálohy za dodávky a služby spolu 2 012. Sk
Mesačný zálohový predpis c e l k o m 2 577. Sk

                         JU              16.08.2026     strana:167
Typ Nazev
Text
```

## Byt.x

```fand
{}
mr : D,'MM.YYYY';
mo : D,'MM.YYYY';
A1 : F,4.2;
A2a : F,4.2;
A2b : F,4.2;
A2c : F,4.2;
A2d : F,4.2;
A2e : F,4.2;
A2f : F,4.2;
A2g : F,4.2;
A2h : F,4.2;
A3  : F,4.2;
A4  : F,4.2;
A5  : F,4.2;
B1  : F,4.2;
B2  : F,4.2;
B3  : F,4.2;
B4  : F,4.2;
B5  : F,4.2;
B6  : F,4.2;
B7  : F,4.2;
B8  : F,4.2;
B9  : F,4.2;
B10 : F,4.2;

#K @ mr;

#C A_sum := A1+A2a+A2b+A2c+A2d+A2e+A2f+A2g+A2h+A3+A4+A5 : F,5.2;
   B_sum := B1+B2+B3+B4+B5+B6+B7+B8+B9+B10 : F,5.2;
   AB_sum:= A_sum + B_sum : F,5.2;

#K Byt_1 (Byt) mo;
   {spotreba}
#C A_plus := cond(mo=0: 0, else:A_sum - Byt_1.A_sum) : F,5,0;
   A_perc := (A_plus/Byt_1.A_sum)*100 : F,2.1;
   B_plus := cond(mo=0: 0, else:B_sum - Byt_1.B_sum) : F,5,0;
   B_perc := (B_plus/Byt_1.B_sum)*100 : F,2.1;
```

## Poist_ne

```fand
poi_kod : F,2,0;

nazov : A,30;

#K @ poi_kod;
                         JU              16.08.2026     strana:170
Typ Nazev
Text
```

## Poistky

```fand
popis : A,30;

forma : A,'$';

poi_kod : F,2,0;

poistne : F,5.2;

m_termin : D,'DD';
r_termin : D,'DD.MM';

dat_vzniku : D,'DD.MM.YYYY';
dat_zaniku : D,'DD.MM.YYYY';

#K Poist_ne poi_kod;

#C poistovna := Poist_ne.nazov : A,30;
   spolu := cond(forma='R':poistne, forma='M':12*poistne) : F,5.2;

#L forma='M'|forma='R' : ' Forma hradenia - M=mesačne, R=ročne';
```

## VyuctSSE.x

```fand
{}
mr : D,'DD.MM.YYYY';
mo : D,'DD.MM.YYYY';

zac_el : F,5,0;
kon_el : F,5,0;

J_cena : F,1.2;
pausal : F,3.1;

el : F,5,0;         {zalohove platby - inkaso}
dph : F,2,0;

pozn : T;

#K @ mr;
   SSE_1 (VyuctSSE) mo;
   iKel (@) * kon_el;
   SSE_2 (iKel) kon_el;
#C spotr := kon_el - zac_el : F,3,0;
   Spolu := ((spotr * j_cena) + pausal) : F,5,0;
   sDph  := spolu * ( 1 + ( dph / 100 )) : F,5,0;
   rozdiel := el - sDph : F,5,0;
```

## VyuSSESa.x

```fand
like VyuctSSE;
```

## ElSasa.x

```fand
{
mp : D,'DD.MM.YYYY';
mr : D,'DD.MM.YYYY';
el_v : F,5,0;
el_n : F,5,0;
sk_v : F,2.2;
sk_n : F,2.2;
pausal : F,3,0;
dph : F,2.1;
vymena : B;
rok : D,'YYYY';
 }

mp : D,'DD.MM.YYYY';
mr : D,'DD.MM.YYYY';
el_v : F,5,0;
spotreba_v : F,3.3;
el_n : F,5,0;
spotreba_n : F,3.3;
sk_v : F,3.3;
sk_n : F,3.3;
dni : F,3,0;
den_spo_v_    : F,3.1;
den_spo_n_    : F,3.1;
den_spo_v     : F,3.3;
den_spo_n     : F,3.3;
pausal : F,3.2;
dph : F,2.1;
                         JU              16.08.2026     strana:172
Typ Nazev
Text
vymena : B;
rok : D,'YYYY';
ArcIntCis : A,1;

#K @ mr;
   elSa_k (ElSasa) mp;
#C el_na_konci_v := cond (vymena : el_v, else : elsa_K.el_v) : F,5,0; {spotreba}
   el_na_konci_n := cond (vymena : el_n, else : elsa_K.el_n) : F,5,0;
   el_rok := val(strdate(mr,'YYYY')) : F,4,0;
   el_r := val(strdate(rok,'YYYY')) : F,4,0;
   rok_s := cond(rok=0 : str(el_rok,'0000'), else : str(el_r,'0000')) : A,4;
   X := mr mod 7:F,1,0;
   AkyDen := cond(X=1:'Po', X=2:'Ut', X=3:'St', X=4:'Št', X=5:'Pi', X=6:'So', X=0:'Ne'):A,2;

{  spotreba_v := (el_v - el_na_konci_v) : F,5,0;
   spotreba_n := cond( el_n < el_na_konci_n :
                       el_n + (100000 - el_na_konci_n),
                 else :  el_n - el_na_konci_n) : F,5,0; }
   priemer_v := (spotreba_v) / (mr - mp) : F,3.1;
   priemer_n := (spotreba_n) / (mr - mp) : F,3.1;
{  dni := mr - mp : F,2,0; }
   sk_priemer_v := priemer_v * sk_v * (1+(dph/100)) : F,3.2;
   sk_priemer_n := priemer_n * sk_n * (1+(dph/100)) : F,3.2;
   sk_spolu_v := spotreba_v * sk_v * (1+(dph/100)) : F,4.2;
   sk_spolu_n := spotreba_n * sk_n * (1+(dph/100)) : F,4.2;



#I mr := today;

{ ceny su bez DPH }
   sk_v := cond(el_rok < 2009 : 5.00,                          { SSE }
                el_rok = 2009 : 5.01,     {   0.1663 }
                el_rok = 2010 : 5.30,     {   0.1759342 + 5.8% }
                el_rok = 2011 : 5.808,    { 192.7917 Eur/MWh   }
                el_rok = 2012 : 5.837,    { 193.4180 Eur/MWh   }
                el_rok = 2013 : 5.823,    { 193.3005 Eur/MWh   }
                mr < valdate('04.02.2014', 'DD.MM.YYYY')  : 4.943, { 164.10 Eur/MWh }
                el_rok = 2014 : 5.45,     { 180.9258 Eur/MWh Magna EA }
                el_rok >= 2015 : 5.051    { 167.6667 Eur/MWh Magna EA }
                );
{ ceny su bez DPH }
   sk_n := cond(el_rok < 2007 : 1.35,                          { SSE }
                el_rok = 2007 : 1.96,
                el_rok = 2008 : 2.15,
                el_rok = 2009 : 2.30,     {   0.0763 }
                el_rok = 2010 : 2.45,     {   0.0812002 + 6.5% }
                el_rok = 2011 : 2.815,    {  93.4717 Eur/MWh   }
                el_rok = 2012 : 2.899,    {  92.8864 Eur/MWh   }
                el_rok = 2013 : 2.968,    {  98.5262 Eur/MWh   }
                mr < valdate('04.02.2014', 'DD.MM.YYYY')  : 2.619, {  86.9231 Eur/MWh }
                el_rok = 2014 : 2.378,    {  78.9258 Eur/MWh Magna EA }
                el_rok >= 2015: 2.310     {  76.6667 Eur/MWh Magna EA }
                );
{ ceny su bez DPH }
   pausal := cond(el_rok < 2007 : 510,
                  el_rok = 2007 : 178.5,
                  el_rok = 2008 : 375,
                  el_rok = 2009 : 375,     { 12.4477 }
                  el_rok = 2010 : 332.6,   { 11.0400 - 11.31% }
                  el_rok = 2011 : 339.52,  { 11.27 Eur/mes.   }
                  el_rok = 2012 : 339.52,  { 11.27 Eur/mes.   }
                  el_rok = 2013 : 303.67,  { 10.08 Eur/mes.   }
                  mr < valdate('04.02.2014', 'DD.MM.YYYY')  : 314.52, {  10.44 Eur/MWh   }
                  el_rok = 2014 : 294.93,  {  9.79 Eur/mes.   }
                  el_rok >= 2015 : 314.56  { 10.44 Eur/mes.   }
                  );
{ ceny su bez DPH }
                         JU              16.08.2026     strana:173
Typ Nazev
Text
   dph := param.dph;
   mp := param.mincas;
```

## VyucVeol.x

```fand
{}
mr : D,'DD.MM.YYYY';
mo : D,'DD.MM.YYYY';

                         JU              16.08.2026     strana:176
Typ Nazev
Text
zac_h2o : F,5,0;
kon_h2o : F,5,0;

J_cena : F,1.2;
pausal : F,3.1;

h2o : F,5,0;         {zalohove platby - inkaso}
dph : F,2,0;

pozn : T;

#K @ mr;
   VEOL_1 (VyucVEOL) mo;
   iKh2o (@) * kon_h2o;
   VEOL_2 (iKh2o) kon_h2o;
#C spotr := kon_h2o - zac_h2o : F,3,0;
   Spolu := ((spotr * j_cena) + pausal) : F,5,0;
   sDph  := spolu * ( 1 + ( dph / 100 )) : F,5,0;
   rozdih2o := h2o - sDph : F,5,0;
```

## H2O_Sasa.x

```fand
mp : D,'DD.MM.YYYY';
mr : D,'DD.MM.YYYY';
h2o_v : F,5,0;
h2o_n : F,5,0;
sk_v : F,2.2;
sk_n : F,2.2;
dph : F,2.1;

#K @ mr;
   h2oSa_k (h2o_Sasa) mp;
#C h2o_na_konci_v := cond(h2o_v > h2osa_K.h2o_v : h2osa_K.h2o_v, else : 0) : F,5,0; {spotreba}
   h2o_na_konci_n := h2osa_K.h2o_n : F,5,0;
   h2o_rok := valdate(strdate(mr,'YYYY'),'YYYY') : D,'YYYY';
   spotreba_v := (h2o_v - h2o_na_konci_v) : F,5,0;
   spotreba_n := cond (h2o_n < h2o_na_konci_n :
                       h2o_n + (100000 - h2o_na_konci_n),
                 else :  h2o_n - h2o_na_konci_n) : F,5,0;
   priemer_v := ((spotreba_v) / (mr - mp)) * 1000 : F,4.2;
   priemer_n := ((spotreba_n) / (mr - mp)) * 1000 : F,4.2;
   dni := mr - mp : F,2,0;
   sk_priemer_v := priemer_v * sk_v * (1+(dph/100)) : F,3.2;
   sk_priemer_n := priemer_n * sk_n * (1+(dph/100)) : F,3.2;
   sk_spolu_v := spotreba_v * sk_v * (1+(dph/100)) : F,4.2;
   sk_spolu_n := spotreba_n * sk_n * (1+(dph/100)) : F,4.2;
#I mr := today;
   sk_v := 5;
   sk_n := 1.35;
   dph := param.dph;
   mp := param.mincas;
```

## Baterie.x

```fand
kod : F,3,0;
oznac : A,3;
vyrobca : A,10;
typ     : A,3;   { AA, AAA}
mAh     : F,5,0;
kupene : D,'DD.MM.YYYY';
nabite : D,'DD.MM.YYYY';
kolky_krat : F,2,0;
kde_som : A,40;
von : B;

#K @ kod;
{#C el_na_konci_v := elsa_K.el_v : F,5,0; {spotreba}}
```

## Bat_nabi

```fand
kod : F,3,0;

nabite : D,'DD.MM.YYYY';
kde_som : A,40;
vybite : D,'DD.MM.YYYY';
```

## Teplo.x

```fand
{}
mr : D,'DD.MM.YYYY';
mo : D,'DD.MM.YYYY';

zac_ob : F,5,0;
kon_ob : F,5,0;
zac_ku : F,5,0;
                         JU              16.08.2026     strana:179
Typ Nazev
Text
kon_ku : F,5,0;
zac_sp : F,5,0;
kon_sp : F,5,0;
zac_de : F,5,0;
kon_de : F,5,0;

#K @ mr;
   Tep1 (Teplo) mo;
   iOb (@) * kon_ob;
   ob_2 (iOb) kon_ob;
   iKu (@) * kon_ku;
   ku_2 (iKu) kon_ku;
   iSp (@) * kon_sp;
   sp_2 (iSp) kon_sp;
   iDe (@) * kon_de;
   de_2 (iDe) kon_de;
#C spotr_ob := kon_ob - zac_ob : F,3,0;
   spotr_ku := kon_ku - zac_ku : F,3,0;
   spotr_sp := kon_sp - zac_sp : F,3,0;
   spotr_de := kon_de - zac_de : F,3,0;
   spolu := spotr_ob + spotr_ku + spotr_sp + spotr_de : F,5,0;
```

## VyuctSPP.x

```fand
{}
mr : D,'DD.MM.YYYY';
mo : D,'DD.MM.YYYY';

zac_pl : F,5,0;
kon_pl : F,5,0;

J_cena : F,3.2;
pausal : F,3.1;

pl : F,5,0;         {zalohove platby - inkaso}

pozn : T;

#K @ mr;
   SPP_1 (VyuctSPP) mo;
   iKpl (@) * kon_pl;
   SPP_2 (iKpl) kon_pl;
#C spotr := kon_pl - zac_pl : F,5,0;
   Spolu := (spotr * j_cena) + pausal : F,5.2;
   rozdiel := pl - spolu : F,5,0;
```

## Inkaso.x

```fand
{}
mr : D,'MM.YYYY';
mo : D,'MM.YYYY';

el : F,4,0;
pl : F,3,0;
ra : F,3,0;
tv : F,3,0;

#K @ mr;
   Ink_1 (Inkaso) mo;

#C in_sum:= el+pl+ra+tv : F,5,0;
   el_plus := cond(mo=0: 0, else:el - ink_1.el) : F,4,0;
   el_perc := (el_plus/ink_1.el)*1000 : F,2,1;
   pl_plus := cond(mo=0: 0, else:pl - ink_1.pl) : F,3,0;
   pl_perc := (pl_plus/ink_1.pl)*1000 : F,2,1;
   ra_plus := cond(mo=0: 0, else:ra - ink_1.ra) : F,3,0;
   ra_perc := (ra_plus/ink_1.ra)*1000 : F,2,1;
   tv_plus := cond(mo=0: 0, else:tv - ink_1.tv) : F,3,0;
   tv_perc := (tv_plus/ink_1.tv)*1000 : F,2,1;
```

## InkaSasa.x

```fand
like inkaso;
```

## Platby.x

```fand
{ Evidencia platieb za byt a služby }

a:D,'DD.MM.YYYY';     {Zaradenie do Platby}
b:A,8;                {Interne oznacenie Z}
od:A,40;              {Dodavatel}
n:A,40;               {Text}
x:F,6.2;              {záväzok}
pc:F,6.2;             { uhradene }
  splat : D,'DD.MM.YYYY'; {splatná do}
  stala : A,1;
    mes : F,2,0;
 uhr_do : F,2,0;
od_ucet : A,20;
var_sym : A,10;
                         JU              16.08.2026     strana:183
Typ Nazev
Text
kon_sym : A,10;
spc_sym : A,10;
spc_mes : F,2,0;
forma   : A,1; {D = dopredu, A = aktualne}
U_H : A,1;  { ucet=U, hotovost=H, mix=X }

#C vs := leadchar(' ',var_sym) : A,10;
   zn := x : F,6.2;
 od_n := copy(od,1,20)+' '+copy(n,1,19) : A,40;
  rok := valdate(strdate(a,'YYYY'),'YYYY') : D,'YYYY';
  n_1 := copy(n,1,pos(' ',n)-1) : A,20;
 c := leadchar(' ',str(val(copy(b,1,pos('/',b)-1)+
                 cond(a<valdate('01.01.2000','DD.MM.YYYY') :
                           copy(b,pos('/',b)+3,2),
                      else:copy(b,pos('/',b)+1,4))),6,0)) :A,13;
pd_d := cond(pos(',',od)=0 | pos(',',od)>20 : copy(od,1,20),
                      else : copy(od,1,pos(',',od)-1))+' Fa '+b:A,40;
#K @ a,~b;
   iPlatby_abs (@) a,~b, stala;
   iPlatby_s (@) * stala;
   iPlatby_bsr (@) ~b, stala, rok;
   iPlatby_Vs (@) * vs;
   iPlatby_Vss (@) * vs, splat;
#C uhrada := pc : F,6.2;
    Uhr   := cond (uhrada=0 : '', x = uhrada : '■', x > uhrada : '<', else : '>') : A,1;
  zavazok := x - uhrada : F,6.2;
   cislo  := val(copy(b,1,pos('/',b)-1)) : F,3,0;
   a_s    := strdate(a,'DD.MM.YYYY') : A,10;
   x_s    := replace(' ',str(x,'___.___,__'),'-') : A,11;
  Var_ICO := udaje.DIC : A,10;
  aa      := ' ' : A,1;
   Den    := strdate(splat,'DD.MM'):  A,5;
   D      := splat mod 7:F,1,0;
   AkyDen := cond(D=1:'Po', D=2:'Ut', D=3:'St', D=4:'Št', D=5:'Pi', D=6:'So', D=0:'Ne'):A,2;
#K iPlatby_VssZn (@) * vs, splat, x;
#L uhr_do > 0 & uhr_do < 31 : ' Zadanie dátumu úhrady je medzi 1 až 31 !';
#I od     := PARAM.nazmie;
   od_ucet:= PARAM.miesto;
   stala  := PARAM.doklad;
  kon_sym := cond(stala=' ' : '   0308');
   mes    := 12;
   a      := today;
```

## DruhDruh.x

```fand
d:A,20;    { text }
d_B:A,1;     { kod druhu }

  ok : B;

#K @ d_b;
   iDD (@) * ~d;
```

## DruhTova.x

```fand
d:A,20;    { text      }
d_B:A,1;     { kod DRUHdruh }
  B:A,1;     { kod upresnenia }
  dph : F,2.1;

  ok : B;

#K @ b;
   iDruh (@) * ~d;
   druhdruh d_b;

#C druhy := druhdruh.d : A,20;
```

## Obchody.x

```fand
kod   : F,5,0;
nazov : A,20;
mesto : A,20;

spolu : F,6.2;
bez_dph : F,6.2;

#K @ kod;
   iObchod (@) * ~mesto, ~nazov;

#C obchod := trailchar(' ',copy(nazov,1,20))+', '+mesto : A,30;
```

## Tovary.x

```fand
kod   : F,5,0;
d     : A,'!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!';
mj    : A,'!!!';
kod_d : A,1;
  dph : F,2.1;

#K @ kod;
   iTovar (@) * ~d;
   DruhTova kod_d;
   iKod_d (@) * kod_d;

#C druhtova := druhtova.d : A,20;
   kod_s := str(kod,4,0) : A,4;
```

## Nakup_o.x

```fand
kod : F,6,0;

kod_o : F,5,0; { obchod }
datum : D,'DD.MM.YYYY';
tlac  : D,'MM.YYYY';

spolu : F,6.2;
bez_dph : F,6.2;

kto : A,'$';

#K @ * kod;
   obchody kod_o;
   Nak_d_k (@) * datum, kod_o;
   Nak_t (@) * tlac;

#C obchod := obchody.obchod : A,35;
   dph := spolu - bez_dph : F,5.1;
                         JU              16.08.2026     strana:190
Typ Nazev
Text

#L kto = 'O' | kto = 'M' | kto = 'S' : 'O - ocik, M - mamka, S - spolem';

#I kto := 'M';
```

## Nakup_t.x

```fand
kod : F,6,0;

kod_o : F,5,0; { obchod }
datum : D,'DD.MM.YYYY';

kod_t : F,5,0; { tovar }
cena  : F,6.2;
mnoz  : F,3.3;
  dph : F,2.1;
{akcia : B;
b_p : B;
n_p : B;}

#K @ * kod;
{ datum, kod_o, kod_t, cena;}
   Nak_d_k datum, kod_o;
   obchody kod_o;
   tovary kod_t;

#C obchod := obchody.obchod : A,30;
   tovar  := tovary.d : A,30;
   mj     := tovary.mj : A,3;
   spolu  := (mnoz*cena) round 1 : F,6.2;
 bez_dph  := (spolu * 100) / (dph + 100) : F,6.2;

#K iNakup_o (@) * datum, kod_o, ~tovar;
   iNak (@) * datum, kod_o;
   iObch (@) * kod_o;
   iNakT (@) * datum, kod, kod_o, kod_t;
   iNT (@) * kod_t;
{
#A nakup_o.spolu ! += spolu;
   nakup_o.bez_dph ! += bez_dph;

#I kod_o := param.cislo; }
```

## dpd.dbf

```fand
{ Penazny dennik }

{kontr:A,1;}
a:D,'DD.MM.YYYY'; {Datum                                               }
b:A,13;    {Oznacovanie poloziek dennika - interne prepojenie so subormi PD }
zp:D,'DD.MM.YYYY';    { datum zdanitelneho plnenia }
kodOP:F,3,0;
c:A,13;    {Externe oznacenie dokladu - ak existuje ... }
d:A,99;    {Popisny text                                               }
r:B;       {Celkova polozka ?                                          }
p:B;       {Priebezna polozka ?                                        }
a1:F,6.2;  {Prijem  ────┬────  Hotovost  ────┬────  Penazne prostriedky}
a2:F,6.2;  {Vydaje  ────┘                    │                         }
a3:F,6.2;  {Prijem  ────┬────  Bezny ucet  ──┘                         }
a4:F,6.2;  {Vydaje  ────┘                                              }
Vydaj : A,1;                              {      Rozpis vydavkov       }
a7:F,6.2;  {drobny HaN majetok           ────┬────      vydaj = 5      }
a8:F,6.2;  {       nevyuzite             ────┤                         }
a9:F,6.2;  {Mzdy zamestnancom            ────┤             "  = a      }
a10:F,6.2; {Dane z miezd zamestnancov    ────┤             "  = c      }
a11:F,6.2; {Poistne zo zakona + DDP      ────┤             "  = 4      }
                         JU              16.08.2026     strana:196
Typ Nazev
Text
a12:F,6.2; {Prevadzkova rezia            ────┤             "  = 1+2+7+u}
a13:F,6.2; {PHM pre SC                   ────┤             "  = h      }
a14:F,6.2; {HaNIM - obstarav. cena       ────┤             "  = 6      }
a15:F,6.2; {Tovar                        ────┤             "  = t      }
a16:F,6.2; {Dan z prijmu, DPH            ────┤             "  = 8+d    }
a17:F,6.2; {Osobny ucet podnikatela      ────┘             "  = 3      }

po :A,30;  {Poznamka                                                   }

dph:F,2.1;   { sadzba dph v % pd}
dph_1:F,2.1; { znizena sadzba dph v % pd}

sDph : F,6.2;

hal_p : F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}
hal : F,1.2; {hal. vyrovnanie - pre presnu sumu s DPH}

ok : A,1;
ArcIntCis : A,1;
```

## dkp.dbf

```fand
{ Evidencia pohladavok }

a:D,'DD.MM.YYYY';     {Zaradenie do KP}
b:A,8;                {Interne oznacenie P}
KODOP:F,3.0;
od:A,50;              {Odberatel}
n:A,40;               {Text}
z :F,6.2;             {pohladavka bez dane}
pc:F,6.2;             {pohladavka s danou - vo fande > uhradene  }
dph : F,2.1;
ds:D,'DD.MM.YYYY';
zp:D,'DD.MM.YYYY';
{rc:F,6.2;}

KODPRI:A,1;
U_H:A,1;
TOVAR:F,6.2;
SPOSOB_UHR:A,25;
OBJEDNAVKA:A,25;
zamok : A,1;
PRIJEM:A,1;

uhrady : F,1,0;

vyrovn : F,1.2;
    bb : F,3,0;
   hod : D,'hh:mm';

ArcIntCis : A,1;
zaloha : F,6.2;
uhrada : F,6.2;
```

## dkppol.dbf

```fand
{_ kp polozky pohladavok - tovary a sluzby _}

a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
c:D,'DD.MM.YYYY';     {Zaradenie do KP}
d:A,8;                {Interne oznacenie P}
popis1:A,40;
popis2:A,40;
Prijem : A,1;
mnozstvo:F,6.2;     { skutocne }
mnozstvo_z:F,6.2;   { do zakaznickej fa. }
merjedn:A,3;
nakupcena:F,6.2;    { bez DPH }
                         JU              16.08.2026     strana:197
Typ Nazev
Text
op :F,2.6;          { obch. prir.}
op_z :F,2.6;        { obch. prir. do zakaznickej fa. }
dph:F,2.1;
vyrcislo:A,25;
pomintkodtov:F,10,0;
intkodtov:F,10,0;
ArcIntCis : A,1;
```

## dpartner.dbf

```fand
{ Udaje o spolupracujucich firmach - adresa, telefon ... }

kodop:F,3,0;
 firma:A,30;
  meno:A,30;
cinnos:A,60; { cinnosti }
 ulica:A,20;
   psc:A,6;
miesto:A,20;
   tlf:A,15;
  tlfa:A,15;
  tlfb:A,40;
   fax:A,15;
   ICO:A,10;
PenUst:A,20;
    Cu:A,20;
  Pozn:A,60;
   DRC:A,15;
  ICPD:A,15;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;

ku : D,'DD.MM.';
 x : F,6.2;              {záväzok bez dane v % 0 }

do : D,'DD.MM.YYYY';

ArcIntCis : A,1;
```

## dkraje.dbf

```fand
KODKRA:A,1;
NAZOV:A,20;
KM2:F,4.0;
OBY:F,6.0;
ArcIntCis : A,1;
```

## dokresy.dbf

```fand
KODOKR:A,2;
NAZOV:A,20;
KODKRA:A,1;
KM2:F,4.0;
OBY:F,6.0;

ArcIntCis : A,1;
```

## dmesta.dbf

```fand
KOD:A,4;
NAZOV:A,20;
KODOKR:A,2;
TEL:A,8;
PSC:A,5;

ArcIntCis : A,1;

                         JU              16.08.2026     strana:198
Typ Nazev
Text
```

## dbanky.dbf

```fand
KODBAN:A,4;
SKRATKA:A,10;
POPIS:A,40;

ArcIntCis : A,1;
```

## dkurzy.dbf

```fand
{ kurzy }

KOD:A,3;
DATUM:D,'DD.MM.YYYY';
KRAJINA:A,15;
MNOZ:F,4.0;
D_NAKUP:F,3.3;
D_PREDAJ:F,3.3;
D_KURZ_NBS:F,3.3;
V_NAKUP:F,3.3;
V_PREDAJ:F,3.3;
V_KURZ_NBS:F,3.3;
ZAUJIMAVE:B;

ArcIntCis : A,1;
```

## calendar.dbf

```fand
DaTUM:D,'DD.MM.YYYY';
TYPEDAY:F,1.0;
JMeNO:A,25;
MENO:A,25;
T:T;
ArcIntCis : A,1;
```

## dvyrocia.dbf

```fand
DATUM:D,'DD.MM.';
TEXT:A,31;
ArcIntCis : A,1;
```

## dudaje.dbf

```fand
{ Udaje o podnikatelovi  @ @ }

  meno:A,10;
priezv:A,15;
 titul:A,5;
 nazov:A,40;
   ICO:A,10;
   DIC:A,10;

  ICPD:A,15;
drcDPH:A,15;
DatDPH:D,'DD.MM.YYYY';
   Q_M:A,1!;
sadzba:F,2.1;

   uli:A,20;
   cis:A,5;
   PSC:A,6;
miesto:A,20;
   tlf:A,13;
  tlf1:A,13;
 mobil:A,13;
mobil1:A,13;
   fax:A,13;
  fax1:A,13;
 email:A,28;
                         JU              16.08.2026     strana:199
Typ Nazev
Text
hodsadzba:F,4,2;
PRGhodsadzba:F,2,2;

ArcIntCis : A,1;
```

## dprijmy.dbf

```fand
{      Prijmy    }

Kod:A,1;
  d:A,20;    {Popisny text                                               }
  v:B;       {                                                           }
  r:B;       {Celkove prijmy ?                                           }
  p:B;       {Priebezne prijmy ?                                         }
  m:B;       {tovar                                                      }
  b:B;       {tovar vrateny dodavatelovi                                 }
  z:B;       {zakazky - sluzby, vyrobky                                  }

pocet : F,5,0; { počet položiek v aktuálnom PD }

suma : F,6.2;

ArcIntCis : A,1;
```

## dvydaje.dbf

```fand
{      Vydaje    }

KODVYD:A,1;
D:A,30;         { popis }
PV:B;            { vydaj - true    prijem - false                }
R:B;            { celkove }
P:B;            { priebezne }
M:B;            { predaj tovaru              }
B:B;            { tovar vrateny dodavatelovi }
Z:B;            { zakazky - sluzby, vyrobky  }
B7:B;           { drobný HaN majetok (DKP)                      }
B8:B;           { Dohoda o prac. činnosti + daň                 }
B11:B;          { poistne zo zakona                             }
B12:B;          { rezia                                         }
B13:B;          { PHM pre SC                                    }
B14:B;          { HaN invest. majetok (ZP)                      }
B15:B;          { tovar - zakúpený pre ďalší predaj             }
B16:B;          { dan z prijmu                                  }
B17:B;          { osobny ucet                                   }
B20:B;          { material                                      }
POCET:F,5.0;    { počet položiek v aktuálnom PD }
X:B;            { pravidelna platba }
SUMA:F,6.2;

ArcIntCis : A,1;
```

## ducty.dbf

```fand
{ ucty }

BA:A,4;
pr:A,6;                {predcislie}
cu:A,12;               {Banka - číslo účtu}
zv:A,2;                {pravidelne mesacne zasielanie vypisov}
zv_od:D,'DD.MM.YYYY';  {PMZV od}
zv_do:D,'DD.MM.YYYY';  {PMZV do}
os:B;                  {A=osobny, N=podnikatelsky}
popis:A,20;
ArcIntCis : A,1;
```

## ducet.dbf

```fand
{ ucet }

                         JU              16.08.2026     strana:200
Typ Nazev
Text
A:D,'DD.MM.YYYY';
B:A,8;
C:A,13;
D:D,'DD.MM.YYYY';
BA:A,4;
CU:A,12;
UA:A,40;
PA:F,6.2;
QA:B;
RA:B;
BA1:A,4;
CU1:A,12;
NOVA:B;
vydaj : A,1;
ArcIntCis : A,1;
```

## ducetimp.dbf

```fand
{ ucet_imp }

BA:A,4;
CU:A,12;
DATUM:D,'DD.MM.YYYY';
V_S:A,10;
ArcIntCis : A,1;
```

## dpocstav.dbf

```fand
{ pv }

A:D,'DD.MM.YYYY';
B:A,8;
PH:F,6.2;
H:A,13;
PU:F,6.2;
U:A,13;
M:F,6.2;
HAN:F,6.2;
POH:F,6.2;
ZAV:F,6.2;
ArcIntCis : A,1;
```

## dstrata.dbf

```fand
{strata}

rok  : F,4,0;
suma : F,6.2;
```

## dpokldok

```fand
a:D,'DD.MM.YYYY'; {Datum                                               }
b:A,13;    {Oznacovanie poloziek dennika a Styk s podriadenymi subormi }
d:A,56;    {Popisny text                                               }
r:B;       {Celkova polozka ?                                          }
p:B;       {Priebezna polozka ?                                        }
a1    : F,6.2;  {Prijem  ────┬────  Hotovost  ────  Penazne prostriedky}
sl_a1 : A,40;   {            │                                         }
a2    : F,6.2;  {Vydaje  ────┘                                         }
sl_a2 : A,40;

ArcIntCis : A,1;
```

## dauto.dbf

```fand
Kod : A,3;
Typ : A,20;
SPZ : A,10;
ehme : F,2.1;   { EHK mesto }
eh90 : F,2.1;   { EHK 90 }
                         JU              16.08.2026     strana:201
Typ Nazev
Text
eh120: F,2.1;   { EHK 120 }
esme : F,2.1;   { ES  mesto }
esmi : F,2.1;   { ES  mimo mesta }
esko : F,2.1;   { ES  kombinovana }
STN : F,2.1;    { STN priemerná spotreba }
koef: F,1.1;    { STN koef. - spotreba v meste }
Pal : A,20;
LPG : F,2.1;
Fir : B;        { auto je zahrnuté do majetku fyz. osoby }
Pou : B;        { Aktualne sa pouziva }
motor : F,1.1;
nadrz : F,2,0;
nadrz_LPG : F,2,0;
ArcIntCis : A,1;
aktual : B;
```

## dtrasy.dbf

```fand
tra : F,3,0;
  z : A,20;
 do : A,20;
vzd : F,4,0;

cez : A,100;

mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;

ArcIntCis : A,1;
```

## ddoppros.dbf

```fand
SKR:A,3;
PROSTR:A,20;
ArcIntCis : A,1;
```

## dsumapd.dbf

```fand
{ sumapd }{ Sucty suboru PD }

a:D,'DD.MM.YYYY'; {Datum                                               }
PO:F,4.0;
P1:F,6.2;  {hotovost ───┬── POCIATOC. STAV }
P2:F,6.2;  {ucet    ────┤                                              }
P3:F,6.2;  {MAJETOK ────┤                                              }
POH:F,6.2; {pohlad. ────┤                                              }
ZAV:F,6.2; {záväzky ────┘                                              }
a1:F,6.2;  { ──Pr─┬─Prijem─┬──Hotovost──┬─Penazne prostriedky }
a1_:F,6.2; { ──Ce─┤        │            │                     }
a1__:F,6.2; {─Ine─┘        │            │                     }
a2:F,6.2;  { ──Pr─┬─Vydaje─┘            │                     }
a2_:F,6.2; { ──Ce─┤                     │                     }
a2__:F,6.2; {─Ine─┘                     │                     }
a3:F,6.2;  { ──Pr─┬─Prijem─┬─Bezny ucet─┘                     }
a3_:F,6.2; { ──Ce─┤        │                                  }
a3__:F,6.2;{ ──In─┴─┐      │                                  }
a3___:F,6.2;{──Urok─┘      │                                  }
a4:F,6.2;  { ──Pr─┬─Vydaje─┘                                  }
a4_:F,6.2; { ──Ce─┤                                           }
a4__:F,6.2;{ ─Ine─┘                                           }
{
a1:F,6.2;  {Prijem  ────┬────  Hotovost  ────┬────  Penazne prostriedky}
a2:F,6.2;  {Vydaje  ────┘                    │                         }
a3:F,6.2;  {Prijem  ────┬────  Bezny ucet  ──┤                         }
a4:F,6.2;  {Vydaje  ────┘                    │                         }
}
a5:F,6.2;  {Prijmy  ────┬────  Celkom    ────┘                         }
a6:F,6.2;  {Vydaje  ────┘                                              }
                         JU              16.08.2026     strana:202
Typ Nazev
Text
a7:F,6.2;  {Náklady - DKP                ────┬────  Rozpis vydavkov    }
a8:F,6.2;  {Náklady - §26 Odpis ...      ────┤                         }
a9:F,6.2;  {Mzdy zamestnancom            ────┤                         }
a10:F,6.2; {Dane z miezd zamestnancov    ────┤                         }
a11:F,6.2; {Poistne zo zakona + DDP      ────┤                         }
a12:F,6.2; {Prevadzkova rezia            ────┤                         }
a121:F,6.2; {Prevadzkova rezia   ine     ────┤                         }
a122:F,6.2; {Prevadzkova rezia   auto    ────┤                         }
a123:F,6.2; {Prevadzkova rezia   SC      ────┤                         }
a12b:F,6.2; {Prevadzkova rezia   banka   ────┤                         }
a13:F,6.2; {PHM pre SC                   ────┤                         }
a14:F,6.2; {HaNIM - obstarav. cena       ────┤                         }
a15:F,6.2; {Tovar                        ────┤                         }
a16:F,6.2; {Dan z prijmu                 ────┤                         }
a17:F,6.2; {Osobny ucet podnikatela      ────┘                         }
a20:F,6.2; {Majetok}
a22:F,6.2; {DPH    }
zZP:F,6.2;
odpisy:F,6.2;
ZP: F,6.2;
leas:F,6.2;
ucet_prijem:F,6.2;
ucet_vydaj :F,6.2;
hot_prijem:F,6.2;
hot_vydaj :F,6.2;
pohlad : F,6.2;
zavazok : F,6.2;

strata : F,6.2;     { strata za predosle uctovne obdobie }
dochodok : F,6.2;   { rocny dochodok za predosle uctovne obdobie }
nezdan_suma : F,6.2;
rok_1 : A,4;

ArcIntCis : A,1;
```

## dsc.dbf

```fand
{ Cestovne prikazy }

kod:A,3;                     {Pouz. dopr. prostr. A, V, Au, AuV}
zaciatok:D,'DD.MM.YYYY';
zaciatoh: A,5 {D,'hh:mm'};
koniec:D,'DD.MM.YYYY';
konieh:  A,5 {D,'hh:mm'};
BB:F,3.0;
B:A,8;
CES:F,4.2;
UBY:F,4.2;
KAM:A,40;
UCEL1:A,40;
UCEL2:A,40;
BenKM:F,4.2;
PocKM:F,4.2;
MENO:A,20;
BYDL:A,30;
dat:D,'DD.MM.YYYY';
KONST:F,3.2;
CeBenz:F,3.2;
CeLpg :F,3.2;
DPH:F,2.1;

BenPocetMiest : F,1,0;
PocetMiest : F,1,0;
ArcIntCis : A,1;

    sumkm : F,4.2;
   cestSM : F,4.1;
   spolu  : F,5.2;
                         JU              16.08.2026     strana:203
Typ Nazev
Text
```

## deviauto.dbf

```fand
{ Cestovne prikazy }

   datum : D,'DD.MM.YYYY';
zaciatok : A,5 {D,'hh:mm'};
  koniec : A,5 {D,'hh:mm'};
      bb : F,3,0;
     tra : F,3,0;
mesto_2_km_pocet : F,2,0;
mesto_5_km_pocet : F,2,0;
mesto_10_km_pocet : F,2,0;
  odkial : A,20;
     kam : A,20;
    ucel : A,40;
  Zac_km : F,6,0;
  Kon_km : F,6,0;
   konst : F,3.2;
cena_PHM : F,3.2;
     Kod : A,3;
    nova : B;
     dph : F,2.1; { sadzba dane v % }
 PHM_zac : F,2.1;
 PHM_kon : F,2.1;

   LPG : B;
 text_1 : A,40;
 text_2 : A,40;
 text_3 : A,40;

ArcIntCis : A,1;
```

## dikzp.dbf

```fand
{           Inventarne karty ZP }
a:D,'DD.MM.YYYY';     {Zaradenie do IK}
b:A,8;                {Inventarne cislo}
C:F,4.0;
vy:A,30;              {Vyrobca / Miesto a sidlo}
n:A,40;               {Typ / Nazov}
vc:A,15;              {Vyrobne cislo}
rv:D,'YYYY';          {Rok vyroby    dikzp }
hb:D,'DD.MM.YYYY';    {    datum                       }
h:F,6.2;              { obstarav. cena s DPH           }
p:A,13;               { Doklad}
u:F,6.2;              {   vyska odpisu do zac. aktual. obdobia  }
hz:F,6.2;             {hodnota ZP na zaciatku aktual. zuctovacieho obdobia}
r:A,13;               {Doklad}
d:A,50;               {Dodavatel / Miesto a sidlo}
v:D,'DD.MM.YYYY';     {Vyradenie z IK}
sv:A,35;              {Sposob vyradenia}
SO:A,'$';             {Spôsob odpisu}
RO:F,2.0;             {Rok odpisovania}
OS:A,1;               {Odpisová skupina}
OKZVC:F,6.2;          {O koľko je zvýšená vstupná cena} {Vyska odpisu v % - rok 91,92}

dph : F,2.1;            { sadzba dane v % }
dph_dat:D,'DD.MM.YYYY'; {datum odpoctu DPH}

  h_n : B;              { A-hmotny / N-nehmotny }

oprava : F,6.2;       {zvysenie/znizenie o chybu v predoslych obdobiach}

fdo:A,10;  { faktura od dodavatela  - oznac. dodavatela}
fd:A,8;    { faktura od dodavatela  - interne oznac. JU}

rok_pom : F,4,0;

                         JU              16.08.2026     strana:204
Typ Nazev
Text
zo : F,6.2;

ArcIntCis : A,1;
```

## dikdkp.dbf

```fand
{ ikdkp }

A:D,'DD.MM.YYYY';
B:A,8;
C:F,4.0;
N:A,40;
MN:F,4.0;
JC:F,6.2;
HB:D,'DD.MM.YYYY';
H:F,6.2;
P:A,13;
U:F,6.2;
R:A,13;
D:A,50;
V:D,'DD.MM.YYYY';
SV:A,35;
FDO:A,10;
FD:A,8;
FV:A,8;
DPH:F,2.1;
ArcIntCis : A,1;
```

## dsklad.dbf

```fand
{ sklad }

A:D,'DD.MM.YYYY';
B:A,8;
POPIS1:A,40;
POPIS2:A,40;
MNOZSTVO:F,4.0;
NAKUPCENA:F,6.2;
D:A,50;
V:D,'DD.MM.YYYY';
SV:A,35;
FDO:A,10;
FD:A,8;
FV:A,8;
DPH:F,2.1;
VYRCISLO:A,15;
MERJEDN:A,3;
INTKODTOV:F,10.0;
mes : F,2.0;
ArcIntCis : A,1;
```

## dskl2008.dbf

```fand
{ sklad }

A:D,'DD.MM.YYYY';
B:A,8;
POPIS1:A,40;
POPIS2:A,40;
MNOZSTVO:F,4.0;
NAKUPCENA:F,6.2;
D:A,50;
V:D,'DD.MM.YYYY';
SV:A,35;
FDO:A,10;
FD:A,8;
FV:A,8;
DPH:F,2.1;
VYRCISLO:A,15;
MERJEDN:A,3;
                         JU              16.08.2026     strana:205
Typ Nazev
Text
INTKODTOV:F,10.0;
ArcIntCis : A,1;
```

## dRekl.dbf

```fand
e:D,'DD.MM.YYYY';     {Zaradenie do REKL}
f:A,8;                {Interne oznacenie REKL}
kodOP:F,3,0;
dod:A,50;             {Dodavatel}
kodOP1:F,3,0;
odb:A,50;             {odberatel}
    bb : F,3,0;
   hod : D,'hh:mm';
g:D,'DD.MM.YYYY';   { vybavenie reklamacie }
    bb1 : F,3,0;
   hod1 : D,'hh:mm';
ArcIntCis : A,1;
```

## dReklpol.dbf

```fand
e:D,'DD.MM.YYYY';   { datum reklamacie }
f:A,8;
INTKODTOV:F,10.0;
POPIS1:A,40;
zavada : A,75;
POPIS2:A,40;
KODVYD:A,1;
MNOZSTVO:F,6.2;
MERJEDN:A,3;
NAKUPCENA:F,6.2;
DPH:F,2.1;
VYRCISLO:A,25;
Vydaj : A,1;
  mes : F,2,0;      { zaruka }
a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
c:D,'DD.MM.YYYY';     {Zaradenie do KP}
d:A,8;                {Interne oznacenie P}
```

## dleasing.dbf

```fand
A:D,'DD.MM.YYYY';
B:A,8;
VY:A,30;
N:A,40;
VC:A,15;
RV:D;
HZ:F,6.2;
LEAS:F,6.2;
LEA0:F,6.2;
POIS:F,6.2;
MES:F,2.0;
D:A,50;
LS:A,30;
V:D,'DD.MM.YYYY';
SV:A,35;
RO:F,2.0;
ArcIntCis : A,1;
```

## devizak.dbf

```fand
{ ez }

A:D,'DD.MM.YYYY';
B:A,8;
KODOP:F,3.0;
ZC:A,10;
OD:A,50;
DZ:A,10;
N:A,40;
                         JU              16.08.2026     strana:206
Typ Nazev
Text
BK:D,'DD.MM.YYYY';
OB:A,13;
AD:A,20;
AM:F,4.0;
BD:A,20;
BM:F,4.0;
CD:A,20;
CM:F,4.0;
CH:F,6.2;
HODINY:F,3.0;
PRACE:F,2.0;
PRIJEM:A,1;
prg : F,2.2;
ArcIntCis : A,1;
```

## dkz.dbf

```fand
{ Evidencia zavazkov }

a:D,'DD.MM.YYYY';     {Zaradenie do KZ}
b:A,8;                {Interne oznacenie Z}
kodOP:F,3,0;
od:A,50;              {Dodavatel}
n:A,40;               {Text}
x:F,6.2;              {záväzok bez dane v % 0 }
y:F,6.2;              {záväzok bez dane v % do 15 }
z:F,6.2;              {záväzok bez dane v % nad 15 }
pc:F,6.2;             { uhradene }
  splat : D,'DD.MM.YYYY'; {splatná do}
  stala : A,1;
    mes : F,2,0;
 uhr_do : F,2,0;
od_ucet : A,20;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;
spc_mes : F,2,0;
dph:F,2.1;  { sadzba dane v % nad 15 }
dph_1:F,2.1; { sadzba dane v % do 15 }
Vydaj : A,1;
Zp : D,'DD.MM.YYYY'; { Zdanitelne obdobie }
U_H : A,1;  { ucet=U, hotovost=H, mix=X }

uhrady : F,1,0;

zamok : A,1;

vyrovn : F,1.2;
    bb : F,3,0;
   hod : D,'hh:mm';
 par69 : A,1;
ArcIntCis : A,1;
uhrada : F,6.2;

par_69 : B;
```

## dkzpol.dbf

```fand
A:D,'DD.MM.YYYY';
B:A,8;
INTKODTOV:F,10.0;
POPIS1:A,40;
POPIS2:A,40;
KODVYD:A,1;
MNOZSTVO:F,6.2;
MERJEDN:A,3;
NAKUPCENA:F,6.2;
DPH:F,2.1;
                         JU              16.08.2026     strana:207
Typ Nazev
Text
VYRCISLO:A,25;
Vydaj : A,1;
  mes : F,2,0;      { zaruka }
ArcIntCis : A,1;
```

## duhrady.dbf

```fand
{ Evidencia úhrad pohladavok }
a:D,'DD.MM.YYYY';     {Datum interneho dokladu}
b:A,8;                {Interne oznacenie Pohladavky, resp. Zavazku}
c:A,13;               {Oznacenie : cislo faktury, resp. VS}
pb:D,'DD.MM.YYYY';    {datum uhrady}
pc:F,6.2;             {uhradena ciastka}
od_ucet : A,20;       {ucet partnera pri platbe prev. prikazom}
prirad_kz : B;        { true - do KZ }
prirad_kp : B;        { true - do KP }
ArcIntCis : A,1;
```

## ddenprac.dbf

```fand
a : D,'DD.MM.YYYY';  { EZ     Datum prijatia zakazky    }
     b : A,8;                    { Interne oznacenie zakazky }
DATUM  : D,'DD.MM.YYYY';
Zaciat : A,5;
Koniec : A,5;
u_zakaz : B;              { práce vykonané u zákazníka ?    A => SC }
TEXT : A,255;
    bb : F,3,0;
program : B;
ArcIntCis : A,1;
{
text_1 : A,60;
text_2 : A,60;
text_3 : A,60;
}
```

## dspotreb.dbf

```fand
{spotreba}
KOD:A,3;
DATUM:D,'DD.MM.YYYY';
LITRE:F,2.2;
SK_NA_1L:F,2.2;
SK_BE_1L:F,2.2;
ZACIA_KM:F,6.0;
KONIEC_KM:F,6.0;
L_NA_100_K:F,2.4;
SK_NA_1_KM:F,2.4;
SERVIS:F,4.1;
SO_SERV_1_:F,2.4;
INE:F,4.1;
POPIS:A,40;
OPRAVA:F,4.1;
INVEST:F,4.1;
N15:A,9;
hod : A,5 {D,'hh:mm'};
MIESTO:A,40;
FIRMA:A,10;
DPH:F,2.1;
DO_PLNA:B;
{USPORA:F,6.2;}
PALIVO:A,1;             { ' '-95, '+'-VPower, '8'-98, '*'-VPower100 }
body_Shell : F,3,0;
ucet : B;
kosacka:F,2.2;
zlava:F,1.2;
ArcIntCis : A,1;
TANK_TYP  : A,1;
PNEU      : A,1;
                         JU              16.08.2026     strana:208
Typ Nazev
Text
CESTA     : A,2;
STYL      : A,1;
SPOTREBA  :F,2.2;
BC_SPOTREB:F,2.2;
BC_QUANTIT:F,2.2;
BC_SPEED  :F,2.2;
```

## dpokdokl.dbf

```fand
{ pokldokl }

A:D,'DD.MM.YYYY';
B:A,13;
C:A,13;
D:A,56;
R:B;
P:B;
A1:F,6.2;
SL_A1:A,40;
A2:F,6.2;
SL_A2:A,40;
ArcIntCis : A,1;
```

## ddph.dbf

```fand
OD:D,'DD.MM.YYYY';
DO:D,'DD.MM.YYYY';
DPH1:F,2.1;
DPH2:F,2.1;
SUM1VSTUP:F,6.2;
DPH1VSTUP:F,5.2;
SUM2VSTUP:F,6.2;
DPH2VSTUP:F,5.2;
SUM1VYSTUP:F,6.2;
DPH1VYSTUP:F,5.2;
SUM2VYSTUP:F,6.2;
DPH2VYSTUP:F,5.2;
DPHPAR4:F,5.0;
SUM_PAR_69:F,6.2;
DPH_PAR_69:F,5.2;
ODPOCET_PAR_69:F,5.2;
R13:F,5.0;
ArcIntCis : A,1;
```

## dsadzdph.dbf

```fand
DPH_Dol : F,2.1;
DPH_Hor : F,2.1;

od : D,'DD.MM.YYYY';
do : D,'DD.MM.YYYY';

ArcIntCis : A,1;
```

## dstrdoch.dbf

```fand
rok  : F,4,0;
strata : F,6.2;
dochodok : F,6.2;
nezdan_suma : F,6.2;

    ------------
```

## dstrdoch.dbf

```fand
rok  : F,4,0;
strata : F,6.2;
dochodok : F,6.2;
nezdan_suma : F,6.2;

    ------------
```

## dvyucsbd.dbf

```fand
MR:D,'DD.MM.YYYY';
MO:D,'DD.MM.YYYY';
A1:F,4.2;
                         JU              16.08.2026     strana:209
Typ Nazev
Text
A2A:F,4.2;
A2B:F,4.2;
A2C:F,4.2;
A2D:F,4.2;
A2E:F,4.2;
A2F:F,4.2;
A2G:F,4.2;
A2H:F,4.2;
A3:F,4.2;
A4:F,4.2;
A5:F,4.2;
B1:F,4.2;
B2:F,4.2;
B3:F,4.2;
B4:F,4.2;
B5:F,4.2;
B6:F,4.2;
B7:F,4.2;
B8:F,4.2;
B9:F,4.2;
B10:F,4.2;
ArcIntCis : A,1;
```

## dbyt.dbf

```fand
MR:D,'DD.MM.YYYY';
MO:D,'DD.MM.YYYY';
A1:F,4.2;
A2A:F,4.2;
A2B:F,4.2;
A2C:F,4.2;
A2D:F,4.2;
A2E:F,4.2;
A2F:F,4.2;
A2G:F,4.2;
A2H:F,4.2;
A3:F,4.2;
A4:F,4.2;
A5:F,4.2;
B1:F,4.2;
B2:F,4.2;
B3:F,4.2;
B4:F,4.2;
B5:F,4.2;
B6:F,4.2;
B7:F,4.2;
B8:F,4.2;
B9:F,4.2;
B10:F,4.2;
ArcIntCis : A,1;
```

## dpoi_vne.dbf

```fand
POI_KOD:F,2.0;
NAZOV:A,30;
ArcIntCis : A,1;
```

## dpoistky.dbf

```fand
POPIS:A,30;
FORMA:A,1;
POI_KOD:F,2.0;
POISTNE:F,5.2;
M_TERMIN:D,'DD.MM.YYYY';
R_TERMIN:D,'DD.MM.YYYY';
DAT_VZNIKU:D,'DD.MM.YYYY';
DAT_ZANIKU:D,'DD.MM.YYYY';
ArcIntCis : A,1;

                         JU              16.08.2026     strana:210
Typ Nazev
Text
```

## dvyucSSE.dbf

```fand
MR:D,'DD.MM.YYYY';
MO:D,'DD.MM.YYYY';
ZAC_EL:F,5.0;
KON_EL:F,5.0;
J_CENA:F,3.2;
PAUSAL:F,3.1;
EL:F,5.0;
ArcIntCis : A,1;
```

## dElSasa.dbf

```fand
mp : D,'DD.MM.YYYY';
mr : D,'DD.MM.YYYY';
el_v : F,5,0;
spotreba_v : F,3.3;
el_n : F,5,0;
spotreba_n : F,3.3;
sk_v : F,3.3;
sk_n : F,3.3;
dni : F,3,0;
den_spo_v_    : F,3.1;
den_spo_n_    : F,3.1;
den_spo_v     : F,3.3;
den_spo_n     : F,3.3;
pausal : F,3.2;
dph : F,2.1;
vymena : B;
rok : D,'YYYY';
ArcIntCis : A,1;
```

## dh2osasa.dbf

```fand
mp : D,'DD.MM.YYYY';
mr : D,'DD.MM.YYYY';
h2o_v : F,5,0;
h2o_n : F,5,0;
sk_v : F,2.2;
sk_n : F,2.2;
dph : F,2.1;
spotreba : F,3.2;
dni : F,3,0;
priemer_l : F,3.2;
priemer   : F,3.2;
rok : D,'YYYY';
ArcIntCis : A,1;
```

## dinksasa.dbf

```fand
{}
mr : D,'MM.YYYY';
mo : D,'MM.YYYY';

el : F,4.1;
el_perc : F,4.1;
pl : F,3.1;
pl_perc : F,4.1;
ra : F,3.1;
ra_perc : F,4.1;
tv : F,3.1;
tv_perc : F,4.1;

ArcIntCis : A,1;
```

## dvyucSPP.dbf

```fand
MR:D,'DD.MM.YYYY';
MO:D,'DD.MM.YYYY';
                         JU              16.08.2026     strana:211
Typ Nazev
Text
ZAC_PL:F,5.0;
KON_PL:F,5.0;
J_CENA:F,3.2;
PAUSAL:F,3.1;
PL:F,5.0;
ArcIntCis : A,1;
```

## dinkaso.dbf

```fand
MR:D,'DD.MM.YYYY';
MO:D,'DD.MM.YYYY';
EL:F,4.0;
PL:F,3.0;
RA:F,3.0;
TV:F,3.0;
ArcIntCis : A,1;
```

## dplatby.dbf

```fand
{ Evidencia platieb za byt a služby }

a:D,'DD.MM.YYYY';     {Zaradenie do Platby}
b:A,8;                {Interne oznacenie Z}
od:A,40;              {Dodavatel}
n:A,40;               {Text}
x:F,6.2;              {záväzok}
pc:F,6.2;             { uhradene }
  splat : D,'DD.MM.YYYY'; {splatná do}
  stala : A,1;
    mes : F,2,0;
 uhr_do : F,2,0;
od_ucet : A,20;
var_sym : A,10;
kon_sym : A,10;
spc_sym : A,10;
spc_mes : F,2,0;
forma   : A,1; {D = dopredu, A = aktualne}
U_H : A,1;  { ucet=U, hotovost=H, mix=X }
ArcIntCis : A,1;
```

## ddruhy.dbf

```fand
D:A,20;
D_B:A,1;
OK:B;
ArcIntCis : A,1;
```

## ddruhtov.dbf

```fand
D:A,20;
D_B:A,1;
B:A,1;
DPH:F,2.1;
OK:B;
ArcIntCis : A,1;
```

## dobchody.dbf

```fand
KOD:F,5.0;
NAZOV:A,20;
MESTO:A,20;
SPOLU:F,6.2;
BEZ_DPH:F,6.2;
ArcIntCis : A,1;
```

## dtovary.dbf

```fand
KOD:F,5.0;
D:A,30;
MJ:A,3;
KOD_D:A,1;
DPH:F,2.1;
ArcIntCis : A,1;
                         JU              16.08.2026     strana:212
Typ Nazev
Text
```

## dnakup_o.dbf

```fand
KOD:F,6.0;
KOD_O:F,5.0;
DATUM:D,'DD.MM.YYYY';
TLAC:D,'DD.MM.YYYY';
SPOLU:F,6.2;
BEZ_DPH:F,6.2;
KTO:A,1;
ArcIntCis : A,1;
```

## dnakup_t.dbf

```fand
KOD:F,6.0;
KOD_O:F,5.0;
DATUM:D,'DD.MM.YYYY';
KOD_T:F,5.0;
CENA:F,6.2;
MNOZ:F,3.3;
DPH:F,2.1;
ArcIntCis : A,1;
```

## dteplo.dbf

```fand
{}
mr : D,'DD.MM.YYYY';
mo : D,'DD.MM.YYYY';

zac_ob : F,5,0;
kon_ob : F,5,0;
zac_ku : F,5,0;
kon_ku : F,5,0;
zac_sp : F,5,0;
kon_sp : F,5,0;
zac_de : F,5,0;
kon_de : F,5,0;
```

## dbaterie.dbf

```fand
kod : F,3,0;
oznac : A,3;
vyrobca : A,10;
typ     : A,3;   { AA, AAA}
mAh     : F,5,0;
kupene : D,'DD.MM.YYYY';
nabite : D,'DD.MM.YYYY';
kolky_krat : F,2,0;
kde_som : A,40;
von : B;

    pImport_Byt 

begin
{  merge(['#I1_ dbyt #O1_ byt']);
  merge(['#I1_ dvyucSSE #O1_ vyuctSSE']);
  merge(['#I1_ dvyucSPP #O1_ vyuctSPP']);
  merge(['#I1_ dinkaso #O1_ inkaso']);
  merge(['#I1_ dplatby #O1_ platby']);
  merge(['#I1_ ddruhy #O1_ druhdruh']);
  merge(['#I1_ ddruhtov #O1_ druhtova']);
  copyfile(druhtova, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, druhtova, nocancel);
  merge(['#I1_ dobchody #O1_ obchody']);
  copyfile(obchody, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, obchody, nocancel);
  merge(['#I1_ dtovary #O1_ tovary']);
  copyfile(tovary, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:213
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, tovary, nocancel);
  merge(['#I1_ dnakup_o #O1_ nakup_o']);
  merge(['#I1_ dnakup_t #O1_ nakup_t']); }
{
  merge(['#I1_ dokresy #O1_ okresy']);
  copyfile(okresy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, okresy, nocancel);
  merge(['#I1_ dkraje #O1_ kraje']);
  copyfile(kraje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kraje, nocancel); }

  copyfile(mesta, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='KL', nocancel);
  copyfile('b.txt'/var, mesta, nocancel);

end;


    ------------
```

## dbaterie.dbf

```fand
kod : F,3,0;
oznac : A,3;
vyrobca : A,10;
typ     : A,3;   { AA, AAA}
mAh     : F,5,0;
kupene : D,'DD.MM.YYYY';
nabite : D,'DD.MM.YYYY';
kolky_krat : F,2,0;
kde_som : A,40;
von : B;

    pImport_Byt 

begin
{  merge(['#I1_ dbyt #O1_ byt']);
  merge(['#I1_ dvyucSSE #O1_ vyuctSSE']);
  merge(['#I1_ dvyucSPP #O1_ vyuctSPP']);
  merge(['#I1_ dinkaso #O1_ inkaso']);
  merge(['#I1_ dplatby #O1_ platby']);
  merge(['#I1_ ddruhy #O1_ druhdruh']);
  merge(['#I1_ ddruhtov #O1_ druhtova']);
  copyfile(druhtova, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, druhtova, nocancel);
  merge(['#I1_ dobchody #O1_ obchody']);
  copyfile(obchody, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, obchody, nocancel);
  merge(['#I1_ dtovary #O1_ tovary']);
  copyfile(tovary, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:213
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, tovary, nocancel);
  merge(['#I1_ dnakup_o #O1_ nakup_o']);
  merge(['#I1_ dnakup_t #O1_ nakup_t']); }
{
  merge(['#I1_ dokresy #O1_ okresy']);
  copyfile(okresy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, okresy, nocancel);
  merge(['#I1_ dkraje #O1_ kraje']);
  copyfile(kraje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kraje, nocancel); }

  copyfile(mesta, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='KL', nocancel);
  copyfile('b.txt'/var, mesta, nocancel);

end;


    ------------
```

## dbaterie.dbf

```fand
kod : F,3,0;
oznac : A,3;
vyrobca : A,10;
typ     : A,3;   { AA, AAA}
mAh     : F,5,0;
kupene : D,'DD.MM.YYYY';
nabite : D,'DD.MM.YYYY';
kolky_krat : F,2,0;
kde_som : A,40;
von : B;

    pImport_Byt 

begin
{  merge(['#I1_ dbyt #O1_ byt']);
  merge(['#I1_ dvyucSSE #O1_ vyuctSSE']);
  merge(['#I1_ dvyucSPP #O1_ vyuctSPP']);
  merge(['#I1_ dinkaso #O1_ inkaso']);
  merge(['#I1_ dplatby #O1_ platby']);
  merge(['#I1_ ddruhy #O1_ druhdruh']);
  merge(['#I1_ ddruhtov #O1_ druhtova']);
  copyfile(druhtova, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, druhtova, nocancel);
  merge(['#I1_ dobchody #O1_ obchody']);
  copyfile(obchody, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, obchody, nocancel);
  merge(['#I1_ dtovary #O1_ tovary']);
  copyfile(tovary, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:213
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, tovary, nocancel);
  merge(['#I1_ dnakup_o #O1_ nakup_o']);
  merge(['#I1_ dnakup_t #O1_ nakup_t']); }
{
  merge(['#I1_ dokresy #O1_ okresy']);
  copyfile(okresy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, okresy, nocancel);
  merge(['#I1_ dkraje #O1_ kraje']);
  copyfile(kraje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kraje, nocancel); }

  copyfile(mesta, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='KL', nocancel);
  copyfile('b.txt'/var, mesta, nocancel);

end;


    ------------
```

## dcinnost.dbf

```fand
KODCIN:F,3.0;
CINNOS:A,60;
ArcIntCis : A,1;

    pImport_dbf 

var c,x:real; e,nazov:string; ju_adr : file [adresar : A,12; rok : A,4 ];
    ad : record of ju_adr;
begin proc(pSpRia,(17)); JU_path.path:=''; setkeybuf('\27');
  JU_path.path:=getpath; nazov := JU_path.path+'*.dbf';
  with window(60,20,78,20,@) do exec('', 'dir '+nazov+' > reports.txt',nocancel);
  if filesize('reports.txt')>0 then copyfile('reports.txt'/fix, ju_adr, nocancel);
  sort(ju_adr, (~adresar));
  merge(['#I1_ju_adr (copy(adresar,10,3)=''DBF'') #O1_ju_adr adresar:=trailchar('' '',copy(adresar,1,8))+''.''+copy(adresar,10,3)']);
{  edit(ju_adr,()); exit; }
{  forall x in ad % do begin
    for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
      forall c in Catalog % do begin
        Catalog[c].Cesta := 'e:\fand\ju\delf'+st &_ r(x,4,0)+'\'+trailchar(' ',Catalog[c].NazSouboru)+'.000';
        Catalog[c].Navesti := ' ';
      end; sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog; close;
      forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
        PD[y].vydaj:=p.kod; close;
      end;
    end;
 }

  merge(['#I1_ calendar #O1_ kalendar']);
  copyfile(kalendar, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kalendar, nocancel);
  merge(['#I1_ dauto #O1_ auto']);
  copyfile(auto, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, auto, nocancel);
  merge(['#I1_ dbanky #O1_ banky']);
  copyfile(banky, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, banky, nocancel);
  merge(['#I1_ dbyt #O1_ byt']);
  copyfile(byt, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:214
Typ Nazev
Text
  copyfile('b.txt'/var, byt, nocancel);
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'DEN_PRAC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\DEN_PRAC.000';
    ResetCatalog; exec('','copy dden'+str(x,4,0)+'.dbf ddenprac.dbf', nocancel);
    merge(['#I1_ ddenprac #O1_ den_prac']);
    copyfile(den_prac, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, den_prac, nocancel);
  end;
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  merge(['#I1_ ddoppros #O1_ doprpros']);
  copyfile(doprpros, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, doprpros, nocancel);
  merge(['#I1_ ddph #O1_ dph']);
  copyfile(dph, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, dph, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EZ') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EZ.000';
    ResetCatalog; exec('','copy deza'+str(x,4,0)+'.dbf devizak.dbf', nocancel);
    merge(['#I1_ devizak #O1_ ez']);
    copyfile(ez, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ez, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EVI_AUTO') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EVI_AUTO.000';
    ResetCatalog; exec('','copy devi'+str(x,4,0)+'.dbf deviauto.dbf', nocancel);
    merge(['#I1_ deviauto #O1_ evi_auto zaciatok:=valdate(I1.zaciatok,''hh:mm''); koniec:=valdate(I1.koniec,''hh:mm'')']);
    copyfile(evi_auto, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, evi_auto, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKDKP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKDKP.000';
    ResetCatalog; exec('','copy dikd'+str(x,4,0)+'.dbf dikdkp.dbf', nocancel);
    merge(['#I1_ dikdkp #O1_ ikdkp']);
    copyfile(ikdkp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikdkp, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKZP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKZP.000';
    ResetCatalog; exec('','copy dikz'+str(x,4,0)+'.dbf dikzp.dbf', nocancel);
    merge(['#I1_ dikzp #O1_ ikzp']);
    copyfile(ikzp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikzp, nocancel);
  end;
  merge(['#I1_ dkurzy #O1_ kurzy']);
  copyfile(kurzy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kurzy, nocancel);
  merge(['#I1_ dkp #O1_ kp']);
  copyfile(kp, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:215
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kp, nocancel);
  merge(['#I1_ dkppol #O1_ kppol']);
  copyfile(kppol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kppol, nocancel);
  merge(['#I1_ dkz #O1_ kz']);
  copyfile(kz, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kz, nocancel);
  merge(['#I1_ dkzpol #O1_ kzpol']);
  copyfile(kzpol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kzpol, nocancel);
  merge(['#I1_ dpartner #O1_ udajo']);
  copyfile(udajo, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udajo, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PD') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PD.000';
    ResetCatalog; exec('','copy dpd_'+str(x,4,0)+'.dbf dpd.dbf', nocancel);
    merge(['#I1_ dpd #O1_ pd']);
    copyfile(pd, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pd, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PV') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PV.000';
    ResetCatalog; exec('','copy dpoc'+str(x,4,0)+'.dbf dpocstav.dbf', nocancel);
    merge(['#I1_ dpocstav #O1_ pv']);
    copyfile(pv, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pv, nocancel);
  end;
  merge(['#I1_ dpokdokl #O1_ pokldokl']);
  copyfile(pokldokl, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, pokldokl, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'SC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\SC.000';
    ResetCatalog; exec('','copy dsc_'+str(x,4,0)+'.dbf dsc.dbf', nocancel);
    merge(['#I1_ dsc #O1_ sc zaciatoh:=valdate(I1.zaciatoh,''hh:mm''); konieh:=valdate(I1.konieh,''hh:mm'')']);
    copyfile(sc, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, sc, nocancel);
  end;
  merge(['#I1_ dsklad #O1_ sklad']);
  copyfile(sklad, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sklad, nocancel);
  merge(['#I1_ dspotreb #O1_ spotreba']);
  copyfile(spotreba, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, spotreba, nocancel);
  merge(['#I1_ dsumapd #O1_ sumapd']);
  copyfile(sumapd, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sumapd, nocancel);
  merge(['#I1_ ducet #O1_ ucet']);
  copyfile(ucet, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, ucet, nocancel);
  merge(['#I1_ ducty #O1_ ucty']);
  copyfile(ucty, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:216
Typ Nazev
Text
  copyfile('b.txt'/var, ucty, nocancel);
  merge(['#I1_ dudaje #O1_ udaje']);
  copyfile(udaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udaje, nocancel);
  merge(['#I1_ duhrady #O1_ uhrady']);
  copyfile(uhrady, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, uhrady, nocancel);
  merge(['#I1_ dvydaje #O1_ vydaje']);
  copyfile(vydaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, vydaje, nocancel);

{   DDEN1991 { ddenprac } DEVI1991 { deviauto }  DEZA1991 { devizak }
    DIKD1991 { dikdkp }   DIKZ1991 { dikzp }     DPD_1991 { dpd }
    DPOC1991 { dpocstav } DSC_1991 { dsc }
}
{   DDRUHTOV    DDRUHY     DINKASO    DKRAJE    DLEASING    DMESTA
    DNAKUP_O    DNAKUP_T   DOBCHODY   DOKRESY   DPLATBY     DPOISTKY
    DPOI_VNE    DTOVARY    DUCETIMP   DVYUCSBD  DVYUCSPP    DVYUCSSE
    VYROCIA }
exit;
  sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog;
  for x:=1 to ju_adr.nrecs do begin   end;
  ju_adr.nrecs:=0; Catalog[1].Cesta := nazov+'DELFZALO\delf_ju';
  ResetCatalog; proc(pSpRia,(-1));
end;


    pPrevod_KL  

begin
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
{ copyfile('a0.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a0.txt', nocancel);
  copyfile('a1.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a1.txt', nocancel);
  copyfile('a2.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a2.txt', nocancel);
  copyfile('a3.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a3.txt', nocancel);
  copyfile('a4.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a4.txt', nocancel); }
end;

    ------------
```

## dcinnost.dbf

```fand
KODCIN:F,3.0;
CINNOS:A,60;
ArcIntCis : A,1;

    pImport_dbf 

var c,x:real; e,nazov:string; ju_adr : file [adresar : A,12; rok : A,4 ];
    ad : record of ju_adr;
begin proc(pSpRia,(17)); JU_path.path:=''; setkeybuf('\27');
  JU_path.path:=getpath; nazov := JU_path.path+'*.dbf';
  with window(60,20,78,20,@) do exec('', 'dir '+nazov+' > reports.txt',nocancel);
  if filesize('reports.txt')>0 then copyfile('reports.txt'/fix, ju_adr, nocancel);
  sort(ju_adr, (~adresar));
  merge(['#I1_ju_adr (copy(adresar,10,3)=''DBF'') #O1_ju_adr adresar:=trailchar('' '',copy(adresar,1,8))+''.''+copy(adresar,10,3)']);
{  edit(ju_adr,()); exit; }
{  forall x in ad % do begin
    for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
      forall c in Catalog % do begin
        Catalog[c].Cesta := 'e:\fand\ju\delf'+st &_ r(x,4,0)+'\'+trailchar(' ',Catalog[c].NazSouboru)+'.000';
        Catalog[c].Navesti := ' ';
      end; sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog; close;
      forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
        PD[y].vydaj:=p.kod; close;
      end;
    end;
 }

  merge(['#I1_ calendar #O1_ kalendar']);
  copyfile(kalendar, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kalendar, nocancel);
  merge(['#I1_ dauto #O1_ auto']);
  copyfile(auto, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, auto, nocancel);
  merge(['#I1_ dbanky #O1_ banky']);
  copyfile(banky, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, banky, nocancel);
  merge(['#I1_ dbyt #O1_ byt']);
  copyfile(byt, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:214
Typ Nazev
Text
  copyfile('b.txt'/var, byt, nocancel);
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'DEN_PRAC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\DEN_PRAC.000';
    ResetCatalog; exec('','copy dden'+str(x,4,0)+'.dbf ddenprac.dbf', nocancel);
    merge(['#I1_ ddenprac #O1_ den_prac']);
    copyfile(den_prac, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, den_prac, nocancel);
  end;
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  merge(['#I1_ ddoppros #O1_ doprpros']);
  copyfile(doprpros, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, doprpros, nocancel);
  merge(['#I1_ ddph #O1_ dph']);
  copyfile(dph, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, dph, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EZ') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EZ.000';
    ResetCatalog; exec('','copy deza'+str(x,4,0)+'.dbf devizak.dbf', nocancel);
    merge(['#I1_ devizak #O1_ ez']);
    copyfile(ez, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ez, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EVI_AUTO') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EVI_AUTO.000';
    ResetCatalog; exec('','copy devi'+str(x,4,0)+'.dbf deviauto.dbf', nocancel);
    merge(['#I1_ deviauto #O1_ evi_auto zaciatok:=valdate(I1.zaciatok,''hh:mm''); koniec:=valdate(I1.koniec,''hh:mm'')']);
    copyfile(evi_auto, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, evi_auto, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKDKP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKDKP.000';
    ResetCatalog; exec('','copy dikd'+str(x,4,0)+'.dbf dikdkp.dbf', nocancel);
    merge(['#I1_ dikdkp #O1_ ikdkp']);
    copyfile(ikdkp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikdkp, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKZP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKZP.000';
    ResetCatalog; exec('','copy dikz'+str(x,4,0)+'.dbf dikzp.dbf', nocancel);
    merge(['#I1_ dikzp #O1_ ikzp']);
    copyfile(ikzp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikzp, nocancel);
  end;
  merge(['#I1_ dkurzy #O1_ kurzy']);
  copyfile(kurzy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kurzy, nocancel);
  merge(['#I1_ dkp #O1_ kp']);
  copyfile(kp, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:215
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kp, nocancel);
  merge(['#I1_ dkppol #O1_ kppol']);
  copyfile(kppol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kppol, nocancel);
  merge(['#I1_ dkz #O1_ kz']);
  copyfile(kz, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kz, nocancel);
  merge(['#I1_ dkzpol #O1_ kzpol']);
  copyfile(kzpol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kzpol, nocancel);
  merge(['#I1_ dpartner #O1_ udajo']);
  copyfile(udajo, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udajo, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PD') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PD.000';
    ResetCatalog; exec('','copy dpd_'+str(x,4,0)+'.dbf dpd.dbf', nocancel);
    merge(['#I1_ dpd #O1_ pd']);
    copyfile(pd, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pd, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PV') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PV.000';
    ResetCatalog; exec('','copy dpoc'+str(x,4,0)+'.dbf dpocstav.dbf', nocancel);
    merge(['#I1_ dpocstav #O1_ pv']);
    copyfile(pv, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pv, nocancel);
  end;
  merge(['#I1_ dpokdokl #O1_ pokldokl']);
  copyfile(pokldokl, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, pokldokl, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'SC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\SC.000';
    ResetCatalog; exec('','copy dsc_'+str(x,4,0)+'.dbf dsc.dbf', nocancel);
    merge(['#I1_ dsc #O1_ sc zaciatoh:=valdate(I1.zaciatoh,''hh:mm''); konieh:=valdate(I1.konieh,''hh:mm'')']);
    copyfile(sc, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, sc, nocancel);
  end;
  merge(['#I1_ dsklad #O1_ sklad']);
  copyfile(sklad, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sklad, nocancel);
  merge(['#I1_ dspotreb #O1_ spotreba']);
  copyfile(spotreba, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, spotreba, nocancel);
  merge(['#I1_ dsumapd #O1_ sumapd']);
  copyfile(sumapd, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sumapd, nocancel);
  merge(['#I1_ ducet #O1_ ucet']);
  copyfile(ucet, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, ucet, nocancel);
  merge(['#I1_ ducty #O1_ ucty']);
  copyfile(ucty, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:216
Typ Nazev
Text
  copyfile('b.txt'/var, ucty, nocancel);
  merge(['#I1_ dudaje #O1_ udaje']);
  copyfile(udaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udaje, nocancel);
  merge(['#I1_ duhrady #O1_ uhrady']);
  copyfile(uhrady, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, uhrady, nocancel);
  merge(['#I1_ dvydaje #O1_ vydaje']);
  copyfile(vydaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, vydaje, nocancel);

{   DDEN1991 { ddenprac } DEVI1991 { deviauto }  DEZA1991 { devizak }
    DIKD1991 { dikdkp }   DIKZ1991 { dikzp }     DPD_1991 { dpd }
    DPOC1991 { dpocstav } DSC_1991 { dsc }
}
{   DDRUHTOV    DDRUHY     DINKASO    DKRAJE    DLEASING    DMESTA
    DNAKUP_O    DNAKUP_T   DOBCHODY   DOKRESY   DPLATBY     DPOISTKY
    DPOI_VNE    DTOVARY    DUCETIMP   DVYUCSBD  DVYUCSPP    DVYUCSSE
    VYROCIA }
exit;
  sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog;
  for x:=1 to ju_adr.nrecs do begin   end;
  ju_adr.nrecs:=0; Catalog[1].Cesta := nazov+'DELFZALO\delf_ju';
  ResetCatalog; proc(pSpRia,(-1));
end;


    pPrevod_KL  

begin
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
{ copyfile('a0.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a0.txt', nocancel);
  copyfile('a1.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a1.txt', nocancel);
  copyfile('a2.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a2.txt', nocancel);
  copyfile('a3.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a3.txt', nocancel);
  copyfile('a4.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a4.txt', nocancel); }
end;

    ------------
```

## dcinnost.dbf

```fand
KODCIN:F,3.0;
CINNOS:A,60;
ArcIntCis : A,1;

    pImport_dbf 

var c,x:real; e,nazov:string; ju_adr : file [adresar : A,12; rok : A,4 ];
    ad : record of ju_adr;
begin proc(pSpRia,(17)); JU_path.path:=''; setkeybuf('\27');
  JU_path.path:=getpath; nazov := JU_path.path+'*.dbf';
  with window(60,20,78,20,@) do exec('', 'dir '+nazov+' > reports.txt',nocancel);
  if filesize('reports.txt')>0 then copyfile('reports.txt'/fix, ju_adr, nocancel);
  sort(ju_adr, (~adresar));
  merge(['#I1_ju_adr (copy(adresar,10,3)=''DBF'') #O1_ju_adr adresar:=trailchar('' '',copy(adresar,1,8))+''.''+copy(adresar,10,3)']);
{  edit(ju_adr,()); exit; }
{  forall x in ad % do begin
    for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
      forall c in Catalog % do begin
        Catalog[c].Cesta := 'e:\fand\ju\delf'+st &_ r(x,4,0)+'\'+trailchar(' ',Catalog[c].NazSouboru)+'.000';
        Catalog[c].Navesti := ' ';
      end; sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog; close;
      forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
        PD[y].vydaj:=p.kod; close;
      end;
    end;
 }

  merge(['#I1_ calendar #O1_ kalendar']);
  copyfile(kalendar, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kalendar, nocancel);
  merge(['#I1_ dauto #O1_ auto']);
  copyfile(auto, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, auto, nocancel);
  merge(['#I1_ dbanky #O1_ banky']);
  copyfile(banky, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, banky, nocancel);
  merge(['#I1_ dbyt #O1_ byt']);
  copyfile(byt, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:214
Typ Nazev
Text
  copyfile('b.txt'/var, byt, nocancel);
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'DEN_PRAC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\DEN_PRAC.000';
    ResetCatalog; exec('','copy dden'+str(x,4,0)+'.dbf ddenprac.dbf', nocancel);
    merge(['#I1_ ddenprac #O1_ den_prac']);
    copyfile(den_prac, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, den_prac, nocancel);
  end;
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  merge(['#I1_ ddoppros #O1_ doprpros']);
  copyfile(doprpros, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, doprpros, nocancel);
  merge(['#I1_ ddph #O1_ dph']);
  copyfile(dph, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, dph, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EZ') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EZ.000';
    ResetCatalog; exec('','copy deza'+str(x,4,0)+'.dbf devizak.dbf', nocancel);
    merge(['#I1_ devizak #O1_ ez']);
    copyfile(ez, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ez, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EVI_AUTO') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EVI_AUTO.000';
    ResetCatalog; exec('','copy devi'+str(x,4,0)+'.dbf deviauto.dbf', nocancel);
    merge(['#I1_ deviauto #O1_ evi_auto zaciatok:=valdate(I1.zaciatok,''hh:mm''); koniec:=valdate(I1.koniec,''hh:mm'')']);
    copyfile(evi_auto, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, evi_auto, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKDKP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKDKP.000';
    ResetCatalog; exec('','copy dikd'+str(x,4,0)+'.dbf dikdkp.dbf', nocancel);
    merge(['#I1_ dikdkp #O1_ ikdkp']);
    copyfile(ikdkp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikdkp, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKZP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKZP.000';
    ResetCatalog; exec('','copy dikz'+str(x,4,0)+'.dbf dikzp.dbf', nocancel);
    merge(['#I1_ dikzp #O1_ ikzp']);
    copyfile(ikzp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikzp, nocancel);
  end;
  merge(['#I1_ dkurzy #O1_ kurzy']);
  copyfile(kurzy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kurzy, nocancel);
  merge(['#I1_ dkp #O1_ kp']);
  copyfile(kp, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:215
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kp, nocancel);
  merge(['#I1_ dkppol #O1_ kppol']);
  copyfile(kppol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kppol, nocancel);
  merge(['#I1_ dkz #O1_ kz']);
  copyfile(kz, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kz, nocancel);
  merge(['#I1_ dkzpol #O1_ kzpol']);
  copyfile(kzpol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kzpol, nocancel);
  merge(['#I1_ dpartner #O1_ udajo']);
  copyfile(udajo, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udajo, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PD') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PD.000';
    ResetCatalog; exec('','copy dpd_'+str(x,4,0)+'.dbf dpd.dbf', nocancel);
    merge(['#I1_ dpd #O1_ pd']);
    copyfile(pd, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pd, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PV') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PV.000';
    ResetCatalog; exec('','copy dpoc'+str(x,4,0)+'.dbf dpocstav.dbf', nocancel);
    merge(['#I1_ dpocstav #O1_ pv']);
    copyfile(pv, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pv, nocancel);
  end;
  merge(['#I1_ dpokdokl #O1_ pokldokl']);
  copyfile(pokldokl, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, pokldokl, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'SC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\SC.000';
    ResetCatalog; exec('','copy dsc_'+str(x,4,0)+'.dbf dsc.dbf', nocancel);
    merge(['#I1_ dsc #O1_ sc zaciatoh:=valdate(I1.zaciatoh,''hh:mm''); konieh:=valdate(I1.konieh,''hh:mm'')']);
    copyfile(sc, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, sc, nocancel);
  end;
  merge(['#I1_ dsklad #O1_ sklad']);
  copyfile(sklad, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sklad, nocancel);
  merge(['#I1_ dspotreb #O1_ spotreba']);
  copyfile(spotreba, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, spotreba, nocancel);
  merge(['#I1_ dsumapd #O1_ sumapd']);
  copyfile(sumapd, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sumapd, nocancel);
  merge(['#I1_ ducet #O1_ ucet']);
  copyfile(ucet, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, ucet, nocancel);
  merge(['#I1_ ducty #O1_ ucty']);
  copyfile(ucty, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:216
Typ Nazev
Text
  copyfile('b.txt'/var, ucty, nocancel);
  merge(['#I1_ dudaje #O1_ udaje']);
  copyfile(udaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udaje, nocancel);
  merge(['#I1_ duhrady #O1_ uhrady']);
  copyfile(uhrady, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, uhrady, nocancel);
  merge(['#I1_ dvydaje #O1_ vydaje']);
  copyfile(vydaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, vydaje, nocancel);

{   DDEN1991 { ddenprac } DEVI1991 { deviauto }  DEZA1991 { devizak }
    DIKD1991 { dikdkp }   DIKZ1991 { dikzp }     DPD_1991 { dpd }
    DPOC1991 { dpocstav } DSC_1991 { dsc }
}
{   DDRUHTOV    DDRUHY     DINKASO    DKRAJE    DLEASING    DMESTA
    DNAKUP_O    DNAKUP_T   DOBCHODY   DOKRESY   DPLATBY     DPOISTKY
    DPOI_VNE    DTOVARY    DUCETIMP   DVYUCSBD  DVYUCSPP    DVYUCSSE
    VYROCIA }
exit;
  sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog;
  for x:=1 to ju_adr.nrecs do begin   end;
  ju_adr.nrecs:=0; Catalog[1].Cesta := nazov+'DELFZALO\delf_ju';
  ResetCatalog; proc(pSpRia,(-1));
end;


    pPrevod_KL  

begin
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
{ copyfile('a0.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a0.txt', nocancel);
  copyfile('a1.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a1.txt', nocancel);
  copyfile('a2.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a2.txt', nocancel);
  copyfile('a3.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a3.txt', nocancel);
  copyfile('a4.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a4.txt', nocancel); }
end;

    ------------
```

## dcinnost.dbf

```fand
KODCIN:F,3.0;
CINNOS:A,60;
ArcIntCis : A,1;

    pImport_dbf 

var c,x:real; e,nazov:string; ju_adr : file [adresar : A,12; rok : A,4 ];
    ad : record of ju_adr;
begin proc(pSpRia,(17)); JU_path.path:=''; setkeybuf('\27');
  JU_path.path:=getpath; nazov := JU_path.path+'*.dbf';
  with window(60,20,78,20,@) do exec('', 'dir '+nazov+' > reports.txt',nocancel);
  if filesize('reports.txt')>0 then copyfile('reports.txt'/fix, ju_adr, nocancel);
  sort(ju_adr, (~adresar));
  merge(['#I1_ju_adr (copy(adresar,10,3)=''DBF'') #O1_ju_adr adresar:=trailchar('' '',copy(adresar,1,8))+''.''+copy(adresar,10,3)']);
{  edit(ju_adr,()); exit; }
{  forall x in ad % do begin
    for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
      forall c in Catalog % do begin
        Catalog[c].Cesta := 'e:\fand\ju\delf'+st &_ r(x,4,0)+'\'+trailchar(' ',Catalog[c].NazSouboru)+'.000';
        Catalog[c].Navesti := ' ';
      end; sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog; close;
      forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
        PD[y].vydaj:=p.kod; close;
      end;
    end;
 }

  merge(['#I1_ calendar #O1_ kalendar']);
  copyfile(kalendar, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kalendar, nocancel);
  merge(['#I1_ dauto #O1_ auto']);
  copyfile(auto, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, auto, nocancel);
  merge(['#I1_ dbanky #O1_ banky']);
  copyfile(banky, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, banky, nocancel);
  merge(['#I1_ dbyt #O1_ byt']);
  copyfile(byt, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:214
Typ Nazev
Text
  copyfile('b.txt'/var, byt, nocancel);
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'DEN_PRAC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\DEN_PRAC.000';
    ResetCatalog; exec('','copy dden'+str(x,4,0)+'.dbf ddenprac.dbf', nocancel);
    merge(['#I1_ ddenprac #O1_ den_prac']);
    copyfile(den_prac, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, den_prac, nocancel);
  end;
  merge(['#I1_ dcinnost #O1_ cinnosti']);
  copyfile(cinnosti, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, cinnosti, nocancel);
  merge(['#I1_ ddoppros #O1_ doprpros']);
  copyfile(doprpros, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, doprpros, nocancel);
  merge(['#I1_ ddph #O1_ dph']);
  copyfile(dph, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, dph, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EZ') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EZ.000';
    ResetCatalog; exec('','copy deza'+str(x,4,0)+'.dbf devizak.dbf', nocancel);
    merge(['#I1_ devizak #O1_ ez']);
    copyfile(ez, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ez, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'EVI_AUTO') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\EVI_AUTO.000';
    ResetCatalog; exec('','copy devi'+str(x,4,0)+'.dbf deviauto.dbf', nocancel);
    merge(['#I1_ deviauto #O1_ evi_auto zaciatok:=valdate(I1.zaciatok,''hh:mm''); koniec:=valdate(I1.koniec,''hh:mm'')']);
    copyfile(evi_auto, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, evi_auto, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKDKP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKDKP.000';
    ResetCatalog; exec('','copy dikd'+str(x,4,0)+'.dbf dikdkp.dbf', nocancel);
    merge(['#I1_ dikdkp #O1_ ikdkp']);
    copyfile(ikdkp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikdkp, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'IKZP') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\IKZP.000';
    ResetCatalog; exec('','copy dikz'+str(x,4,0)+'.dbf dikzp.dbf', nocancel);
    merge(['#I1_ dikzp #O1_ ikzp']);
    copyfile(ikzp, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, ikzp, nocancel);
  end;
  merge(['#I1_ dkurzy #O1_ kurzy']);
  copyfile(kurzy, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kurzy, nocancel);
  merge(['#I1_ dkp #O1_ kp']);
  copyfile(kp, 'a.txt'/var, nocancel);
                         JU              16.08.2026     strana:215
Typ Nazev
Text
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kp, nocancel);
  merge(['#I1_ dkppol #O1_ kppol']);
  copyfile(kppol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kppol, nocancel);
  merge(['#I1_ dkz #O1_ kz']);
  copyfile(kz, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kz, nocancel);
  merge(['#I1_ dkzpol #O1_ kzpol']);
  copyfile(kzpol, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, kzpol, nocancel);
  merge(['#I1_ dpartner #O1_ udajo']);
  copyfile(udajo, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udajo, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PD') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PD.000';
    ResetCatalog; exec('','copy dpd_'+str(x,4,0)+'.dbf dpd.dbf', nocancel);
    merge(['#I1_ dpd #O1_ pd']);
    copyfile(pd, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pd, nocancel);
  end;
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'PV') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\PV.000';
    ResetCatalog; exec('','copy dpoc'+str(x,4,0)+'.dbf dpocstav.dbf', nocancel);
    merge(['#I1_ dpocstav #O1_ pv']);
    copyfile(pv, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, pv, nocancel);
  end;
  merge(['#I1_ dpokdokl #O1_ pokldokl']);
  copyfile(pokldokl, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, pokldokl, nocancel);
  for x := 1991 to val(strdate(today,'YYYY')) do begin writeln(x:4);
    forall c in Catalog (upcase(NazSouboru)=~'SC') % do
      Catalog[c].Cesta := 'e:\fand\ju\delf'+str(x,4,0)+'\SC.000';
    ResetCatalog; exec('','copy dsc_'+str(x,4,0)+'.dbf dsc.dbf', nocancel);
    merge(['#I1_ dsc #O1_ sc zaciatoh:=valdate(I1.zaciatoh,''hh:mm''); konieh:=valdate(I1.konieh,''hh:mm'')']);
    copyfile(sc, 'a.txt'/var, nocancel);
    copyfile('a.txt', 'b.txt', mode='WL', nocancel);
    copyfile('b.txt'/var, sc, nocancel);
  end;
  merge(['#I1_ dsklad #O1_ sklad']);
  copyfile(sklad, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sklad, nocancel);
  merge(['#I1_ dspotreb #O1_ spotreba']);
  copyfile(spotreba, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, spotreba, nocancel);
  merge(['#I1_ dsumapd #O1_ sumapd']);
  copyfile(sumapd, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, sumapd, nocancel);
  merge(['#I1_ ducet #O1_ ucet']);
  copyfile(ucet, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, ucet, nocancel);
  merge(['#I1_ ducty #O1_ ucty']);
  copyfile(ucty, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
                         JU              16.08.2026     strana:216
Typ Nazev
Text
  copyfile('b.txt'/var, ucty, nocancel);
  merge(['#I1_ dudaje #O1_ udaje']);
  copyfile(udaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, udaje, nocancel);
  merge(['#I1_ duhrady #O1_ uhrady']);
  copyfile(uhrady, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, uhrady, nocancel);
  merge(['#I1_ dvydaje #O1_ vydaje']);
  copyfile(vydaje, 'a.txt'/var, nocancel);
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
  copyfile('b.txt'/var, vydaje, nocancel);

{   DDEN1991 { ddenprac } DEVI1991 { deviauto }  DEZA1991 { devizak }
    DIKD1991 { dikdkp }   DIKZ1991 { dikzp }     DPD_1991 { dpd }
    DPOC1991 { dpocstav } DSC_1991 { dsc }
}
{   DDRUHTOV    DDRUHY     DINKASO    DKRAJE    DLEASING    DMESTA
    DNAKUP_O    DNAKUP_T   DOBCHODY   DOKRESY   DPLATBY     DPOISTKY
    DPOI_VNE    DTOVARY    DUCETIMP   DVYUCSBD  DVYUCSPP    DVYUCSSE
    VYROCIA }
exit;
  sort(Catalog, (~NazUlohy,~NazSouboru)); ResetCatalog;
  for x:=1 to ju_adr.nrecs do begin   end;
  ju_adr.nrecs:=0; Catalog[1].Cesta := nazov+'DELFZALO\delf_ju';
  ResetCatalog; proc(pSpRia,(-1));
end;


    pPrevod_KL  

begin
  copyfile('a.txt', 'b.txt', mode='WL', nocancel);
{ copyfile('a0.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a0.txt', nocancel);
  copyfile('a1.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a1.txt', nocancel);
  copyfile('a2.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a2.txt', nocancel);
  copyfile('a3.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a3.txt', nocancel);
  copyfile('a4.txt', 'a.txt', mode='LK', nocancel);
  copyfile('a.txt', 'a4.txt', nocancel); }
end;

    ------------
```

## vystav.dbf

```fand
{ziskane z delf_sw.wls}

od:A,34;
z:F,12.0;
a:D,'DD.MM.YYYY';
Ds:D;
Tovar:B;
n:A,38;
```

## zav2003.dbf

```fand
A:D;
B:A,11;
C:A,36;
D:F,13.0;
E:F,9.2;
T:A,6;
G:F,8.2;
```
