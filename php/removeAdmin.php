<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$id = $_POST['id'];
	$adminid = $_POST['adminid'];
	$conn = getDB('cpe-studentportal');
			
	$stmt = $conn->prepare("DELETE FROM administrators where id=:id");
	$stmt -> bindParam(':id', $id);
	$stmt->execute();
	
	$stmt = $conn->prepare("INSERT INTO `activitylog` 
	(userid, action, target, timestamp) 
	VALUES (:userid, 22, :target, now())");
	$stmt -> bindParam(':userid', $adminid);
	$stmt -> bindParam(':target', $id);
	$stmt->execute(); 
	
	$conn = null;	
	
?>