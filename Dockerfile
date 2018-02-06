FROM composer:1.7 as vendor

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM ewout/phalconphp

COPY --from=vendor /app/vendor /var/www/html/vendor
COPY public /var/www/html/public
COPY app /var/www/html/app
