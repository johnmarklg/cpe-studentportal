<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$id = $_POST['id'];
	$conn = getDB('cpe-studentportal');
			
	$stmt = $conn->prepare("DELETE FROM administrators where id=:id");
	$stmt -> bindParam(':id', $id);
	$stmt->execute();
	$conn = null;	
	
?>