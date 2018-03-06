<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonholidayinfo = json_decode($_POST['holidayinfo'], true);
	
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsonholidayinfo as $key => $value) {	
		//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("SELECT title FROM holidays WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$title = $stmt->fetchColumn(); 
		
		$stmt = $conn->prepare("DELETE FROM holidays WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 10, :title, now())");
		$stmt -> bindParam(':userid', $value['adminid']);
		$stmt -> bindParam(':title', $title);
		$stmt->execute(); 
	}
	$conn = null;	
		
?>