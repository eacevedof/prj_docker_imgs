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
    import importlib.machinery
    path_packages_dir="/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/redis/__init__.py"
    redis_module = importlib.machinery.SourceFileLoader("redis",path_packages_dir).load_module()
    return redis_module
