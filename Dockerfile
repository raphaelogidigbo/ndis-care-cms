# syntax=docker/dockerfile:1

# Stage 1: compile frontend assets (Vite + Tailwind)
FROM node:22-alpine AS assets
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts
COPY vite.config.js ./
COPY resources/css ./resources/css
COPY resources/js ./resources/js
RUN npm run build

# Stage 2: application runtime
FROM php:8.4-cli-bookworm
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libzip-dev libpng-dev \
    && docker-php-ext-install intl zip gd pdo pdo_sqlite opcache \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .
COPY --from=assets /build/public/build ./public/build

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader \
    && chmod +x docker/entrypoint.sh \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
ENTRYPOINT ["sh", "docker/entrypoint.sh"]
