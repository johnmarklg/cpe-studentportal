<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonholidayinfo = json_decode($_POST['holidayinfo'], true);
			
	foreach ($jsonholidayinfo as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("DELETE FROM holidays WHERE id = :id");
		$stmt -> bindParam(':id', $value['id']);
		$stmt->execute();	
		$conn = null;	
	}
	
?>