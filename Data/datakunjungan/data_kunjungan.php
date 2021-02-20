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
$quertys = "SELECT * FROM data_dokter WHERE id_dokter = '$id'";
$resuls = mysqli_query($connect, $quertys);
$rowd = mysqli_fetch_array($resuls);
$cek = $rowd['spesialisasi_dokter'];
if ($rows['user_level'] == "Dokter"){ 
$query = "SELECT * FROM data_kunjungan_pasien WHERE tanggal='$tgl' && poli_tujuan = '$cek' ORDER BY id_pendaftaran DESC";
} else {
$query = "SELECT * FROM data_kunjungan_pasien WHERE tanggal='$tgl' ORDER BY id_pendaftaran DESC"; }
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
                        <h2>Data Kunjungan Hari Ini</h2>
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
				<?php if ($_SESSION['user_level'] == "Pasien"){ ?>
				<div class="box-header with-border">
					<h3 class="box-title">List Data User</h3> 
						<div class="box-tools pull-left">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser">Daftar Kunjungan</a>
						</div>
				</div></br></br>
				<?php } ?>

					<table class="table table-stripped table-hover datatab">
						<thead>
							<tr><th>ID Pendaftaran</th><th>ID Pasien</th><th>Nama Pasien</th><th>Poli Tujuan</th><th>Keluhan</th>
							<?php if ($_SESSION['user_level'] == "Dokter"){ ?>
							<th>Diagnosa</th>
							<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php 
								while ($row = mysqli_fetch_assoc($result)) 
								{
							?>
							<tr>
							<td><?php echo $row["id_pendaftaran"]; ?></td>
							<td><?php echo $row["id_pasien"]; ?></td>
							<td><?php echo $row["nama_pasien"]; ?></td>
							<td><?php echo $row["poli_tujuan"]; ?></td>
							<td><?php echo $row["keluhan"]; ?></td>
							
							<?php if ($_SESSION['user_level'] == "Dokter"){ ?><td>
							<!-- Button untuk modal -->
							<a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $row['id_pasien']; ?>">Diagnosa</a></td>
							</td><?php } ?>
							</tr>
						
					
					<!-- modal insert -->
					<div class="example-modal">
					<div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
						<div class="modal-dialog"> 
							<div class="modal-content">
								<div class="modal-header">
									<center><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></center>
								<h3 class="modal-title">Registrasi User Baru</h3>
								</div>
								<div class="modal-body">
									<form action="insert.php?act=tambahuser" method="post" role="form">
									<div class="form-group">
									<div class="row">
										<label class="col-sm-3 control-label text-right">ID Pasien<span class="text-red">*</span></label>         
										<div class="col-sm-8"><input type="text" class="form-control" name="id" placeholder="ID Pasien" value="<?php echo $data['id_pasien']; ?>"></div>
									</div>
									</div>
									
									<div class="form-group">
									<div class="row">
										<label class="col-sm-3 control-label text-right">Nama Pasien<span class="text-red">*</span></label>         
										<div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama Pasien" value="<?php echo $data['nama_pasien']; ?>"></div>
									</div>
									</div>
									
									<div class="form-group">
									<div class="row">
										<label class="col-sm-3 control-label text-right">Poli Tujuan<span class="text-red">*</span></label>
										<div class="col-sm-8"><input type="text" class="form-control" name="poli" placeholder="Poli Tujuan" value=""></div>
									</div>
									</div>
									
									<div class="form-group">
									<div class="row">
										<label class="col-sm-3 control-label text-right">Keluhan<span class="text-red">*</span></label>
										<div class="col-sm-8"><textarea type="text" class="form-control" name="keluhan" placeholder="Keluhan" value=""></textarea></div>
									</div>
									</div>
									
									<div class="modal-footer">
										<button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
										<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
									</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					</div>
					
					<!-- Modal Edit Mahasiswa-->
					<div class="modal fade" id="myModal<?php echo $row['id_pasien']; ?>" role="dialog">
					<div class="modal-dialog">
					
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Update Doctor's Data</h4>
							</div>
							<div class="modal-body">
								<form role="form" action="edit.php" method="POST">

								<?php
									$id = $row['id_pasien']; 
									$query_edit = mysqli_query($connect,"SELECT * FROM data_kunjungan_pasien WHERE id_pasien='$id'");
									//$result = mysqli_query($conn, $query);
									while ($data = mysqli_fetch_array($query_edit)) {  
								?>
					
					
									<div class="form-group">
									<label>Patient's ID</label>
									<input type="text" name="id" class="form-control" readonly value="<?php echo $data['id_pasien']; ?>">      
									</div>
									
									<div class="form-group">
									<label>Name</label>
									<input type="text" name="nama" class="form-control" readonly value="<?php echo $data['nama_pasien']; ?>">      
									</div>
									
									<div class="form-group">
									<label>Diagnosa</label>
									<textarea type="text" name="diagnosa" class="form-control"></textarea>
									</div>
									
									<div class="form-group">
									<label>Tindakan</label>
									<textarea type="text" name="tindakan" class="form-control"></textarea>      
									</div>
									
									<div class="form-group">
									<label>Resep Obat</label>
									<textarea type="text" name="resep" class="form-control"></textarea>
									</div>
					
									<div class="modal-footer">  
									<button type="submit" class="btn btn-success">Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
					
								<?php 
									}
					
								//mysql_close($host);
								?>        
								</form>
					
							</div>
						
						</div>
					
					</div>
					</div>
					<div class="example-modal">
                        <div id="deleteuser<?php echo $row['id_pasien']; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Confirmation</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Sure to delete data of Doctor with id <?php echo $row['id_pasien'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="delete.php?act=deleteuser&id=<?php echo $row['id_pasien']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                     </div>
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