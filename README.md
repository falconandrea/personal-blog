<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Info about the project

Blog created with Orchid Laravel (for the backend) and Inertia.js (for the frontend).

## Initial config

Follow the guide here [Start Laravel Project](https://github.com/falconandrea/start-laravel-project/blob/main/README.md)

## How to run (with Sail)

Copy and update .env file

```
APP_NAME=OrchidBlog
DB_CONNECTION=mysql
DB_HOST=mysql
DB_USERNAME=laravel
DB_PASSWORD=password
DOMAIN=mydomain.dev
```

Install PHP and NPM dependencies

```
composer install
npm ci
npm run dev
```

Run Sail and initial commands for artisan (key, storage, migrate db...)

```
sail up -d
sail artisan key:generate
sail artisan storage:link
sail artisan migrate
```

Create admin user

```
sail artisan orchid:admin admin admin@admin.com password
```

Backend is now up on `http://localhost/admin`.

## For Production

After git clone project, copy `.env.example` file in `.env` and run

```
docker-compose -f docker-compose.prod.yml up -d
```

After containers are run, enter in `blog` container and run

```
composer update
php artisan migrate
php artisan key:generate
php artisan config:cache
php artisan storage:link
npm install
npm run prod
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
