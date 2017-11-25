<?php
	require('ajax/db_connection.php');
	
	if(isset($_GET["new-entry"]))
	{
		echo "<script>alert(\"okay!\");</script>";
	}
	mysqli_close($con);
?>