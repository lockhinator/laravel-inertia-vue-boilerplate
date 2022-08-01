FROM nginx:1.23

WORKDIR /var/www

# install nodejs 16
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt install -y nodejs
RUN npm install --location=global -y yarn

# Copy existing application directory contents
COPY . /var/www

COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf

RUN chmod +x /var/www/docker/nginx/docker-entrypoint.sh

# install and build the UI assets
RUN yarn

# setup entrypoint
ENTRYPOINT ["/bin/bash", "--", "/var/www/docker/nginx/docker-entrypoint.sh"]