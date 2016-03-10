#!/usr/bin/python
#!/root
import Adafruit_DHT as dht
h,t = dht.read_retry(dht.DHT22, 4)
print('{0:0.1f}*C'.format(t))