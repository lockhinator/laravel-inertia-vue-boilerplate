FROM php:8.1.6-fpm as builder

WORKDIR /code

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
COPY . /code

# Install all production composer deps
RUN composer install

# allow php-cs-fixer to be executed
RUN chmod +x tools/php-cs-fixer/vendor/bin/php-cs-fixer

FROM node:16

RUN mkdir /var/www

WORKDIR /var/www

COPY --from=builder /code/vendor ./vendor

RUN npm install -g npm@8.1.3

COPY . /var/www

RUN yarn
RUN yarn build