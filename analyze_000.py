import sys
import struct
from datetime import datetime, timedelta

def get_real48(b):
    if len(b) < 6: return 0.0
    if b == b'\x00'*6: return 0.0
    exponent = b[0]
    if exponent == 0: return 0.0
    mantissa = 0
    for i in range(1, 6): mantissa = (mantissa << 8) | b[6-i]
    sign = (mantissa >> 39) & 1
    mantissa_val = mantissa & 0x7FFFFFFFFF
    exp = exponent - 129
    mant_float = 1.0 + (mantissa_val / (2.0 ** 39))
    val = (2.0 ** exp) * mant_float
    if sign: val = -val
    return val

def analyze(filename):
    with open(filename, 'rb') as f:
        data = f.read()
    num_recs = struct.unpack('<I', data[0:4])[0]
    rec_len = struct.unpack('<H', data[4:6])[0]
    print(f"File: {filename}")
    print(f"Num Records (Header): {num_recs}, Record Length (Header): {rec_len}")

if __name__ == '__main__':
    analyze(sys.argv[1])
