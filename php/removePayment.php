<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {	
			$tableName = $value['tablename'];
			
			$conn = getDB('cpe-studentportal');
			
			$stmt = $conn->prepare("DELETE FROM payments where id=:id");
			$stmt -> bindParam(':id', $value['id']);
			$stmt->execute();	
			$stmt = $conn->prepare("ALTER TABLE students 
			DROP COLUMN $tableName");
			$stmt->execute();
			$conn = null;	
	}
	
?>