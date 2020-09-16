[![Open Source Love](https://badges.frapsoft.com/os/v1/open-source.svg?v=103)](https://github.com/ellerbrock/open-source-badges/)
[![MIT Licence](https://badges.frapsoft.com/os/mit/mit.svg?v=103)](https://opensource.org/licenses/mit-license.php)

# CYBERPLUS

Cyberplus is an inventory management system  built using[Laravel ](https://laravel.com/).


## DESCRIPTION
Cyberplus is an inventory management system  which aims to remove all the clutter and make quality introductions between businesses, investors, acquirers, lenders and advisors, extending beyond their geographical location.
The user have the priviledge to do the following:
- Register for a new account
- Login in into their account


The admin has the priviledge to do the following:
- Login in into their account



## RUNNING THE APPLICATION
- clone [this](https://github.com/kelvinrandu/cyberplus.git) repository
- navigate to the project directory
- add .env file,copy and edit content from .env.example to suit your project
- install project dependencies
```composer install ```
- generate application keys
```$ php artisan key:generate ```
- clear cache
```  php artisan cache:clear ```
- run migrations
``` $ php artisan migrate```
- run the application
``` $ php artisan serve```
