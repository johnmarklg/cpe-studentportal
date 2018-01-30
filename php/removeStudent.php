<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonuserinfo = json_decode($_POST['studinfo'], true);
			
	foreach ($jsonuserinfo as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM students WHERE studnum = :studnum");
		$stmt -> bindParam(':studnum', $value['studnum']);
		$stmt->execute();	
		$stmt = $conn->prepare("DELETE FROM grades WHERE studnum = :studnum");
		$stmt -> bindParam(':studnum', $value['studnum']);
		$stmt->execute();	
		
		$conn = null;
	}
	
?>