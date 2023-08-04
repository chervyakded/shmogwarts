# указывает на базовый образ Docker, использующий PHP версии 8.1.0-fpm
FROM php:8.1.0-fpm

# обновляет список пакетов и устанавливает необходимые зависимости
RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && apt-get install -y libpq-dev \
# установка PHP расширений
# установка и настройка расширений для работы с базой данных PostgreSQL
    && .docker-php-ext-install intl opcache pdo pdo_pgsql \
# установка и настройка расширения для кэширования
    && pecl install apcu \
    && .docker-php-ext-enable apcu \
# настройка и установка расширения для работы с ZIP архивами
    && .docker-php-ext-configure zip \
    && .docker-php-ext-install zip

# устанавливает рабочую директорию для контейнера
WORKDIR /var/www/symfony_docker

# загружает и устанавливает Composer - менеджер зависимостей для PHP
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# загружает и устанавливает Symfony CLI - инструмент командной строки для разработки на Symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
# перемещает исполняемый файл Symfony CLI в директорию, доступную в системном пути
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony