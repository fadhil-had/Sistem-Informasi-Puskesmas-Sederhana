<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sispus");

if ($_GET['act'] == 'deleteuser'){
    $id_user = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($connect, "DELETE FROM resep_obat WHERE nama_obat = '$id_user'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:data_obat.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($connect);
		header("location:data_obat.php");
    }

    mysqli_close($koneksi);
}
?>