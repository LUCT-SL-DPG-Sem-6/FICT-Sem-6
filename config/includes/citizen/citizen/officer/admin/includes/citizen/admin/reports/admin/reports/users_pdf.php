<?php

require('../../fpdf/fpdf.php');
include('../../config/database.php');

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(
190,
10,
'Registered Users Report',
0,
1,
'C'
);

$pdf->Ln(5);

$pdf->Cell(10,10,'ID',1);
$pdf->Cell(50,10,'Name',1);
$pdf->Cell(60,10,'Email',1);
$pdf->Cell(30,10,'Role',1);
$pdf->Cell(40,10,'Status',1);

$pdf->Ln();

$result=mysqli_query($conn,
"SELECT * FROM users");

while($row=mysqli_fetch_assoc($result)){

$pdf->Cell(10,10,$row['id'],1);
$pdf->Cell(50,10,$row['fullname'],1);
$pdf->Cell(60,10,$row['email'],1);
$pdf->Cell(30,10,$row['role'],1);
$pdf->Cell(40,10,$row['status'],1);

$pdf->Ln();

}

$pdf->Output();

?>