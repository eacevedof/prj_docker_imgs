build:
	docker-compose up -d --build --remove-orphans

rebuild:
	docker-compose down
	make build

logs:
	docker logs cont-python-3x

ssh:
	docker exec -it --user root cont-python-3x bash

inspect:
	docker inspect cont-python-3x