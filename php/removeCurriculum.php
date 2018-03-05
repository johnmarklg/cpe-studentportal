<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
	$adminid = $_POST['adminid'];
	
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsoninfodata as $key => $value) {	
			$stmt = $conn->prepare("DELETE FROM curriculum where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, timestamp) 
			VALUES (:userid, 14, now())");
			$stmt -> bindParam(':userid', $adminid);
			$stmt->execute(); 
			
	}
	$conn = null;	
	
?>