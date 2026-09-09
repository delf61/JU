<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peňažný denník</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 6px 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .success-msg { color: green; font-weight: bold; margin-bottom: 10px; }
        .error-msg { color: red; font-weight: bold; margin-bottom: 10px; }
        .summary-box { background: #f9f9f9; border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; display: flex; gap: 20px; }
        .summary-section { flex: 1; }
        .summary-section h3 { margin-top: 0; }
        form.year-selector { margin-bottom: 20px; }
        .btn { display: inline-block; padding: 5px 10px; text-decoration: none; background: #007bff; color: white; border-radius: 3px; }
        .btn:hover { background: #0056b3; }
        .btn-edit { background: #ffc107; color: black; }
        .btn-edit:hover { background: #e0a800; }
    </style>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
</head>
<body>
    <h1>Peňažný denník (Cashbook)</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-msg"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-msg"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <form method="get" action="<?= site_url('cashbook') ?>" class="year-selector">
        <label for="year">Účtovný rok:</label>
        <input type="number" name="year" id="year" value="<?= esc($year) ?>" min="1990" max="2100">
        <button type="submit">Zobraziť</button>
    </form>

    <div style="margin-bottom: 15px;">
        <a href="<?= site_url('cashbook/create') ?>?year=<?= esc($year) ?>" class="btn">Pridať nový záznam</a>
        <a href="<?= base_url() ?>" style="margin-left: 10px;">Späť na domovskú stránku</a>
    </div>

    <div class="summary-box">
        <div class="summary-section">
            <h3>Zostatky</h3>
            <p><strong>Hotovosť (Poč. stav):</strong> <?= number_format($initialState['ph'] ?? 0, 2, '.', '') ?></p>
            <p><strong>BÚ (Poč. stav):</strong> <?= number_format($initialState['pu'] ?? 0, 2, '.', '') ?></p>
            <hr>
            <p><strong>Hotovosť konečný zostatok:</strong> <?= number_format($runningTotals['income_cash'] - $runningTotals['expense_cash'], 2, '.', '') ?></p>
            <p><strong>BÚ konečný zostatok:</strong> <?= number_format($runningTotals['income_bank'] - $runningTotals['expense_bank'], 2, '.', '') ?></p>
        </div>
        <div class="summary-section">
            <h3>Pohyby celkom</h3>
            <p><strong>Príjmy hotovosť (a1):</strong> <?= number_format($totals['income_cash'], 2, '.', '') ?></p>
            <p><strong>Výdavky hotovosť (a2):</strong> <?= number_format($totals['expense_cash'], 2, '.', '') ?></p>
            <p><strong>Príjmy BÚ (a3):</strong> <?= number_format($totals['income_bank'], 2, '.', '') ?></p>
            <p><strong>Výdavky BÚ (a4):</strong> <?= number_format($totals['expense_bank'], 2, '.', '') ?></p>
        </div>
    </div>

    <table id="cashbookTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Dátum (a)</th>
                <th>Doklad (b)</th>
                <th>Kód OP</th>
                <th>Text (d)</th>
                <th class="text-right">Príjem Hot (a1)</th>
                <th class="text-right">Výdaj Hot (a2)</th>
                <th class="text-right">Príjem BÚ (a3)</th>
                <th class="text-right">Výdaj BÚ (a4)</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($entries)): ?>
                <tr>
                    <td colspan="9" style="text-align: center;">Žiadne záznamy pre tento rok.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($entries as $row): ?>
                    <tr>
                        <td><?= esc(date('d.m.Y', strtotime($row['a']))) ?></td>
                        <td><?= esc($row['b']) ?></td>
                        <td><?= esc($row['kodop']) ?></td>
                        <td><?= esc($row['d']) ?></td>
                        <td class="text-right"><?= number_format($row['a1'] ?? 0, 2, '.', '') ?></td>
                        <td class="text-right"><?= number_format($row['a2'] ?? 0, 2, '.', '') ?></td>
                        <td class="text-right"><?= number_format($row['a3'] ?? 0, 2, '.', '') ?></td>
                        <td class="text-right"><?= number_format($row['a4'] ?? 0, 2, '.', '') ?></td>
                        <td>
                            <a href="<?= site_url('cashbook/edit/' . esc($row['b']) . '/' . esc($year)) ?>" class="btn btn-edit">Editovať</a>
                            <form action="<?= site_url('cashbook/delete/' . esc($row['b']) . '/' . esc($year)) ?>" method="post" style="display:inline;" onsubmit="return confirm('Naozaj vymazať tento záznam?');">
                                <button type="submit" class="btn btn-danger" style="background:#dc3545;color:white;border:none;padding:5px 10px;border-radius:3px;cursor:pointer;">Vymazať</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            $('#cashbookTable').DataTable({
                language: {
                    search: "Vyhľadávanie:",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy neboli nájdené",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov",
                    infoEmpty: "Zobrazených 0 až 0 z 0 záznamov",
                    infoFiltered: "(vyfiltrované z _MAX_ celkových záznamov)",
                    emptyTable: "Žiadne dáta nie sú k dispozícii",
                    paginate: {
                        first: "Prvá",
                        previous: "Predchádzajúca",
                        next: "Ďalšia",
                        last: "Posledná"
                    }
                },
                ordering: true,
                paging: true,
                pageLength: 25,
                columnDefs: [
                    { orderable: false, targets: -1 } // Disable sorting on Action column
                ]
            });
        });
    </script>
</body>
</html>
