# karvali  
### Karvali is a C.R.U.D. website with authentication, email verification, shop cart functions and many more used to eshops and blog related websites  

## Installation  

git clone https://github.com/jordantsap/karvali.git  
cd karvali  
php artisan key:generate  
composer install  

## Database setup  
Create a db in your dbms system e.g. phpmyadmin, etc  
Run command to install the demo content:  
php artisan migrate --seed  
php artisan serve  
and click the link that appears in your command line tool to your server localhost  