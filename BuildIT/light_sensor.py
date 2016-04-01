import smbus
import time
bus = smbus.SMBus(0)
address = 0x70
light = bus.read_byte_data(address, 1)
print light
