# Dockerfile

# Используем официальный образ PHP с FPM
FROM php:8.2-fpm

# Устанавливаем зависимости и расширения PHP
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libzip-dev unzip git libonig-dev libxml2-dev

# Устанавливаем расширения PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd mysqli pdo pdo_mysql

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем файлы приложения
COPY . .

# Устанавливаем зависимости Laravel
RUN composer install

# Настраиваем права на папки
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Запускаем PHP-FPM
CMD ["php-fpm"]

# Открываем порт 9000 для PHP-FPM
EXPOSE 9000
