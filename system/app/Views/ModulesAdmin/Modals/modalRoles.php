  <div class="modal fade" id="modalRol">
  	<div class="modal-dialog">
  		<div class="modal-content">
  			<div class="modal-header headerRegistrer">
  				<h4 class="modal-title text-white" id="titleModal">Nuevo Rol</h4>
  				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  					<span aria-hidden="true">&times;</span>
  				</button>
  			</div>
  			<div class="modal-body">
  				<form id="formRol">
  					<input type="hidden" name="idRol" id="idRol" value="">
  					<div class="form-group">
  						<label for="" class="control-label">Nombre</label>
  						<input type="text" id="txtnombre" name="txtnombre" class="form-control"
  							onkeypress="return soloLetras(event);">
  					</div>
  					<div class="form-group">
  						<label for="" class="control-label">Descripcion</label>
  						<textarea type="text" rows="2" id="txtdescripcion" name="txtdescripcion" class="form-control"></textarea>
  					</div>
  					<div class="col-md-6 mb-6 statusRol">

  						<div class="invalid-feedback">
  							Please select a valid state.
  						</div>
  					</div>
  					<div class="modal-footer">
  						<!-- 
						se coloca un id al boton guardar para la accion y una etiqueta span para cambiar su texto
						de igual manera se le coloca al formulario un input hidden
						y un title modal para cambiar el texto del modal como el color de header

						 -->
  						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  						<button type="submit" id="btnActionForm" class="btn btn-primary"><span
  								id="btnText">Guardar</span></button>
  					</div>
  				</form>
  			</div>

  		</div>
  		<!-- /.modal-content -->
  	</div>
  	<!-- /.modal-dialog -->
  </div>