FROM alpine:3.12

RUN apk update
RUN apk upgrade
RUN apk add openrc openssl libc6-compat vsftpd

RUN openssl req -newkey rsa:2048 -x509 -sha256 -days 365 -nodes \
	-out /etc/ssl/ftps_ssl.pem \
	-keyout /etc/ssl/ftps_ssl.pem \
	-subj "/C=RF/ST=Tatarstan/L=Kazan/O=school21/OU=truby/CN=ft_service"
RUN printf "truby\ntruby\n" | adduser truby -s /bin/false -h /truby
RUN chown truby:truby /truby

COPY vsftpd.conf /etc/vsftpd/vsftpd.conf
COPY ./server_init.sh ./

RUN chmod +x ./server_init.sh

EXPOSE 21 21000
CMD sh server_init.sh