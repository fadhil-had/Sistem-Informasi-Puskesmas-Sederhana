<?php
//include('dbconnected.php');
$connect = mysqli_connect("localhost", "root", "", "sispus");

$id = $_POST['id'];
$nama = $_POST['nama'];
$spesial = $_POST['spesial'];
$hari = $_POST['hari'];
$masuk = $_POST['masuk'];
$keluar = $_POST['keluar'];

//query update
$query = "UPDATE data_dokter SET nama_dokter='$nama',spesialisasi_dokter='$spesial',hari_praktek='$hari',jam_masuk='$masuk',jam_keluar='$keluar' WHERE id_dokter='$id' ";

if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:jadwal_dokter.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:jadwal_dokter.php"); 
}

//mysql_close($host);
?>