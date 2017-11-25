<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "dbgrading";

$db = mysql_connect($host, $user, $password) or die("Could not connect to database");

mysql_select_db($database, $db);

?>