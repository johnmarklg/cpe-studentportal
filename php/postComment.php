<?php	
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$jsoncommentdata = json_decode($_POST['commentinfo'], true);
		
	$conn = getDB('cpe-studentportal');
			
	foreach ($jsoncommentdata as $key => $value) {	
		$stmt = $conn->prepare("INSERT INTO `comments` (postid, commenterid, parentid, comment, datetime) 
		VALUES (:postid, :commenterid, :parentid, :comment, now())");
		//$stmt -> bindParam(':commentid', $latestID[0]);
		$stmt -> bindParam(':postid', $value['postID']);
		$stmt -> bindParam(':commenterid', $value['commenterID']);
		$stmt -> bindParam(':parentid', $value['parentID']);
		$stmt -> bindParam(':comment', $value['commentText']);
		$stmt->execute();				
		
		$stmt = $conn->prepare("INSERT INTO `activitylog` 
		(userid, action, target, timestamp) 
		VALUES (:userid, 23, :target, now())");
		$stmt -> bindParam(':userid', $value['commenterID']);
		$stmt -> bindParam(':target', $value['postID']);
		$stmt->execute(); 			
	}
	
	$conn = null;	
	
	echo $conn;
?>