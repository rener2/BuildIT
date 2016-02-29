#!/usr/bin/python
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
GPIO.setwarnings(False)
GPIO.setup(12, GPIO.OUT)   ## LED pin
PIR_PIN = 7
GPIO.setup(PIR_PIN, GPIO.IN)

try:
    while True:
        if GPIO.input(PIR_PIN) == 1:
            GPIO.output(12, GPIO.HIGH)
            time.sleep(1)
        elif GPIO.input(PIR_PIN) == 0:
            GPIO.output(12, GPIO.LOW)
            time.sleep(1)

except KeyboardInterrupt:
    GPIO.cleanup()


    
