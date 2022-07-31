FROM nginx:1.23

WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY . /var/www

RUN apt-get update && apt-get install -y \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# install nodejs 16
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt install -y nodejs
RUN npm install --location=global -y yarn

# install and build the UI assets
RUN yarn
RUN yarn build

COPY docker/nginx/site.conf /etc/nginx/conf.d/default.conf