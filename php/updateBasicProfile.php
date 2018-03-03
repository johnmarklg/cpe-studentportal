<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$studnum = $_POST['studnum'];
	$update = $_POST['update'];
	$colname = $_POST['colname'];
		
	$conn = getDB('cpe-studentportal');
					
	$stmt = $conn->prepare("UPDATE students SET " . $colname . " = :update WHERE studnum = :studnum");
	//$stmt -> bindParam(':colname', $colname);
	$stmt -> bindParam(':update', $update);
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute(); 
		
	$conn = null;
?>