<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoneventinfo = json_decode($_POST['eventinfo'], true);
			
	foreach ($jsoneventinfo as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM events WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
	}
	
?>