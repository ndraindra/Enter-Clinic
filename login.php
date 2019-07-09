<?php

// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'auth/koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
    echo "<script language='javascript'>alert('Login Berhasil Sebagai $username')</script>";
    echo '<meta http-equiv="refresh" content="0; url=index.php?page=index">';

	// cek jika user login sebagai pegawai
	}else if($data['level']=="pegawai"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pegawai";
		// alihkan ke halaman dashboard pegawai
    echo "<script language='javascript'>alert('Login Berhasil Sebagai $username')</script>";
    echo '<meta http-equiv="refresh" content="0; url=index.php?page=index">';

	}else{

		// alihkan ke halaman login kembali
    echo "<script language='javascript'>alert('Login Gagal')</script>";
    echo '<meta http-equiv="refresh" content="0; url=auth/login.php">';
	}
}else{
  echo "<script language='javascript'>alert('Login Gagal')</script>";
  echo '<meta http-equiv="refresh" content="0; url=auth/login.php">';
}

?>

<?php
// session_start();
// include "auth/koneksi.php";
// if(isset($_POST['login'])){
//
// $username	= $_POST['username'];
// $password	= md5($_POST['password']);
// $level		= $_POST['level'];
//
// $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
// if(mysqli_num_rows($query) == 0){
//   echo "<script language='javascript'>alert('Login Gagal')</script>";
//   echo '<meta http-equiv="refresh" content="0; url=auth/login.php">';
// }else{
//   $row = mysqli_fetch_assoc($query);
//
//   if($row['level'] == 'admin' && $level == 'admin'){
//     $_SESSION['id_user'] = $row['id_user'];
//     $_SESSION['username']=$username;
//     $_SESSION['level']='admin';
//     echo "<script language='javascript'>alert('Login Berhasil Sebagai Admin')</script>";
// 		echo '<meta http-equiv="refresh" content="0; url=index.php">';
//   }else if($row['level'] == 'pegawai' && $level == 'pegawai'){
//     $_SESSION['id_user'] = $row['id_user'];
//     $_SESSION['username']=$username;
//     $_SESSION['level']='pegawai';
//     echo "<script language='javascript'>alert('Login Berhasil Sebagai Pegawai')</script>";
// 		echo '<meta http-equiv="refresh" content="0; url=index.php">';
//   }
// }
// }
// ?>
