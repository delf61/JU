import unittest
import os
import json
from fand_reader import FandReader, FandCatalog

class TestFandExtraction(unittest.TestCase):
    @classmethod
    def setUpClass(cls):
        cls.data_dir = '/tmp/JU_DATA'
        cls.year = '2025'
        cls.reader = FandReader(cls.data_dir, year=cls.year)

    def test_catalog_resolution(self):
        path = self.reader.catalog.resolve_path('den_prac', self.data_dir, self.year)
        self.assertIsNotNone(path)
        self.assertTrue(path.upper().endswith('DEN_PRAC.000'))
        self.assertIn('DELF2025', path.upper())

    def test_global_table_resolution(self):
        path = self.reader.catalog.resolve_path('dph', self.data_dir, self.year)
        self.assertIsNotNone(path)
        self.assertTrue(path.upper().endswith('DPH.000'))
        self.assertNotIn('DELF2025', path.upper()) # global

    def test_000_header_parsing(self):
        res = self.reader.read_table('dph')
        self.assertIn('header_num_recs', res)
        self.assertIn('header_rec_len', res)
        self.assertTrue(res['header_num_recs'] > 0)
        self.assertTrue(res['header_rec_len'] > 0)
        self.assertEqual(len(res['records']), res['header_num_recs'])

    def test_indexed_table_handling(self):
        # UCTY is indexed
        res = self.reader.read_table('ucty')
        self.assertTrue(res.get('x00_path'))
        self.assertTrue(os.path.exists(res['x00_path']))
        # Verify the deleted flag is correctly pulled out
        self.assertIn('__deleted__', res['records'][0])

    def test_t00_resolution(self):
        # HELP or FANDHLP uses .T00 text
        res = self.reader.read_table('fandhlp')
        self.assertTrue(any(r.get('text') for r in res['records']))

    def test_cross_year_resolution(self):
        reader_2015 = FandReader(self.data_dir, year='2015')
        path_2015 = reader_2015.catalog.resolve_path('den_prac', self.data_dir, '2015')
        self.assertIn('DELF2015', path_2015.upper())

    def test_json_serialization(self):
        import subprocess
        output = subprocess.check_output(['python3', 'export_fand_json.py', 'help']).decode('utf-8')
        data = json.loads(output)
        self.assertIsInstance(data, list)
        self.assertTrue(len(data) > 0)

if __name__ == '__main__':
    unittest.main()
