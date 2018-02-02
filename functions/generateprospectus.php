<?php
require($_SERVER["DOCUMENT_ROOT"] . '/assets/fpdf/fpdf.php');
require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

$studnum = $_GET['studnum'];
	
$pdf = new FPDF('P','mm','legal');

$pdf->AddPage();

///////HEADER

		$pdf->Image($_SERVER["DOCUMENT_ROOT"] . '/assets/images/mmsulogo.png',50,10,20);
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(0,5,'Mariano Marcos State University',0,1, 'C');
		$pdf->Cell(0,5,'College of Engineering',0,1, 'C');
		$pdf->Cell(0,5,'Batac City, Ilocos Norte',0,1, 'C');
		$pdf->Image($_SERVER["DOCUMENT_ROOT"] . '/assets/images/coelogo.png',145,10,20);
		$pdf->Cell(100, 5, '', 0, 1);
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(0,5,'Bachelor of Science in Computer Engineering',0,1, 'C');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0,5,'(BSCPE-2008 Curriculum)',0,1,'C');
		$pdf->Cell(0,5,'',0,1);
		//$this->Cell(0,5,'',0,1);
		//is equivalent to:
///////HEADER/////////////



$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(18,10,'Code',0,0, 'C'); //vertically merged cell, height=2x row height=2x5=10
$pdf->Cell(55,10,'Course Title',0,0); //vertically merged cell
$pdf->Cell(13,10,'Units',0,0, 'C'); //normal height, but occupy 4 columns (horizontally merged)
$pdf->Cell(41,10,'Pre-requisites',0,0); //vertically merged cell
$pdf->Cell(30,10,'Co-requisites',0,0); //vertically merged cell
$pdf->Cell(10,10,'Year',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 




///////////////FIRST YEAR
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(200,5,'First Year', 0,1, 'C');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'1st Semester 1st Year', 0,1); 

	$conn = getDB('cpe-studentportal');
	$stmt = $conn->prepare("CREATE TEMPORARY TABLE IF NOT EXISTS temptable AS (SELECT * FROM `grades` LEFT JOIN subjects ON subjects.subjectid = grades.courseid WHERE grades.studnum = :studnum)");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	$subjcount = $stmt->rowCount();
	
	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 1 AND defaultsemester = 1");
	$stmt->execute();
	$total=0;
	$persem = 0;
	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////


	
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'2nd Semester 1st Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 1 AND defaultsemester = 2");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');

////////////////////////////////////////SECOND YEAR 
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(200,5,'Second Year', 0,1, 'C');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'1st Semester 2nd Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 2 AND defaultsemester = 1");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////


	
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'2nd Semester 2nd Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 2 AND defaultsemester = 2");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');


////////////////////////////////////////THIRD YEAR 
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(200,5,'Third Year', 0,1, 'C');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'1st Semester 3nd Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 3 AND defaultsemester = 1");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////


//////////////////////////FOOTER
$stmt = $conn->prepare("SELECT * FROM students WHERE `studnum` = :studnum");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();

	foreach(($stmt->fetchAll()) as $row) { 
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(200, 15, ' ', 0, 1);
	$pdf->Cell(100,15,strtoupper(iconv('UTF-8', 'windows-1252', $row['surname'] ). ', ' . iconv('UTF-8', 'windows-1252', $row['firstname']) . ' ' . iconv('UTF-8', 'windows-1252', $row['middlename'])),1,0, 'C');
	$pdf->Cell(40, 15,$row['studnum'], 1,0, 'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55, 5, 'CFAT Score', 1, 1);
	$pdf->Cell(140,5,'',0,0);
	$pdf->Cell(55, 5, 'Date Admitted', 1, 1);
	$pdf->SetFont('Arial','I',6);
	$pdf->Cell(100,5,'Surname, First Name, Middlename',0,0, 'C');
	$pdf->Cell(40,5,'Student No.',0,0, 'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55, 5, 'Page 1 of 2', 1, 0);
	}

/////////////////////////////

$pdf->AddPage();
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(10,10,'',0,0); //dummy shit
$pdf->Cell(18,10,'Code',0,0, 'C'); //vertically merged cell, height=2x row height=2x5=10
$pdf->Cell(55,10,'Course Title',0,0); //vertically merged cell
$pdf->Cell(13,10,'Units',0,0, 'C'); //normal height, but occupy 4 columns (horizontally merged)
$pdf->Cell(41,10,'Pre-requisites',0,0); //vertically merged cell
$pdf->Cell(30,10,'Co-requisites',0,0); //vertically merged cell
$pdf->Cell(10,10,'Year',0,1); //dummy line ending, height=5(normal row height) width=09 should be invisible 



	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'2nd Semester 3nd Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 3 AND defaultsemester = 2");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');



////////////////////////////////////////FOURTH YEAR 
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(200,5,'Fourth Year', 0,1, 'C');
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'1st Semester 4th Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 4 AND defaultsemester = 1");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////

	
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'2nd Semester 4th Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 4 AND defaultsemester = 2");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
///////////////////////////////////////////////////
	
	$pdf->SetFont('Arial','',7);
	$pdf->Cell(200,5,'Mid-year 4th Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 4 AND defaultsemester = 3");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');

////////////////////////////////////////FIFTH YEAR 

$pdf->SetFont('Arial','B',9);
$pdf->Cell(200,5,'Fifth Year', 0,1, 'C');
$pdf->SetFont('Arial','',7);
$pdf->Cell(200,5,'1st Semester 5th Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 5 AND defaultsemester = 1");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////

$pdf->SetFont('Arial','',7);
$pdf->Cell(200,5,'2nd Semester 5th Year', 0,1); 

	$stmt = $conn->prepare("SELECT * from temptable WHERE defaultyear = 5 AND defaultsemester = 2");
	$stmt->execute();
	$persem=0;

	foreach(($stmt->fetchAll()) as $row) { 
	$total = $total + (int) $row['units'];
	$persem = $persem + (int) $row['units'];
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(8,5,$row['1st'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['2nd'],'B',0, 'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(8,5,$row['3rd'],'B',0,'C');
	$pdf->Cell(2,5,'',0,0);
	$pdf->Cell(18,5,$row['coursecode'],0,0);
	$pdf->Cell(55,5,$row['coursetitle'],0,0);
	$pdf->Cell(13,5,$row['units'],0,0, 'C');
	$pdf->Cell(41,5,$row['prerequisite'],0,0);
	$pdf->Cell(30,5,$row['corequisite'],0,0);
	$pdf->Cell(10,5,$row['year'],0,1);					
	}
	$pdf->Cell(103,5,'',0,0);
	$pdf->Cell(13,5,$persem . '.0','T',1, 'C');
//////////////////////////////////////////////////////////
$pdf->Cell(100,5,'',0,1);
$pdf->Cell(22,5,'Total no. of units: ',0,0);
$pdf->Cell(13,5,$total . '.0','R', 0, 'C');
$pdf->Cell(22,5,'Total subjects: ',0,0, 'C');
$pdf->Cell(13,5,$subjcount . '.0',0,1, 'C');
$pdf->Cell(100,15,'',0,1);
$pdf->SetFont('Arial','',6);
$pdf->Cell(22,5,'powered by',0,1);
$pdf->Cell(3,10,'',0,0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(22,5,'CPE Student Portal',0,1);


/////////////////////////////////////////FOOT
	$stmt = $conn->prepare("SELECT * FROM students WHERE `studnum` = :studnum");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();

	foreach(($stmt->fetchAll()) as $row) { 
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(200, 15, ' ', 0, 1);
	$pdf->Cell(100,15,strtoupper($row['surname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']),1,0, 'C');
	$pdf->Cell(40, 15,$row['studnum'], 1,0, 'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55, 5, 'CFAT Score', 1, 1);
	$pdf->Cell(140,5,'',0,0);
	$pdf->Cell(55, 5, 'Date Admitted', 1, 1);
	$pdf->SetFont('Arial','I',6);
	$pdf->Cell(100,5,'Surname, First Name, Middlename',0,0, 'C');
	$pdf->Cell(40,5,'Student No.',0,0, 'C');
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(55, 5, 'Page 2 of 2', 1, 0);
	}
//////////////////////////////////
$conn=null;

$pdf->Output();
?>
