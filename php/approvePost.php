<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsonpostdata as $key => $value) {	
		
		$stmt = $conn->prepare("UPDATE `posts` SET `status`= 'Approved' WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 7, :target, now())");
		$stmt -> bindParam(':userid', $value['approver']);
		$stmt -> bindParam(':target', $value['posterid']);
		$stmt->execute(); 
		
	}
	
		$conn = null;
?>