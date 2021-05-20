FROM alpine:3.12

RUN apk update
RUN apk upgrade
RUN apk add supervisor ca-certificates wget

RUN	wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub
RUN wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.32-r0/glibc-2.32-r0.apk
RUN apk add glibc-2.32-r0.apk
RUN mkdir -p /var/lib/influxdb

RUN wget https://dl.grafana.com/oss/release/grafana-7.4.1.linux-amd64.tar.gz
RUN tar -zxvf grafana-7.4.1.linux-amd64.tar.gz && rm -rf grafana-7.4.1.linux-amd64.tar.gz
RUN mv grafana-7.4.1 grafana

COPY ./grafana.db ./grafana/data/grafana.db
COPY supervisor.conf /etc/supervisord.conf
COPY server_init.sh ./

RUN chmod +x ./server_init.sh
EXPOSE 3000
CMD sh server_init.sh
