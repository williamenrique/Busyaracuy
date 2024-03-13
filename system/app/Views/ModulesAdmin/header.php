<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="<?= IMG?>favicon (2).png">
	<title><?= $data['page_title']?></title>

	<link rel="stylesheet" href="<?= PLUGINS?>fontawesome-free/css/all.min.css">
	<!-- dataTable -->
	<link rel="stylesheet" href="<?= PLUGINS?>dataTableB5/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= PLUGINS?>dataTableB5/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="<?= PLUGINS?>dataTableB5/css/responsive.bootstrap.min.css">
	<!-- sweetalert -->
	<link rel="stylesheet" href="<?= PLUGINS?>sweetalert/sweetalert2.css">
	<!-- select -->
	<link rel="stylesheet" href="<?= PLUGINS?>bootstrap-select-1.13.14/css/bootstrap-select.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= PLUGINS?>overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= CSS?>style.admin.css">
	<link rel="stylesheet" href="<?= CSS_VENDORS?>adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a class="nav-link">
						<?= $data['page_tag']?>
					</a>
				</li>
			</ul>
			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-comments"></i>
						<span class="badge badge-danger navbar-badge">3</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= IMG?>default.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Brad Diesel
										<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">Call me whenever you can...</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="src/images/default.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										John Pierce
										<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">I got your message bro</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="src/images/default.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										Nora Silvester
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<p class="text-sm">The subject goes here</p>
									<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
					</div>
				</li>
				<!-- Notifications Dropdown Menu
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<i class="far fa-bell"></i>
						<span class="badge badge-warning navbar-badge">15</span>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<span class="dropdown-item dropdown-header">15 Notifications</span>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-envelope mr-2"></i> 4 new messages
							<span class="float-right text-muted text-sm">3 mins</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-users mr-2"></i> 8 friend requests
							<span class="float-right text-muted text-sm">12 hours</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<i class="fas fa-file mr-2"></i> 3 new reports
							<span class="float-right text-muted text-sm">2 days</span>
						</a>
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
					</div>
				</li>-->
				<? $_SESSION['userData']['user_nick']  ?>
				<li class="nav-item dropdown mr-2">
					<a class="nav-link" data-toggle="dropdown" href="#" style="font-size: 18px">
						<strong></strong>
					</a>
					<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
						<a href="<?= base_url()?>usuarios/perfil" class="dropdown-item" style="font-size: 18px">
							<i class="fas fa-user mr-4"></i>Perfil
						</a>
						<a href="<?= base_url()?>logout" class="dropdown-item" style="font-size: 18px">
							<i class="fas fa-sign-in-alt mr-4"></i>Salir
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index3.html" class="brand-link ">
				<img src="<?= IMG?>favicon (2).png " alt=" AdminLTE Logo" class="brand-image img-circle elevation-3"
					style="opacity: .8">
				<span class="brand-text font-weight-light ">AdminLTE 3</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex" data-toggle="tooltip" data-placement="bottom"
					title="Inf <?= $_SESSION['userData']['user_nick'].' '.$_SESSION['userData']['user_nombres']?>">
					<div class="image">
						<img src="<?= IMG?>default.png" class="img-circle elevation-3" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $_SESSION['userData']['user_nombres']?></a>
						<a href="#" class="d-block" style="font-size: 10px"><?= $_SESSION['userData']['user_email']?></a>
					</div>
				</div>

				<!-- SidebarSearch Form -->
				<div class="form-inline">
					<div class="input-group" data-widget="sidebar-search">
						<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-sidebar">
								<i class="fas fa-search fa-fw"></i>
							</button>
						</div>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
							with font-awesome or any other icon font library 
						-->
						<li class="nav-item dashboard">
							<a href="<?= base_url()?>dashboard" class="nav-link dashboard-link">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-item user-menu ">
							<a href="#" class="nav-link usuarios">
								<i class="nav-icon fas fa-user"></i>
								<p>Usuarios<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview ">
								<li class="nav-item link-roles roles">
									<a href="<?= base_url()?>roles" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Roles</p>
									</a>
								</li>
								<li class="nav-item link-user">
									<a href="<?= base_url()?>usuarios" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Usuarios</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item flota">
							<a href="<?= base_url()?>flota" class="nav-link flota-link">
								<i class="nav-icon fas fa-th"></i>
								<p>Flota</p>
							</a>
						</li>
						<li class="nav-item mant-menu ">
							<a href="#" class="nav-link mantenimiento">
								<i class="nav-icon fas fa-user"></i>
								<p>Mantenimiento<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview ">
								<li class="nav-item link-ingresar_mant ingresar_mant">
									<a href="<?= base_url()?>flota/ingresar_mant" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Ingresar</p>
									</a>
								</li>
								<li class="nav-item link-unidad_mant">
									<a href="<?= base_url()?>flota/unidad_mant" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>Und Mantenimiento</p>
									</a>
								</li>
							</ul>
						</li>
						<!-- <li class="nav-item unidad">
							<a href="<?= base_url()?>flota/unidad" class="nav-link unidad-link">
								<i class="nav-icon fas fa-th"></i>
								<p>Unidad<span class="right badge badge-danger">New</span></p>
							</a>
						</li> -->
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
				<!-- Sidebar Menu -->
				<?php // require_once 'aside.php'?>
				<!-- /.sidebar-menu -->
			</div>
			<div class="sidebar-custom d-flex justify-content-around">
				<a href="<?= base_url()?>usuarios/perfil" class="btn btn-link"><i class="fas fa-cogs text-white"></i></a>
				<a href="<?= base_url()?>logout" class="btn btn-link"><i class="fas fa-sign-out-alt text-white"></i></i></a>
			</div>
			<!-- /.sidebar-custom -->
			<!-- /.sidebar -->
		</aside>