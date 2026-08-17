# Verified MERGE Objects (M* Objects)

## mHelp

```fand
#I1_help
#O1_help
```

## m1

```fand
{}
#I1_ PD ! {(r)} Datum
#O1_ Ekonom PrijemC := a5; VydajC := a6; PrijemP := a18; VydajP := a19;
{  a5  := I1.a5;                                { Rozpis v?davkov ŮŮŮŮŮŮŮŮŮŮŮŮ× }
   a6  := I1.a6;                                {                             - }}
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   Ů+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          Ů+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. rÚoia - ine           - }
PrReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. rÚoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. rÚoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. rÚoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 Ů+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       Ů+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      Ů+ }
DanZPri := cond(I1.vydaj ='8' : I1.a2 + I1.a4);  { Dan z prijmu podnikatela   Ů+ }
OsUcet  := cond(I1.vydaj ='3' : I1.a2 + I1.a4);  { Osobny ucet podnikatela    Ů+ }
DPH     := cond(I1.vydaj ='d' : I1.a2 + I1.a4);  { DPH                        Ů- }

Reklam  := cond(I1.vydaj ='R' : I1.a1 + I1.a3);
Sluzby  := cond(I1.vydaj ='S' : I1.a1 + I1.a3);
Tovary  := cond(I1.vydaj ='T' : I1.a1 + I1.a3);
TovSlu  := cond(I1.vydaj ='Q' : I1.a1 + I1.a3);
Osobuc  := cond(I1.vydaj ='V' : I1.a1 + I1.a3);
Poist   := cond(I1.vydaj ='X' : I1.a1 + I1.a3);
Zaloha  := cond(I1.vydaj ='Z' : I1.a1 + I1.a3);

                
{ ekonom }


#I1_ PD
#O1_ Ekonom PríjemC := a5; V?dajC := a6; PríjemP := a18; V?dajP := a19;
{  a5  := I1.a5;                                { Rozpis v?davkov ────────────ž }
   a6  := I1.a6;                                {                             - }}
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   ─+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          ─+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. réoia - ine           - }
Pr ?_ ReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. réoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. réoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. réoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 ─+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       ─+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      ─+ }
DanZPri : _ = cond(I1.vydaj ='8' : I1.a2 + I1.a4);  { Dan z prijmu podnikatela   ─+ }
OsUcet  := cond(I1.vydaj ='3' : I1.a2 + I1.a4);  { Osobny ucet podnikatela    ─+ }
DPH     := cond(I1.vydaj ='d' : I1.a2 + I1.a4);  { DPH                        ─- }

Reklam  := cond(I1.vydaj ='R' : I1.a1 + I1.a3);
Sluoby  := cond(I1.vydaj ='S' : I1.a1 + I1.a3);
Tovary  := cond(I1.vydaj ='T' : I1.a1 + I1.a3);
Osob?f  := cond(I1.vydaj ='V' : I1.a1 + I1.a3);
PoisL   := cond(I1.vydaj ='X' : I1.a1 + I1.a3);
Záloha  := cond(I1 1_ .vydaj ='Z' : I1.a1 + I1.a3);




var a, b : real = 0;
#I1_ Ekonom ! Mesiac
                         JU              16.08.2026     strana: 55
Typ Nazev
Text
#O_ Ekonom PríjemC := sum(PríjemC);
                a := a + sum(PríjemC);
            V?dajC := sum(V?dajC);
                b := b + sum(V?dajC);
           Celkom := cond(sum(PríjemC) - sum(V?dajC)>=0:
                          sum(PríjemC) - sum(V?dajC),else:0);
            Spolu := cond(a - b<0 : 0, else : a - b);
           DrHaNM  := sum(DrHaNM );
           Poistne := sum(Poistne);
           PrevRez := sum(PrevRez);
           PrReAut  -_ := sum(PrReAut);
           PrReSC  := sum(PrReSC );
           PrReBan := sum(PrReBan);
           PHM_SC  := sum(PHM_SC );
           HaN_IM  := sum(HaN_IM );
           Tovar   := sum(Tovar  );
           DanZPri := sum(DanZPri);
           OsUcet  := sum(OsUcet );
           DPH     := sum(DPH    );
           Reklam  := sum(Reklam );
           Tovary  := sum(Tovary );
           Sluoby  := sum(Sluoby );
           Osob?f  := sum(Osob?f );
           PoisL   := sum(PoisL  );
           Záloha  := sum(Záloha );




{}
var a,b,bb : string; c,d,e,f,g : real=1;
begin d:=0; f:=0; Mesiace.nrecs := 0; c := recnoabs( PD, 1 );
  a := strdate( PD[c].a, 'DD.MM.YYYY');
  PARAM.Dat1 := valdate(copy(a,4,7), 'MM.YYYY'); PARAM.Dat2 := PARAM.Dat1;
  while PARAM.Dat2 < today do begin appendrec(Mesiace);
    Mesiace[Mesiace.nrecs].Datum := PARAM.Dat2;
    PARAM.Dat2 := addmonth(PARAM.Dat2,1);
  end;
  repeat
    bb:= strdate(Mesiace[1].Datum,'MM.YY')+'-'+strdate(Mesiace[Mesiace.nrecs].Datum,'MM.YY');
    a := strdate(t ?_ oday,'DD.MM.YYYY'); merge(m1);
    if PV.nrecs>0 then begin { appendrec(Ekonom);
      Ekonom[Ekonom.nrecs].Datum:=valdate('01.'+strdate(ParamCat.Rok,'YYYY'),'MM.YYYY');
      Ekonom[Ekonom.nrecs].PríjemC:=PV[1].ph+PV[1].pu; }
    end; merge(m2);
    graph(Ekonom, (Mesiac, Tovary, Sluoby,
                   Osob?f, PoisL, Záloha, Reklam), TYPE='stackbar',
          FILL='m2', DIRX='i', GRID='h', min=-1, max=-1,
          TXT=(2,2,1,'a',' Príjmy '{+str(SpotPrie.Km,8,2)+' Priemer : '+str(SpotPrie. ?_ Km div Mesiace.nrecs,8,2)+' / 1mes.'}),
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y');
    graph(Ekonom, (Mesiac, {DrHaNM,} Tovar, PrevRez, PrReAut, PrReSC,
                  {PrReBan,} PHM_SC, DanZPri, OsUcet, DPH, Poistne, HaN_IM),
          TYPE='stackbar', FILL='m2', DIRX='i', GRID='h', min=-1, max=-1,
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y');
    graph(Ekonom, (Mesiac, PríjemC, V?dajC, Celkom, Spolu), TYPE='groupline',
          FILL='m2', DIRX= ─_ 'i', GRID='h', min=-1, max=-1,
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y'); exit;
  until f=0;
end;
```

## m1

```fand
{}
#I1_ PD ! {(r)} Datum
#O1_ Ekonom PrijemC := a5; VydajC := a6; PrijemP := a18; VydajP := a19;
{  a5  := I1.a5;                                { Rozpis v?davkov ŮŮŮŮŮŮŮŮŮŮŮŮ× }
   a6  := I1.a6;                                {                             - }}
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   Ů+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          Ů+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. rÚoia - ine           - }
PrReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. rÚoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. rÚoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. rÚoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 Ů+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       Ů+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      Ů+ }
DanZPri := cond(I1.vydaj ='8' : I1.a2 + I1.a4);  { Dan z prijmu podnikatela   Ů+ }
OsUcet  := cond(I1.vydaj ='3' : I1.a2 + I1.a4);  { Osobny ucet podnikatela    Ů+ }
DPH     := cond(I1.vydaj ='d' : I1.a2 + I1.a4);  { DPH                        Ů- }

Reklam  := cond(I1.vydaj ='R' : I1.a1 + I1.a3);
Sluzby  := cond(I1.vydaj ='S' : I1.a1 + I1.a3);
Tovary  := cond(I1.vydaj ='T' : I1.a1 + I1.a3);
TovSlu  := cond(I1.vydaj ='Q' : I1.a1 + I1.a3);
Osobuc  := cond(I1.vydaj ='V' : I1.a1 + I1.a3);
Poist   := cond(I1.vydaj ='X' : I1.a1 + I1.a3);
Zaloha  := cond(I1.vydaj ='Z' : I1.a1 + I1.a3);

                
{ ekonom }


#I1_ PD
#O1_ Ekonom PríjemC := a5; V?dajC := a6; PríjemP := a18; V?dajP := a19;
{  a5  := I1.a5;                                { Rozpis v?davkov ────────────ž }
   a6  := I1.a6;                                {                             - }}
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   ─+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          ─+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. réoia - ine           - }
Pr ?_ ReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. réoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. réoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. réoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 ─+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       ─+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      ─+ }
DanZPri : _ = cond(I1.vydaj ='8' : I1.a2 + I1.a4);  { Dan z prijmu podnikatela   ─+ }
OsUcet  := cond(I1.vydaj ='3' : I1.a2 + I1.a4);  { Osobny ucet podnikatela    ─+ }
DPH     := cond(I1.vydaj ='d' : I1.a2 + I1.a4);  { DPH                        ─- }

Reklam  := cond(I1.vydaj ='R' : I1.a1 + I1.a3);
Sluoby  := cond(I1.vydaj ='S' : I1.a1 + I1.a3);
Tovary  := cond(I1.vydaj ='T' : I1.a1 + I1.a3);
Osob?f  := cond(I1.vydaj ='V' : I1.a1 + I1.a3);
PoisL   := cond(I1.vydaj ='X' : I1.a1 + I1.a3);
Záloha  := cond(I1 1_ .vydaj ='Z' : I1.a1 + I1.a3);




var a, b : real = 0;
#I1_ Ekonom ! Mesiac
                         JU              16.08.2026     strana: 55
Typ Nazev
Text
#O_ Ekonom PríjemC := sum(PríjemC);
                a := a + sum(PríjemC);
            V?dajC := sum(V?dajC);
                b := b + sum(V?dajC);
           Celkom := cond(sum(PríjemC) - sum(V?dajC)>=0:
                          sum(PríjemC) - sum(V?dajC),else:0);
            Spolu := cond(a - b<0 : 0, else : a - b);
           DrHaNM  := sum(DrHaNM );
           Poistne := sum(Poistne);
           PrevRez := sum(PrevRez);
           PrReAut  -_ := sum(PrReAut);
           PrReSC  := sum(PrReSC );
           PrReBan := sum(PrReBan);
           PHM_SC  := sum(PHM_SC );
           HaN_IM  := sum(HaN_IM );
           Tovar   := sum(Tovar  );
           DanZPri := sum(DanZPri);
           OsUcet  := sum(OsUcet );
           DPH     := sum(DPH    );
           Reklam  := sum(Reklam );
           Tovary  := sum(Tovary );
           Sluoby  := sum(Sluoby );
           Osob?f  := sum(Osob?f );
           PoisL   := sum(PoisL  );
           Záloha  := sum(Záloha );




{}
var a,b,bb : string; c,d,e,f,g : real=1;
begin d:=0; f:=0; Mesiace.nrecs := 0; c := recnoabs( PD, 1 );
  a := strdate( PD[c].a, 'DD.MM.YYYY');
  PARAM.Dat1 := valdate(copy(a,4,7), 'MM.YYYY'); PARAM.Dat2 := PARAM.Dat1;
  while PARAM.Dat2 < today do begin appendrec(Mesiace);
    Mesiace[Mesiace.nrecs].Datum := PARAM.Dat2;
    PARAM.Dat2 := addmonth(PARAM.Dat2,1);
  end;
  repeat
    bb:= strdate(Mesiace[1].Datum,'MM.YY')+'-'+strdate(Mesiace[Mesiace.nrecs].Datum,'MM.YY');
    a := strdate(t ?_ oday,'DD.MM.YYYY'); merge(m1);
    if PV.nrecs>0 then begin { appendrec(Ekonom);
      Ekonom[Ekonom.nrecs].Datum:=valdate('01.'+strdate(ParamCat.Rok,'YYYY'),'MM.YYYY');
      Ekonom[Ekonom.nrecs].PríjemC:=PV[1].ph+PV[1].pu; }
    end; merge(m2);
    graph(Ekonom, (Mesiac, Tovary, Sluoby,
                   Osob?f, PoisL, Záloha, Reklam), TYPE='stackbar',
          FILL='m2', DIRX='i', GRID='h', min=-1, max=-1,
          TXT=(2,2,1,'a',' Príjmy '{+str(SpotPrie.Km,8,2)+' Priemer : '+str(SpotPrie. ?_ Km div Mesiace.nrecs,8,2)+' / 1mes.'}),
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y');
    graph(Ekonom, (Mesiac, {DrHaNM,} Tovar, PrevRez, PrReAut, PrReSC,
                  {PrReBan,} PHM_SC, DanZPri, OsUcet, DPH, Poistne, HaN_IM),
          TYPE='stackbar', FILL='m2', DIRX='i', GRID='h', min=-1, max=-1,
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y');
    graph(Ekonom, (Mesiac, PríjemC, V?dajC, Celkom, Spolu), TYPE='groupline',
          FILL='m2', DIRX= ─_ 'i', GRID='h', min=-1, max=-1,
          TXT=(63,3,1,'y',bb), TXT=(63,2,2,'w',a), PRINT='MV100Y'); exit;
  until f=0;
end;
```

## m2

```fand
var a, b : real = 0;
#I1_ Ekonom ! Mesiac
#O_ Ekonom PrijemC := sum(PrijemC);
                a := a + sum(PrijemC);
            VydajC := sum(VydajC);
                         JU              16.08.2026     strana: 56
Typ Nazev
Text
                b := b + sum(VydajC);
           Celkom := cond(sum(PrijemC) - sum(VydajC)>=0:
                          sum(PrijemC) - sum(VydajC),else:0);
            Spolu := cond(a - b<0 : 0, else : a - b);
           DrHaNM  := sum(DrHaNM );
           Poistne := sum(Poistne);
           PrevRez := sum(PrevRez);
           PrReAut := sum(PrReAut);
           PrReSC  := sum(PrReSC );
           PrReBan := sum(PrReBan);
           PHM_SC  := sum(PHM_SC );
           HaN_IM  := sum(HaN_IM );
           Tovar   := sum(Tovar  );
           DanZPri := sum(DanZPri);
           OsUcet  := sum(OsUcet );
           DPH     := sum(DPH    );
           Reklam  := sum(Reklam );
           Tovary  := sum(Tovary );
           TovSlu  := sum(TovSlu );
           Sluzby  := sum(Sluzby );
           Osobuc  := sum(Osobuc );
           Poist   := sum(Poist  );
           Zaloha  := sum(Zaloha );
```

## mSC

```fand
var xy:string;
#I1_SC
#O1_SC xy := cond(I1.Count<10 : '00' + str(I1.Count,1,0),
                  I1.Count<100: '0' + str(I1.Count,2,0),
                      else    : str(I1.Count,3,0));
        b := xy;
```

## mPD

```fand
var xy:string;
#I1_ PD
#O1_PD xy := str(I1.Count,'___');
       b := copy(I1.b,1,2) + xy + cond(val(copy(I1.b,6,8))>0 :
                                   str(val(copy(I1.b,6,8)),'__0'),
                                   else : copy(I1.b,6,8));
{
var xy:string;
#I1_ PD
#O1_PD xy := str(I1.Count,'___');
       b := copy(I1.b,1,2) + xy + cond(val(copy(I1.b,6,8))>0 :
                                   str(val(copy(I1.b,6,8)),'___'),
                                   else : copy(I1.b,6,8));
       Vydaj := cond(a2>0 | a4>0 :        { Vydaje }
                  cond( a7 > 0 : '5', a8 > 0 : '',  a9 > 0 : 'c',
                        a10> 0 : 'c', a11> 0 : '4', a12> 0 : '1',
                        a13> 0 : '1', a14> 0 : '6', a15> 0 : '1',
                        a16> 0 : '8', a17> 0 : '3', a19> 0 : 'v' ), else : '');
}
```

## mPDsuma

```fand
var x : real = 0;
#I1_ PD (b1f <= PARAM.cislo)
#O1_ sumaPD x:=0;
  hot_prijem:= cond(I1.r : hot_prijem);
  hot_vydaj := cond(I1.r : hot_vydaj );
 ucet_prijem:= cond(I1.r : ucet_prijem);
 ucet_vydaj := cond(I1.r : ucet_vydaj );
  a1  := cond(I1.p : I1.a1);
  a1_ := cond(I1.r : I1.a1);
  dochodok := cond(I1.vydaj {prijem} ='D' : I1.a1 + I1.a3);
  a1__:= cond(^I1.p & ^I1.r : I1.a1__);
  a2  := cond(I1.p : I1.a2);
  a2_ := cond(I1.r : I1.a2);
  a2__:= cond(^I1.p & ^I1.r : I1.a2__);
  a3  := cond(I1.p : I1.a3);
  a3_ := cond(I1.r : I1.a3);
  a3__:= cond(^I1.p & ^I1.r : I1.a3__);
  a4  := cond(I1.p : I1.a4);
  a4_ := cond(I1.r : I1.a4);
                         JU              16.08.2026     strana:152
Typ Nazev
Text
  a4__:= cond(^I1.p & ^I1.r : I1.a4__);        {  Rozpis                       }
  a5  := I1.a5;                                { výdavkov ───────────────────┐ }
  a6  := I1.a6;                                {                             │ }
  a7  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { DKP                        ─┤ }
  a8  := 0;                                    { Náklady § 26 o Odpisoch ...─┤ }
  a9  := cond(I1.vydaj ='a' : I1.a2 + I1.a4);  { Odmena za Doh. o vyk. prac ─┤ }
  a10 := cond(I1.vydaj ='c' : I1.a2 + I1.a4);  { Dane z Doh. o vyk. prac    ─┤ }
  a11 := cond(I1.a > valdate('31.12.2016','DD.MM.YYYY') &
              I1.a < valdate('31.12.2022','DD.MM.YYYY') : 0,
         else :
         cond(I1.vydaj ='4' : I1.a2 + I1.a4));  { Poistne zo zakona + DDP    ─┤ }
  a12 := cond(I1.vydaj ='1' : I1.a2 + I1.a4);  { Prev. rezia - vseob        ─┤ }
    x := x + cond(I1.vydaj ='1' : I1.a2 + I1.a4);
  a12b:= cond(I1.vydaj ='u' : I1.a2 + I1.a4);  { Prev. rezia - banka        ─┤ }
    x := x + cond(I1.vydaj ='u' : I1.a2 + I1.a4);
  a122:= cond(I1.vydaj ='2' : I1.a2 + I1.a4);  { Prev. rezia - auto + c.dan ─┤ }
    x := x + cond(I1.vydaj ='2' : I1.a2 + I1.a4);
  a121:= I1.a12 - x;                           { Prev. rezia - ine          ─┤ }
{ a123  napocita sa zo suboru SC                 Prev. rezia - SC           ─┤ }
  a13 := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM - skutocne naklady     ─┤ }
  a14 := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { HaNIM - obstarav. cena     ─┤ }
  a15 := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Nakup tovaru               ─┤ }
  a16 := cond(I1.vydaj ='8' : I1.a2 + I1.a4);  { Dan z prijmu podnikatela   ─┤ }
  a17 := cond(I1.vydaj ='3' : I1.a2 + I1.a4);  { Osobny ucet podnikatela    ─┤ }
  a22 := cond(I1.vydaj ='d' : I1.a2 + I1.a4);  { DPH                        ─┘ }
{ a20 : majetok - napocita sa v pPDsuma }
{ zZP-suma na zac obd.     odpisy     ZP-suma na konci obd. - z IKzp }
```

## mPDsuma_

```fand
#I1_sumaPD
#O_ SumaPD a1  := Sum(a1);
           a1_ := Sum(a1_);
           a1__:= Sum(a1__);
           a2  := Sum(a2);
           a2_ := Sum(a2_);
           a2__:= Sum(a2__);
           a3  := Sum(a3);
           a3_ := Sum(a3_);
           a3__:= Sum(a3__);
           a4  := Sum(a4);
           a4_ := Sum(a4_);
           a4__:= Sum(a4__);
           a5  := Sum(a5);
           a6  := Sum(a6);
           a7  := Sum(a7);
           a8  := Sum(a8);
           a9  := Sum(a9);
           a10 := Sum(a10);
           a11 := Sum(a11);
           a12 := Sum(a12);
           a12b:= Sum(a12b);
           a121:= Sum(a121);
           a122:= Sum(a122);
           a12 := Sum(a12);
           a13 := Sum(a13);
           a14 := Sum(a14);
           a15 := Sum(a15);
           a16 := Sum(a16);
           a17 := Sum(a17);
           a22 := Sum(a22);
     hot_prijem:= Sum(  hot_prijem);
     hot_vydaj := Sum(  hot_vydaj );
    ucet_prijem:= Sum( ucet_prijem);
    ucet_vydaj := Sum( ucet_vydaj );
      dochodok := sum(dochodok);

                         JU              16.08.2026     strana:153
Typ Nazev
Text
```

## mIKzp

```fand
var xy:string;
#I1_IKzp
#O1_IKzp xy := cond(I1.Count<10 : '00' + str(I1.Count,1,0),
                         JU              16.08.2026     strana:156
Typ Nazev
Text
                    I1.Count<100: '0' + str(I1.Count,2,0),
                        else    : str(I1.Count,3,0));
          b := xy;
```

## mIKdkp

```fand
var xy:string;
#I1_ IKdkp
#O1_IKdkp xy := cond(I1.Count<10 : '00' + str(I1.Count,1,0),
                     I1.Count<100: '0' + str(I1.Count,2,0),
                         else    : str(I1.Count,3,0));
           b := xy;
```
