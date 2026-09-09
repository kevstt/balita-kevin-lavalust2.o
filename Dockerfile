ARG PHP_VERSION=8.2

FROM php:${PHP_VERSION}-apache

# Install PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Serve only the public directory and allow its rewrite rules.
RUN sed -i 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-available/000-default.conf \
    && printf '%s\n' '<Directory /var/www/html/public>' '    AllowOverride FileInfo' '    Require all granted' '</Directory>' >> /etc/apache2/sites-available/000-default.conf

# Copy app files
COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && apachectl -t

EXPOSE 80