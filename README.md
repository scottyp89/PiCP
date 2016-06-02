# PiCP
I do web design part time and use more than 1 machine at home (switch between my MacBook Pro and my PC) and have found this really annoying when databases are involved.

I've written this small web based utility to run on Raspbian (currently have this running on a Pi1) to create new hosting directories and install WordPress much more easily than I was doing before.

This is also my first time contributing to GitHub, so not really sure what I'm doing! Unsure if permissions requirements will copy over or not...

# Requirements
Install Apache, PHP, MySQL, PHPMyAdmin, Samba (optional, but very useful).

# Setup
Once the required packages are installed, simply clone to /var/www/html and then browse to your Pi's IP, the rest should be self explanitory!

I have had to add the following to the sudoers file:

www-data ALL=NOPASSWD: /var/www/html/includes/bash/wordpress.sh

# Permissions
Not sure if Git copies permissions or not, I'm assuming not...
Run the following commands:

sudo chown pi:www-data /var/www/html -R

sudo chmod 750 /var/www/html -R

sudo chmod 770 /var/www/html/conf

sudo chmod 770 /var/www/html/sites/www
