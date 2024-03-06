<?php header_admin($data)?>
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
                        <li class="breadcrumb-item"><a href="<?= base_url()?>dashboard">Flota</a></li>
						<li class="breadcrumb-item">Ingresar</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<!-- Main content -->
	<section class="content" id="edit">
		<div class="container-fluid">
            <div class="col-12">
                <!-- Default box -->
                <div class="card ">
                    <div class="card-header">
                        <form id="ing_mant_unidad">
                            <input type="hidden" name="idUnidad" id="idUnidad" value="">
                            <span id="title">Ingrese unidad a mantenimiento</span>
                            <div class="form-row align-items-center">
                                <div class="col-sm-2 my-1">
                                    <select id="listUnidad" data-live-search="true" name="listUnidad" class="form-control"
                                        data-style="btn-outline-primary" data-size="5">
                                    </select>
                                </div>
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Ruta de la unidad</label>
                                    <input type="text" class="form-control" placeholder="Ruta de la unidad" id="txtRutaUnidad" name="txtRutaUnidad">
                                </div>
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Operador</label>
                                    <input type="text" class="form-control" placeholder="Operador" id="txtOperador" name="txtOperador">
                                </div>
                                <div class="col-sm-3 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Mecanico</label>
                                    <input type="text" class="form-control" placeholder="Mecanico" id="txtMecanico" name="txtMecanico">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Km</label>
                                    <input type="text" class="form-control" placeholder="Kilometraje" id="txtKilometraje" name="txtKilometraje">
                                </div>
                                <div class="col-auto my-1 statusRol form-check-inline">
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radioStatus" id="status2" value="2" checked>
                                        <label class="form-check-label" for="status2">Preventivo</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radioStatus" id="status1" value="1">
                                        <label class="form-check-label" for="status1">Correctivo</label>
                                    </div>
                                </div>
                                <div class="col-sm-6 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Diagnostico</label>
                                    <input type="text" class="form-control" placeholder="Diagnostico" id="txtDiagnostico" name="txtDiagnostico">
                                </div>
                                <div class="col-sm-6 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Recomendacion</label>
                                    <input type="text" class="form-control" placeholder="Recomendacion" id="txtRecomendacion" name="txtRecomendacion">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table stripe hover nowrap table-sm" id="tableFlot" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">MARCA</th>
                                    <th scope="col">MODELO</th>
                                    <th scope="col">VIM</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">CAPACIDAD</th>
                                    <th scope="col">TIPO</th>
                                    <th scope="col">STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?php footer_admin($data)?>