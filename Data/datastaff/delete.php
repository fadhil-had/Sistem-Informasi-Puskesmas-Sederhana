<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "sispus");

if ($_GET['act'] == 'deleteuser'){
    $id_user = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($connect, "DELETE FROM data_staff WHERE id_staff = '$id_user'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:data_staff.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($connect);
		header("location:data_staff.php");
    }

    mysqli_close($koneksi);
}
?>