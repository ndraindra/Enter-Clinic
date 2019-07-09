<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pegawai </li>
    <li class="active"> Tambah Data Pegawai </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nip"> NIP </label>
        <input type="text" class="form-control" id="nip" name="nip" placeholder="Input NIP" required>
      </div>

      <div class="form-group">
        <label for="nama_pegawai"> Nama Pegawai </label>
        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" placeholder="Input Nama Pegawai" required>
      </div>

      <div class="form-group">
        <label> Jabatan Fungsional </label>
        <select class="form-control show-tick" name="unit" id="unit" required>
          <option value="">-- Pilih Jabatan Fungsional --</option>
          <option value="Direksi"> Direksi </option>
          <option value="Administasi"> Administasi </option>
          <option value="Keuangan"> Keuangan </option>
          <option value="Sekertaris"> Sekertaris </option>
          <option value="Apoteker"> Apoteker </option>
          <option value="Satpam"> Satpam </option>
        </select>
      </div>

      <div class="form-group">
        <label for="jk"> Jenis Kelamin </label>
        <input type="text" class="form-control" id="jk" name="jk" placeholder="Input Jenis Kelamin Pegawai" required>
      </div>

      <div class="form-group">
        <label for="alamat"> Alamat </label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat Pegawai" required>
      </div>

      <div class="form-group">
        <label> Tanggal Lahir </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Masukan Tanggal Lahir Pegawai" type="text" class="form-control datepicker" id="tgl_lhr" name="tgl_lhr" required>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datapegawai"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $nip = @$_REQUEST['nip'];
      $namapegawai = @$_REQUEST['nama_pegawai'];
      $unit = @$_REQUEST['unit'];
      $jk = @$_REQUEST['jk'];
      $alamat = @$_REQUEST['alamat'];
      $tgllahir = @$_REQUEST['tgl_lhr'];

      $sql = $koneksi->query("INSERT INTO tb_pegawai (nip, nama_pegawai, unit, jk, alamat, tgl_lhr)
      VALUES ('$nip','$namapegawai','$unit','$jk','$alamat','$tgllahir')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=datapegawai";
          </script>

        <?php
      }
    }
  ?>
</div>
