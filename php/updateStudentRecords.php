<?php	

	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	//require('databaseConnectionGrades.php');
	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	
	if($oldstudnum != "00-0000") {
		
		foreach ($jsonstudinfo as $key => $value) {
			/*$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cpe-studentportal";

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//SELECT * FROM `subjects` LEFT JOIN `13-5393` ON `subjects`.`id` = `13-5393`.`courseid` WHERE subjects.id
				*/
				$conn = getDB('cpe-studentportal');
				$stmt = $conn->prepare("UPDATE students SET surname = :surname, firstname = :firstname, middlename = :middlename, cfatscore = :cfatscore, studnum = :studnum, passcode = :passcode WHERE id = :id");
				$stmt -> bindParam(':surname', $value['Surname']);
				$stmt -> bindParam(':firstname', $value['First Name']);
				$stmt -> bindParam(':middlename', $value['Middle Name']);
				$stmt -> bindParam(':cfatscore', $value['CFAT Score']);
				$stmt -> bindParam(':studnum', $value['Student Number']);
				$stmt -> bindParam(':passcode', $value['Passcode']);
				$stmt -> bindParam(':id', $value['ID']);
				$stmt->execute();
			/*}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}*/
			$conn = null;
			
			/*try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//SELECT * FROM `subjects` LEFT JOIN `13-5393` ON `subjects`.`id` = `13-5393`.`courseid` WHERE subjects.id
				*/
				$conn = getDB('cpe-studentportal');
				$stmt = $conn->prepare("ALTER TABLE `$oldstudnum` RENAME `$studnum`;");
				//can't bind parameter table name
				$stmt->execute();
			/*}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}*/
			$conn = null;
			
			/*mysqli_query($con, "UPDATE `students`
			SET `surname` = '" . $value['Surname'] . "',
			`firstname` = '" . $value['First Name'] . "',
			`middlename` = '" . $value['Middle Name'] . "',
			`cfatscore` = '" . $value['CFAT Score'] . "',
			`studnum` = '" . $value['Student Number'] . "'
			WHERE `id` = " . $value['ID']);	
			//rename table from old student number to new, no change if the same
			mysqli_query($con, "ALTER TABLE `" . $value['Old Student Number'] . "` RENAME `" . $value['Student Number'] . "`");*/
		}	
	} 
	else
	{
			/*$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "cpe-studentportal";
			*/
	
			foreach ($jsonstudinfo as $key => $value) {	
				/*try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					*/
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("INSERT INTO students (studnum, surname, firstname, middlename, cfatscore, passcode) VALUES (:studnum, :surname, :firstname, :middlename, :cfatscore, :passcode)");
					$stmt -> bindParam(':studnum', $value['Student Number']);	
					$stmt -> bindParam(':surname', $value['Surname']);
					$stmt -> bindParam(':firstname', $value['First Name']);
					$stmt -> bindParam(':middlename', $value['Middle Name']);
					$stmt -> bindParam(':cfatscore', $value['CFAT Score']);
					$stmt -> bindParam(':passcode', $value['Passcode']);
					$stmt->execute();	
					
					
					$stmt = $conn->prepare("CREATE TABLE `$studnum` LIKE `00-0000`");
					$stmt->execute();
					$stmt = $conn->prepare("INSERT `$studnum` SELECT * FROM `00-0000`");
					$stmt->execute();
				/*}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}*/
				$conn = null;	
			}
			/*mysqli_query($con, "INSERT INTO `students`(`studnum`, `surname`, `firstname`, `middlename`, `cfatscore`) VALUES ('"
			. $value['Student Number'] . "','" . $value['Surname'] . "','" . $value['First Name'] . "','" . $value['Middle Name'] . "','" . $value['CFAT Score'] . "')");	
			//create table with columns similar to default
			mysqli_query($con, "CREATE TABLE `" . $value['Student Number'] . "` LIKE `00-0000`");
			// copy data from default table
			mysqli_query($con, "INSERT `" . $value['Student Number'] . "` SELECT * FROM `00-0000`");*/		
	}
	//updates grades (edit for old student entries and also update on new ones, because data is copied from 00-0000, which has blank grades but similar data
		foreach ($jsongrades as $key => $value) {
			
				/*try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//SELECT * FROM `subjects` LEFT JOIN `13-5393` ON `subjects`.`id` = `13-5393`.`courseid` WHERE subjects.id
					*/
					$conn = getDB('cpe-studentportal');
					$stmt = $conn->prepare("UPDATE `$studnum` SET 1st = :first, 2nd = :second, 3rd = :third WHERE `$studnum`.courseid = :id");
					$stmt -> bindParam(':first', $value['1st']);
					$stmt -> bindParam(':second', $value['2nd']);
					$stmt -> bindParam(':third', $value['3rd']);
					$stmt -> bindParam(':id', $value['id']);
					$stmt->execute();
				/*}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}*/
				$conn = null;

				//mysqli_query($con, "UPDATE `" . $studnum . "` SET `1st` = '" . $value["1st"] . "', `2nd` = '" . $value["2nd"] . "', `3rd` = '" . $value["3rd"] . "' WHERE `" . $studnum . "` . `courseid` = " . $value["id"]);
		}
	//$con = null;
	//mysqli_close($con);
?>