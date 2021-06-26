from time import sleep
from json import dumps
from redis import RedisProducer

producer = RedisProducer(bootstrap_servers=["localhost:9092"],
                         value_serializer=lambda x: 
                         dumps(x).encode("utf-8"))

for e in range(50):
    #data = {"number" : e}
    data = e
    producer.send("test", value=data)
    sleep(5)
