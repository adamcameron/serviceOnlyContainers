FROM php:8.0-fpm
RUN apt-get update

# system stuff
RUN apt-get install git --yes
RUN apt-get install net-tools iputils-ping --yes
RUN apt-get install zip unzip --yes
RUN apt-get install vim --yes
RUN apt-get install --yes zlib1g-dev libicu-dev g++

## env stuff
COPY ./root_home/.bashrc /root/.bashrc
COPY ./root_home/.vimrc /root/.vimrc
ENV XDEBUG_MODE=coverage

# PHP stuff
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN pecl install xdebug-3.0.1 && docker-php-ext-enable xdebug
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR  /usr/share/serviceOnlyContainers
EXPOSE 9000

CMD php-fpm
