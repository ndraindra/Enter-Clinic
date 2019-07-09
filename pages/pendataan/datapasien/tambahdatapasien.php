<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Data Pasien
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pasien </li>
    <li class="active"> Tambah Data Pasien </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <!-- Kode Otomatis Data Dokter -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT kode_pasien from tb_pasien") or die (mysqli_error());
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
     $kode_otomatis = "P-".str_pad($kode, 5, "0", STR_PAD_LEFT);
    } else {
     $kode_otomatis = "P00001";
    }
  ?>

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="kode_pasien"> Kode Pasien </label>
        <input type="text" class="form-control" id="kode_pasien" name="kode_pasien" value="<?php echo $kode_otomatis ?>" readonly >
      </div>

      <div class="form-group">
        <label for="nama_pasien"> Nama Pasien </label>
        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Input Nama Pasien" required>
      </div>

      <div class="form-group">
        <label for="jk"> Jenis Kelamin </label>
        <input type="text" class="form-control" id="jk" name="jk" placeholder="Input Jenis Kelamin Pasien" required>
      </div>

      <div class="form-group">
        <label for="alamat"> Alamat </label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat Pasien" required>
      </div>

      <div class="form-group">
        <label for="no_hp"> No HP </label>
        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Input No HP Pasien" required>
      </div>

      <div class="form-group">
        <label> Tanggal Daftar </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input placeholder="Masukan Tanggal Pasien Masuk" type="text" class="form-control datepicker" id="tgl_daf" name="tgl_daf" required>
        </div>
      </div>

      <div class="form-group">
        <label> Jam Daftar </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam_daf" name="jam_daf" required>
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

      $kodepasien  = @$_REQUEST['kode_pasien'];
      $namapasien  = @$_REQUEST['nama_pasien'];
      $jk  = @$_REQUEST['jk'];
      $alamat  = @$_REQUEST['alamat'];
      $nohp  = @$_REQUEST['no_hp'];
      $tgldaftar  = @$_REQUEST['tgl_daf'];
      $jamdaftar  = @$_REQUEST['jam_daf'];

      $sql = $koneksi->query("INSERT INTO tb_pasien (kode_pasien, nama_pasien, jk, alamat, no_hp, tgl_daf, jam_daf)
      VALUES ('$kodepasien','$namapasien','$jk','$alamat','$nohp','$tgldaftar','$jamdaftar')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=datapasien";
          </script>

        <?php
      }
    }
  ?>
