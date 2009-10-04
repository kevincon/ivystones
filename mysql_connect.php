<?php #script 7.2 mysql_connect.php

//This file contains the database access info
//This file also establishes a connection to MySQL and selects the database

//Set the database access information as constants
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME', 'FBLA site');

//make the connection
$dbc=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) OR die('Could not connect to the MySQL: ' . mysql_error());

//select the database
@mysql_select_db (DB_NAME) or die ('Could not select the database: ' . mysql_error());
?>