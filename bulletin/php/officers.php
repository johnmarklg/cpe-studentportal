<?php
   require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
								  
	$conn = getDB('cpe-studentportal');
   
   $stmt = $conn->prepare("SELECT officers.*, students.surname, students.firstname, students.middlename, students.ContactNo from `officers` 
   LEFT JOIN students
   ON officers.studnum = students.studnum
   ORDER BY id ASC");
   $stmt->execute();
   $counter = 0;
   foreach(($stmt->fetchAll()) as $row) { 
	$studnum[$counter] = $row['studnum'];
	$surname[$counter] = $row['surname'];
	$firstname[$counter] = $row['firstname'];
	$middlename[$counter] = $row['middlename'];
	$contactnum[$counter] = $row['ContactNo'];
	$photolink[$counter] = $row['photolink'];
	$position[$counter] = $row['office'];
	//increment
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
	$officers .= '<img class="center-block" style="width: 200px; height: 200px;" src="/uploads/officers/' . $photolink[$v] . '">
						 <h3 style="font-size: 2vw; margin-bottom: 2px">' . $surname[$v] . ', ' . $firstname[$v] . ' ' . $middlename[$v] .'</h3>
						 <h4 style="font-size: 1.7vw;">' . $position[$v] .'</h4>
	</div>';
   }
   
   echo $officers;
?>