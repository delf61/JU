<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Počiatočné stavy</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        button { padding: 5px 10px; cursor: pointer; }
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); }
        .modal-content { background: white; margin: 50px auto; padding: 20px; width: 50%; max-height: 80vh; overflow-y: auto; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        .close { float: right; cursor: pointer; font-size: 20px; }
        .success-msg { color: green; font-weight: bold; display: none; margin-bottom: 10px; }
        .error-msg { color: red; font-weight: bold; display: none; margin-bottom: 10px; }
    </style>

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

        .summary-list li {
            border-bottom: 1px dashed var(--border-color) !important;
        }

        .summary-list li.total {
            border-top: 2px solid var(--border-color) !important;
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

    <h1>Počiatočné stavy</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-msg" style="display: block;"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-msg" style="display: block;"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <table id="initialStatesTable">
        <thead>
            <tr>
                <th>Dátum (a)</th>
                <th>Číslo dokladu (b)</th>
                <th>Pokladňa hotovosť (ph)</th>
                <th>BÚ príjem (pu)</th>
                <th>Materiál (m)</th>
                <th>Záväzky (zav)</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($initialStates)): ?>
                <tr><td colspan="7">Žiadne záznamy na zobrazenie.</td></tr>
            <?php else: ?>
                <?php foreach ($initialStates as $item): ?>
                    <tr>
                        <td><?= esc(isset($item['a']) ? substr($item['a'], 0, 10) : 'N/A') ?></td>
                        <td><?= esc($item['b'] ?? '') ?></td>
                        <td><?= esc($item['ph'] ?? '0.00') ?></td>
                        <td><?= esc($item['pu'] ?? '0.00') ?></td>
                        <td><?= esc($item['m'] ?? '0.00') ?></td>
                        <td><?= esc($item['zav'] ?? '0.00') ?></td>
                        <td>
                            <?php if (isset($item['a'])): ?>
                                <!-- Priradenie dátových atribútov k preneseniu údajov do modalu pri čisto JS interakcii (žiadne API volania) -->
                                <button type="button"
                                    onclick="openEditModal(this)"
                                    data-a="<?= esc($item['a']) ?>"
                                    data-b="<?= esc($item['b'] ?? '') ?>"
                                    data-ph="<?= esc($item['ph'] ?? '') ?>"
                                    data-h="<?= esc($item['h'] ?? '') ?>"
                                    data-pu="<?= esc($item['pu'] ?? '') ?>"
                                    data-u="<?= esc($item['u'] ?? '') ?>"
                                    data-m="<?= esc($item['m'] ?? '') ?>"
                                    data-han="<?= esc($item['han'] ?? '') ?>"
                                    data-poh="<?= esc($item['poh'] ?? '') ?>"
                                    data-zav="<?= esc($item['zav'] ?? '') ?>">Upraviť</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Upraviť počiatočný stav</h2>
            <!-- Klasický form submit -->
            <form id="editForm" method="post" action="/accounting/initial-states/placeholder">
                <div class="form-group">
                    <label for="b">Číslo dokladu (b):</label>
                    <input type="text" id="b" name="b" required>
                </div>

                <div class="form-group">
                    <label for="ph">Pokladňa hotovosť (ph):</label>
                    <input type="number" step="0.01" id="ph" name="ph">
                </div>

                <div class="form-group">
                    <label for="h">Text pokladne (h):</label>
                    <input type="text" id="h" name="h">
                </div>

                <div class="form-group">
                    <label for="pu">BÚ príjem (pu):</label>
                    <input type="number" step="0.01" id="pu" name="pu">
                </div>

                <div class="form-group">
                    <label for="u">Text BÚ (u):</label>
                    <input type="text" id="u" name="u">
                </div>

                <div class="form-group">
                    <label for="m">Materiál (m):</label>
                    <input type="number" step="0.01" id="m" name="m">
                </div>

                <div class="form-group">
                    <label for="han">HaN (han):</label>
                    <input type="number" step="0.01" id="han" name="han">
                </div>

                <div class="form-group">
                    <label for="poh">Pohľadávky (poh):</label>
                    <input type="number" step="0.01" id="poh" name="poh">
                </div>

                <div class="form-group">
                    <label for="zav">Záväzky (zav):</label>
                    <input type="number" step="0.01" id="zav" name="zav">
                </div>

                <button type="submit">Uložiť</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(btn) {
            const date = btn.getAttribute('data-a');

            // Set action URL dynamically for classic form submit
            const form = document.getElementById('editForm');
            form.action = '/accounting/initial-states/' + date;

            // Populate inputs from dataset
            document.getElementById('b').value = btn.getAttribute('data-b');
            document.getElementById('ph').value = btn.getAttribute('data-ph');
            document.getElementById('h').value = btn.getAttribute('data-h');
            document.getElementById('pu').value = btn.getAttribute('data-pu');
            document.getElementById('u').value = btn.getAttribute('data-u');
            document.getElementById('m').value = btn.getAttribute('data-m');
            document.getElementById('han').value = btn.getAttribute('data-han');
            document.getElementById('poh').value = btn.getAttribute('data-poh');
            document.getElementById('zav').value = btn.getAttribute('data-zav');

            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
