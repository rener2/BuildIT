#!/usr/bin/python
#!/root
import RPi.GPIO as GPIO
import time
import devices
GPIO.setmode(GPIO.BCM)
STEPPER_WINDOW_ENABLE = devices.STEPPER_WINDOW_ENABLE
STEPPER_WINDOW_STEP = devices.STEPPER_WINDOW_STEP
STEPPER_WINDOW_DIR = devices.STEPPER_WINDOW_DIR
GPIO.setup(STEPPER_WINDOW_ENABLE, GPIO.OUT)  # Enable
GPIO.setup(STEPPER_WINDOW_STEP, GPIO.OUT)  # Step pin
GPIO.setup(STEPPER_WINDOW_DIR, GPIO.OUT)  # Direction pin

num_steps = 45000  # number of steps

GPIO.output(STEPPER_WINDOW_ENABLE, GPIO.LOW)
GPIO.output(STEPPER_WINDOW_DIR, GPIO.LOW)
while num_steps > 0:
    GPIO.output(STEPPER_WINDOW_STEP, GPIO.HIGH)
    time.sleep(0.0001)
    GPIO.output(STEPPER_WINDOW_STEP, GPIO.LOW)
    num_steps -= 1

GPIO.output(STEPPER_WINDOW_ENABLE, GPIO.HIGH)
