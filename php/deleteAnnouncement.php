<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
		
	foreach ($jsonpostdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		
		$stmt = $conn->prepare("SELECT file FROM posts WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $row) { 
			if($row['file']<>'') {
			$myFile = $_SERVER["DOCUMENT_ROOT"] . "/uploads/" . $row['file'];
			unlink($myFile) or die("Couldn't delete file.");
			}
		}
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 8, :target, now())");
		$stmt -> bindParam(':userid', $value['deleter']);
		$stmt -> bindParam(':target', $value['posterid']);
		$stmt->execute(); 
		
		
		$stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();
		
		
		$conn = null;	
	}
	
?>