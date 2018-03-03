<?php	
	function showAnnouncements($adminid) {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/timefxn.php");
		
		$conn = getDB('cpe-studentportal');
		
		//PENDING POSTS FOR Approval
		$stmt = $conn->prepare("SELECT position FROM administrators WHERE id = :id");
		$stmt -> bindParam(':id', $adminid, PDO::PARAM_INT);
		$stmt->execute();
		$typecheck = $stmt->fetch(PDO::FETCH_ASSOC);
		
		//My Announcements
		echo '<div class="row"><div class="col-lg-12"><div class="panel panel-default">
		<div class="panel-heading"><ul class="nav nav-pills nav-justified">
		<li class="active"><a  href="#1" data-toggle="tab">My Announcements</a></li>
		<li><a href="#2" data-toggle="tab">All Approved</a></li>';
		if($typecheck['position'] != "Limited") { echo '<li><a href="#3" data-toggle="tab">For Approval</a></li>'; }
		echo '</ul></div><div class="panel-body">';
		
		
		//USER'S
		$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid = :posterid ORDER BY datetime DESC");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2]);
		$stmt->execute();
		echo '<div class="tab-content"><div class="active tab-pane" id="1">';
		foreach(($stmt->fetchAll()) as $row) { 
			$time = strtotime($row['datetime']);
			$stmti = $conn->prepare("SELECT COUNT(*) FROM comments as commentcount WHERE postid=:postid");
			$stmti-> bindParam(':postid', $row['id']);
			$stmti->execute();
			$commentcount = $stmti->fetchColumn(); 
			
			if($row['status']=='Pending') {
				echo '<div class="panel panel-danger">';
			} else {
				echo '<div class="panel panel-info">';
			}
			echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
			echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			if($row['file'] == '') {
				echo '</div><div class="panel-body"><div class="col-lg-12">';
			} else {
				echo '</div><div class="panel-body"><div class="col-lg-2">' .
				'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
				. '</div><div class="col-lg-10">';
			}
			echo '<strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
			if($row['status']=='Pending') {
				echo '</div></div>';
			} else {
				echo '</div><div class="panel-footer"><a href="post.php?postID=' . $row['id'] . '"><i class="fa fa-fw fa-comment"></i> '. $commentcount . ' comments</a></div></div>';
			}			
		}
		echo '</div>';
		
		//ALL APPROVED
		$stmt = $conn->prepare("SELECT * from `posts` WHERE `status` = 'Approved' ORDER BY datetime DESC");
		$stmt->execute();
		echo '<div class="tab-pane" id="2">';
		foreach(($stmt->fetchAll()) as $row) { 
			$time = strtotime($row['datetime']);
			$stmti = $conn->prepare("SELECT COUNT(*) FROM comments as commentcount WHERE postid=:postid");
			$stmti	 -> bindParam(':postid', $row['id']);
			$stmti->execute();
			$commentcount = $stmti->fetchColumn(); 
													
			echo '<div class="panel panel-info">';
			echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
			echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			if($row['file'] == '') {
				echo '</div><div class="panel-body"><div class="col-lg-12">';
			} else {
				echo '</div><div class="panel-body"><div class="col-lg-2">' .
				'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
				. '</div><div class="col-lg-10">';
			}
			echo '<strong>' . $row['posttitle'] . '</strong>';
			echo '<hr/>' . $row['post'];
			echo '</div></div><div class="panel-footer"><a href="post.php?postID=' . $row['id'] . '"><i class="fa fa-fw fa-comment"></i> '. $commentcount . ' comments</a></div></div>';
		}
		echo '</div>';
		
		if($typecheck['position'] != "Limited") {
			$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid <> :posterid AND status = 'Pending' ORDER BY datetime DESC");
			$stmt -> bindParam(':posterid', $_SESSION['name'][2], PDO::PARAM_INT);
			$stmt->execute();
			echo '<div class="tab-pane" id="3">';
		
			foreach(($stmt->fetchAll()) as $row) { 
				$time = strtotime($row['datetime']);
				echo '<div class="panel panel-danger">';
				echo '<div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
				echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
				if($row['file'] == '') {
					echo '</div><div class="panel-body"><div class="col-lg-12">';
				} else {
					echo '</div><div class="panel-body"><div class="col-lg-2">' .
					'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
					. '</div><div class="col-lg-10">';
				}
				
				echo '<strong>' . $row['posttitle'] . '</strong>';
				echo '<hr/>' . $row['post'];
				echo '</div></div><div class="panel-footer"><button id="' . $row['id'] . '" class="btn btn-info btn-block btnApprove">Approve this Post</button></div>';
				echo '</div></div>';
			}
			echo '</div></div>';
		}
		$conn = null;

		echo "</div></div></div></div></div>";
	}
?>