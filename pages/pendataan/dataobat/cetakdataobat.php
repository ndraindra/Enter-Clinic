<html>
<head>
	<title> CETAK LAPORAN DATA OBAT </title>
	 <link rel="icon" href="../../../asset/dist/img/logo.png" type="image/x-icon">
</head>
<body>

	<center> <h2> LAPORAN DATA OBAT </h2>

		<p> <h3> ENTER CLINIC </h3></p>
		<p> <h4> Meruya - Jakarta Barat
		</p></center>


	<?php
	$koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
	?>

	<table border="1" style="width: 100%">
		<thead>
			<th class="text-center" width="1%">No</th>
      <th class="text-center" width="1%">ID Obat</th>
			<th class="text-center" width="6%">Nama Obat</th>
			<th class="text-center" width="4%">Jumlah Obat</th>
      <th class="text-center" width="1%">Keterangan</th>
		</thead>
		<?php
		$no = 1;
		$sql = mysqli_query($koneksi,"select id_obat,nama_obat,jmlh_obat,detail from tb_obat");
		while($data = mysqli_fetch_array($sql)){
		?>
		<tr>
			<td align="center"><?php echo $no++; ?></td>
			<td align="center"><?php echo $data['id_obat']; ?></td>
			<td align="center"><?php echo $data['nama_obat']; ?></td>
			<td align="center"><?php echo $data['jmlh_obat']; ?></td>
      <td align="center"><?php echo $data['detail']; ?></td>
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
