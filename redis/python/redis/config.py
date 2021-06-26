def get_filename(arg: str = "c") -> str:
    if not arg:
        arg = ""

    values = {
        "": "consumer.php",
        "c": "consumer.php",
        "p": "producer.php"
    }

    return values.get(arg, "")
