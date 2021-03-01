<?php
include "vendor/setasign/fpdf/fpdf.php";
require "include/function.php";

date_default_timezone_set("Asia/Makassar");

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 13);
$pdf->Image('dist/assets/img/logobri.png', 1, 1, 2, 2);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Bank BRI Unit Kuin Alalak', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, '', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(25, 0.5, 'Gg. Gondang Mas Jl. Kuin Sel. No.60, Kuin Cerucuk, Kec. Banjarmasin Bar., Kota Banjarmasin, Kalimantan Selatan 70127', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(10, 0.5, 'Website : https://bri.co.id/', 0, 'L');
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 0.7, 'Laporan Data Nasabah Menunggak', 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 0.7, "Print pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->Cell(6, 0.7, "Laporan", 0, 0, 'C');
$pdf->ln(1);
$pdf->Cell(1, 1, 'No', 1, 0, 'C');
$pdf->Cell(4, 1, 'Nama Nasabah', 1, 0, 'C');
$pdf->Cell(3, 1, 'Nomor HP', 1, 0, 'C');
$pdf->Cell(3, 1, 'Alamat', 1, 0, 'C');
$pdf->Cell(4, 1, 'Nomor Rekening', 1, 0, 'C');
$pdf->Cell(3, 1, 'Pinjaman', 1, 0, 'C');
$pdf->Cell(4, 1, 'Tgl Jatuh Tempo', 1, 0, 'C');
$pdf->Cell(4, 1, 'Jumlah Menunggak', 1, 1, 'C');

$no = 1;
$query = "SELECT * FROM nasabahmenunggak";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $pdf->Cell(1, 2, $no, 1, 0, 'C');
    $pdf->Cell(4, 2, $row['nama'], 1, 0, 'C');
    $pdf->Cell(3, 2, $row['nohp'], 1, 0, 'C');
    $pdf->Cell(3, 2, $row['alamat'], 1, 0, 'C');
    $pdf->Cell(4, 2, $row['norekening'], 1, 0, 'C');
    $pdf->Cell(3, 2, $row['pinjaman'], 1, 0, 'C');
    $pdf->Cell(4, 2, $row['tgljatuhtempo'], 1, 0, 'C');
    $pdf->Cell(4, 2, $row['jumlahmenunggak'], 1, 0, 'C');
    $pdf->ln(2);
    $no++;
}
$pdf->Output("laporan_nasabah_menunggak.pdf", "I");
