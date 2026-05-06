FROM php:5.6-apache

RUN docker-php-ext-install mysql mysqli pdo_mysql

RUN a2enmod rewrite \
    && echo "ServerName localhost" > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

COPY docker/php/php.ini /usr/local/etc/php/conf.d/alok-fee.ini

WORKDIR /var/www/html
