<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Počiatočné stavy</title>
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
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        .close { float: right; cursor: pointer; font-size: 20px; }
        .success-msg { color: green; font-weight: bold; display: none; margin-bottom: 10px; }
        .error-msg { color: red; font-weight: bold; display: none; margin-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Počiatočné stavy</h1>

    <div id="statusMessageSuccess" class="success-msg">Záznam bol úspešne uložený.</div>
    <div id="statusMessageError" class="error-msg">Nastala chyba.</div>

    <table id="initialStatesTable">
        <thead>
            <tr>
                <th>Dátum (a)</th>
                <th>Číslo dokladu (b)</th>
                <th>Pokladňa hotovosť (ph)</th>
                <th>BÚ príjem (pu)</th>
                <th>Materiál (m)</th>
                <th>Záväzky (zav)</th>
                <th>Akcie</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data will be loaded here -->
        </tbody>
    </table>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Upraviť počiatočný stav</h2>
            <form id="editForm">
                <input type="hidden" id="editDate" name="a">

                <div class="form-group">
                    <label for="b">Číslo dokladu (b):</label>
                    <input type="text" id="b" name="b" required>
                </div>

                <div class="form-group">
                    <label for="ph">Pokladňa hotovosť (ph):</label>
                    <input type="number" step="0.01" id="ph" name="ph">
                </div>

                <div class="form-group">
                    <label for="h">Text pokladne (h):</label>
                    <input type="text" id="h" name="h">
                </div>

                <div class="form-group">
                    <label for="pu">BÚ príjem (pu):</label>
                    <input type="number" step="0.01" id="pu" name="pu">
                </div>

                <div class="form-group">
                    <label for="u">Text BÚ (u):</label>
                    <input type="text" id="u" name="u">
                </div>

                <div class="form-group">
                    <label for="m">Materiál (m):</label>
                    <input type="number" step="0.01" id="m" name="m">
                </div>

                <div class="form-group">
                    <label for="han">HaN (han):</label>
                    <input type="number" step="0.01" id="han" name="han">
                </div>

                <div class="form-group">
                    <label for="poh">Pohľadávky (poh):</label>
                    <input type="number" step="0.01" id="poh" name="poh">
                </div>

                <div class="form-group">
                    <label for="zav">Záväzky (zav):</label>
                    <input type="number" step="0.01" id="zav" name="zav">
                </div>

                <button type="button" onclick="saveRecord()">Uložiť</button>
            </form>
        </div>
    </div>

    <script>
        const apiUrl = '/api/accounting/initial-states';
        let currentRecordDate = null;

        async function loadRecords() {
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    showError('Chyba pri načítavaní údajov z API.');
                    return;
                }
                const data = await response.json();

                const tbody = document.querySelector('#initialStatesTable tbody');
                tbody.innerHTML = '';

                if (!data || data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7">Žiadne záznamy na zobrazenie.</td></tr>';
                    return;
                }

                data.forEach(item => {
                    const aValue = item.a ? item.a.substring(0, 10) : 'N/A';
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${aValue}</td>
                        <td>${item.b || ''}</td>
                        <td>${item.ph || '0.00'}</td>
                        <td>${item.pu || '0.00'}</td>
                        <td>${item.m || '0.00'}</td>
                        <td>${item.zav || '0.00'}</td>
                        <td>
                            ${item.a ? `<button onclick="openEditModal('${item.a}')">Upraviť</button>` : ''}
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            } catch (error) {
                console.error('Error loading data:', error);
                showError('Chyba spojenia pri načítavaní údajov.');
            }
        }

        async function openEditModal(dateString) {
            hideMessages();
            try {
                const response = await fetch(`${apiUrl}/${dateString}`);
                if (!response.ok) {
                    showError('Záznam sa nepodarilo načítať pre úpravu.');
                    return;
                }
                const record = await response.json();

                currentRecordDate = record.a;
                document.getElementById('editDate').value = record.a;
                document.getElementById('b').value = record.b || '';
                document.getElementById('ph').value = record.ph || 0;
                document.getElementById('h').value = record.h || '';
                document.getElementById('pu').value = record.pu || 0;
                document.getElementById('u').value = record.u || '';
                document.getElementById('m').value = record.m || 0;
                document.getElementById('han').value = record.han || 0;
                document.getElementById('poh').value = record.poh || 0;
                document.getElementById('zav').value = record.zav || 0;

                document.getElementById('editModal').style.display = 'block';
            } catch (error) {
                console.error('Error fetching record for edit:', error);
                showError('Chyba spojenia pri načítavaní záznamu.');
            }
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
            currentRecordDate = null;
        }

        async function saveRecord() {
            if (!currentRecordDate) {
                showError('Chýba identifikátor záznamu pre uloženie.');
                return;
            }

            const form = document.getElementById('editForm');
            const data = {};
            new FormData(form).forEach((value, key) => {
                data[key] = value;
            });

            try {
                const response = await fetch(`${apiUrl}/${currentRecordDate}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    closeModal();
                    showSuccess('Záznam bol úspešne uložený.');
                    loadRecords();
                } else {
                    const result = await response.json();
                    showError('Chyba API pri ukladaní: ' + JSON.stringify(result.messages || result));
                }
            } catch (error) {
                console.error('Error saving record:', error);
                showError('Chyba spojenia pri ukladaní.');
            }
        }

        function showSuccess(msg) {
            const el = document.getElementById('statusMessageSuccess');
            el.textContent = msg;
            el.style.display = 'block';
            document.getElementById('statusMessageError').style.display = 'none';
            setTimeout(() => { el.style.display = 'none'; }, 5000);
        }

        function showError(msg) {
            const el = document.getElementById('statusMessageError');
            el.textContent = msg;
            el.style.display = 'block';
            document.getElementById('statusMessageSuccess').style.display = 'none';
        }

        function hideMessages() {
            document.getElementById('statusMessageError').style.display = 'none';
            document.getElementById('statusMessageSuccess').style.display = 'none';
        }

        window.onload = loadRecords;
    </script>
</body>
</html>
