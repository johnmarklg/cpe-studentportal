<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Digital Bulletin</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap2.css">
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
                    <video loop class="embed-responsive-item">
                        <source src="<!--Assets/Video/MMSU CORPORATE VIDEO.mp4-->" type="video/mp4">
                    </video>
                </div>
                <div id="overlay_image" class="col-lg-12">
                    <img src="Assets/Images/logo tag.png" alt="source not found" style="height: 200px; width: 1050px">
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
			echo '<img src="/uploads/' . $file[$x] . '" alt="Error! File not found!" style="height: 400px; width: inherit">
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
                    <!--<li data-target="#myCarousel" data-slide-to="0" class="list-group-item active">
                        <h4 style="color:black">Headline 1</h4>
                    </li>
                    <li data-target="#myCarousel" data-slide-to="1" class="list-group-item">
                        <h4  style="color:black">Headline 2</h4>
                    </li>
                    <li data-target="#myCarousel" data-slide-to="2" class="list-group-item">
                        <h4  style="color:black">Headline 3</h4>
                    </li>
                    <li data-target="#myCarousel" data-slide-to="3" class="list-group-item">
                        <h4  style="color:black">Headline 4</h4>
                    </li>
                    <li data-target="#myCarousel" data-slide-to="4" class="list-group-item">
                        <h4  style="color:black">Headline 5</h4>
                    </li>-->
                </ul>
                <!-- Controls -->
                <div class="carousel-controls">
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
            <!-- End Carousel -->
            <div class="row">
                <div class="col-md-4 text-center centered" style="height: 400px; padding-top: 5px">
                    <div class="containerweather">
                        <img src="Assets/weather.png" style="height: 200px; width: 330px">
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
                    </div>
                    <div class="centered">
                        <h3 style="font-size: 30px; margin-top: 25px; margin-bottom: 20px">Upcoming Events!</h3>
                        <p>1.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>2.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>3.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>4.  iCpEp Day April 69, 2018 1:00p.m.</p>
                        <p>5.  iCpEp Day April 69, 2018 1:00p.m.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center"  style="height: 400px; padding-top: 5px">
                    <img src="Assets/Images/MissionVission2.png" style="height: 500px">
                </div>
                <div class="col-md-4 text-center" style="height:300px; padding-top:10px;">
                    <div id="rcorners4">
                        <div id="myCarousel2" class="carousel slide" data-ride="#myCarousel2" style="height: 300px;">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
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
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <?php
                                    $dir_path = "Assets/Images/";
                                    $extensions_array = array ('jpg','png','jpeg');
                                    $bool = 0;
                                    if (is_dir($dir_path))
                                    {
                                    
                                    	$files = scandir($dir_path);
                                    
                                    	for($i = 0; $i < count ($files); $i++)
                                    	{
                                    		if($files[$i] !='.' && $files[$i] != '..')
                                    		{
                                    
                                    			$file = pathinfo ($files[$i]);
                                    			//$extension = $file['extension'];
                                    			if($bool == 0) {
                                    			echo "<div class=\"item active\"><img src='$dir_path$files[$i]' style='width:320px;height:300px;'></div>";	
                                    			$bool = 1;
                                    			} else {
                                    			echo "<div class=\"item\"><img src='$dir_path$files[$i]' style='width:320px;height:300px;'></div>";	
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
                <img src="Assets/Images/qrnobg.png"  style="height:450px; width: 100%">
            </div>
            <div class="col-md-4 text-center">
                <div id="myCarousel" class="carousel slide vertical" style="width: 450px; height: 330px; top: 90px ">
                    <!-- Carousel items -->
                    <h3 style="font-size: 25px; margin-top: 25px; margin-left: 15px; margin-right: 15px">CpE Faculty & Organization</h3>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= Assets/images/1.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>
                        <div class="item">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= Assets/images/2.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>
                        <div class="item">
                            <img style="width: 200px; height: 200px; margin-left: 70px" src= Assets/images/3.jpg>
                            <h3 style="font-size: 20px; margin-top: 25px; margin-left: 15px; margin-right: 15px">ICPEP ORGANIZATION</h3>
                            <p style="font-size: 15px; margin-bottom: 2px">Juan De La Cruz</p>
                            <p style="font-size: 15px;">President</p>
                            <p style="font-size: 15px;">09090909099</p>
                        </div>
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
                <marquee class="html-wpsites" direction="left" behavior="scroll" scrollamount="20" width="100%" bgcolor="rgba(255,255,255,1.00)">
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
					echo '<i>' . $datetime[$x] . '</i> <b>' . $posttitle[$x] . '</b>: ' . $post[$x];
					if($file[$x] != '') {
						echo ' -- Attachment may be viewed/downloaded through the Student Portal.';
					}
					if($x != $tick) {
					echo ' || ';
					}
				}
			?>
           	<!--Please contact these numbers for inquiry, advertisement or suggestions: 09171699984/6708224 || BS CPE 5A POLSCI 2-3PM class is cancelled due to urgent matters. || ICPEP DAY on Friday! Please wear your org shirt! || All classes of Engr. Eklavu today is cancelled. || Final passsing of thesis title will be on 3/10/18 || Thesis defence starts on the last week of April || Dummy Announcement! || Dummy Announcement! || Dummy Announcement! || Dummy Announcement! ||-->
				</marquee>
            </div>
        </div>
        <!--  SECTION-1 --><!-- FOOTER --><!-- / FOOTER --> 
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
        <script src="js/jquery-1.11.3.min.js"></script>
        <!--<script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>-->
        <!-- Include all compiled plugins (below), or include individual files as needed --> 
        <script src="js/bootstrap.js"></script>
    </body>
</html>