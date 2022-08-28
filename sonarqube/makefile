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
	docker-compose -f docker-compose.yml --env-file ./.env up -d --build --remove-orphans
	make ps


start: ## start
	docker-compose start
	docker ps | grep sonarqube

restart: ## restart the containers
	docker-compose stop
	docker-compose start
	docker ps | grep sonarqube

restart-sonarqube:
	docker restart cont-sonarqube

stop: ## stop containers
	docker-compose stop

logs-sonarqube: ## Logs sonarqube
	docker logs cont-sonarqube

ssh-sonarqube: ## ssh's into sonarqube
	docker exec -it --user root cont-sonarqube /bin/bash

net: ## network details
	docker network inspect sonarqube-net

ps: ## docker ps
	clear
	docker ps | grep sonarqube

