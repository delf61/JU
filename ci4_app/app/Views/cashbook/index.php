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

    <div class="card" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <a href="#" class="btn" style="background: #17a2b8;">Hot. príjem (F1)</a>
        <a href="#" class="btn" style="background: #17a2b8;">Hot. výdaj (F2)</a>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>&filter=bez_kodu" class="btn" style="background: #17a2b8;" title="pVyd_Bez_Kod">Bez kódu (Ctrl+F7)</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="window.print()">Tlač</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="alert('Upratovanie je servisná FAND procedúra, v CI4 nie je nutná.')">Upratovanie</a>
        <a href="<?= site_url('bank') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="Otvoriť bankové výpisy (Ucet)">Účet (F7)</a>
        <a href="<?= site_url('cashbook/statistics') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="pStatist">Štatistika (Alt+F4)</a>
        <a href="<?= site_url('cashbook/summary') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="pPDsuma">Sumár po akt. pol. (Alt+F5)</a>
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
                pageLength: 25,
                columnDefs: [
                    { orderable: false, targets: -1 } // Disable sorting on Action column
                ]
            });
        });
    </script>

    <!-- Codes Modal -->
    <div id="codesModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:750px; max-width:95%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column;">
            <div style="padding:15px; border-bottom:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                <h3 id="modalTitle" style="margin:0; color:var(--text-color);">Kódy operácií</h3>
                <button onclick="closeCodesModal()" style="background:none; border:none; color:var(--text-color); font-size:1.5em; cursor:pointer;">&times;</button>
            </div>
            <div style="padding:15px; overflow-y:auto; max-height:60vh;">
                <table id="codesTable" style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="text-align:center;">Kód</th>
                            <th>Popis výdaja / príjmu</th>
                            <th style="text-align:center;">Počet</th>
                            <th style="text-align:right;">Suma v PD €</th>
                            <th style="text-align:center;">Akcie</th>
                        </tr>
                    </thead>
                    <tbody id="codesTableBody">
                    </tbody>
                </table>
            </div>
            <div style="padding:15px; border-top:1px solid var(--border-color); text-align:right;">
                <button onclick="closeCodesModal()" class="btn btn-secondary">Zrušiť</button>
            </div>
        </div>
    </div>

    <script>
        let currentB = '';
        let currentYear = '';

        function openCodesModal(b, year, type, currentCode) {
            currentB = b;
            currentYear = year;

            const title = type === 'v' ? 'Číselník Výdavkov' : 'Číselník Príjmov';
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('codesModal').style.display = 'flex';

            const tbody = document.getElementById('codesTableBody');
            tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;">Načítavam dáta...</td></tr>';

            fetch(`<?= site_url('api/cashbook/codes') ?>?type=${type}&year=${year}`)
                .then(res => res.json())
                .then(data => {
                    tbody.innerHTML = '';
                    if (data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;">Číselník je prázdny.</td></tr>';
                        return;
                    }

                    let totalCount = 0;
                    let totalSum = 0.0;

                    data.forEach(item => {
                        const isSelected = item.kodvyd === currentCode;
                        const rowStyle = isSelected ? 'background-color: var(--hover-bg); font-weight:bold;' : '';

                        const cnt = parseInt(item.pocet) || 0;
                        const sm = parseFloat(item.suma) || 0;
                        totalCount += cnt;
                        totalSum += sm;

                        const tr = document.createElement('tr');
                        tr.style = rowStyle;

                        tr.innerHTML = `
                            <td style="text-align:center; font-size:1.2em; color:var(--text-color); border:1px solid var(--border-color);">${item.kodvyd}</td>
                            <td style="border:1px solid var(--border-color);">
                                <span id="desc_text_${item.PK}" style="color:var(--text-color);">${item.d}</span>
                                <input type="text" id="desc_input_${item.PK}" value="${item.d}" style="display:none; width:100%;" onkeydown="if(event.key==='Enter') saveDesc(${item.PK})">
                            </td>
                            <td style="text-align:center; border:1px solid var(--border-color); color:var(--text-color);">${cnt}</td>
                            <td style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">${sm.toFixed(2)}</td>
                            <td style="text-align:center; border:1px solid var(--border-color); padding:5px;">
                                <button onclick="selectCode('${item.kodvyd}')" class="btn btn-action" style="background:#28a745; color:#fff;" title="F3 Vybrať kód pre tento riadok">Vybrať (F3)</button>
                                <button onclick="editDesc(${item.PK})" class="btn btn-action" style="background:#ffc107; color:#000;" title="F4 Upraviť názov kategórie">Editovať (F4)</button>
                                <a href="<?= site_url('cashbook') ?>?year=${year}&filter_kod=${item.kodvyd}" class="btn btn-action" style="background:#17a2b8; color:#fff; text-decoration:none;" title="F1 Zobraziť históriu (iba položky s týmto kódom)">História (F1)</a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add Summary Row matching DOS JU structure
                    const tfoot = document.createElement('tr');
                    tfoot.style = 'font-weight:bold; background-color: var(--th-bg);';
                    tfoot.innerHTML = `
                        <td colspan="2" style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">─ Spolu v PD :</td>
                        <td style="text-align:center; border:1px solid var(--border-color); color:var(--text-color);">${totalCount}</td>
                        <td style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">${totalSum.toFixed(2)}</td>
                        <td style="border:1px solid var(--border-color);"></td>
                    `;
                    tbody.appendChild(tfoot);
                })
                .catch(err => {
                    tbody.innerHTML = '<tr><td colspan="5" style="text-align:center; color:red;">Chyba pri načítaní: ' + err + '</td></tr>';
                });
        }

        function closeCodesModal() {
            document.getElementById('codesModal').style.display = 'none';
        }

        function selectCode(code) {
            const formData = new FormData();
            formData.append('b', currentB);
            formData.append('year', currentYear);
            formData.append('kod', code);

            fetch(`<?= site_url('api/cashbook/update_code') ?>`, {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if(data.status === 'success') {
                    location.reload();
                } else {
                    alert('Chyba: ' + data.message);
                }
            });
        }

        function editDesc(pk) {
            document.getElementById('desc_text_' + pk).style.display = 'none';
            const inp = document.getElementById('desc_input_' + pk);
            inp.style.display = 'inline-block';
            inp.focus();
        }

        function saveDesc(pk) {
            const newDesc = document.getElementById('desc_input_' + pk).value;
            const formData = new FormData();
            formData.append('pk', pk);
            formData.append('desc', newDesc);

            fetch(`<?= site_url('api/cashbook/update_desc') ?>`, {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if(data.status === 'success') {
                    document.getElementById('desc_text_' + pk).innerText = newDesc;
                    document.getElementById('desc_text_' + pk).style.display = 'inline-block';
                    document.getElementById('desc_input_' + pk).style.display = 'none';
                }
            });
        }
    </script>

</body>
</html>
