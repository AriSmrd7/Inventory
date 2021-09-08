<?php 	
include '../component/config.php'; 

if(isset($_SESSION['email'])== 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
	header('Location: ../index.php'); 
}

include('../component/class_distribusi.php');
$distribusi = new distribusi();
$brg = $distribusi->showBarang();
$sup = $distribusi->showSupplier();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Cairo - Halaman Pengadaan</title>

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
                                    <h2 class="title-1">Distribusi Barang</h2>
                                    <a class="btn" href="distribusi.php">
                                        <i class="fa fa-angle-double-left"></i> Kembali ke Tabel Data
									</a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                        <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
									<br>
									<div class="col-lg-10">
                                        <form method="post" action="distribusi_proses.php?action=add" enctype="multipart/form-data" class="form-horizontal">
											<div class="row form-group">
                                                <div class="col col-md-5">
                                                    <label for="select" class=" form-control-label">Barang</label>
                                                </div>
                                                 <div class="col-8 col-md-5">
                                                    <select name="barang" id="select" class="form-control">
                                                        <option>-- Pilih barang --</option>
													<?php 
														foreach($brg as $row){ ?>
                                                        <option value="<?php echo $row['id_barang']; ?>"> <?php echo $row['nama_brg']; ?> </option>
													<?php }?>
                                                    </select>
                                                </div>
                                            </div>
											
											
         									<div class="row form-group">
                                                <div class="col col-md-5">
                                                    <label for="text-input" class=" form-control-label">Jumlah</label>
                                                </div>
                                                <div class="col-8 col-md-5">
                                                    <input type="text" id="text-input" name="jumlah" class="form-control">
                                                </div>
                                            </div>
											 <div class="row form-group">
                                                <div class="col col-md-5">
                                                    <label for="text-input" class=" form-control-label">Tanggal Pengadaan</label>
                                                </div>
                                                <div class="col-8 col-md-5">
                                                    <input type="text" disabled="" id="text-input" value="<?php echo date('d-m-Y');?>" class="form-control">
                                                    <input type="hidden" id="text-input" value="<?php echo date('d-m-Y');?>" name="tanggal" class="form-control">
                                                </div>
                                            </div>
											<br>
											<center>
											<div class="row form-group">
											    <div class="col-md-12">
													<button type="reset" class="btn btn-danger">
													<i class="fas fa-rotate-left"></i> Reset
													</button>
													&nbsp;&nbsp;
                                                    <button type="submit" name="tombol" class="btn btn-success">
													<i class="fas fa-plus"></i> Tambah
													</button>
												</div>
											</div>
											</center>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
