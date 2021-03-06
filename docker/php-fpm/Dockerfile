FROM php:7.2-fpm-alpine

# Maintainer
MAINTAINER Rian Eka Cahya <rian.eka.cahya@gmail.com>

# Install dependencies
RUN apk --update add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/v3.6/main curl curl-dev 
RUN apk --update add --no-cache \
    --repository http://dl-cdn.alpinelinux.org/alpine/edge/main \
    --repository http://dl-cdn.alpinelinux.org/alpine/edge/community \
    --repository http://dl-cdn.alpinelinux.org/alpine/v3.6/main \
      shadow libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev imagemagick-dev icu-dev openssl-dev gcc g++ autoconf make \
    && docker-php-ext-configure gd \
        --with-gd \
        --with-freetype-dir=/usr/include/ \
        --with-png-dir=/usr/include/ \
        --with-jpeg-dir=/usr/include/ \
    && yes '' | pecl install apcu-5.1.8 \
    && pecl install redis \
    && docker-php-ext-install ctype curl dom gd hash iconv intl json mbstring mysqli opcache pdo pdo_mysql phar posix session simplexml sockets tokenizer xml xmlrpc xmlwriter zip \
    && docker-php-ext-enable apcu redis \
    && apk del gcc g++ autoconf make \
    && rm -rf /var/cache/apk/*

# Disable access log for php-fpm
RUN sed -e '/access.log/s/^/;/' -i /usr/local/etc/php-fpm.d/docker.conf
RUN echo -e "[PHP]\nlog_errors = yes" > /usr/local/etc/php/conf.d/errorlog.ini

# Hack to change uid of 'www-data' to 1000
RUN usermod -u 1000 www-data

# UTF-8 default
ENV LANG en_US.utf8