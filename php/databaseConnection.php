<?php
 
 $host = "localhost";
$user = "root";
$password = "";
$database = "cpe-studentportal";

$con=mysqli_connect($host,$user,$password,$database);

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//for special characters
$con -> set_charset("utf8");
?>