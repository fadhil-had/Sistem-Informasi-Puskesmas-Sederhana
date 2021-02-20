<?php
// mengaktifkan session pada php
session_start();

//Include file koneksi ke database
include "../koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$nama=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$feed=$_POST["message"];

// Cek jika ada error
if ((empty($nama)) || (empty($email)) || (empty($feed)) || (empty($phone))){
	echo "<script>alert('Data feedback belum diisi')</script>";
	echo "<meta http-equiv='refresh' content='1 url=contact.html'>";
}else{
	$daftar = mysqli_query($koneksi,"INSERT INTO feedback (nama,email,phone,feedback) VALUES ('$nama','$email','$phone','$feed')");
	if ($daftar){
		echo "<script>alert('Feedback diterima')</script>";
		echo "<meta http-equiv='refresh' content='1 url=contact.html'>";
	}else{
		echo "<script>alert('Gagal Memberi Feedback')</script>";
		echo "<meta http-equiv='refresh' content='1 url=contact.html'>";
}
}
?>
