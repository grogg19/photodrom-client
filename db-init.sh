#!/bin/bash
service mysql start
mysql -u root -e "CREATE USER 'dbuser'@'%' IDENTIFIED BY 'password';"
mysql -u root -e "GRANT ALL PRIVILEGES  ON *.* TO 'dbuser'@'%';"
mysql -u root -e "CREATE DATABASE laravel;"
