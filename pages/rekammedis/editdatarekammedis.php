<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Rekam Medis
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home
      </a></li>
    <li class="active"> Rekam Medis </li>
    <li class="active"> Edit Rekam Medis </li>
  </ol>
</section>
<p></p>

<?php
  $norm = $_GET['id'];
  $sql = $koneksi->query("select * from rekammedik where nomorRm = '$norm'");
  $tampil = $sql->fetch_assoc();
?>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nomorRm"> No Rekam Medis </label>
        <input type="text" class="form-control" id="nomorRm" name="nomorRm" value="<?php echo $tampil['nomorRm']; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="kodepasien"> Kode Pasien </label>
        <input type="text" class="form-control" id="kodepasien" name="kodepasien" value="<?php echo $tampil['kodepasien']; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="kodedokter"> Kode Dokter </label>
        <input type="text" class="form-control" id="kodedokter" name="kodedokter" value="<?php echo $tampil['kodedokter']; ?>" readonly>
      </div>

      <div class="form-group">
        <label for="keluhan"> Keluhan </label>
        <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?php echo $tampil['keluhan']; ?>" required>
      </div>

      <div class="form-group">
        <label for="diagnosa"> Diagnosa </label>
        <input type="text" class="form-control" id="diagnosa" name="diagnosa" value="<?php echo $tampil['diagnosa']; ?>" required>
      </div>

      <div class="form-group">
        <label for="tindakan"> Tindakan </label>
        <input type="text" class="form-control" id="tindakan" name="tindakan" value="<?php echo $tampil['tindakan']; ?>" required>
      </div>

      <div class="form-group">
        <label for="spesialis"> Spesialis </label>
        <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?php echo $tampil['spesialis']; ?>" required>
      </div>

      <div class="form-group">
        <label for="id_penyakit"> Kategori Penyakit </label>
        <input type="text" class="form-control" id="id_penyakit" name="id_penyakit" value="<?php echo $tampil['id_penyakit']; ?>" required>
      </div>

      <div class="form-group">
        <label> Jam </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam" name="jam" value="<?php echo $tampil['jam']; ?>" required>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label> Tanggal Masuk </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input type="text" class="form-control datepicker" id="tgl" name="tgl" value="<?php echo $tampil['tgl']; ?>" required>
        </div>
      </div>

      <p></p>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=rekammedis"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>
