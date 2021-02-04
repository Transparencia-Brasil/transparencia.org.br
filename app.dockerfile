FROM php:7.0.4-fpm

RUN sed -i '/jessie-updates/d' /etc/apt/sources.list
RUN apt-get update && apt-get install -y libmcrypt-dev zlib1g-dev libicu-dev g++ \
    mysql-client libmagickwand-dev git zip unzip curl --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-configure intl \
    && docker-php-ext-install mcrypt pdo_mysql intl mbstring

RUN curl -sL https://deb.nodesource.com/setup_9.x | bash -
RUN apt-get install -y nodejs

COPY package*.json ./

RUN npm install

RUN npm install cross-env

RUN npm install -g bower

VOLUME /var/www 
VOLUME /var/www/node_modules

EXPOSE 8080