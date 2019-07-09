<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Data Obat
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Obat </li>
    <li class="active"> Tambah Data Obat </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nama_obat"> Nama Obat </label>
        <input type="text" class="form-control" id="nama_obat" name="nama_obat" placeholder="Input Nama Obat" required>
      </div>

      <div class="form-group">
        <label for="jmlh_obat"> Jumlah Obat </label>
        <input type="text" class="form-control" id="jmlh_obat" name="jmlh_obat" placeholder="Input Jumlah Obat" required>
      </div>

      <div class="form-group">
        <label for="satuan"> Satuan </label>
        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Input Satuan Obat" required>
      </div>

      <div class="form-group">
        <label for="detail"> Detail </label>
        <input type="text" class="form-control" id="detail" name="detail" placeholder="Input Detail Obat" required>
      </div>

      <div class="form-group">
        <label> Tanggal Input Data Obat </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Tanggal Input Data Obat" type="text" class="form-control datepicker" id="tanggal" name="tanggal" required>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=dataobat"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $namaobat  = @$_REQUEST['nama_obat'];
      $jumlah  = @$_REQUEST['jmlh_obat'];
      $satuan  = @$_REQUEST['satuan'];
      $detail  = @$_REQUEST['detail'];
      $tanggal  = @$_REQUEST['tanggal'];

      $sql = $koneksi->query("INSERT INTO tb_obat (nama_obat, jmlh_obat, satuan, detail, tanggal)
      VALUES ('$namaobat','$jumlah','$satuan','$detail','$tanggal')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data Obat berhasil di Simpan");
            window.location.href="?page=dataobat";
          </script>

        <?php
      }
    }
  ?>
