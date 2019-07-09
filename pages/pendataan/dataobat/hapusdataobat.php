<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<?php

  $nama = $_GET['id'];
  $sql = $koneksi->query("DELETE from tb_obat WHERE nama_obat='$nama'");

  if($sql) {

  ?>
	<script type="text/javascript">
    	alert("Data berhasil di Hapus");
    	window.location.href="?page=dataobat";
    </script>
  <?php

 }
?>
