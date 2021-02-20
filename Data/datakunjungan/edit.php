<?php
//include('dbconnected.php');
$connect = mysqli_connect("localhost", "root", "", "sispus");
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$query=mysqli_query($connect, "SELECT * FROM data_kunjungan_pasien WHERE id_pasien='$id'");
$row=mysqli_fetch_array($query);
$nama = $_POST['nama'];
$tgl = $row['tanggal'];
$diagnosa = $_POST['diagnosa'];
$tindakan = $_POST['tindakan'];
$resep = $_POST['resep'];

//query update
$query = "
		INSERT INTO rekam_medis (id_pasien, nama_pasien, tanggal_kunjungan, diagnosa, tindakan, resep_obat) VALUES( '$id', '$nama', '$tgl', '$diagnosa','$tindakan','$resep')
		";
if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:data_kunjungan.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:data_kunjungan.php"); 
}

//mysql_close($host);
?>