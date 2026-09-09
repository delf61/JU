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
                <th>a</th>
                <th>AkyDen</th>
                <th>d40</th>
                <th class="text-right">Celkove</th>
                <th class="text-right">sDPH</th>
                <th>typ_vyd</th>
                <th>Vydaj</th>
                <th>ok</th>
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
                    <?php
                        $dayOfWeek = date('N', strtotime($row['a']));
                        $days = [1 => 'Po', 2 => 'Ut', 3 => 'St', 4 => 'Št', 5 => 'Pi', 6 => 'So', 7 => 'Ne'];
                        $akyDen = $days[$dayOfWeek] ?? '';

                        // FAND exact formulas
                        $r = !empty($row['r']);
                        $a1 = (float)($row['a1'] ?? 0);
                        $a2 = (float)($row['a2'] ?? 0);
                        $a3 = (float)($row['a3'] ?? 0);
                        $a4 = (float)($row['a4'] ?? 0);
                        $a14 = (float)($row['a14'] ?? 0);

                        $a5 = $r ? ($a1 + $a3) : 0;
                        $a6 = $r ? ($a2 + $a4 - $a14) : 0;
                        $celkove = $a5 - $a6;

                        $hod_pri = $a1 + $a3;
                        $hod_vyd = $a2 + $a4;
                        $hal = (float)($row['hal_p'] ?? 0);
                        $dph_rate = (float)($row['dph'] ?? 0);
                        $year = (int)date('Y', strtotime($row['a']));

                        if ($year < 2009) {
                            $dph_sk_p = round($hod_pri * ($dph_rate / 100));
                            $dph_sk = round($hod_vyd * ($dph_rate / 100));
                        } else {
                            $dph_sk_p = round($hod_pri * ($dph_rate / 100), 2);
                            $dph_sk = round($hod_vyd * ($dph_rate / 100), 2);
                        }

                        $zn_p = $hod_pri + ($hod_pri != 0 ? $hal : 0) + $dph_sk_p;
                        $zn = $hod_vyd + ($hod_vyd != 0 ? $hal : 0) + $dph_sk;
                        $sDPH = $zn_p - $zn;

                        $ok = ''; // Not persistently stored in pd, dynamically evaluated in UI/Reports if matches criteria, default empty
                    ?>
                    <tr>
                        <td><?= esc(date('d.m.Y', strtotime($row['a']))) ?></td>
                        <td><?= esc($akyDen) ?></td>
                        <td><?= esc($row['d'] ?? '') ?></td>
                        <td class="text-right"><?= number_format($celkove, 2, '.', '') ?></td>
                        <td class="text-right"><?= number_format($sDPH, 2, '.', '') ?></td>
                        <td><?= esc($row['kodop'] ?? '') ?></td>
                        <td><?= esc($row['vydaj'] ?? '') ?></td>
                        <td><?= esc($ok) ?></td>
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



    <div style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; background: #f2f2f2; padding: 15px; border: 1px solid #ddd;">
        <div style="width: 100%;"><strong>CTRL menu:</strong></div>
        <a href="#" class="btn" style="background: #17a2b8;">Hot.príjem/výdaj</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="alert('pPDkod otvára detail rozúčtovania na formulári - implementované priamo v Editácií záznamu.')">Kódy operácií</a>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>&filter=bez_kodu" class="btn" style="background: #17a2b8;" title="pVyd_Bez_Kod">Bez kódu</a>
        <a href="<?= site_url('cashbook') ?>" class="btn" style="background: #17a2b8;" title="pAktualDatum">Dnešný dátum</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="window.print()">Tlač</a>

        <div style="width: 100%; margin-top: 10px;"><strong>ALT menu:</strong></div>
        <a href="#" class="btn" style="background: #6c757d;" onclick="alert('Upratovanie je servisná FAND procedúra, v CI4 nie je nutná.')">Upratovanie</a>
        <a href="#" class="btn" style="background: #6c757d;" onclick="alert('1 typ dokladov vyžaduje výber konkrétneho dokladu z gridu (implementované na pozadí pPD_Doklad)')">1 typ dokladov</a>
        <a href="#" class="btn" style="background: #6c757d;">Banka</a>
        <a href="<?= site_url('cashbook/statistics') ?>?year=<?= esc($year) ?>" class="btn" style="background: #6c757d;" title="pStatist">Štatistika</a>
        <a href="<?= site_url('cashbook/summary') ?>?year=<?= esc($year) ?>" class="btn" style="background: #6c757d;" title="pPDsuma">Sumár po akt. pol.</a>
    </div>

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
                pageLength: 10,
                columnDefs: [
                    { orderable: false, targets: -1 } // Disable sorting on Action column
                ]
            });
        });
    </script>
</body>
</html>
