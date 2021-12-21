# Shell access

.PHONY:
shell:
	docker exec -it msg-app bash

# Shortcuts

.PHONY:
reload: down build up

.PHONY:
down:
	docker-compose down

.PHONY:
build:
	docker-compose build

.PHONY:
up:
	docker-compose up -d
