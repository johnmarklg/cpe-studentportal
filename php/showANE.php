<?php	
	function showANE() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//Heading
		echo '<div class="panel panel-info" style="position: relative;">
							<div class="panel-heading" style="text-align: center;" id="exTab3">	
								<ul class="nav nav-pills nav-justified">
									<li class="active">
									<a  href="#4" data-toggle="tab"><i class="fa fa-fw fa-bolt"></i> News and Announcements</a>
									</li>
									<li><a href="#5" data-toggle="tab"><i class="fa fa-fw fa-calendar"></i> Events and Holidays</a>
									</li>
								</ul>
							</div>';
							
		//Announcements
						echo '<div class="panel-body tab-content" style="overflow: auto; max-height:635px;">
								<div class="tab-pane active" id="4" >';
								
								$conn = getDB('cpe-studentportal');
								$stmt = $conn->prepare("SELECT * from `posts` WHERE status='Approved' ORDER BY datetime DESC");
								$stmt->execute();

								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
								
								foreach(($stmt->fetchAll()) as $row) { 
								echo '<div class="panel panel-default"><div class="panel-body"><strong>' .
								$row['poster'] . '</strong> @<i>' . $row['datetime'] . ':</i><hr/>'
								. $row['post'] . '</div></div>';
								}
								$conn = null;
						
						echo '</div>';
								
		//Events
						echo '<div class="tab-pane" id="5"">Upcoming and On-going Events and Holidays:<hr/>';
								$conn = getDB('cpe-studentportal');
								$stmt = $conn->prepare("(SELECT * FROM events WHERE YEARWEEK(start) = YEARWEEK(NOW())) UNION ALL (SELECT * FROM holidays WHERE YEARWEEK(start) = YEARWEEK(NOW())) ORDER BY start");
								$stmt->execute();

								$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
								
								foreach(($stmt->fetchAll()) as $row) { 
								echo '<div class="panel panel-default"><div class="panel-body"><strong>' .
								$row['title'] . '</strong> @<i>' . $row['start'] . '</i><hr/>' . $row['description']
								. '</div></div>';
								}
								$conn = null;
						echo '</div>
							</div>
						</div>';
		
		/*echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
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

		echo "</tbody></table></div></div></div></div></div>";*/
	}
?>