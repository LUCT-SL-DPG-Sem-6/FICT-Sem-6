<?php

require('../../fpdf/fpdf.php');
include('../../config/database.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'Emergency Alerts Report',
0,
1,
'C'
);

$pdf->Ln();

$pdf->Cell(10,10,'ID',1);
$pdf->Cell(50,10,'Title',1);
$pdf->Cell(30,10,'Severity',1);
$pdf->Cell(50,10,'Location',1);
$pdf->Cell(50,10,'Date',1);

$pdf->Ln();

$result=mysqli_query($conn,
"SELECT * FROM alerts");

while($row=mysqli_fetch_assoc($result)){

$pdf->Cell(10,10,$row['id'],1);
$pdf->Cell(50,10,$row['title'],1);
$pdf->Cell(30,10,$row['severity'],1);
$pdf->Cell(50,10,$row['location'],1);
$pdf->Cell(50,10,$row['created_at'],1);

$pdf->Ln();

}

$pdf->Output();

?>