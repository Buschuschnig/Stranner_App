import mysql.connector
import paho.mqtt.client as mqtt
from datetime import datetime

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="mqtt-project"
)

def on_connect(client, userdata, flags, rc):
  client.subscribe('/data')
  topic = "/data"
  print("subscribed to: " + topic)

def on_message(client, userdata, message):
  msg = str(message.payload.decode("utf-8"))
  print("message received: ", msg)
  print("message topic: ", message.topic)
  msg1 = msg.split(",")
  temperature = msg1[0]
  humidity = msg1[1]
  time = msg1[2]
  print(temperature)
  print(humidity)
  print(time)
  mycursor = mydb.cursor()
  sql = "INSERT INTO data (temperature, humidity, time) VALUES (%s, %s, %s)"
  val = (temperature, humidity, time)
  mycursor.execute(sql, val)
  mydb.commit()
  print(mycursor.rowcount, "record inserted")


time = datetime.now()


BROKER_ADRESS = "192.168.32.134"
client = mqtt.Client()
client.on_connect = on_connect
client.on_message = on_message
client.connect(BROKER_ADRESS)
print("Connected to MQTT Broker: " + BROKER_ADRESS)
client.loop_forever()



