import os
import struct
from datetime import datetime, timedelta
import schema_parser

def decode_real48(b):
    if len(b) < 6 or b == b'\x00'*6:
        return 0.0
    exponent = b[0]
    if exponent == 0:
        return 0.0
    mantissa = 0
    for i in range(1, 6):
        mantissa = (mantissa << 8) | b[6-i]
    sign = (mantissa >> 39) & 1
    mantissa_val = mantissa & 0x7FFFFFFFFF
    exp = exponent - 129
    mant_float = 1.0 + (mantissa_val / (2.0 ** 39))
    val = (2.0 ** exp) * mant_float
    return -val if sign else val

def decode_fand_date(val):
    if val == 0.0:
        return None
    if 0.0 < val < 1.0:
        hours = val * 24
        h = int(hours)
        m = int(round((hours - h) * 60))
        if m == 60:
            h += 1
            m = 0
        return f"{h:02d}:{m:02d}"
    try:
        base = datetime(1, 1, 1) + timedelta(days=val-1)
        return base.strftime('%Y-%m-%d')
    except:
        return str(val)

def find_case_insensitive_path(base_dir, rel_path):
    parts = rel_path.split('/')
    curr = base_dir
    for part in parts:
        if not os.path.exists(curr): return None
        found = False
        for entry in os.listdir(curr):
            if entry.lower() == part.lower():
                curr = os.path.join(curr, entry)
                found = True
                break
        if not found: return None
    return curr

class FandCatalog:
    def __init__(self, cat_path):
        self.mapping = {}
        with open(cat_path, 'rb') as f:
            data = f.read()
        rec_size = 107
        num_recs = (len(data) - 6) // rec_size
        for i in range(num_recs):
            offset = 6 + i * rec_size
            rec = data[offset:offset+rec_size]
            cat_name = rec[0:8].decode('ascii', errors='ignore').strip()
            logical_name = rec[8:16].decode('ascii', errors='ignore').strip()
            path_str = rec[17:17+79].split(b' ')[0].decode('ascii', errors='ignore').strip()

            if logical_name:
                self.mapping[logical_name.lower()] = path_str
            elif cat_name:
                self.mapping[cat_name.lower()] = path_str

    def resolve_path(self, logical_name, base_dir, year=None):
        lname = logical_name.lower()
        if lname not in self.mapping:
            return None
        raw_path = self.mapping[lname]

        path_parts = raw_path.replace('\\', '/').split('JU/')
        if len(path_parts) > 1:
            rel_path = path_parts[1]
        else:
            rel_path = raw_path.split('\\')[-1]

        if year:
            if 'DELF' in rel_path.upper():
                import re
                rel_path = re.sub(r'DELF\d{4}', f'DELF{year}', rel_path, flags=re.IGNORECASE)

        return find_case_insensitive_path(base_dir, rel_path)


class FandReader:
    def __init__(self, data_dir, repo_root='.', year=None):
        self.data_dir = data_dir
        self.year = year
        self.schemas = schema_parser.parse_printer_txt(os.path.join(repo_root, 'PRINTER.TXT'))
        self.catalog = FandCatalog(os.path.join(repo_root, 'JU.CAT'))

    def read_table(self, table_name):
        table_name = table_name.lower()

        # FANDHLP exception: Not defined in PRINTER.TXT, but strictly exists as system help
        if table_name == 'fandhlp':
            schema = {'indexed': False, 'fields': [
                {'name': 'tema', 'type': 'A', 'size': 35, 'encrypted': False},
                {'name': 'text', 'type': 'T', 'size': 4, 'encrypted': False}
            ]}
        else:
            if table_name not in self.schemas:
                raise ValueError(f"Table '{table_name}' not found in PRINTER.TXT schema.")
            schema = self.schemas[table_name]

        filepath = self.catalog.resolve_path(table_name, self.data_dir, self.year)
        if not filepath or not os.path.exists(filepath):
            fallback = find_case_insensitive_path(self.data_dir, f"{table_name}.000")
            if fallback and os.path.exists(fallback):
                filepath = fallback
            else:
                raise FileNotFoundError(f"Physical file for table '{table_name}' not found.")

        return self._parse_000(filepath, schema)

    def _read_t00_text(self, t00_path, offset):
        if not os.path.exists(t00_path): return None
        with open(t00_path, 'rb') as f:
            f.seek(offset)
            length_data = f.read(2)
            if len(length_data) < 2: return None
            text_len = struct.unpack('<H', length_data)[0]
            text_data = f.read(text_len)
            return text_data.decode('cp852', errors='ignore')

    def read_uint24(self, b):
        return b[0] | (b[1] << 8) | (b[2] << 16)

    def read_x00(self, x00_path):
        if not os.path.exists(x00_path): return None
        with open(x00_path, 'rb') as f:
            data = f.read()

        page_size = 512
        num_pages = len(data) // page_size
        entries = []
        for i in range(1, num_pages):
            page = data[i*page_size : (i+1)*page_size]
            if page[0] == 0x01: # Leaf Node
                offset = 10
                key = bytearray(256)
                for j in range(5):
                    if offset >= len(page): break
                    pref = page[offset]
                    suff = page[offset+1]
                    offset += 2
                    suffix = page[offset : offset+suff]
                    offset += suff

                    key[pref:pref+suff] = suffix
                    actual_key = key[:pref+suff]

                    if offset + 3 > len(page): break
                    rec_num = self.read_uint24(page[offset:offset+3])
                    offset += 3

                    entries.append({'key_hex': actual_key.hex(), '000_record_idx': rec_num})
                break
        return entries

    def _parse_000(self, filepath, schema):
        with open(filepath, 'rb') as f:
            data = f.read()

        if len(data) < 6: return []

        header_int32 = struct.unpack('<i', data[0:4])[0]
        rec_len = struct.unpack('<H', data[4:6])[0]

        t00_path = find_case_insensitive_path(os.path.dirname(filepath), os.path.basename(filepath)[:-4] + '.T00')
        x00_path = find_case_insensitive_path(os.path.dirname(filepath), os.path.basename(filepath)[:-4] + '.X00')

        is_indexed = header_int32 < 0
        num_recs = abs(header_int32)

        # Physical capacity validation
        phys_cap = (len(data) - 6) // rec_len if rec_len > 0 else 0
        if phys_cap != num_recs:
            print(f"WARNING: Physical capacity {phys_cap} != parsed count {num_recs} in {filepath}")

        records = []
        fields = schema['fields']

        # Generic handling of schema vs physical mismatch:
        # Instead of failing, the reader computes the fields sequentially up to rec_len.
        # This handles FAND's legacy behavior where trailing fields (or string ends) were truncated physically.

        offset = 6
        for i in range(phys_cap):
            rec_data = data[offset:offset+rec_len]
            offset += rec_len

            ptr = 0
            is_deleted = False
            if is_indexed:
                if rec_data[0] != 0:
                    is_deleted = True
                ptr += 1

            record_dict = {'__deleted__': is_deleted}

            for fld in fields:
                if ptr >= rec_len:
                    # Field was completely dropped physically
                    record_dict[fld['name']] = None
                    continue

                # If field is partially truncated
                actual_size = min(fld['size'], rec_len - ptr)
                raw_val = rec_data[ptr:ptr+actual_size]
                ptr += actual_size

                val = None
                if fld['type'] == 'A':
                    if fld['encrypted']:
                        raw_val = bytes(b ^ 0xAA for b in raw_val)
                    val = raw_val.decode('cp852', errors='ignore').strip()
                elif fld['type'] == 'D':
                    if actual_size == 6:
                        float_val = decode_real48(raw_val)
                        val = decode_fand_date(float_val)
                elif fld['type'] == 'F':
                    if actual_size == 6:
                        val = decode_real48(raw_val)
                elif fld['type'] == 'B':
                    if actual_size > 0:
                        val = raw_val[0] != 0
                elif fld['type'] == 'T':
                    if actual_size >= 3:
                        # T pointer might be 3 or 4 bytes depending on the version. Pad to 4 bytes.
                        padded_val = raw_val.ljust(4, b'\x00')
                        t_offset = struct.unpack('<I', padded_val)[0]
                        if t_offset > 0 and t00_path:
                            val = self._read_t00_text(t00_path, t_offset)

                record_dict[fld['name']] = val

            records.append(record_dict)

        return {
            'filepath': filepath,
            'header_num_recs': num_recs,
            'header_rec_len': rec_len,
            'records': records,
            'x00_path': x00_path
        }
