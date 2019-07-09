<html>
<head>
	<title> CETAK LAPORAN DATA PEGAWAI </title>
	 <link rel="icon" href="../../../asset/dist/img/logo.png" type="image/x-icon">
</head>
<body>

	<center> <h2> LAPORAN DATA PEGAWAI </h2>

		<p> <h3> ENTER CLINIC </h3></p>
		<p> <h4> Meruya - Jakarta Barat
		</p></center>


	<?php
	$koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
	?>

	<table border="1" style="width: 100%">
		<thead>
			<th class="text-center" width="1%">No</th>
      <th class="text-center" width="2%">NIP</th>
			<th class="text-center" width="5%">Nama Pegawai</th>
			<th class="text-center" width="1%">Jabatan</th>
      <th class="text-center" width="1%">Jenis Kelamin</th>
      <th class="text-center" width="5%">Alamat</th>
      <th class="text-center" width="3%">Tanggal Lahir</th>
		</thead>
		<?php
		$no = 1;
		$sql = mysqli_query($koneksi,"select nip,nama_pegawai,unit,jk,alamat,tgl_lhr from tb_pegawai");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
			<td align="center"><?php echo $data['nip']; ?></td>
			<td align="center"><?php echo $data['nama_pegawai']; ?></td>
			<td align="center"><?php echo $data['unit']; ?></td>
      <td align="center"><?php echo $data['jk']; ?></td>
      <td align="center"><?php echo $data['alamat']; ?></td>
      <td align="center"><?php echo $data['tgl_lhr']; ?></td>
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
