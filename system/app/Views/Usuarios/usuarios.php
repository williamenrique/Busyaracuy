<?php header_admin($data);
getModal('modalUsuario',$data);
?>

<!-- page content -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Home</a></li>
						<li class="breadcrumb-item">Usuarios</li>
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
							<h5 class="text-muted">Lista de usuarios registrados en el sistema</h5>
							<h3>
								<button type="button" class="btn btn-primary btn-sm mr-3" onclick="openModal()">
									<i class="fas fa-plus"></i>
									Agregar
								</button>
							</h3>
						</div>

						<div class="card-body">
							<table id="tableUser" class="data-table table stripe hover nowrap" style="width:100%">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">Nick</th>
										<th scope="col">Nombres</th>
										<th scope="col">Apellidos</th>
										<th scope="col">Email</th>
										<th scope="col">Telefono</th>
										<th scope="col">Rol</th>
										<th scope="col">Status</th>
										<th scope="col">Acciones</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>


						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
	</section>
	<!-- /.content -->
	<?php footer_admin($data)?>