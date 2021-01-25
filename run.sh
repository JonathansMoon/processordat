echo Copying the configuration example file
cp .env.example .env

echo Generate key
php artisan key:generate

echo Run app
php -S localhost:8003 -t public
