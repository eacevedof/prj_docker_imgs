FROM sonarqube:community

RUN mkdir -p /app \
    && chmod -R +rwx /app \
    && mkdir /root/sh \
    && chmod +x /root/sh

COPY .bashrc /root/.bashrc
COPY index.sh /root/sh/index.sh

ENV PATH="${PATH}:/root/sh"

# WORKDIR /root/sh