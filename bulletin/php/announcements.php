<?php
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("SELECT posts.*, administrators.name as poster 
	from `posts` 
	LEFT JOIN administrators
	ON administrators.id = posts.posterid
	WHERE `status` = 'Approved' AND `showbulletin` = 1 ORDER BY datetime DESC");
	$stmt->execute();
	
	$init = 0;
	
	foreach(($stmt->fetchAll()) as $row) { 
		$posttitle[$init] = $row['posttitle'];
		$post[$init] = $row['post'];
		$file[$init] = $row['file'];
		$filetype[$init] = $row['filetype'];
		$poster[$init] = $row['poster'];
		$datetime[$init] = $row['datetime'];
		//increment
		$init++;
	}
	
	$announcements = ''; //initialize string
	
	for ($x=0; $x<$init; $x++) {
		if($x != 0) {
		$announcements .= '<div class="item" style="height: 400px">';
		} else {
		$announcements .= '<div class="item active" style="height: 400px">';	
		}
		$announcements .= '<img src="/uploads/' . $file[$x] . '" alt="Error! File not found!" style="height: 400px; margin: auto;">
			<div class="carousel-caption">
				<h4><a style="font-size: 5vw;" href="">' . $posttitle[$x] . '</a> <i style="font-size: 2.5vw;">' . $poster[$x] . '</i></h4><p style="font-size: 2vw;">' . $post[$x] . '</p>
			</div>
		</div>';
	}
		
	$announcements .= '</div>';
	//echo '<div class="col-md-4"><ul class="list-group" style="padding: 0;">';

	/*for ($y=0; $y<$init; $y++) {
		if($y != 0) {
			$announcements .= '<li data-target="#myCarousel" data-slide-to="' . $y . '" class="list-group-item">';
		} else {
			$announcements .= '<li data-target="#myCarousel" data-slide-to="' . $y . '" class="list-group-item active">';
		}
		$announcements .= '<h4 style="color:black">' . $posttitle[$y] . '</h4></li>';
	}
	$announcements .= '</ul></div>';*/
	
	$conn = null;
	
	echo $announcements;
?>