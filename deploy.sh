#!/usr/bin/env bash

cd /home/forge/demo.maelstrom-cms.com

git reset --hard
git clean -df

git pull

composer install -n

npm install
npm run production

php artisan cache:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "" | sudo -S service php7.2-fpm reload
