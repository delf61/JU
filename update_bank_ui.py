import re

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# 1. Odstranenie vrchneho action baru (margin-bottom: 20px; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;)
start_top_bar = view.find('<div style="margin-bottom: 20px; display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">')
if start_top_bar != -1:
    end_top_bar = view.find('</div>', start_top_bar) + 6
    view = view[:start_top_bar] + view[end_top_bar:]

# 2. Odstranenie Spat na Penazny dennik z hlavicky
start_header = view.find('<div class="header">')
if start_header != -1:
    view = view.replace('<a href="<?= site_url(\'cashbook\') ?>?year=<?= esc($year) ?>" class="btn-back">Späť na Peňažný denník</a>', '')

# 3. Pridanie Bottom baru
bottom_bar = """    <div class="card" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px; padding: 15px; border: 1px solid var(--border-color); background-color: var(--card-bg);">
        <a href="#" class="btn" style="background-color: #28a745;" onclick="alert('Bude spúšťať manuálne pridanie riadku do banky')">Pridať bankový záznam</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openCashTransferModal()">Výber / Vklad hotovosti</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openInvoiceModal('kz')">Uhradiť Záväzok</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="openInvoiceModal('kp')">Uhradiť Pohľadávku</a>
        <a href="#" class="btn" style="background-color: #17a2b8;" onclick="alert('Zobrazí sumár a štatistiky k výpisom')">Iné info</a>
        <a href="<?= site_url('cashbook') ?>?year=<?= esc($year) ?>" class="btn" style="background-color: #6c757d; margin-left: auto;">Späť na Peňažný denník</a>
    </div>"""

start_table_end = view.find('    </table>')
if start_table_end != -1:
    end_table_end = view.find('\n', start_table_end)
    view = view[:start_table_end] + '    </table>\n\n' + bottom_bar + view[end_table_end:]

# Taktiez sa zbavime 'Do PD (F3)' a nahradime to cistym 'Do PD'
view = view.replace('Do PD (F3)', 'Do PD')
view = view.replace('Výber / Vklad hotovosti (F5)', 'Výber / Vklad hotovosti')

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
