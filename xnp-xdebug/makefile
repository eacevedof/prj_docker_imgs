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
	docker-compose up -d --no-deps --build dbmaria

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
	docker restart cont-php

restart-web:
	docker restart cont-web

restart-db:
	docker restart cont-db

stop: ## stop containers
	docker-compose stop

stop-db: ## stop db
	docker stop cont-db

stop-php: ## stop be
	docker stop cont-php

stop-web: ## stop web
	docker stop cont-web

logs-web: ## logs web
	docker logs cont-web

logs-php: ## logs be
	docker logs cont-php

logs-db: ## logs db
	docker logs cont-db

rem-cache: ## remove diskcache
	rm -fr ./app/lumen/storage/framework/cache/data/* !.gitignore

ssh-php: ## fpm
	docker exec -it --user root cont-php bash

ssh-web: ## web
	docker exec -it --user root cont-web bash

ssh-db: ## mariadb
	docker exec -it --user root cont-db bash

log-error: ## logs error
	cd ./app/lumen/storage/logs; \
	rm -f *.log; touch lumen-${TODAY}.log; clear; \
	tail -f lumen-${TODAY}.log;

