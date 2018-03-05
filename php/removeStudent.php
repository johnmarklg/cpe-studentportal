<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonuserinfo = json_decode($_POST['studinfo'], true);
	$updatedby = $_POST['adminid'];
			
	foreach ($jsonuserinfo as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM students WHERE studnum = :studnum");
		$stmt -> bindParam(':studnum', $value['studnum']);
		$stmt->execute();	
		$stmt = $conn->prepare("DELETE FROM grades WHERE studnum = :studnum");
		$stmt -> bindParam(':studnum', $value['studnum']);
		$stmt->execute();
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 12, :target, now())");
		$stmt -> bindParam(':userid', $updatedby);
		$stmt -> bindParam(':target', $value['studnum']);
		$stmt->execute(); 
		
		$conn = null;
	}
	
?>