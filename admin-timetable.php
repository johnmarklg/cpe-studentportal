<?php 
    require_once("functions/admin-timetable-function.php");
    get_header();
?>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="assets/images/cpe-portal-blue.png">
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Announcements</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Calendar</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="admin-grades.php">Student Records</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="admin-timetable.php">Timetables</a>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="assets/images/cpe-portal-blue.png">
          </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">Edit Info</li>
            <li class="mdl-menu__item">Sign Out</li>
          </ul>
        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="assets/images/cpe-portal-white.png">
        </span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">Post Announcements</a>
          <a class="mdl-navigation__link" href="">Set Calendar</a>
          <a class="mdl-navigation__link" href="admin-grades.php">Update Student Records</a>
          <a class="mdl-navigation__link" href="admin-timetable.php">Create Timetable</a>
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">Profile Settings</span>
          <a class="mdl-navigation__link" href="">Edit Profile</a>
          <a class="mdl-navigation__link" href="">Sign Out</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <div id="div-timetable" class="android-screen-section mdl-typography--text-center">
		<div class="android-screens mdl-grid centeritems">
				<div class="mdl-layout-spacer"></div>
					<!-- Basic Chip -->
					<span class="mdl-chip">
						<span class="mdl-chip__text">When adding/removing, save entry and refresh before filtering to incorporate updates.</span>
					</span>
					 <!-- Simple Select -->
        		<div class="mdl-layout-spacer"></div>
			</div>
		  <div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
          <!--<div class="mdl-typography--display-1-color-contrast">Transcript of Grades</div>-->
			  <?php	
					require('php/readTimetable.php');
					echo listTimetable();
				?>
			<div class="mdl-layout-spacer"></div>
        </div>
    </div>
    <form> <!--action="ajax/updateRecords.php" method="post"-->
		<button type="button" id="updateTimetable" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">save</i></button>
    </form>	
<?php
    get_footer();
?>