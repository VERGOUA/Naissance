#!/usr/bin/env bash
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password 123"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password 123"
sudo aptitude install -q -y -f  mysql-server mysql-client php5-mysql
mysql -uroot -p123 -e 'CREATE DATABASE `vergo_base` CHARACTER SET `utf8` COLLATE `utf8_bin`;'