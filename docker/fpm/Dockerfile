FROM php:8.1.6-fpm

WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libodb-pgsql-dev \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# install nodejs 16
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt install -y nodejs
RUN npm install --location=global -y yarn

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install redis
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install XDebug and append the options needed for code coverage
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
RUN echo "xdebug.mode=develop,debug,coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install extensions
RUN docker-php-ext-install pdo_pgsql mbstring zip exif pcntl
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www

# Install all production composer deps
RUN composer install

# install and build the UI assets
RUN yarn
RUN yarn build

# allow php-cs-fixer to be executed
RUN chmod +x tools/php-cs-fixer/vendor/bin/php-cs-fixer

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]