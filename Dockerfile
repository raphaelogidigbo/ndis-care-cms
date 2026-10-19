# syntax=docker/dockerfile:1

# Base PHP image with extensions + composer
FROM php:8.4-cli-bookworm AS php-base
RUN apt-get update && apt-get install -y --no-install-recommends \
        git unzip libicu-dev libzip-dev libpng-dev \
    && docker-php-ext-install intl zip gd pdo pdo_sqlite opcache \
    && rm -rf /var/lib/apt/lists/*
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html

# Stage 1: PHP dependencies (artisan present so composer scripts can run)
FROM php-base AS vendor
COPY . .
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Stage 2: frontend assets (vendor needed — filament theme.css imports from it)
FROM node:22-alpine AS assets
WORKDIR /build
COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts
COPY vite.config.js ./
COPY resources/css ./resources/css
COPY resources/js ./resources/js
COPY --from=vendor /var/www/html/vendor ./vendor
RUN npm run build

# Stage 3: application runtime
FROM php-base
COPY . .
COPY --from=vendor /var/www/html/vendor ./vendor
COPY --from=assets /build/public/build ./public/build
RUN chmod +x docker/entrypoint.sh \
    && chown -R www-data:www-data storage bootstrap/cache

EXPOSE 8000
ENTRYPOINT ["sh", "docker/entrypoint.sh"]
