<?= $this->include('layout/header') ?>

<div class="row mb-4">
    <div class="col">
        <h1 class="display-6">Prehľad modulov (Dashboard)</h1>
        <p class="text-muted">Vyberte modul pre správu agendy</p>
    </div>
</div>

<!-- Účtovníctvo a financie -->
<h4 class="mt-4 mb-3 border-bottom pb-2">Účtovníctvo a financie</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Cashbook -->
    <div class="col">
        <a href="<?= base_url('cashbook') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">💰</div>
                    <h5 class="card-title text-dark">Peňažný denník</h5>
                    <p class="card-text text-muted small">Evidencia príjmov a výdavkov v hotovosti a na bankových účtoch.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Bank -->
    <div class="col">
        <a href="<?= base_url('bank') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">🏦</div>
                    <h5 class="card-title text-dark">Banka</h5>
                    <p class="card-text text-muted small">Bankové výpisy a úhrady faktúr.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Invoices (Receivables) -->
    <div class="col">
        <a href="<?= base_url('invoices/receivables') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">📄</div>
                    <h5 class="card-title text-dark">Vystavené faktúry</h5>
                    <p class="card-text text-muted small">Evidencia vystavených faktúr (Pohľadávky).</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Invoices (Liabilities) -->
    <div class="col">
        <a href="<?= base_url('invoices/liabilities') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">📥</div>
                    <h5 class="card-title text-dark">Došlé faktúry</h5>
                    <p class="card-text text-muted small">Evidencia prijatých faktúr (Záväzky).</p>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Evidencia a majetok -->
<h4 class="mt-4 mb-3 border-bottom pb-2">Evidencia a majetok</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Assets -->
    <div class="col">
        <div class="card h-100 bg-light border-light opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🏢</div>
                <h5 class="card-title text-muted">Majetok</h5>
                <p class="card-text text-muted small">Evidencia dlhodobého a drobného majetku.</p>
                <span class="badge bg-secondary mt-2 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Inventory -->
    <div class="col">
        <div class="card h-100 bg-light border-light opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">📦</div>
                <h5 class="card-title text-muted">Sklad</h5>
                <p class="card-text text-muted small">Skladová evidencia a pohyby tovaru.</p>
                <span class="badge bg-secondary mt-2 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Trips -->
    <div class="col">
        <div class="card h-100 bg-light border-light opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🚗</div>
                <h5 class="card-title text-muted">Pracovné cesty</h5>
                <p class="card-text text-muted small">Kniha jázd a evidencia vozidiel.</p>
                <span class="badge bg-secondary mt-2 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Property Management -->
    <div class="col">
        <div class="card h-100 bg-light border-light opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🏠</div>
                <h5 class="card-title text-muted">Správa nehnuteľností</h5>
                <p class="card-text text-muted small">Vyúčtovanie energií a nájmov.</p>
                <span class="badge bg-secondary mt-2 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>
</div>


<!-- Základné dáta a nastavenia -->
<h4 class="mt-4 mb-3 border-bottom pb-2">Základné dáta a nastavenia</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Partners -->
    <div class="col">
        <a href="<?= base_url('partners') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">👥</div>
                    <h5 class="card-title text-dark">Obchodní partneri</h5>
                    <p class="card-text text-muted small">Adresár a správa obchodných partnerov a údajov.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Initial States -->
    <div class="col">
        <a href="<?= base_url('accounting/initial-states') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">⚙️</div>
                    <h5 class="card-title text-dark">Počiatočné stavy</h5>
                    <p class="card-text text-muted small">Základné nastavenia a počiatočné stavy účtov.</p>
                </div>
            </div>
        </a>
    </div>

    <!-- Dictionary -->
    <div class="col">
        <a href="<?= base_url('dictionary') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">📖</div>
                    <h5 class="card-title text-dark">Číselníky</h5>
                    <p class="card-text text-muted small">Správa číselníkov kódov, účtov a činností.</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
