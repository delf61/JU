# Accounting/Business logic

## 1. Core Logic Rules Identified in Source

- **FACT**: The source contains a function `Slovom(Cislo: real; Rod: real): string;` which converts numeric amounts into Slovak text strings. This is explicitly coded in `JU.TTT` (e.g., `s1: string='jednosto'; s2: string='dvesto';`).
- **FACT**: Currency transition logic is present: `mena := cond(val(paramcat.rok_s) < 2009 : 'Sk ', else : 'Eur')`. This confirms the application handled the Slovak transition from SKK to EUR.
- **INFERRED**: The application uses `FPD` (Peňažný denník / Cashbook) as the central ledger, driven by procedures `PpPrijem` (Income) and `PpVydaj` (Expense).
- **UNKNOWN**: The exact mathematical formulas for calculating VAT (`DPH`) or inventory depreciation are embedded in unisolated FAND `#C` expressions and cannot be confidently attributed to specific procedures without structural offsets.

## Migration relevance

This inventory maps out the scope of the legacy MS-DOS application. Because the exact business logic and table schemas are locked behind PC FAND's binary pointer format, a specialized PC FAND decompiler is necessary to extract the final `CREATE TABLE` and raw procedural logic to accurately write CodeIgniter 4 controllers and MariaDB schemas. What is documented here provides the architectural blueprint of what objects exist and their inferred purposes.
