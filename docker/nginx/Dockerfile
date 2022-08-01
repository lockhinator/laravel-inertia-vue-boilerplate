FROM nginx:1.23

WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf