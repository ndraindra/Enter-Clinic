<html>
<head>
	<title> CETAK LAPORAN DATA PASIEN </title>
	 <link rel="icon" href="../../../asset/dist/img/logo.png" type="image/x-icon">
</head>
<body>

	<center> <h2> LAPORAN DATA PASIEN </h2>

		<p> <h3> ENTER CLINIC </h3></p>
		<p> <h4> Meruya - Jakarta Barat
		</p></center>


	<?php
	$koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
	?>

	<table border="1" style="width: 100%">
		<thead>
			<th class="text-center" width="1%">No</th>
      <th class="text-center" width="2%">Kode Pasien</th>
			<th class="text-center" width="5%">Nama Pasien</th>
			<th class="text-center" width="1%">Jenis Kelamin</th>
      <th class="text-center" width="4%">Alamat</th>
      <th class="text-center" width="1%">No HP</th>
      <th class="text-center" width="1%">Tanggal Daftar</th>
      <th class="text-center" width="1%">Jam Daftar</th>
		</thead>
		<?php
		$no = 1;
		$sql = mysqli_query($koneksi,"select kode_pasien,nama_pasien,jk,alamat,no_hp,tgl_daf,jam_daf from tb_pasien");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
			<td align="center"><?php echo $data['kode_pasien']; ?></td>
			<td align="center"><?php echo $data['nama_pasien']; ?></td>
			<td align="center"><?php echo $data['jk']; ?></td>
      <td align="center"><?php echo $data['alamat']; ?></td>
      <td align="center"><?php echo $data['no_hp']; ?></td>
      <td align="center"><?php echo $data['tgl_daf']; ?></td>
      <td align="center"><?php echo $data['jam_daf']; ?></td>
		</tr>
		<?php
		}
		?>
		</table>
	<p></p>

	<script>
	window.print();
      </script>
</body>
<html>
