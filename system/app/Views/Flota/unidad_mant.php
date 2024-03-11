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
						<li class="breadcrumb-item">Flota</li>
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
            <?php
            if(empty($_GET['unidad'])){?>
                <div class="card">
                    <div class="card-header">
                        <span>Seleccione una unidad</span>
                        <div class="form-row align-items-center">
                            <div class="col-sm-2 my-1">
                                <select id="listUndMant" data-live-search="true" name="listUndMant" class="form-control"
                                    data-style="btn-outline-primary" data-size="5">
                                </select>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="div historial"></div>
                
                    <?php
                    }else{
                    ?>
                <div class="card ">
                    <div class="card-header">
                        <input type="hidden" id="idUnidadM" value= "<?php echo $_GET['unidad']?>">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title accent-light" > <span id="unidad"></span></h3>
                        <h3 class="card-title accent-light" > <span id="marca"></span> - </h3>
                        <h3 class="card-title" > <span id="modelo"></span> - </h3>
                        <h3 class="card-title" > <span id="vim"></span></h3>
                        <form id="formUndMant">
                            <div class="form-row align-items-center">
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">ENTRADA</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtFechaEntrada" name="txtFechaEntrada">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">OPERADOR</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtOperador" name="txtOperador">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">MECANICO</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtMecanico" name="txtMecanico">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">Combustible</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtCombustible" name="txtCombustible">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">KM</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtKM" name="txtKM">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">RUTA</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtRutaUnidad" name="txtRutaUnidad">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">CAPACIDAD</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtCapacidad" name="txtCapacidad">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">AÑO</label>
                                    <input type="text" class="form-control" disabled placeholder="" id="txtCreacion" name="txtCreacion">
                                </div>
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName"></label>
                                    <h4 id="tipoMant" class="my-2"></h5>
                                </div>
                                <div class="row">
                                <div class="col-sm-6 my-1">
                                    <label class="" for="floatingTextarea2">Diagnostico</label>
                                    <textarea class="form-control" disabled placeholder="Diagnostico" style="height: 50%" id="txtDiagnostico" name="txtDiagnostico"></textarea>
                                </div>
                                <div class="col-sm-6 my-1">
                                    <label class="" for="floatingTextarea2">Recomendacion</label>
                                    <textarea class="form-control" disabled placeholder="Recomendacion" style="height: 50%" id="txtRecomendacion" name="txtRecomendacion"></textarea>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                    };
                ?>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->
<?php footer_admin($data)?>