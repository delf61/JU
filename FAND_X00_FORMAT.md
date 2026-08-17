# FAND .X00 Format

## B-Tree Structure
- 512-byte pages.
- Page 0 is the header (contains total record count, root page info).

## Nodes
- Internal Nodes start with `00`. Leaf Nodes start with `01`.
- Entries use Prefix/Suffix compression.
  - Byte 0: Prefix Length
  - Byte 1: Suffix Length
  - Bytes 2..: Suffix String Data
- Following the suffix data:
  - Leaf Nodes: 3-byte Record Number (1-based pointer to `.000` file).
  - Internal Nodes: 3-byte Record Number, followed by 4-byte Child Page Number.
- Duplicate keys are handled by setting Prefix Length to the full key length (e.g., 14) and Suffix Length to 0.
