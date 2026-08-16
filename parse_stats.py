import re

with open('PRINTER.TXT', 'rb') as f:
    content = f.read()

try:
    text = content.decode('cp852')
except UnicodeDecodeError:
    text = content.decode('latin1')

lines = text.split('\n')
counts = {'F': 0, 'E': 0, 'P': 0, 'M': 0}

for line in lines:
    m = re.match(r'\x11\s*([A-Z])\s+([^\x11]*)\x11', line)
    if m:
        typ = m.group(1)
        if typ in counts:
            counts[typ] += 1
    else:
        m2 = re.match(r'\x11\s*([A-Z])\s*\x11', line)
        if m2:
            typ = m2.group(1)
            if typ in counts:
                counts[typ] += 1

print(f"F (Tables): {counts['F']}")
print(f"E (Forms): {counts['E']}")
print(f"P (Procedures): {counts['P']}")
print(f"M (Merge/Reports): {counts['M']}")
