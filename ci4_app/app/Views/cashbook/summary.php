
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad celkových súm</title>
    <style>
        :root {
            --dos-blue: #0000AA;
            --dos-gray: #AAAAAA;
            --dos-white: #FFFFFF;
            --dos-cyan: #00AAAA;
            --dos-border: #55FFFF;
        }
        body {
            font-family: 'Courier New', Courier, monospace;
            margin: 0;
            padding: 20px;
            background-color: var(--dos-blue);
            color: var(--dos-white);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header {
            width: 820px;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            color: var(--dos-gray);
        }
        .header a {
            color: var(--dos-cyan);
            text-decoration: none;
            background: black;
            padding: 2px 10px;
            border: 1px solid var(--dos-cyan);
        }
        .header a:hover {
            color: var(--dos-white);
            border-color: var(--dos-white);
        }
        .dos-frame {
            border: 2px solid var(--dos-border);
            padding: 15px 25px;
            width: 820px;
            box-sizing: border-box;
            box-shadow: 10px 10px 0px rgba(0,0,0,0.5);
            background-color: var(--dos-blue);
        }
        .dos-title {
            text-align: center;
            font-weight: bold;
            color: var(--dos-cyan);
            margin-bottom: 10px;
            letter-spacing: 2px;
        }
        .row { display: flex; justify-content: space-between; align-items: center; line-height: 1.4; }
        .col { flex: 1; text-align: right; padding: 0 5px; white-space: pre; }
        .col-left { text-align: left; }
        .col-center { text-align: center; }
        .line { border-bottom: 1px dashed var(--dos-gray); margin: 5px 0; }
        .solid-line { border-bottom: 1px solid var(--dos-border); margin: 10px 0; }

        .tree-line { color: var(--dos-gray); }
        .highlight { color: var(--dos-cyan); font-weight: bold; }
        .sign { color: var(--dos-cyan); width: 15px; display: inline-block; }
    </style>
</head>
<body>
    <div class="header">
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>">F1 Späť na Peňažný denník</a>
        <span>DATOVÝ EDITOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Prehľad celkových súm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= date('d.m.y') ?></span>
    </div>

    <div class="dos-frame">
        <div class="dos-title">ROK <?= esc($year) ?> <?= $b ? " - Doklad: ".esc($b) : "" ?></div>

        <div class="row highlight" style="margin-bottom: 5px;">
            <div class="col col-center" style="flex: 1;">Hotovosť</div>
            <div class="col col-center" style="flex: 1;">Účet</div>
        </div>

        <div class="row">
            <div class="col"><?= number_format($summary['P1'], 2, '.', '') ?></div>
            <div class="col col-center tree-line">──────── POČ.STAV ───</div>
            <div class="col"><?= number_format($summary['P2'], 2, '.', '') ?></div>
        </div>

        <div class="row tree-line">
            <div class="col col-center">┌──────────┼──────────┐</div>
            <div class="col col-center"></div>
            <div class="col col-center">┌──────────┼──────────┐</div>
        </div>

        <div class="row highlight">
            <div class="sign"></div>
            <div class="col col-center">Priebež.</div>
            <div class="col col-center">Iné</div>
            <div class="col col-center">Celkové</div>
            <div class="col col-center">Priebež.</div>
            <div class="col col-center">Iné</div>
            <div class="col col-center">Celkové</div>
            <div class="col col-center">H+Ú</div>
            <div class="sign"></div>
        </div>

        <div class="row">
            <div class="sign">+</div>
            <div class="col"><?= number_format($summary['a1_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove'], 2, '.', '') ?></div>
            <div class="sign">+</div>
        </div>

        <div class="row">
            <div class="sign">-</div>
            <div class="col"><?= number_format($summary['a2_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove'], 2, '.', '') ?></div>
            <div class="sign">-</div>
        </div>

        <div class="solid-line"></div>

        <?php
            $res1 = $summary['a1_priebezen'] - $summary['a2_priebezen'];
            $res2 = $summary['a1_ine'] - $summary['a2_ine'];
            $res3 = $summary['a1_celkove'] - $summary['a2_celkove'];
            $res4 = $summary['a3_priebezen'] - $summary['a4_priebezen'];
            $res5 = $summary['a3_ine'] - $summary['a4_ine'];
            $res6 = $summary['a3_celkove'] - $summary['a4_celkove'];
            $res7 = ($summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove']) - ($summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove']);
        ?>
        <div class="row highlight">
            <div class="sign">=</div>
            <div class="col"><?= number_format($res1, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res2, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res3, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res4, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res5, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res6, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res7, 2, '.', '') ?></div>
            <div class="sign">=</div>
        </div>

        <div class="row tree-line">
            <div class="sign"></div>
            <div class="col col-center">└──────────┼──────────┘</div>
            <div class="col col-center"></div>
            <div class="col col-center">└──────────┼──────────┘</div>
            <div class="col col-center"></div>
            <div class="sign"></div>
        </div>

        <div class="row highlight">
            <div class="col col-center" style="flex:0.5;"></div>
            <div class="col" style="flex:2;"><?= number_format($summary['P1'] + $res1 + $res2 + $res3, 2, '.', '') ?></div>
            <div class="col col-center tree-line" style="flex:2;">──────── AKT.STAV ───</div>
            <div class="col" style="flex:2;"><?= number_format($summary['P2'] + $res4 + $res5 + $res6, 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1;"> auto</div>
            <div class="col" style="flex:1;">0.00</div>
            <div class="col-left tree-line" style="flex:0.5;">─┐</div>
        </div>
        <div class="row">
            <div class="col" style="flex: 7.5;"></div>
            <div class="col-left tree-line" style="flex:1;"> SC</div>
            <div class="col" style="flex:1;">0.00</div>
            <div class="col-left tree-line" style="flex:0.5;">─┤</div>
        </div>

        <div class="row" style="margin-top: 5px;">
            <div class="col-left tree-line" style="flex:2;">PHM > SC</div><div class="col" style="flex:1;"><?= number_format($summary['phm_sc'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">Zdanit. príjmy</div><div class="col" style="flex:2;"><?= number_format($summary['zdan_prijmy'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1; padding-left:15px;">iné</div><div class="col" style="flex:1;"><?= number_format($summary['ine_vydaje'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;">─┤</div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">os. účet</div><div class="col" style="flex:1;"><?= number_format($summary['os_ucet'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">Dôchodok</div><div class="col" style="flex:2;"><?= number_format($summary['dochodok'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1; padding-left:15px;">všeob.</div><div class="col" style="flex:1;"><?= number_format($summary['vseob'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;">─┤</div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">daň z pr.</div><div class="col" style="flex:1;"><?= number_format($summary['dan_z_pr'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">DopDochSpor</div><div class="col" style="flex:2;">-<?= number_format($summary['dopdochspor'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1; padding-left:15px;">banka</div><div class="col" style="flex:1;"><?= number_format($summary['banka'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;">─┤</div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2; padding-left:15px;">DPH</div><div class="col" style="flex:1;"><?= number_format($summary['dph'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">Odpoč. výd.</div><div class="col" style="flex:2;">-<?= number_format($summary['odpoc_vyd'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1;">─┬─ réžia</div><div class="col" style="flex:1;"><?= number_format($summary['rezia'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;">─┘</div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">nák.HaNIM</div><div class="col" style="flex:1;"><?= number_format($summary['nak_hanim'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">Nezdan. suma</div><div class="col" style="flex:2;">-0.00</div>
            <div class="col-left tree-line" style="flex:1;"> ├─ leasing</div><div class="col" style="flex:1;"><?= number_format($summary['leasing'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;"></div><div class="col" style="flex:1;"></div>
            <div class="col-center tree-line" style="flex:4.5;">─────────────────────────</div>
            <div class="col-left tree-line" style="flex:1;"> ├─ poistné</div><div class="col" style="flex:1;"><?= number_format($summary['poistne'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2; padding-left:15px;">HaN IM</div><div class="col" style="flex:1;">0.00</div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:15px;">Základ pre výp.</div><div class="col highlight" style="flex:2;"><?= number_format($summary['zaklad_pre_vyp'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:1;"> ├─ tovar</div><div class="col" style="flex:1;"><?= number_format($summary['tovar'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">Po odpise</div><div class="col" style="flex:1;">0.00</div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:25px;">Daň z príjmu</div><div class="col" style="flex:2;">0.00</div>
            <div class="col-left tree-line" style="flex:1;"> ├─ odpisy</div><div class="col" style="flex:1;"><?= number_format($summary['odpisy'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">min. príjmy</div><div class="col" style="flex:1;"></div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:35px;">strata 2025</div><div class="col" style="flex:2;">0.00</div>
            <div class="col-left tree-line" style="flex:1;"> ├─ D.HaN M.</div><div class="col" style="flex:1;"><?= number_format($summary['d_han_m'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>
        <div class="row">
            <div class="col-left tree-line" style="flex:2;">do SocPoi</div><div class="col" style="flex:1;">0.00</div>
            <div class="col-left tree-line" style="flex:2.5; padding-left:35px;">daň k úhrade</div><div class="col" style="flex:2;">0.00</div>
            <div class="col-left tree-line" style="flex:1;"> └─ Vyk.prác</div><div class="col" style="flex:1;"><?= number_format($summary['vyk_prac'], 2, '.', '') ?></div>
            <div class="col-left tree-line" style="flex:0.5;"></div>
        </div>

        <div class="solid-line"></div>
        <div class="row">
            <div class="col-left tree-line" style="flex:1.5;">akt. pol.</div>
            <div class="col-left highlight" style="flex:0.5;">P</div><div class="col-left" style="flex:1;"><?= number_format($summary['akt_pol_p'], 2, '.', '') ?></div>
            <div class="col-left highlight" style="flex:0.5;">I</div><div class="col-left" style="flex:1;"><?= number_format($summary['akt_pol_i'], 2, '.', '') ?></div>
            <div class="col-left highlight" style="flex:0.5;">C</div><div class="col-left" style="flex:1;"><?= number_format($summary['akt_pol_c'], 2, '.', '') ?></div>
            <div class="col-left" style="flex:2;"><?= esc($summary['akt_pol_hotovost_ucet']) ?></div>
            <div class="col" style="flex:2;"></div>
        </div>

    </div>
</body>
</html>
