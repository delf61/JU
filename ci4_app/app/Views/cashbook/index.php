<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peňažný denník</title>
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

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-msg"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-msg"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

<div style="margin-bottom: 20px;">
    <h1 style="margin: 0; padding-bottom: 10px;">Peňažný denník</h1>
    <h2 style="margin: 0; border-top: 2px solid #ccc; padding-top: 10px;"><?= esc($year) ?></h2>
</div>





    <table id="cashbookTable15" class="display" style="width:100%">
        <thead>
            <tr>
                <th>dátum</th>
                <th></th>
                <th>popis</th>
                <th class="text-right">celkove</th>
                <th class="text-right">s DPH</th>
                <th class="text-right">typ</th>
                <th class="text-right">kód op.</th>
                <th>ok</th>
                <th>akcie</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($entries)): ?>
                <tr>
                    <td colspan="9" style="text-align: center;">Žiadne záznamy pre tento rok.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($entries as $row): ?>
                    <?php
                        $dayOfWeek = date('N', strtotime($row['a']));
                        $days = [1 => 'Po', 2 => 'Ut', 3 => 'St', 4 => 'Št', 5 => 'Pi', 6 => 'So', 7 => 'Ne'];
                        $akyDen = $days[$dayOfWeek] ?? '';

                        // FAND exact formulas
                        $r = !empty($row['r']);
                        $a1 = (float)($row['a1'] ?? 0);
                        $a2 = (float)($row['a2'] ?? 0);
                        $a3 = (float)($row['a3'] ?? 0);
                        $a4 = (float)($row['a4'] ?? 0);
                        $a14 = (float)($row['a14'] ?? 0);

                        $a5 = $r ? ($a1 + $a3) : 0;
                        $a6 = $r ? ($a2 + $a4 - $a14) : 0;
                        $celkove = $a5 - $a6;

                        $hod_pri = $a1 + $a3;
                        $hod_vyd = $a2 + $a4;
                        $hal = (float)($row['hal_p'] ?? 0);
                        $dph_rate = (float)($row['dph'] ?? 0);
                        $year = (int)date('Y', strtotime($row['a']));

                        if ($year < 2009) {
                            $dph_sk_p = round($hod_pri * ($dph_rate / 100));
                            $dph_sk = round($hod_vyd * ($dph_rate / 100));
                        } else {
                            $dph_sk_p = round($hod_pri * ($dph_rate / 100), 2);
                            $dph_sk = round($hod_vyd * ($dph_rate / 100), 2);
                        }

                        $zn_p = $hod_pri + ($hod_pri != 0 ? $hal : 0) + $dph_sk_p;
                        $zn = $hod_vyd + ($hod_vyd != 0 ? $hal : 0) + $dph_sk;
                        $sDPH = $zn_p - $zn;

                        $ok = ''; // Not persistently stored in pd, dynamically evaluated in UI/Reports if matches criteria, default empty
                    ?>
                    <tr>
                        <td><?= esc(date('Y.m.d', strtotime($row['a']))) ?></td>
                        <td><?= esc($akyDen) ?></td>
                        <td><?= esc($row['d'] ?? '') ?></td>
                        <td class="text-right"><?= number_format($celkove, 2, '.', '') ?></td>
                        <td class="text-right"><?= number_format($sDPH, 2, '.', '') ?></td>
                        <td class="text-right"><?= esc($row['kodop'] ?? '') ?></td>
                        <td class="text-center"><a href="#" onclick="openCodesModal('<?= bin2hex($row['b']) ?>', <?= $year ?>, '<?= ($row['a2'] > 0 || $row['a4'] > 0) ? 'v' : 'p' ?>', '<?= esc($row['vydaj'] ?? '') ?>'); return false;" style="font-weight:bold; color:var(--link-color);" title="Kódy operácií (Ctrl+F6)"><?= esc($row['vydaj'] ?? '') ?: '[+]' ?></a></td>
                        <td><?= esc($ok) ?></td>
                        <td>
                            <a href="<?= site_url('cashbook/edit/' . esc($row['b']) . '/' . esc($year)) ?>" class="btn btn-edit" >Editovať</a>
                            <form action="<?= site_url('cashbook/delete/' . esc($row['b']) . '/' . esc($year)) ?>" method="post" style="display:inline;" onsubmit="return confirm('Naozaj vymazať tento záznam?');">
                                <button type="submit" class="btn btn-danger" style="background:#dc3545;color:white;border:none;padding:5px 10px;border-radius:3px;cursor:pointer;">Vymazať</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

        <div class="card" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <a href="<?= site_url('cashbook/create') ?>?year=<?= esc($year) ?>" class="btn" style="background-color: #28a745;">Pridať nový záznam</a>
        <a href="#" class="btn" style="background: #17a2b8;">Hot. príjem</a>
        <a href="#" class="btn" style="background: #17a2b8;">Hot. výdaj</a>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>&filter=bez_kodu" class="btn" style="background: <?= isset($_GET['filter']) && $_GET['filter'] === 'bez_kodu' ? '#dc3545' : '#17a2b8' ?>;" title="pVyd_Bez_Kod">Bez kódu</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="window.print()">Tlač</a>
        <a href="#" class="btn" style="background: #17a2b8;" onclick="alert('Upratovanie je servisná FAND procedúra, v CI4 nie je nutná.')">Upratovanie</a>
        <a href="<?= site_url('bank') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="Otvoriť bankové výpisy (Ucet)">Bankový účet</a>
        <a href="<?= site_url('cashbook/statistics') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="pStatist">Štatistika</a>
        <a href="<?= site_url('cashbook/summary') ?>?year=<?= esc($year) ?>" class="btn" style="background: #17a2b8;" title="pPDsuma">Sumár po akt. pol.</a>
        <a href="<?= base_url() ?>" class="btn" style="background-color: #6c757d; margin-left: auto;">Späť na domovskú stránku</a>
    </div>






    <script>
        $(document).ready(function () {
            $('#cashbookTable15').DataTable({
                lengthChange: false,
                stateSave: true,
                pagingType: 'numbers',
                language: {
                    search: "Hľadať : ",
                    lengthMenu: "Zobraziť _MENU_ záznamov na stranu",
                    zeroRecords: "Žiadne záznamy neboli nájdené",
                    info: "Zobrazených _START_ až _END_ z _TOTAL_ záznamov",
                    infoEmpty: "Zobrazených 0 až 0 z 0 záznamov",
                    infoFiltered: "(vyfiltrované z _MAX_ celkových záznamov)",
                    emptyTable: "Žiadne dáta nie sú k dispozícii"},
                ordering: true,
                paging: true,
                pageLength: 15,
                columnDefs: [
                    { orderable: false, targets: -1 } // Disable sorting on Action column
                ]
            });
        });
    </script>

    <!-- Codes Modal -->
    <div id="codesModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:10000; align-items:center; justify-content:center;">
        <div style="background:var(--card-bg); width:1200px; max-width:90%; border-radius:8px; border:1px solid var(--border-color); box-shadow:0 4px 10px rgba(0,0,0,0.2); display:flex; flex-direction:column;">
            <div style="padding:15px; border-bottom:1px solid var(--border-color); display:flex; justify-content:space-between; align-items:center;">
                <h3 id="modalTitle" style="margin:0; color:var(--text-color);">Kódy operácií</h3>
                <button onclick="closeCodesModal()" style="background:none; border:none; color:var(--text-color); font-size:1.5em; cursor:pointer;">&times;</button>
            </div>
            <div style="padding:15px; overflow-y:auto; max-height:850px;">
                <table id="codesTable" style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th style="text-align:center;">Kód</th>
                            <th>Popis výdaja / príjmu</th>
                            <th style="text-align:center;">Počet v PD</th>
                            <th style="text-align:right;">Suma €</th>
                            <th style="text-align:center;">Akcie</th>
                        </tr>
                    </thead>
                    <tbody id="codesTableBody">
                    </tbody>
                </table>
            </div>
            <div style="padding:15px; border-top:1px solid var(--border-color); text-align:right;">
                <button onclick="closeCodesModal()" class="btn btn-secondary">Zrušiť</button>
            </div>
        </div>
    </div>

    <script>
        let currentB = '';
        let currentYear = '';

        function openCodesModal(b, year, type, currentCode) {
            currentB = b;
            currentYear = year;

            const title = type === 'v' ? 'Číselník Výdavkov' : 'Číselník Príjmov';
            document.getElementById('modalTitle').innerText = title;
            document.getElementById('codesModal').style.display = 'flex';

            const tbody = document.getElementById('codesTableBody');
            tbody.innerHTML = '<tr><td colspan="3" style="text-align:center;">Načítavam dáta...</td></tr>';

            fetch(`<?= site_url('api/cashbook/codes') ?>?type=${type}&year=${year}`)
                .then(res => res.json())
                .then(data => {
                    tbody.innerHTML = '';
                    if (data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="3" style="text-align:center;">Číselník je prázdny.</td></tr>';
                        return;
                    }

                    let totalCount = 0;
                    let totalSum = 0.0;

                    data.forEach(item => {
                        const isSelected = item.kodvyd === currentCode;
                        const rowStyle = isSelected ? 'background-color: var(--hover-bg); font-weight:bold;' : '';

                        const cnt = parseInt(item.pocet) || 0;
                        const sm = parseFloat(item.suma) || 0;
                        totalCount += cnt;
                        totalSum += sm;

                        const tr = document.createElement('tr');
                        tr.style = rowStyle;

                        tr.innerHTML = `
                            <td style="text-align:center; font-size:1.2em; color:var(--text-color); border:1px solid var(--border-color);">${item.kodvyd}</td>
                            <td style="border:1px solid var(--border-color);">
                                <span id="desc_text_${item.PK}" style="color:var(--text-color);">${item.d}</span>
                                <input type="text" id="desc_input_${item.PK}" value="${item.d}" style="display:none; width:100%;" onkeydown="if(event.key==='Enter') saveDesc(${item.PK})">
                            </td>
                            <td style="text-align:center; border:1px solid var(--border-color); color:var(--text-color);">${cnt}</td>
                            <td style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">${sm.toFixed(2)}</td>
                            <td style="text-align:center; border:1px solid var(--border-color); padding:5px;">
                                <button onclick="selectCode('${item.kodvyd}')" class="btn btn-action" style="background:#28a745; color:#fff;" title="F3 Vybrať kód pre tento riadok">Vybrať (F3)</button>
                                <button onclick="editDesc(${item.PK})" class="btn btn-action" style="background:#ffc107; color:#000;" title="F4 Upraviť názov kategórie">Editovať (F4)</button>
                                <a href="<?= site_url('cashbook') ?>?year=${year}&filter_kod=${item.kodvyd}" class="btn btn-action" style="background:#17a2b8; color:#fff; text-decoration:none;" title="F1 Zobraziť históriu (iba položky s týmto kódom)">História (F1)</a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });

                    // Add Summary Row
                    const tfoot = document.createElement('tr');
                    tfoot.style = 'font-weight:bold; background-color: var(--th-bg);';
                    tfoot.innerHTML = `
                        <td colspan="2" style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">─ Spolu v PD :</td>
                        <td style="text-align:center; border:1px solid var(--border-color); color:var(--text-color);">${totalCount}</td>
                        <td style="text-align:right; border:1px solid var(--border-color); color:var(--text-color);">${totalSum.toFixed(2)}</td>
                        <td style="border:1px solid var(--border-color);"></td>
                    `;
                    tbody.appendChild(tfoot);
                })
                .catch(err => {
                    tbody.innerHTML = '<tr><td colspan="3" style="text-align:center; color:red;">Chyba pri načítaní: ' + err + '</td></tr>';
                });
        }


        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modal = document.getElementById('codesModal');
                if (modal && modal.style.display !== 'none') {
                    closeCodesModal();
                }
            }
        });

        function closeCodesModal() {
            document.getElementById('codesModal').style.display = 'none';
        }

        function selectCode(code) {
            const formData = new FormData();
            formData.append('b', currentB);
            formData.append('year', currentYear);
            formData.append('kod', code);

            fetch(`<?= site_url('api/cashbook/update_code') ?>`, {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if(data.status === 'success') {
                    location.reload(); // Reload immediately to apply and preserve datatables state
                } else {
                    alert('Chyba: ' + data.message);
                }
            });
        }

        function editDesc(pk) {
            document.getElementById('desc_text_' + pk).style.display = 'none';
            const inp = document.getElementById('desc_input_' + pk);
            inp.style.display = 'inline-block';
            inp.focus();
        }

        function saveDesc(pk) {
            const newDesc = document.getElementById('desc_input_' + pk).value;
            const formData = new FormData();
            formData.append('pk', pk);
            formData.append('desc', newDesc);

            fetch(`<?= site_url('api/cashbook/update_desc') ?>`, {
                method: 'POST',
                body: formData
            }).then(res => res.json()).then(data => {
                if(data.status === 'success') {
                    document.getElementById('desc_text_' + pk).innerText = newDesc;
                    document.getElementById('desc_text_' + pk).style.display = 'inline-block';
                    document.getElementById('desc_input_' + pk).style.display = 'none';
                }
            });
        }

        // Focus DataTables search on F9
        $(document).on('keydown', function(e) {
            if (e.key === 'F9' || e.keyCode === 120) {
                e.preventDefault();
                var $searchInput = $('input[type="search"]');
                if ($searchInput.length) {
                    $searchInput.focus();
                } else {
                    // Fallback ak by nebol type="search"
                    $('.dataTables_filter input').focus();
                }
            }
        });
</script>

</body>
</html>
