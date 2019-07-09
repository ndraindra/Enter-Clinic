<?php
include "../../auth/koneksi.php";

$username = 'admin';

if(isset($_POST['ganti'])) {
  $pass_lama = $_POST['pass_lama'];
  $pass_baru = $_POST['pass_baru'];
  $confirm_pass = $_POST['confirm_pass'];

  $result = mysqli_query("SELECT * FROM users WHERE username='$username'");
  if (mysqli_num_rows($result)==0){
    echo "<script language='javascript'>alert('Maaf, Username $username Tidak Ditemukan!')</script>";
    echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
  } else {
    $cek = mysqli_fetch_array($result);
    if($pass_lama=='' || $pass_baru=='' || $confirm_pass=='') {
      echo "<script language='javascript'>alert('Form tidak boleh ada yang kosong')</script>";
      echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
    } else {
      if ($pass_lama <> $cek['password']) {
        echo "<script language='javascript'>alert('Password Lama tidak sama')</script>";
        echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
      }else{
        if($pass_baru <> $confirm_pass) {
          echo "<script language='javascript'>alert('Password Baru dan Konfirmasi Password Baru tidak cocok')</script>";
          echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
        } else {
          $sql = mysqli_query("UPDATE users SET password='$pass_baru' WHERE username='$username'");
          if ($sql) {
            echo "<script language='javascript'>alert('Password Berhasil Disimpan')</script>";
            echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
          } else {
            echo "<script language='javascript'>alert('Password Gagal Disimpan')</script>";
            echo '<meta http-equiv="refresh" content="0; url=index.php?page=akun">';
          }
        }
      }
    }
  }
}
?>
