FROM php:8.3-cli

# Dependencias + extensiones comunes para Laravel/MySQL
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip bcmath \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Dependencias PHP (producción)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permisos Laravel (storage/cache)
RUN chmod -R 775 storage bootstrap/cache || true

EXPOSE 80

# ✅ Arranque: sin $PORT, sin Apache
CMD ["sh", "-lc", "php -S 0.0.0.0:80 -t public"]
