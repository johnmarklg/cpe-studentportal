<?php	
	function showAnnouncements() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//My Announcements
		echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
		<div class="panel-heading"><ul class="nav nav-pills nav-justified">
		<li class="active"><a  href="#1" data-toggle="tab">My Announcements</a></li>
		<li><a href="#2" data-toggle="tab">For Approval</a></li></ul></div><div class="panel-body">';

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid = :posterid ORDER BY datetime DESC");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2], PDO::PARAM_INT);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
		echo '<div class="tab-content"><div class="active tab-pane" id="1">';
		foreach(($stmt->fetchAll()) as $row) { 
			if($row['status']=='Pending') {
				echo '<div class="panel panel-danger">';
			} else {
				echo '<div class="panel panel-info">';
			}
			echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . $row['datetime'] . '</i>';
			echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			echo '</div><div class="panel-body"><strong>' . $row['posttitle'] . '</strong>';
			echo '<hr/>' . $row['post'];
			if($row['file'] <> '') {
				echo '<br/><img style="max-height: 25vh; max-width: 100%;" src="/uploads/' . $row['file'] . '">';
			}
			echo '</div></div>';
		}
		echo '</div>';
		
		echo '<div class="tab-pane" id="2">';
		//other pending posts from other faculty
		$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid <> :posterid AND status = 'Pending' ORDER BY datetime DESC");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2], PDO::PARAM_INT);
		$stmt->execute();
		
		foreach(($stmt->fetchAll()) as $row) { 
			echo '<div class="panel panel-danger">';
			echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . $row['datetime'] . '</i>';
			echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			echo '</div><div class="panel-body"><strong>' . $row['posttitle'] . '</strong>';
			echo '<hr/>' . $row['post'];
			if($row['file'] <> '') {
				echo '<br/><img style="max-height: 25vh; max-width: 100%;" src="/uploads/' . $row['file'] . '">';
			}
			echo '</div><div class="panel-footer"><button id="' . $row['id'] . '" class="btn btn-info btn-block btnApprove">Approve this Post</button></div>';
			echo '</div></div>';
		}
		
		echo '</div></div>';
		$conn = null;

		echo "</div></div></div></div></div>";
	}
?>