<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sispus");

if ($_GET['act'] == 'deleteuser'){
    $id_user = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($connect, "DELETE FROM data_pasien WHERE id_pasien = '$id_user'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:data_pasien.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($connect);
		header("location:data_pasien.php");
    }

    mysqli_close($koneksi);
}
?>