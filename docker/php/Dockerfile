FROM php:8.1-fpm
WORKDIR "/home/forge/laravel.su"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update

# ------------------------------------------------------------------------------
# Installation Dependencies
# ------------------------------------------------------------------------------

# Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# PDO MySQL
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-enable pdo_mysql


# ------------------------------------------------------------------------------
# Cleanup Dependencies
# ------------------------------------------------------------------------------

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Europe/Moscow /etc/localtime
