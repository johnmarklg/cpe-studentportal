<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {
		echo "<script>alert('success');</script>";
		$conn = getDB('cpe-studentportal');
		//UPDATE `department` SET `name` = 'Vlad Ibañez', `position` = 'Chair', `email` = '1vladimir@gmail.com', `username` = 'admin1', `password` = 'admin' WHERE `department`.`id` = 1
		//UPDATE `department` SET `name` = 'Vladimir B. Ibañez', `position` = 'Department Chair', `email` = 'vladimir@gmail.com', `username` = 'admin' WHERE `department`.`id` = 1
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $conn->prepare("UPDATE `department` SET name = :name, email = :email, username = :username, password = :password WHERE id = :id");
		$stmt -> bindParam(':username', $value['Username']);
		$stmt -> bindParam(':password', $value['Password']);
		$stmt -> bindParam(':email', $value['Email']);
		$stmt -> bindParam(':name', $value['Name']);
		$stmt -> bindParam(':id', $value['ID']);
		$stmt->execute();	
		$conn = null;	
		//update name in session
		$_SESSION['name'][0] = $value['Name'];
	}
	
?>