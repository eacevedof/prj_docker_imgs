def get_filename(arg: str = "c") -> str:
    if not arg:
        arg = ""

    values = {
        "": "consumer.php",
        "c": "consumer.php",
        "p": "producer.php"
    }

    return values.get(arg, "")

def get_redis():
    import os
    import importlib.machinery
    #PYTHONPATH=/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages
    #path_redis_init="/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/__init__.py"
    path_redis_init = os.getenv("PYTHONPATH") + "/redis/__init__.py"
    #print(path_redis_init)
    redis_module = importlib.machinery.SourceFileLoader("redis",path_redis_init).load_module()
    return redis_module
