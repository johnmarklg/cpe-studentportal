<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$name = $_POST['name'];
	$conn = getDB('cpe-studentportal');
	
	$stmt = $conn->prepare("INSERT INTO `curriculum` (name) VALUES (:name)");
	$stmt -> bindParam(':name', $name);
	$stmt->execute();	
	
	$conn = null;
?>