<?php
	// Instanciation of inherited class
	
//foreach ($hasil as $data){
 //array_push($value, $data);
 
	$pdf = new FPDF('P','mm',array(148,210));
	$pdf->AliasNbPages();
	$pdf->AddPage('L');
	//$pdf->Image(base_url().'desainfront/img/bg.jpg', 100, 100, 100, 100); 
	$pdf->SetFont('Times','',12);
    // Logo
   $pdf->Image(base_url().'desainfront/img/1.jpg',20,11,70,0,'');  //left, height
    $pdf->SetFont('Arial','',9);
      $pdf->Cell(180,09,'JL. Gubernur Suryo ','',0,'R');
      $pdf->Ln(4);
      $pdf->Cell(180,09,'no. 15 Surabaya.','',0,'R');
      $pdf->Ln(4);
      $pdf->Cell(180,09,' Kompleks Balai Pemuda (Eks. Gedung Mitra)','',0,'R');
      $pdf->Ln(6);
      $pdf->SetFont('Arial','',9);
      $pdf->Cell(180,09,'Phone: (031) 5349844 ','',0,'R');
      $pdf->Ln(4);
      $pdf->Cell(180,09,'Email: rumah.bahasa.surabaya@gmail.com','',0,'R');
      $pdf->Line(20, 32, 190, 32);
      $pdf->Ln(10);
	  
	  //
	/*  $pdf->SetFont('Arial','',09);
	  $pdf->SetLeftMargin(20);
      $pdf->Cell(140,08,'Bukti Mengikti Pelatihan','',0,'L');
      $pdf->SetFont('Arial','',10);
      $pdf->Cell(30,08, "Dicetak pada tanggal : ".date('d-m-y'),'',0,'R');

      $pdf->Line(20, 38, 190, 38);
	  $pdf->Ln(20);*/
	  
		//Info Detail pemesan
		$pdf->SetFont('Arial','B',18);
		$pdf->SetTextColor(39,115,174);
		$pdf->SetLeftMargin(65);
		$pdf->Cell(120,9,'SERTIFIKAT PELATIHAN','',0,'L');
		$pdf->Line(66, 48, 143, 48);
		$pdf->SetTextColor(64,0,0);
		$pdf->SetLeftMargin(25);
		$pdf->Ln(15);
		
		
		
		$pdf->SetFont('Arial','B',11);
		$pdf->SetLeftMargin(25);
		$pdf->SetTextColor(39,115,174);
		$pdf->Cell(200,9,'MENERANGKAN BAHWA :','',0,'L');
		$pdf->Ln(0);


		//
		$pdf->SetFont('Arial', '', 10);
		$pdf->SetLeftMargin(25);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln();
		//
		$pdf->Cell(60, 10, 'Nama Lengkap', 0, 'L');
		$pdf->Cell(5, 10, ':', 0, 'L');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(90, 10, 'SAMSUL ARIFIN', 0, 'L');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Ln();
		//
		$pdf->Cell(60, 10, 'No Registrasi Pendaftaran', 0, 'L');
		$pdf->Cell(5, 10, ':', 0, 'L');
		$pdf->Cell(90, 10, '1235454654', 0, 'L');
		$pdf->Ln(10);
		
		
		$pdf->SetFont('Arial','',10);
		$pdf->SetLeftMargin(25);
		$pdf->Cell(60,10,'Telah mengikuti Pelatihan yang diadakan Rumah Bahasa Surabaya dengan detail pelatihan sebagai berikut:','',0,'L');
		$pdf->Ln(0);
		
		
		
		//
		$pdf->SetFont('Arial', '', 10);
		$pdf->SetLeftMargin(25);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->Ln();
		//
		$pdf->Cell(60, 10, 'Nama Pelatihan', 0, 'L');
		$pdf->Cell(5, 10, ':', 0, 'L');
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(90, 10, 'BAHASA INGGRIS', 0, 'L');
		$pdf->SetFont('Arial', '', 10);
		$pdf->Ln();
		//
		$pdf->Cell(60, 10, 'Tanggal Pelatihan', 0, 'L');
		$pdf->Cell(5, 10, ':', 0, 'L');
		$pdf->Cell(90, 10, '18-juni 2014', 0, 'L');
		$pdf->Ln(10);
		
		
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(180,09,'Surabaya 19-07-2014 ','',0,'R');
		$pdf->Ln(15);
		$pdf->Cell(180,09,'IFRON HADI, S.Sos, M.Sos','',0,'R');
		$pdf->Ln(50);
		//Detail Booking
		
	//}
		 

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
}
$pdf->Output();
?>