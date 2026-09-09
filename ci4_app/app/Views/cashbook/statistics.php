
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Štatistika (pStatist)</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: right; }
        th { background-color: #f2f2f2; text-align: center; }
        .text-left { text-align: left; }
    </style>
</head>
<body>
    <h1>Štatistika za rok <?= esc($year) ?> (pStatist)</h1>
    <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>">Späť na Peňažný denník</a>

    <table>
        <thead>
            <tr>
                <th class="text-left">Mesiac</th>
                <th>Príjmy celkom</th>
                <th>Výdavky celkom</th>
                <th>Zisk / Strata</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stats as $month => $data): ?>
            <tr>
                <td class="text-left"><?= $month ?>. mesiac</td>
                <td><?= number_format($data['income'], 2, '.', '') ?></td>
                <td><?= number_format($data['expense'], 2, '.', '') ?></td>
                <td><strong><?= number_format($data['income'] - $data['expense'], 2, '.', '') ?></strong></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
