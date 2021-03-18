FROM phpdockerio/php80-fpm:latest
WORKDIR "/home/forge/laravel.su"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update \
    && apt-get -y --no-install-recommends install \
    php8.0-mysql \
    php8.0-bcmath \
    php8.0-redis \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && ln -sf /usr/share/zoneinfo/Europe/Moscow /etc/localtime
