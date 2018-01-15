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
		<th>Timestamp</th>
		<th>Post</th>
		<th>File URL</th>
		<th> </th>
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
			<td class=\"datetime\" >" . $row['datetime'] . "</td>
			<td class=\"post\" >" . $row['post'] . "</td>
			<td class=\"fileurl\" >" . $row['fileurl'] . "</td>
			<td><span class=\"post-remove\"><i class=\"fa fa-fw fa-minus-circle\"></i> Delete</span></td>";
		}
		$conn = null;		

		echo "</tbody></table></div></div></div></div></div>";
	}
?>