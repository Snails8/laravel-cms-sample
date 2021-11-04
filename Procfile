release: ./heroku-entrypoint.sh
web: vendor/bin/heroku-php-nginx -C .heroku/nginx/nginx.conf public/
worker: php artisan queue:work --tries=1

