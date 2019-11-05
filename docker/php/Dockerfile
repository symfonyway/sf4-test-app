FROM php:7.3-fpm

RUN apt-get update && apt-get install -y git nano wget libpng-dev nodejs libicu-dev libmagickwand-dev g++ --no-install-recommends
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install zip
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install exif
RUN docker-php-ext-install opcache
RUN docker-php-ext-install calendar
RUN docker-php-ext-install intl
RUN pecl install xdebug-2.7.1 && docker-php-ext-enable gd xdebug opcache calendar zip

RUN wget https://getcomposer.org/composer.phar && mv composer.phar /usr/bin/composer && chmod +x /usr/bin/composer
RUN wget https://phar.phpunit.de/phpunit-5.7.21.phar && chmod +x phpunit-5.7.21.phar && mv phpunit-5.7.21.phar /usr/local/bin/phpunit && phpunit --version
RUN pecl install apcu && docker-php-ext-enable apcu

WORKDIR /app
COPY ./php.ini /usr/local/etc/php/php.ini