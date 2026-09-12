<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Záväzky</title>
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


    .btn-attachment-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-attachment-has {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #343a40; /* tmavy stvorec */
        color: white; /* biela sponka */
        border: 1px solid #23272b;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-has:hover { background-color: #23272b; }

    .btn-attachment-empty {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #e9ecef; /* sedy stvorec */
        color: transparent; /* bez sponky - text je transparentny alebo ziadny */
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-empty:hover { background-color: #dde0e3; }


    /* Modal styles mimicking DOS UI overlay */
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
        width: 50%;
        color: var(--text-color);
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }
    .dos-modal-header {
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        padding-bottom: 5px;
    }
    .close-modal {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close-modal:hover,
    .close-modal:focus {
        color: #fff;
        text-decoration: none;
    }
    .attachment-list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 15px;
    }
    .attachment-list li {
        padding: 5px;
        border-bottom: 1px dashed var(--border-color);
    }
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


    .btn-attachment-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-attachment-has {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #343a40; /* tmavy stvorec */
        color: white; /* biela sponka */
        border: 1px solid #23272b;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-has:hover { background-color: #23272b; }

    .btn-attachment-empty {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #e9ecef; /* sedy stvorec */
        color: transparent; /* bez sponky - text je transparentny alebo ziadny */
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-empty:hover { background-color: #dde0e3; }


    /* Modal styles mimicking DOS UI overlay */
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
        width: 50%;
        color: var(--text-color);
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }
    .dos-modal-header {
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        padding-bottom: 5px;
    }
    .close-modal {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close-modal:hover,
    .close-modal:focus {
        color: #fff;
        text-decoration: none;
    }
    .attachment-list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 15px;
    }
    .attachment-list li {
        padding: 5px;
        border-bottom: 1px dashed var(--border-color);
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



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

<style>
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: inherit !important;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        color: inherit !important;
    }

    .btn-action { padding: 4px 8px; border-radius: 3px; font-size: 0.85em; text-decoration: none; margin: 0 2px; display: inline-block; cursor: pointer; }
    .btn-edit { background: #ffc107; color: black; border: 1px solid #e0a800; }
    .btn-edit:hover { background: #e0a800; }

    .hotkey-hint {
        font-size: 0.8em;
        color: #888;
        display: inline-block;
        margin-left: 15px;
    }
    .key-badge {
        background: #444;
        color: #fff;
        padding: 2px 6px;
        border-radius: 4px;
        font-family: monospace;
    }


    .btn-attachment-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn-attachment-has {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #343a40; /* tmavy stvorec */
        color: white; /* biela sponka */
        border: 1px solid #23272b;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-has:hover { background-color: #23272b; }

    .btn-attachment-empty {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 28px;
        height: 28px;
        background-color: #e9ecef; /* sedy stvorec */
        color: transparent; /* bez sponky - text je transparentny alebo ziadny */
        border: 1px solid #ced4da;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-attachment-empty:hover { background-color: #dde0e3; }


    /* Modal styles mimicking DOS UI overlay */
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
        width: 50%;
        color: var(--text-color);
        box-shadow: 0 0 15px rgba(0,0,0,0.5);
    }
    .dos-modal-header {
        border-bottom: 1px solid var(--border-color);
        margin-bottom: 15px;
        padding-bottom: 5px;
    }
    .close-modal {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }
    .close-modal:hover,
    .close-modal:focus {
        color: #fff;
        text-decoration: none;
    }
    .attachment-list {
        list-style-type: none;
        padding: 0;
        margin-bottom: 15px;
    }
    .attachment-list li {
        padding: 5px;
        border-bottom: 1px dashed var(--border-color);
    }
</style>

<div style="margin-bottom: 20px;">
    <h1 style="margin: 0; padding-bottom: 10px;">Záväzky</h1>
    <h2 style="margin: 0; border-top: 2px solid #ccc; padding-top: 10px;"><?= esc($year) ?></h2>
</div>

<div class="mb-3">
    <span class="hotkey-hint"><span class="key-badge">F2 / F10 / F1 / F5</span> Návrat (Domov)</span>
    <span class="hotkey-hint"><span class="key-badge">F4</span> Položky (Aktuálny riadok)</span>
    <span class="hotkey-hint"><span class="key-badge">F8</span> Detail faktúry</span>
</div>

<table id="liabilitiesTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Dátum</th>
            <th>Doklad</th>
            <th>Ext. doklad</th>
            <th class="text-center">📎</th>
            <th>Dodávateľ</th>
            <th class="text-right">Suma (zn)</th>
            <th class="text-right">Uhradené (pc)</th>
            <th class="text-center">Stav</th>
            <th class="text-center">Akcie</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
$(document).ready(function() {
    $.fn.dataTable.ext.errMode = 'none';
    $('#liabilitiesTable').on('error.dt', function(e, settings, techNote, message) {
        console.error('DataTables Error:', message);
        alert('Nepodarilo sa načítať dáta (možno chýbajúca tabuľka v DB alebo spojenie). Skontrolujte konzolu.');
    });
    var table = $('#liabilitiesTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/sk.json"
        },
        "ajax": {
            "url": "<?= base_url('invoices/api/liabilities') ?>?year=<?= esc($year) ?>",
            "dataSrc": ""
        },
        "columns": [
            { "data": "a", render: function(data) {
                if(!data) return '';
                let d = new Date(data);
                return d.toLocaleDateString('sk-SK');
            }},

            { "data": "b" },
            { "data": "var_sym" },
            {
                "data": null,
                "className": "text-center align-middle",
                "orderable": false,
                "render": function(data, type, row) {
                    if (row.has_attachment) {
                        return `<div class="btn-attachment-container"><button class="btn-attachment-has attachment-trigger" title="Zobraziť prílohy">📎</button></div>`;
                    } else {
                        return `<div class="btn-attachment-container"><button class="btn-attachment-empty attachment-trigger" title="Pridať prílohu">&nbsp;</button></div>`;
                    }
                }
            },

            { "data": "od" },
            { "data": "zn", className: "text-right", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhrada", className: "text-right", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhr", className: "text-center", render: function(data) {
                if (data === '\u25a0') return '<span style="color:green; font-weight:bold;">Uhradené</span>';
                if (data === '<') return '<span style="color:orange; font-weight:bold;">Preplatok</span>';
                if (data === '>') return '<span style="color:red; font-weight:bold;">Čiastočne</span>';
                return '<span style="color:gray; font-weight:bold;">Neuhradené</span>';
            }},
            {
                "data": null,
                "className": "text-center",
                "render": function(data, type, row) {
                    return `<button class="btn btn-action" onclick="alert('F4 Položky pre doklad: ${row.b}')">F4</button>
                            <button class="btn btn-action btn-edit" onclick="alert('F8 Detail pre doklad: ${row.b}')">F8</button>`;
                }
            }
        ],
        "order": [[0, "desc"]]
    });

    $(document).keydown(function(e) {
        if (e.key === "F2" || e.key === "F10" || e.key === "F1" || e.key === "F5") {
            e.preventDefault();
            window.location.href = "<?= base_url('/') ?>";
        }
        else if (e.key === "F4") {
            e.preventDefault();
            alert("Stlačené F4 - zobrazenie položiek (kzpol) pre aktuálne vybraný riadok.");
        }
        else if (e.key === "F8") {
            e.preventDefault();
            alert("Stlačené F8 - zobrazenie detailu (eKz) pre aktuálne vybraný riadok.");
        }
    });
});

// Attachment logic
var currentDoklad = '';

$('#liabilitiesTable tbody').on('click', '.attachment-trigger', function () {
    var tr = $(this).closest('tr');
    var row = $('#liabilitiesTable').DataTable().row(tr).data();

    if (row) {
        currentDoklad = row.b;

        let d = new Date(row.a);
        let datumStr = d.toLocaleDateString('sk-SK');

        let displayStr = `${datumStr} | ${row.var_sym || ''} | ${row.od || ''}`;

        $('#modalDoklad').text(displayStr);
        $('#uploadDoklad').val(row.b);
        $('#uploadStatus').text('');
        $('#fileInput').val('');

        loadAttachments();

        $('#attachmentsModal').show();
    }
});

function loadAttachments() {
    $('#attachmentList').html('<li>Načítavam...</li>');
    $.ajax({
        url: '<?= base_url('invoices/api/liabilities/attachments') ?>',
        type: 'GET',
        data: { b: currentDoklad },
        success: function(data) {
            $('#attachmentList').empty();
            if (data.length === 0) {
                $('#attachmentList').html('<li>Zatiaľ neboli nahraté žiadne prílohy.</li>');
            } else {
                data.forEach(function(att) {
                    let dlUrl = '<?= base_url('invoices/api/liabilities/attachments/download/') ?>' + att.id;
                    let li = `<li>
                        <a href="${dlUrl}" target="_blank">📄 ${att.original_name}</a>
                        <span style="float:right; font-size: 0.8em; color: #888;">${att.created_at}</span>
                    </li>`;
                    $('#attachmentList').append(li);
                });
            }
        },
        error: function(err) {
            $('#attachmentList').html('<li style="color:red;">Chyba pri načítaní príloh.</li>');
        }
    });
}

$('.close-modal').click(function() {
    $('#attachmentsModal').hide();
});

$(window).click(function(event) {
    if ($(event.target).is('#attachmentsModal')) {
        $('#attachmentsModal').hide();
    }
});

$('#uploadForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $('#uploadStatus').text('Nahrávam...').css('color', 'orange');

    $.ajax({
        url: '<?= base_url('invoices/api/liabilities/attachments/upload') ?>',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            $('#uploadStatus').text(response.message).css('color', 'green');
            $('#fileInput').val(''); // clear input
            loadAttachments(); // reload list
        },
        error: function(xhr) {
            let msg = 'Chyba pri nahrávaní.';
            if (xhr.responseJSON && xhr.responseJSON.error) {
                msg = xhr.responseJSON.error;
            }
            $('#uploadStatus').text(msg).css('color', 'red');
        }
    });
});
</script>


<!-- Attachments Modal -->
<div id="attachmentsModal" class="dos-modal">
    <div class="dos-modal-content">
        <div class="dos-modal-header">
            <span class="close-modal">&times;</span>
            <h3 style="margin:0; font-size: 1.2rem;">Prílohy: <span id="modalDoklad"></span></h3>
        </div>
        <div id="modalBody">
            <ul id="attachmentList" class="attachment-list">
                <!-- Attachments will be loaded here -->
            </ul>
            <form id="uploadForm" enctype="multipart/form-data">
                <input type="hidden" id="uploadDoklad" name="b">
                <div style="margin-bottom: 10px;">
                    <input type="file" id="fileInput" name="attachment" accept=".pdf, .jpg, .jpeg, .png" required style="width: 100%; padding: 5px;">
                </div>
                <button type="submit" class="btn btn-action btn-attachment" style="padding: 8px 15px;">Nahrať súbor</button>
                <span id="uploadStatus" style="margin-left: 10px; font-weight: bold;"></span>
            </form>
        </div>
    </div>
</div>

</body>
</html>
