<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOS JU - Číselníky</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; margin: 0; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        nav button { padding: 10px 20px; cursor: pointer; border: none; background: #007bff; color: #fff; border-radius: 4px; margin-right: 5px; }
        nav button:hover { background: #0056b3; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        .data-table th { background: #f2f2f2; }
        .action-btn { cursor: pointer; padding: 5px 10px; border: none; background: #28a745; color: white; border-radius: 3px; }
        .delete-btn { background: #dc3545; }
        .edit-btn { background: #ffc107; }
        #error-msg { color: #dc3545; margin-top: 10px; font-weight: bold; }
        form { margin-top: 20px; padding: 15px; background: #f9f9f9; border: 1px solid #ccc; display: none; }
        form input { padding: 8px; margin: 5px 0; width: 200px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Číselníky</h1>
    <nav>
        <button onclick="loadDictionary('kraje')">Kraje</button>
        <button onclick="loadDictionary('okresy')">Okresy</button>
        <button onclick="loadDictionary('mesta')">Mestá</button>
        <button onclick="loadDictionary('banky')">Banky</button>
    </nav>

    <h2 id="dict-title">Vyberte číselník</h2>
    <div id="error-msg"></div>

    <button id="add-new-btn" class="action-btn" style="display:none; margin-top:10px;" onclick="showForm()">Pridať záznam</button>

    <form id="dict-form">
        <h3>Záznam</h3>
        <div id="form-fields"></div>
        <button type="submit" class="action-btn">Uložiť</button>
        <button type="button" class="action-btn delete-btn" onclick="hideForm()">Zrušiť</button>
    </form>

    <table class="data-table" id="data-table" style="display:none;">
        <thead id="data-thead"></thead>
        <tbody id="data-tbody"></tbody>
    </table>
</div>

<script type="module" src="/js/main.js"></script>
<script type="module">
    import { initDictionary } from '/js/modules/dictionary.js';
    document.addEventListener('DOMContentLoaded', () => {
        window.loadDictionary = initDictionary.load;
        window.showForm = initDictionary.showForm;
        window.hideForm = initDictionary.hideForm;
    });
</script>
</body>
</html>
