    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student Portal</title>
	
	<?php
		if(basename(getcwd())=='admin') {
			echo '<link rel="icon" href="/assets/images/icon-mmsu.png">';
		} else if (basename(getcwd())=='org') {
			echo '<link rel="icon" href="/assets/images/icon-icpep.png">';
		} else {
			echo '<link rel="icon" href="/assets/images/icon-portal.png">';
		}
	?>
	<!--<link rel="icon" href="/assets/images/icon-portal.png">-->
	
	<!-- Bootstrap Core CSS -->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/cosmo/bootstrap.min.css" integrity="sha256-GamwdmSkzX/X39UCQREOQHmmuU2ewsnrft1flUimjxA=" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/darkly/bootstrap.min.css" integrity="sha256-tfn9eK1pJ8CzrxEY/X948VPX9saxc3sNrzhyU5IX+Yg=" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/cyborg/bootstrap.min.css" integrity="sha256-OS83dfsRdMVkXGhSSJtvinOaQUUIYaFZfF2DBwdFqb0=" crossorigin="anonymous" />-->
	<!--<link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/flatly/bootstrap.min.css" integrity="sha256-r1WijW/SNMgOwk5LDk7QRHr6oVYYbYWMw/1kOXfYJfg=" crossorigin="anonymous" />-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/lumen/bootstrap.min.css" integrity="sha256-KEHAl1y5UUOWwVkhJfJqQZsTY6phoWRgm7ECedah9Lw=" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/simplex/bootstrap.min.css" integrity="sha256-TKhQCpupjJ8Jh7dgjeNgBsEPk1eai3l57eH/w4h48ys=" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/spacelab/bootstrap.min.css" integrity="sha256-EcfrF/G54HxW6buGJmPVuNLgViKrjyVncuaq11qAMUY=" crossorigin="anonymous" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/superhero/bootstrap.min.css" />-->
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/yeti/bootstrap.min.css" integrity="sha256-1XXigimvLzHb7NeEJIG76DRDmTpUtVywP6B+jvo/a7Q=" crossorigin="anonymous" />-->
	
	<!-- Custom CSS -->
    <link href="/assets/bootstrap/css/sb-admin.css" rel="stylesheet">
    
	<!-- FontAwesome -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
    
	<!-- jQuery -->
    <script src="/assets/bootstrap/js/jquery.js"></script>
	<!--MPL-->
	<script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/list.min.js"></script>
    
	<!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">
	
	<style>
		.navbar {
			border-width: 0 1px 1px 1px;
		}
		.navbar-inverse {
			background-color: #ffffff;
			border-color: #e6e6e6;
		}
		.side-nav {
			border: 1px solid #e6e6e6;
		}
		a {
			color: #4f4f4f;
			text-decoration: none;
		}
	</style>