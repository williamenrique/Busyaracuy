<?php
class FlotaModel extends Mysql {

	//establecemos variables para definir un rol
	public $strId;
	public $strRol;
	public $strDescripcion;
	public $intStatus;
	public $intIdRol;

	public function __construct(){
	//heradar la clase padre 
		parent::__construct();
	}
	//funcion para traer todos los flota
	public function selectFlota(){
		#$sql = "SELECT * FROM table_flota WHERE status_unidad != 0";
		$sql = "SELECT * FROM table_flota";
		$request = $this->select_all($sql);
		return $request;
	}
	//funcion para traer todos los roles
	public function selectModelos(){
		$sql = "SELECT * FROM table_modelo";
		$request = $this->select_all($sql);
		return $request;
	}
	//funcion para traer todos los roles
	public function selectUnidad(){
		$sql = "SELECT * FROM table_flota";
		$request = $this->select_all($sql);
		return $request;
	}
	/**********************
	 * deshabilitar unidad
	**********************/
	public function statusUnidad(int $intIdUnidad, int $intStatus){
		$this->intIdUnidad = $intIdUnidad;
		$this->intStatus = $intStatus;
		$sql = "UPDATE table_flota SET status_unidad = ? WHERE id_flota = $this->intIdUnidad";
		$arrData = array($this->intStatus);
		$request = $this->update($sql,$arrData);
		if($this->intStatus == 1){
			$request = "1";
		}else{
			$request = "2";
		}
		return $request;
	}
	/**********************
	 * crear unidad
	***********************/
	
	public function insertUnidad(string $srtIdUnidad, string $srtMarcaUnidad, string $srtModelo, string $srtVim,string $srtFechaUnidad, int $srtCapacidad, string $srtTipoCombustible){
		//asignamos las propiedades a las variable
		$return = "";
		$this->srtIdUnidad = $srtIdUnidad;
		$this->srtMarcaUnidad = $srtMarcaUnidad;
		$this->srtModelo = $srtModelo;
		$this->srtVim = $srtVim;
		$this->srtFechaUnidad = $srtFechaUnidad;
		$this->srtCapacidad = $srtCapacidad;
		$this->srtTipoCombustible = $srtTipoCombustible;
		//seleccionamos todos los rol para comprobar que no exista
		$sql = "SELECT * FROM table_flota WHERE id_unidad = '{$this->srtIdUnidad}'";
		$request = $this->select_all($sql);
		//validar si ya existe si no hace el insert
		if(empty($request)){
			$sql_insert =  "INSERT INTO table_flota(id_unidad,marca_unidad,modelo_unidad,vim_unidad,fecha_creacion,cap_pasajero,tipo_combustible,status_unidad) VALUES (?,?,?,?,?,?,?,?)"; // se prepara el insert
			$arrData = array($this->srtIdUnidad,$this->srtMarcaUnidad,$this->srtModelo,$this->srtVim,$this->srtFechaUnidad,$this->srtCapacidad,$this->srtTipoCombustible,1);// armamos el array con los datos obtenidos
			$request_insert = $this->insert($sql_insert,$arrData);//enviamos el query y el array de datos 
			$return = $request_insert;//retorna el id insertado
		}else{
			$return = "exist";
		}
		return $return;
	}
	public function setIMantenimiento(int $srtListUnidad, string $srtRutaUnidad, string $srtOperador, string $srtMecanico, string $srtKilometraje,string $srtRadioTipo, string $srtFechaEntrada, string $srtHoraEntrada, string $srtDiagnostico, string $srtRecomendacion){
		// $this->intidUnidad = $intidUnidad; 
		$this->srtListUnidad = $srtListUnidad; 
		$this->srtRutaUnidad = $srtRutaUnidad; 
		$this->srtOperador = $srtOperador; 
		$this->srtMecanico = $srtMecanico; 
		$this->srtKilometraje = $srtKilometraje; 
		$this->srtFechaEntrada = $srtFechaEntrada; 
		$this->srtHoraEntrada = $srtHoraEntrada; 
		$this->srtDiagnostico = $srtDiagnostico; 
		$this->srtRecomendacion = $srtRecomendacion;
		$this->srtRadioTipo = $srtRadioTipo;
		$sql_insert = "INSERT INTO table_unidad_mantenimiento(id_flota, ruta_unidad, operardor_unidad, nomb_mecanico, km_unidad, tipo_mantenimiento, diagnostico, recomendacion, fecha_entrada, fecha_salida, status_mantenimiento) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
		$arrData = array($this->srtListUnidad,$this->srtRutaUnidad,$this->srtOperador,$this->srtMecanico,$this->srtKilometraje,$this->srtRadioTipo,$this->srtDiagnostico,$this->srtRecomendacion,$this->srtFechaEntrada.'/'.$this->srtHoraEntrada,'','1');
		$request_insert = $this->insert($sql_insert,$arrData);//enviamos el query y el array de datos
		return $request_insert;
	}
	public function selectFlotaMantenimiento(){
		$sql = "SELECT f.*, um.* FROM table_unidad_mantenimiento um INNER JOIN table_flota f ON f.id_flota = um.id_flota;";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectUnidadM(int $idFlota){
		$this->idFlota = $idFlota;
		$sql = "SELECT f.*, um.* FROM table_unidad_mantenimiento um INNER JOIN table_flota f ON f.id_flota = um.id_flota WHERE f.id_flota = $this->idFlota";
		$request = $this->select_all($sql);
		return $request;
	}
}