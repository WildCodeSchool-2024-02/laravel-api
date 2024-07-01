#!/bin/sh
mkdir -p /var/www/public/uploads
chmod -R 777 /var/www/public/uploads
set -e

## Laravel configuration
composer install --optimize-autoloader --no-dev
php artisan key:generate --force
php artisan migrate --force
npm run production

chmod -R 777 /var/www/storage
chmod -R 777 /var/www/public

# run composer scripts like
# assets:install public
# ckeditor:install and so on
composer run post-install-cmd

## server config
php-fpm -D &
nginx -g "daemon off;"
