import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(16, GPIO.OUT) #Enable
GPIO.setup(20, GPIO.OUT) #Step pin
GPIO.setup(21, GPIO.OUT) #Direction pin


def SpinMotor(direction, num_steps):
	GPIO.output(16, 1)
    GPIO.output(21, direction)
    while num_steps > 0:
        GPIO.output(20, 1)
        time.sleep(0.001)
        num_steps -= 1
        
    GPIO.cleanup()
    return True

direction_input = raw_input("0 or C: ")
num_steps = input("num of steps: ")

if direction_input == "C":
    SpinMotor(0, num_steps)

else:
    SpinMotor(1, num_steps)


