#!/usr/bin/python
#!/root
"""Important note!!!
This script is not used in this project, but demonstrates
how to read PIR input from RaspBerry
"""
import time
import sys
import RPi.GPIO as GPIO
import devices
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(devices.PIR_LOBBY, GPIO.IN)
while(True):
    GPIO.setmode(GPIO.BCM)
    GPIO.setwarnings(False)
    GPIO.setup(devices.PIR_LOBBY, GPIO.IN)
    print(GPIO.input(devices.PIR_LOBBY))
    time.sleep(1)
