<?php

include "fpdf.php";
include "../../auth/koneksi.php";

$pdf = new FPDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Tampilkan gambar di dokumen PDF
$pdf->Image('logo.png', 15, 10, 15);

$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 5, 'ENCLIN', '0', '1', 'C', false);
$pdf->SetFont('Arial', 'i', 8);
$pdf->Cell(0, 5, '" Enter Clinic "', '0', '1', 'C', false);
$pdf->Cell(0, 2, 'http:enterclinic.com', '0', '1', 'C', false);
$pdf->Ln(3);
$pdf->Cell(190, 0.6, '', '0', '1', 'C', true);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(50, 5, 'Laporan Jadwal Dokter', '0', '1', 'L', false);
$pdf->Ln(3);

$pdf->Setfont('Arial', 'B', 7);
$pdf->Cell(8, 6, 'No.',1,0,'C');
$pdf->Cell(35, 6, 'Kode Dokter',1,0,'C');
$pdf->Cell(37, 6, 'Nama Dokter',1,0,'C');
$pdf->Cell(110, 6, 'Waktu',1,0,'C');
$pdf->Ln(1);

  $no = 0;
  $sql = mysqli_query($koneksi,"SELECT kodedokter,namadokter,waktu FROM jadwal_dokter");
  while($data = mysqli_fetch_array($sql)){

    $no++;
    $pdf->Ln(5);
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(8, 5, $no.".", 1, 0, 'C');
    $pdf->Cell(35, 5, $data['kodedokter'],1,0,'L');
    $pdf->Cell(37, 5, $data['namadokter'],1,0,'L');
    $pdf->Cell(110, 5, $data['waktu'],1,0,'L');

  }

// Tampilkan Nomor Halaman
  // Posisi Nomor Halaman
  $pdf->SetY(265);
  // Font
  $pdf->SetFont('Arial','I',8);
  // Nomor Halaman
  $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');

// $pdf->Ln(210);
// $pdf->SetFont('Arial', 'i', 8);
// $pdf->Cell(0, 5,'Powered by Enter Clinic.', '0', '1', 'C', false);

$pdf->Output();

?>
