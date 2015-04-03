<h1>SHOES & BRANDS </h1>
March 27th, 2015

by Erica Cha

A list of local shoe stores and the brands they carry. Allow user to input shoes and brands and also see what brands are sold at the store.
------------------------------
<h2>Technology</h2>
<br>
PHP<br>
Silex<br>
Twig<br>
PostgreSQL<br>
PHPUnit<br>
Test Driven Development<br>
Composer<br>
------------------------------

<h2>Setup instructions</h2>

Clone this git repository
Set your localhost root folder to ~/epifoodus/web/
Ensure PHP server is running.
Start Postgres and import epifoodus.sql database into a new database epifoodus
Do the same for the test database: epifoodus_test.sql
Use Composer to install required dependencies in the composer.json file
Start the web app by pointing your browser to the root (http://localhost:8000/)

------------------------------
<h2>License</h2>

The MIT License (MIT)

Copyright (c) 2015 Erica Cha

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.



-----------------------------

<h2>PSQL commands :</h2>

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
