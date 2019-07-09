<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Data Pasien
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pasien </li>
    <li class="active"> Edit Data Pasien </li>
  </ol>
</section>
<p></p>

<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("select * from tb_pasien where kode_pasien = '$kode'");
  $tampil = $sql->fetch_assoc();
?>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="kode_pasien"> Kode Pasien </label>
        <input type="text" class="form-control" id="kode_pasien" name="kode_pasien" value="<?php echo $tampil['kode_pasien']; ?>" required>
      </div>

      <div class="form-group">
        <label for="nama_pasien"> Nama Pasien </label>
        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="<?php echo $tampil['nama_pasien']; ?>" required>
      </div>

      <div class="form-group">
        <label for="jk"> Jenis Kelamin </label>
        <input type="text" class="form-control" id="jk" name="jk" value="<?php echo $tampil['jk']; ?>" required>
      </div>

      <div class="form-group">
        <label for="alamat"> Alamat </label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $tampil['alamat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="no_hp"> No HP </label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $tampil['no_hp']; ?>" required>
      </div>

      <div class="form-group">
        <label> Tanggal Daftar </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input type="text" class="form-control datepicker" id="tgl_daf" name="tgl_daf" value="<?php echo $tampil['tgl_daf']; ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label> Jam Daftar </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam_daf" name="jam_daf" value="<?php echo $tampil['jam_daf']; ?>" required>
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </div>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datapasien"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodepasien  = @$_POST['kode_pasien'];
      $namapasien  = @$_POST['nama_pasien'];
      $jk  = @$_POST['jk'];
      $alamat  = @$_POST['alamat'];
      $nohp  = @$_POST['no_hp'];
      $tgldaftar  = @$_POST['tgl_daf'];
      $jamdaftar  = @$_POST['jam_daf'];

      $sql2 = $koneksi->query("UPDATE tb_pasien set kode_pasien='$kodepasien', nama_pasien='$namapasien', jk='$jk',
        alamat='$alamat', no_hp='$nohp', tgl_daf='$tgldaftar', jam_daf='$jamdaftar' WHERE kode_pasien='$kode' ");

      if($sql2) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil DiUbah");
            window.location.href="?page=datapasien";
          </script>

        <?php
      }
    }
  ?>
</div>
