<?php

$DB_SERVERNAME =  "localhost";
$DB_USERNAME = "root";
$DB_PASSWORD = "";
$DB_NAME = "Student_Activity_DB";

$db_connect = mysqli_connect($DB_SERVERNAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


if($db_connect == false)
{
	die("Error: Could not connect...." .$db_connect->connect_error()) ;
}
?>
