FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    zip unzip git curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set permission for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy Apache config
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Copy custom start script
COPY docker/start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 80

# Start via custom script (with migrate + serve)
CMD ["/start.sh"]
