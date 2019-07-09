<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Edit Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pegawai </li>
    <li class="active"> Edit Data Pegawai </li>
  </ol>
</section>
<p></p>

<?php
  $nip = $_GET['id'];
  $sql = $koneksi->query("select * from tb_pegawai where nip = '$nip'");
  $tampil = $sql->fetch_assoc();

  $unit = $tampil['unit'];

?>

<div class="box box-primary">

  <form action="#" method="POST" >
    <div class="box-body">
      <div class="form-group">
        <label for="nip"> NIP </label>
        <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $tampil['nip']; ?>" required>
      </div>

      <div class="form-group">
        <label for="nama_pegawai"> Nama Pegawai </label>
        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?php echo $tampil['nama_pegawai']; ?>" required>
      </div>

      <div class="form-group">
        <label> Jabatan Fungsional </label>
        <select type="text" class="form-control" id="unit" name="unit"  required>
          <option value="Direksi" <?php if ($unit=='Direksi') { echo "selected"; } ?>> Direksi </option>
          <option value="Administasi" <?php if ($unit=='Administasi') { echo "selected"; } ?>> Administasi </option>
          <option value="Keuangan" <?php if ($unit=='Keuangan') { echo "selected"; } ?>> Keuangan </option>
          <option value="Sekertaris" <?php if ($unit=='Sekertaris') { echo "selected"; } ?>> Sekertaris </option>
          <option value="Apoteker" <?php if ($unit=='Apoteker') { echo "selected"; } ?>> Apoteker </option>
          <option value="Satpam" <?php if ($unit=='Satpam') { echo "selected"; } ?>> Satpam </option>
        </select>
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
        <label> Tanggal Lahir </label>
        <div class="input-group date">
          <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
          </div>
            <input type="text" class="form-control datepicker" id="tgl_lhr" name="tgl_lhr" value="<?php echo $tampil['tgl_lhr']; ?>" required>
        </div>
      </div>

      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
      <a href="?page=datapegawai"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>

  <?php
    if(isset($_POST['simpan'])) {

      $nip  = @$_POST['nip'];
      $namapegawai  = @$_POST['nama_pegawai'];
      $unit  = @$_POST['unit'];
      $jk  = @$_POST['jk'];
      $alamat  = @$_POST['alamat'];
      $tgllahir  = @$_POST['tgl_lhr'];

      $sql2 = $koneksi->query("UPDATE tb_pegawai set nip='$nip', nama_pegawai='$namapegawai', unit='$unit', jk='$jk',
        alamat='$alamat', tgl_lhr='$tgllahir' WHERE nip='$nip' ");

      if($sql2) {
        ?>

          <script type="text/javascript">
            alert("Data berhasil DiUbah");
            window.location.href="?page=datapegawai";
          </script>

        <?php
      }
    }
  ?>
</div>
