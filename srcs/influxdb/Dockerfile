FROM alpine:3.12

RUN apk update
RUN apk upgrade
RUN apk add mysql mysql-client ca-certificates supervisor influxdb

RUN mkdir -p /var/lib/influxdb
RUN mkdir -p /run/influxdb
RUN mkdir etc/telegraf

RUN wget -q -O /etc/apk/keys/sgerrand.rsa.pub https://alpine-pkgs.sgerrand.com/sgerrand.rsa.pub
RUN wget https://github.com/sgerrand/alpine-pkg-glibc/releases/download/2.32-r0/glibc-2.32-r0.apk
RUN apk add glibc-2.32-r0.apk
RUN wget https://dl.influxdata.com/telegraf/releases/telegraf-1.6.3-static_linux_amd64.tar.gz
RUN tar -C . -xzf telegraf-1.6.3-static_linux_amd64.tar.gz 
RUN chmod +x telegraf/*
RUN mv telegraf/telegraf usr/bin/
RUN rm -rf *.tar.gz* telegraf
RUN ./usr/bin/telegraf -sample-config --input-filter docker --output-filter influxdb > /etc/telegraf/telegraf.conf

COPY supervisor.conf /etc/supervisord.conf

COPY server_init.sh ./
RUN chmod +x ./server_init.sh

EXPOSE 8086
CMD sh server_init.sh