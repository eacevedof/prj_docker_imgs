#!/bin/bash
TODAY := $(shell date +'%Y%m%d')
OS := $(shell uname)

help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

rebuild-all: ## rebuild containers
	docker-compose -f docker-compose.yml down
	docker-compose -f docker-compose.yml up -d --build --remove-orphans

config:
	docker-compose config

destroy-all: ## destroy containers
	docker-compose -f docker-compose.yml down

rebuild-web: #nginx
	docker-compose up -d --no-deps --force-recreate --build web
	docker ps

rebuild-php: #fpm
	docker-compose up -d --no-deps --force-recreate --build php
	docker ps

restart-docker: ## restart docker
	# systemctl restart docker
	killall Docker && open /Applications/Docker.app

restart-all: ## restart the containers
	docker-compose stop
	docker-compose start

restart-php:
	docker restart cont-php1

restart-web:
	docker restart cont-web1

stop: ## stop containers
	docker-compose stop

stop-php: ## stop be
	docker stop cont-php1

stop-web: ## stop web
	docker stop cont-web1

logs-web: ## logs web
	docker logs cont-web1

logs-php: ## logs be
	docker logs cont-php1

ssh-php: ## fpm
	docker exec -it --user root cont-php1 bash

ssh-web: ## web
	docker exec -it --user root cont-web1 bash
