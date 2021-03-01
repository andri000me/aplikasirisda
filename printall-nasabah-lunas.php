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
$pdf->MultiCell(25, 0.5, 'Jl. Kuin Selatan No.60 Kecamatan Banjarmasin Barat, Kota Banjarmasin, Kalimantan Selatan, 70127', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(10, 0.5, 'Website : https://bri.co.id/', 0, 'L');
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 0.7, 'Laporan Data Nasabah Lunas', 0, 0, 'C');
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
$pdf->Cell(3, 1, 'Jangka Waktu', 1, 0, 'C');
$pdf->Cell(3, 1, 'Status', 1, 0, 'C');

$no = 1;
$query = "SELECT * FROM nasabahlunas";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
    $cellWidth=20; //lebar sel
	  $cellHeight=1; //tinggi sel satu baris normal
    //periksa apakah teksnya melibihi kolom?
	  if($pdf->GetStringWidth($result['alamat']) < $cellWidth){
		//jika tidak, maka tidak melakukan apa-apa
		$line=1;
  }else{
  //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
  //dengan memisahkan teks agar sesuai dengan lebar sel
  //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
  $textLength=strlen($result['alamat']);	//total panjang teks
  $errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
  $startChar=0;		//posisi awal karakter untuk setiap baris
  $maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
  $textArray=array();	//untuk menampung data untuk setiap baris
  $tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
  while($startChar < $textLength){ //perulangan sampai akhir teks
    //perulangan sampai karakter maksimum tercapai
    while(
    $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
    ($startChar+$maxChar) < $textLength ) {
      $maxChar++;
      $tmpString=substr($result['alamat'],$startChar,$maxChar);
    }
    //pindahkan ke baris berikutnya
    $startChar=$startChar+$maxChar;
    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
    array_push($textArray,$tmpString);
    //reset variabel penampung
    $maxChar=0;
    $tmpString='';
  }
  //dapatkan jumlah baris
  $line=count($textArray);
}
    $pdf->Cell(1,($line * $cellHeight), $no++, 1, 0,'C', true); //sesuaikan ketinggian dengan jumlah garis
    $pdf->Cell(4,($line * $cellHeight), $row['nama'], 1, 0, 'C'); //sesuaikan ketinggian dengan jumlah garis
    $pdf->Cell(3,($line * $cellHeight), $row['nama'], 1, 0, 'C');
    //memanfaatkan MultiCell sebagai ganti Cell
	  //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
    //ingat posisi x dan y sebelum menulis MultiCell
    $xPos=$pdf->GetX();
    $yPos=$pdf->GetY();
    $pdf->MultiCell($cellWidth, $cellHeight, $row['alamat'], 1, 'C');
    //kembalikan posisi untuk sel berikutnya di samping MultiCell
    //dan offset x dengan lebar MultiCell
    $pdf->SetXY($xPos + $cellWidth , $yPos);
    $pdf->Cell(4,($line * $cellHeight), $row['norekening'], 1, 0, 'C');
    $pdf->Cell(3,($line * $cellHeight), $row['pinjaman'], 1, 0, 'C');
    $pdf->Cell(3,($line * $cellHeight), $row['jangkawaktu'], 1, 0, 'C');
    $pdf->Cell(3,($line * $cellHeight), $row['status'], 1, 1, 'C');
    $pdf->ln(2);
}
$pdf->Output("laporan_nasabah_lunas.pdf", "I");
