<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sispus");

if ($_GET['act'] == 'deleteuser'){
    $id_user = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($connect, "DELETE FROM data_dokter WHERE id_dokter = '$id_user'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:jadwal_dokter.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($connect);
		header("location:jadwal_dokter.php");
    }

    mysqli_close($koneksi);
}
?>