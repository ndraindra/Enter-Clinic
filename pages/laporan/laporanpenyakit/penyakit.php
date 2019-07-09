<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Laporan Penyakit
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Laporan </li>
    <li class="active"> Laporan Penyakit </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=laporanpenyakit&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/cetak/cetakpenyakit.php" target="blank" class="btn btn-success"> Cetak Laporan </a>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> Kode Penyakit </th>
                <th> Nama Penyakit </th>
                <th> Actions </th>
              </tr>
            </thead>

            <tbody>
              <?php
              $batas = 500;
              $hal = @$_GET['hal'];
              if(empty($hal)) {
                $posisi = 0;
                $hal = 1;
              } else {
                $posisi ($hal - 1) * $batas;
              }
              $no = 1;
              if($_SERVER['REQUEST_METHOD'] == "POST") {
                $pencarian = trim(mysqli_real_escape_string($koneksi, $_POST['pencarian']));
                if($pencarian != '') {
                  $sql = "SELECT * FROM tb_penyakit WHERE nama_penyakit LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM tb_penyakit LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_penyakit";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM tb_penyakit LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_penyakit";
                $no = $posisi + 1;
              }

              $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_obat) > 0 ) {
                while($data = mysqli_fetch_array($sql_obat)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['kode_penyakit'] ?></td>
                    <td><?php echo $data['nama_penyakit'] ?></td>
                    <td class="text-center">
                      <a href="" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;
                      <a href="" onclick="return confirm('Yakin Akan Menghapus Data Obat ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                echo "<tr><td colspan=\"4\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
              }
                  ?>
            </tbody>

            <tfoot>
              <tr>
                <th> No </th>
                <th> Kode Dokter </th>
                <th> Nama Dokter </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
