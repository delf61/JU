# Definitívna reconciliácia zdrojových dát

## Pôvod čísla 505
Požiadavka spomínala "**505 schema-mapped extraction targets**". Toto číslo nevychádza zo skutočného počtu fyzických súborov mapovaných cez schémy, ale ide o chybný matematický súčet. Predstavuje sčítanie `455` (skutočný celkový počet targets so schémou) a `50` (veľkosť prvej testovacej dávky/batchu). Keďže týchto 50 bolo integrálnou podmnožinou z celkových 455, správny finálny target extraction count je iba 455.

## Množinové porovnania (case-insensitive path matching)
- `SOURCE_513 - MAP_TARGETS` = 58
- `MAP_TARGETS - SOURCE_513` = 0
- `MAP_TARGETS - MANIFEST_SOURCES` = 0
- `MANIFEST_SOURCES - MAP_TARGETS` = 0

## Zoznam nezaradených súborov (SOURCE_513 - MAP_TARGETS)
Presný zoznam 58 `.000` súborov, ktoré nie sú v `MAP_TARGETS`:

| Relatívna cesta | Tabuľka | Rok/Adresár | V PRINTER.TXT | Schéma | Dôvod vynechania |
| --- | --- | --- | --- | --- | --- |
| `APOM.000` | `apom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `AU.000` | `au` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `BUD_SUM.000` | `bud_sum` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `BYT_LIKE.000` | `byt_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `DELF2007.000` | `delf2007` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `DELF2012/JU_PATH.000` | `ju_path` | 2012 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2015/JU_PATH.000` | `ju_path` | 2015 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2016/JU_PATH.000` | `ju_path` | 2016 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2017/JU_PATH.000` | `ju_path` | 2017 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2018/JU_PATH.000` | `ju_path` | 2018 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2019/JU_PATH.000` | `ju_path` | 2019 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2020/JU_PATH.000` | `ju_path` | 2020 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2021/JU_PATH.000` | `ju_path` | 2021 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DELF2022/JU_PATH.000` | `ju_path` | 2022 | Nie | Nie | Aplikáciou ukladaná cache cesty (ju_path) do ročných adresárov, bez dátovej štruktúry. |
| `DNY.000` | `dny` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `DOVOD_BU.000` | `dovod_bu` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `EA.000` | `ea` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `EB.000` | `eb` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `EL_POM.000` | `el_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `ELSA_POM.000` | `elsa_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `EV_POM.000` | `ev_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `EXPORT.000` | `export` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `EZZ.000` | `ezz` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `fandhlp.000` | `fandhlp` | GLOBAL | Nie | Nie | Interná PC FAND nápoveda, bez F* deklarácie, už riešená analyticky mimo JSONL. |
| `INK_LIKE.000` | `ink_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `KPPOLPO1.000` | `kppolpo1` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `KPPOM.000` | `kppom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `KRAJ.000` | `kraj` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `KZ_LIKE.000` | `kz_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `KZPOLPOM.000` | `kzpolpom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `KZPOM.000` | `kzpom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `MES_FIR.000` | `mes_fir` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `MIESTA.000` | `miesta` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `ODPISY.000` | `odpisy` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `OKRES.000` | `okres` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `POCET_EZ.000` | `pocet_ez` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `POM_PR.000` | `pom_pr` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `POM_PR1.000` | `pom_pr1` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `PRIK_POM.000` | `prik_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `REKLLIKE.000` | `rekllike` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `REPOLPOM.000` | `repolpom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `SC_POCET.000` | `sc_pocet` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SC_POM.000` | `sc_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `SKP_POL.000` | `skp_pol` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SPOT_N.000` | `spot_n` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SPOT_PO2.000` | `spot_po2` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SPOTGRAF.000` | `spotgraf` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SPP_LIKE.000` | `spp_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `SSE_LIKE.000` | `sse_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `STRATA.000` | `strata` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SUM.000` | `sum` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SUM_POL.000` | `sum_pol` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `SUP_POL.000` | `sup_pol` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `TEP_LIKE.000` | `tep_like` | GLOBAL | Nie | Nie | FAND dynamický `_like` artefakt (dočasná kópia generovaná procedúrou). |
| `TEXT_SUB.000` | `text_sub` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `U_P.000` | `u_p` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |
| `UCTY_POM.000` | `ucty_pom` | GLOBAL | Nie | Nie | FAND dočasná pracovná pamäťová tabuľka (`pom`), nedeklarovaná trvalo. |
| `VEOLLIKE.000` | `veollike` | GLOBAL | Nie | Nie | Žiadna definícia v PRINTER.TXT (systémový/dočasný artefakt) |

## Definitívna tabuľka

| Category               | Count |
| ---------------------- | ----: |
| Source `.000` files    |   513 |
| Schema-mapped targets  |   455 |
| Manifest entries       |   455 |
| Successfully extracted |   455 |
| Unmapped/no-schema     |    58 |
| Missing from manifest  |     0 |
| Stale manifest entries |     0 |

## Verdict

`SOURCE_RECONCILIATION_VERIFIED`
