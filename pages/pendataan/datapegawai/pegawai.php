<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Data Pegawai
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Pegawai </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=datapegawai&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/pendataan/datapegawai/cetakdatapegawai.php" target="balnk" class="btn btn-primary"> Cetak PDF </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> NIP </th>
                <th> Nama Pegawai </th>
                <th> Jabatan Fungsional </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> Tanggal Lahir </th>
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
                  $sql = "SELECT * FROM tb_pegawai WHERE nama_pegawai LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM tb_pegawai LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_pegawai";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM tb_pegawai LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_pegawai";
                $no = $posisi + 1;
              }

              $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_obat) > 0 ) {
                while($data = mysqli_fetch_array($sql_obat)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['nip'] ?></td>
                    <td><?php echo $data['nama_pegawai'] ?></td>
                    <td><?php echo $data['unit'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['tgl_lhr'] ?></td>
                    <td class="text-center">
                      <a href="?page=datapegawai&aksi=edit&id=<?php echo $data['nip'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                      <a href="?page=datapegawai&aksi=hapus&id=<?php echo $data['nip'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Obat ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
                <th> NIP </th>
                <th> Nama Pegawai </th>
                <th> Jabatan Fungsional </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> Tanggal Lahir </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
