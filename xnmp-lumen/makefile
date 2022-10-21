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

build-db-:
	docker-compose up -d --no-deps --force-recreate --build dbmaria
	make ps

build-web: #nginx
	docker-compose up -d --no-deps --force-recreate --build web
	make ps

build-php: #fpm
	docker-compose up -d --no-deps --force-recreate --build php
	make ps

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

rem-logs: ## remove logs
	rm -fr ./backend_web/logs/*
	rm -f ./backend_web/public/*.log

rem-cache: ## remove diskcache
	rm -fr ./backend_web/cache/* !.gitkeep

ssh-php: ## fpm
	docker exec -it --user root cont-php bash

ssh-web: ## web
	docker exec -it --user root cont-web bash

ssh-db: ## ssh's into mysql
	docker exec -it --user root cont-db bash

log-error: ## logs error
	cd ./backend_web/logs/error; \
	rm -f *.log; touch app_${TODAY}.log; clear; \
	tail -f app_${TODAY}.log;

log-sql: ## log queries
	cd ./backend_web/logs/sql; \
	rm -f *.log; touch app_${TODAY}.log; clear; \
	tail -f app_${TODAY}.log;

