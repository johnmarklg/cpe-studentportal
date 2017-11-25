<?php
	if(isset($_POST['last_name']) && isset($_POST['first_name']) && isset($_POST['mi']) && isset($_POST['first']) && isset($_POST['second']) && isset($_POST['third']) && isset($_POST['fourth']) && isset($_POST['final']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$last_name = $_POST['last_name'];
		$first_name = $_POST['first_name'];
		$mi = $_POST['mi'];
		$first = $_POST['first'];
		$second = $_POST['second'];
		$third = $_POST['third'];
		$fourth = $_POST['fourth'];
		$finalGrade = $_POST['final'];

		$query = "INSERT INTO students(Lastname, Firstname, MI, first, second, third, fourth, Final) VALUES ('$last_name', '$first_name', '$mi', '$first', '$second', '$third', '$fourth', '$finalGrade')";
		if (!$result = mysql_query($query)) {
	        exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}
?>