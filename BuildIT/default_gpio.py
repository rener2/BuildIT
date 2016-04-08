#!/usr/bin/python
#!/root

import RPi.GPIO as GPIO
import devices

# Initiali GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
#GPIO.cleanup()

# Set pin names
led_kitchen = devices.LED_KITCHEN

# Initialize pin direction
GPIO.setup(led_kitchen, GPIO.OUT)

# Set pin status
GPIO.output(led_kitchen, GPIO.LOW)  # Led on

