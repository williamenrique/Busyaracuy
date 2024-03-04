<?php
class Usuarios extends Controllers{

	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
		parent::__construct();
	}
	public function usuarios(){
		$data['page_id'] = 4;
		$data['page_tag'] = "Usuarios";
		$data['page_title'] = "Dashboard - Usuarios";
		$data['page_name'] = "usuarios";
		$data['page_functions'] = "function.user.js";
		$data['page_menu'] = "usuarios";
		$data['page_link'] = "usuarios";
		$data['page_menu_open'] = "user-menu";
		$data['page_link_acitvo'] = "link-user";
		$this->views->getViews($this, "usuarios", $data);
	}

	public function setUser(){
		if($_POST){
			$idUser = intval($_POST['idUsuario']);
			$intIdentificacion = intval(strClean($_POST['txtIdentificacion']));
			$strTxtNombre = ucwords(strClean($_POST['txtNombres']));//convierte las primeras letras en mayusculas
			$strtxtApellidos = ucwords(strClean($_POST['txtApellidos']));//convierte las primeras letras en mayusculas
			$intTxtTlf = intval(strClean($_POST['txtTlf']));
			$strTxtEmail = strtolower($_POST['txtEmail']);//convierte todas las letras en minusculas
			$intListStatus = intval($_POST['listStatus']);
			$intlistRolId = intval($_POST['listRolId']);
			if(empty($_POST['txtIdentificacion']) || empty($_POST['txtNombres'] )|| empty($_POST['txtApellidos'] ) ||
				empty($_POST['txtTlf']) || empty($_POST['txtEmail']) || empty($_POST['listStatus']) || empty($_POST['listRolId'])) {
				$arrResponse = array("status" => false, "msg" => "Debe llenar los campos");
			}else{
				if($idUser == 0){
					/*********************
					crear una variable password si esta vacio se genera un password
					encriptada para que no sea vista
					*/
					$option = 1;
					//$strTxtPass = encryption(passGenerator());
					$strTxtPass = encryption(123456);
					//al generar el pass se envia al modelo
					$requestUser = $this->model->insertUser($intIdentificacion, $strTxtNombre, $strtxtApellidos, $intTxtTlf, $strTxtEmail,
					$intListStatus, $intlistRolId, $strTxtPass);
				}else{
					$option = 2;
					$requestUser = $this->model->updateRolUser($idUser,$intIdentificacion,$strTxtEmail,$intlistRolId);
				}
				//evaluamos el request
				if($requestUser > 0){
					if($option == 1){
						//relacionar un usuario con los roles al crearse nuevo rol es el asignado por el administrador
						$sqlUserRol = $this->model->setUserRol($requestUser,$intlistRolId);
						$arrResponse = array("status" => true, "msg" => "Se a creado el usuario");
						//opcion para actualizar el nick al crearse el usuario
						$userNIck = substr($strTxtNombre,0,1).substr($strtxtApellidos,0,1).'-0'.$requestUser;
						$fileBase = "system/app/Views/Docs/". $userNIck . "/";
						//$fileHash = substr(md5($fileBase . uniqid(microtime() . mt_rand())), 0, 8);
						// creo carpeta en servidor si no existe
						if (!file_exists($fileBase))
						mkdir($fileBase, 0777, true);
						$createNick= $this->model->createNick($requestUser, $intIdentificacion,$strTxtEmail, $userNIck,$intlistRolId,$fileBase);
					}else{
						$arrResponse = array("status" => true, "msg" => "Cambio de rol exitoso");
					}
				}else if($requestUser == 'exist'){
					$arrResponse = array("status" => false, "msg" => "Atencion! email o identificacion ya existe ingrese otro");
				}else{
					$arrResponse = array("status" => false, "msg" => "Atencion! imposible almacenar datos");
				}
			}
		echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/**************************
	 * funcion para llamar a los usuarios
	 *************************/
	public function getUsers(){
		$arrData = $this->model->selectUsers();
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['rol_name'] = '<a style="font-size: 15px; cursor:pointer" onclick="fntEditUser('.$arrData[$i]['user_id'].')">'.$arrData[$i]['rol_name'].'</a>';
			if ($arrData[$i]['user_status'] == 1) {
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-info" onClick="fntStatus(2,'.$arrData[$i]['user_id'].')">Activo</a>';
			}else{
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-warning" onClick="fntStatus(1,'.$arrData[$i]['user_id'].')">Inactivo</a>';
			}
			$arrData[$i]['opciones'] ='<div class="">
																	<button type="button" class="btn btn-secondary btn-sm btnViewUser" onClick="fntViewUser('.$arrData[$i]['user_id'].')" title="Ver"><i class="far fa-eye" aria-hidden="true"></i></button>
																	<button type="button" class="btn btn-danger btn-sm btnDelUser" onClick="fntDelUser('.$arrData[$i]['user_id'].')" title="Eliminar"><i class="fa fa-trash" aria-hidden="true"></i></button>
																</div>';
		}
		//convertir el arreglo de datos en un formato json
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}
	//obtener datos de un usuario
	public function getUser(int $idUserI){
		$idUser = intval($idUserI);
		if($idUser > 0){
			$arrData = $this->model->selectUser($idUser);
			if(empty($arrData)){
				$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
			}else{
				$fecha = array('fecha_reg'=> formatear_fecha($arrData['fechaRegistro']));
				$data = $arrData + $fecha;
				$arrResponse = array('status' => true, 'data' => $data);
			}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	//eliminar usuario
	public function delUser(){
		if($_POST){
			$idUser = intval($_POST['idUser']);
			$requestDel = $this->model->deleteUser($idUser);
			if($requestDel){
				$arrResponse = array('status' => true, 'msg' => 'Usuario eliminado');
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	//deshabilitar usuario
	public function statusUser(){
		if($_POST){
			$statusUser = intval($_POST['status']);
			$idUser = intval($_POST['idUser']);
			$requestStatus = $this->model->statusUser($idUser,$statusUser);
			if($requestStatus){
				if($requestStatus == 1){
				$arrResponse = array('status' => true, 'msg' => 'Usuario Habilitado', 'estado' => 1);
			}else if($requestStatus == 2){
				$arrResponse = array('status' => true, 'msg' => 'Usuario Deshabilitado','estado' => 2);
			}
			}else{
				$arrResponse = array('status' => false, 'msg' => 'Error al cambiar status');
			}
			echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
		}
		die();
	}
	/*******************************************************************************************************************
	 * Nuevo modulo de perfil
	 * para cargar los datos del usuario en el perfil
	 */
	public function perfil(){
		$data['page_tag'] = "Perfil";
		$data['page_title'] = "Dashboard - Perfil Usuarios";
		$data['page_name'] = "perfil";
		$data['page_menu'] = "";
		$data['page_link'] = "usuario";
		$data['page_menu_open'] = "";
		$data['page_link_acitvo'] = "";
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "perfil", $data);
	}
	/**********
	 * actualizar perfil del usuario
	 */
	public function UpdatePerfil(){
		if($_POST){
			//validamos si no existe algun valor
			if($_POST['opcion'] == 1){
				if(empty($_POST['textNombres']) || empty($_POST['textApellidos'] ) || empty($_POST['textTlf'])) {
					$arrResponse = array("status" => false, "msg" => "Datos Incorrectos");
				}else{
					$idUser = intval($_POST['textId']);
					$strTxtNombre = ucwords($_POST['textNombres']);//convierte las primeras letras en mayusculas
					$strtxtApellidos = ucwords($_POST['textApellidos']);//convierte las primeras letras en mayusculas
					$intTxtTlf = intval($_POST['textTlf']);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = "a";
					$intOption = 1;
					$strTxtPass = "a";
					$filebase = "a";
					$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick ,$intOption,$filebase);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Datos actualizados correctamente");
						sessionUser($_SESSION['idUser']);
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar ls datos");
					}
				}
			}else	
			if($_POST['opcion'] == 2){
				if(empty($_POST['textNick'])) {
					$arrResponse = array("status" => false, "msg" => "Campo nick debe llenarlo");
				}else{
					$idUser = intval($_POST['textId']);
					$strTxtNombre = ucwords('a');//convierte las primeras letras en mayusculas
					$strtxtApellidos = ucwords('a');//convierte las primeras letras en mayusculas
					$intTxtTlf = intval(1);
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = $_POST['textNick'];
					$intOption = 2;
					$strTxtPass = "a";
					$filebase = "a";
				echo	$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick, $intOption,$filebase);
					
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Cambio de usuario correcto");
						sessionUser($_SESSION['idUser']);
					}else if($requestUser == "exist"){
						$arrResponse = array("status" => false, "msg" => "Usuario seleccionado ya esta en uso");
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar los datos");
					}
				}
			}else	if($_POST['opcion'] == 3){
				if(empty($_POST['textPassConfirm'])) {
					$arrResponse = array("status" => false, "msg" => "Clave no puede estar vacia");
				}else if($_POST['textPass'] == $_POST['textPassConfirm']){
					$idUser = intval($_POST['textId']);
					$strTxtNombre = "a";//convierte las primeras letras en mayusculas
					$strtxtApellidos = "a";//convierte las primeras letras en mayusculas
					$intTxtTlf = 1;
					$strTxtEmail = strtolower($_POST['textEmail']);//convierte todas las letras en minusculas
					$strTxCi = $_POST['textCi'];
					$strTxtNick = "a";
					$intOption = 3;
					$fileBase= "a";
					$strTxtPass = encryption($_POST['textPassConfirm']) ;
					$requestUser = $this->model->updatePerfil($idUser, $strTxtNombre, $strtxtApellidos, $intTxtTlf,$strTxCi,$strTxtEmail, $strTxtPass, $strTxtNick, $intOption,$fileBase);
					//comprovamos la existencia del usuario si no se actualiza correctamente
					if($requestUser > 0){
						$arrResponse = array("status" => true, "msg" => "Cambio de password correctamente");
					}else{
						$arrResponse = array("status" => false, "msg" => "No es posible almacenar los datos");
					}
				}else{
					$arrResponse = array("status" => false, "msg" => "Claves no coinciden");
				}
			}
			// sessionUser($_SESSION['idUser']);
			//convertir los datos en una array JSON para poder leerlos en javascript
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	/*******************************************************************************************************************
	 * Nuevo modulo para cargar los usuarios de alta
	 */
	public function alta(){
		$data['page_title'] = "Dashboard - Usuarios de alta";
		$data['page_tag'] = "Usuarios de alta";
		$data['page_name'] = "alta";
		// $data['page_menu'] = "alta";
		$data['page_menu_open'] = "usuario";//abrir el menu
		$data['page_link'] = "usuarios";//activar el menu
		$data['page_link_acitvo'] = "link-alta";//link activo submenu
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "alta", $data);
	}

	// cargar usuarios
	public function getUserHigh(){
		$arrData = $this->model->selectUsersHigh();
		for ($i=0; $i < count($arrData) ; $i++) {
			$arrData[$i]['rol_name'] = '<a style="font-size: 15px; cursor:pointer" onclick="fntEditUser('.$arrData[$i]['user_id'].')">'.$arrData[$i]['rol_name'].'</a>';
			if ($arrData[$i]['user_status'] == 0) {
				$arrData[$i]['user_status'] = '<a style="font-size: 15px; cursor:pointer" class="badge badge-secondary" onClick="fntStatus(1,'.$arrData[$i]['user_id'].')">Dado de baja</a>';
			}
		}
		echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
		die();
	}

	/*******************************************************************************************************************
	 * Nuevo modulo para cargar los usuarios de alta
	 */
	public function pendiente(){
		$data['page_title'] = "Dashboard - Usuarios pendientes";
		$data['page_tag'] = "Usuarios pendientes";
		$data['page_name'] = "pendiente";
		$data['page_menu_open'] = "usuario";//abrir el menu
		$data['page_link'] = "usuarios";//activar el menu
		$data['page_link_acitvo'] = "link-pendiente";//link activo submenu
		$data['page_functions'] = "function.user.js";
		$this->views->getViews($this, "pendiente", $data);
	}

	public function getUserPend(){
		$arrData = $this->model->selectUsersPend();
		$htmlOptions = "";
		$cargo = "";
		if(!empty($arrData)){

			foreach ($arrData as $key) {
				$nick = "'{$key['user_nick']}'";
				$htmlOptions .= '
												<div class="col-lg-3 col-6">
													<form id="formActivar">
														<input type="hidden" name="idUser" value="'.$key['user_id'].'">
														<div class="small-box bg-info">
															<div class="inner">
																<h6>'.$key['user_nombres'].' <strong>'.$key['user_nick'].'</strong></h6>
																<ul>
																	<li>Estado <span class="badge badge-warning">Pendiente</span></li>
																		<li>Cargo <span class="badge badge-danger" style="cursor:pointer" onclick="cargarRol('.$nick.','.$key['user_id'].')">'.$key['rol_name'].'</span></li>
																</ul>
															</div>
															<span class="ml-2" style="font-size: 10px">'.formatear_fecha($key['user_registro']).'</span>
															<div class="icon">
																<i class="ion ion-bag"></i>
															</div>
															<a href="#" class="small-box-footer" onclick="fntActivarUser('.$key['user_id'].')">Activar<i class="fas fa-arrow-circle-right ml-2"></i></a>
														</div>
													</form>
												</div>';
			}
		}else{
			$htmlOptions .='<div class="alert">No hay usuarios pendientes</div>';
		}
		echo $htmlOptions;
		die();
	}
	//obtener roles y colocarlos en radio pa ra asignarlo al usuario pendiente
	public function getRoles(){
		$arrData = $this->model->selectRoles();
		$htmlOptions = "";
		if(!empty($arrData)){
			foreach ($arrData as $key) {
				$htmlOptions .= '
												<div class="custom-control custom-radio">
													<input class="custom-control-input" type="radio" id="'.$key["rol_name"].'" name="radioRol" value="'.$key["rol_id"].'" >
													<label for="'.$key["rol_name"].'" class="custom-control-label">'.$key["rol_name"].'</label>
												</div>
												';
			}
			$htmlOptions .= '	</div>
											</div>
												<div class="card-footer bg-transparent border-success">
													<button type="submit" class="btn btn-primary mt-2 btnAsignar">Asignar</button>
												</div>
											</form>
										';
		}else{
			$htmlOptions .='<div class="alert alert-primary" role="alert">no hay usuarios pendientes</div>';
		}
		echo $htmlOptions;
		die();
	}
	/******
	 * funcion para asignar rol al usuario antes de activarlo
	 */
	public function asignarRol(){
		if($_POST){
			$idUser = intval($_POST['txtIdUser']);
			if(!isset($_POST['radioRol'])){
				$arrResponse = array("status" => false, "msg" => "Debe seleccionar un rol");
			}else{
				$radioRol = intval($_POST['radioRol']);
				if(!empty($idUser)){
					$request = $this->model->asignarRol($idUser,$radioRol);
					if($request){
						$arrResponse = array("status" => true, "msg" => "Rol asignado");
					}
				}else{
					$arrResponse = array("status" => false, "msg" => "A ocurrido un error");
				}
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}

	public function activarUser(){
		if($_POST){
			$idUser = intval($_POST['idUser']);
			if(!empty($idUser)){
				$request = $this->model->activarUser($idUser);
				if(!empty($request)){
					if($request['id_rol'] == 2){
						$arrResponse = array("status" => false, "msg" => "Debe asignarle un rol");
					}else{
						$status = $this->model->statusUser($idUser,1);
						if($status == 1){
							$arrResponse = array("status" => true, "msg" => "Usuario activado");
						}else{
							$arrResponse = array("status" => false, "msg" => "Hubo un error");
						}
					}
				}else{
					$arrResponse = array("status" => false, "msg" => "Error con el servidor");
				}
			}else{
				$arrResponse = array("status" => false, "msg" => "A ocurrido un error");
			}
			echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
		}
		die();
	}
}