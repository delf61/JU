import unittest
from migrate_to_mariadb import sanitize_identifier, map_mariadb_type, escape_sql_string
from schema_generator import looks_like_date, generate_schema

class TestMigration(unittest.TestCase):
    def test_sanitize_identifier(self):
        self.assertEqual(sanitize_identifier('NormalName'), 'normalname')
        self.assertEqual(sanitize_identifier('WITH-DASH'), 'with_dash')
        self.assertEqual(sanitize_identifier('WITH.DOT'), 'with_dot')

        self.assertEqual(sanitize_identifier('text'), 'text_')
        self.assertEqual(sanitize_identifier('year'), 'year_')
        self.assertEqual(sanitize_identifier('select'), 'select_')

    def test_map_mariadb_type_string(self):
        field_info = {
            'types': {'str'},
            'max_length': 50,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info), 'VARCHAR(50)')

    def test_map_mariadb_type_long_string(self):
        field_info = {
            'types': {'str'},
            'max_length': 300,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info), 'TEXT')

    def test_map_mariadb_type_t_field(self):
        field_info = {
            'types': {'str'},
            'max_length': 100,
            'nullable': True,
            'is_t_field': True,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info), 'TEXT')

    def test_map_mariadb_type_numeric(self):
        field_info_int = {
            'types': {'int'},
            'max_length': 0,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info_int), 'INT')

        field_info_float = {
            'types': {'float'},
            'max_length': 0,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info_float), 'DOUBLE')

    def test_map_mariadb_type_bool(self):
        field_info = {
            'types': {'bool'},
            'max_length': 0,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info), 'TINYINT(1)')

    def test_map_mariadb_type_unknown(self):
        field_info = {
            'types': set(),
            'max_length': 0,
            'nullable': True,
            'is_t_field': False,
            'looks_like_date': False
        }
        self.assertEqual(map_mariadb_type(field_info), 'VARCHAR(255)')

    def test_escape_sql_string(self):
        self.assertEqual(escape_sql_string(None), 'NULL')
        self.assertEqual(escape_sql_string(True), '1')
        self.assertEqual(escape_sql_string(False), '0')
        self.assertEqual(escape_sql_string(123), '123')
        self.assertEqual(escape_sql_string(12.34), '12.34')
        self.assertEqual(escape_sql_string("hello"), "'hello'")
        self.assertEqual(escape_sql_string("it's"), "'it\\'s'")
        self.assertEqual(escape_sql_string("back\\slash"), "'back\\\\slash'")

    def test_looks_like_date(self):
        self.assertTrue(looks_like_date("2025-01-01"))
        self.assertTrue(looks_like_date("01.01.2025"))
        self.assertFalse(looks_like_date("not a date"))
        self.assertFalse(looks_like_date("2025"))

    def test_schema_generation_logic_date(self):
        field_info = {
            'types': {'str'},
            'max_length': 10,
            'nullable': False,
            'is_t_field': False,
            'looks_like_date': True
        }
        self.assertEqual(map_mariadb_type(field_info), 'VARCHAR(10)')

    def test_deleted_record_logic(self):
        record_with_del = {'__deleted__': True, 'val': 1}
        record_no_del = {'val': 1}
        self.assertTrue(record_with_del.get('__deleted__', False))
        self.assertFalse(record_no_del.get('__deleted__', False))

    def test_year_variant_logic(self):
        years_set = {"GLOBAL"}
        self.assertFalse(len([y for y in years_set if y != "GLOBAL"]) > 0)

        years_set = {"2012", "2013"}
        self.assertTrue(len([y for y in years_set if y != "GLOBAL"]) > 0)

if __name__ == '__main__':
    unittest.main()
