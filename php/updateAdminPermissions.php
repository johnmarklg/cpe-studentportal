<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonadmininfo = json_decode($_POST['admininfo'], true);
	
		foreach ($jsonadmininfo as $key => $value) {
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("UPDATE administrators SET position = :position WHERE id = :id");
			$stmt -> bindParam(':position', $value['Level']);
			$stmt -> bindParam(':id', $value['ID']);
			$stmt->execute();
			
			$conn = null;
		}

?>