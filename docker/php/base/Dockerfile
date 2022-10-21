FROM php:8.1-cli

RUN set -eux; \
        apt-get update; \
        apt-get install -y --no-install-recommends \
            unzip \
            git \
    ;

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/install-php-extensions
RUN chmod +rx /usr/local/bin/install-php-extensions

RUN install-php-extensions \
      intl \
      openswoole \
      amqp \
      opcache \
      pdo_mysql \
      pcntl \
      ctype \
      iconv \
    ;

ADD https://github.com/composer/composer/releases/latest/download/composer.phar /usr/local/bin/composer
RUN chmod +rx /usr/local/bin/composer

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
COPY docker/php/base/php.ini /usr/local/etc/php/conf.d/zz-overrides.ini

WORKDIR /var/www/html

COPY backend/config/preload.php /var/www/html/config/preload.php

CMD ["php", "/var/www/html/public/index.php"]

EXPOSE 8080