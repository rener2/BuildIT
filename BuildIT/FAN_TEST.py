import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
FAN_PIN = 12
GPIO.setup(FAN_PIN, GPIO.OUT)
a = 5
while a > 0:
    GPIO.output(FAN_PIN, True)
    time.sleep(1)

GPIO.output(FAN_PIN, False)
