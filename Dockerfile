FROM php:7.4-cli
COPY . /usr/src/myapp
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
WORKDIR /usr/src/myapp
VOLUME /app/data
RUN composer install
CMD php -S 0.0.0.0:8080 www/index.php
EXPOSE 8080