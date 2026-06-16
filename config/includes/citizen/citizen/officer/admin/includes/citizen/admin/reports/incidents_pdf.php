<?php

require('../../fpdf/fpdf.php');
include('../../config/database.php');

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'Disaster Alert System - Incident Report',
0,
1,
'C'
);

$pdf->Ln(5);

$pdf->SetFont('Arial','B',12);

$pdf->Cell(10,10,'ID',1);
$pdf->Cell(40,10,'Type',1);
$pdf->Cell(60,10,'Location',1);
$pdf->Cell(30,10,'Status',1);
$pdf->Cell(50,10,'Date',1);

$pdf->Ln();

$pdf->SetFont('Arial','',10);

$result=mysqli_query($conn,
"SELECT * FROM incidents");

while($row=mysqli_fetch_assoc($result)){

$pdf->Cell(10,10,$row['id'],1);
$pdf->Cell(40,10,$row['incident_type'],1);
$pdf->Cell(60,10,$row['location'],1);
$pdf->Cell(30,10,$row['status'],1);
$pdf->Cell(50,10,$row['reported_at'],1);

$pdf->Ln();

}

$pdf->Output();

?>