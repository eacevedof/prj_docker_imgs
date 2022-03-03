help: ## Show this help message
	@echo "usage:\n\t make [option]"
	@echo
	@echo "option:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"

rebuild: ## rebuild apache
	docker-compose down
	docker-compose up -d

destroy-all: ## destroy container and image
	docker-compose down --rmi all

ssh-apache: ## connect to container
	docker exec -it --user root cont-apache bash

start:  ## start container
	docker-compose start

stop:   ## stop it
	docker-compose stop