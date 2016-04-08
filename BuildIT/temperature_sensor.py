#!/usr/bin/python
#!/root
import time
import RPi.GPIO as GPIO
import Adafruit_DHT as dht
import devices
GPIO.setmode(GPIO.BCM)
#GPIO.cleanup()
GPIO.setwarnings(False)
GPIO.setup(4, GPIO.IN)
h,t = dht.read_retry(dht.DHT22, devices.HUMIDITY_SENSOR)
if (t is not None):
    print('{0:0.1f}'.format(t))
