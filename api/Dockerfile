# Usar PHP/Apache
FROM php:8.2-apache

# Instalar extensiones y utilerías
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libpng-dev libonig-dev libxml2-dev zip \
  && docker-php-ext-install pdo pdo_mysql zip mbstring exif pcntl

# Instalar Composer desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

COPY . /var/www/html
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Añadir los seeders
# RUN php artisan migrate --seed --force

RUN mkdir -p database \
 && touch database/database.sqlite \
 && chown www-data:www-data database/database.sqlite

# Ajustar permisos
RUN chown -R www-data:www-data /var/www/html \
  && chmod -R 755 /var/www/html

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

# Ajuste de Apache para Cloud Run
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

ENV APACHE_RUN_PORT=8080
EXPOSE 8080

# Iniciar Apache
CMD ["apache2-foreground"]