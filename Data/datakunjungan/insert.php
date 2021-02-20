<?php
$connect = mysqli_connect("localhost", "root", "", "sispus");
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$jam=date('H:i:s');
if($_GET['act']== 'tambahuser'){
    $id = $_POST['id'];
	$nama = $_POST['nama'];
    $poli = $_POST['poli'];
    $keluhan = $_POST['keluhan'];

    //query
    $querytambah =  mysqli_query($connect, "INSERT INTO data_kunjungan_pasien (id_pasien,nama_pasien,poli_tujuan,keluhan,tanggal,waktu) 
									VALUES('$id','$nama','$poli','$keluhan','$tgl','$jam')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:data_kunjungan.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($connect);
		header("location:data_kunjungan.php");
    }
}
?>