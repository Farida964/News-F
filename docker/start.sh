#!/bin/bash

# Laravel setup
php artisan config:clear
php artisan config:cache
php artisan migrate --force
php artisan storage:link || true

# Start Apache
apache2-foreground
