#FROM tutum/apache-php
#MAINTAINER iiswebMySQL
#ADD . /app

FROM php:7.2-apache
#MAINTAINER iiswebMYSQL
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
COPY . /var/www/html/

#FROM php:7.2-apache
##MAINTAINER iiswebPGSQL
#RUN apt-get update && apt-get install -y apt-transport-https
#
#RUN apt-get install -y libpq-dev \
#    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#    && docker-php-ext-install pdo pdo_pgsql pgsql
#COPY . /var/www/html/

#CMD ["echo", "Welcome to Dockerfile"]
EXPOSE 8443 8000

#FROM php:8.0.5-fpm-buster
#
#RUN apt-get -qq update \
#        && apt-get install --assume-yes --quiet --no-install-recommends \
#            ca-certificates git curl libpng-dev libfreetype6-dev libjpeg62-turbo-dev \
#            libicu-dev libxml++2.6-dev unzip libzip-dev libpq5 libpq-dev procps vim default-mysql-client \
#    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ > /dev/null \
#    && docker-php-ext-install bcmath  exif gd intl pdo_mysql pdo_pgsql pgsql soap zip xml mysqli \
#    && docker-php-ext-enable opcache \
#    && pecl install xdebug \
#    && docker-php-source delete > /dev/null \
## remove dev-dependencies
#    && apt-get remove --assume-yes --quiet libpng-dev libfreetype6-dev libpq-dev libjpeg62-turbo-dev libicu-dev libxml++2.6-dev libzip-dev python3 \
#    && rm -r /var/lib/apt/lists/*
#
## Configure time
#RUN rm /etc/localtime \
#    && ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime \
## Install composer
#    && curl -sS https://getcomposer.org/installer | \
#        php -- --install-dir=/usr/bin/ --filename=composer \
## Setup user/group
#    && groupadd -g 1000 appuser  \
#    && useradd -r -u 1000 -g appuser appuser \
#    && mkdir -p /home/appuser && chown appuser:appuser /home/appuser
#
#COPY php.ini /usr/local/etc/php
#COPY www.conf /usr/local/etc/php-fpm.d/zz-docker.conf
#RUN chown -R appuser: /var/www
#EXPOSE 8443 8000
#
#WORKDIR "/var/www"
#CMD ["php-fpm"]
#
#COPY . /var/www/html/
#CMD ["echo", "Welcome to Dockerfile"]


