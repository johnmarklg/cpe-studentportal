# cpe-studentportal
part of our thesis design project requirement


How-to-setup: (using XAMPP)
1. Clone or download this repository.
2. Copy the contents to htdocs folder.
3. On XAMPP, enable Apache and MySQL.
4. On browser, go and login to localhost/phpmyadmin
	4.5. If you have cpe-studentportal and cpe-studentrecords databases, please drop (i.e. delete) them first.
		You can refer to this image on how to drop databases: https://imgur.com/a/Iur9B
5. Go to Import, attach included SQL file (look at SQL folder in htdocs), then "Go".
  (if Error #1146 - Table 'phpmyadmin.pma__trackin or similar appears)
   follow the guide here: https://stackoverflow.com/questions/24055394/1146-table-phpmyadmin-pma-tracking-doesnt-exist
6. On success, you may now access the Student Portal @
  localhost -> for Students
  localhost/admin -> for Administrators
  localhost/org -> for Student Org.
7. Go to Administrator, then sign in with the ff.:

  Username: sysadmin
  
  Password: 1234

NEXT STEPS FOR UPDATING THE STUDENT DATABASE

8. Go to Student Records.

9. Input the Student Number in the search. Press enter.

  	9a) If a record is loaded (already exists), just update the records.
  
  	9b) Else, fill up all the necessary fields to create a new record.

 Thanks guys! -JM
