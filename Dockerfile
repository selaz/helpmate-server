FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
CMD [ "php", "-S localhost:8080", "www/index.php" ]
EXPOSE 8080/tcp