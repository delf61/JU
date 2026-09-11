import re

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# 1. Zmena nadpisu v JavaScripte
view = view.replace(
    "document.getElementById('invoiceModalTitle').innerText = (type === 'kz') ? 'Neuhradené Záväzky (Fa Prijaté)' : 'Neuhradené Pohľadávky (Fa Vystavené)';",
    "document.getElementById('invoiceModalTitle').innerText = (type === 'kz') ? 'Záväzky' : 'Pohľadávky';"
)

# 2. Pridanie stlpca do tabulky
old_thead = """                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Doklad</th>
                            <th>Partner (od)</th>
                            <th class="text-right">Suma celkom</th>
                            <th class="text-right">Uhradené</th>
                            <th class="text-right">Na úhradu</th>
                            <th class="text-center">Akcia</th>
                        </tr>
                    </thead>"""

new_thead = """                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Doklad</th>
                            <th>Ext. doklad</th>
                            <th>Partner (od)</th>
                            <th class="text-right">Suma celkom</th>
                            <th class="text-right">Uhradené</th>
                            <th class="text-right">Na úhradu</th>
                            <th class="text-center">Akcia</th>
                        </tr>
                    </thead>"""

view = view.replace(old_thead, new_thead)

# 3. Zmena JavaScript renderovania riadkov (pridanie item.var_sym)
old_js_row = """                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.a.substring(0,10)}</td>
                            <td><strong>${item.b}</strong></td>
                            <td>${item.od}</td>"""

new_js_row = """                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.a.substring(0,10)}</td>
                            <td><strong>${item.b}</strong></td>
                            <td>${item.var_sym || ''}</td>
                            <td>${item.od}</td>"""

view = view.replace(old_js_row, new_js_row)

# 4. Zmena poctu stlpcov pre colspan v chybovych hlaskach (z 7 na 8)
view = view.replace('<td colspan="7" class="text-center">Načítavam z databázy...</td>', '<td colspan="8" class="text-center">Načítavam z databázy...</td>')
view = view.replace('<td colspan="7" class="text-center">Nenašli sa žiadne neuhradené doklady.</td>', '<td colspan="8" class="text-center">Nenašli sa žiadne neuhradené doklady.</td>')

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)


# Controller
with open("ci4_app/app/Controllers/BankStatementController.php", "r") as f:
    ctrl = f.read()

# Pridat var_sym do vystupu
# Hladame blok v getUnpaidInvoices, kde sa priraduju veci
old_ctrl = """                $inv['zn'] = number_format($zn, 2, '.', '');
                $inv['uhrada'] = number_format($uhrada, 2, '.', '');
                $inv['zostatok'] = number_format($zn - $uhrada, 2, '.', '');
                $unpaid[] = $inv;"""

new_ctrl = """                $inv['zn'] = number_format($zn, 2, '.', '');
                $inv['uhrada'] = number_format($uhrada, 2, '.', '');
                $inv['zostatok'] = number_format($zn - $uhrada, 2, '.', '');
                $inv['var_sym'] = isset($inv['var_sym']) ? trim($inv['var_sym']) : '';
                $unpaid[] = $inv;"""

ctrl = ctrl.replace(old_ctrl, new_ctrl)

with open("ci4_app/app/Controllers/BankStatementController.php", "w") as f:
    f.write(ctrl)
