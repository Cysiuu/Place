FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /app

RUN composer install

RUN chmod -R 777 storage bootstrap/cache

EXPOSE 8000

CMD [ "php", "artisan", "serve", "--host=0.0.0.0" ]
