#the rfid reading script.

import serial

def tagRead():
    import serial
    try:
        serial= serial.Serial("/dev/ttyACM0", baudrate=9600)
        n=0
        serial.flushInput()
        serial.flushOutput()
        while True:
        	data=serial.readline()
                n=n+1
                if data[0:3]=="ISO" and n>3:
                    myString1=data.find('[')+1
                    myString2=data.find(',')
                    serial.flush()
                    serial.close()
                    return data[myString1:myString2]
    except Exception as e:
        return 0
        
