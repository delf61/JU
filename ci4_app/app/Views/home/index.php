<?= $this->include('layout/header') ?>

<!-- Účtovníctvo a financie -->
<h4 class="mt-4 mb-3 border-bottom border-secondary pb-2">Účtovníctvo a financie</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Cashbook -->
    <div class="col">
        <a href="<?= base_url('cashbook') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">💰</div>
                    <h5 class="card-title text-body mb-0">Peňažný denník</h5>
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
                    <h5 class="card-title text-body mb-0">Pohľadávky</h5>
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
                    <h5 class="card-title text-body mb-0">Záväzky</h5>
                </div>
            </div>
        </a>
    </div>
</div>

<!-- Evidencia a majetok -->
<h4 class="mt-4 mb-3 border-bottom border-secondary pb-2">Evidencia a majetok</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Assets -->
    <div class="col">
        <div class="card h-100 bg-body-tertiary border-secondary opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🏢</div>
                <h5 class="card-title text-body-secondary mb-0">Majetok</h5>
                <span class="badge bg-secondary mt-3 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Inventory -->
    <div class="col">
        <div class="card h-100 bg-body-tertiary border-secondary opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">📦</div>
                <h5 class="card-title text-body-secondary mb-0">Sklad</h5>
                <span class="badge bg-secondary mt-3 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Trips -->
    <div class="col">
        <div class="card h-100 bg-body-tertiary border-secondary opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🚗</div>
                <h5 class="card-title text-body-secondary mb-0">Pracovné cesty</h5>
                <span class="badge bg-secondary mt-3 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>

    <!-- Property Management -->
    <div class="col">
        <div class="card h-100 bg-body-tertiary border-secondary opacity-75">
            <div class="card-body text-center d-flex flex-column justify-content-center">
                <div class="card-icon mb-3 text-secondary" style="font-size: 2.5rem;">🏠</div>
                <h5 class="card-title text-body-secondary mb-0">Správa nehnuteľností</h5>
                <span class="badge bg-secondary mt-3 w-50 mx-auto">Pripravuje sa</span>
            </div>
        </div>
    </div>
</div>


<!-- Základné dáta a nastavenia -->
<h4 class="mt-4 mb-3 border-bottom border-secondary pb-2">Základné dáta a nastavenia</h4>
<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-4">
    <!-- Partners -->
    <div class="col">
        <a href="<?= base_url('partners') ?>" class="card-link-wrapper text-decoration-none">
            <div class="card dashboard-card h-100 shadow-sm">
                <div class="card-body text-center d-flex flex-column justify-content-center">
                    <div class="card-icon mb-3" style="font-size: 2.5rem;">👥</div>
                    <h5 class="card-title text-body mb-0">Obchodní partneri</h5>
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
                    <h5 class="card-title text-body mb-0">Číselníky</h5>
                </div>
            </div>
        </a>
    </div>
</div>

<?= $this->include('layout/footer') ?>
