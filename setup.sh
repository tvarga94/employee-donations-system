#!/bin/bash

echo "Starting setup for Employee Donation System..."

# 1. Install PHP dependencies
echo "Installing PHP dependencies..."
composer install

# 2. Start Docker containers
echo "Starting Laravel Sail (Docker)..."
./vendor/bin/sail up -d

# 3. Generate application key
echo "Generating application key..."
./vendor/bin/sail artisan key:generate

# 4. Run database migrations and seeders
echo "Running migrations and seeders..."
./vendor/bin/sail artisan migrate --seed

# 5. Run the test suite
echo "Running tests..."
./vendor/bin/sail test

echo "Running PHPStan analysis..."
./vendor/bin/sail exec laravel.test ./vendor/bin/phpstan analyse

echo ""
echo "Setup complete!"
echo "Swagger available at: http://localhost/api/documentation"
