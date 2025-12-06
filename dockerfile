FROM php:8.2-apache

# Installer PDO/MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copier projet entier
COPY ./projet /var/www/html

# Configurer Apache pour que DocumentRoot pointe sur public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Permet de rewrite avec le htaccess
RUN a2enmod rewrite