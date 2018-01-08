<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$studnum = $jsonstudinfo[0]['Student Number'];
	
		
	foreach ($jsonstudinfo as $key => $value) {	
			$conn = getDB('cpe-studentportal');
			$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, cfatscore, passcode, yearstarted) VALUES (:studnum, :surname, :firstname, :middlename, :cfatscore, :passcode, :yearstarted)");
			$stmt -> bindParam(':studnum', $value['Student Number']);	
			$stmt -> bindParam(':surname', $value['Surname']);
			$stmt -> bindParam(':firstname', $value['First Name']);
			$stmt -> bindParam(':middlename', $value['Middle Name']);
			$stmt -> bindParam(':cfatscore', $value['CFAT Score']);
			$stmt -> bindParam(':passcode', $value['Passcode']);
			$startyear = mb_substr($value['Student Number'], 0, 2);
			$stmt -> bindParam(':yearstarted', $startyear);
			$stmt->execute();	
			
			
			$stmt = $conn->prepare("CREATE TABLE `$studnum` LIKE `00-0000`");
			$stmt->execute();
			$stmt = $conn->prepare("INSERT `$studnum` SELECT * FROM `00-0000`");
			$stmt->execute();
			$conn = null;	
	}
	
?>