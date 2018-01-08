<?php	
	function showAnnouncements() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//My Announcements
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">My Announcements</div><div class=\"panel-body\"><div class=\"table-responsive\">
		<table id=\"myannouncements\" class=\"table\">
		<thead>
		<tr>
		<th style=\"font-size: 0px\">ID</th>
		<th>Date</th>
		<th>Time</th>
		<th>Post</th>
		<th>File URL</th>
		<th hidden style=\"font-size: 0px\">Edit</th>
		<th>Delete</th>
		</tr>
		</thead>
		<tbody class=\"list\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid = :posterid");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2]);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo "<tr>
			<td class=\"id\" style=\"font-size: 0px\">" . $row['id'] . "</td>
			<td class=\"date\" >" . $row['date'] . "</td>
			<td class=\"time\" >" . $row['time'] . "</td>
			<td class=\"post\" >" . $row['post'] . "</td>
			<td class=\"fileurl\" >" . $row['fileurl'] . "</td>
			<td hidden><i style=\"vertical-align: bottom;\" class=\"table-remove material-icons\">mode_edit</i> Edit</td>
			<td><i style=\"vertical-align: bottom;\" class=\"post-remove material-icons\">delete</i></td>";
		}
		$conn = null;		

		echo "</tbody></table></div></div></div></div></div>";
	}
?>