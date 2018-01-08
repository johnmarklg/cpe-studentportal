<?php

$title = $_POST["title"];
$desc =  $_POST["desc"];
$start = $_POST["start"];
$end = $_POST["end"];

    try {
        include '../config/Database.php';

    } catch(Exception $e) {
        exit('Unable to connect to database.');
    }

$pdo = Database::connect();
$sql = "INSERT INTO event (title, description, start, end) VALUES (:title, :desc, :start, :end )";
$q = $pdo->prepare($sql);
$q->execute(array(':title'=>$title, ':desc'=>$desc, ':start'=>$start, ':end'=>$end));

header("Location: ../manage");