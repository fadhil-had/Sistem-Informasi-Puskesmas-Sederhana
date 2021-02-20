<?php
//include('dbconnected.php');
 $connect = mysqli_connect("localhost", "root", "", "sispus");

$id = $_POST['id'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$spesial = $_POST['spesial'];
$hari = $_POST['hari'];

//query update
$query = "UPDATE data_staff SET nama_staff='$nama',jenis_kelamin='$gender',bidang_staff='$spesial',hari_kerja='$hari' WHERE id_staff='$id' ";

if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:data_staff.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error();
 header("location:data_staff.php");
}

//mysql_close($host);
?>