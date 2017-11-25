<?php	
	require('db_connection.php');
	
    $jsongrades = json_decode($_POST['studgrades'], true); 
	$jsonstudinfo = json_decode($_POST['studinfo'], true);
	printf($oldstudnum);
	/*$studnum = $jsonstudinfo[0]['Student Number'];
	$idnum = $jsonstudinfo[0]['ID'];
	$surname = $jsonstudinfo[0]['Surname'];
	$firstname = $jsonstudinfo[0]['First Name'];
	$middlename = $jsonstudinfo[0]['Middle Name'];
	$cfatscore= $jsonstudinfo[0]['CFAT Score'];
	*/
	
	foreach ($jsonstudinfo as $key => $value) {
		mysqli_query($con, "UPDATE `students`
		SET `surname` = '" . $value['Surname'] . "',
		`firstname` = '" . $value['First Name'] . "',
		`middlename` = '" . $value['Middle Name'] . "',
		`cfatscore` = '" . $value['CFAT Score'] . "',
		`studnum` = '" . $value['Student Number'] . "'
		WHERE `id` = " . $value['ID']);	
		
		mysqli_query($con, "ALTER TABLE `" . $value['Old Student Number'] . "` RENAME `" . $value['Student Number'] . "`");
	}	
	
	/*$oldstudnum = mysqli_query($con, "SELECT `studnum` FROM `students` where `id` = " . $idnum); 
	echo $oldstudnum;
	if($studnum != $oldstudnum) {
			mysqli_query("ALTER TABLE `" . $oldstudnum . "` RENAME `" . $studnum . "`"
	}
	*/
	
	foreach ($jsongrades as $key => $value) {
		//echo "UPDATE `" . $studnum . "` SET `1st` = '" . $value["1st"] . "', `2nd` = '" . $value["2nd"] . "', `3rd` = '" . $value["3rd"] . "' WHERE " . $studnum . "` .`courseid` = " . $value["id"] . "\n";
		mysqli_query($con, "UPDATE `" . $studnum . "` SET `1st` = '" . $value["1st"] . "', `2nd` = '" . $value["2nd"] . "', `3rd` = '" . $value["3rd"] . "' WHERE `" . $studnum . "` . `courseid` = " . $value["id"]);
		echo $value["1st"] . ", " . $value["id"] . "<br>";
	}
	
	mysqli_close($con);
?>