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

ssh-php: ## php-frpm
	docker exec -it --user root cont-fpm1 sh

ssh-apache: ## apache httpd
	docker exec -it --user root cont-apache sh

start:  ## start container
	docker-compose start

stop:   ## stop it
	docker-compose stop