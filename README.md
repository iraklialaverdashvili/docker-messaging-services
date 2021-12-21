# Docker Messaging Services

In this repository you'll find php cli scripts working with various popular messaging/caching services.
Feel free to use it.

Requirements:
* Docker
* Docker-compose

Dockerized services:
* RabbitMQ
* AWS SQS
* Redis

### Installation and access

Run project:
```
make init
```

Shell access:
```
# Main app
make shell

# RabbitMQ
make rabbitmq-shell

# SQS
make sqs-shell

# Redis
make redis-shell
```
