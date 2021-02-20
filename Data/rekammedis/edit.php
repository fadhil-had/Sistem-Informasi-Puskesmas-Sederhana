<?php
//include('dbconnected.php');
$connect = mysqli_connect("localhost", "root", "", "sispus");
date_default_timezone_set('Asia/Jakarta');

$id = $_POST['id'];
$query=mysqli_query($connect, "SELECT * FROM data_kunjungan_pasien WHERE id_pasien='$id'");
$row=mysqli_fetch_array($query);
$nama = $_POST['nama'];
$tgl = $row['tanggal'];
$nama_obat = $_POST['obat'];
$jenis = $_POST['jenis'];
$satuan = $_POST['satuan'];
$harga = $_POST['harga'];

//query update
$query = "
		INSERT INTO data_obat (id_pasien, nama_pasien, nama_obat, jenis_obat, satuan_obat, harga_obat,tanggal_keluar_obat) VALUES( '$id', '$nama', '$nama_obat', '$jenis','$satuan','$harga','$tgl')
		";
if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:rekam_medis.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:rekam_medis.php");
}

//mysql_close($host);
?>