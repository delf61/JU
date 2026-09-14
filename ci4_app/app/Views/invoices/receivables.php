<!DOCTYPE html>
<html lang="sk" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Pohľadávky (eKP)</title>
    <!-- Bootstrap CSS for basic layout -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Flatpickr CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/sk.js"></script>

    <!-- DataTables CSS & JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
            --bg-color: #f8f9fa;
            --text-color: #212529;
            --card-bg: #ffffff;
            --border-color: #dee2e6;
            --th-bg: #e9ecef;
            --hover-bg: #f2f2f2;
            --link-color: #0d6efd;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: monospace;
            padding: 20px;
        }

        table.dataTable {
            color: var(--text-color) !important;
            border-collapse: collapse;
        }

        table.dataTable thead th {
            border-bottom: 2px solid var(--border-color) !important;
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

    .dos-modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.7);
    }
    .dos-modal-content {
        background-color: var(--card-bg);
        margin: 5% auto;
        padding: 20px;
        border: 2px solid var(--border-color);
        width: 60%;
        max-width: 1000px;
        height: auto;
        max-height: 90vh;
        overflow-y: auto;
        color: var(--text-color);
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }
    .dos-modal-header {
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        padding-bottom: 5px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }
    .close-modal {
        color: #aaa;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close-modal:hover, .close-modal:focus {
        color: #fff;
        text-decoration: none;
    }
    .fand-form-grid {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 8px;
        align-items: center;
        font-family: monospace;
        font-size: 1.1em;
    }
    .fand-form-grid label {
        margin: 0;
        white-space: nowrap;
    }
    .fand-form-grid input, .fand-form-grid select {
        padding: 4px;
        width: 100%;
        background-color: var(--card-bg);
        color: var(--text-color);
        border: 1px solid var(--border-color);
    }
    .fand-span-1 { grid-column: span 1; }
    .fand-span-2 { grid-column: span 2; }
    .fand-span-3 { grid-column: span 3; }
    .fand-span-4 { grid-column: span 4; }
    .fand-span-5 { grid-column: span 5; }
    .fand-span-6 { grid-column: span 6; }
    .fand-span-7 { grid-column: span 7; }
    .fand-span-8 { grid-column: span 8; }
    .fand-span-9 { grid-column: span 9; }
    .fand-span-10 { grid-column: span 10; }
    .fand-span-12 { grid-column: span 12; }

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


    <!-- jQuery UI for Autocomplete -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

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
        <div style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <button id="btnOpenCreateReceivable" class="btn" style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 3px; border:none; cursor:pointer;" onclick="openCreateModal()">Pridať nový záznam</button>
        <a href="<?= base_url() ?>" class="btn" style="background-color: #6c757d; color: white; padding: 5px 10px; border-radius: 3px; text-decoration: none; margin-left: auto;">Späť na domovskú stránku</a>
    </div>
<script>
var table;
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('#receivablesTable').on('error.dt', function(e, settings, techNote, message) {
        console.error('DataTables Error:', message);
    });
    table = $('#receivablesTable').DataTable({
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

    flatpickr("input[type=date]", {
        locale: "sk",
        dateFormat: "Y-m-d",
        allowInput: true,
        onChange: function(selectedDates, dateStr, instance) {
            if (!dateStr) return;
            let year = parseInt(dateStr.split('-')[0]);
            if (year <= 2008) {
                $('#dph_label').text('DPH (Sk)');
            } else {
                $('#dph_label').text('DPH (€)');
            }
            $.get('/vat/api/rates?date=' + dateStr, function(data) {
                if (data && data.upper !== undefined) {
                    $('#dph').val(data.upper.toFixed(2));
                }
            });
        }
    });
});

    function openCreateModal() {
        $('#createForm')[0].reset();
        $('#zp').val('bankovým prevodom');
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const todayStr = `${year}-${month}-${day}`;

        const todayStr = `${year}-${month}-${day}`;
        $('#create_a').val(todayStr);

        if (year <= 2008) {
            $('#dph_label').text('DPH (Sk)');
        } else {
            $('#dph_label').text('DPH (€)');
        }

        $.get('/vat/api/rates?date=' + todayStr, function(data) {
            if (data && data.upper !== undefined) {
                $('#dph').val(data.upper.toFixed(2));
            }
        });


        $.get('/invoices/api/receivables/next-b', function(data) {
            if (data && data.next_b) {
                $('#create_b').val(data.next_b);
            }
        });
        $('#createModal').show();
    }

    $('#createForm input[type="number"]').on('input', function() {
        let tovar = parseFloat($('#tovar').val()) || 0;
        let sluzby = parseFloat($('#sluzby').val()) || 0;
        let dph_sk = parseFloat($('#dph_sk').val()) || 0;

        let celkom = tovar + sluzby + dph_sk;
        $('#zn').val(celkom.toFixed(2));
    });

    $(document).on('submit', '#createForm', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        if (typeof csrf_hash !== 'undefined') {
            formData.append('csrf_test_name', csrf_hash());
        }

        $.ajax({
            url: '/invoices/receivables',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.csrf_hash && typeof updateCSRF !== 'undefined') updateCSRF(response.csrf_hash);
                if (response.success || response.id) {
                    $('#createModal').hide();
                    $('#receivablesTable').DataTable().ajax.reload();
                    $('#createForm')[0].reset();
        $('#zp').val('bankovým prevodom');
                } else {
                    alert('Chyba: ' + (response.message || 'Neznáma chyba'));
                }
            },
            error: function(xhr) {
                let msg = 'Chyba servera';
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.csrf_hash && typeof updateCSRF !== 'undefined') updateCSRF(xhr.responseJSON.csrf_hash);
                    msg = xhr.responseJSON.message || msg;
                }
                alert('Chyba pri ukladaní: ' + msg);
            }
        });
    });

    $(document).on('click', '.close-modal', function() {
        $('#createModal').hide();
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
        }

    $('#create_a').on('change', function() {
        let dateVal = $(this).val();
        if (!dateVal) return;

        let year = parseInt(dateVal.split('-')[0]);
        if (year <= 2008) {
            $('#dph_label').text('DPH (Sk)');
        } else {
            $('#dph_label').text('DPH (€)');
        }

        $.get('/vat/api/rates?date=' + dateVal, function(data) {
            if (data && data.upper !== undefined) {
                $('#dph').val(data.upper.toFixed(2));
            }
        });
    });

    // Autocomplete pre pole Zákazník (#od)
    $.get('/partners/api', function(data) {
        if (data && Array.isArray(data)) {
            let partnerData = data.map(function(p) {
                return {
                    label: p.nazov + (p.mesto ? ' (' + p.mesto + ')' : ''),
                    value: p.nazov,
                    kodop: p.kodop,
                    ico: p.ico,
                    mesto: p.mesto
                };
            });

            $('#od').autocomplete({
                source: partnerData,
                minLength: 2,
                select: function(event, ui) {
                    $('#kodop').val(ui.item.kodop);
                    $('#ico').val(ui.item.ico);
                    $('#n').val(ui.item.mesto); // alebo #mesto
                    // Mame tam input #n pre Mesto (v starom formate) a tiez nejaky field mozno
                }
            });
        }
    });
});
</script>

<!-- Create Receivable Modal (eKP) -->
<div id="createModal" class="dos-modal">
    <div class="dos-modal-content">
        <div class="dos-modal-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 style="margin:0; font-size: 1.2rem;">Nová faktúra</h3>
            <span class="close-create-modal close-modal">&times;</span>
        </div>

        <form id="createForm" class="fand-form-grid">
            <!-- Riadok 1: a (Dátum), hod (Čas), b (Doklad) -->
            <label class="fand-span-2">Dátum</label>
            <div class="fand-span-4" style="display: flex; gap: 5px;">
                <input type="date" id="create_a" name="a" required>
                <input type="text" id="create_akyden" placeholder="Po" style="width: 40px;" readonly disabled>
                            </div>
            <label class="fand-span-2 text-right">Doklad</label>
            <input class="fand-span-4" type="text" id="create_b" name="b" placeholder="Generované..." readonly disabled>

            <!-- Riadok 2: ds (Splatnosť), zp (Spôsob platby) -->
            <label class="fand-span-2">Splatnosť</label>
            <div class="fand-span-4" style="display: flex; gap: 5px;">
                <input type="date" id="ds" name="ds">
                <input type="text" id="create_akyden1" placeholder="Po" style="width: 40px;" readonly disabled>
            </div>
            <label class="fand-span-2 text-right">Sp. platby</label>
            <input class="fand-span-4" type="text" id="zp" name="zp" value="bankovým prevodom">

            <!-- Riadok 3: od (Zákazník), kodOP (IČO?), n (Názov/Mesto) -->
            <label class="fand-span-2">Zákazník</label>
            <input class="fand-span-4" type="text" id="od" name="od" required>
            <label class="fand-span-2 text-right">IČO</label>
            <input class="fand-span-4" type="text" id="kodop" name="kodop">

            <label class="fand-span-2">Mesto</label>
            <input class="fand-span-10" type="text" id="n" name="n">

            <!-- Riadok 4: z (Zákazka) -->
            <label class="fand-span-2">Zákazka</label>
            <input class="fand-span-4" type="text" id="z" name="z">
            <div class="fand-span-6"></div>

            <div class="fand-span-12" style="border-top: 1px dashed var(--border-color); margin: 10px 0;"></div>

            <!-- Riadky DPH a Tovar/Služby -->
            <!-- DPH -->
            <label class="fand-span-2">Sadzba DPH %</label>
            <input class="fand-span-2" type="number" step="0.01" id="dph" name="dph" value="0.00" style="text-align: right;">
            <label id="dph_label" class="fand-span-2 text-right">DPH (Sk/€)</label>
            <input class="fand-span-6" type="number" step="0.01" id="dph_sk" name="dph_sk" value="0.00" style="text-align: right;">

            <!-- Tovar a Služby -->
            <label class="fand-span-2">Tovar</label>
            <input class="fand-span-4" type="number" step="0.01" id="tovar" name="tovar" value="0.00" style="text-align: right;">
            <label class="fand-span-2 text-right">Služby</label>
            <input class="fand-span-4" type="number" step="0.01" id="sluzby" name="sluzby" value="0.00" style="text-align: right;">

            <div class="fand-span-12" style="border-top: 1px dashed var(--border-color); margin: 10px 0;"></div>

            <!-- Riadky Sumáre -->
            <!-- Faktúrovaná suma (zn) -->
            <label class="fand-span-6 text-right">Faktúrovaná suma s DPH:</label>
            <input class="fand-span-6" type="number" step="0.01" id="zn" name="zn" value="0.00" readonly disabled style="font-weight: bold; text-align: right;">







            <div class="fand-span-12" style="border-top: 1px solid var(--border-color); margin: 15px 0;"></div>

            <!-- Tlačidlá (Zarovnané dole podľa priania) -->
            <div class="fand-span-12" style="display: flex; justify-content: flex-end;">

                <button type="submit" class="btn btn-action" style="background: #28a745; color: white; padding: 10px 30px; font-size: 1.1rem; border:none; cursor:pointer; border-radius:3px;">Uložiť záznam</button>
            </div>

        </form>
    </div>
</div>


</body>
</html>
