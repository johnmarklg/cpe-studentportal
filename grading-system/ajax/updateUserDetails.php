<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $id = $_POST['id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $midname = $_POST['midname'];
    $updfirst = $_POST['updfirst'];
    $updsecond = $_POST['updsecond'];
    $updthird = $_POST['updthird'];
    $updfourth = $_POST['updfourth'];
    $updfinal = $_POST['updfinal'];

    // Updaste User details
    $query = "UPDATE students SET Lastname = '$last_name', Firstname = '$first_name', MI = '$midname', first = '$updfirst', second = '$updsecond', third = '$updthird', fourth = '$updfourth', Final = '$updfinal' WHERE id = '$id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}