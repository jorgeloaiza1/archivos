FROM php:7.2.2-fpm
MAINTAINER Developer <info@gluky.co>
WORKDIR /var/www/

RUN apt-get update \
    && apt-get --no-install-recommends install -y \
        apt-utils \
        dnsutils \
        wget \
        mysql-client \
        libpq-dev \
        libmemcached-dev \
        curl \
        libcurl4-gnutls-dev libmcrypt-dev libtidy-dev libbz2-dev libxml2-dev libjpeg-dev libfreetype6-dev libjpeg62 libpng-dev libssl-dev libicu-dev libc-client-dev libkrb5-dev \
        jpegoptim \
        libmagickwand-dev \
    && docker-php-ext-install -j$(nproc) pdo pdo_mysql \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

#       Possible values for ext-name:
#       bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv imap
#       interbase intl json ldap mbstring mcrypt mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql
#       pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline recode reflection session shmop simplexml
#       snmp soap sockets spl standard sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zip

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN \
    # default tools
    apt-get install -y zip sudo locales vim nano telnet xvfb yarn gnupg cron

RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

