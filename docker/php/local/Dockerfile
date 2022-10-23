FROM resoglas/listing-base

RUN set -eux; \
        apt-get update; \
        apt-get install -y --no-install-recommends \
            libboost-all-dev \
        ; \
        rm -rf /var/lib/apt/lists/*

RUN set -eux; \
        docker-php-source extract; \
        git clone --depth 1 https://github.com/swoole/yasd.git /usr/src/php/ext/yasd; \
        docker-php-ext-configure yasd; \
        docker-php-ext-install -j$(nproc) yasd; \
        docker-php-source delete

COPY docker/php/local/php.ini /usr/local/etc/php/conf.d/docker-php-ext-yasd.ini

CMD ["php", "-e", "/var/www/html/framework/public/index.php"]