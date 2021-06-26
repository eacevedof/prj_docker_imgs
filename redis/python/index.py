import os, sys
from redis.config import get_filename
from dotenv import load_dotenv
load_dotenv("../.env")
os.environ["TZ"] = os.getenv("TIME_ZONE")

action = sys.argv[1] if 1<len(sys.argv) else ""

filename = get_filename(action)
if not filename:
    raise Exception(f"\nNo filename found for: ${action}\n")

filename = os.path.splitext(filename)[0]
path=f"redis.{filename}"

import importlib
imported = importlib.import_module(path)

if hasattr(imported, "run"):
    imported.run()
