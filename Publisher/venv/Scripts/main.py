import random
from datetime import datetime
import time
import paho.mqtt.client as mqtt

client = mqtt.Client()
client.connect("192.168.32.134")

for x in range(10):
    temp = random.randint(20, 40)
    hum = random.randint(10, 90)
    timestamp = datetime.now().strftime("%m/%d/%Y-%H:%M:%S")
    message = str(temp) + "," + str(hum) + "," + timestamp
    print(temp, hum, timestamp)
    client.publish("/data", message)
    print("published!")
    time.sleep(5)
