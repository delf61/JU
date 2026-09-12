</div> <!-- End Container -->
<footer class="bg-body-tertiary text-center text-muted py-3 mt-5 border-top border-secondary">
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
</body>
</html>
