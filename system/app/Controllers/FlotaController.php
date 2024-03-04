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
	/****************************************
	 * funcion de listar todos las unidades
	 ***************************************/
	public function getFlota(){
		$arrData = $this->model->selectFlota();
		//provar que trae el array
		// dep($arrData[0]['rol_status']);exit();
		//recorrer el arreglo para colocara el status
		for ($i=0; $i < count($arrData) ; $i++) {
			if ($arrData[$i]['status_unidad'] == 1) {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-info" onClick="fntStatus(0,'.$arrData[$i]['id_flota'].')">Operativo</a>';
			}else {
				$arrData[$i]['status_unidad'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(1,'.$arrData[$i]['id_flota'].')">Inoperativo</a>';
			}
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	/****************************************
	 * funcion de listar todos las marcar de unidades
	 ***************************************/
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
	/****************************************
	 * funcion de listar todos los modelos de unidades
	 ***************************************/
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
	/***********************************
	 * cambiar estado de la unidad
	 */
	public function statusUnidad(){
		if($_POST){
			$status = intval($_POST['status']);
			$idUnidad = intval($_POST['idUnidad']);
			$requestStatus = $this->model->statusUnidad($idUnidad,$status);
			if($requestStatus){
				if($requestStatus == 1){
				$arrResponse = array('status' => true, 'msg' => 'Unidad Operativa', 'estado' => 1);
			}else if($requestStatus == 2){
				$arrResponse = array('status' => true, 'msg' => 'Unidad Desincorporada','estado' => 0);
			}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al cambiar status');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/****************************************
	 * funcion de guardar nuevo rol
	 * let intIdUnidad = document.querySelector('#idUnidad').value;
		let srtIdUnidad = document.querySelector('#txtIdUnidad').value;
		let srtMarcaUnidad = document.querySelector('#listMarcaUnidad').value;
		let srtModelo = document.querySelector('#listModelo').value;
		let srtFechaUnidad = document.querySelector('#txtFechaUnidad').value;
		let srtCapacidad = document.querySelector('#txtCapacidad').value;
		let srtTipoCombustible = document.querySelector('#txtTipoCombustible').value;
	 ***************************************/
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










	//prueba de insertar
	public function insertar(){
		$data = $this->model->setUser('Juan',25);
		print_r($data);
	}

	//metodo ver usuario
	public function verUsuario($id){
		$data = $this->model->getUser($id);
		print_r($data);
	}
	
	//metodo actualizar usuario
	public function actualizar(){
		$data = $this->model->updateUser(1,"Enrique",38);
		print_r($data);
	}
	//metodo ver usuarios
	public function verUser(){
		$data = $this->model->getUsers();
		print_r($data);
	}
		public function deleteUser($id){
		$data = $this->model->delUser($id);
		print_r($data);
	}

}