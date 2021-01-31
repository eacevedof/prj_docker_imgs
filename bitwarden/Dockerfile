FROM ubuntu:18.04

RUN apt-get update && \
    apt-get -y install --no-install-recommends

RUN chmod +x /app/bash/entrypoint.sh

WORKDIR /app