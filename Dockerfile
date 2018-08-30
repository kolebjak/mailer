FROM php:7.2-apache

COPY index.php /var/www/html/index.php

# disable access log
RUN rm /var/log/apache2/access.log

EXPOSE 80

# docker build -t mailer . && docker run -p 80:80 -e ENV="TEST" mailer
