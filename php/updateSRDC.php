<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//$jsonabout = json_decode($_POST['about'], true);
	$title1 = $_POST['title4'];
	$title2 = $_POST['title5'];
	$title3 = $_POST['title6'];
	$text1 = $_POST['text4'];
	$text2 = $_POST['text5'];
	$text3 = $_POST['text6'];
	
	$conn = getDB('cpe-studentportal');

	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 5");
	$stmt -> bindParam(':title', $title1);
	$stmt -> bindParam(':text', $text1);
	$stmt->execute();
	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 6");
	$stmt -> bindParam(':title', $title2);
	$stmt -> bindParam(':text', $text2);
	$stmt->execute();
	$stmt = $conn->prepare("UPDATE `infotext` 
	SET title = :title, text = :text WHERE referenceid = 7");
	$stmt -> bindParam(':title', $title3);
	$stmt -> bindParam(':text', $text3);
	$stmt->execute();

	$conn = null;	
	
?>