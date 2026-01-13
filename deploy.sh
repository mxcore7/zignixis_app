#!/bin/bash

# Stop script on error
set -e

echo "Deploying application..."

# Pull latest changes
git pull origin main

# Build and start containers
docker-compose -f docker-compose.prod.yml up -d --build

# Run migrations
docker-compose -f docker-compose.prod.yml exec app php artisan migrate --force

# Clear and cache config
docker-compose -f docker-compose.prod.yml exec app php artisan config:cache
docker-compose -f docker-compose.prod.yml exec app php artisan route:cache
docker-compose -f docker-compose.prod.yml exec app php artisan view:cache

echo "Deployment finished!"
