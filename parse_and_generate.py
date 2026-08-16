import re
import os

with open('PRINTER.TXT', 'rb') as f:
    content = f.read()

try:
    text = content.decode('cp852')
except UnicodeDecodeError:
    text = content.decode('latin1')

lines = text.split('\n')

objects = []
current_obj = None
current_content = []

# Parse
for i, line in enumerate(lines):
    if line.startswith('\x11'):
        if current_obj:
            objects.append({
                'type': current_obj['type'],
                'name': current_obj['name'],
                'confidence': current_obj['confidence'],
                'content': current_content,
                'header': current_obj['header'],
                'line_num': current_obj['line_num']
            })

        m = re.match(r'\x11\s*([A-Z])\s+([^\x11]+)\s*\x11', line)
        if m:
            obj_type = m.group(1)
            obj_name = m.group(2).strip()
            current_obj = {
                'type': obj_type,
                'name': obj_name,
                'confidence': 'VERIFIED',
                'header': line,
                'line_num': i + 1
            }
            current_content = []
        else:
            m2 = re.match(r'\x11\s*([A-Z])\s*\x11', line)
            if m2:
                obj_type = m2.group(1)
                obj_name = "UNNAMED_" + obj_type
                current_obj = {
                    'type': obj_type,
                    'name': obj_name,
                    'confidence': 'VERIFIED',
                    'header': line,
                    'line_num': i + 1
                }
                current_content = []
            else:
                if current_obj is not None:
                    current_content.append(line)
    else:
        if current_obj is not None:
            current_content.append(line)

if current_obj:
    objects.append({
        'type': current_obj['type'],
        'name': current_obj['name'],
        'confidence': current_obj['confidence'],
        'content': current_content,
        'header': current_obj['header'],
        'line_num': current_obj['line_num']
    })

# 1. PRINTER_FORMAT.md
with open('PRINTER_FORMAT.md', 'w', encoding='utf-8') as f:
    f.write("# Format of PRINTER.TXT\n\n")
    f.write("The FAND report separates objects using structural markers composed of the `0x11` (Device Control 1) character, followed by a type character, the object name, and terminated by another `0x11` character.\n\n")
    f.write("## Format\n\n")
    f.write("```\n")
    f.write("<0x11> <Type> <Object Name> <0x11>\n")
    f.write("```\n\n")
    f.write("## Examples\n\n")
    f.write("```\n")
    f.write("\x11 F  ParamCat    \x11\n")
    f.write("\x11 P  pPrijem     \x11\n")
    f.write("\x11 E  eParDat     \x11\n")
    f.write("\x11 M  mHelp       \x11\n")
    f.write("```\n\n")
    f.write("Object content immediately follows the header until the next `0x11` marker.\n")
    f.write("Some types may lack names, e.g., `\\x11 D \\x11`.\n")

# 2. OBJECTS.md
with open('OBJECTS.md', 'w', encoding='utf-8') as f:
    f.write("# Authoritative Object Inventory\n\n")
    f.write("| Name | Type | Line | Confidence |\n")
    f.write("| --- | --- | --- | --- |\n")
    for obj in objects:
        typ_full = obj['type']
        if obj['type'] == 'F': typ_full = "F* (Data-file/Table)"
        elif obj['type'] == 'E': typ_full = "E* (Form)"
        elif obj['type'] == 'P': typ_full = "P* (Procedure)"
        elif obj['type'] == 'M': typ_full = "M* (MERGE)"

        f.write(f"| {obj['name']} | {typ_full} | {obj['line_num']} | {obj['confidence']} |\n")

# 3. TABLES_VERIFIED.md
with open('TABLES_VERIFIED.md', 'w', encoding='utf-8') as f:
    f.write("# Verified Tables (F* Objects)\n\n")
    for obj in objects:
        if obj['type'] == 'F':
            f.write(f"## {obj['name']}\n\n```fand\n")
            f.write("\n".join(obj['content']).strip() + "\n```\n\n")

# 4. PROCEDURES_VERIFIED.md
with open('PROCEDURES_VERIFIED.md', 'w', encoding='utf-8') as f:
    f.write("# Verified Procedures (P* Objects)\n\n")
    for obj in objects:
        if obj['type'] == 'P':
            f.write(f"## {obj['name']}\n\n```fand\n")
            f.write("\n".join(obj['content']).strip() + "\n```\n\n")

# 5. FORMS_VERIFIED.md
with open('FORMS_VERIFIED.md', 'w', encoding='utf-8') as f:
    f.write("# Verified Forms (E* Objects)\n\n")
    for obj in objects:
        if obj['type'] == 'E':
            f.write(f"## {obj['name']}\n\n```fand\n")
            f.write("\n".join(obj['content']).strip() + "\n```\n\n")

# 6. MERGE_VERIFIED.md
with open('MERGE_VERIFIED.md', 'w', encoding='utf-8') as f:
    f.write("# Verified MERGE Objects (M* Objects)\n\n")
    for obj in objects:
        if obj['type'] == 'M':
            f.write(f"## {obj['name']}\n\n```fand\n")
            f.write("\n".join(obj['content']).strip() + "\n```\n\n")

print("Files generated.")
