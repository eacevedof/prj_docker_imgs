FROM alpine:latest

RUN apk update \
    && apk upgrade \
    && apk add bash

ENV PATH="${PATH}:/bin/bash"

RUN mkdir -p /root/bash
RUN chmod -R +x /root/bash
WORKDIR /root/bash

COPY ./.bashrc /root/.bashrc

ENTRYPOINT ["tail", "-f", "/dev/null"]