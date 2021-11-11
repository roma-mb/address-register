<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Address Registration

API REST for address registration, where it searches cities through the IBGE API and persist on database.

### Backend

This is a description on how setup the project and import cities.

required:
```
"php": "^7.4|^8.0",
"friendsofphp/php-cs-fixer": "^3.2",
"laravel/framework": "^8.65",
```

#### .env

Copy .env.example and rename to .env, copy the config below into the file .env

```
# ************************************* #
# ---------- IBGE Config ------------- #
# ************************************* #

IBGE_API=https://servicodados.ibge.gov.br/api
```

#### Mysql

Create user

```
CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
GRANT ALL ON *.* TO 'root'@'localhost';
FLUSH PRIVILEGES;
```

Create database

```
CREATE DATABASE address_register
```

Update .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=address_register
DB_USERNAME=root
DB_PASSWORD=root
```

#### Migrations

run 
```
php artisan migrate
```

#### Command to import Cities

* Description: Import Cities
* Usage: city:import <state>
* Arguments: state

Example:
``
php artisan city:import {state=SP}
``

### Run tests
```
vendor/bin/phpunit
```

### Run cs-fixer
```
composer cs-fixer
```

### Postman 
[Collection](https://www.postman.com/rom-mb/workspace/public-ws/collection/6885147-8a995c05-c34e-4661-9cf9-e56c77a1bc24)
