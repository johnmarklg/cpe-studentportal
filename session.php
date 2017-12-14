<?php

if(!empty($_SESSION['position'])){
    $session_id = $_SESSION['position'];
    require_once("fxnclass.php");
    $fxnClass = new fxnClass(); 
}

if(empty($session_id)){
    $url = 'index.php';
    header("Location: $url");
}

?>