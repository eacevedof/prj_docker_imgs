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

build-redis:
	docker-compose --env-file ./.env up -d --no-deps --force-recreate --build cont-redisdemo

start: ## start
	docker-compose start
	docker ps | grep redis

restart: ## restart the containers
	docker-compose stop
	docker-compose start
	docker ps | grep redis

restart-redis:
	docker restart cont-redisdemo

stop: ## stop containers
	docker-compose stop

logs-redis: ## Logs redis
	docker logs cont-redisdemo

ssh-redis: ## ssh's into redis
	docker exec -it --user root cont-redisdemo /bin/bash

net: ## network details
	docker network inspect redis-net

ps: ## docker ps
	clear
	docker ps | grep redis

consumer-php: ## consumer php
	php php/index.php c

producer-php: ## producer php
	php php/index.php p

