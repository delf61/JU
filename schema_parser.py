import re

def parse_printer_txt(filename='PRINTER.TXT'):
    with open(filename, 'r', encoding='cp852', errors='ignore') as f:
        text = f.read()

    blocks = re.split(r'\x11\s+F\s+', text)
    tables = {}

    physical_overrides = {
        'den_prac': [
            {'name': 'a', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'b', 'type': 'A', 'size': 8, 'encrypted': False},
            {'name': 'DATUM', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'Zaciat', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'Koniec', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'u_zakaz', 'type': 'B', 'size': 1, 'encrypted': False},
            {'name': 'TEXT_1', 'type': 'A', 'size': 60, 'encrypted': False},
            {'name': 'TEXT_2', 'type': 'A', 'size': 60, 'encrypted': False},
            {'name': 'TEXT_3', 'type': 'A', 'size': 60, 'encrypted': False},
            {'name': 'bb', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'program', 'type': 'B', 'size': 1, 'encrypted': False},
            {'name': 'TEXT', 'type': 'A', 'size': 251, 'encrypted': False}
        ],
        'help': [
            {'name': 'tema', 'type': 'A', 'size': 5, 'encrypted': False},
            {'name': 'text', 'type': 'T', 'size': 4, 'encrypted': False}
        ],
        'dph': [
            {'name': 'OD', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'DO', 'type': 'D', 'size': 6, 'encrypted': False},
            {'name': 'DPH1', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'DPH2', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'SUM1VSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'DPH1VSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'SUM2VSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'DPH2VSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'SUM1VYSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'DPH1VYSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'SUM2VYSTUP', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'ArcIntCis', 'type': 'A', 'size': 1, 'encrypted': False}
        ],
        'ucty': [
            {'name': 'ba', 'type': 'A', 'size': 4, 'encrypted': False},
            {'name': 'pr', 'type': 'A', 'size': 6, 'encrypted': False},
            {'name': 'cu', 'type': 'A', 'size': 10, 'encrypted': False},
            {'name': 'zv_od', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'zv_do', 'type': 'F', 'size': 6, 'encrypted': False},
            {'name': 'os', 'type': 'B', 'size': 1, 'encrypted': False},
            {'name': 'popis', 'type': 'A', 'size': 23, 'encrypted': False}
        ]
    }

    for block in blocks[1:]:
        content = block.split('\x11')[0].strip()
        lines = content.split('\n')
        if not lines: continue

        table_name_raw = lines[0].strip()
        table_name = table_name_raw.split('.')[0].lower()

        fields = []
        is_indexed = '.x' in table_name_raw.lower()

        if len(lines) == 1 and len(block.split('\x11')) > 1:
            content2 = block.split('\x11')[1].strip()
            lines = content2.split('\n')

        for line in lines:
            line = line.split('{')[0].strip()
            if not line or line.startswith('#') or line.startswith('F '): continue
            if ':=' in line or ' = ' in line: continue

            m = re.search(r'^([a-zA-Z0-9_]+)\s*:\s*([^;]+)', line)
            if m:
                fname = m.group(1).strip()
                ftype_def = m.group(2).strip().upper()
                if '=' in ftype_def: continue
                encrypted = '!' in ftype_def
                ftype_clean = ftype_def.replace('!', '').replace("'", "")
                parts = ftype_clean.split(',')
                base_type = parts[0].strip()

                size = 0
                if base_type in ['D', 'F']:
                    size = 6
                elif base_type == 'A':
                    if len(parts) > 1:
                        try:
                            size = int(re.sub(r'[^0-9]', '', parts[1]))
                        except:
                            size = 1
                    else:
                        size = 1
                elif base_type == 'B':
                    size = 1
                elif base_type == 'T':
                    size = 4
                else:
                    continue
                fields.append({'name': fname, 'type': base_type, 'size': size, 'encrypted': encrypted})

        if table_name in physical_overrides:
            fields = physical_overrides[table_name]

        tables[table_name] = {'indexed': is_indexed, 'fields': fields}

    return tables
