<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Jadwal Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li><a href="?page=datadokter"><i class="active"></i> Data Dokter </li></a>
    <li class="active"> Jadwal Dokter </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=datadokter&aksi=tambahjadwal" class="btn btn-success"> Tambah Jadwal </a>&nbsp;
          <a href="pages/laporan/cetakjadwaldokter.php" target="blank" class="btn btn-success"> Cetak PDF </a> &nbsp;
          <a href="?page=datadokter" class="btn btn-primary"> Data Dokter </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> Kode Dokter </th>
                <th> Nama Dokter </th>
                <th> Waktu </th>
                <th> Foto Dokter </th>
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
                  $sql = "SELECT * FROM jadwal_dokter WHERE namadokter LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM jadwal_dokter LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM jadwal_dokter";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM jadwal_dokter LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM jadwal_dokter";
                $no = $posisi + 1;
              }

              $sql_jadwal = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_jadwal) > 0 ) {
                while($data = mysqli_fetch_array($sql_jadwal)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['kodedokter'] ?></td>
                    <td><?php echo $data['namadokter'] ?></td>
                    <td><?php echo $data['waktu'] ?></td>
                    <td><img src="asset/dist/img/dokter/<?php echo $data['foto'] ?>" width="100" height="90" alt=""></td>

                    <td class="text-center">
                      <a href="?page=datadokter&aksi=editjadwal&id=<?php echo $data['kodedokter'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;
                      <a href="?page=datadokter&aksi=hapusjadwal&id=<?php echo $data['kodedokter'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Obat ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
                <th> Waktu </th>
                <th> Foto Dokter </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
