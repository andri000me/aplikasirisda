<?php
include "vendor/tcpdf/tcpdf.php";
include "head.php";
include "foot.php";

date_default_timezone_set("Asia/Makassar");

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

  //Page header
  public function Header()
  {
    // Logo
    $image_file = 'dist/assets/img/' . 'logobri.png';
    $this->Image($image_file, 10, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    // Set font
    $this->SetFont('helvetica', 'B', 14);
    // Title
    $this->SetX(50);
    $this->Cell(0, 15, 'Bank BRI Unit Kuin Alalak Banjarmasin', 0, false, 'L', 0, '', 0, false, 'M', 'M');
    $this->ln(1);
    $this->SetX(50);
    $this->SetFont('helvetica', 'B', 10);
    $this->Cell(0, 15, 'Jl. Kuin Selatan No.60 Kecamatan Banjarmasin Barat, Kota Banjarmasin, Kalimantan Selatan, 70127', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $this->ln(5);
    $this->SetX(50);
    $this->SetFont('helvetica', 'B', 10);
    $this->Cell(0, 15, 'Website : https://bri.co.id/', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    $this->ln(5);
  }

  // Page footer
  public function Footer()
  {
    // Position at 15 mm from bottom
    $this->SetY(-15);
    // Set font
    $this->SetFont('helvetica', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
  }
}

// create new PDF document
$pdf = new MYPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Risda Roosyantie');
$pdf->SetTitle('Nasabah Menunggak');
$pdf->SetSubject('Nasabah Menunggak');
$pdf->SetKeywords('Nasabah Menunggak');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
$pdf->Cell(0, 0.7, '==========================================================================================', 0, 0, 'C');
$pdf->ln(10);
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 0.7, 'Laporan Data Nasabah Menunggak', 0, 0, 'C');
$pdf->ln(10);
$pdf->SetFont('dejavusans', '', 10, '', true);
$pdf->Cell(50, 10, "Print pada : " . date("d/m/Y"), 0, 0, 'C');
$pdf->ln(10);

// Set some content to print
$tbl_header = '<table style="width: 100%; font-family: arial, sans-serif; border-collapse: collapse;" border="1" cellpadding="2" cellspacing="2">
<thead>
      <tr style="text-align: center;">
          <th>NO</th>
          <th colspan="2">Nama Nasabah</th>
          <th colspan="2">Nomor HP</th>
          <th colspan="4">Alamat</th>
          <th colspan="2">Nomor Rekening</th>
          <th colspan="2">Pinjaman</th>
          <th colspan="2">Tanggal Jatuh Tempo</th>
          <th colspan="2">Jumlah Menunggak</th>
      </tr>
  </thead>
  <tbody>';
$tbl_footer = '</tbody></table>';
$tbl = '';

$con = mysqli_connect("localhost", "root", "", "aplikasirisda");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($con, "SELECT * FROM nasabahmenunggak");
$no = 0;
while ($row = mysqli_fetch_array($result)) {
  $nama = $row['nama'];
  $nohp = $row['nohp'];
  $alamat = $row['alamat'];
  $norekening = $row['norekening'];
  $pinjaman = $row['pinjaman'];
  $tgljatuhtempo = $row['tgljatuhtempo'];
  $jumlahmenunggak = $row['jumlahmenunggak'];
  $no++;

  $tbl .= '<tr style="text-align: left;">
              <td style="text-align: center;">' . $no . '</td>
              <td colspan="2">' . $row['nama'] . '</td>
              <td colspan="2">' . $row['nohp'] . '</td>
              <td colspan="4">' . substr($row['alamat'], 0, 255) . '</td>
              <td colspan="2">' . $row['norekening'] . '</td>
              <td colspan="2">Rp.' . number_format($row['pinjaman'], 0, ',', '.') . '</td>
              <td colspan="2">' . $row['tgljatuhtempo'] . '</td>
              <td colspan="2">' . $row['jumlahmenunggak'] . '</td>
          </tr>';
}

// Print text using writeHTMLCell()
$pdf->writeHTML($tbl_header . $tbl . $tbl_footer, true, false, false, false, '');

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
ob_end_clean();
$pdf->Output('nasabah-menunggak.pdf', 'I');
