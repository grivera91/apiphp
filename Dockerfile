FROM php:8.2-cli

WORKDIR /var/www/html/

COPY . .

EXPOSE 10000
