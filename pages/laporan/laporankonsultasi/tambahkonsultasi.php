<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Laporan Konsultasi Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Laporan </li>
    <li class="active"> Laporan Konsultasi Dokter </li>
    <li class="active"> Tambah Laporan Konsultasi Dokter </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">

      <div class="form-group">
        <label for="nama_pasien"> Nama Pasien </label>
        <select class="form-control" id="nama_pasien" name="nama_pasien" required>
          <option value=""> -- Pilih Nama Pasien -- </option>
          <?php
            $sql_pasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien") or die (mysqli_error($koneksi));
            while($data_pasien = mysqli_fetch_array($sql_pasien)) {
              echo '<option value="'.$data_pasien['nama_pasien'].'">
              '.$data_pasien['nama_pasien'].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="keluhan"> Keluhan </label>
        <textarea class="form-control" id="keluhan" name="keluhan" placeholder="Input Keluhan" rows="3" required></textarea>
      </div>

      <div class="form-group">
        <label for="diagnosis"> Diagnosis </label>
        <select class="form-control" id="diagnosis" name="diagnosis" required>
          <option value=""> -- Pilih Diagnosis Pasien -- </option>
          <?php
            $sql_diagnosis = mysqli_query($koneksi, "SELECT * FROM tb_penyakit") or die (mysqli_error($koneksi));
            while($data_diagnosis = mysqli_fetch_array($sql_diagnosis)) {
              echo '<option value="'.$data_diagnosis['nama_penyakit'].'">'.$data_diagnosis['kode_penyakit'].'. '.$data_diagnosis['nama_penyakit'].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label> Jam Konsultasi </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam" name="jam" required>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label> Tanggal Konsultasi </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Input Tanggal Konsultasi" type="text" class="form-control datepicker" id="tgl_konsultasi" name="tgl_konsultasi" required>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=laporankonsultasi"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $namapasien  = @$_REQUEST['nama_pasien'];
      $keluhan  = @$_REQUEST['keluhan'];
      $diagnosis  = @$_REQUEST['diagnosis'];
      $jam  = @$_REQUEST['jam'];
      $tanggal  = @$_REQUEST['tgl_konsultasi'];

      $sql = $koneksi->query("INSERT INTO tb_konsultasi (nama_pasien, keluhan, diagnosis, jam, tgl_konsultasi)
      VALUES ('$namapasien','$keluhan','$diagnosis','$jam','$tanggal')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=laporankonsultasi";
          </script>

        <?php
      }
    }
  ?>
</div>
