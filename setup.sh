#!/bin/bash

# Install PHP dependencies
composer install --no-progress

# Copy .env.example to .env
cp .env.example .env

# Build Docker containers
./vendor/bin/sail up --build -d

# Generate application key
./vendor/bin/sail php artisan key:generate

# Publish Laravel WebSockets migrations
vendor/bin/sail artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"

# Run database migrations
./vendor/bin/sail php artisan migrate



# Publish Laravel WebSockets config
./vendor/bin/sail artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="config"

# Publish Laravel Sail config
./vendor/bin/sail artisan sail:publish

./vendor/bin/sail php composer dump-autoload
# Install Node.js dependencies
./vendor/bin/sail npm install --no-progress

# Build assets
./vendor/bin/sail npm run dev
