#!/usr/bin/python
#!/root
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
led_pin = 25
GPIO.setwarnings(False)
GPIO.setup(led_pin, GPIO.OUT) 
GPIO.output(led_pin, GPIO.HIGH)  ## Led on
