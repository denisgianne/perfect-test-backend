#!/bin/bash
docker-compose build; 
docker-compose -p perfectpay up -d;
docker exec -t perfectpay_php composer install
docker exec -t perfectpay_php php artisan migrate
# open in macos
open -a "Google Chrome" http://localhost:83
# open in linux
google-chrome http://localhost:83