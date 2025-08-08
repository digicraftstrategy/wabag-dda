# -------------------------
# Stage 1: Node builder (Vite)
# -------------------------
FROM node:20 AS node_builder
WORKDIR /app

# Copy only manifests first for caching
COPY package*.json yarn.lock* ./

# Install node dependencies
RUN npm ci

# Copy app sources and build assets (includes Filament assets via Vite)
COPY . .

# Build production assets
RUN npm run build   # outputs to public/build

# -------------------------
# Stage 2: PHP / Laravel app
# -------------------------
FROM php:8.2-fpm
WORKDIR /var/www

# Install system deps & PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
    zlib1g-dev libfreetype6-dev build-essential \
 && docker-php-ext-install pdo_mysql mbstring intl zip exif pcntl bcmath

# Copy Composer from official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy built frontend from Node stage
COPY --from=node_builder /app/public/build /var/www/public/build

# Copy Laravel application source
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Run Laravel commands for production
RUN php artisan key:generate || true \
 && php artisan storage:link || true \
 && php artisan config:cache \
 && php artisan route:cache \
 && php artisan view:cache

# Set permissions
RUN chown -R www-data:www-data /var/www \
 && chmod -R 775 storage bootstrap/cache

# Expose port for PHP server
EXPOSE 8080

# Start Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
