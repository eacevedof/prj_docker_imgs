build:
	docker-compose up -d --build --remove-orphans

rebuild:
	docker-compose down
	make build

logs:
	docker logs cont-mariadb-univ

ssh:
	docker exec -it --user root cont-mariadb-univ bash

inspect:
	docker inspect cont-mariadb-univ