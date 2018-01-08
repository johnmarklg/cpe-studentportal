<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonpostdata = json_decode($_POST['postData'], true);
		
	foreach ($jsonpostdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
	}
	
?>