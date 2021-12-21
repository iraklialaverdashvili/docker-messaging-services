FROM ubuntu:20.04

# Basic installs
RUN apt-get update -qqy \
    && apt-get upgrade -qqy \
    && apt install wget curl -qqy \
    && apt install zip unzip -qqy \
    && apt install git -qqy;

# Install timezone data, required for PHP 8
ARG DEBIAN_FRONTEND=noninteractive
ENV TZ=Europe/Madrid
RUN apt-get install tzdata -qqy;

# Install PHP 8
RUN apt install software-properties-common -qqy\
    && add-apt-repository ppa:ondrej/php -y \
    && apt update -qqy \
    && apt install php8.0 php8.0-mbstring php8.0-simplexml php8.0-redis php8.0-memcached -qqy;

RUN apt autoremove && apt autoclean

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD files/credentials /root/.aws/credentials

WORKDIR /app

CMD tail -f /dev/null
