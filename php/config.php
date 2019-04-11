<?php

$dbServerName = "localhost";
$dbUsername = "dbUsername";
$dbPassword = "dbPassword";
$dbName = "sayitright";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new PDO('mysql:host='.$dbServerName.';dbname='.$dbName, $dbUsername, $dbPassword);
if(!$db) {
	die("Connection failed");
}

?>