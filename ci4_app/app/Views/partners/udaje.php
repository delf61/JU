<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Údaje o podnikateľovi</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; max-width: 500px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 15px; cursor: pointer; }
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

    <h1>Údaje o podnikateľovi</h1>
    <a href="<?= site_url('partners') ?>">Späť na obchodných partnerov</a>
    <hr>

    <div id="message" style="display:none; padding: 10px; margin-bottom: 15px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;"></div>

    <form id="udajeForm">
        <div class="form-group">
            <label for="nazov">Názov (nazov):</label>
            <input type="text" id="nazov" name="nazov" maxlength="40">
        </div>

        <div class="form-group">
            <label for="meno">Meno (meno):</label>
            <input type="text" id="meno" name="meno" maxlength="10">
        </div>

        <div class="form-group">
            <label for="priezv">Priezvisko (priezv):</label>
            <input type="text" id="priezv" name="priezv" maxlength="15">
        </div>

        <div class="form-group">
            <label for="titul">Titul (titul):</label>
            <input type="text" id="titul" name="titul" maxlength="5">
        </div>

        <div class="form-group">
            <label for="ico">IČO:</label>
            <input type="text" id="ico" name="ico" maxlength="10">
        </div>

        <div class="form-group">
            <label for="dic">DIČ:</label>
            <input type="text" id="dic" name="dic" maxlength="10">
        </div>

        <div class="form-group">
            <label for="icpd">IČ DPH (icpd):</label>
            <input type="text" id="icpd" name="icpd" maxlength="15">
        </div>

        <div class="form-group">
            <label for="uli">Ulica (uli):</label>
            <input type="text" id="uli" name="uli" maxlength="20">
        </div>

        <div class="form-group">
            <label for="miesto">Mesto:</label>
            <input type="text" id="miesto" name="miesto" maxlength="20">
        </div>

        <div class="form-group">
            <label for="psc">PSČ:</label>
            <input type="text" id="psc" name="psc" maxlength="6">
        </div>

        <div class="form-group">
            <label for="tlf">Telefón:</label>
            <input type="text" id="tlf" name="tlf" maxlength="13">
        </div>

        <button type="button" onclick="saveUdaje()">Uložiť zmeny</button>
    </form>

    <script>
        const apiUrl = '<?= site_url('partners/api/udaje') ?>';

        async function loadUdaje() {
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                ['nazov', 'meno', 'priezv', 'titul', 'ico', 'dic', 'icpd', 'uli', 'miesto', 'psc', 'tlf'].forEach(key => {
                    if (document.getElementById(key)) {
                        document.getElementById(key).value = data[key] || '';
                    }
                });
            } catch (error) {
                console.error('Error loading:', error);
                alert('Nepodarilo sa načítať údaje.');
            }
        }

        async function saveUdaje() {
            const form = document.getElementById('udajeForm');
            const data = {};
            new FormData(form).forEach((value, key) => {
                data[key] = value;
            });

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const msg = document.getElementById('message');
                if (response.ok) {
                    msg.textContent = 'Údaje úspešne uložené.';
                    msg.style.display = 'block';
                    msg.style.background = '#d4edda';
                    msg.style.color = '#155724';
                    setTimeout(() => msg.style.display = 'none', 3000);
                } else {
                    const result = await response.json();
                    msg.textContent = 'Chyba: ' + JSON.stringify(result.errors || result);
                    msg.style.display = 'block';
                    msg.style.background = '#f8d7da';
                    msg.style.color = '#721c24';
                }
            } catch (error) {
                console.error('Error saving:', error);
                alert('Chyba pri ukladaní.');
            }
        }

        window.onload = loadUdaje;
    </script>
</body>
</html>
