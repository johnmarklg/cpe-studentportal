<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--<meta charset="utf-8">-->
    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <meta name="description" content="Welcome to the CpE Student Portal.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Timetables</title>

	
	<!--JavaScript part 1-->
	<script src="assets/pace/pace.min.js"></script>
	<script src="assets/js/list.min.js"></script>
    <!-- Page styles -->
    <link rel="stylesheet" href="assets/fonts/css/roboto.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/mdl/material.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/modal-mdl/material-modal.min.css">
	<link rel="stylesheet" href="assets/pace/pace-theme-flash.css">
	<link rel="stylesheet" href="assets/select-mdl/getmdl-select.min.css">
    <style>
		#updateTimetable {
		  position: fixed;
		  display: block;
		  right: 0;
		  bottom: 0;
		  margin-right: 40px;
		  margin-bottom: 40px;
		  z-index: 900;
		}
    </style>
  </head>