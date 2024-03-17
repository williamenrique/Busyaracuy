<?php
class Flota extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'dashboard');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function flota(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Flota";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "flota";
		$data['page_link'] = "flota";
		$data['page_menu_open'] = "flota-menu";
		$data['page_link_acitvo'] = "link-flota";
		$data['page_functions'] = "function.flota.js";
		$this->views->getViews($this, "flota", $data);
	}
	/*******************funcion de listar todos las unidades para la tabla****************/
	public function getFlota(){
		$arrData = $this->model->selectFlota();
		//recorrer el arreglo para colocara el status
		for ($i=0; $i < count($arrData) ; $i++) {
			if ($arrData[$i]['status_unidad'] == 0) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-danger" onClick="fntStatus(0,'.$arrData[$i]['id_flota'].')">Desincorporado</a>';
			}
			if ($arrData[$i]['status_unidad'] == 1) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-success" onClick="fntStatus(1,'.$arrData[$i]['id_flota'].')">Operativo</a>';
			}
			if ($arrData[$i]['status_unidad'] == 2) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(2,'.$arrData[$i]['id_flota'].')">Mantenimiento</a>';
			}
			if ($arrData[$i]['status_unidad'] == 3) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-info" onClick="fntStatus(3,'.$arrData[$i]['id_flota'].')">Inoperativo</a>';
			}
			if ($arrData[$i]['status_unidad'] == 4) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(4,'.$arrData[$i]['id_flota'].')">Critca</a>';
			}
			$arrData[$i]['id_unidad'] ='<a href=flota/unidad/?unidad='.$arrData[$i]['id_flota'].' title="Ver">'.$arrData[$i]['id_unidad'].'</a>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	/************funcion de listar todos las marcar de unidades **************/
	public function getSelectMarca(){
		$htmlOptions = "";
		$arrData = $this->model->selectMarca();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['rol_id'].'">'.$arrData[$i]['rol_name'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	/*************funcion de listar todos los modelos de unidades**************/
	public function getSelectModelo(){
		$htmlOptions = "";
		$arrData = $this->model->selectModelos();
		if(count($arrData) > 0){
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['modelo_unidad'].'">'.$arrData[$i]['modelo_unidad'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	/*************cambiar estado de la unidad***************/
	public function statusUnidad(){
		if($_POST){
			$status = intval($_POST['status']);
			$idUnidad = intval($_POST['idUnidad']);
			$requestStatus = $this->model->statusUnidad($idUnidad,$status);
			if($requestStatus){
				if($requestStatus == 0){
				$arrResponse = array('status' => true, 'msg' => 'Unidad Desincorporada', 'estado' => 0);
				}else if($requestStatus == 1){
					$arrResponse = array('status' => true, 'msg' => 'Unidad Operativa','estado' => 1);
				}else if($requestStatus == 2){
					$arrResponse = array('status' => true, 'msg' => 'Unidad Inoperativa','estado' => 2);
				}else if($requestStatus == 3){
					$arrResponse = array('status' => true, 'msg' => 'Unidad a desincorporar','estado' => 3);
				}else if($requestStatus == 4){
					$arrResponse = array('status' => true, 'msg' => 'Unidad Mantenimiento','estado' => 4);
				}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al cambiar status');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/************funcion de guardar unidad en flota********************/
	public function setUnidad(){
		//almacenar los datos en variables
		$intIdUnidad = intVal($_POST['idUnidad']);
		$srtIdUnidad = $_POST["txtIdUnidad"];
		$srtMarcaUnidad = $_POST['listMarcaUnidad'];
		$srtModelo = $_POST["listModelo"];
		$srtVim = $_POST["txtVimUnidad"];
		$srtFechaUnidad = $_POST["txtFechaUnidad"];
		$srtCapacidad = $_POST["txtCapacidad"];
		$srtTipoCombustible = $_POST["txtTipoCombustible"];
		if($srtIdUnidad == "" || $srtMarcaUnidad == "" || $srtModelo == "" || $srtVim == "" || $srtFechaUnidad == "" || $srtCapacidad == "" || $srtTipoCombustible == ""){
			$arrResponse = array('status'=> false,'msg' => 'Debe llenar los campos'); 
		}else{
			$request_unidad = $this->model->insertUnidad($srtIdUnidad,$srtMarcaUnidad,$srtModelo, $srtVim,$srtFechaUnidad,$srtCapacidad,$srtTipoCombustible);
			$option = 1;
			if($request_unidad > 0){
				/********************************************************************************
					si es mayor a 0 indica que si se ejecuto el query 
				**********************************************************************************/
				$arrResponse = array('status'=> true,'msg' => 'Datos guardados correctamente'); 
			}else if($request_unidad == "exist"){
				$arrResponse = array('status'=> false,'msg' => '¡Atención esa unidad ya existe.'); 
			}else{
				$arrResponse = array('status'=> false,'msg' => '¡No es posible almacenar los datos.'); 
			}
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}
	/*********
	 * //invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
	 */
	public function ingresar_mant(){
		$data['page_tag'] = "Dashboard - mantenimiento";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "ingresar_mant";
		$data['page_link'] = "mantenimiento";
		$data['page_menu_open'] = "mant-menu";
		$data['page_link_acitvo'] = "link-ingresar_mant";
		$data['page_functions'] = "function.mant.js";
		$this->views->getViews($this, "ingresar_mant", $data);
	}
	/*********** funcion obtener unidades en mantenimiento*****************/
	public function listUnidadMantenimiento(){
		$arrData = $this->model->selectFlotaMantenimiento();
		//provar que trae el array
		// dep($arrData[0]['rol_status']);exit();
		//recorrer el arreglo para colocara el status
		for ($i=0; $i < count($arrData) ; $i++) {
			if ($arrData[$i]['tipo_mantenimiento'] == 'c') {
				$arrData[$i]['tipo_mantenimiento'] = '<span>Preventivo</a>';
			}else {
				$arrData[$i]['tipo_mantenimiento'] = '<span>Correctivo</span>';
			}
			if ($arrData[$i]['fecha_salida'] == '') {
				$arrData[$i]['fecha_salida'] = '<span>En espera</a>';
			}
			$arrData[$i]['opciones'] ='<div class="">
											<a href=unidad_mant/?unidad='.$arrData[$i]['id_flota'].' title="Ver"><i class="far fa-eye" aria-hidden="true"></i></a>
											<button type="button" class="btn btn-danger btn-sm btnDelUnidad" onClick="fntDelUnidad('.$arrData[$i]['id_flota'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</div>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	/***************funcion ingresar unidad a mantenimiento*****************/
	public function setIMantenimiento(){
		$intidUnidad = $_POST['idUnidad'];
		$srtListUnidad = $_POST['listUnidad'];
		$srtRutaUnidad = $_POST['txtRutaUnidad'];
		$srtOperador = $_POST['txtOperador'];
		$srtMecanico = $_POST['txtMecanico'];
		$srtKilometraje = $_POST['txtKilometraje'];
		$srtFechaEntrada = $_POST['txtFechaEntrada'];
		$srtHoraEntrada = $_POST['txtHoraEntrada'];
		$srtDiagnostico = $_POST['txtDiagnostico'];
		$srtRecomendacion = $_POST['txtRecomendacion'];
		$srtRadioTipo = $_POST['radioTipo'];
		if($srtListUnidad == "Seleccione Unidad" || $srtRutaUnidad == "" || $srtOperador == "" || $srtMecanico == "" || $srtKilometraje == "" || $srtFechaEntrada == "" || $srtHoraEntrada == "" || $srtDiagnostico == "" || $srtRecomendacion == ""){
			$arrResponse = array('status'=> false,'msg' => 'Debe llenar los campos');
		}else{
			$request_ingreso = $this->model->setIMantenimiento($srtListUnidad,$srtRutaUnidad,$srtOperador,$srtMecanico,$srtKilometraje,$srtRadioTipo,$srtFechaEntrada,$srtHoraEntrada,$srtDiagnostico,$srtRecomendacion);
			if($request_ingreso > 0 ){
				$arrResponse = array('status'=> true,'msg' => 'Unidad en mantenimiento');
			}else{
				$arrResponse = array('status'=> false,'msg' => 'Ah ocurrido un error');
			}
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}
	/*************funcion de listar todos los modelos de unidades ******************/
	public function getSelectUnidad(){
		$htmlOptions = "";
		$arrData = $this->model->selectUnidad();
		if(count($arrData) > 0){
			$htmlOptions .= '<option selected>Seleccione Unidad</option>';
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_flota'].'">'.$arrData[$i]['id_unidad'].'</option>';
			}
		}
		echo $htmlOptions;
		die();
	}
	/*********
	 * //invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
	 */
	public function unidad_mant(){
		$data['page_tag'] = "Dashboard - mantenimiento";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "unidad_mant";
		$data['page_link'] = "mantenimiento";
		$data['page_menu_open'] = "mant-menu";
		$data['page_link_acitvo'] = "link-unidad_mant";
		$data['page_functions'] = "function.mant.und.js";
		$this->views->getViews($this, "unidad_mant", $data);
	}
	/************funcion traer unidad en mantenimiento al activar el select para historial********************/
	/*revisar cuando veo una unidad en mantenimiento*/
	public function getUnidadMant(int $idFlota){
		$idFlota = intval($idFlota);
		if($idFlota > 0){
			$arrData = $this->model->selectUnidadHM($idFlota);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				// $arrResponse = array('status' => true, 'data' => $arrData);
				$htmlOptions = "";
				$arrResponse = array('status' => true, 'msg' => 'historial');
				for ($i=0; $i < count($arrData); $i++) {
					if($arrData[$i]['tipo_mantenimiento'] == "c"){
						$tipoMant = '<span class="badge badge-info">CORRECTIVO</span>';
					}else{
						$tipoMant  = '<span class="badge badge-info">PREVENTIVO</span>';
					}
												/*
													id_unidad
													id_unidad
													vim_unidad
													modelo_unidad
													ruta_unidad
													fecha_entrada
													operardor_unidad
													nomb_mecanico
													tipo_combustible
													km_unidad
													diagnostico
													recomendacion
													cap_pasajero
													fecha_creacion
													*/
					
					$htmlOptions .= '
								<div class="card ">
									<div class="card-header">
										<h3 class="card-title mr-2 accent-light" > <span id="unidad">'.$arrData[$i]['id_unidad'].'</span></h3>
										<h3 class="card-title mr-2 accent-light" > <span id="marca">'.$arrData[$i]['marca_unidad'].'</span>  </h3>
										<h3 class="card-title mr-2" > <span id="modelo">'.$arrData[$i]['vim_unidad'].'</span>  </h3>
										<h3 class="card-title mr-2" > <span id="vim">'.$arrData[$i]['modelo_unidad'].'</span></h3>
									</div>
									<div class="card-body">
										<form id="formUndMant">
											<div class="form-row align-items-center">
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">ENTRADA</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['fecha_entrada'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">OPERADOR</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['operardor_unidad'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">MECANICO</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['nomb_mecanico'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">Combustible</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['tipo_combustible'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">KM</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['km_unidad'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">RUTA</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['ruta_unidad'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">CAPACIDAD</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['cap_pasajero'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName">AÑO</label>
													<input type="text" class="form-control" disabled value="'.$arrData[$i]['fecha_creacion'].'">
												</div>
												<div class="col-sm-2 my-1">
													<label class="" for="inlineFormInputName"></label>
													'.$tipoMant.'
												</div>
												<div class="row">
													<div class="col-sm-6 my-1">
														<label class="" for="floatingTextarea2">Diagnostico</label>
														<input type="text" class="form-control" disabled   value="'.$arrData[$i]['diagnostico'].'"></input>
													</div>
													<div class="col-sm-6 my-1">
														<label class="" for="floatingTextarea2">Recomendacion</label>
														<input type="text" class="form-control" disabled  value="'.$arrData[$i]['recomendacion'].'"></input>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								';
				}
			}
			echo $htmlOptions;
			die();
		}
		die();
	}
	/************funcion de listar toda la flota en mantenimiento status 1 no repetidas en el select*********************/
	public function selectUnidadMantenimiento(){
		$htmlOptions = "";
		$arrData = $this->model->selectFlotaMantenimiento();
		if(count($arrData) > 0){
			$htmlOptions .= '<option selected>Seleccione Unidad</option>';
			for ($i=0; $i < count($arrData); $i++) { 
				$htmlOptions .= '<option value="'.$arrData[$i]['id_flota'].'">'.$arrData[$i]['id_unidad'].'</option>';
			}
		}else{
			$htmlOptions .= '<option value="0">No hay unidades</option>';
		}
		echo $htmlOptions;
		die();
	}
	/*********
	 * //invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
	 */
	public function unidad(){
		//invocar la vista con views y usamos getViews y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_title'] = "Unidad";
		$data['page_userImg'] = "usuario/default.png";
		$data['page_tag'] = "Unidad";
		$data['page_userNomb'] = "William Enrique";
		$data['page_userRol'] = "Administrador";
		$data['page_name'] = "unidad";

		$data['page_link'] = "unidad";
		$data['page_menu_open'] = "unidad-menu";
		$data['page_link_acitvo'] = "link-unidad";
		$data['page_functions'] = "function.unidad.js";
		$this->views->getViews($this, "unidad", $data);
	}
	/************obtener informacion de la unidad y mostrarla*********************/
	public function getUnidad(int $idUnidad){
		$idUnidad = intval($idUnidad);
		if($idUnidad > 0){
			$arrData = $this->model->selectUnidadID($idUnidad);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$arrResponse = array('status' => true, 'msg' => 'Datos de la unidad');
			}
		}
		echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		die();
	}
}