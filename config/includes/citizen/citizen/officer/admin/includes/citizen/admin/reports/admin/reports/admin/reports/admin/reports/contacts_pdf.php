<?php

require('../../fpdf/fpdf.php');
include('../../config/database.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'Emergency Contacts Report',
0,
1,
'C'
);

$pdf->Ln();

$pdf->Cell(60,10,'Agency',1);
$pdf->Cell(40,10,'Phone',1);
$pdf->Cell(50,10,'Email',1);
$pdf->Cell(40,10,'Address',1);

$pdf->Ln();

$result=mysqli_query($conn,
"SELECT * FROM emergency_contacts");

while($row=mysqli_fetch_assoc($result)){

$pdf->Cell(60,10,$row['agency_name'],1);
$pdf->Cell(40,10,$row['phone'],1);
$pdf->Cell(50,10,$row['email'],1);
$pdf->Cell(40,10,$row['address'],1);

$pdf->Ln();

}

$pdf->Output();

?>