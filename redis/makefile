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
	docker-compose -f docker-compose.yml --env-file ./.env up -d --build --remove-orphans
	make ps

build-zookeeper:
	docker-compose --env-file ./.env up -d --no-deps --force-recreate --build redis_zookeeper_1

build-redis:
	docker-compose --env-file ./.env up -d --no-deps --force-recreate --build redis_redis_1

start: ## start
	docker-compose start
	docker ps | grep redis

restart: ## restart the containers
	docker-compose stop
	docker-compose start
	docker ps | grep redis

restart-redis:
	docker restart redis_redis_1

stop: ## stop containers
	docker-compose stop

logs-redis: ## Logs redis
	docker logs redis_redis_1

ssh-redis: ## ssh's into redis
	docker exec -it --user root redis_redis_1 /bin/bash

net: ## network details
	docker network inspect redis_zookeeper-net

ps: ## docker ps
	clear
	docker ps | grep redis

consumer-php: ## consumer php
	php php/index.php c

producer-php: ## producer php
	php php/index.php p

