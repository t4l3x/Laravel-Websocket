#!/bin/bash

# Install PHP dependencies
composer install --no-progress

# Copy .env.example to .env
cp .env.example .env

# Build Docker containers
./vendor/bin/sail up --build -d

# Generate application key
./vendor/bin/sail php artisan key:generate


./vendor/bin/sail npm install --no-progress

# Build assets
./vendor/bin/sail npm run dev
