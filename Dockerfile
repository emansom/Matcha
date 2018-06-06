FROM archlinux/base:latest
LABEL maintainer="ewout@freedom.nl"

# Update pacman database and fix possibly incorrect pacman db format after world upgrade
RUN pacman --noprogressbar --noconfirm -Suyy \
  && pacman-db-upgrade

# Install packages for NGINX and PHP and some utilities
RUN pacman --needed --noconfirm --noprogressbar -S bash go python2 wget curl base-devel git \
    supervisor nginx-mainline mariadb-clients php php-apcu php-fpm php-gd php-intl php-sodium

# Install php-igbinary extension (php-redis dependency)
RUN git clone https://aur.archlinux.org/php-igbinary.git /usr/src/php-igbinary \
  && chown nobody -R /usr/src/php-igbinary \
  && cd /usr/src/php-igbinary \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U php-igbinary-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/php-igbinary

# Install php-redis extension
RUN git clone https://aur.archlinux.org/php-redis.git /usr/src/php-redis \
  && chown nobody -R /usr/src/php-redis \
  && cd /usr/src/php-redis \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U php-redis-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/php-redis

# Install the Phalcon PHP framework
RUN git clone https://aur.archlinux.org/php-phalcon.git /usr/src/php-phalcon \
  && chown nobody -R /usr/src/php-phalcon \
  && cd /usr/src/php-phalcon \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U php-phalcon-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/php-phalcon

# Install crudini dependencies
RUN git clone https://aur.archlinux.org/python2-iniparse.git /usr/src/python2-iniparse \
  && chown nobody -R /usr/src/python2-iniparse \
  && cd /usr/src/python2-iniparse \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U python2-iniparse-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/python2-iniparse

# Install crudini
RUN git clone https://aur.archlinux.org/crudini.git /usr/src/crudini \
  && chown nobody -R /usr/src/crudini \
  && cd /usr/src/crudini \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U crudini-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/crudini

# Install h5bp's server-configs-nginx (sane NGINX configuration defaults)
RUN git clone https://aur.archlinux.org/nginx-h5bp-server-configs.git /usr/src/nginx-h5bp-server-configs \
  && chown nobody -R /usr/src/nginx-h5bp-server-configs \
  && cd /usr/src/nginx-h5bp-server-configs \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U nginx-h5bp-server-configs-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/nginx-h5bp-server-configs \
  && wget -O /etc/nginx/mime.types https://raw.githubusercontent.com/h5bp/server-configs-nginx/master/mime.types

# Clear pacman caches
RUN pacman --noconfirm --noprogressbar -Scc

# Configure GOPATH
RUN mkdir /usr/src/golang
ENV GOPATH /usr/src/golang
ENV PATH $GOPATH/bin:$PATH

# Install dbmate
RUN go get -u github.com/amacneil/dbmate

# Add matcha user
# TODO: safer UID and GIDs
RUN groupadd -g 1000 matcha \
    && useradd -r -u 1000 -g matcha matcha

# Remove all other pool configurations
RUN rm /etc/php/php-fpm.d/*.conf

# Add PHP-FPM, NGINX and Supervisor configuration files
COPY docker/php-fpm.conf /etc/php/php-fpm.conf
COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/supervisord.conf /etc/supervisor/supervisord.conf

# Configure PHP
RUN crudini --set /etc/php/php.ini opcache opcache.enable 1 \
    && crudini --set /etc/php/php.ini opcache opcache.save_comments 0 \
    && crudini --set /etc/php/php.ini PHP open_basedir /srv/http \
    && crudini --set /etc/php/php.ini PHP log_errors On \
    && crudini --set /etc/php/php.ini PHP ignore_repeated_errors Off \
    && crudini --set /etc/php/php.ini PHP file_uploads Off \
    && crudini --set /etc/php/php.ini PHP enable_dl Off \
    && crudini --set /etc/php/php.ini PHP error_reporting E_ALL \
    && crudini --set /etc/php/php.ini PHP html_errors Off \
    && crudini --set /etc/php/php.ini PHP cgi.fix_pathinfo 1 \
    && crudini --set /etc/php/php.ini PHP allow_url_fopen Off \
    && crudini --set /etc/php/php.ini PHP allow_url_include Off \
    && crudini --set /etc/php/php.ini PHP short_open_tag Off \
    && crudini --set /etc/php/php.ini PHP expose_php Off \
    && crudini --set /etc/php/php.ini PHP display_errors Off \
    && crudini --set /etc/php/php.ini PHP display_startup_errors Off \
    && crudini --set /etc/php/php.ini PHP track_errors Off \
    && crudini --set /etc/php/php.ini Date date.timezone UTC \
    && crudini --set /etc/php/php.ini Session session.save_handler redis \
    && crudini --set /etc/php/php.ini Session session.save_path '"tcp://redis:6379?weight=1&database=0"' \
    && crudini --set /etc/php/php.ini Session session.use_strict_mode 1 \
    && crudini --set /etc/php/php.ini Session session.use_cookies 1 \
    && crudini --set /etc/php/php.ini Session session.cookie_httponly 1 \
    && crudini --set /etc/php/php.ini Session session.gc_maxlifetime 86400 \
    && crudini --set /etc/php/php.ini Session session.sid_length 52 \
    && rm /etc/php/conf.d/* \
    && echo 'extension=apcu.so' > /etc/php/conf.d/apcu.ini \
    && crudini --set /etc/php/conf.d/apcu.ini '' apc.enabled 1 \
    && crudini --set /etc/php/conf.d/apcu.ini '' apc.shm_size 32M \
    && crudini --set /etc/php/conf.d/apcu.ini '' apc.ttl 7200 \
    && echo 'extension=igbinary.so' > /etc/php/conf.d/10-igbinary.ini \
    && echo 'extension=redis.so' > /etc/php/conf.d/20-redis.ini \
    && echo 'extension=phalcon.so' > /etc/php/conf.d/40-phalcon.ini \
    && echo 'extension=sodium.so' > /etc/php/conf.d/20-sodium.ini \
    && echo 'extension=intl.so' > /etc/php/conf.d/20-intl.ini \
    && echo 'extension=pdo_mysql.so' > /etc/php/conf.d/20-pdo_mysql.ini

RUN mkdir -p /srv/http/matcha/{public,cache}

# Copy matcha application to docker container
COPY app /srv/http/matcha/app
COPY public /srv/http/matcha/public

# Copy migrations to docker container
COPY db /srv/http/matcha/db

# Make sure matcha user inside container can access files
RUN chown -R matcha:matcha /srv/http/matcha

# TODO: set right permissions on files in /srv/http/matcha

COPY docker-entrypoint.sh /usr/local/bin/
ENTRYPOINT ["docker-entrypoint.sh"]

EXPOSE 12316

CMD ["supervisord", "-c", "/etc/supervisor/supervisord.conf"]
