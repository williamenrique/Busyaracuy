<?php

class Unidad extends Controllers{
	public function __construct(){
		//invocar para que se ejecute el metodo de la herencia
		parent::__construct();
		session_start();
		if (empty($_SESSION['login'])) {
			header("Location:".base_url().'login');
		}
	}
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
}