# Corrections from PRINTER.TXT Analysis

The existing context (stored in memory from previous task execution) made several inferred conclusions based on raw inspection of `JU.RDB` and `JU.TTT`. These prior files are now considered flawed due to the FAND system's proprietary paging/pointer algorithms, which cannot be reliably read linearly.

The FAND-generated `PRINTER.TXT` is the authoritative source. Below are corrections to previous assumptions:

## 1. Table Definitions
**Previous Conclusion:** Guessed the table definitions and field offsets by attempting to read FAND `.TTT` definition blocks linearly and match them with RDB headers.
**Evidence from PRINTER.TXT:** `PRINTER.TXT` provides exactly the parsed definitions (e.g. `Kod : A,1; d : A,20; v : B;`) within the structural markers (`0x11 F <name> 0x11`).
**Corrected Conclusion:** Table definitions do not need to be reverse-engineered from `.TTT` byte offsets. They are directly extracted from the parsed syntax in `PRINTER.TXT`.

## 2. Object Naming Conventions
**Previous Conclusion:** Objects were mapped manually based on naming conventions (`F*`, `Ee*`, `Pp*`, `Mm*`), assuming strict correlation to file structure or prefixes within the binary.
**Evidence from PRINTER.TXT:** `PRINTER.TXT` explicitly tags the objects using a one-letter type identifier (`F`, `P`, `E`, `M`, `D`, `R`, etc.) inside the `0x11` markers (e.g., `\x11 P pPrijem \x11`).
**Corrected Conclusion:** Objects are defined by their FAND export type in `PRINTER.TXT`, not just their name prefix.

## 3. Relationships and Links
**Previous Conclusion:** Relationships were inferred from naming conventions (e.g. assuming `FPD` linked to `PD` just based on name similarity) or assumed via generic metadata parsing.
**Evidence from PRINTER.TXT:** Explicit code syntax defines relationships, such as `edit(PARAM, ePrijem)` in a procedure (linking parameter table to a form), or `#I1_ help` in a MERGE object (linking input to the `help` table).
**Corrected Conclusion:** Relationships must be explicitly mapped by parsing `edit()`, `call()`, `#I`, `#O`, and similar keywords from the parsed logic in `PRINTER.TXT`.

## 4. Application Logic
**Previous Conclusion:** Many accounting rules were inferred from table names alone.
**Evidence from PRINTER.TXT:** Actual logic like `DrHaNM := cond(I1.vydaj ='5' : I1.a2 + I1.a4);` exists inside `M*` MERGE objects.
**Corrected Conclusion:** Accounting logic can be directly reconstructed from the source expressions instead of inferred from table names.
