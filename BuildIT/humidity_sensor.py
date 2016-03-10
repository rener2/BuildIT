import Adafruit_DHT as dht
h,t = dht.read_retry(dht.DHT22, 4)
print('{1:0.1f}%'.format(h))