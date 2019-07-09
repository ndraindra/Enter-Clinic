<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Data Pasien
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pasien </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=datapasien&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/pendataan/datapasien/cetakdatapasien.php" target="blank" class="btn btn-primary"> Cetak PDF </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> Kode Pasien </th>
                <th> Nama Pasien </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> No HP </th>
                <th> Tanggal Daftar </th>
                <th> Jam Daftar </th>
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
                  $sql = "SELECT * FROM tb_pasien WHERE nama_pasien LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM tb_pasien LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_pasien";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM tb_pasien LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_pasien";
                $no = $posisi + 1;
              }

              $sql_pasien = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_pasien) > 0 ) {
                while($data = mysqli_fetch_array($sql_pasien)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['kode_pasien'] ?></td>
                    <td><?php echo $data['nama_pasien'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['tgl_daf'] ?></td>
                    <td><?php echo $data['jam_daf'] ?></td>
                    <td class="text-center">
                      <a href="?page=datapasien&aksi=edit&id=<?php echo $data['kode_pasien'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                      <a href="?page=datapasien&aksi=hapus&id=<?php echo $data['kode_pasien'] ?>" onclick="return confirm('Yakin Akan Menghapus Data pasien ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
                <th> Kode Pasien </th>
                <th> Nama Pasien </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> No HP </th>
                <th> Tanggal Daftar </th>
                <th> Jam Daftar </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
