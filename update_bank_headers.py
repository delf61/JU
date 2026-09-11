with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# 1. Update button text colors
# We need to make sure buttons with background-color: #17a2b8 or #28a745 have color: white
# I can just add `color: white;` to all btn classes in the bottom bar, or replace the style strings
view = view.replace('class="btn" style="background-color: #28a745;"', 'class="btn" style="background-color: #28a745; color: white;"')
view = view.replace('class="btn" style="background-color: #17a2b8;"', 'class="btn" style="background-color: #17a2b8; color: white;"')

# 2. Update table headers to 1 line, and remove Por.50
old_thead = """        <thead>
            <tr>
                <th class="text-center">Realizov.<br>dňa</th>
                <th class="text-center">Por.<br>50</th>
                <th>Popis operácie</th>
                <th class="text-right">Čiastka<br>€</th>
                <th class="text-center">C</th>
                <th class="text-center">P</th>
                <th class="text-center">Akcie</th>
            </tr>
        </thead>"""

new_thead = """        <thead>
            <tr>
                <th class="text-center">Realizov. dňa</th>
                <th>Popis operácie</th>
                <th class="text-right">Čiastka €</th>
                <th class="text-center">C</th>
                <th class="text-center">P</th>
                <th class="text-center">Akcie</th>
            </tr>
        </thead>"""

view = view.replace(old_thead, new_thead)

# 3. Remove the corresponding td for Por.50
# <td class="text-center"><?= esc($row['b']) ?></td>
view = view.replace('<td class="text-center"><?= esc($row[\'b\']) ?></td>\n', '')

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
