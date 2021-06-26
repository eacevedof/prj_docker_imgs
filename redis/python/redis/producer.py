from datetime import datetime, timedelta
import os
import importlib.machinery
import uuid
import logging
logging.basicConfig(level=logging.INFO)

path_packages_dir="/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/__init__.py"
redis_module = importlib.machinery.SourceFileLoader("redis",path_packages_dir).load_module()

def run():
    pr = """
    =============
    PRODUCER
    =============
    """
    print(pr)
    objredis = redis_module.Redis(host=os.getenv("REDIS_SERVER"), port=os.getenv("REDIS_PORT"), db=0)
    for i in range(0,5):
        struuid = uuid.uuid1()
        key = f"id-{i}"
        ttl = i + 50
        now = datetime.now()
        strnow = now.strftime("%Y-$m-%d %H:%M:%S")
        enddate = (now + timedelta(seconds=ttl)).strftime("%H:%M:%S")
        value = f"some python value in string {strnow} - {enddate}"
        objredis.set(key, value)
        objredis.expire(key, ttl)
