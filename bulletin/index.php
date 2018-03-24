<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Bulletin</title>
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
    <body style="vertical-align: top">
        <!-- HEADER -->
        <header>
            <div class="jumbotron" align="center">
                <div class="embed-responsive embed-responsive-16by9" align="center" >
                    <video loop autoplay class="embed-responsive-item">
                        <source src="assets/videos/video1.mp4" type="video/mp4">
                    </video>
                </div>
                <div id="overlay_image" class="col-lg-12">
                    <img src="assets/images/logo tag.png" alt="source not found" style="height: 200px; width: 1050px">
                </div>
            </div>
            <!-- / HEADER --> 
        </header>
        <!-- CAROUSEL START-->
		<!--Announcements-->
		<div class="container-fluid" style="padding: 0;">
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
			echo '<img src="/uploads/' . $file[$x] . '" alt="Error! File not found!" style="height: 400px; width: inherit; margin: auto;">
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
                <!-- Controls -->
                <!--<div class="carousel-controls">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>-->
            </div>
            <!-- End Carousel -->
            <div class="row">
                <div class="col-md-4 text-center centered" style="height: 400px; padding-top: 5px">
                    <!--<div class="containerweather">
                        <img src="assets/weather.png" style="height: 200px; width: 330px">
                        <div class="text-block">
                            <h3 style="font-size: 15px; margin-top: 15px;">Temperature</h3>
                            <p>30ºC</p>
                        </div>
                        <div class="text-block1">
                            <h3 style="font-size: 15px; margin-top: 15px;">Wind Direction</h3>
                            <p>120.3º North </p>
                        </div>
                        <div class="text-block2">
                            <h3 style="font-size: 15px; margin-top: 15px;">Humidity</h3>
                            <p>100%</p>
                        </div>
                        <div class="text-block3">
                            <h3 style="font-size: 15px; margin-top: 15px;">Wind Speed</h3>
                            <p>1.5 km/ph</p>
                        </div>
                        <div class="text-block4">
                            <h3 style="font-size: 15px; margin-top: 15px;">Batac City, Ilocos Norte</h3>
                        </div>
                    </div>-->
                    <div class="centered">
						<div id="calendar">
						</div>
                        <!--<h3 style="font-size: 30px; margin-top: 25px; margin-bottom: 20px">Upcoming Events!</h3>
                        <p>1.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>2.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>3.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>4.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>5.  iCpEp Day April 69, 2018 1:00p.m.</p>-->
                    </div>
                </div>
                <div class="col-md-4 text-center"  style="height: 400px; padding-top: 5px">
                    <img src="assets/images/MissionVission2.png" style="height: 500px">
                </div>
                <div class="col-md-4 text-center" style="height:300px; padding-top:10px;">
                    <div id="rcorners4">
                        <div id="myCarousel2" class="carousel slide" data-ride="#myCarousel2" style="height: 300px;">
                            <!-- Indicators -->
                            <!--<ol class="carousel-indicators">
                                <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel2" data-slide-to="1"></li>
                                <li data-target="#myCarousel2" data-slide-to="2"></li>
                                <li data-target="#myCarousel2" data-slide-to="3"></li>
                                <li data-target="#myCarousel2" data-slide-to="4"></li>
                                <li data-target="#myCarousel2" data-slide-to="5"></li>
                                <li data-target="#myCarousel2" data-slide-to="6"></li>
                                <li data-target="#myCarousel2" data-slide-to="7"></li>
                                <li data-target="#myCarousel2" data-slide-to="8"></li>
                                <li data-target="#myCarousel2" data-slide-to="9"></li>
                            </ol>-->
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php
                                    $dir_path = $_SERVER["DOCUMENT_ROOT"]  . "/uploads/gallery/files/";
                                    $extensions_array = array ('jpg','png','jpeg');
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
                        <!--slideshow-->
                    </div>
                    <div class="text-center" style="height:510px; padding-top: 10px">
                        <a class="twitter-timeline" data-height="510px" data-theme="dark" href="https://twitter.com/USCMMSU?ref_src=twsrc%5Etfw">Tweets by USCMMSU</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    </div>
                </div>
            </div>
        </div>
        <!--container-->
        <div class ="row">
            <div class="col-md-4 centered">
                <img src="assets/images/qrnobg.png"  style="height:450px; width: 100%">
            </div>
            <div class="col-md-4 text-center">
                <div id="myCarousel" class="carousel slide vertical" style="width: 450px; height: 330px; top: 90px ">
                    <!-- Carousel items -->
                    <h3 style="font-size: 25px; margin-top: 25px; margin-left: 15px; margin-right: 15px">CpE Faculty & Organization</h3>
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
								echo '<div class="item active">';
							} else {
								echo '<div class="item">';
							}
							
							echo '<img style="width: 200px; height: 200px; margin-left: 70px" src="/uploads/officers/' . $photolink[$v] . '">
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">' . $surname[$v] . ', ' . $firstname[$v] . ' ' . $middlename[$v] .'</p>
                            <p style="font-size: 15px;">' . $position[$v] .'</p>
                            <p style="font-size: 15px;">' . $contactnum[$v] . '</p>
							</div>';
						}
					?>
                        <!--<div class="item active">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= assets/images/1.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>
                        <div class="item">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= assets/images/2.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>
                        <div class="item">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= assets/images/3.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
        
		<!--jQuery-->
		<!--<script src="js/jquery-1.11.3.min.js"></script>-->
		<!--<script src="js/jquery-3.3.1.min.js"></script>-->
		<script src="/assets/js/jquery.js"></script>
		<!--Bootstrap JS-->
		<!--<script src="js/bootstrap.js"></script>-->
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
				height: 350,
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
		</script>
    </body>
</html>