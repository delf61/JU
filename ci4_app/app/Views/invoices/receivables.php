<?= $this->include('layout/header') ?>

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
</style>

<div style="margin-bottom: 20px;">
    <h1 style="margin: 0; padding-bottom: 10px;">Pohľadávky</h1>
    <h2 style="margin: 0; border-top: 2px solid #ccc; padding-top: 10px;"><?= esc($year) ?></h2>
</div>

<div class="mb-3">
    <span class="hotkey-hint"><span class="key-badge">F2 / F10</span> Návrat (Domov)</span>
    <span class="hotkey-hint"><span class="key-badge">F4</span> Položky (Aktuálny riadok)</span>
    <span class="hotkey-hint"><span class="key-badge">F8</span> Detail faktúry</span>
</div>

<table id="receivablesTable" class="display table table-striped table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Dátum</th>
            <th>Doklad</th>
            <th>Zákazník</th>
            <th class="text-end">Suma (zn)</th>
            <th class="text-end">Uhradené</th>
            <th class="text-center">Stav</th>
            <th class="text-center">Akcie</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data will be loaded via AJAX/API or rendered directly if passed in $entries -->
    </tbody>
</table>

<script>
$(document).ready(function() {
    var table = $('#receivablesTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/sk.json"
        },
        "ajax": {
            "url": "<?= base_url('invoices/api/receivables') ?>", // Toto si neskôr upravíme na reálny endpoint pre rok, ak treba
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
            { "data": "zn", className: "text-end", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhrada", className: "text-end", render: $.fn.dataTable.render.number(' ', ',', 2, '', ' €') },
            { "data": "uhr", className: "text-center", render: function(data) {
                if (data === '\u25a0') return '<span class="badge bg-success">Uhradené</span>';
                if (data === '<') return '<span class="badge bg-warning text-dark">Preplatok</span>';
                if (data === '>') return '<span class="badge bg-danger">Čiastočne</span>';
                return '<span class="badge bg-secondary">Neuhradené</span>';
            }},
            {
                "data": null,
                "className": "text-center",
                "render": function(data, type, row) {
                    // Simulate F4 and F8 as buttons
                    return `<button class="btn btn-sm btn-outline-primary" onclick="alert('F4 Položky pre doklad: ${row.b}')">F4 Položky</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="alert('F8 Detail pre doklad: ${row.b}')">F8 Detail</button>`;
                }
            }
        ]
    });

    // Handle F-keys globally
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
</script>

<?= $this->include('layout/footer') ?>
