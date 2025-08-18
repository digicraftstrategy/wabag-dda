# Stage 1: Build dependencies
FROM php:8.2-fpm AS build

# Install system dependencies
# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip intl \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files
COPY composer.json composer.lock ./

# Install PHP dependencies (including dev dependencies to ensure Filament works)
RUN composer install --no-interaction --prefer-dist --no-scripts

# Copy app source
COPY . .

# Clear caches to ensure routes are freshly loaded
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan route:clear

# Rebuild routes so POST admin/login is registered
RUN php artisan route:cache


# Stage 2: Runtime container
FROM php:8.2-fpm

WORKDIR /var/www

# Install system dependencies including ICU (needed for intl) + nginx
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    git \
    curl \
    nginx \
    supervisor \
    gettext-base \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip intl \
    && docker-php-ext-enable intl

# Copy composer from build stage
COPY --from=build /usr/bin/composer /usr/bin/composer

# Copy application files from build stage
COPY --from=build /var/www /var/www

# Ensure proper permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# ---------------------------
# Nginx + PHP-FPM integration
# ---------------------------

# Copy Nginx config template
COPY nginx.conf /etc/nginx/conf.d/nginx.conf.template

# Supervisor config to run both php-fpm & nginx
RUN printf "[supervisord]\nnodaemon=true\n\n\
[program:php-fpm]\ncommand=php-fpm -F\n\n\
[program:nginx]\ncommand=sh -c \"envsubst '\\\$PORT' < /etc/nginx/conf.d/nginx.conf.template > /etc/nginx/conf.d/default.conf && nginx -g 'daemon off;'\"\n" \
    > /etc/supervisor/conf.d/supervisord.conf

# Render injects $PORT at runtime
EXPOSE 8080

# Start supervisord (runs php-fpm + nginx together)
CMD ["/usr/bin/supervisord"]
