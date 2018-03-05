<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoneventinfo = json_decode($_POST['eventinfo'], true);
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsoneventinfo as $key => $value) {	
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, timestamp) 
		VALUES (:userid, 10, now())");
		$stmt -> bindParam(':userid', $value['adminid']);
		$stmt->execute(); 
		
	}
	$conn = null;	
	
?>