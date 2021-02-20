<?php  
//index.php
session_start();
date_default_timezone_set('Asia/Jakarta');
$tgl=date('Y-m-d');
$user = $_SESSION['username'];
$connect = mysqli_connect("localhost", "root", "", "sispus");
$querty = "SELECT * FROM user WHERE username = '$user'";
$resul = mysqli_query($connect, $querty);
$rows = mysqli_fetch_array($resul);
$id = $rows['id_user'];
if ($rows['user_level'] == "Pasien"){ 
$query = "SELECT * FROM data_obat WHERE id_pasien = '$id'";
} else {
$query = "SELECT * FROM data_obat ORDER BY id_pasien DESC";}
$result = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>SisPus</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="../../css/styles.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="../../css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="../../images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="../../css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
   	  <script src="../../js/jquery.min.js"></script> 
      <script src="../../js/bootstrap.bundle.min.js"></script> 
	  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
	  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->


   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <!-- end loader --> 
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="head_top">
               <div class="container">
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <ul class="sociel_link">
                         <li> <a href="https://twitter.com/itbofficial"><i class="fa fa-twitter"></i></a></li>
						 <li> <a href="https://web.facebook.com/institutteknologibandung/"><i class="fa fa-facebook"></i></a></li>
                         <li> <a href="https://www.instagram.com/itb1920/"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="https://id.linkedin.com/school/itb/"><i class="fa fa-linkedin"></i></a></li>
                     </ul>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                       <div class="top-box">
                        <p>Sistem Informasi Puskesmas </p>
                    </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
               </div>
               <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                  <div class="menu-area">
                     <div class="limit-box">
                        <nav class="main-menu">
                           <ul class="menu-area-main">
                              <li> <a href="../../beranda/index.html">Home</a> </li>
                              <li> <a href="../../beranda/about.html">About</a> </li>
                              <li class="active"> <a href="../../beranda/product.html">Menu</a> </li>
                              <li> <a href="../../beranda/blog.html"> News</a> </li>
                              <li> <a href="../../beranda/contact.html">Contact</a> </li>
                               
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
               <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                  <li><a class="buy" href="../../logout.php">Logout</a></li>
               </div>
            </div>
         </div>
		</div>
         <!-- end header inner --> 
      </header>
      <!-- end header -->
       <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Transaksi Obat</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

      <!-- service --> 
      <!-- our product -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

					<table class="table table-stripped table-hover datatab">
						<thead>
							<tr><th>ID Pasien</th><th>Nama Pasien</th><th>Nama Obat</th><th>Jenis Obat</th><th>Satuan Obat</th><th>Harga Obat</th><th>Tanggal Keluar Obat</th></tr>
						</thead>
						<tbody>
							<?php 
								while ($row = mysqli_fetch_assoc($result)) 
								{
							?>
							<tr>
							<td><?php echo $row["id_pasien"]; ?></td>
							<td><?php echo $row["nama_pasien"]; ?></td>
							<td><?php echo $row["nama_obat"]; ?></td>
							<td><?php echo $row["jenis_obat"]; ?></td>
							<td><?php echo $row["satuan_obat"]; ?></td>
							<td><?php echo $row["harga_obat"]; ?></td>
							<td><?php echo $row["tanggal_keluar_obat"]; ?></td>
							
							</tr>
					<?php } ?>
					</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
		
	<!--  footer --> 
      <footr>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <ul class="sociel">
                         <li> <a href="https://twitter.com/itbofficial"><i class="fa fa-twitter"></i></a></li>
						 <li> <a href="https://web.facebook.com/institutteknologibandung/"><i class="fa fa-facebook"></i></a></li>
                         <li> <a href="https://www.instagram.com/itb1920/"><i class="fa fa-instagram"></i></a></li>
                         <li> <a href="https://id.linkedin.com/school/itb/"><i class="fa fa-linkedin"></i></a></li>
                     </ul>
                  </div>
            </div>
            <div class="row">
               <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>contact us</h3>
                     <span>Jalan Ganesha no 10<br>
                       Bandung, Jawa Barat<br>
                        humas@itb.ac.id</span>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>ADDITIONAL LINKS</h3>
                     <ul class="lik">
                         <li> <a href="../../beranda/about.html">About us</a></li>
                         <li> <a href="../../beranda/blog.html">News</a></li>
                          <li> <a href="../../beranda/contact.html">Contact us</a></li>
                     </ul>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>Our Menu</h3>
                      <ul class="lik">
						<li> <a href="../datadokter/data_dokter.php"> Data Dokter</a></li>
                        <li> <a href="../datastaff/data_staff.php">Data Staff</a></li>
                        <li> <a href="../datapasien/data_pasien.php">Data Pasien</a></li>
                        <li> <a href="../dataobat/data_obat.php">Data Obat</a></li>
                        <li> <a href="../jadwaldokter/jadwal_dokter.php">Jadwal Dokter</a></li>
                  </div>
               </div>
                 <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                  <div class="contact">
                     <h3>About SisPus</h3>
                     <span>SisPus atau Sistem Informasi Puskesmas merupakan sistem manajemen Puskesmas sederhana</span>
                  </div>
               </div>
            </div>
         </div>
            <div class="copyright">
               <p>Copyright 2020 Sistem Informasi Puskesmas</p>
            </div>
         
      </div>
      </footr>
      <!-- end footer -->
      <!-- Javascript files--> 
      <script src="../../js/jquery.min.js"></script> 
      <script src="../../js/popper.min.js"></script> 
      <script src="../../js/bootstrap.bundle.min.js"></script> 
      <script src="../../js/jquery-3.0.0.min.js"></script> 
      <script src="../../js/plugin.js"></script>
      <!-- sidebar --> 
      <script src="../../js/jquery.mCustomScrollbar.concat.min.js"></script> 
      <script src="../../js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script>
   </body>
   <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
   <script>
   $(document).ready(function() {
	   $('.datatab').DataTable();
	   } );
	</script>
</html>