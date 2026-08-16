# FAND language identification

## Identified Constructs

- **Field Definitions**: Syntax is `Name : Type,Length,Decimals;`. Example: `SC : F,3,0;` (FACT).
- **Data Types**: `F` (Float/Numeric), `A` (Alphanumeric/String), `D` (Date), `B` (Boolean), `T` (Text/Memo) (FACT).
- **Assignments / Calculations**: Prefixed with `#C` followed by `:=`. Example: `#C rok_s := strdate(rok,'YYYY')` (FACT).
- **Conditions**: Uses `cond()` function. Example: `cond(condition : true_value, else : false_value)` (FACT).
- **Custom Functions**: Syntax `function Name(Args): Type;`. Example: `function Slovom(Cislo: real; Rod: real): string;` (FACT).
- **Form Layouts**: `#K` for screen coordinates, `@` for input fields (FACT).
- **Block structure (UNKNOWN)**: The exact markers identifying the start and end of a FAND table (`#F`), procedure, or form block are not explicitly identifiable as plain text delimiters in the `.TTT` file, requiring binary offset maps from the `.RDB`.

## Migration relevance

This inventory maps out the scope of the legacy MS-DOS application. Because the exact business logic and table schemas are locked behind PC FAND's binary pointer format, a specialized PC FAND decompiler is necessary to extract the final `CREATE TABLE` and raw procedural logic to accurately write CodeIgniter 4 controllers and MariaDB schemas. What is documented here provides the architectural blueprint of what objects exist and their inferred purposes.
