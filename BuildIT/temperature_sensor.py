#!/usr/bin/python
#!/root
import Adafruit_DHT as dht
import devices
h, t = dht.read_retry(dht.DHT22, devices.TEMP_SENSOR)
print('{0:0.1f}*C'.format(t))
