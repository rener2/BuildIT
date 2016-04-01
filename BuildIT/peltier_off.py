#!/usr/bin/python
#!/root
import RPi.GPIO as GPIO
import devices
GPIO.setmode(GPIO.BCM)
peltier_pin = devices.PELTIER
GPIO.setwarnings(False)
GPIO.setup(led_pin, GPIO.OUT)
GPIO.output(led_pin, GPIO.LOW)  # heating off
