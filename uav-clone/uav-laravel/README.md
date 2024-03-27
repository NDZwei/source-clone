Before starting uav-laravel required `cd uav-laravel` and change config in `uav-laravel\.env`
In cmd run:
    - `composer update`
    - `composer install`
    - `php artisan migrate`
    - `php artisan key:generate`
    - `php artisan db:seed`
    - `php artisan storage:link`
    - `php artisan passport:install`


Other with cmd:
    - make model and migration: `php artisan make:model {name_model} -m` 
    - make request: `php artisan make:request NameRequest`
    - add library excel: `composer require maatwebsite/excel`
    - add passport (xác thực OAuth2): `composer require laravel/passport --ignore-platform-req=ext-sodium` (Trường hợp không có extension ext-sodium trong php.ini)

