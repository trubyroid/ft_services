#!/bin/sh

# kubectl delete deploy nginx-deployment
# kubectl delete svc nginx-svc
# kubectl delete deploy wp-deployment
# kubectl delete svc wp-serv
# kubectl delete deploy php-deployment
# kubectl delete svc php-serv
# kubectl delete deploy mysql-deployment
# kubectl delete svc sql-serv
# kubectl delete deploy grafana-deployment
# kubectl delete svc grafana-serv
# kubectl delete deploy influxdb-deployment
# kubectl delete svc influxdb-serv
# kubectl delete deploy ftps-deployment
# kubectl delete svc ftps-svc

minikube start --vm-driver=virtualbox --disk-size="10000mb" --memory="4000mb"
minikube addons enable metallb
minikube addons enable dashboard

eval $(minikube docker-env)

kubectl apply -f ./srcs/yaml_files/configmap.yaml
docker build -t nginx_image ./srcs/nginx
docker build -t wp_image ./srcs/wordpress
docker build -t phpmyadmin_image ./srcs/phpmyadmin
docker build -t mysql_image ./srcs/mysql
docker build -t influx_image ./srcs/influxdb
docker build -t ftps_image ./srcs/ftps
docker build -t grf_image ./srcs/grafana

kubectl apply -f ./srcs/yaml_files/nginx.yaml
kubectl apply -f ./srcs/yaml_files/wordpress.yaml
kubectl apply -f ./srcs/yaml_files/phpmyadmin.yaml
kubectl apply -f ./srcs/yaml_files/sql.yaml
kubectl apply -f ./srcs/yaml_files/influxdb.yaml
kubectl apply -f ./srcs/yaml_files/ftps.yaml
kubectl apply -f ./srcs/yaml_files/grafana.yaml