<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<?php

  $kode2 = $_GET['id'];
  $sql = $koneksi->query("DELETE from jadwal_dokter WHERE kodedokter='$kode2'");

  if($sql) {

  ?>
	<script type="text/javascript">
    	alert("Data berhasil di Hapus");
    	window.location.href="?page=datadokter&aksi=jadwaldokter";
    </script>
  <?php

 }
?>
