import re

with open("ci4_app/app/Views/cashbook/index.php", "r") as f:
    view = f.read()

# I also need to check the controller to see how it passes data to the view
