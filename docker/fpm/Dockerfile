FROM cameeob2003/laravel-fpm:latest

WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Install all production composer deps
RUN composer install

# allow php-cs-fixer to be executed
RUN chmod +x tools/php-cs-fixer/vendor/bin/php-cs-fixer