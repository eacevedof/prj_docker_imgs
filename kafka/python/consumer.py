from kafka import KafkaConsumer
import logging
logging.basicConfig(level=logging.INFO)
#logging.basicConfig(level=logging.DEBUG)

LOCALHOST="127.0.0.1"
PORT="9092"

consumer = KafkaConsumer(
    "test",
     bootstrap_servers=[f"{LOCALHOST}:{PORT}"],
     auto_offset_reset="earliest",
     fetch_min_bytes=10
     # enable_auto_commit=True,
     # group_id="test-consumer-group",
     # group_id=None,
     # fetch_max_wait_ms=0,
     # consumer_timeout_ms=10000,
     # value_deserializer=lambda x: loads(x.decode("utf-8"))
)

print("consumer.py\n")
for message in consumer:
    message = message.value.decode("utf-8")
    print("message received: {}".format(message))