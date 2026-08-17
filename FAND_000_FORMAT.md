# FAND .000 Format

## Header
- Bytes 0-3: Total number of records (32-bit little-endian integer).
- Bytes 4-5: Record length (16-bit little-endian integer).
- Data starts exactly at offset 6.

## Record Structure
- Fixed length.
- If the table has an `.x00` index, Byte 0 of each record is a Deleted flag (0x00 = active). If no index, this byte does not exist.

## Field Types
- `D` (Date) / `F` (Float): 6 bytes, Real48 Turbo Pascal format. Dates are days since 0001-01-01.
- `A,N` (String): Fixed N bytes. Space padded. If `!` is in the schema (e.g. `A,25!`), the string is encrypted via XOR 0xAA.
- `B` (Boolean): 1 byte (0/1).
- `T` (Text): 4 bytes, integer byte offset in the corresponding `.t00` file.
