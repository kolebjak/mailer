FROM php:7.2-apache

COPY index.php /var/www/html/index.php

EXPOSE 80

# docker build -t mailer .
# docker run -p 80:80 mailer -e ENV="TEST"
