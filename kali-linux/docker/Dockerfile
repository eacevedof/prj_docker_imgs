FROM kalilinux/kali-rolling

RUN apt-get update && \
    apt-get -y install --no-install-recommends && \
    apt-get -y install kali-linux-headless && \
    apt-get -y install iputils-ping && \
    curl \
    vim \
    nodejs \
    python3 \
    nmap

RUN mkdir -p /root/bash
RUN chmod -R +x /root/bash
WORKDIR /root/bash

# COPY ./.bashrc-kl /root/.bashrc-kl
# COPY ./.vimrc /root/.vimrc
