import os
from .config import get_redis

def run():
    pr = """
    =============
    CONSUMER
    =============
    """
    print(pr)
    objredis = get_redis().Redis(host=os.getenv("REDIS_SERVER"), port=os.getenv("REDIS_PORT"), db=0)
    all = objredis.keys("*")
    for key in all:
        value = objredis.get(key).decode("utf-8") if objredis.get(key) else ""
        print(f"key: {value}")

    length = len(all)
    print(f"total in consumer: {length}")
