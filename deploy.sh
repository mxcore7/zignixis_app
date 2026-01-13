#!/bin/bash

# Stop script on error
set -e

echo "==================================="
echo "Deploying Zygnixis Laravel App"
echo "==================================="

# Pull latest changes (if using git)
if [ -d .git ]; then
    echo "Pulling latest changes from git..."
    git pull origin main
fi

# Setup environment file if it doesn't exist
if [ ! -f .env ]; then
    echo "Creating .env from .env.example.production..."
    cp .env.example.production .env
    echo "⚠️  IMPORTANT: .env created. You may need to update DB_PASSWORD and other credentials."
else
    echo ".env already exists, skipping..."
fi

# Build and start containers
echo "Building and starting Docker containers..."
docker-compose -f docker-compose.prod.yml up -d --build

# Wait for database to be ready with proper health check
echo "Waiting for database to be ready..."
MAX_TRIES=30
COUNT=0
until docker-compose -f docker-compose.prod.yml exec -T db mysql -u root -p"${DB_PASSWORD:-SecurePassword123!ChangeMe}" -e "SELECT 1" >/dev/null 2>&1; do
    COUNT=$((COUNT+1))
    if [ $COUNT -ge $MAX_TRIES ]; then
        echo "Database failed to become ready in time"
        exit 1
    fi
    echo "Database is unavailable - sleeping (attempt $COUNT/$MAX_TRIES)"
    sleep 3
done
echo "Database is ready!"

# Generate application key if not set
echo "Checking application key..."
docker-compose -f docker-compose.prod.yml exec -T app php artisan key:generate --force

# Run migrations
echo "Running database migrations..."
docker-compose -f docker-compose.prod.yml exec -T app php artisan migrate --force

# Clear and cache config
echo "Optimizing application..."
docker-compose -f docker-compose.prod.yml exec -T app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec -T app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec -T app php artisan view:cache

# Set proper permissions
echo "Setting permissions..."
docker-compose -f docker-compose.prod.yml exec -T app chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "==================================="
echo "✅ Deployment completed successfully!"
echo "==================================="
echo "Your application is now running at: http://163.245.207.48"
