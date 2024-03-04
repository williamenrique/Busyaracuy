<?php

class Home extends Controllers{
	public function __construct(){
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'dashboard');
		}
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
	}
	public function home(){
		//invocar la vista con views y usamos getView y pasamos parametros esta clase y la vista
		//incluimos un arreglo que contendra toda la informacion que se enviara al home
		$data['page_tag'] = "Dashboard - Tienda Virtual";
		$data['page_title'] = "Pagina Principal";
		$data['page_name'] = "home";
		$this->views->getViews($this, "home", $data);
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