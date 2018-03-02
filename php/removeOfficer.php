<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$officer = $_POST['id'];
		
	$conn = getDB('cpe-studentportal');
	
	//delete photo if existing
	$stmt = $conn->prepare("SELECT photolink FROM officers WHERE id = :id");
		$stmt -> bindParam(':id', $officer);
		$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $row) { 
			if($row['photolink']<>'') {
			$myFile = $_SERVER["DOCUMENT_ROOT"] . "/uploads/officers/" . $row['photolink'];
			unlink($myFile) or die("Couldn't delete file.");
			}
		}

	//delete entry
	$stmt = $conn->prepare("DELETE FROM officers where id=:id");
	$stmt -> bindParam(':id', $officer);
	$stmt->execute();
	
	$conn = null;
?>