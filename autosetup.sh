#!/bin/bash

set -e

echo "========================================"
echo " Laravel Application Setup"
echo "========================================"

echo ""
echo "[1/5] Installing Composer dependencies..."
composer install

echo ""
echo "[2/5] Generating application key..."
php artisan key:generate

echo ""
echo "[3/5] Running database migrations..."
php artisan migrate

echo ""
echo "[4/5] Creating storage symlink..."
php artisan storage:link

echo ""
echo "[5/5] Starting Laravel development server..."
php artisan serve