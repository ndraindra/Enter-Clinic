<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Data Dokter
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data Dokter </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=datadokter&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/pendataan/datadokter/cetakdatadokter.php" target="blank" class="btn btn-primary"> Cetak PDF </a>&nbsp;
          <a href="?page=datadokter&aksi=jadwaldokter" align="right" class="btn btn-success"> Jadwal Dokter </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" >
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No & Foto </th>
                <th> Kode Dokter </th>
                <th> Nama Dokter </th>
                <th> Spesialis </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> No HP </th>
                <th> Status </th>
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
                  $sql = "SELECT * FROM tb_dokter WHERE nama_dokter LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM tb_dokter LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_dokter";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM tb_dokter LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_dokter";
                $no = $posisi + 1;
              }

              $sql_obat = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_obat) > 0 ) {
                while($data = mysqli_fetch_array($sql_obat)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>. <img src="asset/dist/img/dokter/<?php echo $data['foto'] ?>" width="60" height="60" class="rounded-circle m-r-5" alt=""></td>
                    <td><?php echo $data['kodeDokter'] ?></td>
                    <td><?php echo $data['nama_dokter'] ?></td>
                    <td><?php echo $data['spesialis'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><span class="btn btn-block btn-info disabled"><?php echo $data['status'] ?></span></td>
                    <td class="text-center">
                      <a href="?page=datadokter&aksi=edit&id=<?php echo $data['kodeDokter'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit" ></i></a>&nbsp;
                      <a href="?page=datadokter&aksi=hapus&id=<?php echo $data['kodeDokter'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Obat ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
                <th> Spesialis </th>
                <th> Jenis Kelamin </th>
                <th> Alamat </th>
                <th> No HP </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
