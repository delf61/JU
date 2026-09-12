<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Všeobecné číselníky - DOS JU Migration</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .container { display: flex; gap: 20px; }
        .sidebar { min-width: 200px; border-right: 1px solid #ccc; padding-right: 20px; }
        .content { flex-grow: 1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; cursor: pointer; }
        .form-group { margin-bottom: 10px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        #dictionary-form-container { display: none; margin-top: 20px; padding: 20px; border: 1px solid #ccc; background: #f9f9f9; }
        #error-message { color: red; margin-bottom: 10px; display: none; }
        #success-message { color: green; margin-bottom: 10px; display: none; }
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

<script>
    function updateClock() {
        const now = new Date();
        const day = String(now.getDate()).padStart(2, '0');
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const year = now.getFullYear();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');

        const clockEl = document.getElementById('navbar-clock');
        if (clockEl) {
            clockEl.textContent = `${day}.${month}.${year} ${hours}:${minutes}`;
        }
    }
    setInterval(updateClock, 1000);
</script>

</head>
<body onload="updateClock()">

<div style="text-align: center; font-weight: bold; font-size: 1.2em; margin-bottom: 15px;" id="navbar-clock">
    <?= date('d.m.Y H:i') ?>
</div>

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


<h1>Všeobecné číselníky</h1>

<div class="container">
    <div class="sidebar">
        <h3>Typy číselníkov</h3>
        <ul id="dictionary-list" style="list-style-type: none; padding: 0;">
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('kraje')">Kraje</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('okresy')">Okresy</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('mesta')">Mestá</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('banky')">Banky</button></li>
        </ul>
    </div>

    <div class="content">
        <h2 id="dictionary-title">Vyberte číselník</h2>

        <div id="messages">
            <div id="error-message"></div>
            <div id="success-message"></div>
        </div>

        <button id="btn-add-new" class="btn" style="display:none;" onclick="app.showForm()">Pridať nový záznam</button>

        <div id="table-container">
            <table id="data-table" style="display:none;">
                <thead id="data-table-head"></thead>
                <tbody id="data-table-body"></tbody>
            </table>
        </div>

        <div id="dictionary-form-container">
            <h3 id="form-title">Pridať záznam</h3>
            <form id="dictionary-form" onsubmit="app.saveDictionary(event)">
                <input type="hidden" id="form-action-type" value="create">
                <input type="hidden" id="form-record-id" value="">

                <div id="form-fields"></div>

                <button type="submit" class="btn" style="background-color: #4CAF50; color: white;">Uložiť</button>
                <button type="button" class="btn" onclick="app.hideForm()">Zrušiť</button>
            </form>
        </div>
    </div>
</div>

<script src="/js/modules/dictionary.js"></script>

</body>
</html>
