FROM php:8.0-fpm
RUN apt-get update

# system stuff
RUN apt-get install git --yes
RUN apt-get install net-tools iputils-ping --yes
RUN apt-get install zip unzip --yes
RUN apt-get install vim --yes
RUN apt-get install --yes zlib1g-dev libicu-dev g++

# SSH stuff
RUN apt-get install openssh-server --yes
RUN useradd -rm -d /home/ubuntu -s /bin/bash -g root -G sudo -u 1000 sshAccess 
RUN usermod -aG sudo sshAccess
RUN  echo 'sshAccess:sshAccess' | chpasswd
EXPOSE 22

# PHP stuff
#RUN docker-php-ext-install pdo_mysql
#RUN docker-php-ext-configure intl
#RUN docker-php-ext-install intl
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY ./.ssh/ /root/.ssh/
RUN chmod -R 600 /root/.ssh/
WORKDIR  /usr/share
RUN git clone git@github.com:adamcameron/serviceOnlyContainers.git
WORKDIR  /usr/share/serviceOnlyContainers
RUN git pull
CMD php-fpm
EXPOSE 9000
