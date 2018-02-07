<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$studnum = $_POST['studnum'];
	$currid = $_POST['currid'];
	
	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("UPDATE students SET CurriculumID = :currid WHERE studnum = :studnum");
	$stmt -> bindParam(':currid', $currid);
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	
	$conn = null;
?>