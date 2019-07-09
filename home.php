<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<!-- REKAM MEDIS -->
<?php
  $sql = $koneksi->query("SELECT * from rekammedik");
  while ($tampil=$sql->fetch_assoc()) {
    $jumlah_rm=$sql->num_rows;
  }
?>

<!-- DATA DOKTER -->
<?php
  $sql = $koneksi->query("SELECT * from tb_dokter");
  while ($tampil=$sql->fetch_assoc()) {
    $jumlah_dokter=$sql->num_rows;
  }
?>

<!-- DATA PASIEN -->
<?php
  $sql = $koneksi->query("SELECT * from tb_pasien");
  while ($tampil=$sql->fetch_assoc()) {
    $jumlah_pasien=$sql->num_rows;
  }
?>

<!-- DATA OBAT -->
<?php
  $sql = $koneksi->query("SELECT * from tb_obat");
  while ($tampil=$sql->fetch_assoc()) {
    $jumlah_obat=$sql->num_rows;
  }
?>

<?php
if(@$_SESSION['admin']) {
  $user_login = @$_SESSION['admin'];
} else if(@$_SESSION['pegawai']) {
  $user_login = @$_SESSION['pegawai'];
}
?>

<marquee><b> Selamat Datang Admin DI Enter Clinic</marquee>

<section class="content-header">
  <h1>
    Dashboard
    <small> Enter Clinic </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
  </ol>
</section>


<!-- Main content -->
<section class="content">
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jumlah_rm; ?></h3>

              <p> Data Rekam Medis </p>
            </div>
            <div class="icon">
              <i class="fa fa-hospital-o"></i>
            </div>
            <a href="?page=rekammedis" class="small-box-footer"> Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $jumlah_dokter; ?></h3>

              <p> Data Dokter </p>
            </div>
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <a href="?page=datadokter" class="small-box-footer"> Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $jumlah_pasien; ?></h3>

              <p> Data Pasien </p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="?page=datapasien" class="small-box-footer"> Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $jumlah_obat; ?></h3>

              <p> Data Obat </p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="?page=dataobat" class="small-box-footer"> Info Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
</div>
