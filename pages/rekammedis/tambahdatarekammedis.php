<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Tambah Rekam Medis
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home
      </a></li>
    <li class="active"> Rekam Medis </li>
    <li class="active"> Tambah Rekam Medis </li>
  </ol>
</section>
<p></p>

<div class="box box-primary">

  <!-- Kode Otomatis Rekammedis -->
  <?php
    $carikode = mysqli_query($koneksi, "SELECT max(nomorRm) from rekammedik") or die (mysqli_error());
    // menjadikannya array
    $datakode = mysqli_fetch_array($carikode);
    // jika $datakode
    if ($datakode) {
      $nilaikode = substr($datakode[0], 1);
      // menjadikan $nilaikode ( int )
      $kode = (int) $nilaikode;
    // setiap $kode di tambah 1
    $kode = $kode + 1;
    $kode_otomatis = "RM".str_pad($kode, 4, "0", STR_PAD_LEFT);
    } else {
      $kode_otomatis = "RM0001";
    }
  ?>

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nomorRm"> No Rekam Medis </label>
        <input type="text" class="form-control" id="nomorRm" name="nomorRm" value="<?php echo $kode_otomatis ?>" readonly>
      </div>

      <div class="form-group">
        <label for="namapasien"> Nama Pasien </label>
        <input type="text" class="form-control" id="namapasien" name="namapasien" placeholder="Input Kode Pasien" required>
      </div>

      <div class="form-group">
        <label for="nama_dokter"> Nama Dokter </label>
        <select name='nama_dokter' id='nama_dokter' class="form-control">
          <option value="AL">Alabama</option>
            ...
          <option value="WY">Wyoming</option>
        </select>
      </div>

      <div class="form-group">
        <label for="keluhan"> Keluhan </label>
        <input type="text" class="form-control" id="keluhan" name="keluhan" placeholder="Input Keluhan" required>
      </div>

      <div class="form-group">
        <label for="diagnosa"> Diagnosa </label>
        <input type="text" class="form-control" id="diagnosa" name="diagnosa" placeholder="Input Diagnosa" required>
      </div>

            <div class="form-group">
        <label for="tindakan"> Tindakan </label>
        <input type="text" class="form-control" id="tindakan" name="tindakan" placeholder="Input Tindakan" required>
      </div>

      <div class="form-group">
        <label for="spesialis"> Spesialis </label>
        <input type="text" class="form-control" id="spesialis" name="spesialis" placeholder="Input Dokter Spesialis" required>
      </div>

      <div class="form-group">
        <label for="id_penyakit"> Kategori Penyakit </label>
        <input type="text" class="form-control" id="id_penyakit" name="id_penyakit" placeholder="Input Kategori Penyakit" required>
      </div>

      <div class="form-group">
        <label> Jam </label>
        <div class="input-group">
          <input type="text" class="form-control timepicker" id="jam" name="jam" required>
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
            <input placeholder="Masukan Tanggal Pasien Masuk" type="text" class="form-control datepicker" id="tgl" name="tgl" required>
        </div>
      </div>

      <p></p>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=rekammedis"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $nomorRm  = @$_REQUEST['nomorRm'];
      $kdpasien  = @$_REQUEST['kode_pasien'];
      $kddokter  = @$_REQUEST['kodedokter'];
      $keluhan  = @$_REQUEST['keluhan'];
      $diagnosa  = @$_REQUEST['diagnosa'];
      $tindakan  = @$_REQUEST['tindakan'];
      $spesialis  = @$_REQUEST['spesialis'];
      $kdpenyakit  = @$_REQUEST['id_penyakit'];
      $jam  = @$_REQUEST['jam'];
      $tgl  = @$_REQUEST['tgl'];

      $sql = $koneksi->query("INSERT INTO rekammedik (nomorRm, kode_pasien, kodedokter, keluhan, diagnosa, tindakan, spesialis, id_penyakit, jam, tgl)
      VALUES ('$nomorRm','$kdpasien','$kddokter','$keluhan','$diagnosa','$tindakan','$spesialis','$kdpenyakit','$jam','$tgl')");

      if($sql) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Simpan");
            window.location.href="?page=rekammedis";
          </script>

        <?php
      }
    }
  ?>
</div>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Selector input yang akan menampilkan autocomplete.
        $( "#namapasien" ).devbridgeAutocomplete({
            serviceUrl: "pages/rekammedis/source.php",   // Kode php untuk prosesing data.
            dataType: "JSON",           // Tipe data JSON.
            onSelect: function (suggestion) {
                $( "#namapasien" ).val("" + suggestion.nama_pasien);
            }
        });
    })
</script>
