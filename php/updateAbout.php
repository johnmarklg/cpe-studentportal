<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//$jsonabout = json_decode($_POST['about'], true);
	$title = $_POST['title'];
	$text = $_POST['text'];
	
	$conn = getDB('cpe-studentportal');

	$stmt = $conn->prepare("UPDATE `infotext` SET title = :title, text = :text WHERE referenceid = 1");
	$stmt -> bindParam(':title', $title);
	$stmt -> bindParam(':text', $text);
	$stmt->execute();

	$conn = null;	
	
?>