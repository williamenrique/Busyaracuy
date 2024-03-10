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
                        <form id="formIngMantUnidad">
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
                                    <input type="text" class="form-control" placeholder="Ruta de la unidad" id="txtRutaUnidad" name="txtRutaUnidad" onkeypress="return soloLetras(event);">
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
                                <div class="col-auto statusRol form-check-inline">
                                    <div class="form-check ml-1">
                                        <input class="form-check-input" type="radio" name="radioTipo" id="preventivo" value="p" checked>
                                        <label class="form-check-label" for="preventivo">Preventivo</label>
                                    </div>
                                    <div class="form-check ml-2">
                                        <input class="form-check-input" type="radio" name="radioTipo" id="correctivo" value="c">
                                        <label class="form-check-label" for="correctivo">Correctivo</label>
                                    </div>
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Fecha entrada</label>
                                    <input type="date" class="form-control" placeholder="Fecha entrada" id="txtFechaEntrada" name="txtFechaEntrada">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="sr-only" for="inlineFormInputName">Hora entrada</label>
                                    <input type="text" class="form-control" placeholder="Hora entrada" id="txtHoraEntrada" name="txtHoraEntrada">
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
                            <button type="submit" id="btnActionForm" class="btn btn-primary btn-sm">
                                </i><span id="btnText">Ingresar mantenimiento</span>
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table stripe hover nowrap table-sm" id="tableMantenimiento" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">ENTRADA</th>
                                    <th scope="col">MECANICO</th>
                                    <th scope="col">KM</th>
                                    <th scope="col">TIPO</th>
                                    <th scope="col">DIAGNOSTICO</th>
                                    <th scope="col">RECOMENDACION</th>
                                    <th scope="col">SALIDA</th>
                                    <th scope="col">OPCIONES</th>
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