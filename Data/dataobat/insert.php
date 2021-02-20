<?php
$connect = mysqli_connect("localhost", "root", "", "sispus");
if($_GET['act']== 'tambahuser'){
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $khasiat = $_POST['khasiat'];
    $efek = $_POST['efek'];

    //query
    $querytambah =  mysqli_query($connect, "INSERT INTO resep_obat (nama_obat,jenis_obat,khasiat,efek_samping) VALUES('$nama' , '$jenis' , '$khasiat' , '$efek')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:data_obat.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($connect);
		header("location:data_obat.php");
    }
}
?>