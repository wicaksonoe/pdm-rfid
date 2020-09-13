ARG PHP_VERSION=7.4.3-fpm-alpine

FROM php:${PHP_VERSION}

RUN apk update \
    && apk add freetype-dev libjpeg-turbo-dev libpng-dev libwebp-dev gmp-dev libzip-dev zip \
    && docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/ \
    && docker-php-ext-install gd gmp pdo pdo_mysql zip \
    && docker-php-ext-enable opcache \
    # clean up
    && rm -rf /var/lib/apt/lists/* \
    && rm -rf /tmp/pear/

COPY . /var/www/

WORKDIR /var/www/

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php && php composer-setup.php --install-dir=/usr/local/bin --filename=composer && php -r "unlink('composer-setup.php');"

RUN composer install
