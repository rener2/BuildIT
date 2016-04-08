#!/usr/bin/python
#!/root
import time
import Adafruit_DHT as dht
import devices
humidity, temperature = dht.read_retry(dht.DHT22, devices.HUMIDITY_SENSOR)
if (humidity is not None & temperature is not None):
    print('{1:0.1f}'.format(temperature - 1, humidity))
