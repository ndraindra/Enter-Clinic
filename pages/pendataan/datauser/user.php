<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Data User
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Pendataan </li>
    <li class="active"> Data User </li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
            <p></p>
          <a href="?page=datauser&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
          <a href="pages/pendataan/datauser/cetakdatauser.php" target="blank" class="btn btn-primary"> Cetak PDF </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="datatables" class="table table-bordered table-striped">

            <thead>
              <tr>
                <th> No </th>
                <th> Kode User </th>
                <th> Nama Depan </th>
                <th> Nama Belakang </th>
                <th> Jenis Kelamin </th>
                <th> No HP </th>
                <th> Tanggal Lahir </th>
                <th> Username </th>
                <th> Level </th>
                <th> Foto </th>
                <th> Actions </th>
              </tr>
            </thead>

            <tbody>
            <?php
            $batas = 10;
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
                  $sql = "SELECT * FROM users WHERE kode_user LIKE '%pencarian%'";
                  $query = $sql;
                  $queryJml = $sql;
                } else {
                  $query = "SELECT * FROM users LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM users";
                  $no = $posisi + 1;
                }
              } else {
                $query = "SELECT * FROM users LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM users";
                $no = $posisi + 1;
              }

              $sql_user = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
              if(mysqli_num_rows($sql_user) > 0 ) {
                while($data = mysqli_fetch_array($sql_user)) { ?>
                  <tr>
                    <td><?php echo $no++; ?>.</td>
                    <td><?php echo $data['kode_user'] ?></td>
                    <td><?php echo $data['first_name'] ?></td>
                    <td><?php echo $data['last_name'] ?></td>
                    <td><?php echo $data['jk'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['tgl_lahir'] ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['level'] ?></td>
                    <td><img src="asset/dist/img/user/<?php echo $data['foto'] ?>" width="50" height="50" alt=""></td>

                    <td class="text-center">
                      <a href="?page=datauser&aksi=edit&id=<?php echo $data['kode_user'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;
                      <a href="?page=datauser&aksi=hapus&id=<?php echo $data['kode_user'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Obat ?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
                <th> Kode User </th>
                <th> Nama Depan </th>
                <th> Nama Belakang </th>
                <th> Jenis Kelamin </th>
                <th> No HP </th>
                <th> Tanggal Lahir </th>
                <th> Username </th>
                <th> Level </th>
                <th> Foto </th>
                <th> Actions </th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
