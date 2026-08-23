from fand_reader import FandReader, decode_fand_date

def test_tables():
    reader = FandReader('JU_DATA_ORIGINAL', year='2023') # DEN_PRAC requires year
    tables_to_test = ['auto', 'ucty', 'den_prac', 'dph', 'help']

    for t in tables_to_test:
        try:
            res = reader.read_table(t)
            records = res['records']
            assert len(records) == res['header_num_recs']

            x00_path = res.get('x00_path')
            if t in ['auto', 'ucty', 'den_prac']:
                assert x00_path is not None, f"Expected {t} to have x00_path"
            else:
                assert x00_path is None, f"Expected {t} to NOT have x00_path"
        except Exception as e:
            raise e

def test_decode_fand_date():
    # Zero value
    assert decode_fand_date(0.0) is None

    # Pure dates (val >= 1.0)
    # 739525.0 should be 2025-10-01
    assert decode_fand_date(739525.0) == '2025-10-01'
    assert decode_fand_date(739544.0) == '2025-10-20'
    assert decode_fand_date(739555.0) == '2025-10-31'

    # Pure times (0.0 < val < 1.0)
    # 0.291666... is 7/24 (07:00)
    assert decode_fand_date(0.2916666666665151) == '07:00'
    assert decode_fand_date(7/24) == '07:00'

    # 0.333333... is 8/24 (08:00)
    assert decode_fand_date(8/24) == '08:00'

    # 0.5 is 12/24 (12:00)
    assert decode_fand_date(0.5) == '12:00'

    # 0.541666... is 13/24 (13:00)
    assert decode_fand_date(0.5416666666669698) == '13:00'
    assert decode_fand_date(13/24) == '13:00'

    # 0.625 is 15/24 (15:00)
    assert decode_fand_date(0.625) == '15:00'

    # 0.999305... is 1439/1440 (23:59)
    assert decode_fand_date(1439/1440) == '23:59'

if __name__ == '__main__':
    test_tables()
    test_decode_fand_date()
