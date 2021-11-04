#!/bin/bash
set -e

COLOR="\e[1;32m"
COLOR_END="\e[00m"

if [ $APP_ENV = "development" ]; then

    printf "$COLOR:: DB Migration and Seed ...$COLOR_END\n"
    php artisan migrate:refresh --seed --force

else

    printf "$COLOR:: DB Migrate...$COLOR_END\n"
    php artisan migrate --force

fi

printf "$COLOR:: Finish DB setup !$COLOR_END\n"