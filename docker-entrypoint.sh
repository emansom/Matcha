#!/bin/bash
set -e

# Define database url for dbmate
export DATABASE_URL="mysql://$MYSQL_USER:$MYSQL_PASSWORD@$MYSQL_HOST:3306/$MYSQL_DATABASE"

cd /srv/http/matcha

# Wait for MariaDB to come online and apply migrations
dbmate wait && dbmate up

cd /

exec "$@"
