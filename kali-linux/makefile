#!/bin/bash
TODAY := $(shell date +'%Y-%m-%d')

help: ## Show this help message
	@echo "usage: make [target]"
	@echo
	@echo "targets:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

rebuild-all: ## rebuild all services containers in docker-compose
	docker-compose -f docker-compose.yml down
	docker-compose -f docker-compose.yml up -d --build --remove-orphans
	docker ps | grep kali

config: ## show docker compose configuration
	docker-compose config

destroy-all: ## destroy containers
	docker-compose -f docker-compose.yml down

ssh-kl: ## ssh redis
	# docker exec -it --user root cont-kalilinux bash
	docker attach cont-kalilinux

logs-kl: ## shows logs
	docker logs cont-kalilinux

gitpush: ## git push m=any message
	clear;
	git add .; git commit -m "$(m)"; git push;