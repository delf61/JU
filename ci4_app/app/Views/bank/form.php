<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Editácia bankového výpisu</title>
    <!-- Theme Switcher CSS -->
    <style>
        :root {
            --bg-color: #121212;
            --text-color: #e0e0e0;
            --card-bg: #1e1e1e;
            --border-color: #333;
            --input-bg: #2a2a2a;
            --link-color: #4da3ff;
        }
        [data-theme="light"] {
            --bg-color: #f4f6f9;
            --text-color: #333;
            --card-bg: #fff;
            --border-color: #ddd;
            --input-bg: #fff;
            --link-color: #007bff;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: var(--bg-color); color: var(--text-color); margin: 0; padding: 20px; transition: background-color 0.3s, color 0.3s; }
        .container { max-width: 1200px; margin: 0 auto; background: var(--card-bg); padding: 30px; border-radius: 8px; border: 1px solid var(--border-color); box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { margin-top: 0; margin-bottom: 20px; font-size: 1.5rem; color: var(--text-color); border-bottom: 2px solid var(--border-color); padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; display: flex; flex-direction: column; }
        .form-row { display: flex; gap: 20px; }
        .form-col { flex: 1; }
        label { font-weight: 600; margin-bottom: 5px; font-size: 0.9rem; color: var(--text-color); }
        input[type="text"], input[type="date"], input[type="number"] { padding: 10px; border: 1px solid var(--border-color); border-radius: 4px; font-size: 1rem; background-color: var(--input-bg); color: var(--text-color); }
        .checkbox-group { display: flex; align-items: center; gap: 10px; margin-top: 25px; }
        input[type="checkbox"] { width: 18px; height: 18px; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; font-size: 1rem; cursor: pointer; text-decoration: none; display: inline-block; font-weight: bold; }
        .btn-primary { background-color: #28a745; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .btn-primary:hover { background-color: #218838; }
        .btn-secondary:hover { background-color: #5a6268; }
        .actions { margin-top: 30px; display: flex; gap: 15px; }
        .error-msg { color: #dc3545; font-weight: bold; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editácia bankového výpisu (Položka z dokladu <?= esc($entry['b']) ?>)</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-msg"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form action="<?= site_url('bank/update/' . esc($pk)) ?>" method="post">
            <div class="form-row">
                <div class="form-col form-group">
                    <label>Realizované dňa (d):</label>
                    <input type="date" name="d" value="<?= esc(date('Y-m-d', strtotime($entry['d']))) ?>" required>
                </div>
                <div class="form-col form-group">
                    <label>Výpis zo dňa (a):</label>
                    <input type="date" name="a" value="<?= esc(date('Y-m-d', strtotime($entry['a']))) ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-col form-group">
                    <label>Interné označenie výpisu (b):</label>
                    <input type="text" name="b" value="<?= esc($entry['b']) ?>" maxlength="8" required>
                </div>
                <div class="form-col form-group">
                    <label>Variabilný symbol / Externý doklad (c):</label>
                    <input type="text" name="c" value="<?= esc($entry['c'] ?? '') ?>" maxlength="13">
                </div>
            </div>

            <div class="form-group">
                <label>Účel platby / Popis operácie (ua):</label>
                <input type="text" name="ua" value="<?= esc($entry['ua'] ?? '') ?>" maxlength="40" required>
            </div>

            <div class="form-row">
                <div class="form-col form-group">
                    <label>Suma spolu v € (pa):</label>
                    <input type="number" step="0.01" name="pa" value="<?= esc($entry['pa'] ?? 0) ?>" required>
                </div>
                <div class="form-col form-group">
                    <label>Kód banky (ba1):</label>
                    <input type="text" name="ba1" value="<?= esc($entry['ba1'] ?? '') ?>" maxlength="4">
                </div>
                <div class="form-col form-group">
                    <label>Číslo účtu (cu1):</label>
                    <input type="text" name="cu1" value="<?= esc($entry['cu1'] ?? '') ?>" maxlength="12">
                </div>
            </div>

            <div class="form-row">
                <div class="form-col checkbox-group">
                    <input type="checkbox" name="ra" id="ra" value="1" <?= !empty($entry['ra']) ? 'checked' : '' ?>>
                    <label for="ra">Celková položka (C)</label>
                </div>
                <div class="form-col checkbox-group">
                    <input type="checkbox" name="qa" id="qa" value="1" <?= !empty($entry['qa']) ? 'checked' : '' ?>>
                    <label for="qa">Priebežná položka (P)</label>
                </div>
            </div>

            <div class="actions">
                <button type="submit" class="btn btn-primary">Uložiť zmeny</button>
                <a href="<?= site_url('bank') ?>" class="btn btn-secondary">Zrušiť</a>
            </div>
        </form>
    </div>

    <!-- Theme Switcher JS -->
    <script>
        const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : 'dark';
        if (currentTheme) {
            document.documentElement.setAttribute('data-theme', currentTheme);
        }
    </script>
</body>
</html>
