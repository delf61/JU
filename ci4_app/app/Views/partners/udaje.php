<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Údaje o podnikateľovi</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .form-group { margin-bottom: 15px; max-width: 500px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 8px 15px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Údaje o podnikateľovi</h1>
    <a href="/partners">Späť na obchodných partnerov</a>
    <hr>

    <div id="message" style="display:none; padding: 10px; margin-bottom: 15px; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;"></div>

    <form id="udajeForm">
        <div class="form-group">
            <label for="nazov">Názov (nazov):</label>
            <input type="text" id="nazov" name="nazov" maxlength="40">
        </div>

        <div class="form-group">
            <label for="meno">Meno (meno):</label>
            <input type="text" id="meno" name="meno" maxlength="10">
        </div>

        <div class="form-group">
            <label for="priezv">Priezvisko (priezv):</label>
            <input type="text" id="priezv" name="priezv" maxlength="15">
        </div>

        <div class="form-group">
            <label for="titul">Titul (titul):</label>
            <input type="text" id="titul" name="titul" maxlength="5">
        </div>

        <div class="form-group">
            <label for="ico">IČO:</label>
            <input type="text" id="ico" name="ico" maxlength="10">
        </div>

        <div class="form-group">
            <label for="dic">DIČ:</label>
            <input type="text" id="dic" name="dic" maxlength="10">
        </div>

        <div class="form-group">
            <label for="icpd">IČ DPH (icpd):</label>
            <input type="text" id="icpd" name="icpd" maxlength="15">
        </div>

        <div class="form-group">
            <label for="uli">Ulica (uli):</label>
            <input type="text" id="uli" name="uli" maxlength="20">
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
            <input type="text" id="tlf" name="tlf" maxlength="13">
        </div>

        <button type="button" onclick="saveUdaje()">Uložiť zmeny</button>
    </form>

    <script>
        const apiUrl = '/partners/api/udaje';

        async function loadUdaje() {
            try {
                const response = await fetch(apiUrl);
                const data = await response.json();

                ['nazov', 'meno', 'priezv', 'titul', 'ico', 'dic', 'icpd', 'uli', 'miesto', 'psc', 'tlf'].forEach(key => {
                    if (document.getElementById(key)) {
                        document.getElementById(key).value = data[key] || '';
                    }
                });
            } catch (error) {
                console.error('Error loading:', error);
                alert('Nepodarilo sa načítať údaje.');
            }
        }

        async function saveUdaje() {
            const form = document.getElementById('udajeForm');
            const data = {};
            new FormData(form).forEach((value, key) => {
                data[key] = value;
            });

            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const msg = document.getElementById('message');
                if (response.ok) {
                    msg.textContent = 'Údaje úspešne uložené.';
                    msg.style.display = 'block';
                    msg.style.background = '#d4edda';
                    msg.style.color = '#155724';
                    setTimeout(() => msg.style.display = 'none', 3000);
                } else {
                    const result = await response.json();
                    msg.textContent = 'Chyba: ' + JSON.stringify(result.errors || result);
                    msg.style.display = 'block';
                    msg.style.background = '#f8d7da';
                    msg.style.color = '#721c24';
                }
            } catch (error) {
                console.error('Error saving:', error);
                alert('Chyba pri ukladaní.');
            }
        }

        window.onload = loadUdaje;
    </script>
</body>
</html>
