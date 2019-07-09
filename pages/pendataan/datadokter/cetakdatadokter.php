<html>
<head>
	<title>CETAK LAPORAN DATA DOKTER</title>
	 <link rel="icon" href="../../../asset/dist/img/logo.png" type="image/x-icon">
</head>
<body>

	<center> <h2> LAPORAN DATA DOKTER </h2>

		<p> <h3> ENTER CLINIC </h3></p>
		<p> <h4> Meruya - Jakarta Barat
		</p></center>


	<?php
	$koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
	?>

	<table border="1" style="width: 100%">
		<thead>
			<th class="text-center" width="1%">No</th>
      <th class="text-center" width="1%">ID Dokter</th>
			<th class="text-center" width="2%">Kode Dokter</th>
			<th class="text-center" width="6%">Nama Dokter</th>
			<th class="text-center" width="4%">Spesialis</th>
      <th class="text-center" width="1%">Jenis Kelamin</th>
			<th class="text-center" width="5%">Alamat</th>
			<th class="text-center" width="1%">No HP</th>
		</thead>
		<?php
		$no = 1;
		$sql = mysqli_query($koneksi,"select id_dokter,kodeDokter,nama_dokter,spesialis,jk,alamat,no_hp from tb_dokter");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
			<td align="center"><?php echo $data['id_dokter']; ?></td>
			<td align="center"><?php echo $data['kodeDokter']; ?></td>
			<td align="center"><?php echo $data['nama_dokter']; ?></td>
      <td align="center"><?php echo $data['spesialis']; ?></td>
			<td align="center"><?php echo $data['jk']; ?></td>
			<td align="center"><?php echo $data['alamat']; ?></td>
      <td align="center"><?php echo $data['no_hp']; ?></td>
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
