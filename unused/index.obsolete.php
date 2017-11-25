<!doctype html>
<!--
  Material Design Lite
  Copyright 2015 Google Inc. All rights reserved.

  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at

      https://www.apache.org/licenses/LICENSE-2.0

  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License
-->

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Student Portal</title>

    <!-- Page styles -->
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">-->
    <!--<link rel="stylesheet" href="assets/fonts/css/material-icon.css">-->
    <link rel="stylesheet" href="assets/fonts/css/roboto.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="assets/mdl/material.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
    #view-source {
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
          <!--<a class="mdl-navigation__link" href="">Directory</a>-->
          <!--<a class="mdl-navigation__link" href="">Sign Out</a>-->
          <div class="android-drawer-separator"></div>
          <span class="mdl-navigation__link" href="">Profile Settings</span>
          <a class="mdl-navigation__link" href="">Edit Profile</a>
          <a class="mdl-navigation__link" href="">Sign Out</a>
        </nav>
      </div>

      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-screen-section mdl-typography--text-center">
          <a name="screens"></a>
          <div class="mdl-typography--display-1-color-contrast">Transcript of Grades</div>
		  <div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th class="mdl-data-table__cell--non-numeric">Surname</th>
				  <th class="mdl-data-table__cell--non-numeric">First Name</th>
				  <th class="mdl-data-table__cell--non-numeric">Middle Name</th>
				  <th class="mdl-data-table__cell--non-numeric">Student Number</th>
				  <th class="mdl-data-table__cell--non-numeric">CFAT Score</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td class="mdl-data-table__cell--non-numeric">Leaño</td>
				  <td class="mdl-data-table__cell--non-numeric">John Mark</td>
				  <td class="mdl-data-table__cell--non-numeric">Gutierrez</td>
				  <td class="mdl-data-table__cell--non-numeric">13-5393</td>
				  <td class="mdl-data-table__cell--non-numeric">117</td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
		  <hr/>
		  <span class="mdl-typography--title-color-contrast">First Year</span>
          <div class="android-screens mdl-grid centeritems">
		  <div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<?php
					
					require('ajax/db_connection.php');
					
					$result = mysqli_query($con,"SELECT * FROM `13-5393`");

					while($row = mysqli_fetch_array($result))
					{
					echo "<tr>";
					echo "<td>" . $row['1st'] . "</td>";
					echo "<td>" . $row['2nd'] . "</td>";
					echo "<td> " . $row['3rd'] . "</td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric\">" . $row['code'] . "</td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric\">" . $row['coursetitle'] . "</td>";
					echo "<td>" . $row['units'] . "</td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric\">" . $row['prerequisite'] . "</td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric\">" . $row['corequisite'] . "</td>";
					echo "<td class=\"mdl-data-table__cell--non-numeric\">" . $row['year'] . "</td>";
					echo "</tr>";
					//if($row['courseid']==4) {
					//	echo "</tr></table><hr/><";
					//}
					}
					echo "</tbody></table>";

					mysqli_close($con);
				?>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 100</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Hardware Fundamentals</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">DRAW 11</td>
				  <td class="mdl-data-table__cell--non-numeric">Engineering Drawing I</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ENGL 2</td>
				  <td class="mdl-data-table__cell--non-numeric">Writing in the Discipline</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">ENGL 1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">FIL 2</td>
				  <td class="mdl-data-table__cell--non-numeric">Pagbasa at Pagsulat sa Iba't-ibang Disiplina</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 13</td>
				  <td class="mdl-data-table__cell--non-numeric">Advanced Algebra</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 12</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 18</td>
				  <td class="mdl-data-table__cell--non-numeric">Solid Mensuration</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 15 MATH 12</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 27</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">NSTP 2</td>
				  <td class="mdl-data-table__cell--non-numeric">National Service Training Program II</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">NSTP 1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PE 2</td>
				  <td class="mdl-data-table__cell--non-numeric">Dances</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>19</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<br/>
			<span class="mdl-typography--title-color-contrast">Second Year</span>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">COMP 11</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Fundamentals and Programming</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 13 MATH 15</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">2nd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 130</td>
				  <td class="mdl-data-table__cell--non-numeric">Discrete Math</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 12</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ECON 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Principles of Economics with Agrarian Reform</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ENGL 5</td>
				  <td class="mdl-data-table__cell--non-numeric">Scientific and Technical Writing and Report</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">ENGL 2</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 28</td>
				  <td class="mdl-data-table__cell--non-numeric">Differential Calculus</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 27 MATH 13 MATH 18</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PE 3</td>
				  <td class="mdl-data-table__cell--non-numeric">Recreational Activities</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PHY 31</td>
				  <td class="mdl-data-table__cell--non-numeric">General Physics I</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 27</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 28</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>22</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 111</td>
				  <td class="mdl-data-table__cell--non-numeric">Data Structures and Algorithm Analysis</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">COMP 11</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">2nd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29</td>
				  <td class="mdl-data-table__cell--non-numeric">Integral Calculus</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 28 MATH 18</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 60</td>
				  <td class="mdl-data-table__cell--non-numeric">Probability and Statistics for Engineers</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 12</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PE 4</td>
				  <td class="mdl-data-table__cell--non-numeric">Team Sports</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PHILO 3</td>
				  <td class="mdl-data-table__cell--non-numeric">Logic</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PHY 32</td>
				  <td class="mdl-data-table__cell--non-numeric">General Physics II</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">PHY 31</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">SOCIO 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Society and Culture with Family Planning</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>23</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<br/>
			<span class="mdl-typography--title-color-contrast">Third Year</span>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 131</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer System Organization with Assembly</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 111</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">DRAW 21</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Aided Drafting</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric">COMP 11 DRAW 11</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">3rd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 132</td>
				  <td class="mdl-data-table__cell--non-numeric">Electronic Devices and Circuits</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29 PHY 32</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">EE 101</td>
				  <td class="mdl-data-table__cell--non-numeric">Electrical Circuits</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29 PHY 32</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">IE 101</td>
				  <td class="mdl-data-table__cell--non-numeric">Engineering Economy and Accounting</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">ECON 1 MATH 12</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">3rd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 40</td>
				  <td class="mdl-data-table__cell--non-numeric">Differential Equations</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MECH 101</td>
				  <td class="mdl-data-table__cell--non-numeric">Statics of Rigid Bodies</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 29 PHY 31</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>22</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 101</td>
				  <td class="mdl-data-table__cell--non-numeric">Advanced Engineering Math for CPE</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MATH 40</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 121</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Engineering Drafting and Design</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">3rd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 132E</td>
				  <td class="mdl-data-table__cell--non-numeric">Logic Circuits and Switching Theories</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 132</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 134</td>
				  <td class="mdl-data-table__cell--non-numeric">Electronic Circuits Analysis and Design</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 132</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">EE 103</td>
				  <td class="mdl-data-table__cell--non-numeric">Electrical Circuits II</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">EE 101</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MECH 102</td>
				  <td class="mdl-data-table__cell--non-numeric">Dynamics of Rigid Bodies</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">MECH 101</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">MECH 103</td>
				  <td class="mdl-data-table__cell--non-numeric">Mechanics of Deformable Bodies</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">MECH 101</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>21</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<br/>
			<span class="mdl-typography--title-color-contrast">Fourth Year</span>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 103</td>
				  <td class="mdl-data-table__cell--non-numeric">Digital Signal Processing</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 101</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 133</td>
				  <td class="mdl-data-table__cell--non-numeric">Advanced Logic Circuits Design</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 132E</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 172</td>
				  <td class="mdl-data-table__cell--non-numeric">Control Systems for CPE</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 134 EE 103</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 140</td>
				  <td class="mdl-data-table__cell--non-numeric">Principles of Communication for CPE</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 134 EE 103</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ES 101</td>
				  <td class="mdl-data-table__cell--non-numeric">Environmental Engineering</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">CHEM 10</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">4th</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">IE 102</td>
				  <td class="mdl-data-table__cell--non-numeric">Engineering Management</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">IE 101</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">3rd</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">IE 103</td>
				  <td class="mdl-data-table__cell--non-numeric">Safety Management</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">3rd</td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>21</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 114</td>
				  <td class="mdl-data-table__cell--non-numeric">Operating Systems</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 131</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">4th</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 134</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Systems Architecture</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 131 CPE 132E</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 136</td>
				  <td class="mdl-data-table__cell--non-numeric">Microprocessor System</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 131 CPE 133</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 150</td>
				  <td class="mdl-data-table__cell--non-numeric">Data Communications for CPE</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">ECE 140</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ELECT 1</td>
				  <td class="mdl-data-table__cell--non-numeric">CpE Technical Elective 1</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PSYCH 1</td>
				  <td class="mdl-data-table__cell--non-numeric">General Psychology</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>21</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 194</td>
				  <td class="mdl-data-table__cell--non-numeric">On the Job Training (240 hours)</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 134 CPE 150</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">4th</td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<br/>
			<span class="mdl-typography--title-color-contrast">Fifth Year</span>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 112</td>
				  <td class="mdl-data-table__cell--non-numeric">Object Oriented Programming</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 111</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 113</td>
				  <td class="mdl-data-table__cell--non-numeric">Software Engineering</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 111</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 151</td>
				  <td class="mdl-data-table__cell--non-numeric">Computer Networks</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 150</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 190</td>
				  <td class="mdl-data-table__cell--non-numeric">Methods of Research</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 136</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ELECT 2</td>
				  <td class="mdl-data-table__cell--non-numeric">CpE Technical Elective 2</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">HUM 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Fundamental of the Arts</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">LIT 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Literature of the Philippines</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>21</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
			<div class="android-screens mdl-grid centeritems">
			<div class="mdl-layout-spacer"></div>
			<table class="mdl-data-table mdl-js-data-table <!--mdl-data-table--selectable--> mdl-shadow--2dp">
			  <thead>
				<tr>
				  <th>1st</th>
				  <th>2nd</th>
				  <th>3rd</th>
				  <th class="mdl-data-table__cell--non-numeric">Code</th>
				  <th class="mdl-data-table__cell--non-numeric">Course Title</th>
				  <th>Units</th>
				  <th class="mdl-data-table__cell--non-numeric">Pre-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Co-Requisites</th>
				  <th class="mdl-data-table__cell--non-numeric">Year</th>
				</tr>
			  </thead>
			  <tbody>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 145</td>
				  <td class="mdl-data-table__cell--non-numeric">System Analysis and Design</td>
				  <td>4</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 111 CPE 112</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 192</td>
				  <td class="mdl-data-table__cell--non-numeric">Engineering Ethics and Computer Laws</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">5th</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 197</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE Design Project</td>
				  <td>2</td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 190</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">CPE 199</td>
				  <td class="mdl-data-table__cell--non-numeric">Plant Visits and Seminars</td>
				  <td>1</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">5th</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ELECT 3</td>
				  <td class="mdl-data-table__cell--non-numeric">CpE Technical Elective 3</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">ENTREP 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Entrepreneurship</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric">5th</td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">PI 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Life, Works, and Writings of Rizal</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td> </td>
				  <td> </td>
				  <td> </td>
				  <td class="mdl-data-table__cell--non-numeric">POL SCI 1</td>
				  <td class="mdl-data-table__cell--non-numeric">Politics and Governance with Constitution</td>
				  <td>3</td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
				<tr>
				  <td></td>
				  <td></td>
				  <td></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td>22</td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"></td>
				  <td class="mdl-data-table__cell--non-numeric"> </td>
				</tr>
			  </tbody>
			</table>
			<div class="mdl-layout-spacer"></div>
			</div>
        </div>
    </div>
    <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/android-dot-com/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">Sign Out</a>
    <script src="assets/mdl/material.min.js"></script>
  </body>
</html>
