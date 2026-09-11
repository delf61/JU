<?= $this->include('layout/header') ?>

<div class="row mb-4">
    <div class="col">
        <h1 class="display-6">Prehľad modulov (Dashboard)</h1>
        <p class="text-muted">Vyberte modul pre správu agendy</p>
    </div>
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
    <!-- Cashbook -->
    <div class="col">
        <a href="<?= base_url('cashbook') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">💰</div>
                    <h5 class="card-title">Peňažný denník</h5>
                    <p class="card-text text-muted small">Evidencia príjmov a výdavkov v hotovosti a na bankových účtoch.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Invoices -->
    <div class="col">
        <a href="<?= base_url('invoices/receivables') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">📄</div>
                    <h5 class="card-title">Faktúry</h5>
                    <p class="card-text text-muted small">Evidencia vystavených (Pohľadávky) a prijatých (Záväzky) faktúr.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Initial States -->
    <div class="col">
        <a href="<?= base_url('accounting/initial-states') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">⚙️</div>
                    <h5 class="card-title">Počiatočné stavy</h5>
                    <p class="card-text text-muted small">Základné nastavenia a počiatočné stavy (pPV).</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Partners -->
    <div class="col">
        <a href="<?= base_url('partners') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">👥</div>
                    <h5 class="card-title">Obchodní partneri</h5>
                    <p class="card-text text-muted small">Adresár a správa obchodných partnerov a údajov o nich.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Dictionary -->
    <div class="col">
        <a href="<?= base_url('dictionary') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">📖</div>
                    <h5 class="card-title">Číselníky</h5>
                    <p class="card-text text-muted small">Správa číselníkov kódov, účtov a činností (druhy).</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Bank -->
    <div class="col">
        <a href="<?= base_url('bank') ?>" class="card-link-wrapper">
            <div class="card dashboard-card">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon">🏦</div>
                    <h5 class="card-title">Banka</h5>
                    <p class="card-text text-muted small">Bankové výpisy a úhrady faktúr.</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
