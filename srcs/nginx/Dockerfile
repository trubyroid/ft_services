FROM alpine:3.12

RUN apk update
RUN apk upgrade

RUN apk add nginx openssl libc6-compat openssh supervisor

COPY ./supervisor.conf /etc/supervisord.conf
COPY ./default /etc/nginx/conf.d/default.conf
COPY ./index.html /var/www
COPY ./server_init.sh ./

RUN adduser -D truby
RUN echo truby:truby | chpasswd
RUN chown -R truby:truby /var/lib/nginx
RUN chown -R truby:truby /var/www

WORKDIR /etc/ssl/
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout mykey.key -out mykey.crt -subj "/C=RU/ST=Tatarstan/L=Kazan/O=school21/CN=truby"
WORKDIR /../../
RUN chmod +x ./server_init.sh
RUN mkdir -p /run/nginx

EXPOSE 80 443 22

CMD ["./server_init.sh"]
