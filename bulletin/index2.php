<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Digital Bulletin</title>
	  <link rel="icon" href="/assets/images/icon-icpep.png">
      <!-- Bootstrap -->
      <link rel="stylesheet" href="css/bootstrap.css">
      <!--<link href="/assets/bootstrap/css/bootstrap-darkly.min.css" rel="stylesheet">-->
      <link rel="stylesheet" href="css/bulletin.css">
      <style>
         html {
         overflow: hidden;
         }
         .container-fluid {
         padding-left: 0;
         padding-right: 0;
         }	
      </style>
   </head>
   <body onload="onload();" style="vertical-align: top">
      <!-- HEADER -->
      <header>
         <div class="jumbotron" style="background-color: #222;" align="center">
            <div class="embed-responsive embed-responsive-16by9" align="center" >
               <video id="idle_video" onended="onVideoEnded();" muted class="embed-responsive-item">
                  <source src="" type="video/mp4">
               </video>
			   <script>
					var dir_src = "/uploads/videos/files/";
					//"(1) 9GAG- Go Fun The World_3.mp4","(1) Angry doggo - 9GAG.mp4"
					var video_index = 0;
					var video_player = null;
					var video_list = [];

					function onload(){
						//console.log("body loaded");
						$.ajax({
							type: "POST",
							url: "/php/getVideos.php",
							cache: false,
							success: function(result){
								$video_list = $.parseJSON(result);
								//console.log($video_list);
								
								$.each($video_list, function() {
								  video_list.push(this);
								  //alert(this);
								});
								
								//console.log(video_list);
								
								video_player = document.getElementById("idle_video");
								console.log(dir_src + video_list[video_index]);
								video_player.setAttribute("src", dir_src + video_list[video_index]);
								video_player.play();
								//alert("Successfully removed event from database!");
								//location.reload();
							}
						});
					}

					function onVideoEnded(){
						//console.log("video ended");
						if(video_index < video_list.length - 1){
							video_index++;
						}
						else{
							video_index = 0;
						}
						//console.log(dir_src + video_list[video_index]);
						video_player.setAttribute("src", dir_src + video_list[video_index]);
						video_player.play();
					}
				</script>
            </div>
            <div id="overlay_image" class="col-lg-12">
               <img src="assets/images/logo tag.png" alt="Source Image Not Found" style="height: 200px; width: 1050px">
            </div>
         </div>
         <!-- / HEADER --> 
      </header>
      
	  <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
		<div class="row">
			<div class="col-lg-12" style="padding-left: 0; padding-right: 0;">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Wrapper for slides -->
					<div class="carousel-inner"  style="height: 400px">
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
						  $conn = null;
						  for ($x=0; $x<$init; $x++) {
							//echo $init;
							//echo $posttitle[$x] . '<br/>';
							if($x != 0) {
							echo '<div class="item" style="height: 400px">';
							} else {
							echo '<div class="item active" style="height: 400px">';	
							}
							echo '<img src="/uploads/' . $file[$x] . '" alt="Error! File not found!" style="height: 400px; margin: auto;">
												<div class="carousel-caption">
													<h4><a href="#">' . $posttitle[$x] . '</a> <i>' . $poster[$x] . '</i></h4>
													<p>' . $post[$x] . '</p>
												</div>
											</div>';
						  }
						  echo '</div>
										<!-- End Carousel Inner -->
										<ul class="list-group col-sm-4" style="padding: 0;">';
						  
						  for ($y=0; $y<$init; $y++) {
							if($y != 0) {
								echo '<li data-target="#myCarousel" data-slide-to="' . $y . '" class="list-group-item">';
							} else {
								echo '<li data-target="#myCarousel" data-slide-to="' . $y . '" class="list-group-item active">';
							}
								echo '<h4 style="color:black">' . $posttitle[$y] . '</h4></li>';
						  }
						  ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="padding-top: 10px;">
			<div class="col-md-4">
				<div class="row">
					<div id="calendar"></div>
				</div>
				<div class="row">
					<img class="center-block" src="assets/images/qrnobg.png"  style="height:450px; width: 100%">
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<img class="center-block" style="width: 100%;" src="assets/images/MissionVission2.png" style="height: 500px">
				</div>
				<div class="row centered">
					<div id="myCarousel3" class="carousel slide vertical text-centered " style="text-align: center; width: 100%; height: 330px;">
						 <h3 class="text-centered">ICpEP.se Officers</h3>
						 <br/>
						 <div class="carousel-inner">
							<?php
							   $conn = getDB('cpe-studentportal');
							   
							   $stmt = $conn->prepare("SELECT officers.*, students.surname, students.firstname, students.middlename, students.ContactNo from `officers` 
							   LEFT JOIN students
							   ON officers.studnum = students.studnum
							   ORDER BY id ASC");
							   $stmt->execute();
							   $counter = 0;
							   foreach(($stmt->fetchAll()) as $row) { 
								$studnum[$counter] = $row['studnum'];
								$surname[$counter] = $row['surname'];
								$firstname[$counter] = $row['firstname'];
								$middlename[$counter] = $row['middlename'];
								$contactnum[$counter] = $row['ContactNo'];
								$photolink[$counter] = $row['photolink'];
								$position[$counter] = $row['office'];
								//increment
								$counter++;
							   }
							   $conn = null;
							   for ($v=0; $v<$counter; $v++) {
								if($v==0) {
									echo '<div class="item active text-center">';
								} else {
									echo '<div class="item text-center">';
								}
								
								echo '<img class="center-block" style="width: 200px; height: 200px;" src="/uploads/officers/' . $photolink[$v] . '">
													 <h3 style="font-size: 20px; margin-top: 25px;">ICPEP ORGANIZATION</h3>
													 <p style="font-size: 15px; margin-bottom: 2px">' . $surname[$v] . ', ' . $firstname[$v] . ' ' . $middlename[$v] .'</p>
													 <p style="font-size: 15px;">' . $position[$v] .'</p>
													 <p style="font-size: 15px;">' . $contactnum[$v] . '</p>
								</div>';
							   }
							   ?>
						 </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div id="myCarousel2" class="carousel slide" data-ride="#myCarousel2" style="width: 100%;">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                           <?php
                              $dir_path = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/gallery/files/";
                              //$extensions_array = array ('jpg','png','jpeg');
                              $bool = 0;
                              if (is_dir($dir_path))
                              {
                              	$files = scandir($dir_path);
                              
                              	for($i = 0; $i < count ($files); $i++)
                              	{
                              		if($files[$i] !='.' && $files[$i] != '..')
                              		{
                              			$file = pathinfo($files[$i]);
                              $ext = pathinfo($files[$i], PATHINFO_EXTENSION);
                              //echo '<p style="color: white;">' . $files[$i] . '</p>';
                              if(($files[$i] != '.gitignore')&&($files[$i] != '.htaccess')&&($files[$i] != 'thumbnail')) {
                              if($bool == 0) {
                              echo "<div class=\"item active\"><img src=\"/uploads/gallery/files/$files[$i]\" style='width:320px;height:300px;'></div>";	
                              $bool = 1;
                              } else {
                              echo "<div class=\"item\"><img src=\"/uploads/gallery/files/$files[$i]\" style='width:320px;height:300px;'></div>";	
                              }
                              }
                              		}
                              	} 
                              }
                              ?>
                        </div>
                    </div>
				</div>
				<div class="row">
					<div class="text-center" style="height:510px; padding-top: 10px">
						<a class="twitter-timeline" data-height="510px" data-theme="dark" href="https://twitter.com/USCMMSU?ref_src=twsrc%5Etfw">Tweets by USCMMSU</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
			</div>
		</div>
		<div style="position: fixed; bottom: 0;" class="row">
            <div class="col-md-2" style="padding-left:0;padding-right:0">
               <div id="first" class="timetext"></div>
            </div>
            <div class="col-md-10" style="padding-left:0;padding-right:0">
               <style type="text/css">
                  .html-wpsites {height:60px;background-color:rgba(65,64,64,1.00);font-family:Arial;font-size:60px;color:#ffffff;}
               </style>
               <marquee class="html-wpsites" direction="left" behavior="scroll" scrollamount="50" width="100%" bgcolor="rgba(255,255,255,1.00)"><span>
                  <?php
                     $conn = getDB('cpe-studentportal');
                     
                     $stmt = $conn->prepare("SELECT posts.*, administrators.name as poster 
                     from `posts` 
                     LEFT JOIN administrators
                     ON administrators.id = posts.posterid
                     WHERE `status` = 'Approved' AND `showbulletin` = 3 ORDER BY datetime DESC");
                     $stmt->execute();
                     $tick = 0;
                     foreach(($stmt->fetchAll()) as $row) { 
                     	$posttitle[$tick] = $row['posttitle'];
                     	$post[$tick] = $row['post'];
                     	$file[$tick] = $row['file'];
                     	$filetype[$tick] = $row['filetype'];
                     	$poster[$tick] = $row['poster'];
                     	$datetime[$tick] = $row['datetime'];
                     	//increment
                     	$tick++;
                     }
                     $conn = null;
                     for ($x=0; $x<$tick; $x++) {
                     	echo '<small>[' . $datetime[$x] . ']</small> <b>' . $posttitle[$x] . '</b>: ' . $post[$x];
                     	if($file[$x] != '') {
                     		echo ' (Attachment may be viewed/downloaded through the Student Portal)';
                     	}
                     	if($x != ($tick-1)) {
                     	echo ' || ';
                     	}
                     }
                     ?>
                  </span>
               </marquee>
            </div>
         </div>
	</div>
      
	  
	  
	  <!--SCRIPTS-->
	  <script src="/assets/js/jquery.js"></script>
      <!--Bootstrap JS-->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bulletin.js"></script>
      <!--FULLCALENDAR-->
      <!--MPL-->
      <script src="/assets/js/moment.min.js"></script>
      <script src="/assets/js/popper.min.js"></script>
      <script src="/assets/js/list.min.js"></script>
      <link href="/assets/fullcalendar/css/fullcalendar.min.css" rel="stylesheet" />
      <script src="/assets/fullcalendar/js/fullcalendar.min.js"></script>
      <script>
         $('#calendar').fullCalendar({
         	defaultView: 'listWeek',
         	header: false,
         	height: 380,
         	themeSystem: 'bootstrap3',
         	navLinks: true, // can click day/week names to navigate views
         	eventLimit: true, // allow "more" link when too many events
         
         	events: "/functions/events.php",
         
         	eventRender: function (event, element) {
         		element.attr('href', 'javascript:void(0);');
         		element.click(function() {
         			$("#beginTime").html(moment(event.start).format('MMM Do h:mm A'));
         			$("#closeTime").html(moment(event.end).format('MMM Do h:mm A'));
         			$("#eventDesc").html(event.description);
         			$("#eventTitle").html(event.title);
         			$("#eventLocat").html(event.location);
         			$('#modal1').modal('show');
         		});
         	}
         });
		 
		 
		 /*$( document ).ready(function() {
			//console.log( "ready!" );
			var videoSource = new Array();
			videoSource[0] = '/uploads/videos/files/(1) 9GAG- Go Fun The World_3.mp4';
			videoSource[1] = '/uploads/videos/files/(1) Angry doggo - 9GAG.mp4';
			var i = 0; // define i
			var videoCount = videoSource.length;

			function videoPlay(videoNum) {
				document.getElementById("myVideo").setAttribute("src", videoSource[videoNum]);
				document.getElementById("myVideo").load();
				document.getElementById("myVideo").play();
			}
			
			document.getElementById('myVideo').addEventListener('ended', myHandler, false);
			console.log(videoSource[i]);
			videoPlay(i); // play the video

			function myHandler() {
				i++;
				console.log(videoSource[i]);
				if (i == (videoCount - 1)) {
					i = 0;
					videoPlay(i);
				} else {
					videoPlay(i);
				}
			}
		});*/
      </script>
   </body>
</html>