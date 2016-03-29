#!/usr/bin/python
#!/root
import time
import Adafruit_DHT as dht
humidity, temperature = dht.read_retry(dht.DHT22, 4)
print('{1:0.1f}'.format(temperature - 1, humidity))
