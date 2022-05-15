This is a basic CRUD in Laravel, made as my recruitment process task. 
It contains Employees, Practices and Fields of practices 

## Setup instructions

* Clone git repository

`git clone https://github.com/Dante383/healthtest`

* Rename .env.sample to .env, change parameters if necessary

`mv .env.sample .env`

* Get containers running

`./vendor/bin/sail up`

* Migrate database structure

`docker-compose exec healthtest_laravel.test_1 php artisan migrate`

* Seed the database

`docker-compose exec healthtest_laravel.test_1 php artisan db:seed`

* Install and run npm 

`npm run install && npm run dev`

* Your installation should now be visible on `localhost`, you can login with following credentials:
	username: administrator
	password: administrator1