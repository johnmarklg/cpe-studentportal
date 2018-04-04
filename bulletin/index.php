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
               <video id="idle_video" onended="onVideoEnded();" class="embed-responsive-item">
                  <source src="" type="video/mp4">
               </video>
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
				<div id="myCarousel" class="carousel slide row" data-ride="carousel">
					<!--Announcements-->
					<div id="announcements" class="carousel-inner"  style="height: 400px"></div>
				</div>
			</div>
		</div>
		<div class="row" style="padding-top: 10px;">
			<div class="col-md-4">
				<div class="row">
					<div id="calendar"></div>
				</div>
				<hr/>
				<div class="row">
					<img class="center-block" src="assets/images/howtoconnect.png"  style="width: 100%">
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
							<?php
								  require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");
								  
								  $conn = getDB('cpe-studentportal');
								  
								  $stmt = $conn->prepare("SELECT text FROM infotext WHERE referenceid > 1 AND referenceid < 5");
								  $stmt->execute();
								  $init = 0;
								  foreach(($stmt->fetchAll()) as $row) { 
									$infotext[$init] = $row['text'];
									$init++;
								  }
								  //0 = Mission Vision, 1 = Core Values, 2 = Goals and Objectives
								  $conn = null;
								  
								echo '<img class="center-block" style="width: 100%;" src="assets/images/missionvision.png" style="height: 500px">
								<br/> ' . $infotext[0] . '<br/>
								<img class="center-block" style="width: 100%;" src="assets/images/corevalues.png" style="height: 500px">
								<br/>  ' . $infotext[1];
								/*'<img class="center-block" style="width: 100%;" src="assets/images/goalsobj.png" style="height: 500px">
								<br/>  ' . $infotext[2];*/
							?>
				</div>
				<div class="row centered">
					<div id="myCarousel3" class="carousel slide vertical text-centered " style="text-align: center; width: 100%; height: 330px;">
						 <!--<h3 class="text-centered">ICpEP.se Officers</h3>-->
						 <hr/>
						 <div id="officers" class="carousel-inner">
							<!--Officers-->
						 </div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="row">
					<div id="myCarousel2" class="carousel slide" data-ride="#myCarousel2" style="width: 100%;">
                        <!-- Gallery -->
                        <div id="gallery" class="carousel-inner">
                        </div>
                    </div>
				</div>
				<hr/>
				<div class="row">
					<div class="text-center" style="height:450px; padding-top: 10px">
						<a class="twitter-timeline" data-height="470px" data-theme="dark" href="https://twitter.com/USCMMSU?ref_src=twsrc%5Etfw">Tweets by USCMMSU</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
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
		var dir_src = "/uploads/videos/files/";
		//"(1) 9GAG- Go Fun The World_3.mp4","(1) Angry doggo - 9GAG.mp4"
		var video_index = 0;
		var video_player = null;
		var video_list = [];
		
		window.setInterval(function(){
			//Update Video List
			//clear list
			video_list = [];
			$.ajax({
				type: "POST",
				url: "/php/getVideos.php",
				cache: false,
				success: function(result){
					$video_list = $.parseJSON(result);
					
					$.each($video_list, function() {
					  video_list.push(this);
					});
					
					//console.log(video_list);
					
					/*video_player = document.getElementById("idle_video");
					video_player.setAttribute("src", dir_src + video_list[video_index]);
					video_player.play();*/
				}
			});
		}, 10000);
		
		
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
					//console.log(dir_src + video_list[video_index]);
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
	
	
	  <script>
		$( document ).ready(function() {
			//gallery!
			$.ajax({
				type: "POST",
				url: "/bulletin/php/gallery.php",
				//data: {postData: $postinfo},
				cache: false,
				success: function(result){
					//console.log(result);
					$('#gallery').html(result);
				}
			});
			//announcements!
			$.ajax({
				type: "POST",
				url: "/bulletin/php/announcements.php",
				cache: false,
				success: function(result){
					//console.log(result);
					$('#announcements').html(result);
				}
			});
			//officers!
			$.ajax({
				type: "POST",
				url: "/bulletin/php/officers.php",
				cache: false,
				success: function(result){
					//console.log(result);
					$('#officers').html(result);
				}
			});
		});
		
		window.setInterval(function(){
			// gallery
			//console.log('Updating Gallery and Announcements...');
			
			$("#myCarousel2").carousel("pause").removeData();
			$.ajax({
				type: "POST",
				url: "/bulletin/php/gallery.php",
				//data: {postData: $postinfo},
				cache: false,
				success: function(result){
					//console.log(result);
					$('#gallery').html(result);
					$('#myCarousel2').carousel({
					  interval: 800
					});
				}
			});
			// announcements
			$("#myCarousel").carousel("pause").removeData();
			$.ajax({
				type: "POST",
				url: "/bulletin/php/announcements.php",
				cache: false,
				success: function(result){
					//console.log(result);
					$('#announcements').html(result);
					$("#myCarousel").carousel({
					  interval: 1200,
					  cycle: true
					});
				}
			});
			// officers
			$("#myCarousel3").carousel("pause").removeData();
			$.ajax({
				type: "POST",
				url: "/bulletin/php/officers.php",
				cache: false,
				success: function(result){
					//console.log(result);
					$('#officers').html(result);
					$("#myCarousel3").carousel({
					  interval: 700,
					  cycle: true
					});
				}
			});
		}, 10000);
		//update every 5 minutes
	  </script>
	  
      <script>
		$( document ).ready(function() {
			$('#calendar').fullCalendar({
				defaultView: 'listWeek',
				header: false,
				height: 360,
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
		});
		
		window.setInterval(function(){
			 //reload calendar
			 //console.log('Reloading Calendar');
			 $('#calendar').fullCalendar('destroy');
			 $('#calendar').fullCalendar({
				defaultView: 'listWeek',
				header: false,
				height: 360,
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
		}, 10000);
      </script>
   </body>
</html>