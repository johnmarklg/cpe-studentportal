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
		$stmti = $conn->prepare("SELECT COUNT(*) FROM posts as pendingcount WHERE posterid <> :posterid AND status = 'Pending'");
		$stmti -> bindParam(':posterid', $_SESSION['name'][2], PDO::PARAM_INT);
		$stmti->execute();
		$pendingcount = $stmti->fetchColumn(); 
			
		echo '<div class="panel panel-default">
					<div class="panel-heading">
						<ul class="nav nav-pills nav-justified">
							<li class="active"><a  href="#a" data-toggle="tab">My Announcements</a></li>
							<li><a href="#b" data-toggle="tab">All Approved</a></li>';
							if($typecheck['position'] != "Limited") { 
								echo '<li><a href="#c" data-toggle="tab">For Approval <span class="badge">' . $pendingcount . '</span></a></li>'; 
							}
			echo '</ul>
				</div>
				<div class="panel-body">';
		
		
		//LOGGED IN ADMIN'S POSTS
		$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster 
		FROM `posts` 
		LEFT JOIN administrators
		ON administrators.id = posts.posterid
		WHERE posterid = :posterid ORDER BY datetime DESC");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2]);
		$stmt->execute();
		
		
		
		echo '<div class="tab-content">';
		echo '<div class="active tab-pane" id="a">';
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
				echo '<a href="" value="' . $row['posterid'] . '" name="' . $adminid . '" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
				if (($row['filetype'] == 'gif')||($row['filetype'] == 'jpg')||($row['filetype'] == 'png')||($row['filetype'] == 'webp')) {
					echo '</div><div class="panel-body"><div class="col-lg-2">' .
					'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
					. '</div><div class="col-lg-10"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
				} else if ($row['file'] == ''){
					echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
				} else {
					echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '<hr/>
					<a href="/uploads/' . $row['file'] . '" title="' . $row['posttitle'] . '">Click here to view/download attachment</a></div>';
				}
				if($row['status']=='Pending') {
					echo '</div></div>';
				} else {
					echo '</div><div class="panel-footer"><a href="post.php?postID=' . $row['id'] . '"><i class="fa fa-fw fa-comment"></i> '. $commentcount . ' comments</a></div></div>';
				}			
			}
		echo '</div>';
		
		//ALL APPROVED
		$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster 
		from `posts` 
		LEFT JOIN administrators
		ON administrators.id = posts.posterid
		WHERE `status` = 'Approved' ORDER BY datetime DESC");
		$stmt->execute();
		echo '<div class="tab-pane" id="b">';
		foreach(($stmt->fetchAll()) as $row) { 
			$time = strtotime($row['datetime']);
			$stmti = $conn->prepare("SELECT COUNT(*) FROM comments as commentcount WHERE postid=:postid");
			$stmti-> bindParam(':postid', $row['id']);
			$stmti->execute();
			$commentcount = $stmti->fetchColumn(); 
			$stmti = $conn->prepare("SELECT position FROM administrators WHERE id=:adminid");
			$stmti-> bindParam(':adminid', $adminid);
			$stmti->execute();
			$permissioncheck = $stmti->fetchColumn(); 
													
			echo '<div class="panel panel-info"><div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
			if(($row['posterid'] == $adminid)||($permissioncheck == 'Administrator (Elevated)')) {
				echo '<a href="" value="' . $row['posterid'] . '" name="' . $adminid . '" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			}
			if (($row['filetype'] == 'gif')||($row['filetype'] == 'jpg')||($row['filetype'] == 'png')||($row['filetype'] == 'webp')) {
				echo '</div><div class="panel-body"><div class="col-lg-2">' .
				'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
				. '</div><div class="col-lg-10"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
			} else if ($row['file'] == ''){
				echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
			} else {
				echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '<br></br>
				<a href="/uploads/' . $row['file'] . '" title="' . $row['posttitle'] . '">Click here to view/download attachment</a></div>';
			}
			echo '</div><div class="panel-footer"><a href="post.php?postID=' . $row['id'] . '"><i class="fa fa-fw fa-comment"></i> '. $commentcount . ' comments</a></div></div>';
		}
		echo '</div>';
		
		//for APPROVAL/PENDING FOR NOW
		if($typecheck['position'] != "Limited") {
			$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster from `posts` 
			LEFT JOIN administrators
			ON administrators.id = posts.posterid
			WHERE posterid <> :posterid AND status = 'Pending' ORDER BY datetime DESC");
			$stmt -> bindParam(':posterid', $_SESSION['name'][2], PDO::PARAM_INT);
			$stmt->execute();
			
			echo '<div class="tab-pane" id="c">';
			foreach(($stmt->fetchAll()) as $row) { 
				$time = strtotime($row['datetime']);
				echo '<div class="panel panel-danger"><div class="panel-heading">' . '<strong>' . $row['poster'] . '</strong> @ <i>' . relativeTime($time) . '</i>';
				echo '<a href="" value="' . $row['posterid'] . '" name="' . $adminid . '" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
				if (($row['filetype'] == 'gif')||($row['filetype'] == 'jpg')||($row['filetype'] == 'png')||($row['filetype'] == 'webp')) {
					echo '</div><div class="panel-body"><div class="col-lg-2">' .
					'<a href="/uploads/' . $row['file'] . '" class="swipebox" title="' . $row['posttitle'] . '"><img style="max-height: 25vh; max-width: 100%; border:1px solid #021a40" src="/uploads/' . $row['file'] . '"></a>'
					. '</div><div class="col-lg-10"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
				} else if ($row['file'] == ''){
					echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '</div>';
				} else {
					echo '</div><div class="panel-body"><div class="col-lg-12"><strong>' . $row['posttitle'] . '</strong><hr/>' . $row['post'] . '<hr/>
					<a href="/uploads/' . $row['file'] . '" title="' . $row['posttitle'] . '">Click here to view/download attachment</a></div>';
				}
				echo '</div><div class="panel-footer"><button value="' . $row['posterid'] . '" name="' . $adminid . '" id="' . $row['id'] . '" class="btn btn-info btn-block btnApprove">Approve this Post</button></div></div>';
			}
			echo '</div></div></div>';
		} else {
			echo '</div>';
		}
		//echo '</div></div></div>';
		
		
		$conn = null;

	}
?>