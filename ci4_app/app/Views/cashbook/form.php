<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $entry ? 'Editácia' : 'Nový záznam' ?> - Peňažný denník</title>
    <style>
        body { font-family: sans-serif; margin: 20px; max-width: 800px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 8px; box-sizing: border-box; }
        .error-msg { color: red; font-size: 0.9em; margin-top: 5px; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
        .grid-4 { display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 15px; }
        button { padding: 10px 15px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 3px; font-size: 16px; }
        button:hover { background: #218838; }
        .btn-cancel { background: #6c757d; text-decoration: none; display: inline-block; padding: 10px 15px; color: white; border-radius: 3px; }
        .btn-cancel:hover { background: #5a6268; }
        .fieldset { border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; }
        .fieldset legend { font-weight: bold; padding: 0 5px; }
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

    <h1><?= $entry ? 'Editácia záznamu: ' . esc($entry['b']) : 'Nový záznam' ?></h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red; background: #fdd;">
            Opravte prosím chyby vo formulári.
        </div>
    <?php endif; ?>

    <form method="post" action="<?= $entry ? site_url('cashbook/update/' . esc($entry['b']) . '/' . esc($year)) : site_url('cashbook/store') ?>" >

        <div class="fieldset">
            <legend>Základné údaje</legend>
            <div class="grid-2">
                <div class="form-group">
                    <label for="a">Dátum (a) *</label>
                    <input type="date" name="a" id="a" value="<?= old('a', $entry['a'] ?? '') ?>" required>
                    <?php if (session('errors.a')): ?><div class="error-msg"><?= session('errors.a') ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="b">Číslo dokladu (b) *</label>
                    <input type="text" name="b" id="b" value="<?= old('b', $entry['b'] ?? '') ?>" required <?= $entry ? 'readonly' : '' ?>>
                    <?php if (session('errors.b')): ?><div class="error-msg"><?= session('errors.b') ?></div><?php endif; ?>
                    <?php if ($entry): ?>
                        <small style="color: #666;">Pri editácii sa číslo dokladu nedá meniť.</small>
                    <?php endif; ?>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="kodop">Kód OP *</label>
                    <input type="text" name="kodop" id="kodop" value="<?= old('kodop', $entry['kodop'] ?? '') ?>" required maxlength="6">
                    <?php if (session('errors.kodop')): ?><div class="error-msg"><?= session('errors.kodop') ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="d">Text (d)</label>
                    <input type="text" name="d" id="d" value="<?= old('d', $entry['d'] ?? '') ?>" maxlength="56">
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label for="c">Externý doklad (c)</label>
                    <input type="text" name="c" id="c" value="<?= old('c', $entry['c'] ?? '') ?>" maxlength="13">
                </div>

                <div class="form-group">
                    <label for="zp">Dátum zdaniteľného plnenia (zp)</label>
                    <input type="date" name="zp" id="zp" value="<?= old('zp', $entry['zp'] ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="fieldset">
            <legend>Hlavné sumy</legend>
            <div class="grid-4">
                <div class="form-group">
                    <label for="a1">Príjem Hot. (a1)</label>
                    <input type="number" step="0.01" name="a1" id="a1" value="<?= old('a1', $entry['a1'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="a2">Výdaj Hot. (a2)</label>
                    <input type="number" step="0.01" name="a2" id="a2" value="<?= old('a2', $entry['a2'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="a3">Príjem BÚ (a3)</label>
                    <input type="number" step="0.01" name="a3" id="a3" value="<?= old('a3', $entry['a3'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="a4">Výdaj BÚ (a4)</label>
                    <input type="number" step="0.01" name="a4" id="a4" value="<?= old('a4', $entry['a4'] ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="fieldset">
            <legend>Rozúčtovanie</legend>
            <div class="grid-4">
                <div class="form-group"><label for="a7">a7 (Drob. maj)</label><input type="number" step="0.01" name="a7" id="a7" value="<?= old('a7', $entry['a7'] ?? '') ?>"></div>
                <div class="form-group"><label for="a8">a8 (Ostatné)</label><input type="number" step="0.01" name="a8" id="a8" value="<?= old('a8', $entry['a8'] ?? '') ?>"></div>
                <div class="form-group"><label for="a9">a9 (Mzdy)</label><input type="number" step="0.01" name="a9" id="a9" value="<?= old('a9', $entry['a9'] ?? '') ?>"></div>
                <div class="form-group"><label for="a10">a10 (Daň mzdy)</label><input type="number" step="0.01" name="a10" id="a10" value="<?= old('a10', $entry['a10'] ?? '') ?>"></div>
                <div class="form-group"><label for="a11">a11 (Odvody)</label><input type="number" step="0.01" name="a11" id="a11" value="<?= old('a11', $entry['a11'] ?? '') ?>"></div>
                <div class="form-group"><label for="a12">a12 (Prevadzka)</label><input type="number" step="0.01" name="a12" id="a12" value="<?= old('a12', $entry['a12'] ?? '') ?>"></div>
                <div class="form-group"><label for="a13">a13 (PHM)</label><input type="number" step="0.01" name="a13" id="a13" value="<?= old('a13', $entry['a13'] ?? '') ?>"></div>
                <div class="form-group"><label for="a14">a14 (Majetok)</label><input type="number" step="0.01" name="a14" id="a14" value="<?= old('a14', $entry['a14'] ?? '') ?>"></div>
                <div class="form-group"><label for="a15">a15 (Tovar)</label><input type="number" step="0.01" name="a15" id="a15" value="<?= old('a15', $entry['a15'] ?? '') ?>"></div>
                <div class="form-group"><label for="a16">a16 (Materiál)</label><input type="number" step="0.01" name="a16" id="a16" value="<?= old('a16', $entry['a16'] ?? '') ?>"></div>
                <div class="form-group"><label for="a17">a17 (Fondy)</label><input type="number" step="0.01" name="a17" id="a17" value="<?= old('a17', $entry['a17'] ?? '') ?>"></div>
            </div>

            <div class="form-group" style="margin-top: 15px;">
                <label for="vydaj">Kód rozúčtovania (vydaj)</label>
                <input type="text" name="vydaj" id="vydaj" value="<?= old('vydaj', $entry['vydaj'] ?? '') ?>" maxlength="1">
            </div>
        </div>

        <div style="margin-top: 20px;">
            <button type="submit">Uložiť</button>
            <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>" class="btn-cancel">Zrušiť</a>
        </div>
    </form>
</body>
</html>
