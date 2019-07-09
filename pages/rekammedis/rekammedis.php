<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Rekam Medis
    <small> Enter Clinic </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Rekam Medis </li>
  </ol>
</section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
              <p></p>
            <a href="?page=rekammedis&aksi=tambah" class="btn btn-primary"> Tambah Data </a>&nbsp;
            <a href="" class="btn btn-primary"> Cetak PDF </a>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="datatables" class="table table-bordered table-striped">

              <thead>
                <tr>
                  <th> No </th>
                  <th> No Rekam Medis </th>
                  <th> Kode Pasien </th>
                  <th> Kode Dokter </th>
                  <th> Keluhan </th>
                  <th> Diagnosa </th>
                  <th> Tindakan </th>
                  <th> Spesialis </th>
                  <th> Id Penyakit </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
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
                    $sql = "SELECT * FROM rekammedik WHERE kodepasien LIKE '%pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                  } else {
                    $query = "SELECT * FROM rekammedik LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM rekammedik";
                    $no = $posisi + 1;
                  }
                } else {
                  $query = "SELECT * FROM rekammedik LIMIT $posisi, $batas";
                  $queryJml = "SELECT * FROM rekammedik";
                  $no = $posisi + 1;
                }

                $sql_tindakan = mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));
                if(mysqli_num_rows($sql_tindakan) > 0 ) {
                  while($data = mysqli_fetch_array($sql_tindakan)) { ?>
                    <tr>
                      <td><?php echo $no++; ?>.</td>
                      <td><?php echo $data['nomorRm'] ?></td>
                      <td><?php echo $data['nama_pasien'] ?></td>
                      <td><?php echo $data['kodedokter'] ?></td>
                      <td><?php echo $data['keluhan'] ?></td>
                      <td><?php echo $data['diagnosa'] ?></td>
                      <td><?php echo $data['tindakan'] ?></td>
                      <td><?php echo $data['spesialis'] ?></td>
                      <td><?php echo $data['id_penyakit'] ?></td>
                      <td><?php echo $data['jam'] ?></td>
                      <td><?php echo $data['tgl'] ?></td>

                      <td class="text-center">
                        <a href="?page=rekammedis&aksi=edit&id=<?php echo $data['nomorRm'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>&nbsp;

                        <a href="?page=tindakan&aksi=hapus&id=<?php echo $data['nomorRm'] ?>" onclick="return confirm('Yakin Akan Menghapus Data Ini ?')">
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
                  <th> No Rekam Medis </th>
                  <th> Kode Pasien </th>
                  <th> Kode Dokter </th>
                  <th> Keluhan </th>
                  <th> Diagnosa </th>
                  <th> Tindakan </th>
                  <th> Spesialis </th>
                  <th> Id Penyakit </th>
                  <th> Jam </th>
                  <th> Tanggal </th>
                  <th> Actions </th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
