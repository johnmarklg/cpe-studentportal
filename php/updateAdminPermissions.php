<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonadmininfo = json_decode($_POST['admininfo'], true);
	$adminid = $_POST['adminid'];
	$conn = getDB('cpe-studentportal');
			
		foreach ($jsonadmininfo as $key => $value) {
			$stmt = $conn->prepare("UPDATE administrators SET position = :position WHERE id = :id");
			$stmt -> bindParam(':position', $value['Level']);
			$stmt -> bindParam(':id', $value['ID']);
			$stmt->execute();
			
			$stmt = $conn->prepare("INSERT INTO `activitylog` 
			(userid, action, target, timestamp) 
			VALUES (:userid, 20, :target, now())");
			$stmt -> bindParam(':userid', $adminid);
			$stmt -> bindParam(':target', $value['ID']);
			$stmt->execute(); 
			
			
		}
	$conn = null;
?>