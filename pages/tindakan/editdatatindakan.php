<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Kategori Tindakan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Tindakan </li>
    <li class="active"> Edit Kategori Tindakan </li>
  </ol>
</section>
<p></p>

<?php
  $nama = $_GET['id'];
  $sql = $koneksi->query("select * from tb_tindakan where nm_tindakan = '$nama'");
  $tampil = $sql->fetch_assoc();
?>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nm_tindakan"> Nama Tindakan </label>
        <input type="text" class="form-control" id="nm_tindakan" name="nm_tindakan" value="<?php echo $tampil['nm_tindakan']; ?>" required>
      </div>
      <div class="form-group">
        <label for="ket"> Keterangan </label>
        <input type="text" class="form-control" id="ket" name="ket"
        value="<?php echo $tampil['ket']; ?>" required>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=tindakan"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $namatindakan  = @$_POST['nm_tindakan'];
      $keterangan  = @$_POST['ket'];

      $sql2 = $koneksi->query("UPDATE tb_tindakan set nm_tindakan='$namatindakan', ket='$keterangan' WHERE nm_tindakan='$nama' ");

      if($sql2) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil DiUbah");
            window.location.href="?page=tindakan";
          </script>

        <?php
      }
    }
  ?>
</div>
