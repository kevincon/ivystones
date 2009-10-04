<?php #script 7.2 mysql_connect.php

//This file contains the database access info
//This file also establishes a connection to MySQL and selects the database

//Set the database access information as constants
DEFINE('DB_USER', 'ivystones');
DEFINE('DB_PASSWORD','somethingwecanallremember');
DEFINE('DB_HOST','mysql.kevinschicken.com');
DEFINE('DB_NAME', 'ivystones');

//make the connection
$dbc=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) OR die('Could not connect to the MySQL: ' . mysql_error());

//select the database
@mysql_select_db (DB_NAME) or die ('Could not select the database: ' . mysql_error());
?>