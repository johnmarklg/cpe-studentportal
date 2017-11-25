<?php	
	require('databaseConnection.php');
	  $jsonstudinfo = json_decode($_POST['studinfo'], true);
	$jsongrades = json_decode($_POST['studgrades'], true); 
	$studnum = $jsonstudinfo[0]['Student Number'];
	$oldstudnum = $jsonstudinfo[0]['Old Student Number'];
	
	if($oldstudnum <> "00-0000") {
		foreach ($jsonstudinfo as $key => $value) {
			mysqli_query($con, "UPDATE `students`
			SET `surname` = '" . $value['Surname'] . "',
			`firstname` = '" . $value['First Name'] . "',
			`middlename` = '" . $value['Middle Name'] . "',
			`cfatscore` = '" . $value['CFAT Score'] . "',
			`studnum` = '" . $value['Student Number'] . "'
			WHERE `id` = " . $value['ID']);	
			//rename table from old student number to new, no change if the same
			mysqli_query($con, "ALTER TABLE `" . $value['Old Student Number'] . "` RENAME `" . $value['Student Number'] . "`");
		}	
	} else {
		//if 00-0000, add new entry instead of update
			//sample: INSERT INTO `students`(`studnum`, `surname`, `firstname`, `middlename`, `cfatscore`) VALUES ('13-5888','Cay','Tim','Mac','99')
		foreach ($jsonstudinfo as $key => $value) {
			mysqli_query($con, "INSERT INTO `students`(`studnum`, `surname`, `firstname`, `middlename`, `cfatscore`) VALUES ('"
			. $value['Student Number'] . "','" . $value['Surname'] . "','" . $value['First Name'] . "','" . $value['Middle Name'] . "','" . $value['CFAT Score'] . "')");	
			//create table with columns similar to default
			mysqli_query($con, "CREATE TABLE `" . $value['Student Number'] . "` LIKE `00-0000`");
			// copy data from default table
			mysqli_query($con, "INSERT `" . $value['Student Number'] . "` SELECT * FROM `00-0000`");
		}	
	}
	//updates grades (edit for old student entries and also update on new ones, because data is copied from 00-0000, which has blank grades but similar data
	foreach ($jsongrades as $key => $value) {
			mysqli_query($con, "UPDATE `" . $studnum . "` SET `1st` = '" . $value["1st"] . "', `2nd` = '" . $value["2nd"] . "', `3rd` = '" . $value["3rd"] . "' WHERE `" . $studnum . "` . `courseid` = " . $value["id"]);
	}

	mysqli_close($con);
?>