import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)
GPIO.setup(16, GPIO.OUT) #Enable
GPIO.setup(20, GPIO.OUT) #Step pin
GPIO.setup(21, GPIO.OUT) #Direction pin

num_steps = 20000 #number of steps

GPIO.output(16, GPIO.LOW)
GPIO.output(21, GPIO.HIGH)
while num_steps > 0:
    GPIO.output(20, GPIO.HIGH)
    time.sleep(0.0001)
    GPIO.output(20, GPIO.LOW)
    num_steps -= 1

GPIO.output(16, GPIO.HIGH)


#Stepper motor is enabled, when value is 0
