<?php

define('DB_Server', 'localhost');
define('DB_Username', 'pi');
define('DB_Password', 'cpeportal');
define('DB_Database', 'cpe-studentportal');

function getDB($database){

    $servername = DB_Server;
    $username = DB_Username;
    $password = DB_Password;
    $dbname = $database;

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn ->exec("set names utf8");
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$conn ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $conn;
    }

    catch(PDOException $e){
        echo "Connection Failed: " . $e->getMessage();
    }

}

?>
