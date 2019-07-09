<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

// Deklarasi variable untuk koneksi ke database.
$host     = "localhost";    // Server database
$username = "root";         // Username database
$password = "";             // Password database
$database = "db_rekammedis"; // Nama database

// Koneksi ke database.
$conn = new mysqli($host, $username, $password, $database);

// Deklarasi variable keyword buah.
$nama_pasien = @$_GET["query"];

// Query ke database.
$query  = $conn->query("SELECT * FROM tb_pasien WHERE nama_pasien LIKE '%$nama_pasien%' ORDER BY nama_pasien DESC");
$result = $query->fetch_all(MYSQLI_ASSOC);

// Format bentuk data untuk autocomplete.
foreach($result as $data) {
    $output['suggestions'][] = [
        'value' => $data['nama_pasien'],
        'nama_pasien'  => $data['nama_pasien']
    ];
}

if (! empty($output)) {
    // Encode ke format JSON.
    echo json_encode($output);
}
?>
