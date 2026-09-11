<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'JU CodeIgniter 4') ?></title>
    <!-- Bootstrap CSS for layout without heavy JS frameworks -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 60px; background-color: #f8f9fa; }
        .navbar-brand { font-weight: bold; }
        .card-icon { font-size: 2rem; color: #0d6efd; margin-bottom: 10px; }
        .dashboard-card { transition: transform 0.2s, box-shadow 0.2s; height: 100%; cursor: pointer;}
        .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        a.card-link-wrapper { text-decoration: none; color: inherit; display: block; height: 100%;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/') ?>">JU Systém</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Domov</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('cashbook') ?>">Peňažný denník</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= base_url('invoices/receivables') ?>">Faktúry</a></li>
            </ul>
            <span class="navbar-text">
                Rok: <?= esc($current_year ?? date('Y')) ?>
            </span>
        </div>
    </div>
</nav>
<div class="container mt-4">
