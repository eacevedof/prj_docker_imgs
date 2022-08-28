FROM alpine:latest

RUN mkdir -p /root/bash
RUN chmod -R +x /root/bash
WORKDIR /root/bash

COPY ./.bashrc /root/.bashrc

ENTRYPOINT ["tail", "-f", "/dev/null"]