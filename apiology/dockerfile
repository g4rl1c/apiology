FROM php:7.3-apache

RUN apt update -y && apt upgrade -y

RUN apt install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
	docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && \
	docker-php-ext-install gd mysqli pdo pdo_mysql

RUN a2enmod rewrite
RUN a2enmod headers