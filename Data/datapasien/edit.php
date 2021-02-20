<?php
//include('dbconnected.php');
 $connect = mysqli_connect("localhost", "root", "", "sispus");

$id = $_POST['id'];
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$usia = $_POST['usia'];
$darah = $_POST['darah'];
$date = $_POST['date'];
$alamat = $_POST['alamat'];
$asuransi = $_POST['asuransi'];
$phone = $_POST['phone'];

//query update
$query = "UPDATE data_pasien SET nama_pasien='$nama',kelamin_pasien='$gender',usia_pasien='$usia',gol_darah_pasien='$darah',tanggal_lahir_pasien='$date',alamat_pasien='$alamat',asuransi_pasien='$asuransi',nomor_telepon_pasien='$phone' WHERE id_pasien='$id' ";

if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:data_pasien.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:data_pasien.php");
}

//mysql_close($host);
?>