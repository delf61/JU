
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad celkových súm</title>
    <style>
        body { font-family: monospace; margin: 20px; background-color: #000; color: #fff; }
        .dos-table { border: 2px solid #aaa; padding: 10px; width: 800px; display: inline-block; }
        .row { display: flex; justify-content: space-between; }
        .col { flex: 1; text-align: right; padding: 0 5px; }
        .col-left { text-align: left; }
        .col-center { text-align: center; }
        .line { border-bottom: 1px dashed #aaa; margin: 5px 0; }
        .solid-line { border-bottom: 1px solid #aaa; margin: 5px 0; }
        a { color: #0f0; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div style="margin-bottom: 20px;">
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>">[ESC] Späť na Peňažný denník</a>
    </div>

    <div class="dos-table">
        <div class="row">
            <div class="col col-left" style="flex: 2;">DATOVÝ EDITOR</div>
            <div class="col col-center" style="flex: 3;">Prehľad celkových súm</div>
            <div class="col col-right" style="flex: 2;"><?= date('d.m.y') ?></div>
        </div>
        <div class="solid-line"></div>

        <div class="row">
            <div class="col col-center" style="flex: 1;">Hotovosť</div>
            <div class="col col-center" style="flex: 1;">Účet</div>
        </div>

        <div class="row">
            <div class="col"><?= number_format($summary['P1'], 2, '.', '') ?></div>
            <div class="col col-center">──────── POČ.STAV ───</div>
            <div class="col"><?= number_format($summary['P2'], 2, '.', '') ?></div>
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="col col-center">Priebež.</div>
            <div class="col col-center">Iné</div>
            <div class="col col-center">Celkové</div>
            <div class="col col-center">Priebež.</div>
            <div class="col col-center">Iné</div>
            <div class="col col-center">Celkové</div>
            <div class="col col-center">H+Ú</div>
        </div>

        <div class="row">
            <div class="col-left">+</div>
            <div class="col"><?= number_format($summary['a1_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a3_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove'], 2, '.', '') ?></div>
            <div class="col-left">+</div>
        </div>

        <div class="row">
            <div class="col-left">-</div>
            <div class="col"><?= number_format($summary['a2_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_priebezen'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_ine'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a4_celkove'], 2, '.', '') ?></div>
            <div class="col"><?= number_format($summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove'], 2, '.', '') ?></div>
            <div class="col-left">-</div>
        </div>

        <div class="line"></div>

        <?php
            $res1 = $summary['a1_priebezen'] - $summary['a2_priebezen'];
            $res2 = $summary['a1_ine'] - $summary['a2_ine'];
            $res3 = $summary['a1_celkove'] - $summary['a2_celkove'];
            $res4 = $summary['a3_priebezen'] - $summary['a4_priebezen'];
            $res5 = $summary['a3_ine'] - $summary['a4_ine'];
            $res6 = $summary['a3_celkove'] - $summary['a4_celkove'];
            $res7 = ($summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove']) - ($summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove']);
        ?>
        <div class="row">
            <div class="col-left">=</div>
            <div class="col"><?= number_format($res1, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res2, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res3, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res4, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res5, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res6, 2, '.', '') ?></div>
            <div class="col"><?= number_format($res7, 2, '.', '') ?></div>
            <div class="col-left">=</div>
        </div>

        <div class="line"></div>

        <div class="row">
            <div class="col col-center"></div>
            <div class="col"><?= number_format($summary['P1'] + $res1 + $res2 + $res3, 2, '.', '') ?></div>
            <div class="col col-center">──────── AKT.STAV ───</div>
            <div class="col"><?= number_format($summary['P2'] + $res4 + $res5 + $res6, 2, '.', '') ?></div>
            <div class="col-left"> auto</div>
            <div class="col">0.00</div>
        </div>
        <div class="row">
            <div class="col" style="flex: 4;"></div>
            <div class="col-left"> SC</div>
            <div class="col">0.00</div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="col-left">PHM > SC</div><div class="col"><?= number_format($summary['phm_sc'], 2, '.', '') ?></div>
            <div class="col-left">Zdanit. príjmy</div><div class="col"><?= number_format($summary['zdan_prijmy'], 2, '.', '') ?></div>
            <div class="col-left">iné</div><div class="col"><?= number_format($summary['ine_vydaje'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">os. účet</div><div class="col"><?= number_format($summary['os_ucet'], 2, '.', '') ?></div>
            <div class="col-left">Dôchodok</div><div class="col"><?= number_format($summary['dochodok'], 2, '.', '') ?></div>
            <div class="col-left">všeob.</div><div class="col"><?= number_format($summary['vseob'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">daň z pr.</div><div class="col"><?= number_format($summary['dan_z_pr'], 2, '.', '') ?></div>
            <div class="col-left">DopDochSpor</div><div class="col"><?= number_format($summary['dopdochspor'], 2, '.', '') ?></div>
            <div class="col-left">banka</div><div class="col"><?= number_format($summary['banka'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">DPH</div><div class="col"><?= number_format($summary['dph'], 2, '.', '') ?></div>
            <div class="col-left">Odpoč. výd.</div><div class="col">-<?= number_format($summary['odpoc_vyd'], 2, '.', '') ?></div>
            <div class="col-left">réžia</div><div class="col"><?= number_format($summary['rezia'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">nák.HaNIM</div><div class="col"><?= number_format($summary['nak_hanim'], 2, '.', '') ?></div>
            <div class="col-left">Nezdan. suma</div><div class="col">-0.00</div>
            <div class="col-left">leasing</div><div class="col"><?= number_format($summary['leasing'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left"></div><div class="col"></div>
            <div class="col-left">Základ pre výp.</div><div class="col"><?= number_format($summary['zaklad_pre_vyp'], 2, '.', '') ?></div>
            <div class="col-left">poistné</div><div class="col"><?= number_format($summary['poistne'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">HaN IM</div><div class="col">0.00</div>
            <div class="col-left">Daň z príjmu</div><div class="col">0.00</div>
            <div class="col-left">tovar</div><div class="col"><?= number_format($summary['tovar'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">Po odpise</div><div class="col">0.00</div>
            <div class="col-left">strata 2025</div><div class="col">0.00</div>
            <div class="col-left">odpisy</div><div class="col"><?= number_format($summary['odpisy'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">min. príjmy pre odvod</div><div class="col"></div>
            <div class="col-left">daň k úhrade</div><div class="col">0.00</div>
            <div class="col-left">D.HaN M.</div><div class="col"><?= number_format($summary['d_han_m'], 2, '.', '') ?></div>
        </div>
        <div class="row">
            <div class="col-left">do SocPoi</div><div class="col">0.00</div>
            <div class="col-left"></div><div class="col"></div>
            <div class="col-left">Vyk.prác</div><div class="col"><?= number_format($summary['vyk_prac'], 2, '.', '') ?></div>
        </div>

        <div class="solid-line"></div>
        <div class="row">
            <div class="col-left">akt. pol.</div>
            <div class="col-left">P</div><div class="col-left"><?= number_format($summary['akt_pol_p'], 2, '.', '') ?></div>
            <div class="col-left">I</div><div class="col-left"><?= number_format($summary['akt_pol_i'], 2, '.', '') ?></div>
            <div class="col-left">C</div><div class="col-left"><?= number_format($summary['akt_pol_c'], 2, '.', '') ?></div>
            <div class="col-left"><?= esc($summary['akt_pol_hotovost_ucet']) ?></div>
        </div>

    </div>
</body>
</html>
