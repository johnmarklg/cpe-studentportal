<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsoninfodata as $key => $value) {	
			$stmt = $conn->prepare("DELETE FROM curriculum where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();
	}
	$conn = null;	
	
?>