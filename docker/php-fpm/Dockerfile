FROM php:8.0-fpm
RUN apt-get update

# system stuff
RUN apt-get install git --yes
RUN apt-get install net-tools iputils-ping --yes
RUN apt-get install zip unzip --yes
RUN apt-get install vim --yes
RUN apt-get install --yes zlib1g-dev libicu-dev g++

# PHP stuff
COPY ./root_home/.bashrc /root/.bashrc
COPY ./root_home/.vimrc /root/.vimrc
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR  /usr/share/serviceOnlyContainers
EXPOSE 9000

CMD php-fpm
