<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Kategori Tindakan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Tindakan </li>
    <li class="active"> Tambah Kategori Tindakan </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nm_tindakan"> Nama Tindakan </label>
        <input type="text" class="form-control" id="nm_tindakan" name="nm_tindakan" placeholder="Input Nama Tindakan" required>
      </div>
      <div class="form-group">
        <label for="ket"> Keterangan </label>
        <input type="text" class="form-control" id="ket" name="ket" placeholder="Input Keterangan" required>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-success">&nbsp;
      <a href="?page=tindakan"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

    <?php
    if(isset($_POST['simpan'])) {

      $namatindakan  = @$_REQUEST['nm_tindakan'];
      $keterangan  = @$_REQUEST['ket'];

      $sql = $koneksi->query("INSERT INTO tb_tindakan (nm_tindakan, ket) VALUES ('$namatindakan','$keterangan')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=tindakan";
          </script>

    <?php
      }
    }
?>
