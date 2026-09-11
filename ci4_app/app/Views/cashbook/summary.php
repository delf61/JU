<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad celkových súm - Peňažný denník</title>
    <!-- Theme Switcher CSS -->
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --card-bg: #1e1e1e;
            --border-color: #333;
            --th-bg: #2d2d2d;
            --hover-bg: #2a2a2a;
            --link-color: #4da3ff;
        }

        [data-theme="light"] {
            --bg-color: #f4f6f9;
            --text-color: #333;
            --card-bg: #fff;
            --border-color: #ddd;
            --th-bg: #f8f9fa;
            --hover-bg: #f9f9f9;
            --link-color: #007bff;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        .container {
            max-width: 2100px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background: var(--card-bg) !important;
            padding: 15px 20px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }
        .header h1 {
            margin: 0;
            font-size: 1.5rem;
            color: var(--text-color) !important;
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
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: var(--card-bg) !important;
            border: 1px solid var(--border-color) !important;
            border-radius: 8px;
            padding: 20px;
        }
        .card-full {
            grid-column: 1 / -1;
        }
        .card h2 {
            margin-top: 0;
            font-size: 1.2rem;
            color: var(--text-color) !important;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            background-color: var(--card-bg) !important;
            color: var(--text-color) !important;
        }
        th, td {
            padding: 10px 12px;
            text-align: right;
            border: 1px solid var(--border-color) !important;
            color: var(--text-color) !important;
            background-color: transparent !important;
        }
        th {
            background-color: var(--th-bg) !important;
            font-weight: 600;
        }
        th.text-left, td.text-left { text-align: left; }
        th.text-center, td.text-center { text-align: center; }

        tr:nth-child(even) {
            background-color: var(--hover-bg) !important;
        }

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
            border-bottom: 1px dashed var(--border-color) !important;
        }
        .summary-list li:last-child { border-bottom: none !important; }
        .summary-list li.total {
            font-weight: bold;
            border-top: 2px solid var(--border-color) !important;
            margin-top: 5px;
            padding-top: 10px;
        }

        .theme-switch-wrapper {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            z-index: 9999;
        }

        .theme-switch {
            display: inline-block;
            height: 34px;
            position: relative;
            width: 60px;
        }

        .theme-switch input { display: none; }

        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            background-color: #fff;
            bottom: 4px;
            content: "";
            height: 26px;
            left: 4px;
            position: absolute;
            transition: .4s;
            width: 26px;
            border-radius: 50%;
        }

        input:checked + .slider { background-color: #2196F3; }
        input:checked + .slider:before { transform: translateX(26px); }
        .theme-label { margin-right: 10px; font-weight: bold; }
    </style>
</head>
<body>

    <!-- Theme Switcher JS -->
    <div class="theme-switch-wrapper">
        <span class="theme-label">Téma</span>
        <label class="theme-switch" for="checkbox">
            <input type="checkbox" id="checkbox" />
            <div class="slider round"></div>
        </label>
    </div>

    <script>
        const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
        const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : 'dark';

        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
            if (currentTheme === 'light') {
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                document.documentElement.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        toggleSwitch.addEventListener('change', switchTheme, false);
    </script>

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
                Rok: <strong><?= esc($year) ?></strong> <?= $b ? " | Doklad: <strong>".esc($b)."</strong>" : "" ?> | Dátum generovania: <?= date('Y.m.d') ?>
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
                    <th colspan="3" class="text-center">Hotovosť</th>
                    <th colspan="3" class="text-center">Bankový účet</th>
                    <th rowspan="2" class="text-center" style="vertical-align: middle;">Spolu (H+Ú)</th>
                </tr>
                <tr>
                    <th class="text-center">Priebežné</th>
                    <th class="text-center">Iné</th>
                    <th class="text-center">Celkové</th>
                    <th class="text-center">Priebežné</th>
                    <th class="text-center">Iné</th>
                    <th class="text-center">Celkové</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-left font-weight-bold">Počiatočný stav</td>
                    <td colspan="3" class="text-center font-weight-bold"><?= number_format($summary['P1'], 2, '.', ' ') ?></td>
                    <td colspan="3" class="text-center font-weight-bold"><?= number_format($summary['P2'], 2, '.', ' ') ?></td>
                    <td class="font-weight-bold"><?= number_format($summary['P1'] + $summary['P2'], 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left text-success">Príjmy (+)</td>
                    <td class="text-success"><?= number_format($summary['a1_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a1_ine'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a1_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_ine'], 2, '.', ' ') ?></td>
                    <td class="text-success"><?= number_format($summary['a3_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-success font-weight-bold"><?= number_format($sum1, 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left text-danger">Výdavky (-)</td>
                    <td class="text-danger"><?= number_format($summary['a2_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a2_ine'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a2_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_priebezen'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_ine'], 2, '.', ' ') ?></td>
                    <td class="text-danger"><?= number_format($summary['a4_celkove'], 2, '.', ' ') ?></td>
                    <td class="text-danger font-weight-bold"><?= number_format($sum2, 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left font-weight-bold">Rozdiel</td>
                    <td><?= number_format($res1, 2, '.', ' ') ?></td>
                    <td><?= number_format($res2, 2, '.', ' ') ?></td>
                    <td><?= number_format($res3, 2, '.', ' ') ?></td>
                    <td><?= number_format($res4, 2, '.', ' ') ?></td>
                    <td><?= number_format($res5, 2, '.', ' ') ?></td>
                    <td><?= number_format($res6, 2, '.', ' ') ?></td>
                    <td class="font-weight-bold"><?= number_format($res7, 2, '.', ' ') ?></td>
                </tr>
                <tr>
                    <td class="text-left font-weight-bold text-primary" style="font-size: 1.1rem;">Aktuálny stav</td>
                    <td colspan="3" class="text-center font-weight-bold text-primary" style="font-size: 1.1rem;"><?= number_format($p1_res, 2, '.', ' ') ?></td>
                    <td colspan="3" class="text-center font-weight-bold text-primary" style="font-size: 1.1rem;"><?= number_format($p2_res, 2, '.', ' ') ?></td>
                    <td class="font-weight-bold text-primary" style="font-size: 1.1rem;"><?= number_format($p1_res + $p2_res, 2, '.', ' ') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="grid-container">
        <!-- 1. Stlpec: Príjmy -->
        <div class="card">
            <h2>Príjmy</h2>
            <ul class="summary-list">
                <li><span>Zdaniteľné príjmy</span> <span><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Dôchodok</span> <span><?= number_format($summary['dochodok'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Iné príjmy</span> <span>0.00 &euro;</span></li>
                <li class="total text-success"><span>Spolu zdaniteľné príjmy</span> <span><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
            </ul>
        </div>

        <!-- 2. Stlpec: Výdavky -->
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

        <!-- 3. Stlpec: Nedaňové a špecifické položky -->
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

        <!-- 4. Stlpec: Daňový základ a kalkulácia -->
        <div class="card">
            <h2>Kalkulácia dane z príjmu</h2>
            <ul class="summary-list">
                <li><span>Zdaniteľné príjmy</span> <span class="text-success"><?= number_format($summary['zdan_prijmy'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Odpočítateľné výdavky</span> <span class="text-danger">-<?= number_format($summary['odpoc_vyd'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Nezdaniteľná suma</span> <span class="text-danger">-0.00 &euro;</span></li>
                <li><span>Doplnkové dôchod. sporenie</span> <span class="text-danger">-<?= number_format($summary['dopdochspor'], 2, '.', ' ') ?> &euro;</span></li>
                <li><span>Strata z minulých rokov</span> <span class="text-danger">-0.00 &euro;</span></li>
                <li class="total" style="font-size: 1.1rem; color: var(--link-color); border-top: 2px solid var(--link-color);">
                    <span>Základ pre výpočet dane</span>
                    <span><?= number_format($summary['zaklad_pre_vyp'], 2, '.', ' ') ?> &euro;</span>
                </li>
                <li><span>Vypočítaná daň</span> <span>0.00 &euro;</span></li>
                <li><span>Daň k úhrade</span> <span>0.00 &euro;</span></li>
            </ul>
        </div>
    </div>
</div>

</body>
</html>
