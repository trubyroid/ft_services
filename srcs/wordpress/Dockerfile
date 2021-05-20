FROM alpine:3.12

RUN apk update
RUN apk upgrade
RUN apk add nginx supervisor wget php-fpm openrc php7 php7-fpm php7-opcache
RUN apk add php7-gd php7-mysqli php7-zlib php7-curl php7-mbstring php7-json php7-session libc6-compat

RUN wget https://ru.wordpress.org/latest-ru_RU.tar.gz
RUN tar -xvf latest-ru_RU.tar.gz && rm -rf latest-ru_RU.tar.gz

RUN mv wordpress ./var/www/
COPY ./supervisor.conf /etc/supervisord.conf
COPY ./nginx.conf /etc/nginx/conf.d/default.conf
COPY ./wp-config.php ./var/www/wordpress/
COPY ./server_init.sh ./

RUN chmod +x ./server_init.sh
RUN mkdir -p /run/nginx

EXPOSE 5050

CMD ["./server_init.sh"]