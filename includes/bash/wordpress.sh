#!/bin/bash -e
site=$1
dbname=$2
dbuser=$3
dbpass=$4
#download wordpress
cd /var/www/html/includes/temp
curl -O https://wordpress.org/latest.tar.gz
#unzip wordpress
tar -zxvf latest.tar.gz
#change dir to wordpress
cd wordpress
#copy files to site dir
mv -f * /var/www/html/sites/www/$site
#move back to parent dir
cd ..
#remove wordpress folder
rm -rf wordpress
rm latest.tar.gz
#move to site dir
cd /var/www/html/sites/www/$site
chown www-data:www-data * -R
chmod 750 * -R
#create wp config
mv wp-config-sample.php wp-config.php
#set database details with perl find and replace
perl -pi -e "s/database_name_here/$dbname/g" wp-config.php
perl -pi -e "s/username_here/$dbuser/g" wp-config.php
perl -pi -e "s/password_here/$dbpass/g" wp-config.php
#create uploads folder and set permissions
mkdir wp-content/uploads
chmod 775 wp-content/uploads
