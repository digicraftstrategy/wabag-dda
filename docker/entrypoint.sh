#!/bin/bash
set -e

# Copy .env if needed
if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
  cp /var/www/.env.example /var/www/.env
fi

# Wait for MySQL with timeout (30 seconds)
timeout=30
while ! nc -z -v -w5 "${DB_HOST:-mysql}" "${DB_PORT:-3306}"; do
  timeout=$((timeout - 1))
  if [ $timeout -le 0 ]; then
    echo "Timeout waiting for MySQL"
    exit 1
  fi
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

# 🔹 Replace $PORT in nginx.conf dynamically
envsubst '$PORT' < /etc/nginx/conf.d/nginx.conf.template > /etc/nginx/conf.d/default.conf

# 🔹 Start supervisord (nginx + php-fpm in foreground)
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
