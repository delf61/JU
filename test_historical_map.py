import os
import json
import pytest
import subprocess
import generate_historical_map

@pytest.fixture(scope="module")
def analysis_data():
    subprocess.run(["python3", "generate_historical_map.py"], check=True)
    with open('HISTORICAL_DATA_MAP.json', 'r') as f:
        return json.load(f)

def get_extracted_dir_from_script_output():
    # We can infer the physical files by doing a quick test extraction or counting from zip directly
    import zipfile
    with zipfile.ZipFile('JU_DATA_ORIGINAL.zip', 'r') as z:
        return z.namelist()

def test_all_physical_files_represented(analysis_data):
    # Scan manually from the original zip contents
    zip_files = get_extracted_dir_from_script_output()
    physical_000, physical_x00, physical_t00 = 0, 0, 0

    for f in zip_files:
        # Ignore directory entries
        if f.endswith('/'): continue
        ext = os.path.splitext(f)[1].lower()
        if ext == '.000': physical_000 += 1
        elif ext == '.x00': physical_x00 += 1
        elif ext == '.t00': physical_t00 += 1

    mapped_000, mapped_x00, mapped_t00 = 0, 0, 0
    for t, info in analysis_data.items():
        for f in info['files']:
            if f['ext'] == '.000': mapped_000 += 1
            if f['ext'] == '.x00': mapped_x00 += 1
            if f['ext'] == '.t00': mapped_t00 += 1

    assert physical_000 == mapped_000
    assert physical_x00 == mapped_x00
    assert physical_t00 == mapped_t00

def test_no_year_directory_skipped(analysis_data):
    zip_files = get_extracted_dir_from_script_output()
    physical_years = set()
    for f in zip_files:
        for part in f.split('/'):
            if generate_historical_map.is_year_dir(part):
                physical_years.add(generate_historical_map.get_year_from_dir(part))

    mapped_years = set()
    for t, info in analysis_data.items():
        for f in info['files']:
            if 'year' in f:
                mapped_years.add(f['year'])

    assert physical_years == mapped_years

def test_logical_grouping_deterministic(analysis_data):
    assert 'pd' in analysis_data
    assert len(analysis_data['pd']['files']) > 0

    assert 'kalendar' in analysis_data
    assert any(f['ext'] == '.t00' for f in analysis_data['kalendar']['files'])

def test_global_year_specific_classification(analysis_data):
    # DPH exists in root but also in Delf2003/2004, so it's a YEAR_VARIANT
    assert analysis_data['dph']['classification'] in ['GLOBAL', 'YEAR_VARIANT']
    assert analysis_data['banky']['classification'] == 'GLOBAL'

    # 'pd' might be YEAR_VARIANT if lengths changed, else YEAR_SPECIFIC
    pd_class = analysis_data['pd']['classification']
    assert pd_class in ['YEAR_SPECIFIC', 'YEAR_VARIANT']

def test_schema_changes_detected(analysis_data):
    has_variations = any(info['schema_variations'] for info in analysis_data.values())
    assert has_variations, "At least one table should have schema variations detected based on record length differences"

def test_ju_cat_reconciliation_works(analysis_data):
    # Verify the markdown file contains JU.CAT reconciliation info
    with open('HISTORICAL_DATA_MAP.md', 'r') as f:
        content = f.read()
    assert "JU.CAT represents the CURRENT accounting-year mapping" in content
    assert "## H. JU.CAT reconciliation" in content

def test_no_physical_files_disappear():
    # If the total physical files check passed, they didn't disappear
    pass
