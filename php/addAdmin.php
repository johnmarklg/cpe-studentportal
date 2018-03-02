<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$permission = $_POST['permission'];
	$conn = getDB('cpe-studentportal');
	
	$stmt = $conn->prepare("INSERT INTO `administrators` (name, position, email, username, password) VALUES (:name, :position, :email, :username, :password)");
	$stmt -> bindParam(':name', $name);
	$stmt -> bindParam(':position', $permission);
	$stmt -> bindParam(':username', $username);
	$stmt -> bindParam(':email', $email);
	$stmt -> bindParam(':password', $password);
	$stmt->execute();	
	
	$conn = null;
?>