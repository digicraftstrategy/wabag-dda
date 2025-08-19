#!/bin/bash
set -e

# Copy .env if needed
if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
  cp /var/www/.env.example /var/www/.env
fi

# Wait for MySQL
# In your entrypoint.sh
if [ -z "$(which wait-for-it)" ]; then
    # Download wait-for-it if not present
    curl -o /usr/local/bin/wait-for-it https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh \
    && chmod +x /usr/local/bin/wait-for-it
fi

wait-for-it "${DB_HOST:-mysql}:${DB_PORT:-3306}" --timeout=120 --strict -- echo "MySQL is available"

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
envsubst '$PORT' < /etc/nginx/conf.d/nginx.conf > /etc/nginx/conf.d/default.conf

# 🔹 Start supervisord (nginx + php-fpm in foreground)
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
