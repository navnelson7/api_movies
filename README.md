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
## Detail endpoing
* server http://127.0.0.1:8000
```
GET /api​/movies Show All Movies
```
```
POST ​/api​/movies​/store Store new movies (require jwt token authentication and role admin)
```
```
GET ​/api​/movies​/{id} Show on movie finding by id (require jwt token authentication and role admin)
```
```
PUT ​/api​/movies​/{id} Update movie finding by id (require jwt token authentication and role admin)
```
```
DELETE ​/api​/movies​/{id} Deleting a movie (require jwt token authentication and role admin)
```
* detail endpoint auth
```
GET /api/register Register new user (no require authentication)
```
```
POST /api/login Login Session
```
```
POST /api/logout Logout session (require jwt authentication)
```
*  endpoint stock
```
GET /api/stock/ get all register stock
```
```
POST /api/stock/store (require jwt token authentication and role admin)
```
```
PUT /api/stock/{id} update stock (require jwt token authentication and role admin)
```
```
DELETE /api/stok/{id} delete stock (require jwt token authentication and role admin)
```
* End Point Rental
```
GET /api/rentals/ get all register rentals (require jwt token authentication and role admin)
```
```
POST /api/rentals new register rentals (require jwt token authentication and role admin)
```
* EndPoint Rental Dentails
```
GET /api/rental_detail get all register detail rentals (require jwt token authentication and role admin)
```
```
POST /api/rental_detail new register detail of rentals (require jwt token authentication and role admin)
```
** Collecton shared with postman
```
https://www.getpostman.com/collections/650c1cbf5f5595c33080
```