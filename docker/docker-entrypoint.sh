#!/usr/bin/env bash
set -e

# Make sure the data directory is accessible
chown -R matcha:matcha /srv/http/matcha/data

exec "$@"
