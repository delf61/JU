<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pohľadávky</title>
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

    <!-- Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/sk.js"></script>
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


    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-msg"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-msg"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

<div style="margin-bottom: 20px;">
    <h1 style="margin: 0; padding-bottom: 10px;">Pohľadávky</h1>
    <h2 style="margin: 0; border-top: 2px solid #ccc; padding-top: 10px;"><?= esc($year) ?></h2>
</div>

    <div style="margin-bottom: 10px; font-size: 0.9em; color: #666;">
        <strong>F2 / F10</strong>: Návrat domov &nbsp;|&nbsp;
        <strong>F4</strong>: Položky (kppol) &nbsp;|&nbsp;
        <strong>F8</strong>: Detail faktúry
    </div>

    <table id="receivablesTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>dátum</th>
                <th>doklad</th>
                <th>zákazník</th>
                <th class="text-right">celkove (zn)</th>
                <th class="text-right">uhradené (pc)</th>
                <th class="text-center">stav</th>
                <th>akcie</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
        <div class="card" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <button id="btnOpenCreateReceivable" class="btn" style="background-color: #28a745; border:none; cursor:pointer;" >Pridať nový záznam</button>
        <a href="<?= base_url() ?>" class="btn" style="background-color: #6c757d; margin-left: auto;">Späť na domovskú stránku</a>
    </div>

<script>
$(document).ready(function() {
    // Init flatpickr on date inputs
    flatpickr("input[type=date]", {
        locale: "sk",
        dateFormat: "Y-m-d",
        allowInput: true
    });

    $.fn.dataTable.ext.errMode = 'none';
    $('#receivablesTable').on('error.dt', function(e, settings, techNote, message) {
        console.error('DataTables Error:', message);
        alert('Nepodarilo sa načítať dáta (možno chýbajúca tabuľka v DB alebo spojenie). Skontrolujte konzolu.');
    });
    var table = $('#receivablesTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/sk.json"
        },
        "ajax": {
            "url": "<?= base_url('invoices/api/receivables') ?>?year=<?= esc($year) ?>",
            "dataSrc": ""
        },
        "columns": [
            { "data": "a", render: function(data) {
                if(!data) return '';
                let d = new Date(data);
                return d.toLocaleDateString('sk-SK');
            }},
            { "data": "b" },
            { "data": "od" },
            { "data": "zn", className: "text-right", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhrada", className: "text-right", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhr", className: "text-center", render: function(data) {
                if (data === '■') return '<span style="color:green;">Uhradené</span>';
                if (data === '<') return '<span style="color:orange;">Preplatok</span>';
                if (data === '>') return '<span style="color:red;">Čiastočne</span>';
                return '<span style="color:gray;">Neuhradené</span>';
            }},
            {
                "data": null,
                "render": function(data, type, row) {
                    return `<button class="btn btn-action" onclick="alert('F4 Položky pre doklad: ${row.b}')">F4</button>
                            <button class="btn btn-action btn-edit" onclick="alert('F8 Detail pre doklad: ${row.b}')">F8</button>`;
                }
            }
        ],
        "order": [[0, "desc"]]
    });

    $(document).keydown(function(e) {
        if (e.key === "F2" || e.key === "F10") {
            e.preventDefault();
            window.location.href = "<?= base_url('/') ?>";
        }
        else if (e.key === "F4") {
            e.preventDefault();
            alert("Stlačené F4 - zobrazenie položiek (kppol) pre aktuálne vybraný riadok (vyžaduje select logiku).");
        }
        else if (e.key === "F8") {
            e.preventDefault();
            alert("Stlačené F8 - zobrazenie detailu (eKP) pre aktuálne vybraný riadok.");
        }
    });
});

// Create Receivable (DATOVÝ EDITOR eKP) Logic


$('.close-create-modal').click(function() {
    $('#createModal').hide();
});

function openCreateModal() {
    $('#createModal').show();
    $('#createStatus').text('');

    // Predvyplnit dnesny datum a vyprazdnit hodnoty
    document.getElementById('create_a').valueAsDate = new Date();
    $('#create_zp').val($('#create_a').val());

    $('#create_od').val('');
    $('#create_n').val('');
    $('#create_splat').val('');

    $('#create_z').val('0.00');
    $('#create_dph').val('20');
    $('#create_dph_sk').val('0.00');
    $('#create_tovar').val('0.00');
    $('#create_sluzby').val('0.00');
    $('#create_vyrovn').val('0.00');
    $('#create_zn').val('0.00');
    $('#create_pc').val('0.00');
    $('#create_pohlad').val('0.00');
}

// Dynamicke prepocitavanie eKP

});


</script>

<!-- Global ESC key handler for all modals -->
<script>
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            // Close any custom .modal or .dos-modal
            document.querySelectorAll('.modal, .dos-modal').forEach(function(modal) {
                modal.style.display = 'none';
            });
            // Also attempt to close any standard Bootstrap modals if Bootstrap is loaded
            if (typeof bootstrap !== 'undefined' && typeof bootstrap.Modal !== 'undefined') {
                const openModals = document.querySelectorAll('.modal.show');
                openModals.forEach(modalEl => {
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                });
            }
            // And if jQuery is used with hide() logic
            if (typeof $ !== 'undefined') {
                $('.modal, .dos-modal').hide();
            }
        }
    });

// Create Receivable (DATOVÝ EDITOR eKP) Logic


$('.close-create-modal').click(function() {
    $('#createModal').hide();
});

function openCreateModal() {
    $('#createModal').show();
    $('#createStatus').text('');

    // Predvyplnit dnesny datum a vyprazdnit hodnoty
    document.getElementById('create_a').valueAsDate = new Date();
    $('#create_zp').val($('#create_a').val());

    $('#create_od').val('');
    $('#create_n').val('');
    $('#create_splat').val('');

    $('#create_z').val('0.00');
    $('#create_dph').val('20');
    $('#create_dph_sk').val('0.00');
    $('#create_tovar').val('0.00');
    $('#create_sluzby').val('0.00');
    $('#create_vyrovn').val('0.00');
    $('#create_zn').val('0.00');
    $('#create_pc').val('0.00');
    $('#create_pohlad').val('0.00');
}

// Dynamicke prepocitavanie eKP


    $('#createForm input[type="number"]').on('input', function() {
        let v_z = parseFloat($('#v_z').val()) || 0;
        let v_d = parseFloat($('#v_d').val()) || 0;
        let p_z = parseFloat($('#p_z').val()) || 0;
        let p_d = parseFloat($('#p_d').val()) || 0;
        let z_z = parseFloat($('#z_z').val()) || 0;
        let z_d = parseFloat($('#z_d').val()) || 0;
        let suma_zakl = v_z + p_z + z_z;
        let suma_dph = v_d + p_d + z_d;
        let celkom = suma_zakl + suma_dph;
        $('#zn').val(celkom.toFixed(2));

        let vyrovn = parseFloat($('#vyrovn').val()) || 0;
        let pohladavka = celkom + vyrovn;
        $('#pohladavka_display').val(pohladavka.toFixed(2));
    });

    $(document).on('submit', '#createForm', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('csrf_test_name', csrf_hash());

        $.ajax({
            url: '/invoices/receivables',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.csrf_hash) updateCSRF(response.csrf_hash);
                if (response.success) {
                    $('#createModal').hide();
                    table.ajax.reload();
                    $('#createForm')[0].reset();
                } else {
                    alert('Chyba: ' + (response.message || 'Neznáma chyba'));
                }
            },
            error: function(xhr) {
                let msg = 'Chyba servera';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.csrf_hash) updateCSRF(xhr.responseJSON.csrf_hash);
                    msg = xhr.responseJSON.message || msg;
                }
                alert('Chyba pri ukladaní: ' + msg);
            }
        });
    });

    $('#btnOpenCreateReceivable').click(function(e) {
        e.preventDefault();
        $('#createForm')[0].reset();

        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayStr = `${year}-${month}-${day}`;
        $('#create_a').val(todayStr);

        $.get('/api/receivables/next-b', function(data) {
            if (data && data.next_b) {
                $('#create_b').val(data.next_b);
            }
        });

        $('#createModal').show();
    });

    $('.close-modal').click(function() {
        $('#createModal').hide();
    });
});


</script>


<!-- Create Receivable Modal (DATOVÝ EDITOR eKP) -->
<div id="createModal" class="dos-modal">
    <div class="dos-modal-content">
        <div class="dos-modal-header">
            <h3 style="margin:0; font-size: 1.2rem;">Zadávanie novej odoslanej faktúry</h3>
            <span class="close-create-modal close-modal">&times;</span>
        </div>

        <form id="createForm" class="fand-form-grid">
            <!-- Row 1 -->
            <label class="fand-span-3">Dátum zaradenia</label>
            <div class="fand-span-4" style="display: flex; gap: 5px;">
                <input type="date" id="create_a" name="a" required style="flex:1; padding: 4px;">
                <input type="text" id="create_akyden" placeholder="Po" style="width: 40px; padding: 4px;" readonly disabled>
            </div>
            <label class="fand-span-2 text-right">Označenie</label>
            <input class="fand-span-3" type="text" id="create_b" name="b" placeholder="Auto..." style="padding: 4px;" readonly disabled>

            <!-- Row 2 -->
            <label class="fand-span-3">Dátum splatnosti</label>
            <div class="fand-span-4" style="display: flex; gap: 5px;">
                <input type="date" id="create_splat" name="ds" style="flex:1; padding: 4px;">
                <input type="text" id="create_akyden1" placeholder="St" style="width: 40px; padding: 4px;" readonly disabled>
            </div>

            <!-- Row 3 -->
            <label class="fand-span-3">Dátum zdan. plnenia</label>
            <div class="fand-span-4" style="display: flex; gap: 5px;">
                <input type="date" id="create_zp" name="zp" style="flex:1; padding: 4px;">
            </div>

            <!-- Row 4 -->
            <label class="fand-span-3">Odberateľ</label>
            <input class="fand-span-7" type="text" id="create_od" name="od" required style="padding: 4px;">

            <!-- Row 5 -->
            <label class="fand-span-3">Text</label>
            <input class="fand-span-9" type="text" id="create_n" name="n" style="padding: 4px;">

            <!-- Spacer -->
            <div class="fand-span-12" style="height: 15px;"></div>

            <!-- DPH Section -->
            <label class="fand-span-3">Fakturácia bez DPH</label>
            <div class="fand-span-3">
                <input type="number" step="0.01" id="create_z" name="z" value="0.00" class="text-right" style="padding: 4px;" required>
            </div>
            <label class="fand-span-2 text-right">DPH</label>
            <div class="fand-span-4" style="display:flex; gap:5px; align-items:center;">
                <input type="number" step="0.01" id="create_dph" name="dph" value="20" style="width: 60px; text-align: center; padding: 4px;"> %
                <input type="number" step="0.01" id="create_dph_sk" name="dph_sk" value="0.00" class="text-right" style="flex:1; padding: 4px; background: var(--hover-bg);" readonly disabled>
            </div>

            <!-- Tovar a sluzby -->
            <label class="fand-span-3 text-right">Tovar</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_tovar" name="tovar" value="0.00" style="padding: 4px;">
            <label class="fand-span-3 text-right">Faktur. suma s DPH</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_zn" name="zn" value="0.00" style="font-weight:bold; padding: 4px; background: var(--hover-bg);" readonly disabled>

            <label class="fand-span-3 text-right">Služby</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_sluzby" name="sluzby" value="0.00" style="padding: 4px;">
            <label class="fand-span-3 text-right">Halier. vyrovnanie</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_vyrovn" name="vyrovn" value="0.00" style="padding: 4px;">

            <!-- Spacer -->
            <div class="fand-span-12" style="height: 10px;"></div>

            <!-- Uhrady -->
            <label class="fand-span-9 text-right">Uhradené - spolu</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_pc" name="pc" value="0.00" style="padding: 4px;">

            <label class="fand-span-9 text-right" style="font-weight: bold;">Pohľadávka</label>
            <input class="fand-span-3 text-right" type="number" step="0.01" id="create_pohlad" name="pohlad" value="0.00" style="font-weight:bold; padding: 4px; background: var(--hover-bg);" readonly disabled>

            <div class="fand-span-12" style="margin-top: 20px; text-align: right;">
                <div id="createStatus" style="font-weight: bold; margin-bottom: 10px;"></div>
                <button type="submit" class="btn btn-action" style="background: #28a745; color: white; padding: 10px 30px; font-size: 1.1rem;">Uložiť záznam</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
