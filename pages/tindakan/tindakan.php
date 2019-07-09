<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Kategori Tindakan
    <small> Enter Clinic </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Kategori Tindakan </li>
  </ol>
</section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
              <p></p>
            <a href="?page=tindakan&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
            <a href="pages/cetak/cetaktindakan.php"  target="blank" class="btn btn-primary"> Cetak PDF </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="datatables" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th> No </th>
                  <th> Nama Tindakan </th>
                  <th> Keterangan </th>
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
                    $sql = "SELECT * FROM tb_tindakan WHERE nm_tindakan LIKE '%pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                  } else {
                    $query = "SELECT * FROM tb_tindakan LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tb_tindakan";
                    $no = $posisi + 1;
                  }
                } else {
                  $query = "SELECT * FROM tb_tindakan LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM tb_tindakan";
                  $no = $posisi + 1;
                }

                $sql_tindakan = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                if(mysqli_num_rows($sql_tindakan) > 0 ) {
                  while($data = mysqli_fetch_array($sql_tindakan)) { ?>
                    <tr>
                      <td><?php echo $no++; ?>.</td>
                      <td><?php echo $data['nm_tindakan'] ?></td>
                      <td><?php echo $data['ket'] ?></td>

                      <td class="text-center">
                        <a href="?page=tindakan&aksi=edit&id=<?php echo $data['nm_tindakan'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;

                        <a href="?page=tindakan&aksi=hapus&id=<?php echo $data['nm_tindakan'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')">
                          <button class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
                        </a>
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
                  <th> Nama Tindakan </th>
                  <th> Keterangan </th>
                  <th> Actions </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
