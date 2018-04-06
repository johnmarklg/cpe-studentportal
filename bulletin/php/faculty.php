<?php
   require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
								  
	$conn = getDB('cpe-studentportal');
   
   $stmt = $conn->prepare("SELECT name, position, photolink from administrators WHERE id <> 1 AND position <> 'Limited'");
   $stmt->execute();
   $counter = 0;
   foreach(($stmt->fetchAll()) as $row) { 
	$name[$counter] = $row['name'];
	$photolink[$counter] = $row['photolink'];
	$counter++;
   }
   $conn = null;
   
   $officers = '';
   for ($v=0; $v<$counter; $v++) {
	if($v==0) {
		$officers .= '<div class="item active text-center">';
	} else {
		$officers .= '<div class="item text-center">';
	}	
	$officers .= '<img class="center-block" style="width: 200px; height: 200px;" src="/uploads/faculty/' . $photolink[$v] . '">
					   <h3 style="font-size: 2vw; margin-bottom: 2px">Engr. ' . $name[$v] .'</h3>
	</div>';
   }
   
   echo $officers;
?>