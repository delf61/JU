<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Všeobecné číselníky - DOS JU Migration</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        .container { display: flex; gap: 20px; }
        .sidebar { min-width: 200px; border-right: 1px solid #ccc; padding-right: 20px; }
        .content { flex-grow: 1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn { padding: 5px 10px; cursor: pointer; }
        .form-group { margin-bottom: 10px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        #dictionary-form-container { display: none; margin-top: 20px; padding: 20px; border: 1px solid #ccc; background: #f9f9f9; }
        #error-message { color: red; margin-bottom: 10px; display: none; }
        #success-message { color: green; margin-bottom: 10px; display: none; }
    </style>
</head>
<body>

<h1>Všeobecné číselníky</h1>

<div class="container">
    <div class="sidebar">
        <h3>Typy číselníkov</h3>
        <ul id="dictionary-list" style="list-style-type: none; padding: 0;">
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('kraje')">Kraje</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('okresy')">Okresy</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('mesta')">Mestá</button></li>
            <li><button class="btn" style="width: 100%; margin-bottom: 5px;" onclick="app.loadDictionaries('banky')">Banky</button></li>
        </ul>
    </div>

    <div class="content">
        <h2 id="dictionary-title">Vyberte číselník</h2>

        <div id="messages">
            <div id="error-message"></div>
            <div id="success-message"></div>
        </div>

        <button id="btn-add-new" class="btn" style="display:none;" onclick="app.showForm()">Pridať nový záznam</button>

        <div id="table-container">
            <table id="data-table" style="display:none;">
                <thead id="data-table-head"></thead>
                <tbody id="data-table-body"></tbody>
            </table>
        </div>

        <div id="dictionary-form-container">
            <h3 id="form-title">Pridať záznam</h3>
            <form id="dictionary-form" onsubmit="app.saveDictionary(event)">
                <input type="hidden" id="form-action-type" value="create">
                <input type="hidden" id="form-record-id" value="">

                <div id="form-fields"></div>

                <button type="submit" class="btn" style="background-color: #4CAF50; color: white;">Uložiť</button>
                <button type="button" class="btn" onclick="app.hideForm()">Zrušiť</button>
            </form>
        </div>
    </div>
</div>

<script src="/js/modules/dictionary.js"></script>

</body>
</html>
