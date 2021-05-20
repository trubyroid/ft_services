FROM alpine:3.12

RUN apk update
RUN apk upgrade

RUN apk add nginx libc6-compat mysql mysql-client openrc supervisor

COPY my.cnf /etc/
COPY server_init.sh .
COPY data_base .
COPY wordpress.sql .

EXPOSE 3306

VOLUME ["/var/lib/mysql"]

RUN chmod +x server_init.sh

CMD sh server_init.sh