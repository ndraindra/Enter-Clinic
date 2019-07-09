<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Data User
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data User </li>
    <li class="active"> Edit Data User </li>
  </ol>
</section>
<p></p>

<?php
  $kode = $_GET['id'];
  $sql = $koneksi->query("SELECT * from users WHERE kode_user = '$kode'");
  $tampil = $sql->fetch_assoc();

  $level = $tampil['level'];

?>

<div class="box box-primary">

  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label for="kode_user"> Kode User </label>
        <input type="text" class="form-control" id="kode_user" name="kode_user" value="<?php echo $tampil['kode_user']; ?>" required>
      </div>

      <div class="form-group">
        <label for="first_name"> Nama Depan </label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $tampil['first_name']; ?>" required>
      </div>

      <div class="form-group">
        <label for="last_name"> Nama Belakang </label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $tampil['last_name']; ?>" required>
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
        <label> Tanggal Lahir </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir']; ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label for="username"> Username </label>
        <input type="text" class="form-control" id="username" name="username" value="<?php echo $tampil['username']; ?>" required>
      </div>

      <!-- <div class="form-group">
        <label for="password"> Password Baru </label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $tampil['password']; ?>">
      </div> -->

      <div class="form-group">
        <label> Level Pemakai </label>
        <select type="text" class="form-control show-tick" name="level" id="level" required>
          <option value="admin" <?php if ($level=='admin') { echo "selected"; } ?>> Administrator </option>
          <option value="pegawai" <?php if ($level=='pegawai') { echo "selected"; } ?>> Pegawai </option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Foto </label>
          <p><img src="asset/dist/img/<?php echo $tampil['foto']; ?>" width="100" height="90" alt="">
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Ganti Foto </label>
        <input type="file" name="foto" id="exampleInputFile" class="form-control">
        <p class="help-block"> Upload Ulang Foto User </p>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datauser"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodeuser = @$_POST['kode_user'];
      $namadepan = @$_POST['first_name'];
      $namabelakang = @$_POST['last_name'];
      $jk = @$_POST['jk'];
      $alamat = @$_POST['alamat'];
      $nohp = @$_POST['no_hp'];
      $tgllahir = @$_POST['tgl_lahir'];
      $username = @$_POST['username'];
      // $password = md5(@$_REQUEST['password']);
      $level = @$_POST['level'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];

      if (!empty($koneksi)) {

        $upload = move_uploaded_file($lokasi, "asset/dist/img/user/".$foto);

        $sql2 = $koneksi->query("UPDATE users set kode_user='$kodeuser', first_name='$namadepan', last_name='$namabelakang', jk='$jk',
          alamat='$alamat', no_hp='$nohp', tgl_lahir='$tgllahir', username='$username', level='$level', foto='$foto' WHERE kode_user='$kode' ");
        // , password='$password'

        if($sql2) {
          ?>

            <script type="text/javascript">
              alert("Data berhasil DiUbah");
              window.location.href="?page=datauser";
            </script>

          <?php
        }
      }
    }
  ?>

</div>
