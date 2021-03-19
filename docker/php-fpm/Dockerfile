FROM php:8.0-fpm
RUN apt-get update

# system stuff
RUN apt-get install git --yes
RUN apt-get install net-tools iputils-ping --yes
RUN apt-get install zip unzip --yes
RUN apt-get install vim --yes
RUN apt-get install --yes zlib1g-dev libicu-dev g++

# PHP stuff
#RUN docker-php-ext-install pdo_mysql
#RUN docker-php-ext-configure intl
#RUN docker-php-ext-install intl
COPY ./root_home/.bashrc /root/.bashrc
COPY ./root_home/.vimrc /root/.vimrc
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./.ssh/ /root/.ssh/
RUN chmod -R 600 /root/.ssh/
WORKDIR  /usr/share
#RUN git clone git@github.com:adamcameron/serviceOnlyContainers.git
WORKDIR  /usr/share/serviceOnlyContainers
EXPOSE 9000

CMD php-fpm
