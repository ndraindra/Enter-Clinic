<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<?php

  $kode2 = $_GET['id'];
  $sql = $koneksi->query("DELETE from tb_pasien WHERE kode_pasien='$kode2'");

  if($sql) {

  ?>
	<script type="text/javascript">
    	alert("Data berhasil di Hapus");
    	window.location.href="?page=datapasien";
    </script>
  <?php

 }
?>
