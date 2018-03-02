<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//$jsonabout = json_decode($_POST['about'], true);
	$title1 = $_POST['title1'];
	$title2 = $_POST['title2'];
	$title3 = $_POST['title3'];
	$text1 = $_POST['text1'];
	$text2 = $_POST['text2'];
	$text3 = $_POST['text3'];
	
	$conn = getDB('cpe-studentportal');

	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 2");
	$stmt -> bindParam(':title', $title1);
	$stmt -> bindParam(':text', $text1);
	$stmt->execute();
	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 3");
	$stmt -> bindParam(':title', $title2);
	$stmt -> bindParam(':text', $text2);
	$stmt->execute();
	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 4");
	$stmt -> bindParam(':title', $title3);
	$stmt -> bindParam(':text', $text3);
	$stmt->execute();

	$conn = null;	
	
?>