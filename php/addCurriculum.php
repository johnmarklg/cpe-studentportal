<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$name = $_POST['name'];
	$adminid = $_POST['adminid'];
	$conn = getDB('cpe-studentportal');
	
	$stmt = $conn->prepare("INSERT INTO `curriculum` (name) VALUES (:name)");
	$stmt -> bindParam(':name', $name);
	$stmt->execute();	
	
	$stmt = $conn->prepare("INSERT INTO `activitylog` 
	(userid, action, timestamp) 
	VALUES (:userid, 13, now())");
	$stmt -> bindParam(':userid', $adminid);
	$stmt->execute(); 
	
	
	$conn = null;
?>