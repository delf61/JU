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
</head>
<body>
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
                    emptyTable: "Žiadne dáta nie sú k dispozícii",
                    paginate: {
                        first: "Prvá",
                        previous: "Predchádzajúca",
                        next: "Ďalšia",
                        last: "Posledná"
                    }
                },
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
                    emptyTable: "Žiadne dáta nie sú k dispozícii",
                    paginate: {
                        first: "Prvá",
                        previous: "Predchádzajúca",
                        next: "Ďalšia",
                        last: "Posledná"
                    }
                },
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
