<!DOCTYPE html>
<html lang="sk" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'JU CodeIgniter 4') ?></title>
    <!-- Bootstrap CSS for layout without heavy JS frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 60px; }
        [data-bs-theme="light"] body { background-color: #f8f9fa !important; }
        .navbar-brand { font-weight: bold; }
        .card-icon { font-size: 2rem; color: #0d6efd; margin-bottom: 10px; }
        .dashboard-card { transition: transform 0.2s, box-shadow 0.2s; height: 100%; cursor: pointer;}
        .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        a.card-link-wrapper { text-decoration: none; color: inherit; display: block; height: 100%;}
    </style>
    <script>
        // Init theme from localStorage or default to dark
        (function() {
            const storedTheme = localStorage.getItem('theme');
            const theme = storedTheme ? storedTheme : 'dark';
            document.documentElement.setAttribute('data-bs-theme', theme);
        })();

        // Clock updater
        function updateClock() {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');

            const clockEl = document.getElementById('navbar-clock');
            if (clockEl) {
                clockEl.textContent = `${day}.${month}.${year} ${hours}:${minutes}`;
            }
        }
        setInterval(updateClock, 1000); // Update every second

        // Year context updater
        function changeYear(delta) {
            const yearSpan = document.getElementById('current-year-display');
            if (!yearSpan) return;

            let currentYear = parseInt(yearSpan.innerText, 10);
            if (isNaN(currentYear)) return;

            let newYear = currentYear + delta;

            fetch("<?= base_url('api/settings/set-year') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ year: newYear })
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    // Update globally, refresh page to reload data with new year context
                    location.reload();
                } else {
                    alert('Chyba pri zmene roka');
                }
            })
            .catch(err => console.error(err));
        }
    </script>
</head>
<body class="d-flex flex-column min-vh-100" onload="updateClock()">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">delf JU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto">
                <button class="btn btn-outline-light btn-sm" id="theme-toggle" type="button">
                    🌓 Téma
                </button>
            </div>
        </div>
    </div>

    <!-- Centered clock absolutely positioned over the navbar -->
    <div class="position-absolute top-50 start-50 translate-middle text-light d-none d-lg-block fw-semibold" id="navbar-clock" style="pointer-events: none;">
        <?= date('d.m.Y H:i') ?>
    </div>
</nav>

<div class="container mt-4 flex-grow-1 d-flex flex-column">
    <!-- Year selector -->
    <div class="d-flex justify-content-center align-items-center mb-4">
        <button class="btn btn-outline-secondary fs-4 px-3 me-4 fw-bold" onclick="changeYear(-1)">-</button>
        <span class="display-5 fw-bold" id="current-year-display"><?= esc($current_year ?? date('Y')) ?></span>
        <button class="btn btn-outline-secondary fs-4 px-3 ms-4 fw-bold" onclick="changeYear(1)">+</button>
    </div>
