FROM php:8.2-apache

# Instalar extensión de PostgreSQL
RUN docker-php-ext-install pgsql pdo pdo_pgsql

# Copiar archivos del proyecto
COPY . /var/www/html/

# Dar permisos (opcional pero recomendado)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
