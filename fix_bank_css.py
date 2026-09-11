import re

with open("ci4_app/app/Views/bank/index.php", "r") as f:
    view = f.read()

# Pridat .btn class definiciu
btn_css = "        .btn { display: inline-block; padding: 5px 10px; text-decoration: none; background: #007bff; color: white; border-radius: 3px; font-weight: normal; }\n        .btn:hover { background: #0056b3; }"

view = view.replace("        .btn-back", btn_css + "\n        .btn-back")

with open("ci4_app/app/Views/bank/index.php", "w") as f:
    f.write(view)
