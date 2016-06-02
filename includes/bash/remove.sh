#!/bin/bash -e
site=$1
rm -rf /var/www/html/sites/www/$1
rmdir /var/www/html/sites/www/$1
rm -rf /var/www/html/conf/$1.conf
