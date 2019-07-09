<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Laporan Penyakit
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Laporan </li>
    <li class="active"> Laporan Penyakit </li>
    <li class="active"> Tambah Laporan Penyakit </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <!-- Kode Otomatis Penyakit -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT kode_penyakit from tb_penyakit") or die (mysqli_error());
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
     // angka 2 untuk menambahkan dua angka setelah A dan angka 0 angka yang berada di tengah
     // atau angka sebelum $kode
     $kode_otomatis = "A".str_pad($kode, 2, "0", STR_PAD_LEFT);
    } else {
     $kode_otomatis = "A01";
    }
  ?>

  <form action="#" method="POST" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
        <label for="kode_penyakit"> Kode Penyakit </label>
        <input type="text" class="form-control" id="kode_penyakit" name="kode_penyakit" onkeyup="autofill()" value="<?php echo $kode_otomatis ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nama_penyakit"> Nama Penyakit </label>
        <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" placeholder="Input Nama Penyakit" required>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=laporanpenyakit"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

    <?php
    if(isset($_POST['simpan'])) {

      $kd_penyakit  = @$_REQUEST['kode_penyakit'];
      $nm_penyakit  = @$_REQUEST['nama_penyakit'];

      $sql = $koneksi->query("INSERT INTO tb_penyakit (kode_penyakit, nama_penyakit) VALUES ('$kd_penyakit','$nm_penyakit')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=laporanpenyakit";
          </script>

        <?php
      }
    }
    ?>
</div>
