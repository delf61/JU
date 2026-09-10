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

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-msg" style="display: block;"><?= esc(session()->getFlashdata('success')) ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-msg" style="display: block;"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

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
            <?php if (empty($initialStates)): ?>
                <tr><td colspan="7">Žiadne záznamy na zobrazenie.</td></tr>
            <?php else: ?>
                <?php foreach ($initialStates as $item): ?>
                    <tr>
                        <td><?= esc(isset($item['a']) ? substr($item['a'], 0, 10) : 'N/A') ?></td>
                        <td><?= esc($item['b'] ?? '') ?></td>
                        <td><?= esc($item['ph'] ?? '0.00') ?></td>
                        <td><?= esc($item['pu'] ?? '0.00') ?></td>
                        <td><?= esc($item['m'] ?? '0.00') ?></td>
                        <td><?= esc($item['zav'] ?? '0.00') ?></td>
                        <td>
                            <?php if (isset($item['a'])): ?>
                                <!-- Priradenie dátových atribútov k preneseniu údajov do modalu pri čisto JS interakcii (žiadne API volania) -->
                                <button type="button"
                                    onclick="openEditModal(this)"
                                    data-a="<?= esc($item['a']) ?>"
                                    data-b="<?= esc($item['b'] ?? '') ?>"
                                    data-ph="<?= esc($item['ph'] ?? '') ?>"
                                    data-h="<?= esc($item['h'] ?? '') ?>"
                                    data-pu="<?= esc($item['pu'] ?? '') ?>"
                                    data-u="<?= esc($item['u'] ?? '') ?>"
                                    data-m="<?= esc($item['m'] ?? '') ?>"
                                    data-han="<?= esc($item['han'] ?? '') ?>"
                                    data-poh="<?= esc($item['poh'] ?? '') ?>"
                                    data-zav="<?= esc($item['zav'] ?? '') ?>">Upraviť</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Upraviť počiatočný stav</h2>
            <!-- Klasický form submit -->
            <form id="editForm" method="post" action="/accounting/initial-states/placeholder">
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

                <button type="submit">Uložiť</button>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(btn) {
            const date = btn.getAttribute('data-a');

            // Set action URL dynamically for classic form submit
            const form = document.getElementById('editForm');
            form.action = '/accounting/initial-states/' + date;

            // Populate inputs from dataset
            document.getElementById('b').value = btn.getAttribute('data-b');
            document.getElementById('ph').value = btn.getAttribute('data-ph');
            document.getElementById('h').value = btn.getAttribute('data-h');
            document.getElementById('pu').value = btn.getAttribute('data-pu');
            document.getElementById('u').value = btn.getAttribute('data-u');
            document.getElementById('m').value = btn.getAttribute('data-m');
            document.getElementById('han').value = btn.getAttribute('data-han');
            document.getElementById('poh').value = btn.getAttribute('data-poh');
            document.getElementById('zav').value = btn.getAttribute('data-zav');

            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>
</body>
</html>
