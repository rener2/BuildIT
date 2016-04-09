#!/usr/bin/python
#!/root
import RPi.GPIO as GPIO
import devices
GPIO.setmode(GPIO.BCM)
peltier_pin = devices.PELTIER
GPIO.setwarnings(False)
GPIO.setup(peltier_pin, GPIO.OUT)
GPIO.output(peltier_pin, GPIO.HIGH)  # heating on
