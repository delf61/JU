import glob

f9_script_new = """
        // Focus DataTables search on F9
        $(document).on('keydown', function(e) {
            if (e.key === 'F9' || e.keyCode === 120) {
                e.preventDefault();
                var $searchInput = $('input[type="search"]');
                if ($searchInput.length) {
                    $searchInput.focus();
                } else {
                    // Fallback ak by nebol type="search"
                    $('.dataTables_filter input').focus();
                }
            }
        });
"""

files = glob.glob('ci4_app/app/Views/**/*.php', recursive=True)

for filepath in files:
    with open(filepath, 'r') as file:
        content = file.read()

    changed = False

    # Hladame start stary blok
    start = content.find('// Focus DataTables search on F9')
    if start != -1:
        end = content.find('});\n', start) + 4
        # Ak sme nasli koniec bloku
        if end > start + 4:
            content = content[:start] + f9_script_new.strip() + "\n" + content[end:]
            changed = True

    if changed:
        with open(filepath, 'w') as file:
            file.write(content)
        print(f"Fixed F9 shortcut in {filepath}")
