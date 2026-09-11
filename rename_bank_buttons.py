with open("ci4_app/app/Views/cashbook/index.php", "r") as f:
    cashbook = f.read()

# Change 'Účet' to 'Bankový účet'
cashbook = cashbook.replace(">Účet</a>", ">Bankový účet</a>")

with open("ci4_app/app/Views/cashbook/index.php", "w") as f:
    f.write(cashbook)

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    bank = f.read()

# Change 'Bankové výpisy' to 'Bankový účet'
bank = bank.replace("<h1>Bankové výpisy</h1>", "<h1>Bankový účet</h1>")
bank = bank.replace("<title>Bankové výpisy</title>", "<title>Bankový účet</title>")

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(bank)
