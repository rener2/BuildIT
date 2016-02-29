#!/home/pi
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
GPIO.setwarnings(False)
GPIO.setup(17, GPIO.OUT) 
GPIO.output(17, GPIO.LOW)  
        
