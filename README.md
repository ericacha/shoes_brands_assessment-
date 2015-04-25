<h1>SHOES & BRANDS </h1>
March 27th, 2015 by Erica Cha

This app will allow the user to make a list of local shoe stores and brands. Will show which brands are available at what store. 

<b>Technology</b>

PHP<br>
Silex ~1.1<br>
Twig ~1.0<br>
PostgreSQL<br>
PHPUnit 4.5 <br>
Composer<br>
Test Driven Development<br>

<b>Setup instructions</b>

Clone this git repository <br>
Set your localhost root folder to ~/shoes_brands_assessments-/web/ <br>
Ensure PHP server is running. <br>
Start Postgres and import shoes.sql database into a new database shoes <br>
Do the same for the test database: shoes_test.sql <br>
Use Composer to install required dependencies in the composer.json file <br>
Start the web app by pointing your browser to the root (http://localhost:8000/) <br>

------------------------------

####License [MIT](https://github.com/twbs/bootstrap/blob/master/LICENSE)

-----------------------------

<b>PSQL commands :</b>

You are now connected to database "laujmimna" as user "laujmimna".
laujmimna=# DROP DATABASE shoes;
DROP DATABASE
laujmimna=# CREATE DATABASE shoes;
CREATE DATABASE
laujmimna=# CREATE TABLE store (id serial PRIMARY KEY, name varchar);
CREATE TABLE                                                 ^
laujmimna=# CREATE TABLE brand (id serial PRIMARY KEY, type varchar);
CREATE TABLE                                                       ^
shoes=# CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);
CREATE TABLE
shoes=# DROP DATABASE shoes_test;
DROP DATABASE
shoes=# CREATE DATABASE shoes_test WITH TEMPLATE shoes;
CREATE DATABASE
