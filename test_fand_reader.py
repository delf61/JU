from fand_reader import FandReader

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

if __name__ == '__main__':
    test_tables()
