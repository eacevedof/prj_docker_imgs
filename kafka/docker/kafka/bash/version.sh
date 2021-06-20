#!/bin/bash

find /opt/ -name \*kafka_\* | head -1 | grep -o '\kafka[^\n]*'

