# Use an official PHP runtime as a parent image
FROM php:8.2-apache

# Set the working directory to /app
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copy the current directory contents into the container at /app
COPY . /var/www/html
# Set up the virtual host for Apache
RUN a2enmod rewrite
RUN service apache2 restart

COPY .env.example .env
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install application dependencies
RUN composer install --no-interaction --no-plugins --no-scripts

RUN chown -R www-data:www-data /var/www 
RUN chmod -R 755 /var/www/html/storage

# RUN php artisan serve
RUN php artisan key:generate

# Expose port 80 and start Apache
EXPOSE 80
CMD ["apache2-foreground"]