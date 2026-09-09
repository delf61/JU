
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Sumár po akt. pol. (pPDsuma)</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
    </style>
</head>
<body>
    <h1>Sumár po akt. pol. za rok <?= esc($year) ?> (pPDsuma)</h1>
    <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>">Späť na Peňažný denník</a>

    <table>
        <tbody>
            <tr>
                <th>Príjmy celkom</th>
                <td class="text-right"><?= number_format($summary['prijmy_celkom'], 2, '.', '') ?></td>
            </tr>
            <tr>
                <th>Výdavky celkom</th>
                <td class="text-right"><?= number_format($summary['vydaje_celkom'], 2, '.', '') ?></td>
            </tr>
            <tr>
                <th>Z toho DPH (Výdaj)</th>
                <td class="text-right"><?= number_format($summary['dph_vydaj'], 2, '.', '') ?></td>
            </tr>
            <tr>
                <th>Základ dane</th>
                <td class="text-right"><strong><?= number_format($summary['zaklad_dane'], 2, '.', '') ?></strong></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
