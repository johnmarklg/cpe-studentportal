<?php

require '../config/Database.php';

$id = null;
if ( !empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

$title = $_POST["title"];
$desc =  $_POST["desc"];
$start = $_POST["start"];
$end = $_POST["end"];

$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE event  set title = ?, description = ?, start =?, end =? WHERE id = ?";
$q = $pdo->prepare($sql);
$q->execute(array($title,$desc,$start,$end,$id));
Database::disconnect();

header("Location: ../manage");