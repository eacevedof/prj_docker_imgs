help: ## Show this help message
	@echo "usage:\n\t make [option]"
	@echo
	@echo "option:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

rebuild: ## rebuild apache
	docker-compose down --rmi all
	docker-compose up -d
	docker ps

destroy-all: ## destroy container and image
	docker-compose down --rmi all

ssh-php: ## php-frpm
	docker exec -it --user root cont-php sh

ssh-apache: ## apache httpd
	docker exec -it --user root cont-apache sh

logs-apache: ## logs httpd
	docker container logs cont-apache

logs-php: ## logs php
	docker container logs cont-php

start:  ## start container
	docker-compose start

stop:   ## stop it
	docker-compose stop