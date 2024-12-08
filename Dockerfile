# Вказуємо базовий образ PHP 8.2 з Apache
FROM php:8.2-apache

# Встановлюємо необхідні PHP розширення для роботи з MySQL
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql

# Оновлюємо пакети операційної системи контейнера
RUN apt-get update && apt-get upgrade -y

# Копіюємо весь код з поточного каталогу в контейнер
COPY ./ /var/www/html/

# Відкриваємо порт 80 для доступу до додатка
EXPOSE 80
