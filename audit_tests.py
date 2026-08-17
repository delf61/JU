from fand_reader import FandReader

def run_audit():
    print("="*60)
    print("FAND READER AUDIT SUITE")
    print("="*60)

    # We test multiple tables across two different year directories (e.g. 2025 and 2005)
    directories_to_test = [
        ('2025', ['dph', 'ucty', 'den_prac', 'banky', 'kalendar', 'kppol', 'pd', 'cinnosti', 'fandhlp']),
        ('2005', ['den_prac', 'kalendar', 'pd', 'pokldokl'])
    ]

    total_passed = 0
    total_failed = 0

    for year, tables in directories_to_test:
        print(f"\n[{'YEAR ' + year:^58}]")
        reader = FandReader('JU_DATA_ORIGINAL', year=year)

        for table in tables:
            print(f"--- Auditing Table: {table.upper()} ---")
            try:
                res = reader.read_table(table)
                print(f"    File: {res['filepath']}")
                print(f"    Header indicates: {res['header_num_recs']} records, length {res['header_rec_len']}")

                x00 = res.get('x00_path')
                if x00:
                    print(f"    INDEX FOUND: {x00}")
                    idx_res = reader.read_x00(x00)
                    if idx_res:
                        print(f"    INDEX EXTRACT: {idx_res[0]}")

                records = res['records']
                print(f"    Parsed {len(records)} physical records.")
                if len(records) > 0:
                    r = records[0]
                    # Truncate text blob for display
                    if 'text' in r and isinstance(r['text'], str):
                        r['text'] = r['text'][:30].replace('\n', ' ') + '...'
                    if 'TEXT' in r and isinstance(r['TEXT'], str):
                        r['TEXT'] = r['TEXT'][:30].replace('\n', ' ') + '...'
                    print(f"    SAMPLE REC 0: {r}")

                total_passed += 1
            except Exception as e:
                print(f"    FAILED: {e}")
                total_failed += 1

    print("\n" + "="*60)
    print(f"AUDIT COMPLETE. Passed: {total_passed}, Failed: {total_failed}")
    print("="*60)

if __name__ == '__main__':
    run_audit()
