<?php	
	function showANE($studnum) {

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
													
													foreach(($stmt->fetchAll()) as $row) { 
													$time = strtotime($row['datetime']);
													
													$stmti = $conn->prepare("SELECT COUNT(*) FROM comments as commentcount WHERE postid=:postid");
													$stmti	 -> bindParam(':postid', $row['id']);
													$stmti->execute();
													$commentcount = $stmti->fetchColumn(); 
													
													echo '<div class="panel panel-info"><div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
													if($row['file'] == '') {
														echo '</div><div class="panel-body"><div class="col-lg-12">';
													} else {
														echo '</div><div class="panel-body"><div class="col-lg-3">' .
														'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
														. '</div><div class="col-lg-9">';
													}
													echo '<strong>' . $row['posttitle'] . '</strong>';
													echo '<hr/>' . $row['post'];
													echo '</div></div><div class="panel-footer"><a href="post.php?postID=' . $row['id'] . '&studnum=' . $studnum . '"><i class="fa fa-fw fa-comment"></i> '. $commentcount . ' comments</a></div></div>';
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
											if ($stmt->rowCount() > 0) {
												foreach(($stmt->fetchAll()) as $row) { 
												echo '<div class="panel panel-default"><div class="panel-body"><strong>' . $row['title'] . '</strong> @<i>' . $row['start'] . '</i><hr/>' . $row['description'] . '</div></div>';
												}
											} else {
											   echo 'There are no events for this week.';
											}											
											
											
						echo '</div></div></div>';		
						
			$conn = null;
		}
?>