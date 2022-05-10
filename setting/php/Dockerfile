FROM php:5.6-fpm

RUN apt-get update && \
  apt-get -y install unzip libzip-dev libicu-dev libonig-dev

# ImageMagickの依存パッケージ
RUN apt-get -y install gcc pkg-config libmagickwand-dev

# ImageMagickの依存パッケージ
RUN pecl install imagick-3.4.4

RUN docker-php-ext-install intl pdo

RUN pecl install xdebug-2.5.5 && \
  docker-php-ext-enable xdebug

RUN apt-get clean && \
  rm -rf /var/lib/apt/lists/*

WORKDIR /work
