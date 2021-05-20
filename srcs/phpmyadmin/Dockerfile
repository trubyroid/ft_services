FROM alpine:3.12

RUN apk update 
RUN apk upgrade
RUN apk add nginx supervisor wget php-fpm openrc php7 php7-fpm php7-opcache
RUN apk add php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session libc6-compat 

RUN wget https://files.phpmyadmin.net/phpMyAdmin/5.0.4/phpMyAdmin-5.0.4-all-languages.tar.gz
RUN tar -xvf phpMyAdmin-5.0.4-all-languages.tar.gz && rm -rf phpMyAdmin-5.0.4-all-languages.tar.gz
RUN mv  phpMyAdmin-5.0.4-all-languages ./var/www/phpmyadmin

COPY ./supervisor.conf /etc/supervisord.conf
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
COPY ./config.inc.php ./var/www/phpmyadmin/

COPY ./server_init.sh ./
RUN chmod +x ./server_init.sh

RUN mkdir -p /run/nginx

EXPOSE 5000

CMD sh server_init.sh