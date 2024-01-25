FROM php:8.1-fpm



# アプリ名に応じて変更
WORKDIR /var/www/html/okugai-ad



RUN apt-get update \
  && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    nodejs \
    npm



# composer スクリプトのダウンロード
RUN cd /usr/bin \
    && curl -sS https://getcomposer.org/installer | php \
    && ln -s /usr/bin/composer.phar /usr/bin/composer



RUN apt-get install -y mariadb-client libmariadb-dev \
    && docker-php-ext-install pdo_mysql



# Set the PATH for Composer
ENV PATH="${PATH}:/usr/bin"