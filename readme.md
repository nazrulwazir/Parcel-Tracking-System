### Pos Laju Tracking System

# Installation
- Download or Clone this repository
```
git clone git@github.com:nazrulwazir/Pos-Laju-Tracking-System.git
```
- Copy or rename file ```.env.example``` to ```.env```
-  Open up Command Prompt(CMD) or Terminal in the project directory and run these commands:
```
composer install
php artisan key:generate
```
- Launch web server
```
php artisan serve
```

How to use:
* ```http://site.com/api/manage/pos-laju-api/{trackingNumber}```
* where ```trackingNumber``` is your tracking number
* It will then return a JSON formatted string, you can parse the JSON string and do what you want with it.

Visit: [https://parcel.nazrulwazir.com/](https://semakan.nazrulwazir.com)

# Credits
- Laravel PHP Framework - https://laravel.com/docs/5.6/installation
- Material Kit Theme - https://demos.creative-tim.com/material-kit/index.html

# License
This library is under MIT license, please look at the `LICENSE` file
