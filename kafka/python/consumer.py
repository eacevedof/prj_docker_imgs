from kafka import KafkaConsumer
from pprint import pprint
from json import loads
import logging
# logging.basicConfig(level=logging.INFO)
logging.basicConfig(level=logging.DEBUG)

LOCALHOST="127.0.0.1"
PORT="9092"
SOCKET="{}:{}".format(LOCALHOST,PORT)

consumer = KafkaConsumer(
    "test",
    #bootstrap_servers=[f"{LOCALHOST}:{PORT}"],
    bootstrap_servers=[SOCKET],
    auto_offset_reset="earliest",
    fetch_min_bytes=100,
    fetch_max_wait_ms=60000, # 1 min si la carga del mensaje no llega 100 bytes
    request_timeout_ms=70000,
     # enable_auto_commit=True,
     # group_id="test-consumer-group",
     # group_id=None,
     # fetch_max_wait_ms=0,
     # consumer_timeout_ms=10000,
     # value_deserializer=lambda x: loads(x.decode("utf-8"))
)

print("consumer.py\n")
for consumer_record in consumer:
    message = consumer_record.value
    pprint(message)
    #print("message received: {}".format(message))
