FROM kalilinux/kali-rolling

RUN apt-get update && \
    apt -y upgrade && \
    apt -y autoremove;

#git y python
RUN apt-get install -y && \
    apt-get install -y git && \
    apt-get install -y python3 && \
    apt-get install -y python3-pip

RUN apt-get install -y && \
    apt-get install -y bettercap && \
    apt-get install -y metasploit-framework

RUN apt install hydra -y && \
    apt install nmap -y && \
    apt install aircrack-ng -y && \
    apt install crackmapexec -y && \
    apt install wfuzz -y && \
    apt install gobuster -y && \
    apt install john -y && \
    apt install crunch -y && \
    apt install netcat-traditional -y && \
    apt install hping3 -y

RUN apt install python3-impacket -y && \
    apt install arp-scan -y && \
    apt install impacket-scripts -y && \
    apt install airgeddon -y && \
    apt install set -y

RUN apt install net-tools -y && \
		apt install iputils-ping -y
# RUN mkdir -p /root/bash
# RUN chmod -R +x /root/bash
# WORKDIR /root/bash

# COPY ./.bashrc-kl /root/.bashrc-kl
# COPY ./.vimrc /root/.vimrc
