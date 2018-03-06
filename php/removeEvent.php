<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoneventinfo = json_decode($_POST['eventinfo'], true);
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsoneventinfo as $key => $value) {	
		
		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT title FROM events WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$title = $stmt->fetchColumn(); 
		
		$stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 10, :target, now())");
		$stmt -> bindParam(':userid', $value['adminid']);
		$stmt -> bindParam(':target', $title);
		$stmt->execute(); 
		
	}
	$conn = null;	
	
?>