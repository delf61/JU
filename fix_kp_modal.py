import re

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# Update HTML logic inside the JS modal rendering function
# We need to conditionally add the 'Ext. doklad' header and data cell ONLY if type === 'kz'

old_thead = """                    <thead>
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

new_thead = """                    <thead>
                        <tr>
                            <th>Dátum</th>
                            <th>Doklad</th>
                            ${type === 'kz' ? '<th>Ext. doklad</th>' : ''}
                            <th>Partner (od)</th>
                            <th class="text-right">Suma celkom</th>
                            <th class="text-right">Uhradené</th>
                            <th class="text-right">Na úhradu</th>
                            <th class="text-center">Akcia</th>
                        </tr>
                    </thead>"""

view = view.replace(old_thead, new_thead)

old_row = """                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.a.substring(0,10)}</td>
                            <td><strong>${item.b}</strong></td>
                            <td>${item.var_sym || ''}</td>
                            <td>${item.od}</td>"""

new_row = """                    data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>${item.a.substring(0,10)}</td>
                            <td><strong>${item.b}</strong></td>
                            ${type === 'kz' ? '<td>' + (item.var_sym || '') + '</td>' : ''}
                            <td>${item.od}</td>"""

view = view.replace(old_row, new_row)

old_colspan = '<td colspan="8"'
new_colspan = '<td colspan="${type === \'kz\' ? 8 : 7}"'

view = view.replace('<td colspan="8" class="text-center">Načítavam z databázy...</td>', f'<td colspan="${{type === \'kz\' ? 8 : 7}}" class="text-center">Načítavam z databázy...</td>')
view = view.replace('<td colspan="8" class="text-center">Nenašli sa žiadne neuhradené doklady.</td>', f'<td colspan="${{type === \'kz\' ? 8 : 7}}" class="text-center">Nenašli sa žiadne neuhradené doklady.</td>')

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
