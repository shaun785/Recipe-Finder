FROM ubuntu:14.04

MAINTAINER Shaunak Deshmukh "shaunak.desh@gmail.com"

ENV DEBIAN_FRONTEND=noninteractive

RUN echo "deb http://archive.ubuntu.com/ubuntu/ precise universe" >> /etc/apt/sources.list
RUN apt-get update
RUN apt-get -y install dialog net-tools lynx nano wget
RUN apt-get -y install software-properties-common python-software-properties
RUN add-apt-repository -y ppa:nginx/stable
RUN add-apt-repository -y ppa:ondrej/php5-oldstable
RUN apt-get update

RUN apt-get -y install nginx php5-fpm php5-mysql php-apc php5-imagick php5-imap php5-mcrypt

ADD ./docker/recipe-finder.conf /etc/nginx/sites-available/default
COPY . /var/www
RUN echo "cgi.fix_pathinfo = 0;" >> /etc/php5/fpm/php.ini
RUN echo "daemon off;" >> /etc/nginx/nginx.conf
RUN usermod -u 1000 www-data

EXPOSE 80

CMD cd /var/www/ && php app/console cache:clear && rm -rf app/cache/* && rm -rf app/logs/*
CMD service php5-fpm start && nginx