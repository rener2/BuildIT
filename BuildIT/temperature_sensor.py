#!/usr/bin/python
#!/root
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.cleanup()
GPIO.setwarnings(False)
GPIO.setup(4, GPIO.IN)
import Adafruit_DHT as dht
h,t = dht.read_retry(dht.DHT22, 4)
print('{0:0.1f}'.format(t))
