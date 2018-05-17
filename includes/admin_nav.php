<?php
?>
<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img style="max-width:100%;max-height:100%;" src="/assets/images/cpe-portal-white.png"/></a>
            </div>
			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1]?> <b class="caret"></b></a>
					<!--<div class="dropdown-backdrop"></div>-->
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="tabs">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo6"><i class="fa fa-fw fa-gear"></i> Bulletin Settings <i class="fa fa-fw fa-caret-down"></i></a>
						<?php
						if((basename($_SERVER['SCRIPT_NAME'])=='showhide.php')||(basename($_SERVER['SCRIPT_NAME'])=='gallery.php')||(basename($_SERVER['SCRIPT_NAME'])=='power.php')||(basename($_SERVER['SCRIPT_NAME'])=='videos.php')||(basename($_SERVER['SCRIPT_NAME'])=='officers.php')) {
							echo '<ul id="demo6" class="collapse in">';
						} else {
							echo '<ul id="demo6" class="collapse">';
						}
						?>
                            <!--<li>
								<a href="showhide.php"><i class="fa fa-fw fa-eye"></i> Display Announcements</a>
							</li>-->
							<li>
								<a href="gallery.php"><i class="fa fa-fw fa-photo"></i> Gallery</a>
							</li>
							<li>
								<a href="videos.php"><i class="fa fa-fw fa-film"></i> Videos</a>
							</li>
							<li>
								<a href="officers.php"><i class="fa fa-fw fa-users"></i> Officers</a>
							</li>		
							<li>
								<a href="/admin/power.php"><i class="fa fa-fw fa-power-off"></i> Pi Control</a>
							</li>
                        </ul>
                    </li>   
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-bullhorn"></i> Events and Announcements <i class="fa fa-fw fa-caret-down"></i></a>
                        <?php
						if((basename($_SERVER['SCRIPT_NAME'])=='announcements.php')||(basename($_SERVER['SCRIPT_NAME'])=='calendar.php')) {
							echo '<ul id="demo5" class="collapse in">';
						} else {
							echo '<ul id="demo5" class="collapse">';
						}
						?>
                            <li class="active">
								<a href="announcements.php"><i class="fa fa-fw fa-bullhorn"></i> Announcements</a>
							</li>
							<li>
								<a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> Academic Calendar</a>
							</li>							
                        </ul>
                    </li>
					<?php
					if($_SESSION['name'][0]=='Administrator (Elevated)') {
						echo '<li><a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-terminal"></i> Elevated Admin <i class="fa fa-fw fa-caret-down"></i></a>';
						if((basename($_SERVER['SCRIPT_NAME'])=='administrators.php')||(basename($_SERVER['SCRIPT_NAME'])=='activity-admin.php')||(basename($_SERVER['SCRIPT_NAME'])=='curriculum.php')) {
							echo '<ul id="demo2" class="collapse in">';
						} else {
							echo '<ul id="demo2" class="collapse">';
						}
							echo '<li>
								<a href="administrators.php"><i class="fa fa-fw fa-group"></i> Administrators</a>
							</li>';
							echo '<li>
								<a href="curriculum.php"><i class="fa fa-fw fa-list"></i> Curricula</a>
							</li></ul></li>';
					}
					?>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-graduation-cap"></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
                        <?php
						if((basename($_SERVER['SCRIPT_NAME'])=='profilereq.php')||(basename($_SERVER['SCRIPT_NAME'])=='students.php')||(basename($_SERVER['SCRIPT_NAME'])=='activity.php')||(basename($_SERVER['SCRIPT_NAME'])=='records.php')||(basename($_SERVER['SCRIPT_NAME'])=='handouts.php')||(basename($_SERVER['SCRIPT_NAME'])=='timetables.php')) {
							echo '<ul id="demo4" class="collapse in">';
						} else {
							echo '<ul id="demo4" class="collapse">';
						}
						?>
                            <li>
								<a href="profilereq.php"><i class="fa fa-fw fa-edit"></i> Profile Requests</a>
							</li>
							<li>
								<a href="students.php"><i class="fa fa-fw fa-graduation-cap"></i> Student Records</a>
							</li>
							<li>
								<a href="handouts.php"><i class="fa fa-fw fa-file"></i> Handouts</a>
							</li>
							<li>
								<a href="timetables.php"><i class="fa fa-fw fa-book"></i> Class Scheduler</a>
							</li>
                        </ul>
                    </li>
                    <?php
							/*if($_SESSION['name'][0]=='Administrator (Elevated)') {
								echo '<li>
										<a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-clock-o"></i> Activity Log <i class="fa fa-fw fa-caret-down"></i></a>';
										if((basename($_SERVER['SCRIPT_NAME'])=='activity-admin.php')||(basename($_SERVER['SCRIPT_NAME'])=='activity.php')) {
											echo '<ul id="demo3" class="collapse in">';
										} else {
											echo '<ul id="demo3" class="collapse">';
										}
											echo '<li>
												<a href="activity.php"><i class="fa fa-fw fa-graduation-cap"></i> Students</a>
											</li>
											<li>
												<a href="activity-admin.php"><i class="fa fa-fw fa-users"></i> Administrators</a>
											</li>
										</ul>
									</li>';
							} else {
								echo '<li><a href="activity.php"><i class="fa fa-fw fa-clock-o"></i> Activity Log</a></li>';
							}*/
					?>
					<?php
						if($_SESSION['name'][0]=='Administrator (Elevated)') {
						echo '<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-info"></i> Info Text <i class="fa fa-fw fa-caret-down"></i></a>';
                        if((basename($_SERVER['SCRIPT_NAME'])=='geninfo.php')||(basename($_SERVER['SCRIPT_NAME'])=='about.php')||(basename($_SERVER['SCRIPT_NAME'])=='hymnmarch.php')) {
							echo '<ul id="demo" class="collapse in">';
						} else {
							echo '<ul id="demo" class="collapse">';
						}
                            echo '<li>
								<a href="geninfo.php"><i class="fa fa-fw fa-university"></i> General Information</a>
							</li>
							<li>
								<a href="about.php"><i class="fa fa-fw fa-info-circle"></i> About Portal</a>
							</li>
							<li>
								<a href="hymnmarch.php"><i class="fa fa-fw fa-music"></i> Hymn and March</a>
							</li>
                        </ul>
                    </li>';
						}
					?>
					<!--<li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                    </li>
					<li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>