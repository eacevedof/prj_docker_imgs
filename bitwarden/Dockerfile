FROM ubuntu:18.04

RUN apt-get update && \
    apt-get -y install --no-install-recommends \
    curl

COPY ./.bashrc /root/
COPY ./entrypoint.sh /usr/src/entrypoint.sh
RUN chmod +x /usr/src/entrypoint.sh

WORKDIR /app