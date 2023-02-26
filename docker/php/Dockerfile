FROM php:8.1-fpm

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && \
  apt-get install -y --no-install-recommends apt-utils nano unzip && \
  rm -r /var/lib/apt/lists/*

# Xdebug
RUN pecl install xdebug && \
  docker-php-ext-enable xdebug

# pdo_mysql
RUN docker-php-ext-install pdo_mysql
COPY php.ini /usr/local/etc/php/php.ini