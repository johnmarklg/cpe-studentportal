<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoninfodata = json_decode($_POST['infodata'], true);
		
	foreach ($jsoninfodata as $key => $value) {	
			$tableName = $value['tableName'];
			//$columnName = $value['Name'] . ' - ' . $value['Amount'];
			$conn = getDB('cpe-studentportal');
			
			$stmt = $conn->prepare("INSERT INTO `payments` (name, amount, tablename) VALUES (:name, :amount, :tablename)");
			$stmt -> bindParam(':name', $value['Name']);
			$stmt -> bindParam(':amount', $value['Amount']);
			$stmt -> bindParam(':tablename', $value['tableName']);
			$stmt->execute();	
			$stmt = $conn->prepare("ALTER TABLE students 
			ADD `$tableName` boolean");
			$stmt->execute();
			/*$stmt = $conn->prepare("CREATE TABLE `$tableName` LIKE students");
			$stmt->execute();	
			$stmt = $conn->prepare("INSERT INTO `$tableName` SELECT * FROM students");
			$stmt->execute();	
			$stmt = $conn->prepare("ALTER TABLE `$tableName`
				DROP COLUMN passcode,
				DROP COLUMN yearstarted,
				DROP COLUMN cfatscore,
				DROP COLUMN gender,
				DROP COLUMN status,
				DROP COLUMN citizenship,
				DROP COLUMN dateofbirth,
				DROP COLUMN placeofbirth,
				DROP COLUMN contactnum,
				DROP COLUMN address,
				DROP COLUMN fatheroccupation,
				DROP COLUMN father,
				DROP COLUMN mother,
				DROP COLUMN motheroccupation,
				DROP COLUMN spouse,
				DROP COLUMN spouseoccupation,
				DROP COLUMN houseaddress,
				DROP COLUMN employer,
				DROP COLUMN businessaddress,
				DROP COLUMN telnum,
				DROP COLUMN elementary,
				DROP COLUMN elemaddress,
				DROP COLUMN elemgraduate,
				DROP COLUMN secgraduate,
				DROP COLUMN secondary,
				DROP COLUMN secaddress,
				DROP COLUMN college,
				DROP COLUMN coladdress,
				DROP COLUMN colgraduate;");
			$stmt->execute();	
			$stmt = $conn->prepare("ALTER TABLE `$tableName` 
			ADD `$columnName` boolean");
			$stmt->execute();	*/
			$conn = null;	
	}
	
?>