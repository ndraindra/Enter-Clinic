<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Data Obat
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Obat </li>
    <li class="active"> Edit Data Obat </li>
  </ol>
</section>
<p></p>

<?php
  $nama = $_GET['id'];
  $sql = $koneksi->query("SELECT * from tb_obat where nama_obat = '$nama'");
  $tampil = $sql->fetch_assoc();
?>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nama_obat"> Nama Obat </label>
        <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="<?php echo $tampil['nama_obat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="jmlh_obat"> Jumlah Obat </label>
        <input type="text" class="form-control" id="jmlh_obat" name="jmlh_obat" value="<?php echo $tampil['jmlh_obat']; ?>" required>
      </div>

      <div class="form-group">
        <label for="satuan"> Satuan </label>
        <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $tampil['satuan']; ?>" required>
      </div>

      <div class="form-group">
        <label for="detail"> Detail </label>
        <input type="text" class="form-control" id="detail" name="detail" value="<?php echo $tampil['detail']; ?>" required>
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

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datadokter"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $namaobat  = @$_POST['nama_obat'];
      $jumlah  = @$_POST['jmlh_obat'];
      $satuan  = @$_POST['satuan'];
      $detail  = @$_POST['detail'];

      $sql2 = $koneksi->query("UPDATE tb_obat set nama_obat='$namaobat', jmlh_obat='$jumlah', satuan='$satuan',
        detail='$detail' WHERE nama_obat='$nama' ");

      if($sql2) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil di Ubah");
            window.location.href="?page=dataobat";
          </script>

        <?php
      }
    }
  ?>
</div>
