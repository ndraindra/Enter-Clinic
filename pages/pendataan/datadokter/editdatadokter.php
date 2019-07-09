<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Data Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Dokter </li>
    <li class="active"> Edit Data Dokter </li>
  </ol>
</section>
<p></p>

<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("select * from tb_dokter where kodeDokter = '$kode'");
  $tampil = $sql->fetch_assoc();

  $jk = $tampil['jk'];
  $status = $tampil['status'];
?>

<div class="box box-primary">

  <form action="#" method="POST" enctype="multipart/form-data">

    <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="kodeDokter"> Kode Dokter </label>
          <input type="text" class="form-control" id="kodeDokter" name="kodeDokter" value="<?php echo $tampil['kodeDokter']; ?>" required>
        </div>

        <div class="form-group">
          <label for="nama_dokter"> Nama Dokter </label>
          <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" value="<?php echo $tampil['nama_dokter']; ?>" required>
        </div>

        <div class="form-group">
          <label for="spesialis"> Spesialis </label>
          <input type="text" class="form-control" id="spesialis" name="spesialis" value="<?php echo $tampil['spesialis']; ?>" required>
        </div>

        <div class="form-group">
          <label> Jenis Kelamin </label>
          <select class="form-control select2" name="jk" id="jk" required>
            <option selected="selected">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki" <?php if ($jk=='Laki-Laki') { echo "selected"; } ?>> Laki-Laki </option>
            <option value="Perempuan" <?php if ($jk=='Perempuan') { echo "selected"; } ?>> Perempuan </option>
          </select>
        </div>

        <div class="form-group">
          <label for="alamat"> Alamat </label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $tampil['alamat']; ?>" required>
        </div>
      </div>

      <div class="col-md-6">

        <div class="form-group">
          <label for="no_hp"> No HP </label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $tampil['no_hp']; ?>" required>
        </div>

        <div class="form-group">
          <label for="exampleInputFile"> Foto Dokter </label>
          <p><img src="asset/dist/img/dokter/<?php echo $tampil['foto']; ?>" width="107" height="107" alt="">
        </div>

        <div class="form-group">
          <label for="exampleInputFile"> Unggah Foto Baru </label>
          <input type="file" name="foto" id="exampleInputFile" class="form-control">
        </div>

        <div class="form-group">
          <label> Status </label>
          <select class="form-control select2" name="status" id="status" required>
            <option selected="selected">--Pilih Status--</option>
            <option value="Aktif" <?php if ($status=='Aktif') { echo "selected"; } ?>> Aktif </option>
            <option value="Non-Aktif" <?php if ($status=='Non-Aktif') { echo "selected"; } ?>> Non-Aktif </option>
          </select>
        </div>

        <div class="m-t-20 text-right">
          <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
          <a href="?page=datadokter"><input type="button" class="btn btn-default" value="Batal" ></a>
        </div>

      </div>

    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodedokter  = @$_POST['kodeDokter'];
      $namadokter  = @$_POST['nama_dokter'];
      $spesialis  = @$_POST['spesialis'];
      $jk  = @$_POST['jk'];
      $alamat  = @$_POST['alamat'];
      $nohp  = @$_POST['no_hp'];
      $status  = @$_POST['status'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];

      if (!empty($koneksi)) {

        $upload = move_uploaded_file($lokasi, "asset/dist/img/dokter/".$foto);

        $sql2 = $koneksi->query("UPDATE tb_dokter set kodeDokter='$kodedokter', nama_dokter='$namadokter', spesialis='$spesialis',
        jk='$jk', alamat='$alamat', no_hp='$nohp', status='$status', foto='$foto' WHERE kodeDokter='$kode' ");

        if($sql2) {
          ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=datadokter";
          </script>

          <?php
        }
      }
    }
  ?>
</div>
