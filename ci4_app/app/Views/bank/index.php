<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Bankové výpisy</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .btn-back { display: inline-block; padding: 8px 15px; background-color: #6c757d; color: #fff; text-decoration: none; border-radius: 4px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 14px; }
        th, td { border: 1px solid #ddd; padding: 8px 12px; text-align: left; }
        th { background-color: #f2f2f2; }
        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .btn-action { padding: 4px 8px; border-radius: 3px; font-size: 0.85em; text-decoration: none; margin: 0 2px; display: inline-block; }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

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
            background-color: var(--bg-color);
            color: var(--text-color);
            transition: background-color 0.3s, color 0.3s;
        }

        .card, .summary-box, .dos-frame, .dos-table, table {
            background-color: var(--card-bg) !important;
            border-color: var(--border-color) !important;
            color: var(--text-color) !important;
        }

        th, td, .card h2, .header, .summary-section h3 {
            border-color: var(--border-color) !important;
            color: var(--text-color) !important;
            background-color: transparent !important;
        }

        th {
            background-color: var(--th-bg) !important;
        }

        tr:nth-child(even) {
            background-color: var(--hover-bg) !important;
        }

        .header {
            background-color: var(--card-bg) !important;
        }

        a {
            color: var(--link-color);
        }

        input, select {
            background-color: var(--card-bg);
            color: var(--text-color);
            border: 1px solid var(--border-color);
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

        .theme-switch input {
            display: none;
        }

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

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }

        .theme-label {
            margin-right: 10px;
            font-weight: bold;
        }

        /* DataTables dark mode overrides */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_info,
        .dataTables_wrapper .dataTables_processing,
        .dataTables_wrapper .dataTables_paginate {
            color: var(--text-color) !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: var(--text-color) !important;
        }

        table.dataTable tbody tr {
            background-color: var(--card-bg) !important;
        }
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

    <div class="header">
        <h1>Bankové výpisy</h1>

    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: #28a745; margin-bottom: 15px; font-weight: bold;"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: #dc3545; margin-bottom: 15px; font-weight: bold;"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>



    <table id="bankTable15" class="display">
        <thead>
            <tr>
                <th class="text-center">Realizov.<br>dňa</th>
                <th class="text-center">Por.<br>50</th>
                <th>Popis operácie</th>
                <th class="text-right">Čiastka<br>€</th>
                <th class="text-center">C</th>
                <th class="text-center">P</th>
                <th class="text-center">Akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $row): ?>
            <tr>
                <td class="text-center"><?= esc(date('Y.m.d', strtotime($row['d']))) ?></td>
                <td class="text-center"><?= esc($row['b']) ?></td>
                <td><?= esc($row['ua']) ?></td>
                <td class="text-right"><?= number_format($row['pa'], 2, '.', '') ?></td>
                <td class="text-center"><?= !empty($row['ra']) ? 'A' : 'N' ?></td>
                                <td class="text-center"><?= !empty($row['qa']) ? 'A' : 'N' ?></td>
                                                <td class="text-center">
                    <form action="<?= site_url('bank/transfer_pd') ?>" method="post" style="display:inline;">
                        <input type="hidden" name="PK" value="<?= esc($row['PK'] ?? '') ?>">
                        <button type="submit" class="btn-action" style="background:#28a745; color:#fff; border:none; cursor:pointer;" title="Prenos do PD (F3)">Do PD</button>
                    </form>
                    <a href="<?= site_url("bank/edit/" . esc($row['PK'])) ?>" class="btn-action" style="background:#ffc107; color:#000;">Editovať</a>

                    <form action="<?= site_url("bank/copy") ?>" method="post" style="display:inline;">
                        <input type="hidden" name="PK" value="<?= esc($row['PK'] ?? '') ?>">
                        <button type="submit" class="btn-action" style="background:#17a2b8; color:#fff; border:none; cursor:pointer;" >Kópia</button>
                    </form>

                    <form action="<?= site_url("bank/delete") ?>" method="post" style="display:inline;">
                        <input type="hidden" name="PK" value="<?= esc($row['PK'] ?? '') ?>">
                        <button type="submit" class="btn-action" style="background:#dc3545; color:#fff; border:none; cursor:pointer;" onclick="return confirm('Naozaj vymazať tento záznam?');">Vymazať</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="card" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <a href="#" class="btn" style="background-color: #28a745;" onclick="alert('Bude spúšťať manuálne pridanie riadku do banky')">Pridať bankový záznam</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openCashTransferModal()">Výber / Vklad hotovosti</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openInvoiceModal('kz')">Uhradiť Záväzok</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openInvoiceModal('kp')">Uhradiť Pohľadávku</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="alert('Zobrazí sumár a štatistiky k výpisom')">Iné info</a>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>" class="btn" style="background-color: #6c757d; margin-left: auto;">Späť na Peňažný denník</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#bankTable15').DataTable({
                lengthChange: false,
                stateSave: true,
                pagingType: 'numbers',
                language: {
                    search: "Vyhľadávanie:",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov"},
                pageLength: 15
            });
        });
    </script>

    <!-- Invoices Modal -->
    <div id="invoiceModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:900px; max-width:95%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column;">
            <div style="padding:15px; border-bottom:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                <h3 id="invoiceModalTitle" style="margin:0; color:var(--text-color);">Záväzky / Pohľadávky</h3>
                <button onclick="closeInvoiceModal()" style="background:none; border:none; color:var(--text-color); font-size:1.5em; cursor:pointer;">&times;</button>
            </div>
            <div style="padding:15px; overflow-y:auto; max-height:600px;">
                <table id="invoiceSelectTable" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Doklad</th>
                            <th>Partner (od)</th>
                            <th class="text-right">Suma celkom</th>
                            <th class="text-right">Uhradené</th>
                            <th class="text-right">Na úhradu</th>
                            <th class="text-center">Akcia</th>
                        </tr>
                    </thead>
                    <tbody id="invoiceTableBody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Cash Transfer Modal -->
    <div id="cashModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:400px; border-radius:8px; border:1px solid var(--border-color); padding:20px; color:var(--text-color);">
            <h3 style="margin-top:0;">Výber / Vklad hotovosti</h3>
            <p>Kladná suma = Vklad. Záporná suma = Výber do pokladne.</p>
            <form action="<?= site_url('bank/cash_transfer') ?>" method="post">
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px;">Suma (Eur):</label>
                    <input type="number" step="0.01" name="amount" required style="width:100%; padding:8px; box-sizing:border-box;">
                </div>
                <div style="margin-bottom:15px;">
                    <label style="display:block; margin-bottom:5px;">Dátum:</label>
                    <input type="date" name="date" value="<?= date('Y-m-d') ?>" required style="width:100%; padding:8px; box-sizing:border-box;">
                </div>
                <div style="text-align:right;">
                    <button type="button" onclick="document.getElementById('cashModal').style.display='none';" class="btn" style="background:#6c757d;">Zrušiť</button>
                    <button type="submit" class="btn" style="background:#28a745;">Uložiť prevod</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let invTable = null;

        function openCashTransferModal() {
            document.getElementById('cashModal').style.display = 'flex';
        }

        function openInvoiceModal(type) {
            document.getElementById('invoiceModalTitle').innerText = (type === 'kz') ? 'Neuhradené Záväzky (Fa Prijaté)' : 'Neuhradené Pohľadávky (Fa Vystavené)';
            document.getElementById('invoiceModal').style.display = 'flex';

            const tbody = document.getElementById('invoiceTableBody');
            tbody.innerHTML = '<tr><td colspan="7" class="text-center">Načítavam z databázy...</td></tr>';

            if (invTable) {
                invTable.destroy();
            }

            fetch(`<?= site_url('api/bank/unpaid') ?>?type=${type}`)
                .then(res => res.json())
                .then(data => {
                    tbody.innerHTML = '';
                    if (data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="7" class="text-center">Nenašli sa žiadne neuhradené doklady.</td></tr>';
                        return;
                    }

                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.a.substring(0,10)}</td>
                            <td><strong>${item.b}</strong></td>
                            <td>${item.od}</td>
                            <td class="text-right">${item.zn}</td>
                            <td class="text-right" style="color:var(--text-color);">${item.uhrada}</td>
                            <td class="text-right" style="color:#dc3545; font-weight:bold;">${item.zostatok}</td>
                            <td class="text-center">
                                <form action="<?= site_url('bank/pay_invoice') ?>" method="post">
                                    <input type="hidden" name="type" value="${type}">
                                    <input type="hidden" name="invoice_pk" value="${item.PK}">
                                    <input type="hidden" name="date" value="<?= date('Y-m-d') ?>">
                                    <button type="submit" class="btn" style="background:#17a2b8; padding:3px 8px; font-size:0.9em;">Uhradiť</button>
                                </form>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });

                    invTable = $('#invoiceSelectTable').DataTable({
                        pageLength: 10,
                        lengthChange: false,
                        pagingType: 'numbers',
                        language: { search: "Hľadať doklad/partnera:" }
                    });
                });
        }

        function closeInvoiceModal() {
            document.getElementById('invoiceModal').style.display = 'none';
        }
    </script>

</body>
</html>
