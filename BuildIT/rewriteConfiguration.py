import time
while(True):
    with open("/var/www/html/configuration.yaml", "r") as f:
        newcontent = ""
        content = f.readlines()
        for line in content:
                newcontent += line
        f.close()
    
    with open("/root/.homeassistant/configuration.yaml", "w") as f:
        for line in newcontent:
            f.write(line)
        f.close()

    time.sleep(2)    