#!/bin/bash


cd /root/.homeassistant/
python katse.py &
echo "RFID scan scripts initialized.." 

cd /root/.homeassistant/
python rewriteConfiguration.py &
echo "Started rewriting configuration file every 1 second"

cd /root/.homeassistant/
sudo hass --open-ui &
echo "Home assistant started" 



exit 0
