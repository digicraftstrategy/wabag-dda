# Use the official PHP image with FPM
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

# Install JS dependencies and build assets
RUN yarn install && yarn build

# Install NPM dependencies
#RUN npm install

# Set working directory
WORKDIR /var/www

# Copy all project files
COPY . .

# Remove lock file conflict (only if needed)
RUN rm -f package-lock.json

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install JS dependencies and build assets
RUN yarn install && yarn prod

# Set proper permissions for storage and bootstrap
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

# Expose Railway’s required port
EXPOSE 9000

# Set the command to start Laravel’s built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
