FROM php:apache

WORKDIR /var/www/html

RUN a2enmod rewrite && \
    docker-php-ext-install pdo pdo_mysql && \
    docker-php-ext-install mysqli && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer && \
    apt-get update; \
    apt-get install -y --no-install-recommends \
    git \
    unzip \
    vim && \
    rm -rf /var/lib/apt/lists
