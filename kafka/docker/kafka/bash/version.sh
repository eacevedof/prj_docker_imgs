#!/bin/bash

cat find ./libs/ -name \*kafka_\* | head -1 | grep -o '\kafka[^\n]*'
