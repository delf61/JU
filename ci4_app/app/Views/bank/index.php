<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Bankový výpis - DATOVÝ EDITOR</title>
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
        <h1>Bankové výpisy (Ucet) - Všetky roky</h1>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>" class="btn-back">Späť na Peňažný denník</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: #28a745; margin-bottom: 15px; font-weight: bold;"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: #dc3545; margin-bottom: 15px; font-weight: bold;"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <table id="bankTable" class="display">
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
                <td class="text-center"><?= esc(date('d.m.Y', strtotime($row['d']))) ?></td>
                <td class="text-center"><?= esc($row['b']) ?></td>
                <td><?= esc($row['ua']) ?></td>
                <td class="text-right"><?= number_format($row['pa'], 2, '.', '') ?></td>
                <td class="text-center"><?= !empty($row['ra']) ? 'A' : 'N' ?></td>
                                <td class="text-center"><?= !empty($row['qa']) ? 'A' : 'N' ?></td>
                <td class="text-center">
                    <?php
                        $enc_b = bin2hex($row['b']);
                        $enc_d = bin2hex($row['d']);
                    ?>
                    <a href="<?= site_url("bank/edit/$enc_b/$enc_d") ?>" class="btn-action" style="background:#ffc107; color:#000;">Editovať</a>

                    <form action="<?= site_url("bank/copy/$enc_b/$enc_d") ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn-action" style="background:#17a2b8; color:#fff; border:none; cursor:pointer;" >Kópia</button>
                    </form>

                    <form action="<?= site_url("bank/delete/$enc_b/$enc_d") ?>" method="post" style="display:inline;">
                        <button type="submit" class="btn-action" style="background:#dc3545; color:#fff; border:none; cursor:pointer;" onclick="return confirm('Naozaj vymazať tento záznam?');">Vymazať</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#bankTable').DataTable({
                language: {
                    search: "Vyhľadávanie:",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov",
                    paginate: {
                        first: "Prvá", previous: "Predchádzajúca", next: "Ďalšia", last: "Posledná"
                    }
                },
                pageLength: 15
            });
        });
    </script>
</body>
</html>
