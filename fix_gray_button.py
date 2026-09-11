import re

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

view = view.replace('style="background-color: #6c757d; margin-left: auto;"', 'style="background-color: #6c757d; margin-left: auto; color: white;"')

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
