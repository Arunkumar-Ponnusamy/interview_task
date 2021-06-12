## Installation Steps and Guide

## Go to Project folder in terminal and execute following steps

composer install

php -r "file_exists('.env') || copy('.env.example', '.env');"

Update .env (create DB & update)

check branch and give "php artisan key:generate"

sudo chmod -R 777 storage/

sudo chmod -R 777 bootstrap/

php artisan migrate

php artisan db:seed

Update the database and smtp details on env

Run the project by giving "php artisan serve"