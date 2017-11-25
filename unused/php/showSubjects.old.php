<?php
	function showSubjects() {
	require('ajax/db_connection.php');
	
	$result = mysqli_query($con,"SELECT * FROM `subjects`");
	

	while($row = mysqli_fetch_array($result))
	{
	echo "<tr>";
	echo "<td class=\"mdl-data-table__cell--non-numeric\"><div  style=\"width: 100%; height: 100%;\">" . $row['code'] . "</div></td>";
	echo "<td class=\"mdl-data-table__cell--non-numeric\"><div  style=\"width: 100%; height: 100%;\">" . $row['coursetitle'] . "</div></td>";
	echo "<td><div  style=\"width: 100%; height: 100%;\">" . $row['units'] . "</div></td>";
	echo "<td class=\"mdl-data-table__cell--non-numeric\"><div  style=\"width: 100%; height: 100%;\">" . $row['prerequisite'] . "</div></td>";
	echo "<td class=\"mdl-data-table__cell--non-numeric\"><div  style=\"width: 100%; height: 100%;\">" . $row['corequisite'] . "</div></td>";
	echo "<td class=\"mdl-data-table__cell--non-numeric\"><div  style=\"width: 100%; height: 100%;\">" . $row['year'] . "</div></td>";
	echo "</tr>";
	//if($row['courseid']==4) {
	//	echo "</tr></table><hr/><";
	//}
	}
	echo "</tbody></table>";

	mysqli_close($con);
	}
?>