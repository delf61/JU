# Historical Schema Blockers

## Analysis of Schema Sources
- **JU.RDB / JU.TTT**: Contains only the latest current application logic and pointers, matching PRINTER.TXT.
- **A.RDB / A.TTT (Year dirs)**: Extremely sparse. E.g., Delf1991/A.RDB typically contains only 1 object (Fsc.x). It does not contain full table schemas.
- **PRINTER.TXT**: Contains only a single definition per table (the latest). Does not track historical schema evolution.
- **FAND Reader Heuristics**: As strictly directed by the user, we cannot guess missing internal fields or types based purely on rec_len.

## Conclusion
Historical schemas that deviate from the target PRINTER.TXT layout **cannot be unambiguously reconstructed** from the legacy repository assets.

### BLOCKED: DEN_PRAC - 2007
- **File**: `DELF2007/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2008
- **File**: `DELF2008/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2009
- **File**: `DELF2009/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2010
- **File**: `DELF2010/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2011
- **File**: `DELF2011/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2012
- **File**: `DELF2012/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2013
- **File**: `DELF2013/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2014
- **File**: `DELF2014/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2015
- **File**: `DELF2015/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2016
- **File**: `DELF2016/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2017
- **File**: `DELF2017/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2018
- **File**: `DELF2018/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2019
- **File**: `DELF2019/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2020
- **File**: `DELF2020/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2021
- **File**: `DELF2021/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2022
- **File**: `DELF2022/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2023
- **File**: `DELF2023/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2024
- **File**: `DELF2024/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4827
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 4827 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2025
- **File**: `DELF2025/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4844
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 4844 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2003
- **File**: `Delf2003/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2004
- **File**: `Delf2004/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2005
- **File**: `Delf2005/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DEN_PRAC - 2006
- **File**: `Delf2006/DEN_PRAC.000`
- **Record Length**: 472 (Target: 476)
- **Record Count**: 4766
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 4766 records of 472 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 472 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DPH - 2003
- **File**: `Delf2003/DPH.000`
- **Record Length**: 46 (Target: 103)
- **Record Count**: 21
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 21 records of 46 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 46 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: DPH - 2004
- **File**: `Delf2004/DPH.000`
- **Record Length**: 46 (Target: 103)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 1 records of 46 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 46 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2007
- **File**: `DELF2007/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 328
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 328 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2008
- **File**: `DELF2008/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 288
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 288 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2009
- **File**: `DELF2009/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 137
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 137 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2010
- **File**: `DELF2010/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 101
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 101 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2011
- **File**: `DELF2011/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 2
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 2 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2012
- **File**: `DELF2012/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 60
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 60 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2013
- **File**: `DELF2013/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 238
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 238 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2014
- **File**: `DELF2014/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 293
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 293 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2015
- **File**: `DELF2015/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 70
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 70 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2016
- **File**: `DELF2016/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 49
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 49 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2017
- **File**: `DELF2017/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 1
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 1 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2021
- **File**: `DELF2021/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 2
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 2 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2022
- **File**: `DELF2022/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 2
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 2 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2024
- **File**: `DELF2024/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 2
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 2 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2025
- **File**: `DELF2025/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 2
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 2 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2026
- **File**: `DELF2026/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 0
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 0 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 1998
- **File**: `Delf1998/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 24
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 24 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 1999
- **File**: `Delf1999/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 626
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 626 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2000
- **File**: `Delf2000/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 595
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 595 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2001
- **File**: `Delf2001/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 727
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 727 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2003
- **File**: `Delf2003/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 137
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 137 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2004
- **File**: `Delf2004/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 795
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 795 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2005
- **File**: `Delf2005/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 916
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 916 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EVI_AUTO - 2006
- **File**: `Delf2006/EVI_AUTO.000`
- **Record Length**: 247 (Target: 290)
- **Record Count**: 505
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 505 records of 247 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 247 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2007
- **File**: `DELF2007/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 49
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 49 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2008
- **File**: `DELF2008/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 46
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 46 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2009
- **File**: `DELF2009/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 72
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 72 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2010
- **File**: `DELF2010/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 22
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 22 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2011
- **File**: `DELF2011/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 7
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 7 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2012
- **File**: `DELF2012/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 14
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 14 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2013
- **File**: `DELF2013/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 21
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 21 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2014
- **File**: `DELF2014/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 23
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 23 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2015
- **File**: `DELF2015/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 9
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 9 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2016
- **File**: `DELF2016/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 6
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 6 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2017
- **File**: `DELF2017/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 169
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 169 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2018
- **File**: `DELF2018/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 169
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 169 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2019
- **File**: `DELF2019/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 169
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 169 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2020
- **File**: `DELF2020/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 169
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 169 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2021
- **File**: `DELF2021/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 169
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 169 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2022
- **File**: `DELF2022/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 170
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 170 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2023
- **File**: `DELF2023/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 174
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 174 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2024
- **File**: `DELF2024/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 186
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 186 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2025
- **File**: `DELF2025/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 195
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 195 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2026
- **File**: `DELF2026/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 1
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 1 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1991
- **File**: `Delf1991/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1992
- **File**: `Delf1992/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1993
- **File**: `Delf1993/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1994
- **File**: `Delf1994/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1995
- **File**: `Delf1995/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1996
- **File**: `Delf1996/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1997
- **File**: `Delf1997/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1998
- **File**: `Delf1998/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 1999
- **File**: `Delf1999/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2000
- **File**: `Delf2000/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2001
- **File**: `Delf2001/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2002
- **File**: `Delf2002/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2003
- **File**: `Delf2003/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 601
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 601 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2004
- **File**: `Delf2004/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 63
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 63 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2005
- **File**: `Delf2005/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 66
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 66 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: EZ - 2006
- **File**: `Delf2006/EZ.000`
- **Record Length**: 221 (Target: 234)
- **Record Count**: 54
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 54 records of 221 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 221 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2010
- **File**: `DELF2010/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 1 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2011
- **File**: `DELF2011/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 1 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2012
- **File**: `DELF2012/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 1 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2014
- **File**: `DELF2014/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 293
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 293 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2015
- **File**: `DELF2015/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 293
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 293 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2017
- **File**: `DELF2017/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2018
- **File**: `DELF2018/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2019
- **File**: `DELF2019/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2020
- **File**: `DELF2020/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2021
- **File**: `DELF2021/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2022
- **File**: `DELF2022/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2023
- **File**: `DELF2023/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2024
- **File**: `DELF2024/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2025
- **File**: `DELF2025/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2026
- **File**: `DELF2026/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 879
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 879 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1991
- **File**: `Delf1991/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 10
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 10 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1992
- **File**: `Delf1992/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 44
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 44 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1993
- **File**: `Delf1993/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 46
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 46 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1994
- **File**: `Delf1994/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 33
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 33 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1995
- **File**: `Delf1995/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 9
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 9 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1996
- **File**: `Delf1996/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 25
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 25 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1997
- **File**: `Delf1997/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 33
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 33 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1998
- **File**: `Delf1998/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 36
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 36 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 1999
- **File**: `Delf1999/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 6
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 6 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2000
- **File**: `Delf2000/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 4
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 4 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2001
- **File**: `Delf2001/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 8
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 8 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2002
- **File**: `Delf2002/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 16
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 16 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2003
- **File**: `Delf2003/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 19
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 19 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKDKP - 2005
- **File**: `Delf2005/IKDKP.000`
- **Record Length**: 201 (Target: 187)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 1 records of 201 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 201 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2007
- **File**: `DELF2007/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 32
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 32 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2008
- **File**: `DELF2008/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 32
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 32 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2009
- **File**: `DELF2009/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 32
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 32 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2010
- **File**: `DELF2010/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 32
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 32 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2011
- **File**: `DELF2011/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 32
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 32 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2012
- **File**: `DELF2012/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 34
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 34 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2013
- **File**: `DELF2013/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 35
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 35 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2014
- **File**: `DELF2014/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 35
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 35 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2015
- **File**: `DELF2015/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 35
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 35 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2016
- **File**: `DELF2016/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 36
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 36 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2017
- **File**: `DELF2017/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2018
- **File**: `DELF2018/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2019
- **File**: `DELF2019/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 37
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 37 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2020
- **File**: `DELF2020/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2021
- **File**: `DELF2021/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2022
- **File**: `DELF2022/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2023
- **File**: `DELF2023/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 38
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 38 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2024
- **File**: `DELF2024/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 40
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 40 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2025
- **File**: `DELF2025/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 41
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 41 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2026
- **File**: `DELF2026/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 42
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 42 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1991
- **File**: `Delf1991/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 1 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1992
- **File**: `Delf1992/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 8
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 8 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1993
- **File**: `Delf1993/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 10
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 10 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1994
- **File**: `Delf1994/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 9
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 9 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1995
- **File**: `Delf1995/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 9
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 9 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1996
- **File**: `Delf1996/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 11
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 11 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1997
- **File**: `Delf1997/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 12
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 12 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1998
- **File**: `Delf1998/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 17
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 17 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 1999
- **File**: `Delf1999/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 23
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 23 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2000
- **File**: `Delf2000/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 27
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 27 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2001
- **File**: `Delf2001/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 27
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 27 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2002
- **File**: `Delf2002/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 28
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 28 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2003
- **File**: `Delf2003/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 28
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 28 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2004
- **File**: `Delf2004/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 30
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 30 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2005
- **File**: `Delf2005/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 29
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 29 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: IKZP - 2006
- **File**: `Delf2006/IKZP.000`
- **Record Length**: 280 (Target: 302)
- **Record Count**: 31
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 31 records of 280 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 280 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2007
- **File**: `DELF2007/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2008
- **File**: `DELF2008/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2009
- **File**: `DELF2009/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2010
- **File**: `DELF2010/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2011
- **File**: `DELF2011/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2012
- **File**: `DELF2012/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2013
- **File**: `DELF2013/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2014
- **File**: `DELF2014/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2015
- **File**: `DELF2015/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2016
- **File**: `DELF2016/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2017
- **File**: `DELF2017/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2018
- **File**: `DELF2018/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2019
- **File**: `DELF2019/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2020
- **File**: `DELF2020/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2021
- **File**: `DELF2021/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2022
- **File**: `DELF2022/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2023
- **File**: `DELF2023/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2024
- **File**: `DELF2024/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2025
- **File**: `DELF2025/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2026
- **File**: `DELF2026/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1991
- **File**: `Delf1991/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1992
- **File**: `Delf1992/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1993
- **File**: `Delf1993/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1994
- **File**: `Delf1994/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1995
- **File**: `Delf1995/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1996
- **File**: `Delf1996/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1997
- **File**: `Delf1997/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1998
- **File**: `Delf1998/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 1999
- **File**: `Delf1999/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2000
- **File**: `Delf2000/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2001
- **File**: `Delf2001/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2002
- **File**: `Delf2002/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2003
- **File**: `Delf2003/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2004
- **File**: `Delf2004/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2005
- **File**: `Delf2005/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: KALENDAR - 2006
- **File**: `Delf2006/KALENDAR.000`
- **Record Length**: 63 (Target: 73)
- **Record Count**: 366
- **Available Support Files**: .X00, .T00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 366 records of 63 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 63 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2007
- **File**: `DELF2007/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2008
- **File**: `DELF2008/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2009
- **File**: `DELF2009/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2010
- **File**: `DELF2010/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2013
- **File**: `DELF2013/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2015
- **File**: `DELF2015/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2016
- **File**: `DELF2016/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2017
- **File**: `DELF2017/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2026
- **File**: `DELF2026/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 1996
- **File**: `Delf1996/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 1 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 1997
- **File**: `Delf1997/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 1 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 1998
- **File**: `Delf1998/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 1 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2001
- **File**: `Delf2001/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2003
- **File**: `Delf2003/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2004
- **File**: `Delf2004/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2005
- **File**: `Delf2005/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: LEASING - 2006
- **File**: `Delf2006/LEASING.000`
- **Record Length**: 224 (Target: 242)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 0 records of 224 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 224 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2007
- **File**: `DELF2007/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 328
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 328 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 1998
- **File**: `Delf1998/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 24
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 24 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 1999
- **File**: `Delf1999/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 626
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 626 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2000
- **File**: `Delf2000/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 595
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 595 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2001
- **File**: `Delf2001/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 727
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 727 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2003
- **File**: `Delf2003/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 137
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 137 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2004
- **File**: `Delf2004/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 795
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 795 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2005
- **File**: `Delf2005/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 916
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 916 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: OLD_AUTO - 2006
- **File**: `Delf2006/old_auto.000`
- **Record Length**: 245 (Target: 284)
- **Record Count**: 505
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 505 records of 245 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 245 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2007
- **File**: `DELF2007/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2008
- **File**: `DELF2008/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2009
- **File**: `DELF2009/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2010
- **File**: `DELF2010/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2011
- **File**: `DELF2011/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2012
- **File**: `DELF2012/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2013
- **File**: `DELF2013/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2014
- **File**: `DELF2014/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2015
- **File**: `DELF2015/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2016
- **File**: `DELF2016/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2017
- **File**: `DELF2017/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2018
- **File**: `DELF2018/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2019
- **File**: `DELF2019/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2020
- **File**: `DELF2020/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2021
- **File**: `DELF2021/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2022
- **File**: `DELF2022/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2023
- **File**: `DELF2023/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2024
- **File**: `DELF2024/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2025
- **File**: `DELF2025/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2026
- **File**: `DELF2026/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1991
- **File**: `Delf1991/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1992
- **File**: `Delf1992/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1993
- **File**: `Delf1993/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1994
- **File**: `Delf1994/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1995
- **File**: `Delf1995/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1996
- **File**: `Delf1996/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1997
- **File**: `Delf1997/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1998
- **File**: `Delf1998/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 1999
- **File**: `Delf1999/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2000
- **File**: `Delf2000/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2001
- **File**: `Delf2001/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2002
- **File**: `Delf2002/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2003
- **File**: `Delf2003/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2004
- **File**: `Delf2004/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2005
- **File**: `Delf2005/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PARAM - 2006
- **File**: `Delf2006/PARAM.000`
- **Record Length**: 350 (Target: 0)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 1 records of 350 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 350 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2007
- **File**: `DELF2007/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 408
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 408 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2008
- **File**: `DELF2008/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 311
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 311 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2009
- **File**: `DELF2009/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 162
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 162 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2010
- **File**: `DELF2010/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 146
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 146 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2011
- **File**: `DELF2011/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 142
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 142 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2012
- **File**: `DELF2012/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 145
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 145 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2013
- **File**: `DELF2013/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 150
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 150 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2014
- **File**: `DELF2014/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 161
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 161 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2015
- **File**: `DELF2015/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 141
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 141 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2016
- **File**: `DELF2016/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 99
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 99 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2017
- **File**: `DELF2017/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 110
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 110 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2018
- **File**: `DELF2018/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 97
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 97 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2019
- **File**: `DELF2019/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 64
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 64 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2020
- **File**: `DELF2020/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 98
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 98 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2021
- **File**: `DELF2021/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 83
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 83 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2022
- **File**: `DELF2022/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 89
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 89 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2023
- **File**: `DELF2023/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 73
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 73 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2024
- **File**: `DELF2024/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 84
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 84 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2025
- **File**: `DELF2025/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 143
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 143 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2026
- **File**: `DELF2026/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 88
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 88 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1991
- **File**: `Delf1991/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 37
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 37 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1992
- **File**: `Delf1992/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 164
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 164 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1993
- **File**: `Delf1993/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 251
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 251 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1994
- **File**: `Delf1994/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 277
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 277 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1995
- **File**: `Delf1995/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 217
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 217 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1996
- **File**: `Delf1996/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 228
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 228 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1997
- **File**: `Delf1997/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 261
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 261 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1998
- **File**: `Delf1998/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 369
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 369 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 1999
- **File**: `Delf1999/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 463
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 463 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2000
- **File**: `Delf2000/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 495
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 495 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2001
- **File**: `Delf2001/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 497
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 497 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2002
- **File**: `Delf2002/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 484
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 484 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2003
- **File**: `Delf2003/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 529
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 529 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2004
- **File**: `Delf2004/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 517
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 517 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2005
- **File**: `Delf2005/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 477
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 477 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PD - 2006
- **File**: `Delf2006/PD.000`
- **Record Length**: 196 (Target: 235)
- **Record Count**: 400
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 400 records of 196 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 196 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2007
- **File**: `DELF2007/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 54
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 54 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2008
- **File**: `DELF2008/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 33
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 33 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2009
- **File**: `DELF2009/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 20
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 20 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2010
- **File**: `DELF2010/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 10
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 10 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2011
- **File**: `DELF2011/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 7
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 7 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2012
- **File**: `DELF2012/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 18
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 18 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2013
- **File**: `DELF2013/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 11
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 11 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2014
- **File**: `DELF2014/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 6
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 6 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2015
- **File**: `DELF2015/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 3
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 3 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2017
- **File**: `DELF2017/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 148
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 148 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2018
- **File**: `DELF2018/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 148
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 148 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2019
- **File**: `DELF2019/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 148
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 148 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2020
- **File**: `DELF2020/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 148
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 148 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2021
- **File**: `DELF2021/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 148
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 148 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2023
- **File**: `DELF2023/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 6
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 6 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2002
- **File**: `Delf2002/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 247
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 247 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2003
- **File**: `Delf2003/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 100
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 100 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2004
- **File**: `Delf2004/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 116
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 116 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2005
- **File**: `Delf2005/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 84
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 84 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: POKLDOKL - 2006
- **File**: `Delf2006/POKLDOKL.000`
- **Record Length**: 165 (Target: 169)
- **Record Count**: 16
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 16 records of 165 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 165 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2007
- **File**: `DELF2007/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2008
- **File**: `DELF2008/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2009
- **File**: `DELF2009/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2010
- **File**: `DELF2010/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2011
- **File**: `DELF2011/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2012
- **File**: `DELF2012/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2013
- **File**: `DELF2013/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2014
- **File**: `DELF2014/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2015
- **File**: `DELF2015/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 25
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 25 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2016
- **File**: `DELF2016/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2017
- **File**: `DELF2017/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2018
- **File**: `DELF2018/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2019
- **File**: `DELF2019/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2020
- **File**: `DELF2020/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2021
- **File**: `DELF2021/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2022
- **File**: `DELF2022/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 56
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 56 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2023
- **File**: `DELF2023/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2024
- **File**: `DELF2024/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2025
- **File**: `DELF2025/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2026
- **File**: `DELF2026/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2026 A.RDB, 2026 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1991
- **File**: `Delf1991/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1992
- **File**: `Delf1992/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1993
- **File**: `Delf1993/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1994
- **File**: `Delf1994/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1995
- **File**: `Delf1995/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1996
- **File**: `Delf1996/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1997
- **File**: `Delf1997/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1998
- **File**: `Delf1998/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 1999
- **File**: `Delf1999/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2000
- **File**: `Delf2000/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2001
- **File**: `Delf2001/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2002
- **File**: `Delf2002/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2003
- **File**: `Delf2003/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2004
- **File**: `Delf2004/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2005
- **File**: `Delf2005/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: PV - 2006
- **File**: `Delf2006/PV.000`
- **Record Length**: 64 (Target: 58)
- **Record Count**: 1
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 1 records of 64 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 64 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2007
- **File**: `DELF2007/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 145
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2007 A.RDB, 2007 A.TTT
- **What can be determined**: The file exists and has 145 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2008
- **File**: `DELF2008/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 131
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 131 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2009
- **File**: `DELF2009/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 64
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2009 A.RDB, 2009 A.TTT
- **What can be determined**: The file exists and has 64 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2010
- **File**: `DELF2010/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 43
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2010 A.RDB, 2010 A.TTT
- **What can be determined**: The file exists and has 43 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2011
- **File**: `DELF2011/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 11
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 11 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2012
- **File**: `DELF2012/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 27
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2012 A.RDB, 2012 A.TTT
- **What can be determined**: The file exists and has 27 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2013
- **File**: `DELF2013/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 120
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2013 A.RDB, 2013 A.TTT
- **What can be determined**: The file exists and has 120 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2014
- **File**: `DELF2014/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 145
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2014 A.RDB, 2014 A.TTT
- **What can be determined**: The file exists and has 145 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2015
- **File**: `DELF2015/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 34
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2015 A.RDB, 2015 A.TTT
- **What can be determined**: The file exists and has 34 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2016
- **File**: `DELF2016/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 25
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 25 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2017
- **File**: `DELF2017/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2018
- **File**: `DELF2018/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2019
- **File**: `DELF2019/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2020
- **File**: `DELF2020/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2021
- **File**: `DELF2021/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2022
- **File**: `DELF2022/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 37
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 37 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2023
- **File**: `DELF2023/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 0
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2023 A.RDB, 2023 A.TTT
- **What can be determined**: The file exists and has 0 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2024
- **File**: `DELF2024/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 0
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2024 A.RDB, 2024 A.TTT
- **What can be determined**: The file exists and has 0 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2025
- **File**: `DELF2025/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 0
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2025 A.RDB, 2025 A.TTT
- **What can be determined**: The file exists and has 0 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1991
- **File**: `Delf1991/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 3
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1991 A.RDB, 1991 A.TTT
- **What can be determined**: The file exists and has 3 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1992
- **File**: `Delf1992/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 17
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1992 A.RDB, 1992 A.TTT
- **What can be determined**: The file exists and has 17 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1993
- **File**: `Delf1993/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 41
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1993 A.RDB, 1993 A.TTT
- **What can be determined**: The file exists and has 41 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1994
- **File**: `Delf1994/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 1
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1994 A.RDB, 1994 A.TTT
- **What can be determined**: The file exists and has 1 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1995
- **File**: `Delf1995/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 1
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1995 A.RDB, 1995 A.TTT
- **What can be determined**: The file exists and has 1 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1996
- **File**: `Delf1996/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 6
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1996 A.RDB, 1996 A.TTT
- **What can be determined**: The file exists and has 6 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1997
- **File**: `Delf1997/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 4
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1997 A.RDB, 1997 A.TTT
- **What can be determined**: The file exists and has 4 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1998
- **File**: `Delf1998/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 14
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1998 A.RDB, 1998 A.TTT
- **What can be determined**: The file exists and has 14 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 1999
- **File**: `Delf1999/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 316
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 1999 A.RDB, 1999 A.TTT
- **What can be determined**: The file exists and has 316 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2000
- **File**: `Delf2000/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 276
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2000 A.RDB, 2000 A.TTT
- **What can be determined**: The file exists and has 276 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2001
- **File**: `Delf2001/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 355
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2001 A.RDB, 2001 A.TTT
- **What can be determined**: The file exists and has 355 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2002
- **File**: `Delf2002/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 294
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 294 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2003
- **File**: `Delf2003/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 62
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2003 A.RDB, 2003 A.TTT
- **What can be determined**: The file exists and has 62 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2004
- **File**: `Delf2004/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 353
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2004 A.RDB, 2004 A.TTT
- **What can be determined**: The file exists and has 353 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2005
- **File**: `Delf2005/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 403
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2005 A.RDB, 2005 A.TTT
- **What can be determined**: The file exists and has 403 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: SC - 2006
- **File**: `Delf2006/SC.000`
- **Record Length**: 239 (Target: 278)
- **Record Count**: 226
- **Available Support Files**: .X00
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2006 A.RDB, 2006 A.TTT
- **What can be determined**: The file exists and has 226 records of 239 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 239 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UCET - 2002
- **File**: `Delf2002/UCET.000`
- **Record Length**: 113 (Target: 116)
- **Record Count**: 1762
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2002 A.RDB, 2002 A.TTT
- **What can be determined**: The file exists and has 1762 records of 113 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 113 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2008
- **File**: `DELF2008/UDAJE.000`
- **Record Length**: 268 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 0 records of 268 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 268 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2011
- **File**: `DELF2011/UDAJE.000`
- **Record Length**: 288 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2011 A.RDB, 2011 A.TTT
- **What can be determined**: The file exists and has 0 records of 288 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 288 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2016
- **File**: `DELF2016/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2016 A.RDB, 2016 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2017
- **File**: `DELF2017/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2017 A.RDB, 2017 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2018
- **File**: `DELF2018/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2018 A.RDB, 2018 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2019
- **File**: `DELF2019/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2019 A.RDB, 2019 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2020
- **File**: `DELF2020/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2020 A.RDB, 2020 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2021
- **File**: `DELF2021/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2021 A.RDB, 2021 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: UDAJE - 2022
- **File**: `DELF2022/UDAJE.000`
- **Record Length**: 290 (Target: 164)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2022 A.RDB, 2022 A.TTT
- **What can be determined**: The file exists and has 0 records of 290 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 290 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.

### BLOCKED: VYDAJE - 2008
- **File**: `DELF2008/VYDAJE.000`
- **Record Length**: 56 (Target: 61)
- **Record Count**: 0
- **Available Support Files**: None
- **Sources Examined**: PRINTER.TXT, JU.RDB, JU.TTT, 2008 A.RDB, 2008 A.TTT
- **What can be determined**: The file exists and has 0 records of 56 bytes each.
- **What cannot be determined**: The specific historical field layout, names, types, and internal offsets that sum to 56 bytes.
- **Why heuristic is dangerous**: Assuming fields were merely truncated at the end could lead to silent binary misalignment if a field in the middle was added, deleted, or changed size in later years.
