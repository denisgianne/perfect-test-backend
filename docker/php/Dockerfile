FROM --platform=linux/x86_64 php:7.3-apache

RUN mkdir -p /files/www/localhost

# configure PHP
RUN apt-get update && apt-get install -y \
  mcrypt wget zip unzip git \
  build-essential g++ \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libmcrypt-dev \
  libpng-dev \
  libonig-dev \
  libicu-dev \
  libxml2-dev \
  imagemagick \
  nodejs \
  npm \
  yarn \
  openssh-client \
  libzip-dev
# mcrypt mysql
RUN docker-php-ext-install iconv sockets mbstring mysqli pdo pdo_mysql \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install gd intl zip \
  && docker-php-ext-install ctype fileinfo json \
  && docker-php-ext-install bcmath tokenizer xml

# xdebug xdebug-2.5.5
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN a2enmod rewrite \
  && a2enmod include \
  && a2enmod headers

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
RUN chmod +x /usr/bin/composer

COPY ./base.conf /etc/apache2/sites-available/base.conf
RUN a2ensite base.conf
RUN a2dissite 000-default

COPY php.ini /usr/local/etc/php/

WORKDIR /files/www/localhost