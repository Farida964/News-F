#!/bin/bash

php artisan config:clear
php artisan config:cache
php artisan migrate --force

apache2-foreground
