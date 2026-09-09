
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad celkových súm</title>
    <style>
        body { font-family: 'Consolas', 'Courier New', Courier, monospace; background-color: #0000AA; color: #FFFFFF; padding: 20px; }
        pre { font-size: 16px; line-height: 1.2; letter-spacing: 0px; white-space: pre; margin: 0; }
        .highlight { color: #55FFFF; font-weight: bold; }
        .dos-frame { border: none; }
        a { color: #55FFFF; text-decoration: none; background: #000; padding: 2px 10px; border: 1px solid #55FFFF; }
        a:hover { color: #FFF; border-color: #FFF; }
        .nav { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>">F1 Späť na Peňažný denník</a>
    </div>
<?php
// Pomocna funkcia na presne zarovnanie cisel (F,6.2) a textu
function f($num, $len = 10) { return str_pad(number_format($num, 2, '.', ''), $len, ' ', STR_PAD_LEFT); }
function s($str, $len) { return str_pad($str, $len, ' ', STR_PAD_RIGHT); }

$res1 = $summary['a1_priebezen'] - $summary['a2_priebezen'];
$res2 = $summary['a1_ine'] - $summary['a2_ine'];
$res3 = $summary['a1_celkove'] - $summary['a2_celkove'];
$res4 = $summary['a3_priebezen'] - $summary['a4_priebezen'];
$res5 = $summary['a3_ine'] - $summary['a4_ine'];
$res6 = $summary['a3_celkove'] - $summary['a4_celkove'];
$res7 = ($summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove']) - ($summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove']);

$sum1 = $summary['a1_priebezen']+$summary['a1_ine']+$summary['a1_celkove']+$summary['a3_priebezen']+$summary['a3_ine']+$summary['a3_celkove'];
$sum2 = $summary['a2_priebezen']+$summary['a2_ine']+$summary['a2_celkove']+$summary['a4_priebezen']+$summary['a4_ine']+$summary['a4_celkove'];

$p1_res = $summary['P1'] + $res1 + $res2 + $res3;
$p2_res = $summary['P2'] + $res4 + $res5 + $res6;

$str_b = $b ? "BV Č.X - " . esc($b) : "";

?>
<pre class="dos-frame">
                            DATOVÝ EDITOR                    Prehľad celkových súm                <?= date('d.m.y') ?>
╔════════════   <?= str_pad(esc($year), 16, ' ', STR_PAD_RIGHT) ?><?= str_pad($str_b, 30, ' ', STR_PAD_RIGHT) ?> ════════════╗
║                <span class="highlight">Hotovosť                            Účet</span>                      ║
║          <?= f($summary['P1']) ?> ──────── POČ.STAV ─── <?= f($summary['P2']) ?>                     ║
║          ┌──────────┼──────────┐          ┌──────────┼──────────┐            ║
║     <span class="highlight">Priebež.      Iné      Celkové     Priebež.    Iné      Celkové   H+Ú</span>    ║
║ <span class="highlight">+</span>   <?= f($summary['a1_priebezen']) ?> <?= f($summary['a1_ine']) ?> <?= f($summary['a1_celkove']) ?>   <?= f($summary['a3_priebezen']) ?> <?= f($summary['a3_ine']) ?> <?= f($summary['a3_celkove']) ?> <?= f($sum1) ?> <span class="highlight">+</span>║
║ <span class="highlight">-</span>   <?= f($summary['a2_priebezen']) ?> <?= f($summary['a2_ine']) ?> <?= f($summary['a2_celkove']) ?>   <?= f($summary['a4_priebezen']) ?> <?= f($summary['a4_ine']) ?> <?= f($summary['a4_celkove']) ?> <?= f($sum2) ?> <span class="highlight">-</span>║
║───────────────────────────────────────────────────────────────────────────── ║
║ <span class="highlight">=</span>   <?= f($res1) ?> <?= f($res2) ?> <?= f($res3) ?>   <?= f($res4) ?> <?= f($res5) ?> <?= f($res6) ?> <?= f($res7) ?> <span class="highlight">=</span>║
║          └──────────┼──────────┘          └──────────┼──────────┘            ║
║          <?= f($p1_res) ?> ──────── AKT.STAV ─── <?= f($p2_res) ?>  auto       0.00 ─┐ ║
║                                                             SC <?= f($summary['sc_spolu'] ?? 0) ?> ─┤ ║
║   PHM > SC <?= f($summary['phm_sc']) ?>    Zdanit. príjmy <?= f($summary['zdan_prijmy']) ?>         iné <?= f($summary['ine_vydaje']) ?> ─┤ ║
║   os. účet <?= f($summary['os_ucet']) ?>    Dôchodok       <?= f($summary['dochodok']) ?>      všeob. <?= f($summary['vseob']) ?> ─┤ ║
║   daň z pr.<?= f($summary['dan_z_pr']) ?>    DopDochSpor  - <?= f($summary['dopdochspor']) ?>       banka <?= f($summary['banka']) ?> ─┤ ║
║        DPH <?= f($summary['dph']) ?>    Odpoč. výd.  - <?= f($summary['odpoc_vyd']) ?> ─┬─ réžia      <?= f($summary['rezia']) ?> ─┘ ║
║  nák.HaNIM <?= f($summary['nak_hanim']) ?>    Nezdan. suma -       0.00  ├─ leasing    <?= f($summary['leasing']) ?>    ║
║                          ─────────────────────────  ├─ poistné    <?= f($summary['poistne']) ?>    ║
║     HaN IM       0.00   Základ pre výp. <?= f($summary['zaklad_pre_vyp']) ?>  ├─ tovar      <?= f($summary['tovar']) ?>    ║
║  Po odpise       0.00      Daň z príjmu       0.00  ├─ odpisy     <?= f($summary['odpisy']) ?>    ║
║ min. príjmy pre odvod       strata <?=esc($year-1)?>       0.00  ├─ D.HaN M.   <?= f($summary['d_han_m']) ?>    ║
║ do SocPoi        0.00      daň k úhrade       0.00  └─ Vyk.prác   <?= f($summary['vyk_prac']) ?>    ║
╚  akt. pol.    <span class="highlight">P</span> <?= f($summary['akt_pol_p']) ?>    <span class="highlight">I</span> <?= f($summary['akt_pol_i']) ?>    <span class="highlight">C</span> <?= f($summary['akt_pol_c']) ?>    <?= s(esc($summary['akt_pol_hotovost_ucet']), 10) ?>   ═════════════╝
</pre>
</body>
</html>
