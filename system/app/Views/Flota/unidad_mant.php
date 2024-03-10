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
                <div class="card ">
                    <div class="card-header">
                        <?php
                        if(empty($_GET['unidad'])){?>
                            <span>esta vacio seleccione uno</span>
                            <div class="form-row align-items-center">
                                <div class="col-sm-2 my-1">
                                    <select id="listUndMant" data-live-search="true" name="listUndMant" class="form-control"
                                        data-style="btn-outline-primary" data-size="5">
                                    </select>
                                </div>
                            </div>
                        <?php
                        }else{
                        ?>
                        <input type="hidden" id="idUnidadM" value= "<?php echo $_GET['unidad']?>">
                    </div>
                    <div class="card-body">
                        <form id="formUndMant">
                            <div class="form-row align-items-center">
                                <div class="col-sm-2 my-1">
                                    <label class="" for="inlineFormInputName">ID UNIDAD</label>
                                    <input type="text" class="form-control" disabled placeholder="Ruta de la unidad" id="txtIdFlota" name="txtIdFlota">
                                </div>
                                <div class="col-sm-3 my-1">
                                    <label class="" for="inlineFormInputName">Ruta de la unidad</label>
                                    <input type="text" class="form-control" placeholder="Ruta de la unidad" id="txtRutaUnidad" name="txtRutaUnidad">
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                        };
                    ?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<?php footer_admin($data)?>