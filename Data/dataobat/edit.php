<?php
//include('dbconnected.php');
 $connect = mysqli_connect("localhost", "root", "", "sispus");

$id = $_POST['nama'];
$jenis = $_POST['jenis'];
$khasiat = $_POST['khasiat'];
$efek = $_POST['efek'];

//query update
$query = "UPDATE resep_obat SET jenis_obat='$jenis',khasiat='$khasiat',efek_samping='$efek' WHERE nama_obat='$id' ";

if (mysqli_query($connect,$query)) {
 # credirect ke page index
 header("location:data_obat.php"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($connect);
 header("location:data_obat.php");
}

//mysql_close($host);
?>