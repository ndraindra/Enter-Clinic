<?php
session_start();
error_reporting(0);

include "fpdf.php";
include "../../auth/koneksi.php";

date_default_timezone_set('Asia/Jakarta');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Tampilkan gambar di dokumen PDF
$pdf->Image('logo.png', 15, 10, 15);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'ENCLIN', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, '" Enter Clinic "', '0', '1', 'C', false);
$pdf->Cell(0, 2, 'http://enclin.epizy.com', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(190, 0.1, '', '0', '1', 'C', true);
$pdf->Ln(0.5);
$pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, 'Laporan Obat', '0', '1', 'L', false);
$pdf->Cell(50, 5, 'Printed On : '.date("d/m/Y"), '0', '1', 'L', false);
$pdf->Ln(3);

// Set Tabel
$pdf->Setfont('Arial', 'B', 7);
$pdf->Cell(15, 6, 'No.',1,0,'C');
$pdf->Cell(25, 6, 'Id Obat',1,0,'C');
$pdf->Cell(70, 6, 'Nama Obat',1,0,'C');
$pdf->Cell(40, 6, 'Jumlah Obat',1,0,'C');
$pdf->Cell(40, 6, 'Tanggal',1,0,'C');
$pdf->Ln(1);

  $no = 0;
  $from=$_POST['from'];
  $end=$_POST['end'];
  $sql = mysqli_query($koneksi,"SELECT * FROM tb_obat WHERE (tanggal BETWEEN '$from' AND '$end')");
  while($data = mysqli_fetch_array($sql)){

    $no++;
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(15, 5, $no.".", 1, 0, 'C');
    $pdf->Cell(25, 5, $data['id_obat'], 1, 0, 'C');
    $pdf->Cell(70, 5, $data['nama_obat'], 1, 0, 'C');
    $pdf->Cell(40, 5, $data['jmlh_obat'], 1, 0, 'C');
    $pdf->Cell(40, 5, $data['tanggal'], 1, 0, 'C');

  }

// Tampilkan Nomor Halaman
  // Posisi Nomor Halaman
  $pdf->SetY(265);
  // Font
  $pdf->SetFont('Arial','I',8);
  // Nomor Halaman
  $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');

  $pdf->Output("Laporan Obat.pdf","I");

?>
