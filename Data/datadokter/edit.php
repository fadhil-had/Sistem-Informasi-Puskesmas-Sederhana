<?php
//include('dbconnected.php');
 $connect = mysqli_connect("localhost", "root", "", "sispus");

$id = $_POST['id'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$spesial = $_POST['spesial'];

//query update
$query = "UPDATE data_dokter SET nama_dokter='$nama',jenis_kelamin='$gender',spesialisasi_dokter='$spesial' WHERE id_dokter='$id' ";

if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:data_dokter.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:data_dokter.php"); 
}

//mysql_close($host);
?>