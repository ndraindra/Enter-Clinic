<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
  Tambah Laporan Pemeriksaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Laporan </li>
    <li class="active"> Laporan Pemeriksaan </li>
    <li class="active"> Tambah Laporan Pemeriksaan </li>
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
        <label for="spesialis"> Dokter Spesialis </label>
        <select class="form-control" id="spesialis" name="spesialis" required>
          <option value=""> -- Pilih Dokter Spesialis -- </option>
          <?php
            $sql_spesialis = mysqli_query($koneksi, "SELECT * FROM tb_dokter") or die (mysqli_error($koneksi));
            while($data_spesialis = mysqli_fetch_array($sql_spesialis)) {
              echo '<option value="'.$data_spesialis['nama_dokter'].'">'.$data_spesialis['nama_dokter'].' ('.$data_spesialis['spesialis'].')</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="tindakan"> Tindakan </label>
        <select class="form-control" id="tindakan" name="tindakan" required>
          <option value=""> -- Pilih Tindakan -- </option>
          <?php
            $sql_tindakan = mysqli_query($koneksi, "SELECT * FROM tb_tindakan") or die (mysqli_error($koneksi));
            while($data_tindakan = mysqli_fetch_array($sql_tindakan)) {
              echo '<option value="'.$data_tindakan['nm_tindakan'].'">
              '.$data_tindakan['nm_tindakan'].'</option>';
            }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label> Jam Pemeriksaan </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam" name="jam" required>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label> Tanggal Pemeriksaan </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Input Tanggal Pemeriksaan" type="text" class="form-control datepicker" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=laporanpemeriksaan"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $namapasien  = @$_REQUEST['nama_pasien'];
      $diagnosis  = @$_REQUEST['diagnosis'];
      $spesialis  = @$_REQUEST['spesialis'];
      $tindakan  = @$_REQUEST['tindakan'];
      $jam  = @$_REQUEST['jam'];
      $tanggal  = @$_REQUEST['tgl_pemeriksaan'];

      $sql = $koneksi->query("INSERT INTO tb_pemeriksaan (nama_pasien, diagnosis, spesialis, tindakan, jam, tgl_pemeriksaan)
      VALUES ('$namapasien','$diagnosis','$spesialis','$tindakan','$jam','$tanggal')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=laporanpemeriksaan";
          </script>

        <?php
      }
    }
  ?>
</div>                                                      
