#!/bin/bash
TODAY := $(shell date +'%Y%m%d')
OS := $(shell uname)

help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

gitpush: ## git push m=any message
	clear;
	git add .; git commit -m "$(m)"; git push;

rebuild-all: ## rebuild all services containers in docker-compose
	docker-compose -f docker-compose.yml down
	docker-compose -f docker-compose.yml up -d --build --remove-orphans

destroy-all: ## destroy containers
	docker-compose -f docker-compose.yml down

rebuild-web: ## rebuild web image (nginx)
	docker-compose up -d --no-deps --force-recreate --build web
	docker ps

rebuild-php: ## rebuild php-fpm image and launch container cphp
	docker-compose up -d --no-deps --force-recreate --build php
	docker ps

restart-all: ## restart the containers
	docker-compose stop
	docker-compose start

