# STAGE 1: The "Kitchen" (Build Stage)
FROM composer:lts as builder

WORKDIR /app

# 1. Copy the "Shopping List"
COPY composer.json composer.lock ./

# 2. ADD THIS LINE: Copy the helper file so Composer doesn't crash
# (If you have multiple helpers, you might need to copy the whole app folder)
COPY app/Helper.php ./app/Helper.php 

# 3. Install dependencies WITHOUT the autoloader first to save time
RUN composer install --no-dev --ignore-platform-reqs --no-interaction --no-autoloader

# 4. Now copy the WHOLE project code
COPY . .

# 5. Finally, generate the "Optimized Autoloader" now that all files exist
RUN composer dump-autoload --no-dev --optimize

################################################################################

# STAGE 2: The "Dining Room" (Production Runtime Stage)
# We start with a fresh, clean PHP image. It doesn't have Composer or Git.
FROM php:8.3.0-fpm-alpine

# Alpine is a tiny Linux distribution (only 5MB) which makes your image very small.
WORKDIR /var/www/html

# Install ONLY the PHP extensions needed to run the app (no build tools)
RUN apk add --no-cache \
    libzip-dev \
    zip \
    unzip \
    libpng-dev \
    && docker-php-ext-install pdo pdo_mysql gd zip

# --- THE MULTI-STAGE MAGIC ---
# We reach back into the 'builder' stage and grab ONLY the vendor folder.
COPY --from=builder /app/vendor /var/www/html/vendor

# Copy the rest of your application code
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]