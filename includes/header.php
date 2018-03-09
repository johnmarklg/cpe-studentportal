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
	
	<!--<link href="/assets/bootstrap/css/bootstrap-darkly.min.css" rel="stylesheet">-->
	<link href="/assets/bootstrap/css/bootstrap-darkly.min.css" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link href="/assets/bootstrap/css/sb-admin.css" rel="stylesheet">
    
	<!-- FontAwesome -->
    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
    
	<!-- jQuery -->
    <script src="/assets/js/jquery.js"></script>
	<!--MPL-->
	<script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/list.min.js"></script>
    
	<!-- Bootstrap Core JavaScript -->
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- PACE -->
	<script src="/assets/pace/pace.min.js"></script>
	<link rel="stylesheet" href="/assets/pace/pace-theme-flash.css">
	
	<!--CUSTOM STYLE-->
	<link href="/assets/css/custom.css" rel="stylesheet" type="text/css">	
    