# Verified Accounting Logic

Identified by searching for accounting keywords (`dph`, `dan`, `prijem`, `vydaj`, etc.) in procedures and merges.

## pPrijem (Procedure)
Keywords: prijem

```fand
edit(PARAM, ePrijem, mode='01??',
```

## pVydaj (Procedure)
Keywords: vydaj

```fand
edit(PARAM, eVydaj, mode='01??',
```

## pDat1 (Procedure)
Keywords: dan

```fand
last=' F1                  F3 OK - ulož zadané údaje ',
```

## pSadzbDPH (Procedure)
Keywords: dph

```fand
edit(SadzbDPH, eSadzbDPH, mode='??^y', ctrl='',
head=' DATOVÝ EDITOR                 História sadzieb DPH                    __.__.__',
```

## pSadzbDPH (Procedure)
Keywords: dph

```fand
edit(SadzbDPH, eSadzbDPH, mode='??^y', ctrl='',
head=' DATOVÝ EDITOR                 História sadzieb DPH                    __.__.__',
```

## pStratyDoch (Procedure)
Keywords: dan

```fand
head=' DATOVÝ EDITOR          Nezdan. suma, účt. straty ...                  __.__.__',
```

## pStratyDoch (Procedure)
Keywords: dan

```fand
head=' DATOVÝ EDITOR          Nezdan. suma, účt. straty ...                  __.__.__',
```

## pHlaSklad (Procedure)
Keywords: dan, sklad

```fand
with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky skladu :  ':A,30:=PARAM.Nazov);
with window(1,25,80,25,,^E) do s:=prompt(' Slovo pre filter v popise položky skladu :  ':A,30:=PARAM.Nazov);
```

## pSklad (Procedure)
Keywords: sklad

```fand
s : record of Sklad; z : record of KZpol; k : record of KZ;
merge(['#I1_ sklad #O1_ sklad v := zaruka_do']);
if sklad.nrecs=0 then with window(20,9,61,17,='' !,^W) do begin
GoToXY(5,3); Write('              Sklad');
if ^bro | Sklad.nrecs=0 then
edit(Sklad, eSklad, mode='??', recno = ref, irec = 3, ctrl='',
last=' F1     F3celý sklad                                            F9Browse info',
exit=(F4,CtrlF7,CtrlF4:pPrazdna, F3,F9:quit, F7:pHlaSklad))
edit(Sklad, eSkladBr, mode='^n?y', recno = ref, irec = irf, ctrl='',
head=' DATOVÝ EDITOR             Tovar na sklade číslo ____                  __.__.__',
```

## pHlaSkla2008 (Procedure)
Keywords: dan

```fand
with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky Skla2008u :  ':A,30:=PARAM.Nazov);
```

## pSklad2008 (Procedure)
Keywords: sklad

```fand
merge(['#I1_sklad #O1_skla2008']);
merge(['#I1_skla2008 #O1_ sklad nakupcena := I1.nakupcena / 30.126']);
last=' F1     F3celý Sklad 2008                                          F9Browse info',
head=' DATOVÝ EDITOR             Tovar na Sklade číslo ____                  __.__.__',
last=' F1     F3celý Sklad 2008                                          F9Úplné info ',
head=' DATOVÝ EDITOR             Tovar na Sklade číslo ____                  __.__.__',
```

## pSC (Procedure)
Keywords: auto

```fand
s : record of Sc; e : record of Evi_Auto;
alt=' Alt F2Nová SC - nie vlastným autom',
F7:pEvi_Auto, ShiftF10:pSpotrScSum))
alt=' Alt F2Nová SC - nie vlastným autom',
F7:pEvi_Auto));
```

## pSC_nova (Procedure)
Keywords: auto

```fand
if edbreak=22 then proc(pAuto) else proc(pDoprPros); if PAR.kod=~'' then exit;
exit=((konieh):pEvi_Auto_SC));
```

## pSC_nova (Procedure)
Keywords: auto

```fand
if edbreak=22 then proc(pAuto) else proc(pDoprPros); if PAR.kod=~'' then exit;
exit=((konieh):pEvi_Auto_SC));
```

## m1 (MERGE)
Keywords: dph, dan, prijem, vydaj, auto, phm

```fand
#O1_ Ekonom PrijemC := a5; VydajC := a6; PrijemP := a18; VydajP := a19;
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   Ů+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          Ů+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. rÚoia - ine           - }
PrReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. rÚoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. rÚoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. rÚoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 Ů+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       Ů+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      Ů+ }
```

## m1 (MERGE)
Keywords: dph, dan, prijem, vydaj, auto, phm

```fand
#O1_ Ekonom PrijemC := a5; VydajC := a6; PrijemP := a18; VydajP := a19;
DrHaNM  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { drobn? HaN majetok - DKP   Ů+ }
Poistne := cond(I1.vydaj ='4' : I1.a2 + I1.a4);  { Poistne zo zakona          Ů+ }
PrevRez := cond(I1.vydaj ='1' : I1.a2 + I1.a4); { prev. rÚoia - ine           - }
PrReAut := cond(I1.vydaj ='2' : I1.a2 + I1.a4); { prev. rÚoia - auto          - }
PrReSC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4); { prev. rÚoia - sluz. cesta   - }
PrReBan := cond(I1.vydaj ='u' : I1.a2 + I1.a4); { prev. rÚoia - banka         - }
PHM_SC  := cond(I1.vydaj ='h' : I1.a2 + I1.a4);  { PHM pre SC                 Ů+ }
HaN_IM  := cond(I1.vydaj ='6' : I1.a2 + I1.a4);  { Zakladne prostriedky       Ů+ }
Tovar   := cond(I1.vydaj ='t' : I1.a2 + I1.a4);  { Tovar                      Ů+ }
```

## m2 (MERGE)
Keywords: dph, dan, prijem, vydaj, phm

```fand
#O_ Ekonom PrijemC := sum(PrijemC);
a := a + sum(PrijemC);
VydajC := sum(VydajC);
b := b + sum(VydajC);
Celkom := cond(sum(PrijemC) - sum(VydajC)>=0:
sum(PrijemC) - sum(VydajC),else:0);
PHM_SC  := sum(PHM_SC );
DanZPri := sum(DanZPri);
DPH     := sum(DPH    );
```

## pGraf_PD (Procedure)
Keywords: dph, dan, prijem, vydaj, phm

```fand
Ekonom[Ekonom.nrecs].PrijemC:=PV[1].ph+PV[1].pu; }
{PrReBan,} PHM_SC, DanZPri, OsUcet, DPH, Poistne, HaN_IM),
graph(Ekonom, (Mesiac, PrijemC, VydajC, Celkom, Spolu), TYPE='groupline',
```

## pSpotreba (Procedure)
Keywords: vydaj, auto

```fand
ctrl=' Ctrl F1SC       F6iné vydaje  F8Kontrola údajov tachometra  F9Prenos Sk do PD',
exit=(F3:pTlacDokl(4), F1:pSumSpotreba, CtrlF10:pAuto_Info(11),
ctrl=' Ctrl F1SC       F6iné vydaje  F8Kontrola údajov tachometra  F9Prenos Sk do PD',
exit=(F3:pTlacDokl(4), F1:pSumSpotreba, CtrlF10:pAuto_Info(1),
ctrl=' Ctrl F1SC       F6iné vydaje  F8Kontrola údajov tachometra  F9Prenos Sk do PD',
exit=(F3:pTlacDokl(4), F1:pSumSpotreba, CtrlF10:pAuto_Info(10),
ctrl=' Ctrl F1SC       F6iné vydaje  F8Kontrola údajov tachometra  F9Prenos Sk do PD',
exit=(F3:pTlacDokl(4), F1:pSumSpotreba, CtrlF10:pAuto_Info(0),
if br=38 then begin proc(pSp_Auto_Opr); setkeybuf('\0\103'); end;
exit=((servis, INE, oprava, invest),CtrlF10:pAuto_Info_1, F3:quit));
```

## pDoSpotr_Zpd (Procedure)
Keywords: vydaj

```fand
edit(PD, ePDbrowse, mode='#L!!^y^n', recno=x, irec=10, cond=(vydaj='2'),
```

## pSpotre_SC (Procedure)
Keywords: auto

```fand
last='       F3Tlač doklady                         F8Auto spotreba F10Úplné info',
```

## pSpotrSCsum (Procedure)
Keywords: auto

```fand
{ gotoxy(2,24); i := recno(Auto/@, Par.kod);
write('           Auv : '+trailchar(' ',Auto[i].Typ)+'  ŠPZ : '+Auto[i].SPZ+' '); }
```

## pIniSpotreba (Procedure)
Keywords: dph, phm

```fand
SpotPrie[1].Sk_za_PHM += cond (sp.uspora = 0 : sp.Sk_za_PHM, else : 0);
SpotPrie[1].Sk_za_PHM_bez_DPH += cond (sp.uspora = 0 : sp.bez_DPH, else : 0);
SpotPrie[1].Sk_za_LPG += cond (sp.uspora > 0 : sp.Sk_za_PHM, else : 0);
SpotPrie[1].Sk_za_LPG_bez_DPH += cond (sp.uspora > 0 : sp.bez_DPH, else : 0);
SpotPrie[1].uspora    += cond (sp.uspora > 0 : sp.l_ben - sp.Sk_za_PHM, else : 0);
SpotPrie[1].usp_LPG_bez_dph += sp.usp_LPG_bez_dph;
```

## pSpotrebGraf (Procedure)
Keywords: dph, phm

```fand
Sk_za_PHM : F,5.2; km : F,4,0; mesiace : F,2,0;
Sk_del_10  := Sk_za_PHM div 10 : F,5,0;
SpotPrie[1].Sk_za_PHM  += sp.Sk_za_PHM; SpotPrie[1].SERVIS += sp.SERVIS;
merge(['#I1_ Spotreba ! (kod=Par.kod) Datum #O1_SpotGraf km:=I1.km; spotr:=I1.spotr; Sk_za_PHM:=Sk_za_PHM; litre:=Litre; Au_Priemer:=I1.PS*100; pocet:=I1.pocet; sk:=Sk_na_1l; sk_real:=Sk_na_1l_Bez_DPH']);
merge(['#I1_ Spotreba ! (kod=Par.kod) Datum #O_SpotGraf km:=sum(km);spotr:=sum(I1.spotr);pocet:=sum(I1.pocet);Sk_za_PHM:=sum(Sk_za_PHM);litre:=sum(Litre);Au_Priemer:=I1.PS*100;pocet:=sum(I1.pocet);sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); pocet:=sum(pocet); sk:=sum(Sk)/sum(pocet); sk_real:=sum(Sk_real)/sum(pocet)']);
TXT=(2,1,1,'a','  Sk = '+str(SpotPrie.Sk_za_PHM,8,2)+' Priemer : '+str(SpotPrie.Sk_za_PHM div Mesiace.nrecs,8,2)+' / 1mes.'),
merge(['#I1_ Spotreba ! (kod=Par.kod) kvartal #O_SpotGraf km:=sum(km); Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); Au_Priemer:=I1.PS*100; pocet:=sum(I1.pocet); sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
TXT=(2,1,1,'a','  Sk = '+str(SpotPrie.Sk_za_PHM,8,2)+' Priemer : '+str(3*(SpotPrie.Sk_za_PHM div Mesiace.nrecs),8,2)+' / 1 Q'),
merge(['#I1_ Spotreba ! (kod=Par.kod) roky #O_SpotGraf km:=sum(km); Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); Au_Priemer:=I1.PS*100; pocet:=sum(I1.pocet); sk:=sum(Sk_na_1l); sk_real:=sum(Sk_na_1l_Bez_DPH)']);
```

## pPumpMesGraf (Procedure)
Keywords: phm

```fand
SpotGraf : file [ Sk_za_PHM : F,5.2; Litre_x_10 : F,5.2; {Spotreba}
begin merge(['#I1_ Spotreba ! firma #O_SpotGraf Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); litre_x_10:=sum(Litre)*10']);
{ edit(SpotGraf, ( Sk_za_PHM, Litre_x_10, miesto, firma)); exit; }
{  graph(SpotGraf, (firma, Litre_x_10, V_  Sk_za_PHM), cond=(firma<>~''),
graph(SpotGraf, (firma, Sk_za_PHM, Litre_x_10), cond=(firma<>~''),
merge(['#I1_ Spotreba ! miesto #O_SpotGraf Sk_za_PHM:=sum(Sk_za_PHM); litre:=sum(Litre); litre_x_10:=sum(Litre)*10']);
{  graph(SpotGraf, (miesto, Litre, Sk_za_PHM), cond=(miesto<>~''),
graph(SpotGraf, (miesto, Litre, Sk_za_PHM), cond=(miesto<>~''),
```

## pSpotreba_n (Procedure)
Keywords: vydaj, auto, phm

```fand
Spot_n[1].KM += sp.KM; Spot_n[1].Sk_za_PHM  += sp.Sk_za_PHM;
Spot_n[1].KM += sp.KM; Spot_n[1].Sk_za_PHM += sp.Sk_za_PHM;
#I1_Auto_1
INE_VYDAJE   := val(I1.INE_VYDAJE);
```

## pSpotreba_n (Procedure)
Keywords: vydaj, auto, phm

```fand
Spot_n[1].KM += sp.KM; Spot_n[1].Sk_za_PHM  += sp.Sk_za_PHM;
Spot_n[1].KM += sp.KM; Spot_n[1].Sk_za_PHM += sp.Sk_za_PHM;
#I1_Auto_1
INE_VYDAJE   := val(I1.INE_VYDAJE);
```

## pEvi_Auto (Procedure)
Keywords: auto

```fand
apom : file.x [like auto;]; e : record of evi_auto;
begin PAR.kod := ''; indexfile(Auto, compress); indexfile(Spotreba, compress);
if Auto.nrecs>1 | Auto.nrecs=0 then proc(pAuto) else PAR.kod := Auto[1].kod;
message('Nie je zvolené žiadne auto !'); exit; end;
if Evi_Auto.nrecs>0 & recno(Evi_Auto/iKod, PAR.kod)<0 then begin
merge(['#I1_ evi_Auto ! kod #O_apom']);
with window (1,2,80,25,@) do repeat if Evi_Auto.nrecs=0 then browse := false;
edit(Evi_Auto/iKod, eEvi_Auto, mode='??^n?y', recno=re, irec=ir,
last=' Alt  F1Auto info - zmena  F3Tlač F8Spotreba F9Kontrola F10Úplné info',
ww=((2,4,79,23,=' Evidencia prevádzky automobilu '!,^B,^S,^E,^B)),
```

## pEvi_AutoSum (Procedure)
Keywords: auto

```fand
merge(['#I1_ Evi_Auto (kod=Par.kod) #O_ev_pom poc_km := sum(I1.poc_km); spolu := sum(I1.spolu)']);
gotoxy(1,24); i := recno(Auto/@, Par.kod);
write('           Auv : '+trailchar(' ',Auto[i].Typ)+'  ŠPZ : '+Auto[i].SPZ+' ');
```

## pKm_Kon_Vzd (Procedure)
Keywords: auto

```fand
(E:record of evi_auto) var x : real; A : record of evi_auto;
```

## pKm_Auto_Opr (Procedure)
Keywords: dph, auto, phm

```fand
var E,A : record of evi_auto; k : record of kalendar;
begin merge(['#I1_ evi_auto/@ #O1_evi_auto']); close; proc(pSc_Kontrola); close;
bbb := true; {promptYN('Mám skontrolovať aj ceny PHM ? (A/N) ');} e.datum := 0;
if a.datum=e.datum then begin A.DPH:=e.DPH; A.cena_PHM:=e.cena_PHM;
end; A.DPH:=Spotreba[param.cislo].DPH;
if ^a.lpg then A.cena_PHM:=Spotreba[param.cislo].Sk_na_1l
else A.cena_PHM:=Spotreba[param.cislo].Sk_be_1l;
if pos('***', a.odkial) > 0 then a.cena_phm := 0;
forall x in E (bb = S.bb) ! do begin S.DPH := E.DPH;
if E.LPG then begin S.Celpg := E.cena_phm;
```

## pKm_Auto_Opr (Procedure)
Keywords: dph, auto, phm

```fand
var E,A : record of evi_auto; k : record of kalendar;
begin merge(['#I1_ evi_auto/@ #O1_evi_auto']); close; proc(pSc_Kontrola); close;
bbb := true; {promptYN('Mám skontrolovať aj ceny PHM ? (A/N) ');} e.datum := 0;
if a.datum=e.datum then begin A.DPH:=e.DPH; A.cena_PHM:=e.cena_PHM;
end; A.DPH:=Spotreba[param.cislo].DPH;
if ^a.lpg then A.cena_PHM:=Spotreba[param.cislo].Sk_na_1l
else A.cena_PHM:=Spotreba[param.cislo].Sk_be_1l;
if pos('***', a.odkial) > 0 then a.cena_phm := 0;
forall x in E (bb = S.bb) ! do begin S.DPH := E.DPH;
if E.LPG then begin S.Celpg := E.cena_phm;
```

## pEvi_Auto_SC (Procedure)
Keywords: dph, auto, phm

```fand
(C : record of SC) var x, y : real; E : record of Evi_Auto;
indexfile(Evi_Auto, compress);
if Evi_Auto.nrecs>0 then begin
Par.zac_km:=Evi_Auto[Evi_Auto.nrecs].kon_km;
Par.cena_PHM:=Evi_Auto[Evi_Auto.nrecs].cena_PHM;
edit(Evi_Auto/iKod, eEvi_Auto_U, mode='F2', cond=(key in [par.kod]),
Ctrl=' Ctrl  F1 Auto Info               F7 Auto spotreba',
ww=(3,5,77,22,=' Evidencia prevádzky automobilu - nové položky '!,^S,^B,^E,^B),
exit=(CtrlF1:pAuto, (zaciatok):pTrasa, (cena_phm):pDovod_SC,
forall x in E/iEa (bb = param.sc) ! % do begin {} e.dph := param.dph;
```

## pDovod_SC (Procedure)
Keywords: auto, phm

```fand
(K:record of evi_auto)
begin merge(['#I1_ evi_auto ! (ucel<>~'''') ~ucel #O_dovod_sc n:=I1.ucel']);
if Par.cena_PHM=0 & K.cena_PHM<>0 then Par.cena_PHM:=K.cena_PHM;
merge(['#I1_ evi_auto ! (ucel<>~'''') ~ucel #O_dovod_sc n:=I1.ucel'])
(K:record of evi_auto)
```

## pDovod_SC (Procedure)
Keywords: auto, phm

```fand
(K:record of evi_auto)
begin merge(['#I1_ evi_auto ! (ucel<>~'''') ~ucel #O_dovod_sc n:=I1.ucel']);
if Par.cena_PHM=0 & K.cena_PHM<>0 then Par.cena_PHM:=K.cena_PHM;
merge(['#I1_ evi_auto ! (ucel<>~'''') ~ucel #O_dovod_sc n:=I1.ucel'])
(K:record of evi_auto)
```

## pDovod_DPrac (Procedure)
Keywords: dph, auto, phm

```fand
(E : record of Evi_Auto)
var x,hh,mm : real; Spot_Pom : file [ DATUM:D,'DD.MM.YYYY'; dph:F,2.1; SK_NA_1L:F,2.2 ];
end; Par.cena_PHM:=Spot_Pom[Spot_Pom.nrecs].Sk_na_1l;
{   Par.DPH:=Spot_Pom[Spot_Pom.nrecs].DPH;}
```

## pTrasa (Procedure)
Keywords: auto, phm

```fand
(E : record of Evi_Auto) var hh, mm : real;
if Par.cena_PHM=0 then setkeybuf('\13\13\13\13\13')
```

## pHlaTra (Procedure)
Keywords: dan

```fand
with window(1,25,80,25,,^E) do s:=prompt(' Hľadané mesto : ':A,20:=PARAM.Nazov);
```

## pAuto (Procedure)
Keywords: auto, phm

```fand
var i, br, re, orig : real; au : file.x [like auto;]; bro : boolean = true;
a : record of Auto; ea : record of Evi_Auto;
begin PAR.kod:=''; Par.vzd := 0; Par.cena_PHM:=0; au.nrecs:=0;
indexfile(Auto, compress); orig := edbreak;
if orig<>21 then merge(['#I1_ Auto (pou & fir) #O1_au']);
edit(Auto, eAuto, mode='?y', Ctrl='', recno=re,    {  pAuto_Info }
ww=(4,9,76,19,=' Dáta automobilov ',^W,^A,^E,^B),
edit(Auto, eAutoUplne, mode='?y', Ctrl='', recno=re, {  pAuto_Info }
ww=(4,5,76,22,=' Dáta automobilov ',^W,^A,^E,^B),
PAR.kod := A.kod; save; close; i := recno(Evi_Auto/iKod, par.kod);
```

## pDoprPros (Procedure)
Keywords: phm

```fand
begin PAR.kod:=''; Par.vzd := 0; Par.cena_PHM:=0;
```

## pAuto_Info (Procedure)
Keywords: dph, phm

```fand
write('                  '+str(SpotPrie[1].Sk_za_PHM_bez_DPH,'___0,__')+
'    '+str(SpotPrie[1].Sk_DPH,'___0,__')+
str(SpotPrie[1].Sk_za_PHM,'_____0,__')+'   Úspora LPG bez '+
str(SpotPrie[1].Sk_za_LPG,'_____0,__')+'   DPH >'+
str(SpotPrie[1].usp_lpg_bez_DPH,'_____0,__')+' '+
str(SpotPrie[1].Sk_za_PHM,'_____0,__')+'               '+
```

## pAuto_new (Procedure)
Keywords: auto

```fand
edit(Auto, eAutoUplne, mode='01F2', last='', Ctrl='',
ww=(17,9,62,19,=' Dáta pre nový automobil ',^S,^B,^E,^B),
```

## pSC_EviAuto (Procedure)
Keywords: auto

```fand
sc_pocet : file [ bb : F,3,0 ]; s : record of Sc; e : record of Evi_Auto;
```

## pSC_Kontrola (Procedure)
Keywords: dph, vydaj, auto, phm

```fand
begin proc(pSC_EviAuto);   x:=0;
forall c in PD (vydaj='h') % do deleterec(pd, c); close;
evi_auto.path := ju_path.path+'DELF'+ str(x,'____')+'\evi_auto.000'; ResetCatalog;
{   skutocny VYDAJ ZA PHM do PD  }                  {proc(pSC_EviAuto);}
(dph=0 | (dph>0 & dph_sk>0))) % do begin
den.a := Sp.datum; den.d := 'PHM pre SC'; den.a2 := Sp.Sk_za_PHM;
den.vydaj := 'h'; { PD Spotreba pPD } writerec(den, 0); close;
evi_auto.path := ju_path.path+'DELF'+ str(x,'____')+'\evi_auto.000';
```

## pDPH (Procedure)
Keywords: dph, phm

```fand
DPH_pom : file [ a : A,1 ];
begin { proc(pKontrol_Uhr); } { proc(pSadzbDPH); }
if DPH.nrecs=0 then setkeybuf('\0\60') else setkeybuf('\0\118\0\71');
edit(DPH, eDPH, mode='#L?y', recno = re, irec = ir, ctrl='',
last=' F1     F2Nové priznanie  F3/F4Tlač priznanie/vstup a výstup    F9Sadzby DPH',
exit=(F7,CtrlF7,CtrlF4:pPrazdna, F2,F3,F4:quit, F9:pSadzbDPH));
if DPH.nrecs=0 then begin PARAM.MinCas := udaje.DatDPH;
dm := valdate(strdate(udaje.DatDPH,'DD.MM'),'DD.MM');
rrr := strdate(udaje.DatDPH,'YYYY');
end else begin PARAM.MinCas := DPH[DPH.nrecs].do+1;
```

## pDPH (Procedure)
Keywords: dph, phm

```fand
DPH_pom : file [ a : A,1 ];
begin { proc(pKontrol_Uhr); } { proc(pSadzbDPH); }
if DPH.nrecs=0 then setkeybuf('\0\60') else setkeybuf('\0\118\0\71');
edit(DPH, eDPH, mode='#L?y', recno = re, irec = ir, ctrl='',
last=' F1     F2Nové priznanie  F3/F4Tlač priznanie/vstup a výstup    F9Sadzby DPH',
exit=(F7,CtrlF7,CtrlF4:pPrazdna, F2,F3,F4:quit, F9:pSadzbDPH));
if DPH.nrecs=0 then begin PARAM.MinCas := udaje.DatDPH;
dm := valdate(strdate(udaje.DatDPH,'DD.MM'),'DD.MM');
rrr := strdate(udaje.DatDPH,'YYYY');
end else begin PARAM.MinCas := DPH[DPH.nrecs].do+1;
```

## pVydaje (Procedure)
Keywords: vydaj

```fand
appendrec(Vydaje);
edit(Vydaje, eVydajC, mode='^y01#L??', ctrl='',
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nový výdaj '!,^D,^B,^A,^B));
{    if Vydaje.nrecs>1 then sort(Vydaje,(>v,d));}
edit(Vydaje, eVydajC, mode='^y01#L??', ctrl='',
```

## pZmenKodVyd (Procedure)
Keywords: vydaj

```fand
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
```

## pPrijmy (Procedure)
Keywords: vydaj

```fand
edit(Vydaje, ePrijmz, mode='^yF201#L??', cond=(^pv),
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nový príjem '!,^D,^B,^A,^B));
{    if Vydaje.nrecs>1 then sort(Vydaje,(>v,d));}
edit(Vydaje, ePrijmz, mode='^y01#L??',
```

## pZmenKodPri (Procedure)
Keywords: prijem, vydaj

```fand
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KP (prijem=PARAM.doklad) ! % do begin
KP[y].prijem:=p.kod; close;
forall y in EZ (prijem=PARAM.doklad) ! % do begin
EZ[y].prijem:=p.kod; close;
if KP[c].prijem='1' then KP[c].prijem:='S';
if KP[c].prijem='p' then KP[c].prijem:='T';
```

## pZmenKodPri (Procedure)
Keywords: prijem, vydaj

```fand
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KP (prijem=PARAM.doklad) ! % do begin
KP[y].prijem:=p.kod; close;
forall y in EZ (prijem=PARAM.doklad) ! % do begin
EZ[y].prijem:=p.kod; close;
if KP[c].prijem='1' then KP[c].prijem:='S';
if KP[c].prijem='p' then KP[c].prijem:='T';
```

## pZmenKodPri (Procedure)
Keywords: prijem, vydaj

```fand
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a1>0 | a3>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KP (prijem=PARAM.doklad) ! % do begin
KP[y].prijem:=p.kod; close;
forall y in EZ (prijem=PARAM.doklad) ! % do begin
EZ[y].prijem:=p.kod; close;
if KP[c].prijem='1' then KP[c].prijem:='S';
if KP[c].prijem='p' then KP[c].prijem:='T';
```

## pDdatum (Procedure)
Keywords: dan

```fand
'Ručne vkladaný dátum ': Param.dat:=false;
```

## mPD (MERGE)
Keywords: vydaj

```fand
Vydaj := cond(a2>0 | a4>0 :        { Vydaje }
```

## pVydaje_Kod (Procedure)
Keywords: vydaj

```fand
forall i in Vydaje (kod=PD[x].Vydaj) do f:=i;
forall i in Vydaje (pv) % do begin PARAM.doklad := Vydaje[i].kod;
Vydaje[i].pocet := 0; Vydaje[i].suma := 0;
merge(['#I1_ PD ! ((a2<>0 | a4<>0) {& ^p} & vydaj=PARAM.doklad) vydaj #O_vyd_pom pocet:=I1.n; spolu:=sum(I1.hod_vyd)']);
Vydaje[i].pocet := vyd_pom[1].pocet; Vydaje[i].suma := vyd_pom[1].spolu;
{edit(vydaje,());}
edit(Vydaje, eVydaj_PD, mode='?y^n#L', recno=f, irec=i, ctrl='',
last='    F1Zodpovedajuce vydaje  F2Novy  F3Vyber  F4Editacia        F10Vsetky vydaje PD',
prerus:=edbreak; f:=edrecno; i:=edirec; PARAM.doklad := Vydaje[f].kod;
if prerus=22 | prerus=24 then proc(pVydaje); setkeybuf('\0\93');
```

## pPrijmy_Kod (Procedure)
Keywords: prijem, vydaj

```fand
forall i in Vydaje (kod=PD[x].Vydaj) do f:=i;
forall i in Vydaje (^pv) % do begin PARAM.doklad := Vydaje[i].kod;
Vydaje[i].pocet := 0; Vydaje[i].suma := 0;
merge(['#I1_ PD ! ((a1<>0 | a3<>0) {& ^p} & vydaj=PARAM.doklad) vydaj #O_Vyd_pom pocet:=I1.n; spolu:=sum(I1.hod_pri)']);
Vydaje[i].pocet := vyd_pom[1].pocet; Vydaje[i].suma := vyd_pom[1].spolu;
edit(Vydaje, ePrijem_PD, mode='?y^n#L', recno=f, irec=i, ctrl='',
prerus:=edbreak; f:=edrecno; i:=edirec; PARAM.doklad := Vydaje[f].kod;
edit(PD, ePDbrow_Pri, mode='#L^n^y!!', cond=((a1<>0 | a3<>0) & vydaj=Vydaje[f].kod), ctrl='',
if prerus=23 then begin PD[x].vydaj := Vydaje[f].kod; proc(pKontrol_PD2,(x)); end;
```

## pKontrol_PD1 (Procedure)
Keywords: dph, dan, vydaj, auto, phm

```fand
begin { edit(Vydaje,()); cancel; } proc(pVynuluj_Vy1,(x));
{prev. rezia}        if PD[x].vydaj ='1' then PD[x].a12 := PD[x].a2+PD[x].a4;
{prev. rezia - auto} if PD[x].vydaj ='2' then PD[x].a12 := PD[x].a2+PD[x].a4;
{prev. rezia - banka}if PD[x].vydaj ='u' then PD[x].a12 := PD[x].a2+PD[x].a4;
{Cestna dan }        if PD[x].vydaj ='7' then PD[x].a12 := PD[x].a2+PD[x].a4;
{os. ucet   }        if PD[x].vydaj ='3' then PD[x].a17 := PD[x].a2+PD[x].a4;
{zak.poistne}        if PD[x].vydaj ='4' then PD[x].a11 := PD[x].a2+PD[x].a4;
{Dr. HaN Maj - DKP}  if PD[x].vydaj ='5' then PD[x].a7  := PD[x].a2+PD[x].a4;
{ZP - HaN IM }       if PD[x].vydaj ='6' then PD[x].a14 := PD[x].a2+PD[x].a4;
{Dan z prijmu }      if PD[x].vydaj ='8' then PD[x].a16 := PD[x].a2+PD[x].a4;
```

## pKontrol_PD2 (Procedure)
Keywords: dan, vydaj, mzdy

```fand
{prev. rezia}  if PD[x].vydaj ='1' then PD[x].a12 := PD[x].a2+PD[x].a4; }
{ if PD[x].vydaj ='T' then begin PD[x].a15 := PD[x].a2+PD[x].a4;
end; { Naklady ş 26 o Odpisoch ...    Mzdy zamestnancov + dane z nich }
```

## pVyd_Info (Procedure)
Keywords: vydaj

```fand
gotoxy(38,23); write(' Spolu vydajov v PD :  '+str(j,'____')+' '+str(k,'______0,__')+' ');
```

## pVyd_PD_Info (Procedure)
Keywords: vydaj

```fand
merge(['#I1_ PD ((a2<>0 | a4<>0) & vydaj=PARAM.doklad) #O_ EB spolu += sum(I1.hod_vyd)']);
merge(['#I1_ PD ((a1<>0 | a3<>0) & vydaj=PARAM.doklad) #O_ EB spolu += sum(I1.hod_pri)']);
write(' Typ vydajov v PD : C = celk, P = prieb, I = ine, " " = ??? ');
```

## pVyd_Bez_Kod (Procedure)
Keywords: vydaj

```fand
begin setkeybuf('\0\64N (vydaj='' '') \13'); end;
{ begin setkeybuf('\0\64N (a6>0 | a19>0) & vydaj='' '' \13'); end;}
```

## pPDkod (Procedure)
Keywords: vydaj

```fand
if P.a2<>0 | P.a4<>0 then proc(pVydaje_Kod);
```

## pKontrola_Pd (Procedure)
Keywords: dph, dan, vydaj, phm

```fand
v : record of Vydaje;
{ doplnenie zdan. plnenia z dokladov  }
forall i in PD (r & (dph>0 & (a2<>0 | a4<>0))) % do begin
forall i in PD (r & vydaj='3') % do PD[i].r:=false; i:=1;
forall i in PD (copy(b,1,2)='40' | vydaj='h') % do deleterec(PD, i); i:=1;
(dph=0 | (dph>0 & dph_sk>0))) % do begin
den.a := Sp.datum; den.d := 'PHM pre SC'; den.a2 := 0; den.a4 := 0;
if sp.ucet then den.a4 := Sp.Sk_za_PHM else den.a2 := Sp.Sk_za_PHM;
den.vydaj := 'h'; den.a13 := Sp.Sk_za_PHM; writerec(den, 0); close;
{   PD[i].vydaj := '2';
```

## pPD_Doklad (Procedure)
Keywords: auto

```fand
edit(Evi_Auto/iEa, eEvi_Auto_U, mode='?y??', irec=3,
last=' F1Auto Info    F3Tlač                       F8Spotreba       PgDn PgUp',
ww=(3,5,77,22,=' Kniha jázd - Evidencia prevádzky automobilu '!,^S,^B,^E,^B),
(kon_km):pKm_Kon_Vzd, F1:pAuto));
```

## pHla_PD (Procedure)
Keywords: dan

```fand
with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky PD :  ':A,30:=PARAM.Nazov);
```

## pHla_PD (Procedure)
Keywords: dan

```fand
with window(1,25,80,25,,^E) do s:=prompt(' Slovo hľadané v popise položky PD :  ':A,30:=PARAM.Nazov);
```

## pHm_a_Nehm (Procedure)
Keywords: phm

```fand
if IKzp.nrecs=0 then proc(pHm_a_Nehm_X); setkeybuf('\0\118\0\71\0\93');
```

## pHm_a_Nehm_X (Procedure)
Keywords: dph

```fand
cond(Catalog[c].NazSouboru<>~'dph' &
cond(Catalog[c].NazSouboru<>~'dph' &
```

## pPohla_SC (Procedure)
Keywords: auto, phm

```fand
x, y, w, z, i, f, pocet, phm : real; E : record of Evi_Auto; C : record of SC;
proc(pAuto); if PAR.kod=~'' then proc(pDoprPros); if PAR.kod=~'' then exit;
x := recno(Auto/@, PAR.kod);
if Auto[x].lpg>0 then begin lpg:=true; phm:=Auto[x].lpg
end else phm:=Auto[x].PS; end;
{ evi_auto }         Par.vzd < 31 : '00:30',
e.cena_PHM := Evi_Auto[Evi_Auto.nrecs].cena_PHM; e.Kod := Par.kod;
e.zac_km   := Evi_Auto[Evi_Auto.nrecs].Kon_km;
{ evi_auto }         Par.vzd < 31 : '00:30',
e.zac_km   := Evi_Auto[Evi_Auto.nrecs].Kon_km;
```

## pZmenKP_AB (Procedure)
Keywords: sklad

```fand
s : record of Sklad; u : record of uhrady;
```

## pKPpol (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad

```fand
ret : string; p : record of KPpol; s : record of sklad;
edit(Sklad, eSklad, mode='??', recno = res, irec = 3, ctrl='',
alt=' Alt  F1vynuluj výdaj  F3výber položiek do skladaného počítača  F9Hľadaj v.č.',
edit(Sklad, eSkladBrKP, mode='^n?y', recno = res, irec = irs, ctrl='',
head=' DATOVÝ EDITOR             Tovar na sklade číslo ____                  __.__.__',
alt=' Alt  F1vynuluj výdaj  F3výber položiek do skladaného počítača  F9Hľadaj v.č.',
PARAM.a := upcase(prompt('   Zadajte hľadaný reťazec v názve : ':A,25:=' '));
PARAM.a := upcase(prompt('   Zadajte hľadaný reťazec vo výrobnom čísle : ':A,25:=' '));
p.popis1 := 'Servisné práce'; p.prijem := 'S'; p.mnozstvo := 1;
p.dph := udaje.sadzba; p.prace:=''; p.intkodtov := 0; writerec(p, 0);
```

## pKPpol_rekl (Procedure)
Keywords: prijem, sklad

```fand
ret : string; p : record of KPpol; s : record of sklad;
end; P.prijem := 'R'; writerec(p, re);
```

## pSklad_rekl (Procedure)
Keywords: dan, sklad

```fand
ret : string; s : record of sklad;
edit(Sklad, eSklad, mode='??', recno = res, irec = 3, ctrl='',
edit(Sklad, eSkladBrKP, mode='^n?y', recno = res, irec = irs, ctrl='',
head=' DATOVÝ EDITOR             Tovar na sklade číslo ____                  __.__.__',
PARAM.a := upcase(prompt('   Zadajte hľadaný reťazec v názve : ':A,25:=' '));
PARAM.a := upcase(prompt('   Zadajte hľadaný reťazec vo výrobnom čísle : ':A,25:=' '));
{   rp : record of REKLpol; r : record of REKL;  sklad  }
```

## pOP (Procedure)
Keywords: dph

```fand
begin PARAM.a2 := p.s_DPH; PARAM.a1 := p.bez_DPH;
PARAM.DPH := p.DPH; x:= cond ( edirec=1 : 5, edirec=2 : 0, edirec=3 : 5);
p.op := ((( PARAM.a2 / ( 100 + p.DPH)) * 100 ) - p.nakupcena ) /
```

## pPomRataj (Procedure)
Keywords: dph

```fand
if edfield='a2' then P.a1 := ( p.a2 / ( P.DPH + 100 )) * 100
else P.a2 :=   P.a1 + (( P.a1 / 100 )) * P.DPH;
```

## pZavazky (Procedure)
Keywords: dph, sklad

```fand
k : record of KZ; p : record of KZpol; s : record of Sklad;
if y=1 then begin readrec(K, x); K.zp := 0; K.dph := 0;
K.dph_1 := 0;
```

## pZmenRekl_EF (Procedure)
Keywords: sklad

```fand
s : record of Sklad; u : record of uhrady;
s.a := z.e;  {sklad}   s.b := z.f; writerec(s, y);
```

## pReklamacie (Procedure)
Keywords: sklad

```fand
k : record of REKL; p : record of REKLpol; s : record of Sklad; ret : string;
last='            F4Položky pohľadávky    F5Sklad',
F4:pKPpol_rekl(0), F5:pSklad_rekl(0)));
```

## pKZ_sc (Procedure)
Keywords: dph, auto, phm

```fand
x, y, w, z, i, f, pocet, phm : real; E : record of Evi_Auto; C : record of SC;
proc(pAuto); if PAR.kod=~'' then proc(pDoprPros); if PAR.kod=~'' then exit;
if k.bb>0 then begin x := recno( Evi_Auto/iKodBb, par.kod, k.bb);
edit(Evi_Auto/iKod, eEvi_Auto_U,
Ctrl=' Ctrl  F1 Auto Info               F7 Auto spotreba',
ww=(3,5,77,22,=' Evidencia prevádzky automobilu - nové položky '!,^S,^B,^E,^B),
exit=(F2,F4,F3:pPrazdna, CtrlF1:pAuto, CtrlF7:pSpotreba));   exit;
x := recno(Auto/@, PAR.kod);
if Auto[x].lpg>0 then begin lpg:=true; phm:=Auto[x].lpg
end else phm:=Auto[x].PS; end;
```

## pREKL_sc (Procedure)
Keywords: dph, auto, phm

```fand
x, y, w, z, i, f, pocet, phm : real; E : record of Evi_Auto; C : record of SC;
proc(pAuto); if PAR.kod=~'' then proc(pDoprPros); if PAR.kod=~'' then exit;
if k.bb>0 then begin x := recno( Evi_Auto/iKodBb, par.kod, k.bb);
edit(Evi_Auto/iKod, eEvi_Auto_U,
Ctrl=' Ctrl  F1 Auto Info               F7 Auto spotreba',
ww=(3,5,77,22,=' Evidencia prevádzky automobilu - nové položky '!,^S,^B,^E,^B),
exit=(F2,F4,F3:pPrazdna, CtrlF1:pAuto, CtrlF7:pSpotreba));   exit;
x := recno(Auto/@, PAR.kod);
if Auto[x].lpg>0 then begin lpg:=true; phm:=Auto[x].lpg
end else phm:=Auto[x].PS; end;
```

## pKP_sc (Procedure)
Keywords: dph, auto, phm

```fand
x, y, w, z, i, f, pocet, phm : real; E : record of Evi_Auto; C : record of SC;
proc(pAuto); if PAR.kod=~'' then proc(pDoprPros); if PAR.kod=~'' then exit;
x := recno(Auto/@, PAR.kod);
if Auto[x].lpg>0 then begin lpg:=true; phm:=Auto[x].lpg
end else phm:=Auto[x].PS; end;
{ evi_auto }         Par.vzd < 31 : '00:30',
e.cena_PHM := Evi_Auto[Evi_Auto.nrecs].cena_PHM; e.Kod := Par.kod;
e.zac_km   := Evi_Auto[Evi_Auto.nrecs].Kon_km;
{ evi_auto }         Par.vzd < 31 : '00:30',
e.zac_km   := Evi_Auto[Evi_Auto.nrecs].Kon_km;
```

## pVyberDod (Procedure)
Keywords: dan

```fand
PARAM.a := upcase(prompt('                 Zadajte  hľadaný reťazec : ':A,25:=' '));
```

## pVyberOdb (Procedure)
Keywords: dan

```fand
PARAM.a := upcase(prompt('                 Zadajte  hľadaný reťazec : ':A,25:=' '));
```

## pZmenKZ_AB (Procedure)
Keywords: sklad

```fand
s : record of Sklad; u : record of uhrady;
s.a := z.a;  {sklad}   s.b := z.b; writerec(s, y);
```

## pZmenKZ_AB (Procedure)
Keywords: sklad

```fand
s : record of Sklad; u : record of uhrady;
s.a := z.a;  {sklad}   s.b := z.b; writerec(s, y);
```

## pKzPol (Procedure)
Keywords: dan, vydaj, sklad

```fand
KZpolPom : file [ POPIS1:A,40; vydaj : A,1; NAKUPCENA:F,6.2; A:D,'DD.MM.YYYY';
pom : record of KZpolPom; s : record of sklad;
begin BRO := TRUE; if z.vydaj<>'t' then exit;
merge(['#I1_ SKLAD ! popis1 #O_ KZpolPom']);
'#_ KZpolPom popis1, vydaj;\13'+
PARAM.a := upcase(prompt('                 Zadajte  hľadaný reťazec : ':A,25:=' '));
recno(Sklad/iKodTov, p.intkodtov)>0 do p.intkodtov += 1;
z.z += p.spolu; x := recno(sklad/iKodTov, p.intkodtov);
```

## pREKLPol (Procedure)
Keywords: vydaj, sklad

```fand
REpolPom : file [ POPIS1:A,40; vydaj : A,1; NAKUPCENA:F,6.2; A:D,'DD.MM.YYYY';
pom : record of REpolPom; s : record of sklad;
```

## pKPpol_Spolu (Procedure)
Keywords: dph, dan

```fand
(p : record of KPpol) var x : real; sKP_pol : file [ bez_dane: F,7.2; zavazok : F,7.2 ];
merge(['#I1_ KPpol/iKPcd (d=param.c & c=param.mincas) #O_sKP_pol bez_dane := sum(I1.bez_Dph_mn); zavazok := sum(I1.s_Dph_mn)']);
```

## pDovod_KZ (Procedure)
Keywords: dph, vydaj

```fand
var dovod_Kz : file [ n : A,40; Vydaj : A,1; Aky_Vydaj : A,15 ]; e : string;
begin merge(['#I1_ Kz ! (n<>~'''' & vydaj<>~'''') ~n #O_Dovod_kz']);
'#_Dovod_Kz n, Aky_Vydaj, Vydaj; \13'+
edit(Dovod_Kz, [e], ctrl='', noed=(aky_vydaj),
if edbreak=23 then begin K.vydaj := Dovod_Kz[edrecno].vydaj;
if K.vydaj = '3' then k.DPH_1 := 0; K.n := Dovod_Kz[edrecno].n;
if K.vydaj = '3' then k.DPH := 0; setkeybuf('\13\13');
```

## pEviZakazky (Procedure)
Keywords: dph

```fand
K.zp := K.a; K.dph := udaje.sadzba; K.ds := K.a + 14;
KPp.merjedn := 'hod.'; KPp.dph := K.dph;
```

## pZak_spolu (Procedure)
Keywords: dph

```fand
gotoxy(9,24); write(' Budúce pohľadávky spolu :  bez DPH '+str(bud_sum[1].pohlad,'______0,__')+'    s DPH '+str(bud_sum[1].pohlad * (1 + (param.dph / 100)),'______0,__')+'    ');
```

## pKalendar (Procedure)
Keywords: auto

```fand
F7:pEvi_Auto, ShiftF10:pSpotrScSum))
```

## pKalendar (Procedure)
Keywords: auto

```fand
F7:pEvi_Auto, ShiftF10:pSpotrScSum))
```

## pEviPrace (Procedure)
Keywords: auto

```fand
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto))
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto));
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto))
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto));
```

## pEviPrace (Procedure)
Keywords: auto

```fand
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto))
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto));
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto))
exit=(F2,F10,AltF2:quit, F9:pPrace2SC, F8:pEvi_Auto));
```

## pPrace2sc (Procedure)
Keywords: dph, auto, phm

```fand
x, y, w, z, i, f, pocet, phm : real; E : record of Evi_Auto; C : record of SC;
proc(pAuto); if PAR.kod=~'' then proc(pDoprPros); if PAR.kod=~'' then exit;
x := recno(Auto/@, PAR.kod);
if Auto[x].lpg>0 then begin lpg:=true; phm:=Auto[x].lpg
end else phm:=Auto[x].PS; end;
{ evi_auto }         Par.vzd < 31 : '00:30',
if Evi_Auto.nrecs > 0 then e.cena_PHM := Evi_Auto[Evi_Auto.nrecs].cena_PHM
else e.cena_PHM := 0;
if Evi_Auto.nrecs > 0 then e.zac_km   := Evi_Auto[Evi_Auto.nrecs].Kon_km
{ evi_auto }         Par.vzd < 31 : '00:30',
```

## pVydajDKP (Procedure)
Keywords: vydaj

```fand
begin PARAM.a2:=recA.jc * recA.mn; PARAM.a4:=0; PARAM.a1234:=PARAM.a2; proc(pVydaj); end;
```

## pVydajZP (Procedure)
Keywords: vydaj

```fand
PARAM.a2:=recA.hz; PARAM.a1234:=PARAM.a2; PARAM.a4:=0; proc(pVydaj);
```

## pPDprerus_B (Procedure)
Keywords: dph, vydaj

```fand
Den.r := u.ra; Den.P := u.qa; den.dph:=0; den.ok := 'u';
case u.pa>0 : den.vydaj := 'O';
u.pa<0 : den.vydaj := ' '; end;
```

## pBanka_Zavaz (Procedure)
Keywords: dph, vydaj

```fand
Den.vydaj := z.vydaj; den.kodOP := z.kodOP; den.zp := z.zp;
if z.x>0 then begin den.dph := 0;
if z.y>0 then begin den.dph := z.dph_1;
if z.z>0 then begin den.dph := z.dph;
```

## pBankaVedUct (Procedure)
Keywords: dph, dan, vydaj

```fand
Den.r := FALSE; Den.P := false; den.a3 := u.pa; den.dph:=0;
den.ok := 'u'; den.vydaj := 'K';
{ begin u.ua := 'ZRÁŽKA DANE Z Ú R O K u'; den.a3 := 0;
Den.r := true; Den.P := false; den.a4 := abs(u.pa); den.dph:=0;
den.ok := 'u'; den.vydaj := 'u';
Den.r := true; Den.P := false; den.a4 := abs(u.pa); den.dph:=0;
den.ok := 'u'; den.vydaj := 'u';
Den.r := true; Den.P := false; den.a4 := abs(u.pa); den.dph:=0;
den.ok := 'u'; den.vydaj := 'u';
Den.r := true; Den.P := false; den.a4 := abs(u.pa); den.dph:=0;
```

## pBankaVybVkl (Procedure)
Keywords: dph, vydaj

```fand
Den.r := FALSE; Den.P := TRUE; den.a4 := abs(u.pa); den.dph:=0;
den.ok := 'u'; den.vydaj := 'v'; writerec(den, 0); den.a4 := 0;
Den.r := FALSE; Den.P := TRUE; den.a1 := abs(u.pa); den.dph:=0;
den.ok := 'h'; den.vydaj := 'H'; writerec(den, 0);
den.dph:=0; den.ok := 'u'; den.vydaj := 'u'; writerec(den, 0);
Den.r := FALSE; Den.P := TRUE; den.a2 := -u.pa; den.dph:=0;
den.ok := 'h'; den.vydaj := ' '; writerec(den, 0); den.a2 := 0;
Den.r := FALSE; Den.P := TRUE; den.a3 := u.pa; den.dph:=0;
den.ok := 'u'; den.vydaj := ' '; writerec(den, 0);
```

## pBanka_Pohla (Procedure)
Keywords: dph, vydaj

```fand
Den.vydaj := p.kod; den.kodOP := p.kodOP; den.dph := p.dph;
Den.a3 := (100 * u.pa) / (100 + p.dph);
```

## pBanka_Pohla (Procedure)
Keywords: dph, vydaj

```fand
Den.vydaj := p.kod; den.kodOP := p.kodOP; den.dph := p.dph;
Den.a3 := (100 * u.pa) / (100 + p.dph);
```

## pBanka_Pohla (Procedure)
Keywords: dph, vydaj

```fand
Den.vydaj := p.kod; den.kodOP := p.kodOP; den.dph := p.dph;
Den.a3 := (100 * u.pa) / (100 + p.dph);
```

## pPDprerus_V (Procedure)
Keywords: dph, dan, vydaj, mzdy

```fand
{ Spracovanie preruseni editacie PD - vydaje}
edit(Vydaje, eVydajd, mode='?y^n#L', recno=f, irec=i, cond=(pv),
if prerus=22 | prerus=24 then proc(pVydaje);
if Vydaje[f].b7 then begin            {DKP,material}
exit=((a):pIKDKP_cislo,F9:pIKdkp,(mn):pVydajDKP));
PD[pocet].r :=Vydaje[f].r; PD[pocet].p :=Vydaje[f].p;
PD[pocet].po:=Vydaje[f].d; PD[pocet].a7:=PD[pocet].a2;
if Vydaje[f].b14 then begin   {ZP}   x:=IKzp.nrecs; d:=true;
(a):pIKZP_cislo,F9:pIKzp,(rv):pVydajZP,AltF1,F3:quit))
den.a2:=PARAM.a2; den.a4:=PARAM.a4; den.r :=Vydaje[f].r;
```

## pPDprerus_P (Procedure)
Keywords: dph, vydaj

```fand
edit(Vydaje, ePrijmy, mode='?y^n#L', recno=f, irec=i, cond=(^pv),
if prerus=23 then begin                             {Vydaje}
if Vydaje[f].m | Vydaje[f].z then begin {tovar | sluzby - POHLADAVKY}
Den.vydaj := p.kod; den.kodOP := p.kodOP; den.zp := p.zp;
x := recno(vydaje/@, p.kod); { kp pd }
if x>0 then begin Den.r := vydaje[x].r; Den.p := vydaje[x].p; end;
Den.b := den.b+str(Param.uc,'___'); { kp } den.dph := p.dph;
Den.a1 := (100 * uh.pc) / (100 + p.dph); writerec(Den,0);
if Vydaje[f].b17 then begin proc(pDat1);
Den.vydaj := 'I'; den.zp := 0;
```

## pPDprerus_P (Procedure)
Keywords: dph, vydaj

```fand
edit(Vydaje, ePrijmy, mode='?y^n#L', recno=f, irec=i, cond=(^pv),
if prerus=23 then begin                             {Vydaje}
if Vydaje[f].m | Vydaje[f].z then begin {tovar | sluzby - POHLADAVKY}
Den.vydaj := p.kod; den.kodOP := p.kodOP; den.zp := p.zp;
x := recno(vydaje/@, p.kod); { kp pd }
if x>0 then begin Den.r := vydaje[x].r; Den.p := vydaje[x].p; end;
Den.b := den.b+str(Param.uc,'___'); { kp } den.dph := p.dph;
Den.a1 := (100 * uh.pc) / (100 + p.dph); writerec(Den,0);
if Vydaje[f].b17 then begin proc(pDat1);
Den.vydaj := 'I'; den.zp := 0;
```

## mPDsuma (MERGE)
Keywords: dph, dan, prijem, vydaj, auto, phm

```fand
hot_prijem:= cond(I1.r : hot_prijem);
hot_vydaj := cond(I1.r : hot_vydaj );
ucet_prijem:= cond(I1.r : ucet_prijem);
ucet_vydaj := cond(I1.r : ucet_vydaj );
dochodok := cond(I1.vydaj {prijem} ='D' : I1.a1 + I1.a3);
a7  := cond(I1.vydaj ='5' : I1.a2 + I1.a4);  { DKP                        ─┤ }
a9  := cond(I1.vydaj ='a' : I1.a2 + I1.a4);  { Odmena za Doh. o vyk. prac ─┤ }
a10 := cond(I1.vydaj ='c' : I1.a2 + I1.a4);  { Dane z Doh. o vyk. prac    ─┤ }
cond(I1.vydaj ='4' : I1.a2 + I1.a4));  { Poistne zo zakona + DDP    ─┤ }
a12 := cond(I1.vydaj ='1' : I1.a2 + I1.a4);  { Prev. rezia - vseob        ─┤ }
```

## mPDsuma_ (MERGE)
Keywords: prijem, vydaj

```fand
hot_prijem:= Sum(  hot_prijem);
hot_vydaj := Sum(  hot_vydaj );
ucet_prijem:= Sum( ucet_prijem);
ucet_vydaj := Sum( ucet_vydaj );
```

## pPDsuma (Procedure)
Keywords: dan

```fand
SumaPD[1].nezdan_suma := StraDoch[i].nezdan_suma;
```

## pTlacDokl (Procedure)
Keywords: vydaj, auto

```fand
x=3 : report(PoklDokl, rVydaje, edit);
report(PoklDokl, rVydaje, cond=(b=aa & a=dat), edit); end;
x=4 : report(Evi_Auto, rEvi_Auto, cond=(kod=par.kod), edit);
```

## pTlacDokl (Procedure)
Keywords: vydaj, auto

```fand
x=3 : report(PoklDokl, rVydaje, edit);
report(PoklDokl, rVydaje, cond=(b=aa & a=dat), edit); end;
x=4 : report(Evi_Auto, rEvi_Auto, cond=(kod=par.kod), edit);
```

## pSpRia (Procedure)
Keywords: dph, sklad

```fand
r=4  : p:='                  MOMENT, vydávam zo skladu objednané prípravky ...      ';
r=21 : p:='             Mením veľkosť DPH a OP v lekárni v položkách skladu         ';
r=23 : p:='          Mením veľkosť DPH, cla a OP v lekárni v položkách skladu       ';
r=25 : p:='                 Rozdeľujem dáta podľa účtov a veľkosti DPH ...          ';
r=27 : p:='                   MOMENT, aktualizujem stav skladu na serveri ...    ';
```

## pMen_Obdobie (Procedure)
Keywords: dan

```fand
'Ručné Zadanie',obd :
```

## pAktualDatum (Procedure)
Keywords: dan

```fand
'Ručné Zadanie',obd :
```

## pVytvorCat (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
cond ( c=2 : 'evi_auto', c=3 : 'ikdkp', c=4 : 'ikzp',
c=16 : 'fd_path', c=17 : 'ez', c=19 : 'old_auto', c=20 : 'dph');
proc(pCatS,('delf')); proc(pCatS,('sadzbdph')); proc(pCatS,('vyuctspp'));
proc(pCatS,('udajo')); proc(pCatS,('dph')); proc(pCatS,('uhrady'));
proc(pCatS,('kz')); proc(pCatS,('kzpol')); proc(pCatS,('sklad'));
proc(pCatS,('spotreba')); proc(pCatS,('vydaje')); proc(pCatS,('auto'));
```

## pCatalog (Procedure)
Keywords: dph, vydaj

```fand
cond(Catalog[c].NazSouboru<>~'dph' & c<20 &
cond(Catalog[c].NazSouboru<>~'dph' & c<19 &
cond(Catalog[c].NazSouboru<>~'dph' & c<19 &
cond(Catalog[c].NazSouboru<>~'dph' & c<19 &
forall c in Vydaje % do begin PARAM.doklad := Vydaje[c].kodvyd;
merge(['#I1_ PD (Vydaj = PARAM.doklad) #O1_ju_adr']);
Vydaje[c].pocet := ju_adr.nrecs;
forall c in sadzbDPH % do begin
if ((valdate('02.01.'+ e, 'DD.MM.YYYY') > sadzbDPH[c].od) &
(valdate('02.01.'+ e, 'DD.MM.YYYY') < sadzbDPH[c].do)) then
```

## pUvod (Procedure)
Keywords: phm

```fand
if ParamCat.nrecs=0 then appendrec(PARAMCat); {proc(pHOT_PHMdoPD);}
```

## pHlavneMenu (Procedure)
Keywords: dph, dan, sklad, auto, phm

```fand
'HaN majetok         ',B        : proc(pHm_a_Nehm);
'Kniha jázd',jazd               : proc(pEvi_Auto);
'Sklad        Eur'                : proc(pSklad);
'',,Udaje.datDPH>0:;
'DPH',,Udaje.datDPH>0           : proc(pDPH);
'Nezdan. suma, účt. straty etc.': proc(pStratyDoch);
'Sklad 2008    Sk'                : proc(pSklad2008);
```

## pOpravElSasa (Procedure)
Keywords: dph

```fand
ink.dph := 19;
if ink.el_rok>2010 then ink.dph := 20;
```

## pDruhTovaru (Procedure)
Keywords: dph

```fand
last=' Ctrl    F1Sadzby DPH         F4Tovary                               F9Hľadaj   Esc',
F1:pSadzbDPH, record:pZrusDruhTov, F4:pNovyTovar));
last=' Ctrl    F1Sadzby DPH F2Nové upres. druhu F3Výber upresnenia            F9Hľadaj   Esc',
F1:pSadzbDPH, F2,F3:quit, record:pZrusDruhTov));
if x=23 then begin param.dph:=DruhTova[re].dph; param.doklad:=DruhTova[re].b;
```

## pSumNakup (Procedure)
Keywords: dph

```fand
write(' Spolu bez DPH : '+str(param.a2,'_____0,__')+
'  DPH : '+str(param.a1-param.a2,'____0,__')+
'  s DPH : '+str(param.a1,'_____0,__')+' '); gotoxy(2,24);
```

## pSumNakRataj (Procedure)
Keywords: dph

```fand
param.a1+=n_t.spolu; param.a2+=n_t.bez_dph;
```

## pVyberObchod (Procedure)
Keywords: dph

```fand
o.spolu:=0; o.bez_dph:=0;
param.a1+=n_t.spolu; param.a2+=n_t.bez_dph;
end; o.spolu:=param.a1; o.bez_dph:=param.a2; writerec(o,x);
```

## pNakup_T (Procedure)
Keywords: dph

```fand
n_t.kod:=param.a1234; n_t.dph:=param.dph; writerec(n_t,0);
n_o.spolu:=param.a1; n_o.bez_dph:=param.a2;
```

## pZmenTovar (Procedure)
Keywords: dph

```fand
if edbreak=23 then begin n_t.dph := param.dph;
```

## pNovyTovar (Procedure)
Keywords: dph

```fand
if vyber & x=23 & y>0 then begin param.dph:=tovary[y].dph;
```

## pKodTovaru (Procedure)
Keywords: dph

```fand
tov.dph := param.dph; setkeybuf('\13\13');
```

## pKodTovaru (Procedure)
Keywords: dph

```fand
tov.dph := param.dph; setkeybuf('\13\13');
```

## pVystav (Procedure)
Keywords: dph

```fand
p.n := v.n; p.z := v.z; p.dph := 20; p.zp := v.a; p.ds := v.ds;
```

## pZav2003 (Procedure)
Keywords: dph, vydaj

```fand
p.n := ''; p.z := v.e; p.vydaj := v.t; p.zp := v.a;
p.dph := 20; p.dph_1 := 14; p.x := 0; p.y := 0; p.z := 0;
```

## pZav2003 (Procedure)
Keywords: dph, vydaj

```fand
p.n := ''; p.z := v.e; p.vydaj := v.t; p.zp := v.a;
p.dph := 20; p.dph_1 := 14; p.x := 0; p.y := 0; p.z := 0;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pKodOP_kontr (Procedure)
Keywords: dph, dan, prijem, vydaj, sklad, mzdy, auto, phm

```fand
edit(Vydaje, eVydajf, mode='^yF201#L', ctrl='',  {F201}
recno=Vydaje.nrecs, ww=(22,3,47,23,' Nov? v?daj '!,^D,^B,^A,^B));
edit(Vydaje, eVydajf, mode='^y01#L', ctrl='',
(p:record of Vydaje) var q:record of Vydaje; c,x,y : real;
if recno(Vydaje/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
forall y in PD (vydaj=PARAM.doklad & (a2>0 | a4>0)) ! % do begin
PD[y].vydaj:=p.kod; close;
forall y in KZ (vydaj=PARAM.doklad) ! % do begin
KZ[y].vydaj:=p.kod; close;
if recno(Prijmy/@, p.kod)>0 | recno(Vydaje/@, p.kod)>0 then exit;
```

## pWExport_DBF (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
merge(['#I1_ auto #O1_ dauto']);
copyfile(dauto, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dauto, nocancel);
merge(['#I1_ dph #O1_ ddph']);                         save; close;
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ kp #O1_ dkp pc := I1.z * ( 1 + (I1.dph / 100)); ']);                           save; close;
merge(['#I1_ sadzbdph #O1_ dsadzDPH']);                save; close;
copyfile(dsadzDPH, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dsadzDPH, nocancel);
```

## pWExp_DBFlas (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
merge(['#I1_ auto #O1_ dauto']);
copyfile(dauto, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dauto, nocancel);
merge(['#I1_ dph #O1_ ddph']);                         save; close;
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ sadzbdph #O1_ dsadzDPH']);                save; close;
copyfile(dsadzDPH, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dsadzDPH, nocancel);
merge(['#I1_ sklad #O1_ dsklad merjedn:=cond(I1.merjedn<>''   '' : I1.merjedn, else : ''ks'')']);                     save; close;
```

## pWExp_DBFlas (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
merge(['#I1_ auto #O1_ dauto']);
copyfile(dauto, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dauto, nocancel);
merge(['#I1_ dph #O1_ ddph']);                         save; close;
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ sadzbdph #O1_ dsadzDPH']);                save; close;
copyfile(dsadzDPH, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, dsadzDPH, nocancel);
merge(['#I1_ sklad #O1_ dsklad merjedn:=cond(I1.merjedn<>''   '' : I1.merjedn, else : ''ks'')']);                     save; close;
```

## pDBF_to_fand (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ ddph #O1_ dph']);                         save; close;
merge(['#I1_ dauto #O1_ auto']);
copyfile(auto, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, auto, nocancel);
merge(['#I1_ dph #O1_ ddph']);                         save; close;
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ sadzbdph #O1_ dsadzDPH']);                save; close;
```

## pDBF_to_fand (Procedure)
Keywords: dph, vydaj, sklad, auto

```fand
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ ddph #O1_ dph']);                         save; close;
merge(['#I1_ dauto #O1_ auto']);
copyfile(auto, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, auto, nocancel);
merge(['#I1_ dph #O1_ ddph']);                         save; close;
copyfile(ddph, 'a.txt'/var, nocancel);
copyfile('b.txt'/var, ddph, nocancel);
merge(['#I1_ sadzbdph #O1_ dsadzDPH']);                save; close;
```
