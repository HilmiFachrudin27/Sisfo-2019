<!DOCTYPE html>
<html>
<head>
	<title>PEMESANAN BARANG PT.SUDATAMA</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Custom fonts for this template-->
	<link href="<?php echo base_url()?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Bootstrap core JavaScript-->
	<script src="<?php echo base_url()?>vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url()?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="<?php echo base_url()?>vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="<?php echo base_url()?>js/sb-admin-2.min.js"></script>

	<!-- Custom styles for this template-->
	<link href="<?php echo base_url()?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">PT.SUDATAMA</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="index.html">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading -->
				<div class="sidebar-heading">
					Interface
				</div>

				<li class="nav-item active">
					<a class="nav-link" href="#1">
						<i class="fas fa-fw"></i>
						<img src="<?php echo base_url()?>assets/report.png">
						<span>Pesan barang</span></a>
					</li>


					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url('index.php/pesan_barang_controller/cart')?>">
							<i class="fas fa-fw"></i>
							<img src="<?php echo base_url()?>assets/cart.png">
							<span>Cart</span></a>
						</li>

						<!-- Divider -->
						<hr class="sidebar-divider d-none d-md-block">

						<!-- Sidebar Toggler (Sidebar) -->
						<div class="text-center d-none d-md-inline">
							<button class="rounded-circle border-0" id="sidebarToggle"></button>
						</div>

					</ul>

					<!-- Content Wrapper -->
					<div id="content-wrapper" class="d-flex flex-column">

						<!-- Main Content -->
						<div id="content">

							<!-- Topbar -->
							<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

								<!-- Sidebar Toggle (Topbar) -->
								<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
									<i class="fa fa-bars"></i>
								</button>


								<div class="topbar-divider d-none d-sm-block"></div>
								<ul class="navbar-nav ml-auto">
									<!-- Nav Item - User Information -->
									<li class="nav-item dropdown no-arrow">
										<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<span class="mr-2 d-none d-lg-inline text-gray-600 small">IF-40-08</span>
											<img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
										</a>
										<!-- Dropdown - User Information -->
										<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
											<a class="dropdown-item" href="#">
												<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
												Profile
											</a>
											<a class="dropdown-item" href="#">
												<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
												Settings
											</a>
											<a class="dropdown-item" href="#">
												<i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
												Activity Log
											</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
												<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
												Logout
											</a>
										</div>
									</li>
								</ul>
							</nav>
							<div class="container-fluid">
								<div class="d-sm-flex align-items-center justify-content-between mb-4">
									<h1 class="h3 mb-0 text-gray-800">SISTEM PEMESANAN BARANG</h1>
								</div>

								<!-- content -->
								<div class="row">
									<form action="<?php echo base_url('/index.php/pesan_barang_controller/pesan/'); ?>" method="POST" class="col-6">
										<div class="form-group">
											Nama pemesan:  
											<input type="text" name="uname" class="form-control" style="margin-bottom: 5%;"  value="PT.haha" readonly>	
										</div>
										<div class="form-group">
											Alamat pemesan:   
											<input type="text" name="address" class="form-control" style="margin-bottom: 5%;" value="PT.haha" readonly>	
										</div>
										<div class="form-group">
											Tanggal barang dibutuhkan:   
											<input type="Date" name="tgl" class="form-control" placeholder="masukkan tanggal" style="margin-bottom: 5%;" required>	
										</div>
										<div class="pesan-barang" id="pesan_1" style="display: inline;">
											<div class="form-group">
												<label for="sel1">Nama barang:</label>
												<select class="form-control dropdown" id="sel1" name="brg" required>
													<option>-Pilih-</option>
													<option value="brg-01">Kabel</option>
													<option value="brg-02">RJ-45</option>
													<option value="brg-03">Monitor</option>
													<option value="brg-04">Router</option>
												</select>
											</div>
											<br>

											Jumlah barang: 
											<input type="text" name="jml" class="form-control" style="margin-bottom: 5%;" placeholder="masukkan jumlah barang" required>

										</div>
										<button class="btn btn-primary" type="submit" style="margin-left: 19%; margin-bottom: 5%;">Checkout</button>
									</form>
								</div>

							</div>
						</div>
					</div>
				</body>