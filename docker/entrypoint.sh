#!/bin/sh
set -e

cd /var/www/html

mkdir -p storage/app/public bootstrap/cache
touch database/database.sqlite

# Demo deploy: generate an app key when none is provided (ephemeral is fine).
if [ -z "$APP_KEY" ]; then
    export APP_KEY="base64:$(head -c 32 /dev/urandom | base64)"
fi

# Render injects its public URL; keep generated links on the right scheme/host.
if [ -n "$RENDER_EXTERNAL_URL" ] && [ -z "$APP_URL" ]; then
    export APP_URL="$RENDER_EXTERNAL_URL"
fi

php artisan storage:link --force 2>/dev/null || true
php artisan migrate --seed --force --no-interaction
php artisan config:cache
php artisan route:cache
php artisan view:cache

exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
