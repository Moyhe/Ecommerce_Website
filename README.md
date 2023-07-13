## Ecommerce Wesbite 

laravel 10 Ecommerce website  with docker and MySQL. it has filament admin panel 

## Installation with docker

1. Clone the project

git clone https://github.com/Moyhe/Ecommerce_Website.git

2. Run composer install

Navigate into project folder using terminal and run

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

3. Copy .env.example into .env

cp .env.example .env

4. Start the project in detached mode

./vendor/bin/sail up -d

From now on whenever you want to run artisan command you should do this from the container.
Access to the docker container

./vendor/bin/sail bash

5. Set encryption key

php artisan key:generate --ansi

6. Run migrations

php artisan migrate

7. Add Filament Admin user

php artisan make:filament-user
