#!/bin/bash
set -e

# Copy .env if needed
if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
  cp /var/www/.env.example /var/www/.env
fi

# Wait for MySQL
until mysqladmin ping -h"${DB_HOST:-mysql}" -P"${DB_PORT:-3306}" --silent; do
  echo "Waiting for MySQL..."
  sleep 1
done

# Ensure dirs + perms
mkdir -p /var/www/storage/logs /var/www/bootstrap/cache
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Clear caches (safe without DB)
php artisan config:clear || true
php artisan route:clear || true
php artisan cache:clear || true
php artisan view:clear || true

# Run migrations (will need DB)
php artisan migrate --force || true

# Hand off to CMD (supervisord)
exec "$@"
