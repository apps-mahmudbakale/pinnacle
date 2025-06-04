#!/bin/sh

cd /var/www

# php artisan migrate:fresh --seed
php artisan storage:link
php artisan cache:clear
php artisan route:cache
php artisan schedule:run

/usr/bin/supervisord -c /etc/supervisord.conf