#!/usr/bin/python
#!/root
import time
import RPi.GPIO as GPIO
import devices
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
led_pin = devices.LED_CORNER
GPIO.setwarnings(False)
GPIO.setup(led_pin, GPIO.OUT)
GPIO.output(led_pin, GPIO.LOW)  # Lights off
