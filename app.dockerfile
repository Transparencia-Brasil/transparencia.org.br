FROM php:7.4.33-fpm

RUN apt-get update && apt-get install -y --force-yes mariadb-client libonig-dev libmcrypt-dev \
    libmagickwand-dev git zip unzip curl --no-install-recommends \
    && pecl install imagick \
    && pecl install mcrypt-1.0.5 \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install pdo_mysql intl mbstring \
    && docker-php-ext-configure intl

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -
RUN apt-get install -y nodejs

COPY package*.json ./

RUN npm install

RUN npm install cross-env

RUN npm install -g bower

VOLUME /var/www 
VOLUME /var/www/node_modules

EXPOSE 8080