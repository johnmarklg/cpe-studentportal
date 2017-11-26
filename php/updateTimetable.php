<?php	
	//require('databaseConnectionTimetable.php');
	
	$jsontimetable = json_decode($_POST['timetable'], true);
	
	
	//$studnum = $jsonstudinfo[0]['Student Number'];
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cpe-timetables";

	$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//delete all table data first
	$stmt = $conn->prepare("TRUNCATE subjectlist");
	$stmt->execute();				
	$conn = null;
	
	//then insert current table data in order to overwrite all changes
	foreach ($jsontimetable as $key => $value) {	
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("INSERT INTO subjectlist (year, section, code, subjectsection, starttime, endtime, days, building, roomnumber, instructor)
				VALUES (:year, :section, :code, :subjectsection, :starttime, :endtime, :days, :building, :roomnumber, :instructor)");
				$stmt -> bindParam(':year', $value['Year']);
				$stmt -> bindParam(':section', $value['Section']);
				$stmt -> bindParam(':code', $value['Code']);
				$stmt -> bindParam(':subjectsection', $value['Subject Section']);
				$stmt -> bindParam(':starttime', $value['Start Time']);
				$stmt -> bindParam(':endtime', $value['End Time']);
				$stmt -> bindParam(':days', $value['Days']);
				$stmt -> bindParam(':building', $value['Building']);
				$stmt -> bindParam(':roomnumber', $value['Room Number']);
				$stmt -> bindParam(':instructor', $value['Instructor']);
				$stmt->execute();	
			}
			catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;	
	}

	/*foreach ($jsontimetable as $key => $value) {
		mysqli_query($con, "REPLACE INTO `subjectlist`
		SET `year` = " . $value['Year'] . ",
		`section` = '" . $value['Section'] . "',
		`code` = '" . $value['Code'] . "',
		`subjectsection` = '" . $value['Subject Section'] . "',
		`starttime` = '" . $value['Start Time'] . "',
		`endtime` = '" . $value['End Time'] . "',
		`days` = '" . $value['Days'] . "',
		`building` = '" . $value['Building'] . "',
		`roomnumber` = '" . $value['Room Number'] . "',
		`instructor` = '" . $value['Instructor'] . "';");
	//mysqli_query($con, "UPDATE `" . $studnum . "` SET `1st` = '" . $value["1st"] . "', `2nd` = '" . $value["2nd"] . "', `3rd` = '" . $value["3rd"] . "' WHERE `" . $studnum . "` . `courseid` = " . $value["id"]);
	}*/
	//mysqli_close($con);
?>