FROM archlinux:latest
LABEL maintainer="ewout@freedom.nl"

# Update pacman database and fix possibly incorrect pacman db format after world upgrade
RUN pacman --needed --noconfirm -Suyy \
  && pacman-db-upgrade

# Install additional packages
RUN pacman --needed --noconfirm -S git php php-apcu php-fpm php-gd php-intl php-sodium php-sqlite
