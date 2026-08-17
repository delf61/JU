from fand_reader import FandReader

def test_tables():
    reader = FandReader('/tmp/JU_DATA', year='2025')

    tables_to_test = ['dph', 'ucty', 'den_prac', 'help']

    for t in tables_to_test:
        print(f"\n{'='*50}\nTESTING TABLE: {t.upper()}\n{'='*50}")
        try:
            res = reader.read_table(t)
            print(f"Filepath: {res['filepath']}")
            print(f"Header Record Count: {res['header_num_recs']}")
            print(f"Header Record Length: {res['header_rec_len']}")

            # Print .x00 results if any
            x00_path = res.get('x00_path')
            if x00_path:
                print(f"Index (.X00) Path: {x00_path}")
                x00_res = reader.read_x00(x00_path)
                print(f"First Index Leaf Entries: {x00_res[:3]}")

            records = res['records']
            print(f"Actual Extracted Records: {len(records)}")

            active = sum(1 for r in records if not r.get('__deleted__', False))
            deleted = len(records) - active
            print(f"Active Records: {active}, Deleted Records: {deleted}")

            print("\nFirst 3 Records:")
            for r in records[:3]:
                if 'text' in r and isinstance(r['text'], str):
                    r['text'] = r['text'][:40].replace('\n', ' ') + '...'
                print(r)

        except Exception as e:
            print(f"FAILED to read {t}: {e}")

    # Manually test fandhlp which isn't in PRINTER.TXT
    print(f"\n{'='*50}\nTESTING TABLE: FANDHLP\n{'='*50}")
    schema = {'indexed': False, 'fields': [{'name': 'tema', 'type': 'A', 'size': 35, 'encrypted': False}, {'name': 'text', 'type': 'T', 'size': 4, 'encrypted': False}]}
    res = reader._parse_000('/tmp/JU_DATA/fandhlp.000', schema)
    print(f"Filepath: {res['filepath']}")
    print(f"Header Record Count: {res['header_num_recs']}")
    print(f"Header Record Length: {res['header_rec_len']}")
    records = res['records']
    print(f"Actual Extracted Records: {len(records)}")
    active = sum(1 for r in records if not r.get('__deleted__', False))
    print(f"Active Records: {active}, Deleted Records: {len(records) - active}")
    print("\nFirst 3 Records:")
    for r in records[:3]:
        if 'text' in r and isinstance(r['text'], str):
            r['text'] = r['text'][:40].replace('\r', '').replace('\n', ' ') + '...'
        print(r)

if __name__ == '__main__':
    test_tables()
