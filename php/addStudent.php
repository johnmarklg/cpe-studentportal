<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonuserdata = json_decode($_POST['infodata'], true);
		
	foreach ($jsonuserdata as $key => $value) {	
		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, cfatscore, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :cfatscore, :yearstarted)");
		$stmt -> bindParam(':studnum', $value['Student Number']);
		$stmt -> bindParam(':surname', $value['Surname']);
		$stmt -> bindParam(':firstname', $value['First Name']);
		$stmt -> bindParam(':middlename', $value['Middle Name']);
		$stmt -> bindParam(':cfatscore', $value['CFAT Score'], PDO::PARAM_INT);
		$stmt -> bindParam(':passcode', $value['Passcode']);
		$stmt -> bindParam(':yearstarted', $value['Year Started']);
		$stmt->execute();	
		
		
		//$studnum = $jsonstudinfo[0]['Student Number'];
		$studnum = $value['Student Number'];
		$stmt = $conn->prepare("CREATE TABLE `$studnum` LIKE `00-0000`");
		$stmt->execute();
		$stmt = $conn->prepare("INSERT `$studnum` SELECT * FROM `00-0000`");
		$stmt->execute();
		$conn = null;	
	}
	
?>