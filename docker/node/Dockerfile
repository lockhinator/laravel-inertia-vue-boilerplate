FROM node:16

RUN npm install -g npm@8.1.3

RUN mkdir /var/www

COPY . /var/www

RUN chown node:node /var/www

USER node

WORKDIR /var/www