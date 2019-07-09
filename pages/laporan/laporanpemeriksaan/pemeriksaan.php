<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Laporan Pemeriksaan
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Laporan </li>
    <li class="active"> Laporan Pemeriksaan </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=laporanpemeriksaan&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/cetak/cetakpemeriksaan.php" target="blank" class="btn btn-success"> Cetak Laporan </a>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> Id Pemeriksaan </th>
                <th> Nama Pasien </th>
                <th> Diagnosis </th>
                <th> Dokter Spesialis </th>
                <th> Tindakan </th>
                <th> Jam </th>
                <th> Tanggal Pemeriksaan </th>
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
                  $sql = "SELECT * FROM tb_pemeriksaan WHERE nama_pasien LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM tb_pemeriksaan LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_pemeriksaan";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM tb_pemeriksaan LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_pemeriksaan";
                $no = $posisi + 1;
              }

              $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_obat) > 0 ) {
                while($data = mysqli_fetch_array($sql_obat)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['id_pemeriksaan'] ?></td>
                    <td><?php echo $data['nama_pasien'] ?></td>
                    <td><?php echo $data['diagnosis'] ?></td>
                    <td><?php echo $data['spesialis'] ?></td>
                    <td><?php echo $data['tindakan'] ?></td>
                    <td><?php echo $data['jam'] ?></td>
                    <td><?php echo $data['tgl_pemeriksaan'] ?></td>
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
              <th> No </th>
              <th> Id Pemeriksaan </th>
              <th> Nama Pasien </th>
              <th> Diagnosis </th>
              <th> Dokter Spesialis </th>
              <th> Tindakan </th>
              <th> Jam </th>
              <th> Tanggal Pemeriksaan </th>
              <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
