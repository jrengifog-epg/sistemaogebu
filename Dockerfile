# Usa la imagen oficial de PHP 8.1 con Apache
FROM php:8.0.1-apache

# Habilita mod_rewrite
RUN a2enmod rewrite

# Copia los archivos de tu aplicación al directorio por defecto de Apache
COPY . /var/www/html

# Instala las extensiones de PHP que necesites
RUN docker-php-ext-install mysqli pdo pdo_mysql
