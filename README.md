## First steps for development

`cp .env.example .env`

Set up right creds for database

## Local serve

- `composer install`
- `php artisan jwt:secret`
- `php artisan migrate`
- `php artisan serve`

TODOs:

- replace all data files in `app/Data/*` in controllers with request objects
- modify and use data files in `app/Data/*` as dto for services in `app/Services/*`
