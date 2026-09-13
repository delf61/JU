</div> <!-- End Container -->
<footer class="bg-body-tertiary text-center text-muted py-3 mt-auto border-top border-secondary">
    <div class="container">
        <small>&copy; <?= date('Y') ?> Migrácia FAND DOS JU do CodeIgniter 4</small>
    </div>
</footer>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const themeToggle = document.getElementById('theme-toggle');
        if(themeToggle) {
            themeToggle.addEventListener('click', () => {
                const html = document.documentElement;
                const currentTheme = html.getAttribute('data-bs-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                html.setAttribute('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });
        }
    });
</script>

<!-- Global ESC key handler for all modals -->
<script>
    document.addEventListener('keydown', function(e) {
        if (e.key === "Escape") {
            // Close any custom .modal or .dos-modal
            document.querySelectorAll('.modal, .dos-modal').forEach(function(modal) {
                modal.style.display = 'none';
            });
            // Also attempt to close any standard Bootstrap modals if Bootstrap is loaded
            if (typeof bootstrap !== 'undefined' && typeof bootstrap.Modal !== 'undefined') {
                const openModals = document.querySelectorAll('.modal.show');
                openModals.forEach(modalEl => {
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                });
            }
            // And if jQuery is used with hide() logic
            if (typeof $ !== 'undefined') {
                $('.modal, .dos-modal').hide();
            }
        }
    });
</script>

</body>
</html>
