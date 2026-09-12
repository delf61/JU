<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Prehľad modulov - JÚ</title>
    <style>
        :root {
            --bg-color: #1a1a1a;
            --text-color: #e0e0e0;
            --card-bg: #2d2d2d;
            --border-color: #404040;
            --link-color: #66b3ff;
            --hover-bg: #3d3d3d;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .module-card {
            background-color: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: var(--text-color);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 120px;
        }

        .module-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            background-color: var(--hover-bg);
        }

        .module-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .module-icon {
            font-size: 2em;
            margin-bottom: 10px;
            color: var(--link-color);
        }

        [data-theme="light"] {
            --bg-color: #f4f4f9;
            --text-color: #333;
            --card-bg: #fff;
            --border-color: #ddd;
            --hover-bg: #f9f9f9;
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

    <h1>Prehľad modulov (Dashboard)</h1>

    <div class="dashboard">
        <a href="<?= site_url('cashbook') ?>" class="module-card">
            <div class="module-icon">📔</div>
            <div class="module-title">Peňažný denník</div>
        </a>

        <a href="#" class="module-card">
            <div class="module-icon">📋</div>
            <div class="module-title">Evidencia zákaziek</div>
        </a>

        <a href="<?= site_url('accounting/initial-states') ?>" class="module-card">
            <div class="module-icon">🏢</div>
            <div class="module-title">HaN majetok</div>
        </a>

        <a href="#" class="module-card">
            <div class="module-icon">📤</div>
            <div class="module-title">Kniha vyšlých f. / pohľadávok</div>
        </a>

        <a href="<?= site_url('bank') ?>" class="module-card">
            <div class="module-icon">📥</div>
            <div class="module-title">Kniha došlých f. / záväzkov</div>
        </a>

        <a href="#" class="module-card">
            <div class="module-icon">📊</div>
            <div class="module-title">DPH</div>
        </a>

        <a href="#" class="module-card">
            <div class="module-icon">📅</div>
            <div class="module-title">Kalendár</div>
        </a>

        <a href="<?= site_url('partners') ?>" class="module-card">
            <div class="module-icon">👥</div>
            <div class="module-title">Partneri</div>
        </a>
    </div>

</body>
</html>
