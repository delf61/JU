<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obchodní partneri</title>
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
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .close { float: right; cursor: pointer; font-size: 20px; }
    </style>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables CSS & JS -->
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

    <h1>Obchodní partneri</h1>

    <button onclick="openCreateModal()">Pridať partnera</button>
    <a href="<?= site_url('partners/udaje') ?>"><button>Údaje o podnikateľovi</button></a>

    <table id="partnersTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Kód (kodop)</th>
                <th>Firma</th>
                <th>Meno</th>
                <th>IČO</th>
                <th>Mesto</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be loaded here -->
        </tbody>
    </table>

    <div id="partnerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Pridať partnera</h2>
            <form id="partnerForm">
                <input type="hidden" id="originalKodop">

                <div class="form-group">
                    <label for="kodop">Kód (kodop):</label>
                    <input type="number" id="kodop" name="kodop">
                </div>

                <div class="form-group">
                    <label for="firma">Firma:</label>
                    <input type="text" id="firma" name="firma" maxlength="30">
                </div>

                <div class="form-group">
                    <label for="meno">Meno:</label>
                    <input type="text" id="meno" name="meno" maxlength="30">
                </div>

                <div class="form-group">
                    <label for="ico">IČO:</label>
                    <input type="text" id="ico" name="ico" maxlength="10">
                </div>

                <div class="form-group">
                    <label for="ulica">Ulica:</label>
                    <input type="text" id="ulica" name="ulica" maxlength="20">
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
                    <input type="text" id="tlf" name="tlf" maxlength="15">
                </div>

                <div class="form-group">
                    <label for="pozn">Poznámka:</label>
                    <textarea id="pozn" name="pozn" maxlength="60"></textarea>
                </div>

                <button type="button" onclick="savePartner()">Uložiť</button>
            </form>
        </div>
    </div>

    <script>
        const apiUrl = '<?= site_url('partners/api') ?>';

        let partnersTable;

        $(document).ready(function() {
            partnersTable = $('#partnersTable').DataTable({
                stateSave: true,
                pagingType: 'numbers',
                ajax: {
                    url: apiUrl,
                    dataSrc: ''
                },
                columns: [
                    { data: 'kodop' },
                    { data: 'firma', defaultContent: '' },
                    { data: 'meno', defaultContent: '' },
                    { data: 'ico', defaultContent: '' },
                    { data: 'miesto', defaultContent: '' },
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row) {
                            return `<button onclick='editPartnerFromTable(` + JSON.stringify(row) + `)'>Upraviť</button>
                                    <button onclick='deletePartner(` + row.kodop + `)' style='margin-left: 5px;'>Zmazať</button>`;
                        }
                    }
                ],
                language: {
                    search: "Vyhľadávanie:",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy neboli nájdené",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov",
                    infoEmpty: "Zobrazených 0 až 0 z 0 záznamov",
                    infoFiltered: "(vyfiltrované z _MAX_ celkových záznamov)",
                    emptyTable: "Žiadne dáta nie sú k dispozícii"},
                ordering: true,
                paging: true,
                pageLength: 25
            });
        });

        function editPartnerFromTable(rowObj) {
            openEditModal(rowObj);
        }

        let partnersTable;

        $(document).ready(function() {
            partnersTable = $('#partnersTable').DataTable({
                stateSave: true,
                pagingType: 'numbers',
                ajax: {
                    url: apiUrl,
                    dataSrc: ''
                },
                columns: [
                    { data: 'kodop' },
                    { data: 'firma', defaultContent: '' },
                    { data: 'meno', defaultContent: '' },
                    { data: 'ico', defaultContent: '' },
                    { data: 'miesto', defaultContent: '' },
                    {
                        data: null,
                        orderable: false,
                        render: function (data, type, row) {
                            return `<button onclick='editPartnerFromTable(` + JSON.stringify(row) + `)'>Upraviť</button>
                                    <button onclick='deletePartner(` + row.kodop + `)' style='margin-left: 5px;'>Zmazať</button>`;
                        }
                    }
                ],
                language: {
                    search: "Vyhľadávanie:",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy neboli nájdené",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov",
                    infoEmpty: "Zobrazených 0 až 0 z 0 záznamov",
                    infoFiltered: "(vyfiltrované z _MAX_ celkových záznamov)",
                    emptyTable: "Žiadne dáta nie sú k dispozícii"},
                ordering: true,
                paging: true,
                pageLength: 25
            });
        });

        function editPartnerFromTable(rowObj) {
            openEditModal(rowObj);
        }

        async function loadPartners() {
            if (partnersTable) {
                partnersTable.ajax.reload(null, false); // reload without resetting pagination
            }
        }

        function openModal(title) {
            document.getElementById('modalTitle').textContent = title;
            document.getElementById('partnerModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('partnerModal').style.display = 'none';
            document.getElementById('partnerForm').reset();
            document.getElementById('originalKodop').value = '';
        }

        function openCreateModal() {
            openModal('Pridať partnera');
        }

        function openEditModal(partner) {
            openModal('Upraviť partnera');

            document.getElementById('originalKodop').value = partner.kodop;
            ['kodop', 'firma', 'meno', 'ico', 'ulica', 'miesto', 'psc', 'tlf', 'pozn'].forEach(key => {
                if (document.getElementById(key)) {
                    document.getElementById(key).value = partner[key] || '';
                }
            });
        }

        async function savePartner() {
            const form = document.getElementById('partnerForm');
            const originalKodop = document.getElementById('originalKodop').value;

            const data = {};
            new FormData(form).forEach((value, key) => {
                data[key] = value;
            });

            try {
                let response;
                if (originalKodop) {
                    response = await fetch(`${apiUrl}/${originalKodop}`, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                } else {
                    response = await fetch(apiUrl, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify(data)
                    });
                }

                if (response.ok) {
                    closeModal();
                    loadPartners();
                } else {
                    const result = await response.json();
                    alert('Chyba: ' + JSON.stringify(result.errors || result));
                }
            } catch (error) {
                console.error('Error saving:', error);
                alert('Chyba pri ukladaní.');
            }
        }

        async function deletePartner(kodop) {
            if (!confirm('Naozaj chcete zmazať tohto partnera?')) return;

            try {
                const response = await fetch(`${apiUrl}/${kodop}`, {
                    method: 'DELETE'
                });

                if (response.ok) {
                    loadPartners();
                } else {
                    alert('Chyba pri mazaní.');
                }
            } catch (error) {
                console.error('Error deleting:', error);
                alert('Chyba pri mazaní.');
            }
        }

        // // window.onload = loadPartners; handled by DataTables handled by DataTables
    </script>
</body>
</html>
