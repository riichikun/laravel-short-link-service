FROM php:8.4-fpm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libpq-dev \
    git \
    curl \
    libzip-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_pgsql pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN chmod 1777 /tmp && chown -R www-data:www-data /var/www/html

USER www-data

WORKDIR /var/www/html
