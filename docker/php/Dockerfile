FROM php:8.2-fpm

WORKDIR "/home/forge/laravel.su"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# ------------------------------------------------------------------------------
# Install Dependencies
# ------------------------------------------------------------------------------

RUN apt-get update \
    && pecl channel-update pecl.php.net \
    && apt-get -y --no-install-recommends install \
      libzip-dev \
      libicu-dev \
      libpq-dev \
      unzip \
      git \
      curl

# ------------------------------------------------------------------------------
# Install PHP
# ------------------------------------------------------------------------------

# Composer
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# APCU
RUN pecl install apcu
RUN docker-php-ext-enable apcu

# INTL
RUN docker-php-ext-install intl
RUN docker-php-ext-enable intl

# PDO PostgreSQL
RUN docker-php-ext-install pdo_pgsql
RUN docker-php-ext-enable pdo_pgsql

# Zip
RUN docker-php-ext-install zip
RUN docker-php-ext-enable zip

# Opcache
RUN docker-php-ext-install opcache

# Sockets
RUN docker-php-ext-install sockets

# ------------------------------------------------------------------------------
# Cleanup Dependencies
# ------------------------------------------------------------------------------

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Etc/UTC /etc/localtime
