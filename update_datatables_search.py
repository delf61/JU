import glob

# Script injection string
f9_script = """
        // Focus DataTables search on F9
        document.addEventListener('keydown', function(e) {
            if (e.key === 'F9') {
                e.preventDefault();
                const searchInput = document.querySelector('div.dataTables_filter input');
                if (searchInput) {
                    searchInput.focus();
                }
            }
        });
"""

files = glob.glob('ci4_app/app/Views/**/*.php', recursive=True)

for filepath in files:
    with open(filepath, 'r') as file:
        content = file.read()

    changed = False

    # Zmena textu Vyhladavanie
    if 'search: "Vyhľadávanie:"' in content:
        content = content.replace('search: "Vyhľadávanie:"', 'search: "Hľadať : "')
        changed = True

    if 'search: "Hľadať doklad/partnera:"' in content:
        content = content.replace('search: "Hľadať doklad/partnera:"', 'search: "Hľadať : "')
        changed = True

    # Ak subor obsahuje DataTables initializaciu, tak tam pridame script
    if 'DataTable(' in content and 'e.key === \'F9\'' not in content:
        # Najdi koniec script blocku s DataTable inicializaciou
        end_script = content.rfind('</script>')
        if end_script != -1:
            content = content[:end_script] + f9_script + content[end_script:]
            changed = True

    if changed:
        with open(filepath, 'w') as file:
            file.write(content)
        print(f"Updated DataTables F9 search logic in {filepath}")
