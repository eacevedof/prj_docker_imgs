help: ## Show this help message
	@echo "usage:\n\t make [option]"
	@echo
	@echo "option:"
	@egrep "^(.+)\:\ ##\ (.+)" ${MAKEFILE_LIST} | column -t -c 2 -s ":#"


rem-cont: ## 
	docer rm -f cont-centos

rem-img:
	docker rmi -f img-centos

run-cont:
	docker run -it --name cont-centos --rm img-centos bash	

rebuild: ## 
	docker rm -f cont-centos
	docker build -t img-centos ./php7_fpm/.
	docker run -it --name cont-centos --rm img-centos bash

logs:
	docker logs cont-centos

ssh:
	docker exec -it --user root cont-centos bash

inspect:
	docker inspect cont-centos