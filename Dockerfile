# -------------------------
# Stage 1: Node builder
# -------------------------
FROM node:20 AS node_builder
WORKDIR /app

# copy only manifests first for caching
COPY package*.json yarn.lock* ./

# install node deps
RUN npm ci

# copy app sources and build assets
COPY . .
RUN npm run build   # outputs to public/build (default for Laravel Vite)

# -------------------------
# Stage 2: PHP / app image
# -------------------------
FROM php:8.2-fpm
WORKDIR /var/www

# system deps & php extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
    zlib1g-dev libfreetype6-dev build-essential \
  && docker-php-ext-install pdo_mysql mbstring intl zip exif pcntl bcmath

# composer (copy from official composer image)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# copy built frontend from node stage to public/build
COPY --from=node_builder /app/public/build /var/www/public/build

# copy app source
COPY . .

# install php dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# artisan tasks (generate key if missing, create storage link)
RUN php artisan key:generate || true
RUN php artisan storage:link || true

# permissions
RUN chown -R www-data:www-data /var/www && chmod -R 775 storage bootstrap/cache

EXPOSE 8080

CMD ["php","artisan","serve","--host=0.0.0.0","--port=8080"]
