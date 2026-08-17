import sys
import re

def get_table(table_name):
    with open('PRINTER.TXT', 'r', encoding='cp852', errors='ignore') as f:
        text = f.read()

    blocks = re.split(r'\x11\s+F\s+', text)

    for block in blocks[1:]:
        name_part = block.split('\x11')[0].strip()
        if name_part.lower().startswith(table_name.lower()):
            print("F " + name_part)
            content = block.split('\x11', 1)[1]
            print(content.split('\x11')[0].strip())
            return

if __name__ == '__main__':
    get_table(sys.argv[1])
