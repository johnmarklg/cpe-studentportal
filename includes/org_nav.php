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
                <a class="navbar-brand" href="/org/index.php"><img style="max-width:100%;max-height:100%;" src="/assets/images/cpe-portal-white.png"/></a>
            </div>
			<ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="index.php" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
					<i class="fa fa-user"></i> <?php echo $_SESSION["name"][1] . ' - ' . $_SESSION["name"][0]?> <!--<b class="caret"></b>--></a>
					<!--<div class="dropdown-backdrop"></div>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-lock"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>-->
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" id="tabs">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/org/index.php"><i class="fa fa-fw fa-money"></i> Accounting</a>
                    </li>
					<li>
                        <a href="/org/announcements.php"><i class="fa fa-fw fa-bullhorn"></i> Announcements</a>
                    </li>
					<li>
                        <a href="/org/officers.php"><i class="fa fa-fw fa-users"></i> Officers</a>
                    </li>
					<li>
                        <a href="/org/profile.php"><i class="fa fa-fw fa-certificate"></i> Organizational Profile</a>
                    </li>
					<li>
                        <a href="/org/settings.php"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
					<li>
                        <a href="/org/logout.php"><i class="fa fa-fw fa-power-off"></i> Sign Out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>