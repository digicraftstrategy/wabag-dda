#!/bin/bash
set -eo pipefail

# Debug: Print environment variables (remove in production)
echo "---- Environment Variables ----"
printenv | grep -E 'DB_|APP_' || true
echo "------------------------------"

# 1. Copy .env if missing (with backup check)
if [ ! -f /var/www/.env ] && [ -f /var/www/.env.example ]; then
  echo "Copying .env.example to .env (first run)"
  cp /var/www/.env.example /var/www/.env
fi

# 2. Install wait-for-it if missing (with retries)
MAX_RETRIES=3
RETRY_DELAY=5
for i in $(seq 1 $MAX_RETRIES); do
  if ! command -v wait-for-it &>/dev/null; then
    echo "Downloading wait-for-it.sh (attempt $i/$MAX_RETRIES)"
    if curl -sSf https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh -o /usr/local/bin/wait-for-it; then
      chmod +x /usr/local/bin/wait-for-it
      break
    else
      if [ $i -eq $MAX_RETRIES ]; then
        echo "Failed to download wait-for-it after $MAX_RETRIES attempts"
        exit 1
      fi
      sleep $RETRY_DELAY
    fi
  fi
done

# 3. Database readiness check (with multiple verification methods)
DB_HOST="${DB_HOST:-mysql}"
DB_PORT="${DB_PORT:-3306}"
TIMEOUT=120

echo "---- Database Connection Test ----"
echo "Testing TCP connection to $DB_HOST:$DB_PORT..."

# Method 1: Basic port check
if nc -z -w5 "$DB_HOST" "$DB_PORT"; then
  echo "TCP connection successful"
else
  echo "TCP connection failed"
fi

# Method 2: Wait-for-it with detailed debugging
echo "Starting database readiness check (timeout: ${TIMEOUT}s)"
if wait-for-it "$DB_HOST:$DB_PORT" --timeout=$TIMEOUT --strict --quiet; then
  echo "Database connection verified"
else
  echo "ERROR: Database not available after $TIMEOUT seconds"
  echo "Debug info:"
  echo "- Host: $DB_HOST"
  echo "- Port: $DB_PORT"
  echo "- Network status:"
  ping -c 3 "$DB_HOST" || true
  nc -zv "$DB_HOST" "$DB_PORT" || true
  exit 1
fi

# 4. Filesystem permissions
echo "Setting up filesystem permissions"
mkdir -p /var/www/storage/logs /var/www/bootstrap/cache

# 🔹 FIX: Different permissions for WSL vs Production
if grep -qi microsoft /proc/version; then
  echo "⚡ Detected WSL environment — using 777 permissions"
  chmod -R 777 /var/www/storage /var/www/bootstrap/cache
else
  echo "✅ Production environment — using www-data with 775"
  chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
  chmod -R 775 /var/www/storage /var/www/bootstrap/cache
fi

# 5. Application initialization
echo "---- Application Setup ----"
php artisan config:clear
php artisan route:clear
php artisan cache:clear
php artisan view:clear

# 6. Database migrations (with health check)
if php artisan migrate:status &>/dev/null; then
  echo "Running database migrations"
  php artisan migrate --force
else
  echo "WARNING: Could not verify migration status - skipping migrations"
fi

# 7. Nginx configuration
echo "Configuring Nginx"
envsubst '$PORT' < /etc/nginx/conf.d/nginx.conf.template > /etc/nginx/conf.d/default.conf

# 8. Start application
echo "---- Starting Application ----"
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
