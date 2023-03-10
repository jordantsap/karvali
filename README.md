#1 Install instructions.  

#2
composer install  
(if gives error about null translatable locale value, change the config('translatable.locale') to match any locale you use)  

php artisan migrate:fresh --seed  
(Most of the seeds are in gr and english languages, expecially the infrastructure models like ModelTypes)  
Remove unwanted seeders from DatabaseSeeder file and rerun php artisan migrate:fresh --seed   
