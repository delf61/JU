<?= $this->include('layout/header') ?>


<script>
    // Year context updater for Dashboard
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
                location.reload();
            } else {
                alert('Chyba pri zmene roka');
            }
        })
        .catch(err => console.error(err));
    }
</script>

<div class="d-flex justify-content-center align-items-center mb-4">
    <button class="btn btn-outline-secondary fs-4 px-3 me-4 fw-bold" onclick="changeYear(-1)">-</button>
    <span class="display-5 fw-bold" id="current-year-display"><?= esc($current_year ?? date('Y')) ?></span>
    <button class="btn btn-outline-secondary fs-4 px-3 ms-4 fw-bold" onclick="changeYear(1)">+</button>
</div>

<div class="d-flex flex-column justify-content-evenly flex-grow-1">

    <!-- Účtovníctvo a financie -->
    <div>
        <h4 class="mb-3 border-bottom border-secondary pb-2">Účtovníctvo a financie</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-2">
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
    </div>

    <!-- Evidencia a majetok -->
    <div>
        <h4 class="mb-3 border-bottom border-secondary pb-2">Evidencia a majetok</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-2">
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
    </div>

    <!-- Základné dáta a nastavenia -->
    <div>
        <h4 class="mb-3 border-bottom border-secondary pb-2">Základné dáta a nastavenia</h4>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mb-2">
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
    </div>
</div>

<?= $this->include('layout/footer') ?>
