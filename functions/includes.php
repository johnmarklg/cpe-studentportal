<?php
	function get_header(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/header.php");
	}
 	function calendar_extra(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/calendar_extra.php");
	}
	function announcement_extra(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/announcement_extra.php");
	}
 	function get_footer(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/footer.php");
	}
?>