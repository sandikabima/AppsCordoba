<?php

$pdf = new FPDF('P', 'mm', 'A5');
$pdf->AddPage();
$pdf->SetFont('Courier', '', 25);
$pdf->Cell(128, 10, 'INVOICE', 0, 2, 'L');
$pdf->SetFont('Courier', '', 12);
$pdf->Cell(127, 5, 'Cordobastore.id', 0, 1, 'R');


$pdf->Line(12, 25, 136, 25);
// membuat space kosong antara header dengan teks konten 
$pdf->Ln(8);

$pdf->SetFont('Courier', '', 12);
$pdf->Cell(25, 5, 'No invoice', 0, 0, 'L');
$pdf->Cell(4, 5, ' :', 0, 0, 'L');
$pdf->Cell(95, 5, ' ' .$penjualan['faktur']  , 0, 1, 'L');
$pdf->Cell(25, 5, 'Tanggal', 0, 0, 'L');
$pdf->Cell(4, 5, ' :', 0, 0, 'L');
$pdf->Cell(95, 5, ' '.$penjualan['tanggal'], 0, 1, 'L');
$pdf->Cell(25, 5, 'Nama', 0, 0, 'L');
$pdf->Cell(4, 5, ' :', 0, 0, 'L');
$pdf->Cell(95, 5, ' '.$penjualan['costumer'], 0, 2, 'L');

$pdf->Ln(5);
$pdf->SetFont('Courier', 'B', 12);
$pdf->Cell(7, 6, 'No', 1, 0, 'L');
$pdf->Cell(90, 6, 'Nama Produk', 1, 0, 'L');
$pdf->Cell(30, 6, 'Harga', 1, 1, 'L');


$pdf->SetFont('Courier', '', 10);


$i = 1;
foreach ($detail_penjualan as $dp) {
        $pdf->Cell(7, 6, $i++, 1, 0, 'L');
        $pdf->Cell(90, 6, $dp->nama . ' ' . $dp->detail, 1, 0, 'L');
        $pdf->Cell(30, 6, $dp->harga, 1, 1, 'L');
}

$pdf->SetFont('Courier', 'B', 10);

$pdf->Cell(97, 6, 'Total : Rp.', 1, 0, 'R');
$pdf->Cell(30, 6, $penjualan['total'] , 1, 1, 'L');

$pdf->Ln(5);

$pdf->SetFont('Courier', 'B', 9);
$pdf->Cell(97, 6, 'NB : ', 0, 0, 'L');


$pdf->Output();
