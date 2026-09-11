import re

with open("ci4_app/app/Views/welcome_message.php", "r") as f:
    content = f.read()

# Replace the specific links and labels
# Fakruty -> Evidencia zákaziek
# Počiatočné stavy -> HaN majetok
# Číselníky -> Kniha vyšlých f. / pohľadávok
# Banka -> Kniha došlých f. / záväzkov
# And we also need to add DPH and Kalendár somewhere

print(content.find('Faktúry'))
print(content.find('Počiatočné stavy'))
print(content.find('Číselníky'))
print(content.find('Banka'))
