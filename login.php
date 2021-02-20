<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
$password= hash("sha256",$password);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user WHERE username='$username' AND password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['user_level']=="Administrasi"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level'] = "Administrasi";
		// alihkan ke halaman dashboard admin
		header("location:beranda/index.html");

	// cek jika user login sebagai Dokter
	}else if($data['user_level']=="Dokter"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level'] = "Dokter";
		// alihkan ke halaman dashboard Dokter
		header("location:beranda/index.html");

	// cek jika user login sebagai apoteker
	}else if($data['user_level']=="Apoteker"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level'] = "Apoteker";
		// alihkan ke halaman dashboard apoteker
		header("location:beranda/index.html");
		
		// cek jika user login sebagai pasien
	}else if($data['user_level']=="Pasien"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['user_level'] = "Pasien";
		// alihkan ke halaman dashboard pasien
		header("location:beranda/index.html");

	}else{

		// alihkan ke halaman login kembali
		echo "<script>alert('Login gagal')</script>";
		echo "<meta http-equiv='refresh' content='1 url=login.html'>";
	}	
}else{
	echo "<script>alert('Login gagal')</script>";
	echo "<meta http-equiv='refresh' content='1 url=login.html'>";
}

?>