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
	function user_nav(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/user_nav.php");
	}
	function admin_nav(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/admin_nav.php");
	}
	function org_nav(){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/includes/org_nav.php");
	}
?>