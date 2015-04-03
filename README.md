<h1>SHOES & BRANDS </h1>
March 27th, 2015

by Erica Cha

A list of local shoe stores and the brands of shoes they carry.

Technology
<br>
PHP<br>
Silex<br>
Twig<br>
PostgreSQL<br>
PHPUnit<br>
Test Driven Development<br>
Composer<br>

License

The MIT License (MIT)

Copyright (c) 2015 Erica Cha

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.



-----------------------------

PSQL commands :

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
