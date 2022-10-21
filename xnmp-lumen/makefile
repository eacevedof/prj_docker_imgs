#!/bin/bash
TODAY := $(shell date +'%Y%m%d')
OS := $(shell uname)

help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

rebuild: ## rebuild containers
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

restart: ## restart the containers
	docker-compose stop
	docker-compose start

restart-php:
	docker restart php

restart-web:
	docker restart web

restart-db:
	docker restart dbmaria

stop: ## stop containers
	docker-compose stop

stop-db: ## stop db
	docker stop dbmaria

stop-php: ## stop be
	docker stop php

stop-web: ## stop web
	docker stop web

logs-web: ## logs web
	docker logs web

logs-php: ## logs be
	docker logs php

logs-db: ## logs db
	docker logs dbmaria

rem-logs: ## remove logs
	rm -fr ./backend_web/logs/*
	rm -f ./backend_web/public/*.log

rem-cache: ## remove diskcache
	rm -fr ./backend_web/cache/* !.gitkeep

ssh-php: ## fpm
	docker exec -it --user root php bash

ssh-web: ## web
	docker exec -it --user root web bash

ssh-db: ## ssh's into mysql
	docker exec -it --user root dbmaria bash

log-error: ## logs error
	cd ./backend_web/logs/error; \
	rm -f *.log; touch app_${TODAY}.log; clear; \
	tail -f app_${TODAY}.log;

log-sql: ## log queries
	cd ./backend_web/logs/sql; \
	rm -f *.log; touch app_${TODAY}.log; clear; \
	tail -f app_${TODAY}.log;


prepare-pro:  ## prepare pro
ifeq ($(OS),Linux)
	echo "preparing"
	# echo ${HOME}
	# git fetch --all; git reset --hard origin/main;
	rm -f .env.local
	rm -fr bash
	rm -fr docker
	rm -f docker-compose.yml
	rm -f LICENSE
	rm -f README.md
	rm -f TODO.md
	rm -f ./backend_web/.vendor.zip
	rm -fr ./backend_web/architecture
	rm -f ./backend_web/config/*local*
	rm -f ./backend_web/.env.local

	# rm -f ./backend_web/db/db_mypromos.sql
	# phinx no tira en <b>Fatal error</b>:  main()
	# cd ./backend_web/vendor/bin; phinx migrate -e testing; (nok) en pro
	# cd ./backend_web/db; phinx migrate -e testing;
	ln -s $${HOME}/php.ini $${PATH_DOM_MYPROMOS}/mypromos.es/backend_web/public/php.ini
	ln -s $${HOME}/php.ini $${PATH_DOM_MYPROMOS}/mypromos.es/backend_web/console/php.ini
endif