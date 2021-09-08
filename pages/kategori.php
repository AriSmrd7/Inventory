<?php 	
include '../component/config.php'; 

if(isset($_SESSION['email'])== 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
	header('Location: ../index.php'); 
}

include('../component/class_kategori.php');
$kategori = new kategori();
$kat = $kategori->tampil_data();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Cairo - Halaman Kategori</title>

    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
		
		<?php include '../component/menu.php' ?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
			<?php include '../component/header.php';?>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
					    <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Data Kategori</h2>
                                    <a class="au-btn au-btn-icon au-btn--blue" href="kategori_tambah.php">
                                        <i class="zmdi zmdi-plus"></i> Tambah
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-lg-12">
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
												<th width="3%">No</th>
                                                <th>Kategori</th>
												<th>Status</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
												if($kat==0){
													echo "<td colspan='5' class='text-center text-danger' >Tidak ada data.</td>";
												}
												else{
												$no = 1;
												foreach($kat as $row){
													?>
													<tr>
														<td><?php echo $no++; ?></td>
														<td><?php echo $row['nama']; ?></td>
														<?php
														if($row['status']=="Aktif"){
															$warna = "text-success";
														}else{
															$warna = "text-danger";
														}?>
														<td class="<?php echo $warna;?>"><?php echo $row['status']; ?></td>
														<td>
															<a class="btn btn-sm btn-success" href="kategori_edit.php?id=<?php echo $row['id_kategori']; ?>">
															<i class="fa fa-edit">Ubah</i></a>
															<a class="btn btn-sm btn-danger" href="kategori_hapus.php?del=<?php echo $row['id_kategori']; ?>" onclick="return confirm('Yakin Ingin Menghapus Data Ini?'); ">
															<i class="fa fa-trash">Hapus</i></a>
														</td>
													</tr>
													<?php 
												}
												}
												?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
						<br></br></br><br></br></br><br>
                        <div class="row">
							<?php include '../component/footer.php';?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../vendor/slick/slick.min.js">
    </script>
    <script src="../vendor/wow/wow.min.js"></script>
    <script src="../vendor/animsition/animsition.min.js"></script>
    <script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../js/main.js"></script>

</body>

</html>
<!-- end document-->
