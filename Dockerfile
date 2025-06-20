FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

RUN a2enmod rewrite
RUN php artisan config:clear && \
    php artisan config:cache && \
    php artisan migrate --force

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
