#!/usr/bin/python
#!/root
import devices
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
led_pin = devices.LED_LOBBY
GPIO.setwarnings(False)
GPIO.setup(led_pin, GPIO.OUT)
GPIO.output(led_pin, GPIO.LOW)  # Lights off
