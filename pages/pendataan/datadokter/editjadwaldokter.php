<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Jadwal Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Dokter </li>
    <li class="active"> Jadwal Dokter </li>
    <li class="active"> Edit Jadwal Dokter </li>
  </ol>
</section>
<p></p>

<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("SELECT * from jadwal_dokter WHERE kodedokter = '$kode'");
  $tampil = $sql->fetch_assoc();

?>

<div class="box box-success">

  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="box-body">

      <div class="form-group">
        <label for="kodedokter"> Kode Dokter </label>
        <input type="text" class="form-control" id="kodedokter" name="kodedokter" value="<?php echo $tampil['kodedokter']; ?>" required>
      </div>

      <div class="form-group">
        <label for="namadokter"> Nama Dokter </label>
        <input type="text" class="form-control" id="namadokter" name="namadokter" value="<?php echo $tampil['namadokter']; ?>" required>
      </div>

      <div class="form-group">
        <label for="waktu"> Waktu </label>
        <textarea rows="4" class="form-control" id="waktu" name="waktu"><?php echo $tampil['waktu']; ?></textarea required>
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Foto Dokter </label>
        <p><img src="asset/dist/img/dokter/<?php echo $tampil['foto']; ?>" width="100" height="90" alt="">
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Ganti Foto Dokter </label>
        <input type="file" name="foto" id="exampleInputFile" class="form-control">
        <p class="help-block"> Upload Foto Dokter </p>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
      <a href="?page=datadokter&aksi=jadwaldokter"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodedokter = @$_POST['kodedokter'];
      $namadokter = @$_POST['namadokter'];
      $waktu = @$_POST['waktu'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];

      if (!empty($koneksi)) {

        $upload = move_uploaded_file($lokasi, "asset/dist/img/dokter/".$foto);

        $sql2 = $koneksi->query("UPDATE jadwal_dokter set kodedokter='$kodedokter', namadokter='$namadokter', waktu='$waktu', foto='$foto' WHERE kodedokter='$kode' ");
        // , password='$password'

        if($sql2) {
          ?>

            <script type="text/javascript">
              alert("Data berhasil DiUbah");
              window.location.href="?page=datadokter&aksi=jadwaldokter";
            </script>

          <?php
        }
      }
    }
  ?>

</div>
