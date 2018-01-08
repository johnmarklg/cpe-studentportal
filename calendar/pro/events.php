<?php

$json = array();


try {
    include '../config/Database.php';

} catch(Exception $e) {
    exit('Unable to connect to database.');
}
$pdo = Database::connect();
$res = "SELECT * FROM event";
$events = $pdo->query($res) or die(print_r($pdo->errorInfo()));

echo json_encode($events->fetchAll(PDO::FETCH_ASSOC));

?>