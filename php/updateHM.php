<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//$jsonabout = json_decode($_POST['about'], true);
	$title = $_POST['title'];
	$text = $_POST['text'];
	$sel = $_POST['sel'];
	
	$conn = getDB('cpe-studentportal');
	//if march
	if($sel == '1') {
		$stmt = $conn->prepare("UPDATE `infotext` 
		SET title = :title, text = :text WHERE referenceid = 8");
		$stmt -> bindParam(':title', $title);
		$stmt -> bindParam(':text', $text);
		$stmt->execute();
	} else if($sel == '2'){
		//if hymn
		$stmt = $conn->prepare("UPDATE `infotext` 
		SET title = :title, text = :text WHERE referenceid = 9");
		$stmt -> bindParam(':title', $title);
		$stmt -> bindParam(':text', $text);
		$stmt->execute();		
	}
	$conn = null;	
	
?>