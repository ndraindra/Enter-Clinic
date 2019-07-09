<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> CETAK LAPORAN DATA USER </title>
    <link rel="icon" href="../../../asset/dist/img/logo.png" type="image/x-icon">
  </head>
  <body>

    <center> <h2> LAPORAN DATA PEGAWAI </h2>
      <p> <h3> ENTER CLINIC </h3> </p>
      <p> <h4> Meruya, Jakarta Barat </h4> </p>
    </center>

  <?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
  ?>

  <table border="1" style="width:100%">
    <thead>
      <th class="text-center" width="1%"> No </th>
      <th class="text-center" width="2%"> Kode User </th>
      <th class="text-center" width="2%"> Nama Depan </th>
      <th class="text-center" width="4%"> Nama Belakang </th>
      <th class="text-center" width="1%"> Jenis Kelamin </th>
      <th class="text-center" width="5%"> Alamat </th>
      <th class="text-center" width="4%"> No HP </th>
      <th class="text-center" width="5%"> Tanggal Lahir </th>
      <th class="text-center" width="4%"> Username </th>
      <th class="text-center" width="1%"> Level </th>
    </thead>

    <?php
    $no = 1;
    $sql = mysqli_query($koneksi,"SELECT kode_user, first_name, last_name, jk, alamat, no_hp, tgl_lahir, username, level FROM users");
    while ($data = mysqli_fetch_array($sql)) {
      ?>
      <tr>
        <td align="center"> <?php echo $no++; ?> </td>
        <td align="center"> <?php echo $data['kode_user']; ?> </td>
        <td align="center"> <?php echo $data['first_name']; ?> </td>
        <td align="center"> <?php echo $data['last_name']; ?> </td>
        <td align="center"> <?php echo $data['jk']; ?> </td>
        <td align="center"> <?php echo $data['alamat']; ?></td>
        <td align="center"> <?php echo $data['no_hp']; ?> </td>
        <td align="center"> <?php echo $data['tgl_lahir']; ?> </td>
        <td align="center"> <?php echo $data['username']; ?> </td>
        <td align="center"> <?php echo $data['level']; ?> </td>
      </tr>
      <?php
    }
      ?>
  </table>

  <script>
  window.print();
  </script>

</body>
</html>
