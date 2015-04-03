<h1>SHOES & BRANDS </h1>
March 27th, 2015

by Erica Cha

A list of  out local shoe stores and the brands of shoes they carry. Allow user to create
Brands and see what are sold at the store.

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
CREATE TABLE
laujmimna=# CREATE TABLE brand (id serial PRIMARY KEY, type);
ERROR:  syntax error at or near ")"
LINE 1: CREATE TABLE brand (id serial PRIMARY KEY, type);
                                                       ^
laujmimna=# CREATE TABLE brand (id serial PRIMARY KEY, type varchar);
CREATE TABLE
laujmimna=# DROP DATABASE shoe;
ERROR:  database "shoe" does not exist
laujmimna=# DROP DATABASE shoes;
DROP DATABASE
laujmimna=# \l
                                      List of databases
      Name       |   Owner   | Encoding |   Collate   |    Ctype    |    Access privileges
-----------------+-----------+----------+-------------+-------------+-------------------------
 hair_salon      | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 hair_salon_test | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 laujmimna       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 postgres        | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 shoes_test      | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 student_info    | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 students_test   | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 template0       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/laujmimna           +
                 |           |          |             |             | laujmimna=CTc/laujmimna
 template1       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/laujmimna           +
                 |           |          |             |             | laujmimna=CTc/laujmimna
(9 rows)

laujmimna=# DROP TABLE shoes_test;
ERROR:  table "shoes_test" does not exist
laujmimna=# DROP DATABASE shoes_test;
DROP DATABASE
laujmimna=# \l
                                      List of databases
      Name       |   Owner   | Encoding |   Collate   |    Ctype    |    Access privileges
-----------------+-----------+----------+-------------+-------------+-------------------------
 hair_salon      | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 hair_salon_test | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 laujmimna       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 postgres        | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 student_info    | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 students_test   | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 |
 template0       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/laujmimna           +
                 |           |          |             |             | laujmimna=CTc/laujmimna
 template1       | laujmimna | UTF8     | en_US.UTF-8 | en_US.UTF-8 | =c/laujmimna           +
                 |           |          |             |             | laujmimna=CTc/laujmimna
(8 rows)

laujmimna=# CREATE DATABASE shoes;
CREATE DATABASE
laujmimna=# \c shoes;
You are now connected to database "shoes" as user "laujmimna".
shoes=# CREATE TABLE store (id serial PRIMARY KEY, name varchar);
CREATE TABLE
shoes=# CREATE TABLE brand (id serial PRIMARY KEY, type varchar);
CREATE TABLE
shoes=# CREATE DATABASE shoes_test WITH TEMPLATE to do;
ERROR:  syntax error at or near "to"
LINE 1: CREATE DATABASE shoes_test WITH TEMPLATE to do;
                                                 ^
shoes=# CREATE DATABASE shoes_test WITH TEMPLATE shoes;
CREATE DATABASE
shoes=# select * from store;
 id | name
----+------
(0 rows)

shoes=# select * from brand;
 id | type
----+------
(0 rows)

shoes=# \c shoes_test;
You are now connected to database "shoes_test" as user "laujmimna".
shoes_test=# select * from brand;
 id | type
----+------
(0 rows)

shoes_test=# select * from store;
 id | name
----+------
(0 rows)

shoes_test=# select * from store;
 id | name  
----+-------
 24 | Prada
(1 row)

shoes_test=# select * from brand;
 id | type  
----+-------
 27 | Gucci
 28 | Hello
(2 rows)

shoes_test=# CREATE TABLE stores_brands (id serial PRIMARY KEY, shoe_id, store_id, brand_id);
ERROR:  syntax error at or near ","
LINE 1: ...ABLE stores_brands (id serial PRIMARY KEY, shoe_id, store_id...
                                                             ^
shoes_test=# CREATE TABLE stores_brands (id serial PRIMARY KEY, shoe_id, store_id, brand_id)
shoes_test-# ;
ERROR:  syntax error at or near ","
LINE 1: ...ABLE stores_brands (id serial PRIMARY KEY, shoe_id, store_id...
                                                             ^
shoes_test=# \c shoes;
You are now connected to database "shoes" as user "laujmimna".
shoes=# CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id, brand_id); ERROR:  syntax error at or near ","
LINE 1: ...BLE stores_brands (id serial PRIMARY KEY, store_id, brand_id...
                                                             ^
shoes=# CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id, brand_id);
ERROR:  syntax error at or near ","
LINE 1: ...BLE stores_brands (id serial PRIMARY KEY, store_id, brand_id...
                                                             ^
shoes=# CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);
CREATE TABLE
shoes=# \c shoes_test;
You are now connected to database "shoes_test" as user "laujmimna".
shoes_test=# SELECT * FROM stores_brands;
ERROR:  relation "stores_brands" does not exist
LINE 1: SELECT * FROM stores_brands;
                      ^
shoes_test=# SELECT * FROM stores_brands;
ERROR:  relation "stores_brands" does not exist
LINE 1: SELECT * FROM stores_brands;
                      ^
shoes_test=# SELECT * FROM brand;
 id | type  
----+-------
 27 | Gucci
 28 | Hello
(2 rows)

shoes_test=# SELECT * FROM store;
 id | name  
----+-------
 24 | Prada
(1 row)

shoes_test=# select * from stores_brands;
ERROR:  relation "stores_brands" does not exist
LINE 1: select * from stores_brands;
                      ^
shoes_test=# \d
              List of relations
 Schema |     Name     |   Type   |   Owner
--------+--------------+----------+-----------
 public | brand        | table    | laujmimna
 public | brand_id_seq | sequence | laujmimna
 public | store        | table    | laujmimna
 public | store_id_seq | sequence | laujmimna
(4 rows)

shoes_test=# \c shoes
You are now connected to database "shoes" as user "laujmimna".
shoes=# CREATE DATABASE shoes_test WITH TEMPLATE shoes;
ERROR:  database "shoes_test" already exists
shoes=# DROP shoes_test;
ERROR:  syntax error at or near "shoes_test"
LINE 1: DROP shoes_test;
             ^
shoes=# DROP DATABASE shoes_test;
DROP DATABASE
shoes=# CREATE DATABASE shoes_test WITH TEMPLATE shoes;
CREATE DATABASE
shoes=# select * from stores_brands;
 id | store_id | brand_id
----+----------+----------
(0 rows)

shoes=# select * from stores_brands;
 id | store_id | brand_id
----+----------+----------
(0 rows)

shoes=# shoes= * from stores_brands;
 id | store_id | brand_id
----+----------+----------
(0 rows)

shoes=#
