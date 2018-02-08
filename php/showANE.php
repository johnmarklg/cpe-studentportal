<?php	
	function showANE() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/timefxn.php");
		$conn = getDB('cpe-studentportal');
													
		
		//Announcements
						echo '<div class="row">
										<div class="col-lg-6">
											<div class="panel panel-primary">
												<div class="panel-heading">
													News and Announcements
												</div>
												<div class="panel-body tab-content" style="overflow: auto; max-height:635px;">';
								
													$stmt = $conn->prepare("SELECT * from `posts` WHERE status='Approved' ORDER BY datetime DESC");
													$stmt->execute();

													$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
								
													foreach(($stmt->fetchAll()) as $row) { 
													$time = strtotime($row['datetime']);
													if($row['file'] <> '') {
														echo '<div class="panel panel-default">
																		<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '">
																			<img style="max-height: 400px; width: 100%;" src="/uploads/' . $row['file'] . '"></a><hr style="margin: 0px"/>';
													} else {
														echo '<div class="panel panel-default">';
													}
													echo '<div class="panel-body"><strong><i style="color: blue;">' . $row['poster'] . '</i></strong><br/><strong>' . $row['posttitle'] . '</strong><br/>' . $row['post'] . '</div>';
													//footer
													echo '<div class="panel-footer">Posted ' . relativeTime($time) . '</div></div>';
													}
													
						echo '</div></div>
								</div>
								<div class="col-lg-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											Events and Holidays for this Week
										</div>
										<div class="panel-body tab-content" style="overflow: auto; max-height:635px;">';
								
											$stmt = $conn->prepare("(SELECT * FROM events WHERE YEARWEEK(start) = YEARWEEK(NOW())) UNION ALL (SELECT * FROM holidays WHERE YEARWEEK(start) = YEARWEEK(NOW())) ORDER BY start");
											$stmt->execute();

											$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
											
											foreach(($stmt->fetchAll()) as $row) { 
											echo '<div class="panel panel-default"><div class="panel-body"><strong>' . $row['title'] . '</strong> @<i>' . $row['start'] . '</i><hr/>' . $row['description'] . '</div></div>';
											}
											
						echo '</div></div></div>';		
						
			$conn = null;
		}
?>