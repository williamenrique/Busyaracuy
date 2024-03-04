<?php header_admin($data);
getModal('modalUsuario',$data);
?>

<!-- page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header mr-4">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url()?>usuarios">Usuarios</a></li>
						<li class="breadcrumb-item">Pendientes</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<!-- Default box -->
					<div class="card">
						<div class="card-header">
							<h5 class="text-muted">Lista de usuarios de alta en el sistema</h5>
						</div>
					</div>
				</div>

				<div class="card border-success mb-3 colRol" style="max-width: 18rem;">
					<form id="formRolAsignar">
						<input type="hidden" name="txtIdUser" id="txtIdUser" value="">
						<div class="card-header bg-transparent border-success">
							<h6 class="card-text text-success" id="cardText" style="font-size: 14px;">Presione asignar para un rol
							</h6>
						</div>
						<div class="card-body text-success">
							<div class="form-group getRoles">

							</div>
						</div>
					</form>
				</div>

			</div>

			<div class=" row box_user_pend">

			</div>
		</div>
	</section>

	<!-- /.content -->
	<?php footer_admin($data)?>