# Fetch dependencies in seperate container
FROM composer:1.7 as vendor

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM ewout/phalconphp:3.4.1
LABEL maintainer="ewout@freedom.nl"

# Install shared libraries and PHP extensions needed by our code
RUN set -xe; \
    \
    apk add --no-cache --virtual .matcha-deps zlib-dev; \
    \
    apk add --no-cache --virtual .matcha-build-deps $PHPIZE_DEPS; \
    \
    docker-php-ext-install pdo_mysql intl; \
    \
    pecl install protobuf-3.6.1; \
    \
    pecl install grpc-1.15.0; \
    \
    pecl install redis-4.1.1; \
    \
    pecl install apcu-5.1.12; \
    \
    docker-php-ext-enable protobuf grpc redis apcu; \
    \
    apk del .matcha-build-deps

# Copy dependencies from other container to ours
COPY --from=vendor /app/vendor /var/www/html/vendor

# Copy our code to the container
COPY public /var/www/html/public
COPY app /var/www/html/app
