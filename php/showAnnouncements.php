<?php	
	function showAnnouncements() {

		require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
		
		//My Announcements
		echo "<div class=\"row\"><div class=\"col-lg-12\"><div class=\"panel panel-default\">
		<div class=\"panel-heading\">My Announcements</div><div class=\"panel-body\">";

		$conn = getDB('cpe-studentportal');
		$stmt = $conn->prepare("SELECT * from `posts` WHERE posterid = :posterid ORDER BY datetime DESC");
		$stmt -> bindParam(':posterid', $_SESSION['name'][2]);
		$stmt->execute();

		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

		foreach(($stmt->fetchAll()) as $row) { 
			echo '<div class="panel panel-default">
			<div class="panel-body"><strong>' . $row['poster'] . '</strong> @ <i>' . $row['datetime'] . '</i>';
			echo '<a href="" id="' . $row['id'] .'" class="post-remove close" data-dismiss="alert" aria-label="close">&times;</a>';
			//echo '<small class="postID">' . $row['id'] . '</small>';
			echo '<hr/>' . $row['post'];
			if($row['file'] <> '') {
				echo '<hr/><img style="max-height: 35vh; max-width: 100%;" src="/uploads/' . $row['file'] . '">';
			}
			echo '</div></div>';
		}
		$conn = null;		

		echo "</div></div></div></div>";
	}
?>