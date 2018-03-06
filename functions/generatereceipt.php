<?php
	require($_SERVER["DOCUMENT_ROOT"] . '/assets/fpdf/fpdf.php');
	require_once($_SERVER["DOCUMENT_ROOT"] . "/functions/database.php");

	$studnum = $_GET['studnum'];

	$conn = getDB('cpe-studentportal');
	
	// Initialize the session
	session_start();
	//security check
	if(!isset($_SESSION['name']) || empty($_SESSION['name'])){
	  header("location: ". $_SERVER["DOCUMENT_ROOT"] . "/login.php");
	  exit;
	} else {
		if(($_SESSION['name'][0]<>'Administrator') && ($_SESSION['name'][0]<>'Limited')) {
			if($_SESSION['name'][4]<>$studnum) {
			header("location: " . $_SERVER["DOCUMENT_ROOT"] . "/logout.php");
			exit; }
		}
	}

	class PDF extends FPDF {
		function Heading(){
		
		}
		function Footer(){
			$this->SetY(-18);
			$this->SetFont('Arial','',10);
			$this->Cell(10,7, 'BY: ', 0, 0);
			$this->Cell(50,6, ' ', 'B', 1);
			$this->SetFont('Arial','B',10);
			$this->Cell(10,7, '', 0, 0);
			$this->Cell(50,7, 'TREASURER', 0, 1, 'C');
		}
	}
	//add new id
	$stmt = $conn->prepare("INSERT INTO receipt (studnum, timestamp)
	VALUES (:studnum, now())");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	//get latest id
	$stmt = $conn->prepare("SELECT controlid FROM receipt 
	WHERE studnum = :studnum ORDER BY controlid DESC LIMIT 1");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();
	$control = $stmt -> fetch();


	$pdf = new PDF('L','mm',array(180,140));
	$pdf->AddPage();
	$pdf->Image($_SERVER["DOCUMENT_ROOT"] . "/assets/images/icpeplogo.png",25,5,130,130, 'PNG');
	//HEADER
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(0,7,'INSTITUTE OF COMPUTER ENGINEERS OF THE PHILIPPINES',0,1, 'C');
	$pdf->Cell(0,7,'MMSU.STUDENT EDITION',0,1, 'C');
	$pdf->Cell(130, 7,'NO.  ',0,0, 'R');
	$pdf->Cell(20, 7,' ' . str_pad($control[0], 8, '0', STR_PAD_LEFT) , 'B', 1);
	$pdf->Cell(0,7,'OFFICIAL RECEIPT',0,1, 'C');

	$stmt = $conn->prepare("SELECT * FROM students WHERE `studnum` = :studnum");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();

	foreach(($stmt->fetchAll()) as $row) { 
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(35,7,'RECEIVED FROM: ',0,0);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(60,7,strtoupper(iconv('UTF-8', 'windows-1252', $row['surname'] ). ', '
										. iconv('UTF-8', 'windows-1252', $row['firstname']) . ' ' . iconv('UTF-8', 'windows-1252', $row['middlename'])),'B',0,'L');
			$pdf->SetFont('Arial','',11);
			$pdf->Cell(30,7,'DATE: ',0,0, 'R');
			$pdf->Cell(30,7,date('Y/m/d h:ia'),'B',1);
	}

	$pdf->Cell(0,10,'',0,1);


	///TABLE
	$pdf->SetFont('Arial','B',11);
	$pdf->Cell(50,7,'TIMESTAMP',1,0);
	$pdf->Cell(50,7,'PARTICULARS',1,0);
	$pdf->Cell(29,7,'AMOUNT',1,0, 'C');
	$pdf->Cell(29,7,'BALANCE',1,1, 'C');

	/*$stmt = $conn->prepare("SELECT transactions.datepaid, transactions.id,
	payments.id as paymentid, payments.name,
	payments.amount as charge,
	COALESCE(transactions.studnum, 0) AS studnum,
	COALESCE(transactions.amountpaid, 0) AS amountpaid
	FROM `payments`
	LEFT JOIN transactions
	ON transactions.studnum = :studnum AND transactions.paymentid = payments.id");*/
	$stmt = $conn->prepare("SELECT transactions.*, payments.amount as charge, payments.name 
	FROM transactions 
	LEFT JOIN payments 
	ON payments.id = transactions.paymentid 
	WHERE transactions.studnum = :studnum AND amountpaid <> 0");
	$stmt -> bindParam(':studnum', $studnum);
	$stmt->execute();

	$totalpayments = 0;

	foreach(($stmt->fetchAll()) as $row) { 
		$pdf->SetFont('Arial','',10);	
		$pdf->Cell(50,7,$row['datepaid'],1,0);
		$pdf->Cell(50,7,$row['name'],1,0);
		$pdf->Cell(29,7,$row['amountpaid'],1,0, 'R');
		if($row['charge']=='0') {
			$pdf->Cell(29,7, '',1,1, 'R');
		} else {
				$pdf->Cell(29,7,$row['charge'] - $row['amountpaid'],1,1, 'R');
		}
		$pdf->SetFont('Arial','B',11);
		$totalpayments = $totalpayments + (float)$row['amountpaid'];
	}
		$pdf->Cell(100,8,'TOTAL PAID',1,0, 'R');
		$pdf->SetFont('Arial','',11);
		$pdf->Cell(58,8,'PhP ' . $totalpayments,1,1, 'R');
	///!END OF TABLE

	$conn=null;
	$filepath = $studnum . '.pdf';
	$pdf->Output($filepath, 'I');
?>