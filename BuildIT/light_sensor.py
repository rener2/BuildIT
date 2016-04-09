#!/usr/bin/python
#!/root
import smbus
import time
bus = smbus.SMBus(0)
address = 8x40
light = bus.read_byte_data(address, 1)
print light
