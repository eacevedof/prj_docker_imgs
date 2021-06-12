#!/bin/bash
help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

destroy: ## destroy all container
	docker-compose -f docker-compose.yml down

rebuild: ## rebuild containers
	docker-compose -f docker-compose.yml down
	docker-compose -f docker-compose.yml --env-file ./docker/.env up -d --build --remove-orphans

build-zookeeper:
	docker-compose --env-file ./docker/.env up -d --no-deps --force-recreate --build cont-zookeeper

build-kafka:
	docker-compose --env-file ./docker/.env up -d --no-deps --force-recreate --build cont-kafka

start: ## start
	docker-compose start

restart: ## restart the containers
	docker-compose stop
	docker-compose start

restart-kafka:
	docker restart cont-kafka

restart-zookeeper:
	docker restart cont-zookeeper

stop: ## stop containers
	docker-compose stop

logs-kafka: ## Logs kafka
	docker logs cont-kafka

logs-zookeeper: ## Logs zookeeper
	docker logs cont-zookeeper

ssh-zookeeper: ## ssh's into zookeeper
	docker exec -it --user root cont-zookeeper /bin/bash

ssh-kafka: ## ssh's into kafka
	docker exec -it --user root cont-kafka /bin/bash
