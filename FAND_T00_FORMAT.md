# FAND .T00 Format

## Global Signature
- The file always starts with `01 00 FF FF`.

## Text Blocks
- Text is allocated in 512-byte blocks.
- Pointers from the `.000` file `T` fields contain the exact byte offset into the `.t00` file (e.g., 1024, 3072).
- At that offset, the first 2 bytes are an Unsigned 16-bit Integer specifying the text length.
- The text immediately follows and is uncompressed/unencrypted plain text (usually CP852 encoded).
