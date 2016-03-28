#!/usr/bin/python
#!/root
import Adafruit_DHT as dht
import devices
h, t = dht.read_retry(dht.DHT22, devices.HUMIDITY_SENSOR)
print('{1:0.1f}%'.format(h))
