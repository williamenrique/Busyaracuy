<div class="modal fade" id="modalUser">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header headerRegistrer">
				<h4 class="modal-title text-white" id="titleModal">Nuevo Usuario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		
			<div class="modal-body">
				<form id="formUsuario" name="formUsuario" autocomplete="off">
					<input type="hidden" id="idUsuario" name="idUsuario" value="">
					<input type="hidden" id="opcionE" name="opcionE" value="">
					<input type="hidden" id="ingreso" name="ingreso" value="1">
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="txtIdentificacion">Identificacion</label>
							<input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion"
								onkeypress="return soloNumeros(event);">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="txtNombres">Nombres</label>
							<input type="text" class="form-control" id="txtNombres" name="txtNombres"
								onkeypress="return soloLetras(event);">
						</div>
						<div class="form-group col-md-6">
							<label for="txtApellidos">Apellidos</label>
							<input type="text" class="form-control" id="txtApellidos" name="txtApellidos"
								onkeypress="return soloLetras(event);">
						</div>
					</div>

					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="txtTlf">Telefono</label>
							<input type="text" class="form-control" id="txtTlf" name="txtTlf" onkeypress="return soloNumeros(event);">
						</div>
						<div class="form-group col-md-8">
							<label for="txtEmail">Email</label>
							<input type="email" class="form-control" id="txtEmail" name="txtEmail">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-4">
							<label for="listStatus">Status</label>
							<select id="listStatus" name="listStatus" class="selectpicker form-control"
								data-style="btn-outline-primary" data-size="5">
								<option value="1">Activo</option>
								<option value="2">Inactivo</option>
							</select>
						</div>
						<div class="form-group col-md-8">
							<label for="listRolId">Tipo Usuario</label>
							<select id="listRolId" data-live-search="true" name="listRolId" class="form-control"
								data-style="btn-outline-primary" data-size="5">
							</select>
						</div>
					</div>
					<button type="submit" id="btnActionForm" class="btn btn-primary"><span id="btnText">Guardar</span></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
				</form>
			</div>

		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>



<div class="modal fade" tabindex="-1" id="modalViewUser">
	<div class="modal-dialog ">
		<div class="modal-content bg-primary">
			<div class="modal-header">
				<h5 class="modal-title">Datos de <strong id="nickname"></strong></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card-body">
					<div class="row">
						<div class="col-6 mb-2">
							Identificacion : <span id="celIdentificacion"></span>
						</div>
						<div class="col-6 mb-2">
							Email : <span id="celEmail"></span>
						</div>
						<div class="col-6 mb-2">
							Nombres : <span id="celNombres"></span>
						</div>
						<div class="col-6 mb-2">
							Apellidos : <span id="celApellidos"></span>
						</div>
						<div class="col-6 mb-2">
							Telefono : <span id="celTelefono"></span>
						</div>
						<div class="col-6 mb-2">
							Cargo : <span id="celTipoUsuario"></span>
						</div>
						<div class="col-6 mb-2 d-flex">
							Etatus :
							<sapn class="col" id="celEstado"></sapn>
						</div>

					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-10">
							Fecha de Reg : <span id="celFechaReg"></span>
						</div>
						<div class="col-2">
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"
								style="cursor:pointer">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="d-flex justify-content-end align-content-end p-4">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div> -->
		</div>
	</div>
</div>