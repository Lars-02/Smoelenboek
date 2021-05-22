# smoelenboek/bin/ci-dusk

#!/usr/bin/env bash

php artisan dusk:chrome-driver `/opt/google/chrome/chrome --version | cut -d " " -f3 | cut -d "." -f1`
chmod -R 0755 vendor/laravel/dusk/bin/
php artisan serve  > /dev/null 2>&1 &
curl localhost:8000 &
./vendor/laravel/dusk/bin/chromedriver-linux > /dev/null 2>&1 &