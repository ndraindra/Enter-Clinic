<?php
session_start();
error_reporting(0);

  include 'auth/koneksi.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> ENCLIN | Enter Clinic </title>
    <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="asset/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- dataTables -->
  <link rel="stylesheet" href="asset/dataTables/datatables.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="asset/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="asset/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="asset/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="asset/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="asset/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="icon" href="asset/dist/img/logo/logo.png" type="image/x-icon">

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
  <!-- Logo -->
    <a href="?page=index" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Enter</b>Clinic</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="asset/dist/img/user/indra.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> Admin </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online </a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"> MENU </li>
        <li>
          <a href="?page=index">
            <i class="fa fa-dashboard"></i> <span> Dashboard </span>
            <span class="pull-right-container">
            <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>

        <li>
          <a href="?page=rekammedis">
            <i class="fa fa-hospital-o"></i> <span> Rekam Medis </span>
            <span class="pull-right-container">
            <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i>
            <span> Kategori Pendataan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=datadokter"><i class="fa fa-circle-o"></i> Data Dokter </a></li>
            <li><a href="?page=dataobat"><i class="fa fa-circle-o"></i> Data Obat </a></li>
            <li><a href="?page=datapasien"><i class="fa fa-circle-o"></i> Data Pasien </a></li>
            <li><a href="?page=datapegawai"><i class="fa fa-circle-o"></i> Data Pegawai </a></li>
            <li><a href="?page=datauser"><i class="fa fa-circle-o"></i> Data User </a></li>
          </ul>
        </li>

        <li>
          <a href="?page=tindakan">
            <i class="fa fa-eyedropper"></i> <span> Kategori Tindakan </span>
            <span class="pull-right-container">
              <!-- <small class="label pull-right bg-green">new</small> -->
            </span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa  fa-user"></i>
            <span> Akun </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=akun"><i class="fa fa-circle-o"></i> Ubah Password </a></li>
            <li><a href="auth/logout.php"><i class="fa fa-circle-o"></i> Logout </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i>
            <span> Laporan </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=laporanpenyakit"><i class="fa fa-circle-o"></i> Laporan Penyakit </a></li>
            <li><a href="?page=laporankonsultasi"><i class="fa fa-circle-o"></i> Laporan Konsultasi Dokter </a></li>
            <li><a href="?page=laporanpemeriksaan"><i class="fa fa-circle-o"></i> Laporan Pemeriksaan </a></li>
            <li><a data-toggle="modal" href="#exampleModal"><i class="fa fa-circle-o"></i> Laporan Obat </a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Laporan Kunjungan Pasien </a></li>
          </ul>
        </li>

      </ul>
    </section>
   <!-- /.sidebar -->
  </aside>

  <!-- Modal -->
  <form method="POST" action="pages/cetak/cetakobat.php" target="_blank" >
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">CETAK LAPORAN OBAT</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Dari Tanggal</label>
          <input type="date" name="from" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
      </div>
      <div class="form-group">
          <label class="control-label">Sampai Tanggal</label>
          <input type="date" name="end" id="stayf" value="<?php echo date('Y-m-d'); ?>" class="form-control">
      </div>
      <div class="form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp;
          <button class="btn btn-primary" type="submit" name="submit" value="proses" onclick="return valid();">Print</button>
      </div>
  </div>
  </div>
  </div>
  </div>
  </form>
  <!--end modal-->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="block-header">
      <!-- fungsi pemanggilan -->
        <?php
          $page = @$_GET['page'];
          $aksi = @$_GET['aksi'];

          // Aksi HOME
          if ($page == "index") {
            if ($aksi == "") {
              include "home.php";
            }
          }

          // Aksi Rekam Medis
          if ($page == "rekammedis") {
            if ($aksi == "") {
              include "pages/rekammedis/rekammedis.php";
            }

            if ($aksi == "tambah") {
              include "pages/rekammedis/tambahdatarekammedis.php";
            }

            if ($aksi == "edit") {
              include "pages/rekammedis/editdatarekammedis.php";
            }

            if ($aksi == "hapus") {
              include "pages/rekammedis/hapusdatarekammedis.php";
            }
          }

          // Aksi Kategori Tindakan
          if ($page == "tindakan") {
            if ($aksi == "") {
              include "pages/tindakan/tindakan.php";
            }

            if ($aksi == "tambah") {
              include "pages/tindakan/tambahdatatindakan.php";
            }

            if ($aksi == "edit") {
              include "pages/tindakan/editdatatindakan.php";
            }

            if ($aksi == "hapus") {
              include "pages/tindakan/hapusdatatindakan.php";
            }

            if ($aksi == "cetaktindakan") {
              include "pages/laporan/cetaktindakan.php";
            }

          }

          // AKSI DOKTER
          if ($page == "datadokter") {
            if ($aksi == "") {
              include "pages/pendataan/datadokter/dokter.php";
            }

            if ($aksi == "tambah") {
              include "pages/pendataan/datadokter/tambahdatadokter.php";
            }

            if ($aksi == "edit") {
              include "pages/pendataan/datadokter/editdatadokter.php";
            }

            if ($aksi == "hapus") {
              include "pages/pendataan/datadokter/hapusdatadokter.php";
            }

            if ($aksi == "cetak") {
              include "pages/pendataan/datadokter/cetakdatadokter.php";
            }

            // AKSI JADWAL DOKTER
            if ($aksi == "jadwaldokter") {
              include "pages/pendataan/datadokter/jadwaldokter.php";
            }

            if ($aksi == "tambahjadwal") {
              include "pages/pendataan/datadokter/tambahjadwaldokter.php";
            }

            if ($aksi == "editjadwal") {
              include "pages/pendataan/datadokter/editjadwaldokter.php";
            }

            if ($aksi == "hapusjadwal") {
              include "pages/pendataan/datadokter/hapusjadwaldokter.php";
            }

            if ($aksi == "cetakjadwal") {
              include "pages/laporan/cetakjadwaldokter.php";
            }
          }

          // AKSI OBAT
          if ($page == "dataobat") {
            if ($aksi == "") {
              include "pages/pendataan/dataobat/obat.php";
            }

            if ($aksi == "tambah") {
              include "pages/pendataan/dataobat/tambahdataobat.php";
            }

            if ($aksi == "edit") {
              include "pages/pendataan/dataobat/editdataobat.php";
            }

            if ($aksi == "hapus") {
              include "pages/pendataan/dataobat/hapusdataobat.php";
            }
          }

          // AKSI PASIEN
          if ($page == "datapasien") {
            if ($aksi == "") {
              include "pages/pendataan/datapasien/pasien.php";
            }

            if ($aksi == "tambah") {
              include "pages/pendataan/datapasien/tambahdatapasien.php";
            }

            if ($aksi == "edit") {
              include "pages/pendataan/datapasien/editdatapasien.php";
            }

            if ($aksi == "hapus") {
              include "pages/pendataan/datapasien/hapusdatapasien.php";
            }
          }

          // AKSI PEGAWAI
          if ($page == "datapegawai") {
            if ($aksi == "") {
              include "pages/pendataan/datapegawai/pegawai.php";
            }

            if ($aksi == "tambah") {
              include "pages/pendataan/datapegawai/tambahdatapegawai.php";
            }

            if ($aksi == "edit") {
              include "pages/pendataan/datapegawai/editdatapegawai.php";
            }

            if ($aksi == "hapus") {
              include "pages/pendataan/datapegawai/hapusdatapegawai.php";
            }
          }

          // AKSI USER
          if ($page == "datauser") {
            if ($aksi == "") {
              include "pages/pendataan/datauser/user.php";
            }

            if ($aksi == "tambah") {
              include "pages/pendataan/datauser/tambahdatauser.php";
            }

            if ($aksi == "edit") {
              include "pages/pendataan/datauser/editdatauser.php";
            }

            if ($aksi == "hapus") {
              include "pages/pendataan/datauser/hapusdatauser.php";
            }
          }

          // Aksi Ganti Password
          if ($page == "akun") {
            if ($aksi == "") {
              include "pages/akun/ubahpassword.php";
            }
          }

          // AKSI LAPORAN PENYAKIT
          if ($page == "laporanpenyakit") {
            if ($aksi == "") {
              include "pages/laporan/laporanpenyakit/penyakit.php";
            }

            if ($aksi == "tambah") {
              include "pages/laporan/laporanpenyakit/tambahpenyakit.php";
            }
          }

          // AKSI LAPORAN KONSULTASI DOKTER
          if ($page == "laporankonsultasi") {
            if ($aksi == "") {
              include "pages/laporan/laporankonsultasi/konsultasi.php";
            }
            if ($aksi == "tambah") {
              include "pages/laporan/laporankonsultasi/tambahkonsultasi.php";
            }
          }

          // AKSI LAPORAN PEMERIKSAAN
          if ($page == "laporanpemeriksaan") {
            if ($aksi == "") {
              include "pages/laporan/laporanpemeriksaan/pemeriksaan.php";
            }
            if ($aksi == "tambah") {
              include "pages/laporan/laporanpemeriksaan/tambahpemeriksaan.php";
            }
          }

        ?>

      </div>
    </section>
  </div>
</div>


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!-- jQuery 3 -->
<script src="asset/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="asset/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="asset/bower_components/raphael/raphael.min.js"></script>
<script src="asset/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="asset/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- bootstrap time picker -->
<script src="asset/bower_components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<!-- Membuat Autofill pada Input Data -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!-- datepicker -->
<script src="asset/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="asset/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="asset/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="asset/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="asset/dist/js/demo.js"></script>
<!-- DataTables Jquery -->
<script src="asset/dataTables/datatables.min.js"></script>

<!-- Data Tabel -->
<script type="text/javascript">
$(document).ready( function () {
    $('#datatables').DataTable();
} );
</script>

<!-- Jquery Jam -->
<script type="text/javascript">
$(function(){
 $('.timepicker').timepicker({
       showInputs: false
    })
});
</script>

<!-- Jquery Tanggal -->
<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>

</body>
</html>
