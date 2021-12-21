# -------------------------
#  SHELL ACCESS
# -------------------------

.PHONY:
shell:
	docker exec -it msg-app bash

.PHONY:
rabbitmq-shell:
	docker exec -it msg-rabbitmq bash

.PHONY:
sqs-shell:
	docker exec -it msg-sqs bash

.PHONY:
redis-shell:
	docker exec -it msg-redis bash

.PHONY:
memcached-shell:
	docker exec -it msg-memcached bash


# -------------------------
#  SHORTCUTS
# -------------------------

.PHONY:
init: build start

.PHONY:
reload: down build start

.PHONY:
down:
	docker-compose down

.PHONY:
build:
	docker-compose build

.PHONY:
start:
	docker-compose up -d

.PHONY:
stop:
	docker-compose stop

.PHONY:
logs:
	docker-compose logs -f
