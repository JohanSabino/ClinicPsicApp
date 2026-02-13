# =========================
# 1) Build de frontend (Vite)
# =========================
FROM node:20-alpine AS frontend
WORKDIR /app

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build


# =========================
# 2) Backend PHP (Laravel)
# =========================
FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip bcmath \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# ✅ Copiamos el build de Vite al contenedor final
COPY --from=frontend /app/public/build /app/public/build

RUN chmod -R 775 storage bootstrap/cache || true

EXPOSE 80
CMD ["sh", "-lc", "php -S 0.0.0.0:80 -t public"]
