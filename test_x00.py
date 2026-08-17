import sys
import struct

def read_uint24(b):
    return b[0] | (b[1] << 8) | (b[2] << 16)

def demonstrate_x00():
    x00_path = 'JU_DATA_ORIGINAL/DELF2025/DEN_PRAC.X00'
    print(f"Demonstrating index parsing for {x00_path}")
    with open(x00_path, 'rb') as f:
        data = f.read()

    # The header is Page 0. Internal nodes start with 00, leaf nodes start with 01.
    # We will find the first leaf node and parse its entries.
    page_size = 512
    num_pages = len(data) // page_size

    for i in range(1, num_pages):
        page = data[i*page_size : (i+1)*page_size]
        if page[0] == 0x01: # Leaf Node!
            print(f"Found Leaf Node at Page {i}")

            offset = 10 # Header is 10 bytes
            key = bytearray(256)
            print("First 3 index entries:")
            for j in range(3):
                pref = page[offset]
                suff = page[offset+1]
                offset += 2

                suffix = page[offset : offset+suff]
                offset += suff

                key[pref:pref+suff] = suffix
                actual_key = key[:pref+suff]

                rec_num = read_uint24(page[offset:offset+3])
                offset += 3

                print(f"  Entry {j}: Key={actual_key.hex()} -> .000 Record Index={rec_num}")
            break

if __name__ == '__main__':
    demonstrate_x00()
