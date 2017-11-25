<?php 
    require_once("functions/function.php");
    get_header();
?>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

      <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="images/cpe-portal-blue.png">
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Announcements</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Calendar</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Grades</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Timetable</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Ask Instructors</a>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="images/cpe-portal-blue.png">
          </span>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">Personal Information</li>
            <li class="mdl-menu__item">Sign Out</li>
          </ul>
        </div>
      </div>

      <div class="android-drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="android-logo-image" src="images/cpe-portal-white.png">
        </span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="">Announcements</a>
          <a class="mdl-navigation__link" href="">Calendar</a>
          <a class="mdl-navigation__link" href="">Grades</a>
          <a class="mdl-navigation__link" href="">Timetable</a>
          <a class="mdl-navigation__link" href="">Ask Instructors</a>
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">Profile Settings</span>
          <a class="mdl-navigation__link" href="">Edit Profile</a>
          <a class="mdl-navigation__link" href="">Sign Out</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-screen-section mdl-typography--text-center">
          <!--<a name="screens"></a>-->
		  <div class="android-screens mdl-grid centeritems">
				<div class="mdl-layout-spacer"></div>
					<form method="post">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
							<input class="mdl-textfield__input" type="text" id="stud-num" name="stud-num">
							<label class="mdl-textfield__label" for="stud-num">Student Number</label>
						</div>
							<button name="search-table" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
								Search
							</button>
					</form>
			<div class="mdl-layout-spacer"></div>
			</div>	
          <!--<div class="mdl-typography--display-1-color-contrast">Transcript of Grades</div>-->
			  <?php	
					require('ajax/readRecords.php');
					echo listGrades();
				?>
			<div class="mdl-layout-spacer"></div>
        </div>
    </div>
    <form <!--action="ajax/updateRecords.php" method="post"-->>
		<button type="button" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Update Changes</button>
    </form>	
<?php
    get_footer();
?>