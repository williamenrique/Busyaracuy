<?php
class UsuariosModel extends Mysql {
	private $intIdentificacion;
	private $intIdUser;
	private $strTxtNombre;
	private $strtxtApellidos;
	private $intTxtTlf;
	private $strTxtEmail;
	private $intListStatus;
	private $intlistRolId;
	private $strTxtPass;
	private $strToken;
	private $strNick;
	private $strTxtNick;
	private $intOption;
	private $intStatus;
	private $fileBase;
	private $intRol;
	public function __construct(){
		parent::__construct();
	}
	/*********************
	 * funcion de insertar usuario en la DB
	 *********************/
	public function insertUser(int $intIdentificacion, string $strTxtNombre,string $strtxtApellidos,int $intTxtTlf, string	$strTxtEmail, int 	$intListStatus,int $intlistRolId,string $strTxtPass){
		$this->intId =  $intIdentificacion;
		$this->strTxtNombre =  $strTxtNombre;
		$this->strtxtApellidos =  $strtxtApellidos;
		$this->intTxtTlf =  $intTxtTlf;
		$this->strTxtEmail =  $strTxtEmail;
		$this->intListStatus =  $intListStatus;
		$this->intlistRolId =  $intlistRolId;
		$this->strTxtPass =  $strTxtPass;
		$this->strImg = "default.png";
		$return = 0;
		//consultar si existe
		$sql = "SELECT * FROM table_user WHERE  user_email = '{$this->strTxtEmail}' or  user_ci = {$this->intId}";
		$request = $this->select_all($sql);
		//si no encontro ningun resultado insertamos el usuario
		if(empty($request)){
			$queryInsert = "INSERT INTO table_user(user_ci,user_nombres,user_apellidos, user_tlf,user_email,user_status,user_img, user_rol,user_pass) VALUES(?,?,?,?,?,?,?,?,?)";
			$arrData = array($this->intId,$this->strTxtNombre,$this->strtxtApellidos,$this->intTxtTlf,$this->strTxtEmail,$this->intListStatus,$this->strImg,$this->intlistRolId,$this->strTxtPass);
			$requestInsert = $this->insert($queryInsert,$arrData);
			//almacenar errores
			// $pagina_error = $_SERVER['PHP_SELF']. addslashes($requestInsert);
			// $usuario = $_SESSION['userData']['user_id'];

			// $sqlLog = "INSERT INTO table_log(log_idUser,log_descripcion,log_comando) VALUES(?,?,?)";
			// $arrDataLog = array($usuario,$pagina_error,$queryInsert);
			// $log = $this->insert($sqlLog,$arrDataLog);
			$return = $requestInsert;
		}else{
			//si no viene vacia es que ya existe un registro
			$return = "exist";
		}
		return $return;
	}
	/**
	 * crear el usuario desde admin al ingresar un nuevo empleado
	 *
	 */
	public function createNick(int $intIdUser,int $intIdentificacion,string $strTxtEmail, string $strTxtNick,int $intlistRolId,string $fileBase ){
		$this->intIdUser = $intIdUser;
		$this->strTxtEmail = $strTxtEmail;
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtNick = $strTxtNick;
		$this->intlistRolId = $intlistRolId;
		$this->fileBase = $fileBase;
		$sql = "SELECT * FROM table_user WHERE user_id = $this->intIdUser";
		$request = $this->select_all($sql);
		if(!empty($request)){
			$sql = "UPDATE table_user SET  user_nick = ?, user_ruta = ? WHERE user_id = $this->intIdUser AND user_ci = $this->intIdentificacion";
			$arrData = array($this->strTxtNick,$this->fileBase);
			$request = $this->update($sql,$arrData);
			$insertRol = "INSERT INTO table_user_rol(user_nick,id_rol) VALUES(?,?)";
			$arrDataRol = array($this->strTxtNick,$this->intlistRolId);
			$Rol = $this->insert($insertRol,$arrDataRol);
		}else{
			$request = "error";
		}
		return $request;
	}
	/*********************
	 * funcion de cargar usuario de la DB
	 *********************/
	public function selectUsers(){
		@session_start();
		$sql = "SELECT p.user_id, p.user_nick,p.user_nombres,p.user_apellidos,p.user_tlf,
		p.user_email, p.user_status,rol.rol_id,rol.rol_name
					FROM table_user p
					JOIN table_user_rol r
					JOIN table_roles rol
					WHERE
					p.user_nick = r.user_nick AND
					r.id_rol = rol.rol_id AND
					p.user_status != 0 AND p.user_id != {$_SESSION['userData']['user_id']}";
		$request = $this->select_all($sql);
		return $request;
	}
	/*************
	 * seleccionar usuario
	 */
	public function selectUser(int $idUser){
		$this->intIdUser = $idUser;
		$sql = "SELECT  p.user_ci,p.user_nick, p.user_id,p.user_nombres,p.user_pass,p.user_apellidos,p.user_tlf,p.user_email, p.user_status,r.rol_id,r.rol_name, DATE_FORMAT(p.user_registro,'%d-%m-%Y') as fechaRegistro FROM table_user p INNER JOIN table_roles r ON p.user_rol = r.rol_id WHERE p.user_id = $this->intIdUser";
		$request = $this->select($sql);
		return $request;
	}
	/*************
	 * cambiar  rol
	 */
	public function updateRolUser(int $intIdUser, int $intIdentificacion, string $strTxtEmail ,int $intlistRolId){
		$this->intIdUser = $intIdUser;
		$this->intIdentificacion = $intIdentificacion;
		$this->intlistRolId = $intlistRolId;
		$this->strTxtEmail = $strTxtEmail;
		$sql = "SELECT * FROM table_user WHERE (user_email = '{$this->strTxtEmail}' AND user_id = $this->intIdUser) OR (user_ci = $this->intIdentificacion AND user_id = $this->intIdUser)";
		$request = $this->select_all($sql);
		if(!empty($request)){
			$sql = "UPDATE table_user SET user_rol = ? WHERE user_id = $this->intIdUser";
			$arrData = array($this->intlistRolId);
			$request = $this->update($sql,$arrData);
		}else{
			$request = "error";
		}
		return $request;
	}
		/*************
	 * cambiar  datos de perfil
	 */
	public function updatePerfil(int $intIdUser,string $strTxtNombre,string $strtxtApellidos,int $intTxtTlf,int $intIdentificacion,string $strTxtEmail,string $strTxtPass, string $strTxtNick, int $intOption,string $fileBase){
		$this->intIdUser = $intIdUser;
		$this->strTxtNombre = $strTxtNombre;
		$this->strtxtApellidos = $strtxtApellidos;
		$this->intTxtTlf = $intTxtTlf;
		$this->strTxtEmail = $strTxtEmail;
		$this->intIdentificacion = $intIdentificacion;
		$this->strTxtPass = $strTxtPass;
		$this->strTxtNick = $strTxtNick;
		$this->intOption = $intOption;
		$this->fileBase = $fileBase;

		$sql = "SELECT * FROM table_user WHERE (user_email = '{$this->strTxtEmail}' AND user_id = $this->intIdUser) OR (user_ci = $this->intIdentificacion AND user_id = $this->intIdUser)";
		$request = $this->select($sql);
			if($this->intOption == 1){
				$sql = "UPDATE table_user SET  user_nombres = ?, user_apellidos = ?, user_tlf = ? WHERE user_id = $this->intIdUser AND user_ci = $this->intIdentificacion";
				$arrData = array(
					$this->strTxtNombre,
					$this->strtxtApellidos,
					$this->intTxtTlf
				);
			}else	if($this->intOption == 2){
				//comprovar que el usuario no exista
				$sqlNick = "SELECT * FROM table_user WHERE user_nick = '{$this->strTxtNick}'";
				$requestNick = $this->select($sqlNick);
				if($requestNick["user_nick"] == $this->strTxtNick){
					$request = "exist";
				}else{
					$sql = "UPDATE table_user SET  user_nick = ? WHERE user_id = $this->intIdUser AND user_ci = $this->intIdentificacion";
					$arrData = array($this->strTxtNick);
				}
			}else	if($this->intOption == 3){
				$sql = "UPDATE table_user SET  user_pass = ? WHERE user_id = $this->intIdUser AND user_ci = $this->intIdentificacion";
				$arrData = array($this->strTxtPass);
			}
			// echo $sql;
			$request = $this->update($sql,$arrData);
		return $request;
	}

	/*****************
	 * eliminar usuario
	 */
	public function deleteUser(int $intIdUser){
		$this->intIdUser = $intIdUser;
		$sql = "UPDATE table_user SET user_status = ? WHERE user_id = $this->intIdUser";
		$arrData = array(0);
		$request = $this->update($sql,$arrData);
		//almacenar errores
		$pagina_error = $_SERVER['PHP_SELF']. addslashes($request);
		$usuario = $_SESSION['userData']['user_id'];

		$sqlLog = "INSERT INTO table_log(log_idUser,log_descripcion,log_comando) VALUES(?,?,?)";
		$arrDataLog = array($usuario,$pagina_error,$sql);
		$log = $this->insert($sqlLog,$arrDataLog);
		return $request;
	}
	/*****************
	 * deshabilitar usuario
	 */
	public function statusUser(int $intIdUser, int $intStatus){
		$this->intIdUser = $intIdUser;
		$this->intStatus = $intStatus;
		$sql = "UPDATE table_user SET user_status = ? WHERE user_id = $this->intIdUser";
		$arrData = array($this->intStatus);
		$request = $this->update($sql,$arrData);
		if($this->intStatus == 1){
			$request = "1";
		}else{
			$request = "2";
		}
		return $request;
	}

	/***********
	 * obtener usuarios de alta
	 */
	public function selectUsersHigh(){
		@session_start();
		$sql = "SELECT p.user_id, p.user_nick,p.user_nombres,p.user_apellidos,p.user_tlf,p.user_email,p.user_registro, p.user_status,r.rol_name FROM table_user p INNER JOIN table_roles r ON p.user_rol = r.rol_id WHERE p.user_status = 0 ";
		$request = $this->select_all($sql);
		return $request;
	}

	/***
	 * obtener usuarios pendientes
	 */
	public function selectUsersPend(){
		// $sql = "SELECT p.user_id, p.user_nick,p.user_nombres,p.user_apellidos,p.user_tlf,p.user_email,p.user_registro, p.user_status ,p.user_rol FROM table_user p WHERE p.user_status = 3";
		$sql = "SELECT a.user_id,a.user_nombres,a.user_nick,a.user_registro,b.id_rol,c.rol_name
						FROM table_user a JOIN table_user_rol b
						JOIN table_roles c
						WHERE a.user_nick = b.user_nick AND
						b.id_rol = c.rol_id AND
						a.user_status = 3";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectRoles(){
		$sql = "SELECT * FROM table_roles WHERE rol_status = 1 AND rol_id != 2";
		$request = $this->select_all($sql);
		return $request;
	}
	public function activarUser(int $idUser){
		$this->idUser = $idUser;
		$sql = "SELECT  p.user_id, p.user_nick,p.user_nombres,
								p.user_apellidos,p.user_tlf,
								p.user_email,p.user_registro,
										p.user_status ,r.user_nick, r.id_rol
						FROM table_user p JOIN table_user_rol r
						WHERE p.user_nick = r.user_nick AND p.user_id = $this->idUser";
		$request = $this->select($sql);
		return $request;
	}

	public function asignarRol(int $intIdUser,int $intRol){
		$this->intRol = $intRol;
		$sql = "SELECT user_nick FROM table_user WHERE user_id = $intIdUser";
		$resp = $this->select($sql);
		if(!empty($resp)){
			$this->strTxtNick =$resp['user_nick'];
			$insertRol = "UPDATE table_user_rol SET id_rol = ? WHERE user_nick = '{$this->strTxtNick}'";
			$arrDataRol = array($this->intRol);
			$request = $this->update($insertRol,$arrDataRol);
		}else{
			$request ="error";
		}
		return $request;
	}
	//crear la relacion user y rol al crearlo y se ingresa en 0 para despues asignarle
	public function setUserRol(int $intIdUser,int $intRol){
		$this->intRol = $intRol;
		$sql = "SELECT user_nick FROM table_user WHERE user_id = $intIdUser";
		$resp = $this->select($sql);
		if(!empty($resp)){
			$insertRol = "INSERT INTO table_user_rol(user_nick,id_rol) VALUES(?,?)";
			$arrDataRol = array($resp['user_nick'],$this->intRol);
			$request = $this->insert($insertRol,$arrDataRol);
		}else{
			$request ="error";
		}
		return $request;
	}
}