import re

with open('PRINTER.TXT', 'rb') as f:
    content = f.read()

# Try to decode with cp852
try:
    text = content.decode('cp852')
except UnicodeDecodeError:
    text = content.decode('latin1')

lines = text.split('\n')

objects = []
current_obj = None
current_content = []

for line in lines:
    if line.startswith('\x11'):
        if current_obj:
            objects.append((current_obj['type'], current_obj['name'], current_obj['confidence'], current_content, current_obj['line']))

        # Parse header
        m = re.match(r'\x11\s*([A-Z])\s+([^\x11]+)\s*\x11', line)
        if m:
            obj_type = m.group(1)
            obj_name = m.group(2).strip()
            current_obj = {
                'type': obj_type,
                'name': obj_name,
                'confidence': 'VERIFIED',
                'line': line
            }
            current_content = []
        else:
            # Handle empty name case like D
            m2 = re.match(r'\x11\s*([A-Z])\s*\x11', line)
            if m2:
                obj_type = m2.group(1)
                obj_name = "UNNAMED_" + obj_type
                current_obj = {
                    'type': obj_type,
                    'name': obj_name,
                    'confidence': 'VERIFIED',
                    'line': line
                }
                current_content = []
            else:
                if current_obj is not None:
                    current_content.append(line)
    else:
        if current_obj is not None:
            current_content.append(line)

if current_obj:
    objects.append((current_obj['type'], current_obj['name'], current_obj['confidence'], current_content, current_obj['line']))

print(f"Total objects found: {len(objects)}")
for obj in objects[:20]:
    print(f"Type: {obj[0]}, Name: {obj[1]}")
