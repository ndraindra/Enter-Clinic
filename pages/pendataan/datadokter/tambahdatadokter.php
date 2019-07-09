<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Data Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Dokter </li>
    <li class="active"> Tambah Data Dokter </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <!-- Kode Otomatis Data Dokter -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT kodeDokter from tb_dokter") or die (mysqli_error());
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
     $kode_otomatis = "DK-".str_pad($kode, 5, "0", STR_PAD_LEFT);
    } else {
     $kode_otomatis = "DK-00001";
    }
  ?>

  <form action="#" method="POST" enctype="multipart/form-data">

    <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="kodeDokter"> Kode Dokter </label>
          <input type="text" class="form-control" id="kodeDokter" name="kodeDokter" onkeyup="autofill()" value="<?php echo $kode_otomatis ?>" readonly >
        </div>

        <div class="form-group">
          <label for="nama_dokter"> Nama Dokter </label>
          <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Input Nama Dokter" required>
        </div>

        <div class="form-group">
          <label for="spesialis"> Spesialis </label>
          <input type="text" class="form-control" id="spesialis" name="spesialis" placeholder="Input Dokter Spesialis" required>
        </div>

        <div class="form-group">
          <label> Jenis Kelamin </label>
          <select class="form-control select2" name="jk" id="jk" style="width: 100%;" required>
            <option selected="selected">--Pilih Jenis Kelamin--</option>
            <option value="Laki-Laki"> Laki-Laki </option>
            <option value="Perempuan"> Perempuan </option>
          </select>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="alamat"> Alamat </label>
          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Input Alamat Dokter" required>
        </div>

        <div class="form-group">
          <label for="no_hp"> No HP </label>
          <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Input No HP Dokter" required>
        </div>

        <div class="form-group">
          <label for="exampleInputFile"> Foto Dokter </label>
          <input type="file" name="foto" id="exampleInputFile" class="form-control">
        </div>

        <div class="form-group">
          <label> Status </label>
          <select class="form-control select2" name="status" id="status" style="width: 100%;" required>
            <option selected="selected">--Pilih Status--</option>
            <option value="Aktif"> Aktif </option>
            <option value="Non-Aktif"> Non-Aktif </option>
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

      $kodedokter  = @$_REQUEST['kodeDokter'];
      $namadokter  = @$_REQUEST['nama_dokter'];
      $spesialis  = @$_REQUEST['spesialis'];
      $jk  = @$_REQUEST['jk'];
      $alamat  = @$_REQUEST['alamat'];
      $nohp  = @$_REQUEST['no_hp'];
      $status  = @$_REQUEST['status'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];
      $upload = move_uploaded_file($lokasi, "asset/dist/img/dokter/".$foto);

      if ($upload) {

        $sql = $koneksi->query("INSERT INTO tb_dokter (kodeDokter, nama_dokter, spesialis, jk, alamat, no_hp, status, foto)
        VALUES ('$kodedokter','$namadokter','$spesialis','$jk','$alamat','$nohp','$status', '$foto')");

        if($sql) {
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
