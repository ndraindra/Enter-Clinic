<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Jadwal Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Dokter </li>
    <li class="active"> Jadwal Dokter </li>
    <li class="active"> Tambah Jadwal Dokter </li>
  </ol>
</section>
<p></p>

<div class="box box-success">

  <!-- Kode Otomatis Data Dokter -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT kodedokter from jadwal_dokter") or die (mysqli_error());
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
        <label for="kodeDokter"> Kode Dokter </label>
        <input type="text" class="form-control" id="kodeDokter" name="kodeDokter" placeholder="Input Kode Dokter" onkeyup="autofill()" required>
      </div>

      <div class="form-group">
        <label for="nama_dokter"> Nama Dokter </label>
        <input type="text" class="form-control" id="nama_dokter" name="nama_dokter" placeholder="Input Nama Dokter" required>
      </div>

      <div class="form-group">
        <label for="waktu"> Waktu </label>
        <textarea class="form-control" id="waktu" name="waktu" placeholder="Input Jadwal Dokter"></textarea required>
      </div>

      <div class="form-group">
        <label for="exampleInputFile"> Foto Dokter </label>
        <input type="file" name="foto" id="exampleInputFile" class="form-control">
        <p class="help-block"> Upload Foto Dokter </p>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
      <a href="?page=datadokter&aksi=jadwaldokter"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $kodedokter = @$_REQUEST['kodedokter'];
      $namadokter = @$_REQUEST['namadokter'];
      $waktu = @$_REQUEST['waktu'];

      $foto = @$_FILES['foto']['name'];
      $lokasi = @$_FILES['foto']['tmp_name'];
      $upload = move_uploaded_file($lokasi, "asset/dist/img/dokter/".$foto);

      if ($upload) {

        $sql = $koneksi->query("INSERT INTO jadwal_dokter (kodedokter, namadokter, waktu, foto) VALUES ('$kodedokter','$namadokter','$waktu','$foto')");

        if($sql) {
          ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=datadokter&aksi=jadwaldokter";
          </script>

          <?php
        }
      }
    }
  ?>
</div>

<script type="text/javascript">
  function autofill() {
    var kodedokter = $("#kodedokter").val();
    $.ajax({
      url : 'pages/pendataan/datadokter/autofill-ajax.php',
      data : 'kodedokter='+kodedokter,
    success : function(data){
      var json = data,
      obj = JSON.parse(json);
      $("#namadokter").val(obj.nama_dokter);
    }
    });
  }
</script>
