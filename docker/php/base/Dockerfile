FROM php:8.1-cli

RUN set -eux; \
        apt-get update; \
        apt-get install -y --no-install-recommends \
            unzip \
            git \
    ;

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

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

COPY --from=composer /usr/bin/composer /usr/local/bin/

RUN mv /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
COPY docker/php/base/php.ini /usr/local/etc/php/conf.d/zz-overrides.ini

COPY app/framework/config/preload.php /var/www/html/framework/config/preload.php

WORKDIR /var/www/html

CMD ["php", "/var/www/html/framework/public/index.php"]

EXPOSE 8080