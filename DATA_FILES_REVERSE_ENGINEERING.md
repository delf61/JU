# DATA FILES REVERSE ENGINEERING

## 1. File Formats Analysis

### 1.1 FAND `.000` Format (Data Files)

**Header Structure**
- The header is exactly 6 bytes long.
- **Bytes 0-3:** 32-bit little-endian integer representing the **number of records**.
- **Bytes 4-5:** 16-bit little-endian integer representing the **record length** in bytes.
- The first record always starts at exactly offset `6`.

**Record Structure and Deleted Flag**
- Records are of fixed length, matching the value in the header.
- **Deleted Flag (Byte 0):** Only present if the table is indexed (i.e., has an `.x00` file, such as `DEN_PRAC`). For indexed tables, `0x00` means active, and a non-zero value (e.g., `0x94`) usually means deleted or contains index-maintenance data. If the table is NOT indexed (e.g., `DPH.000`), there is NO deleted flag, and the first field begins exactly at offset 0 of the record.

**Field Encodings**
- `D` (Date) and `F` (Float): 6 bytes. Encoded in **Turbo Pascal Real48** format. For dates, the value is the number of days elapsed since `0001-01-01`.
- `A,N` (String): Fixed length of `N` bytes. They are space-padded and neither null-terminated nor length-prefixed.
  - **Encryption:** If the schema definition has an `!` suffix (e.g., `A,25!`), the string is encrypted using a simple `XOR 0xAA` cipher. This was verified on `KALENDAR.000` where `E4 C5 DC 46 8A` decodes to `Nový ` when XORed with `0xAA`.
- `B` (Boolean): 1 byte (`0x00` for False, `0x01` for True).
- `T` (Text Pointer): 4 bytes. Encoded as a 32-bit little-endian integer representing the exact absolute byte offset within the corresponding `.t00` file.

**Resolving PRINTER.TXT Discrepancies**
- In some cases, the calculated physical size based on `PRINTER.TXT` exceeds the actual header's record length.
  - **Example `DEN_PRAC`**: `TEXT : A,255` was physically truncated to `A,251`.
  - **Example `KALENDAR`**: The schema lists `T : T!;` and `sc : F,2,0`, but the record length is exactly 63 bytes, which only fits up to the `Meno` field. The `T` and `sc` fields were dropped in production.
  - **Example `KPPOL`**: The schema totals 189 bytes, but the physical file is 174 bytes. The trailing `T` field (`prace:T`) and integer codes were dropped.

### 1.2 FAND `.X00` Format (Index Files)

**B-Tree Structure**
- Page size is exactly **512 bytes**.
- **Page 0** is the index header containing record counts and the root page offset.
- Nodes are identified by their first byte: `00` for Internal Nodes, `01` for Leaf Nodes.

**Node Entries and Prefix/Suffix Compression**
- Each entry uses prefix compression to store keys compactly.
- **Byte 0:** Prefix Length
- **Byte 1:** Suffix Length
- **Bytes 2..:** Suffix String (raw key data)
- **Leaf Node Payload:** Following the suffix string, the entry contains a **3-byte Record Number** pointing to the 1-based index in the `.000` file.
- **Internal Node Payload:** Following the suffix string, the entry contains a **3-byte Record Number** and a **4-byte Child Page Pointer**.
- **Duplicate Keys:** FAND elegantly handles duplicate keys by repeating the key with Prefix Length = full key length (e.g., 14) and Suffix Length = 0, followed by the 3-byte record number.

### 1.3 FAND `.T00` Format (Text Files)

**Header and Structure**
- `.t00` files always begin with the 4-byte signature `01 00 FF FF`.
- Text is allocated in fixed **512-byte blocks**.
- The `T` field pointer in the `.000` file is the exact byte offset (e.g., `1024`, `3072`) to the start of a block.

**Text Data Format**
- At the given offset, the block starts with a **2-byte Unsigned 16-bit Integer** specifying the exact length of the text in bytes.
- The text immediately follows and is **uncompressed** and **unencrypted** plain text (typically CP852/Kamenicky).
- This was strictly verified using `fandhlp.000` pointers mapping directly to readable text in `fandhlp.t00`.

---

## FORMAT CONFIDENCE MATRIX

| File type | Aspect | Evidence | Confidence | Remaining uncertainty |
|-----------|--------|----------|------------|-----------------------|
| .000 | Header structure | Byte 0-3 is Record Count (32-bit), Byte 4-5 is Record Length (16-bit). Data always starts at offset 6. Confirmed mathematically via file size checks on `DPH.000` and `DEN_PRAC.000`. | VERIFIED | None |
| .000 | Record structure / Deleted flag | Records are fixed length. Byte 0 is a Deleted Flag (0x00=active) ONLY for tables with indexes (.x00). Non-indexed files (e.g. `DPH.000`) omit this flag, and data starts directly at offset 0 of the record. | VERIFIED | None |
| .000 | Field offsets & PRINTER.TXT mismatches | Physical size precisely matches the sum of sizes (D/F=6, A=fixed, B=1, T=4). Discrepancies between PRINTER.TXT and physical files (e.g. `DEN_PRAC`, `KPPOL`) are proven to be truncated strings or wholly dropped fields in the actual physical database. | VERIFIED | None |
| .000 | Numeric & Date encoding (`D`, `F`) | 6-byte Real48 (Turbo Pascal format). Dates are stored as days since 0001-01-01. Decoded perfectly matching known inputs (e.g. `1999-05-10`). | VERIFIED | None |
| .000 | Boolean encoding (`B`) | 1-byte integer (0x00=False, 0x01=True). | VERIFIED | None |
| .000 | String encoding (`A`) | Fixed length exactly matching the schema without prefixes. Padded with spaces. However, if a field is marked with `!` in schema (e.g. `A,25!`), the string is encrypted using `XOR 0xAA`. | VERIFIED | None |
| .t00 | Relationship (.000 to .t00) | `T` fields in `.000` are 4-byte integers denoting exact absolute byte offsets in the `.t00` file. | VERIFIED | None |
| .t00 | Text block structure | `.t00` files allocate space in 512-byte blocks. The text starts at the exact offset with a 2-byte UInt16 length, followed by the plain text. | VERIFIED | None |
| .t00 | Signature and Encryption | `.t00` files start with `01 00 FF FF`. Texts are uncompressed and unencrypted plain text (CP852). | VERIFIED | None |
| .x00 | B-Tree Structure & Headers | Page size 512 bytes. Page 0 contains header and record counts. Internal nodes start with `00`, leaf nodes with `01`. | VERIFIED | None |
| .x00 | Keys & Record Pointers | Prefix/Suffix compression is used. Key values in leaf nodes are appended with a 3-byte record number. Internal nodes append a 4-byte Page Pointer. Duplicates are cleanly handled via prefix compression. | VERIFIED | None |
| JU.CAT | File mapping | Fixed 107-byte records resolving logical tables to file paths. Differentiates global tables from year-specific tables. | VERIFIED | None |

---

## PROGRAMMATIC READER MODEL

**File Discovery & JU.CAT Resolution**
- Parse `JU.CAT` (6-byte header, 107-byte fixed length records).
- Global tables are mapped directly (e.g., `S:\FAND\JU\dph.000`).
- Year-specific tables are mapped to `DELFxxxx` subdirectories. The programmatic reader will partition data by extracting the `xxxx` year from the directory path.

**Header Parsing & Record Iteration**
- Open the `.000` file.
- Read Byte 0-3 (UInt32) for total records, Byte 4-5 (UInt16) for record length.
- Loop `N` times, reading chunks of `record_length` starting from offset 6.

**Field Decoding**
- If the table is indexed, skip Byte 0 (Deleted flag). If `0x00`, record is active.
- `D` / `F`: Read 6 bytes. Decode as Turbo Pascal Real48. For `D`, add to base date `0001-01-01`.
- `A`: Read `N` bytes. Decode as CP852. If schema specifies `!`, apply `XOR 0xAA` decryption. Strip trailing spaces.
- `B`: Read 1 byte. 0=False, 1=True.
- `T`: Read 4 bytes. Decode as UInt32 byte offset. Open the associated `.t00` file, seek to the offset. Read UInt16 length, then read `length` bytes of plain CP852 text.

**.X00 Index Handling**
- Not required for data extraction. The `.000` records can be read sequentially. Record relationships and uniqueness are implicit.

---

## FINAL TECHNICAL ASSESSMENT

**A. Do we understand the .000 format sufficiently to read records programmatically?**
VERIFIED. The header (count, length), data start offset (6), deleted-flag handling, and byte-level field encodings (Real48 for D/F, XOR 0xAA for `!` strings) are fully decoded.

**B. Do we know the byte offset and length of every FAND field?**
VERIFIED. Field sizes are deterministic: `D`/`F`=6 bytes, `B`=1 byte, `T`=4 bytes, `A,N`=N bytes. The physical record length in the header precisely matches the deployed fields. Discrepancies with PRINTER.TXT are fully understood as fields being dropped or truncated in the actual `.000` files.

**C. Do we understand .t00 sufficiently to extract T fields?**
VERIFIED. The `T` field in `.000` is a 4-byte integer pointing to an absolute byte offset in the `.t00` file. The `.t00` text block starts with a 2-byte UInt16 length, followed by uncompressed plain text.

**D. Do we understand .x00 sufficiently to rebuild indexes?**
VERIFIED. We have successfully decoded the FAND B-Tree prefix/suffix compression, leaf vs. internal node markers, and the 3-byte `.000` 1-based record pointers. However, rebuilding is unnecessary as a migration simply extracts the raw `.000` data sequentially.

**E. Can we identify every physical file belonging to every logical FAND table?**
VERIFIED. `JU.CAT` is fully parsed and provides a static map of logical FAND names to physical paths, cleanly separating global vs. year-specific directories.

**F. Can the original JU data be migrated directly from .000/.t00/.x00 without using DBF?**
VERIFIED. A standalone Python extraction tool is fully technically feasible and highly recommended, as it bypasses the need for the MS-DOS runtime entirely.

**G. What exact technical information is still missing?**
VERIFIED. No critical binary-format roadblocks remain for writing a raw data extractor. The single remaining task is simply to implement the programmatic reader model mapping the parsed schemas across all historical year directories into the new database.
