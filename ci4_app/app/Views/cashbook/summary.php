<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad celkových súm - Peňažný denník</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f6f9;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .header h1 {
            margin: 0;
            font-size: 1.5rem;
            color: #2c3e50;
        }
        .btn-back {
            display: inline-block;
            padding: 8px 15px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 500;
        }
        .btn-back:hover { background-color: #0056b3; }

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        .card {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .card-full {
            grid-column: 1 / -1;
        }
        .card h2 {
            margin-top: 0;
            font-size: 1.2rem;
            color: #34495e;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
        }
        th, td {
            padding: 10px 12px;
            text-align: right;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #f8f9fa;
            color: #495057;
            font-weight: 600;
        }
        th.text-left, td.text-left { text-align: left; }
        th.text-center, td.text-center { text-align: center; }

        .table-striped tbody tr:nth-of-type(odd) { background-color: #f9f9f9; }
        .font-weight-bold { font-weight: bold; }
        .text-success { color: #28a745; }
        .text-danger { color: #dc3545; }
        .text-primary { color: #007bff; }

        .summary-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .summary-list li {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px dashed #eee;
        }
        .summary-list li:last-child { border-bottom: none; }
        .summary-list li.total {
            font-weight: bold;
            border-top: 2px solid #ddd;
            margin-top: 5px;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<?php
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
?>

<div class="container">
    <div class="header">
        <div>
            <h1>Sumár peňažného denníka</h1>
            <div style="color: #6c757d; font-size: 0.9rem; margin-top: 5px;">
                Rok: <strong><?= esc($year) ?></strong> <?= $b ? " | Doklad: <strong>".esc($b)."</strong>" : "" ?> | Dátum generovania: <?= date('d.m.Y') ?>
            </div>
        </div>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>" class="btn-back">Späť na Peňažný denník</a>
    </div>

    <!-- Zostatky a obraty (Karta 1) -->
    <div class="card card-full" style="margin-bottom: 20px;">
        <h2>Prehľad zostatkov a pohybov</h2>
        <table>
            <thead>
                <tr>
                    <th rowspan="2" class="text-left" style="vertical-align: middle;">Položka</th>
                    <th colspan="3" class="text-center" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">Hotovosť</th>
                    <th colspan="3" class="text-center">Bankový účet</th>
                    <th rowspan="2" style="vertical-align: middle; border-left: 1px solid #ddd;">Spolu (H+Ú)</th>
                </tr>
                <tr>
                    <th class="text-center" style="border-left: 1px solid #ddd;">Priebežné</th>
                    <th class="text-center">Iné</th>
                    <th class="text-center" style="border-right: 1px solid #ddd;">Celkové</th>
                    <th class="text-center">Priebežné</th>
                    <th class="text-center">Iné</th>
                    <th class="text-center">Celkové</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left font-weight-bold">Počiatočný stav</td>
                    <td colspan="3" class="text-center font-weight-bold" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd; background: #f8f9fa;"><?= number_format($summary['P1'], 2, '.', ' ') ?></td>
                    <td colspan="3" class="text-center font-weight-bold" style="background: #f8f9fa;"><?= number_format($summary['P2'], 2, '.', ' ') ?></td>
                    <td class="font-weight-bold" style="border-left: 1px solid #ddd; background: #f8f9fa;"><?= number_format($summary['P1'] + $summary['P2'], 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left text-success">Príjmy (+)</td>
                    <td class="text-success" style="border-left: 1px solid #ddd;"><?= number_format($summary['a1_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a1_ine'], 2, '.', ' ') ?></td>
                    <td class="text-success" style="border-right: 1px solid #ddd;"><?= number_format($summary['a1_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_ine'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-success font-weight-bold" style="border-left: 1px solid #ddd;"><?= number_format($sum1, 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left text-danger">Výdavky (-)</td>
                    <td class="text-danger" style="border-left: 1px solid #ddd;"><?= number_format($summary['a2_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a2_ine'], 2, '.', ' ') ?></td>
                    <td class="text-danger" style="border-right: 1px solid #ddd;"><?= number_format($summary['a2_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_ine'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-danger font-weight-bold" style="border-left: 1px solid #ddd;"><?= number_format($sum2, 2, '.', ' ') ?></td>
                </tr>
                <tr style="background: #fdfdfe;">
                    <td class="text-left font-weight-bold">Rozdiel</td>
                    <td style="border-left: 1px solid #ddd;"><?= number_format($res1, 2, '.', ' ') ?></td>
                    <td><?= number_format($res2, 2, '.', ' ') ?></td>
                    <td style="border-right: 1px solid #ddd;"><?= number_format($res3, 2, '.', ' ') ?></td>
                    <td><?= number_format($res4, 2, '.', ' ') ?></td>
                    <td><?= number_format($res5, 2, '.', ' ') ?></td>
                    <td><?= number_format($res6, 2, '.', ' ') ?></td>
                    <td class="font-weight-bold" style="border-left: 1px solid #ddd;"><?= number_format($res7, 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left font-weight-bold text-primary" style="font-size: 1.1rem;">Aktuálny stav</td>
                    <td colspan="3" class="text-center font-weight-bold text-primary" style="font-size: 1.1rem; border-left: 1px solid #ddd; border-right: 1px solid #ddd; background: #e9ecef;"><?= number_format($p1_res, 2, '.', ' ') ?></td>
                    <td colspan="3" class="text-center font-weight-bold text-primary" style="font-size: 1.1rem; background: #e9ecef;"><?= number_format($p2_res, 2, '.', ' ') ?></td>
                    <td class="font-weight-bold text-primary" style="font-size: 1.1rem; border-left: 1px solid #ddd; background: #e9ecef;"><?= number_format($p1_res + $p2_res, 2, '.', ' ') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grid-container">
        <!-- Príjmy -->
        <div class="card">
            <h2>Príjmy</h2>
            <ul class="summary-list">
                <li><span>Zdaniteľné príjmy</span> <span><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Dôchodok</span> <span><?= number_format($summary['dochodok'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Iné príjmy</span> <span>0.00 &euro;</span></li>
                <li class="total text-success"><span>Spolu zdaniteľné príjmy</span> <span><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
            </ul>
        </div>

        <!-- Výdavky -->
        <div class="card">
            <h2>Odpočítateľné výdavky</h2>
            <ul class="summary-list">
                <li><span>Réžia (všeob.)</span> <span><?= number_format($summary['rezia'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Leasing</span> <span><?= number_format($summary['leasing'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Poistné</span> <span><?= number_format($summary['poistne'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Tovar</span> <span><?= number_format($summary['tovar'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Odpisy</span> <span><?= number_format($summary['odpisy'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Drobný HaN majetok</span> <span><?= number_format($summary['d_han_m'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Vykonané práce</span> <span><?= number_format($summary['vyk_prac'], 2, '.', ' ') ?> &euro;</span></li>
                <li class="total text-danger"><span>Spolu odpoč. výdavky</span> <span><?= number_format($summary['odpoc_vyd'], 2, '.', ' ') ?> &euro;</span></li>
            </ul>
        </div>

        <!-- Nedaňové a iné položky -->
        <div class="card">
            <h2>Nedaňové a špecifické položky</h2>
            <ul class="summary-list">
                <li><span>PHM (Služ. cesty)</span> <span><?= number_format($summary['phm_sc'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Služobné cesty (Kniha jázd)</span> <span><?= number_format($summary['sc_spolu'] ?? 0, 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Auto paušál</span> <span>0.00 &euro;</span></li>
                <li><span>DPH</span> <span><?= number_format($summary['dph'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Osobný účet</span> <span><?= number_format($summary['os_ucet'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Nákup HaN IM</span> <span><?= number_format($summary['nak_hanim'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Daň z príjmu (zaplatená)</span> <span><?= number_format($summary['dan_z_pr'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Banka</span> <span><?= number_format($summary['banka'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Iné nedaň. výdavky</span> <span><?= number_format($summary['ine_vydaje'], 2, '.', ' ') ?> &euro;</span></li>
            </ul>
        </div>

        <!-- Daňový základ a kalkulácia -->
        <div class="card" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
            <h2>Kalkulácia dane z príjmu</h2>
            <ul class="summary-list">
                <li><span>Zdaniteľné príjmy</span> <span class="text-success"><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Odpočítateľné výdavky</span> <span class="text-danger">-<?= number_format($summary['odpoc_vyd'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Nezdaniteľná suma</span> <span class="text-danger">-0.00 &euro;</span></li>
                <li><span>Doplnkové dôchod. sporenie</span> <span class="text-danger">-<?= number_format($summary['dopdochspor'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Strata z minulých rokov</span> <span class="text-danger">-0.00 &euro;</span></li>
                <li class="total" style="font-size: 1.2rem; color: #007bff; border-top: 2px solid #007bff;">
                    <span>Základ pre výpočet dane</span>
                    <span><?= number_format($summary['zaklad_pre_vyp'], 2, '.', ' ') ?> &euro;</span>
                </li>
                <li><span>Vypočítaná daň</span> <span>0.00 &euro;</span></li>
                <li><span>Daň k úhrade</span> <span>0.00 &euro;</span></li>
            </ul>
        </div>
    </div>

    <div class="card card-full" style="margin-bottom: 40px; background-color: #eef2f5;">
        <h2 style="border-bottom-color: #d1d8e0;">Detail aktívnej položky z gridu</h2>
        <div style="display: flex; gap: 30px;">
            <div><strong>Priebežná:</strong> <?= number_format($summary['akt_pol_p'], 2, '.', ' ') ?> &euro;</div>
            <div><strong>Iná:</strong> <?= number_format($summary['akt_pol_i'], 2, '.', ' ') ?> &euro;</div>
            <div><strong>Celková:</strong> <?= number_format($summary['akt_pol_c'], 2, '.', ' ') ?> &euro;</div>
            <div><strong>Účet/Hotovosť:</strong> <span class="text-primary"><?= esc($summary['akt_pol_hotovost_ucet'] ?: 'Nešpecifikované') ?></span></div>
        </div>
    </div>

</div>

</body>
</html>
