FROM archlinux/base:latest
LABEL maintainer="ewout@freedom.nl"

# Update pacman database and fix possibly incorrect pacman db format after world upgrade
RUN pacman --noprogressbar --noconfirm -Suyy \
  && pacman-db-upgrade

# Install additional packages
RUN pacman --needed --noconfirm --noprogressbar -S wget curl base-devel git php php-apcu php-fpm php-gd php-intl php-sodium php-sqlite

RUN git clone https://aur.archlinux.org/php-phalcon.git /usr/src/php-phalcon \
  && chown nobody -R /usr/src/php-phalcon \
  && cd /usr/src/php-phalcon \
  && su -c "makepkg -m" -s /bin/bash nobody \
  && pacman --noconfirm --noprogressbar -U php-phalcon-*.pkg.tar.xz \
  && cd \
  && rm -rf /usr/src/php-phalcon

# Clear pacman caches
RUN pacman --noconfirm --noprogressbar -Scc

# Optimize pacman database
RUN pacman-optimize
