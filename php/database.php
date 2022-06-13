<?php 

// defining names for db, user, pass and host
define('DB_NAME', 'test');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

// connecting to database
mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);

//selecting database
@mysqli_select_db($connect, DB_NAME) or die("Unable to select database");

//checking for failed connection
if(mysqli_connect_errno())
{
	echo 'Failed to connect';
}

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);

?>