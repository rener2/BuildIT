#!/usr/bin/python
#!/root
import RPi.GPIO as GPIO
import devices

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
FAN_PIN = devices.FAN
GPIO.setup(FAN_PIN, GPIO.OUT)
GPIO.output(FAN_PIN, False)

