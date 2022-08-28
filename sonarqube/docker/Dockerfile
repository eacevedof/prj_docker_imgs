FROM alpine:latest

RUN apk update \
    && apk upgrade \
    && apk add bash

ENV PATH="${PATH}:/bin/bash:/app"

RUN mkdir -p /app \
    && chmod -R +rwx /app

RUN cd /app \
    # && wget -c https://github.com/SonarSource/sonarqube/archive/refs/tags/9.6.0.59041.zip -O sonarqube.zip \
    && wget https://binaries.sonarsource.com/Distribution/sonarqube/sonarqube-9.6.0.59041.zip \
    && unzip sonarqube-9.6.0.59041.zip \
    && mv sonarqube-9.6.0.59041 sonarqube

RUN apk add openjdk11 \
    && rm -rf /var/cache/apk/*

COPY .bashrc /app/.bashrc
COPY run-web.sh /app/run-web.sh

WORKDIR /app
ENTRYPOINT ["tail", "-f", "/dev/null"]