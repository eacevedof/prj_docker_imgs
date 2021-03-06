#!/bin/bash
help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

ip:
	ipconfig getifaddr en0

destroy: ## destroy all container
	docker-compose -f docker-compose.yml down

rebuild: ## rebuild containers
	docker-compose -f docker-compose.yml down
	docker-compose -f docker-compose.yml --env-file ./docker/.env up -d --build --remove-orphans
	make ps

build-zookeeper:
	docker-compose --env-file ./docker/.env up -d --no-deps --force-recreate --build kafka_zookeeper_1

build-kafka:
	docker-compose --env-file ./docker/.env up -d --no-deps --force-recreate --build kafka_kafka_1

start: ## start
	docker-compose start
	docker ps | grep kafka

restart: ## restart the containers
	docker-compose stop
	docker-compose start
	docker ps | grep kafka

restart-kafka:
	docker restart kafka_kafka_1

restart-zookeeper:
	docker restart kafka_zookeeper_1

stop: ## stop containers
	docker-compose stop

logs-kafka: ## Logs kafka
	docker logs kafka_kafka_1

logs-zookeeper: ## Logs zookeeper
	docker logs kafka_zookeeper_1

ssh-zookeeper: ## ssh's into zookeeper
	docker exec -it --user root kafka_zookeeper_1 /bin/bash

ssh-kafka: ## ssh's into kafka
	docker exec -it --user root kafka_kafka_1 /bin/bash

net: ## network details
	docker network inspect kafka_zookeeper-net

ps: ## docker ps
	clear
	docker ps | grep kafka

consumer-php: ## consumer php
	php php/index.php c

producer-php: ## producer php
	php php/index.php p

consumer-py: ## consumer python
	python python/consumer.py

producer-py: ## producer python
	python python/producer.py
