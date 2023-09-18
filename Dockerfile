FROM php:7.4-cli

RUN apt-get update && \
    apt-get install -y --no-install-recommends libssl-dev zlib1g-dev curl git unzip netcat libxml2-dev libpq-dev libzip-dev && \
    pecl install apcu && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY . /var/www

WORKDIR /var/www

CMD composer i -o ;  php -S 0.0.0.0:8000

EXPOSE 8000
