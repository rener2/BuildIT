#!/usr/bin/python
#!/root
import time
import sys
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(4, GPIO.IN) 
print(GPIO.input(4))
