<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Data User
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data User </li>
    <li class="active"> Tambah Data User </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <!-- Kode Otomatis Data Dokter -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT kode_user from users") or die (mysqli_error());
    // menjadikannya array
    $datakode = mysqli_fetch_array($carikode);
    $jumlah_data = mysqli_num_rows($carikode);
    // jika $datakode
    if ($datakode) {
     // membuat variabel baru untuk mengambil kode barang mulai dari 1
     $nilaikode = substr($jumlah_data[0], 1);
     // menjadikan $nilaikode ( int )
     $kode = (int) $nilaikode;
     // setiap $kode di tambah 1
     $kode = $jumlah_data + 1;
     // hasil untuk menambahkan kode
     // angka 3 untuk menambahkan tiga angka setelah B dan angka 0 angka yang berada di tengah
     // atau angka sebelum $kode
     $kode_otomatis = "U-".str_pad($kode, 3, "0", STR_PAD_LEFT);
    } else {
     $kode_otomatis = "U001";
    }
  ?>

  <form action="#" method="POST" enctype="multipart/form-data" >
    <div class="box-body">
      <div class="form-group">
        <label for="kode_user"> Kode User </label>
        <input type="text" class="form-control" id="kode_user" name="kode_user" value="<?php echo $kode_otomatis ?>" readonly >
      </div>

      <div class="form-group">
        <label for="first_name"> Nama Depan </label>
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Masukan Nama Depan User" required>
      </div>

      <div class="form-group">
        <label for="last_name"> Nama Belakang </label>
        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Masukan Nama Belakang User" required>
      </div>

      <div class="form-group">
        <label for="jk"> Jenis Kelamin </label>
        <input type="text" class="form-control" id="jk" name="jk" placeholder="Masukan Jenis Kelamin User" required>
      </div>

      <div class="form-group">
        <label for="alamat"> Alamat </label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat User" required>
      </div>

      <div class="form-group">
        <label for="no_hp"> No HP </label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No HP User" required>
      </div>

      <div class="form-group">
        <label> Tanggal Lahir </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Masukan Tanggal Lahir User" type="text" class="form-control datepicker" id="tgl_lahir" name="tgl_lahir" required>
        </div>
      </div>

      <div class="form-group">
        <label for="username"> Username </label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" required>
      </div>

      <div class="form-group">
        <label for="password"> Password </label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" required>
      </div>

      <div class="form-group">
        <label> Level Pemakai </label>
        <select class="form-control show-tick" name="level" id="level" required>
          <option value="">-- Pilih Level Pemakai --</option>
          <option value="admin"> Administrator </option>
          <option value="pegawai"> Pegawai </option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Foto </label>
        <input type="file" name="foto" id="exampleInputFile" class="form-control" required>
        <p class="help-block"> Upload Foto User </p>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datauser"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodeuser = @$_REQUEST['kode_user'];
      $namadepan = @$_REQUEST['first_name'];
      $namabelakang = @$_REQUEST['last_name'];
      $jk = @$_REQUEST['jk'];
      $alamat = @$_REQUEST['alamat'];
      $nohp = @$_REQUEST['no_hp'];
      $tgllahir = @$_REQUEST['tgl_lahir'];
      $username = @$_REQUEST['username'];
      $password = md5(@$_REQUEST['password']);
      $level = @$_REQUEST['level'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];
      $upload = move_uploaded_file($lokasi, "asset/dist/img/user/".$foto);

      if ($upload) {


        $sql = $koneksi->query("INSERT INTO users (kode_user, first_name, last_name, jk, alamat,no_hp, tgl_lahir, username, password, level, foto)
        VALUES ('$kodeuser','$namadepan','$namabelakang','$jk','$alamat', $nohp, '$tgllahir','$username','$password','$level','$foto')");

        if($sql) {
          ?>

            <script type="text/javascript">
              alert("Data berhasil di Simpan");
              window.location.href="?page=datauser";
            </script>

          <?php
        }
      }
    }
  ?>
</div>
