#!/usr/bin/python
#!/root
import RPi.GPIO as GPIO
import time
import devices
GPIO.setmode(GPIO.BCM)
STEPPER_DOOR_ENABLE = devices.STEPPER_DOOR_ENABLE  # entity_id stepper_door
STEPPER_DOOR_STEP = devices.STEPPER_DOOR_STEP
STEPPER_DOOR_DIR = devices.STEPPER_DOOR_DIR
GPIO.setup(STEPPER_DOOR_ENABLE, GPIO.OUT)  # Enable
GPIO.setup(STEPPER_DOOR_STEP, GPIO.OUT)  # Step pin
GPIO.setup(STEPPER_DOOR_DIR, GPIO.OUT)  # Direction pin

num_steps = 20000  # number of steps

GPIO.output(STEPPER_DOOR_ENABLE, GPIO.LOW)
GPIO.output(STEPPER_DOOR_DIR, GPIO.HIGH)
while num_steps > 0:
    GPIO.output(STEPPER_DOOR_STEP, GPIO.HIGH)
    time.sleep(0.0001)
    GPIO.output(STEPPER_DOOR_STEP, GPIO.LOW)
    num_steps -= 1

GPIO.output(STEPPER_DOOR_ENABLE, GPIO.HIGH)
