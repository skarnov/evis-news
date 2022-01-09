<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set("memory_limit","-1");

date_default_timezone_set("Asia/Dhaka");

$db['db_host'] = "localhost";
$db['db_user'] = "abirvabnews24_u";
$db['db_pass'] = "AB76hft&T#227";
$db['db_name'] = "abirvabnews24_db";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);




if($connection->connect_error)
	echo "Connecion failed!".$connection->connect_error;
	
$query = "SET CHARACTER SET utf8";
$connection->query($query);
$query = "SET SESSION collation_connection ='utf8_general_ci'";
$connection->query($query);
$query = "SET NAMES utf8";
$connection->query($query);


?>
