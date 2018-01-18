<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonsubjinfo = json_decode($_POST['subjinfo'], true);
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsonsubjinfo as $key => $value) {	
		$stmt = $conn->prepare("DELETE FROM `schedules` WHERE id=:id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
	}
	
	$conn = null;	
	//print_r($arraycol);
	return false;
?>