build:
	docker-compose up -d --build

rebuild:
	make down
	make build

restart:
	docker-compose restart
	make ssh

down:
	docker-compose down

ssh: ## bin/bash 
	docker exec --user="root" -it cont-ubuntu1804 /bin/bash

start:
	docker-compose start 
	make ssh
stop: 
	docker-compose stop	

remove:
	docker rm cont-ubuntu1804

logs:
	# docker logs cont-ubuntu1804
	docker-compose logs --tail="all"

