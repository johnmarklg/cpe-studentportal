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
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1] . ' - ' . $_SESSION["name"][0]?> <b class="caret"></b></a>
					<div class="dropdown-backdrop"></div>
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
                        <a href="index.php"><i class="fa fa-fw fa-gear"></i> Bulletin Settings</a>
                    </li>
					        <?php
							if($_SESSION['name'][0]=='Administrator (Elevated)') {
								echo '<li><a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-terminal"></i> Elevated Admin <i class="fa fa-fw fa-caret-down"></i></a><ul id="demo2" class="collapse">';
									echo '<li>
										<a href="administrators.php"><i class="fa fa-fw fa-group"></i> Administrators</a>
									</li>';
									echo '<li>
										<a href="curriculum.php"><i class="fa fa-fw fa-list"></i> Curriculums</a>
									</li></ul></li>';
							}
							?>   
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo5"><i class="fa fa-fw fa-bullhorn"></i> Events and Announcements <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo5" class="collapse">
                            <li>
								<a href="announcements.php"><i class="fa fa-fw fa-bullhorn"></i> Announcements</a>
							</li>
							<li>
								<a href="calendar.php"><i class="fa fa-fw fa-calendar"></i> Academic Calendar</a>
							</li>							
                        </ul>
                    </li>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-fw fa-graduation-cap"></i> Students <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
								<a href="profilereq.php"><i class="fa fa-fw fa-edit"></i> Profile Requests</a>
							</li>
							<li>
								<a href="students.php"><i class="fa fa-fw fa-graduation-cap"></i> Student List</a>
							</li>
							<li>
								<a href="records.php"><i class="fa fa-fw fa-table"></i> Student Records</a>
							</li>
							<li>
								<a href="timetables.php"><i class="fa fa-fw fa-book"></i> Subject Scheduler</a>
							</li>
                        </ul>
                    </li>
                    <?php
							if($_SESSION['name'][0]=='Administrator (Elevated)') {
								echo '<li>
										<a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-clock-o"></i> Activity Log <i class="fa fa-fw fa-caret-down"></i></a>
										<ul id="demo3" class="collapse">
											<li>
												<a href="activity.php"><i class="fa fa-fw fa-graduation-cap"></i> Students</a>
											</li>
											<li>
												<a href="activity-admin.php"><i class="fa fa-fw fa-users"></i> Administrators</a>
											</li>
										</ul>
									</li>';
							} else {
								echo '<li><a href="activity.php"><i class="fa fa-fw fa-clock-o"></i> Activity Log</a></li>';
							}
					?>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-info"></i> Info Text <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
								<a href="geninfo.php"><i class="fa fa-fw fa-university"></i> General Information</a>
							</li>
							<li>
								<a href="about.php"><i class="fa fa-fw fa-info-circle"></i> About Portal</a>
							</li>
							<li>
								<a href="hymnmarch.php"><i class="fa fa-fw fa-music"></i> Hymn and March</a>
							</li>
                        </ul>
                    </li>
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