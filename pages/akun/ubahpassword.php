<?php
  $koneksi = new mysqli("localhost", "root", "", "db_rekammedis");
?>

<section class="content-header">
  <h1>
    Ubah Password
  </h1>
  <ol class="breadcrumb">
    <li><a href="?page=index"><i class="fa fa-dashboard"></i> Dashboard
      </a></li>
    <li class="active"> Akun </li>
    <li class="active"> Ubah Password </li>
  </ol>
</section>

<div class="box box-primary">

  <form action="pages/akun/proses.php" method="POST">
    <div class="box-body">
      <div class="form-group">
        <label for="pass_lama"> Password Lama </label>
        <input type="password" class="form-control" id="pass_lama" name="pass_lama" placeholder="Masukan Password Lama" autofocus>
      </div>

      <div class="form-group">
        <label for="pass_baru"> Password Baru </label>
        <input type="password" class="form-control" id="pass_baru" name="pass_baru" placeholder="Masukan Password Baru" required>
      </div>

      <div class="form-group">
        <label for="confirm_pass"> Konfirmasi Password Baru </label>
        <input type="password" class="form-control" id="confirm_pass" name="confirm_pass" placeholder="Konfirmasi Password Baru" required>
      </div>

      <input type="submit" name="ganti" value="Simpan" class="btn btn-primary">&nbsp;
      <a href="?page=index"><input type="button" class="btn btn-default" value="Batal" ></a>
    </div>
  </form>
</div>
