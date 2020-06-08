## Restful API to manage a small movie retal
RestFul API to manage a small movie rental and sale, using JWT authentication, build on laravel 7.x

## Requirements
* PHP>=7.2.5
* MySQL>=8
* Laravel 7.x
* Composer 

## Download for development mode
* clone to project
'''
https://gitlab.com/applaudostudios/php-test/juan-navarro.git
'''

## Instaling dependencies
```
composer update
```
## Generate key to laravel
* accesssing the project directory
```
cd jun-navarro/
```
* configure environment in .env file
```
cambiar el nombre .env.example a .env
```

* Configure credentials to connect to mysql
```
DB_CONNECTION=mysql
```
```
DB_HOST=127.0.0.1
```
```
DB_PORT=3306
```
```
DB_DATABASE=movies
```
```
DB_USERNAME=root
```
```
DB_PASSWORD=lasttip
```
* generating key

```
php artisan key:generate
```

## Generate key to JWT
```
php artisan jwt:secret
```

## Ejecuting migration
```
php artisan migrate
```

## View documentation
* generating documentation
```
php artisan l5-swagger:generate
```
* view documentation
```
http://localhost:8000/api/documentation
```

## startin server
```
php artisan serve
```
