<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonadmininfo = json_decode($_POST['admininfo'], true);
	
		foreach ($jsonadmininfo as $key => $value) {
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("UPDATE posts SET showbulletin = :showbulletin, datetime = :datetime WHERE id = :id");
			$stmt -> bindParam(':showbulletin', $value['showBool']);
			$stmt -> bindParam(':datetime', $value['timestamp']);
			$stmt -> bindParam(':id', $value['ID']);
			$stmt->execute();
			
			$conn = null;
		}

?>