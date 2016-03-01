#!/usr/bin/python
#!/root
import time
import sys
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)
GPIO.setup(4, GPIO.IN) 

while a < 200:
	print(GPIO.input(4))
	time.sleep(0.1)
	a += 1