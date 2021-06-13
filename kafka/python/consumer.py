from kafka import KafkaConsumer
from json import loads
import logging
logging.basicConfig(level=logging.INFO)

consumer = KafkaConsumer(
    "test",
     bootstrap_servers=["localhost:9092"],
     auto_offset_reset="earliest",
     #enable_auto_commit=True,
     #group_id="test-consumer-group",
     group_id=None,
     fetch_max_wait_ms=0,
     value_deserializer=lambda x: loads(x.decode("utf-8"))
)

print("consumer.py\n")
for message in consumer:
    print("message:\n")
    message = message.value
    #collection.insert_one(message)
    print("{} added to {}".format(message))
