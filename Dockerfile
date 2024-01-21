# Use the official PHP 8 image as the base image
FROM php:8.0-fpm

# Install required dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy the Laravel application files to the container
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --optimize-autoloader

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

# Expose port 9000 for the PHP-FPM server
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]
