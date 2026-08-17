import sys

def parse_ju_cat(filename):
    with open(filename, 'rb') as f:
        data = f.read()

    header = data[0:6]
    record_size = 107
    num_records = (len(data) - 6) // record_size

    entries = []
    for i in range(num_records):
        offset = 6 + i * record_size
        record = data[offset:offset+record_size]

        cat_name = record[0:8].decode('ascii', errors='ignore').strip()
        logical_name = record[8:16].decode('ascii', errors='ignore').strip()

        # Path seems to be space-padded, starting at byte 17
        path_raw = record[17:17+79]
        path = path_raw.split(b' ')[0].decode('ascii', errors='ignore').strip()

        entries.append({'cat_name': cat_name, 'logical_name': logical_name, 'path': path})

    return entries

if __name__ == '__main__':
    entries = parse_ju_cat('JU.CAT')
    for e in entries:
        print(f"{e['cat_name']:10} {e['logical_name']:12} -> {e['path']}")
