import sys
import struct

def analyze_t00(filename):
    with open(filename, 'rb') as f:
        data = f.read()

    print(f"File size: {len(data)}")
    print(f"Signature: {data[:4].hex()}")

if __name__ == '__main__':
    analyze_t00(sys.argv[1])
