FROM php:8.1-apache

WORKDIR /var/www/html

COPY . .

RUN apt-get update && apt-get install -y \
    libonig-dev \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl

RUN apt-get update && apt-get install -y --no-install-recommends libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ --with-webp=/usr/include/ && \
    docker-php-ext-install -j$(nproc) gd

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!' /etc/apache2/sites-available/*.conf

RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite headers

RUN chmod -R 777 ./storage

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer