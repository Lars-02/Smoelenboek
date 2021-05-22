# smoelenboek/bin/ci

#!/usr/bin/env bash

cp .env.example .env
composer install -q --no-ansi --no-interaction --no-scripts --no-progress --prefer-dist
chmod -R 777 storage bootstrap/cache
php artisan key:generate
php artisan config:clear