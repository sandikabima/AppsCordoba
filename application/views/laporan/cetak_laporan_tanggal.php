<?php

$host = 'localhost';
$user = 'root';
$password = "";
$database = "cordoba";

$koneksi = mysqli_connect($host, $user, $password, $database);

$awal_array = explode("-", $result['start_date']);
$akhir_array = explode("-", $result['end_date']);

$awal = $awal_array[2] . "-" . $awal_array[1] . "-" . $awal_array[0];
$akhir = $akhir_array[2] .  "-" . $akhir_array[1] . "-" . $akhir_array[0];


$sqlQuery = "SELECT penjualan.tanggal, penjualan.costumer, detail_penjualan.* FROM penjualan INNER JOIN detail_penjualan ON penjualan.faktur = detail_penjualan.faktur where penjualan.tanggal BETWEEN '$awal' and '$akhir'";


$db = mysqli_query($koneksi, $sqlQuery);

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Courier', '', 25);
$pdf->Cell(128, 10, 'LAPORAN PER-TANGGAL', 0, 2, 'L');
$pdf->SetFont('Courier', '', 12);
$pdf->Cell(189, 5, 'Cordobastore.id', 0, 1, 'R');


$pdf->Line(12, 25, 198, 25);
// membuat space kosong antara header dengan teks konten 
$pdf->Ln(5);


$pdf->Cell(190, 10, $result['start_date'] . ' || ' . $result['end_date'], 0, 2, 'C');

$pdf->Ln(5);

$pdf->SetFont('Courier', 'B', 12);
$pdf->Cell(8, 8, 'No', 1, 0, 'L');
$pdf->Cell(25, 8, 'Tanggal', 1, 0, 'L');
$pdf->Cell(25, 8, 'Faktur', 1, 0, 'L');
$pdf->Cell(30, 8, 'Costumer', 1, 0, 'L');
$pdf->Cell(72, 8, 'Detail Produk', 1, 0, 'L');
$pdf->Cell(10, 8, 'Qty', 1, 0, 'L');
$pdf->Cell(25, 8, 'Jumlah', 1, 1, 'L');


$pdf->SetFont('Courier', '', 10);

$i = 1;
$total = 0;
foreach ($db as $d) {
    $pdf->Cell(8, 8, $i++, 1, 0, 'L');
    $pdf->Cell(25, 8, $d['tanggal'], 1, 0, 'L');
    $pdf->Cell(25, 8,  $d['faktur'], 1, 0, 'L');
    $pdf->Cell(30, 8,  $d['costumer'], 1, 0, 'L');
    $pdf->Cell(72, 8,  $d['nama'] . '' . $d['detail'], 1, 0, 'L');
    $pdf->Cell(10, 8,  $d['qty'], 1, 0, 'C');
    $pdf->Cell(25, 8, 'Rp.' . $d['harga'], 1, 1, 'L');

    $total += $d['harga'];
}

$pdf->Cell(170, 8, 'Total :', 1, 0, 'R');
$pdf->Cell(25, 8, 'Rp.' .$total, 1, 1, 'L');

$pdf->Output();
