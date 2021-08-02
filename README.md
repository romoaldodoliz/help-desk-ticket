## About This Project

<img src='project-screenshot.png' width='1080px' heigth='435px'>
This project is based on a system for managing support tickets.

##  Build With
* <a href='https://laravel.com/'>Laravel Framework</a>
* <a href='https://www.php.net/'>PHP</a>
* <a href='https://www.mysql.com/'>MySQL</a>
* <a href='https://getbootstrap.com/'>Bootstrap</a>
* <a href='https://adminlte.io/'>AdminLTE</a>
## Getting Started

#### Cloning the project
```shell
git clone -b relationship https://github.com/gustavors22/help-desk-ticket.git 
cd help-desk-ticket-adminlte
```
#### Running the project
```shell
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
