#!/bin/bash

cd /var/www/fw_sgf

#git pull origin marcelo
git pull

#composer update --optimize-autoloader --no-dev

#php artisan config:cache

#php artisan route:cache

cp -R /var/www/fw_sgf/public/css /var/www/html/sgf/
cp -R /var/www/fw_sgf/public/fonts /var/www/html/sgf/
cp -R /var/www/fw_sgf/public/img /var/www/html/sgf/
cp -R /var/www/fw_sgf/public/js /var/www/html/sgf/

#/etc/init.d/apache2 restart

