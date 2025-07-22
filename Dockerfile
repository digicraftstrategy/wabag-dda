FROM php:8.2-fpm

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libjpeg-dev libonig-dev libxml2-dev libzip-dev libicu-dev \
    build-essential gnupg npm \
    && docker-php-ext-install \
        intl pdo_mysql mbstring zip exif pcntl bcmath

# Install Node.js 20.x
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Yarn globally
RUN npm install -g yarn

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Remove lock file conflict
RUN rm -f package-lock.json

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# Install JS dependencies and build assets
RUN yarn install && yarn prod

# Laravel optimizations # Laravel setup (with .env and key) 
# Laravel setup (after dependencies are installed)
RUN cp .env.example .env && \
    php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan migrate --force && \
    php artisan storage:link

 RUN chown -R www-data:www-data /var/www
 
#&& php artisan migrate --force
# Set correct permissions
RUN chown -R www-data:www-data /var/www

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

