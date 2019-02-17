<?php

$dbServerName = "localhost";
$dbUsername = "dbUsername";
$dbPassword = "dbPassword";
$dbName = "sayitright";

$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
	die("Connection failed: ".mysqli_server_error());
}