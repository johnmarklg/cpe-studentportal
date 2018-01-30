<?php	
	function listTimetable() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

		//FIRST YEAR
		
		echo "<div class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<!-- Basic Chip -->
		<span class=\"mdl-chip\">
		<span class=\"mdl-chip__text\">First Year</span>
		</span>
		<!-- Simple Select -->
		<div class=\"mdl-layout-spacer\"></div>
		</div>";
		
		echo "<div class=\"android-screens mdl-grid centeritems\"><div class=\"mdl-layout-spacer\"></div><div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<table id=\"tablefirst\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
		<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
		<th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		/*try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject1`");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
			<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		/*}
		catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}*/

		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div><div class=\"mdl-layout-spacer\"></div>";
		
		//SECOND YEAR
		
		echo "<div class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<!-- Basic Chip -->
		<span class=\"mdl-chip\">
		<span class=\"mdl-chip__text\">Second Year</span>
		</span>
		<!-- Simple Select -->
		<div class=\"mdl-layout-spacer\"></div>
		</div>";
		
		echo "<div class=\"android-screens mdl-grid centeritems\"><div class=\"mdl-layout-spacer\"></div><div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<table id=\"tablesecond\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
		<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
		<th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		/*try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject2`");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
			<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		/*}
		catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}*/

		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div><div class=\"mdl-layout-spacer\"></div>";
		
		//THIRD YEAR
		
		echo "<div class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<!-- Basic Chip -->
		<span class=\"mdl-chip\">
		<span class=\"mdl-chip__text\">Third Year</span>
		</span>
		<!-- Simple Select -->
		<div class=\"mdl-layout-spacer\"></div>
		</div>";
		
		echo "<div class=\"android-screens mdl-grid centeritems\"><div class=\"mdl-layout-spacer\"></div><div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<table id=\"tablethird\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
		<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
		<th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		/*try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject3`");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
			<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		/*}
		catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}*/

		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div><div class=\"mdl-layout-spacer\"></div>";
		
		//FOURTH YEAR
		
		echo "<div class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<!-- Basic Chip -->
		<span class=\"mdl-chip\">
		<span class=\"mdl-chip__text\">Fourth Year</span>
		</span>
		<!-- Simple Select -->
		<div class=\"mdl-layout-spacer\"></div>
		</div>";
		
		echo "<div class=\"android-screens mdl-grid centeritems\"><div class=\"mdl-layout-spacer\"></div><div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<table id=\"tablefourth\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
		<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
		<th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		/*try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject4`");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
			<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		/*}
		catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}*/

		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div><div class=\"mdl-layout-spacer\"></div>";
		
		//FIFTH YEAR
		
		echo "<div class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<!-- Basic Chip -->
		<span class=\"mdl-chip\">
		<span class=\"mdl-chip__text\">Fifth Year</span>
		</span>
		<!-- Simple Select -->
		<div class=\"mdl-layout-spacer\"></div>
		</div>";
		
		echo "<div class=\"android-screens mdl-grid centeritems\"><div class=\"mdl-layout-spacer\"></div><div id=\"students-table\" class=\"android-screens mdl-grid centeritems\">
		<div class=\"mdl-layout-spacer\"></div>
		<table id=\"tablefifth\" class=\"mdl-data-table mdl-js-data-table mdl-shadow--2dp\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">ID</th>
		<th class=\"mdl-data-table__cell--non-numeric sort\" data-sort=\"section\">Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Code</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Subject Section</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Start Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">End Time</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Days</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Building</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Room Number</th>
		<th class=\"mdl-data-table__cell--non-numeric\" \">Instructor</th>
		<th class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-add material-icons\">add_circle_outline</i></th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		/*try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		*/
		$conn = getDB('cpe-timetables');
		$stmt = $conn->prepare("SELECT * from `subject5`");
		$stmt->execute();

		// set the resulting array to associative
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric\">" . $row['id'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric section\">" . $row['section'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['code'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['subjectsection'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['starttime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['endtime'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['days'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['building'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['roomnumber'] . "</td>
			<td contentEditable class=\"mdl-data-table__cell--non-numeric \" >" . $row['instructor'] . "</td>
			<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		}
		/*}
		catch(PDOException $e) {
		echo "Error: " . $e->getMessage();
		}*/

		$conn = null;

		echo "<tr class=\"hide\" style=\"display:none;\">
		<td style=\"font-size: 0px\" class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric section\" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td contentEditable class=\"mdl-data-table__cell--non-numeric \" ></td>
		<td class=\"mdl-data-table__cell--non-numeric\"><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">remove_circle_outline</i></td></tr>";
		echo "</tbody></table><div class=\"mdl-layout-spacer\"></div></div><div class=\"mdl-layout-spacer\"></div>";
	}
?>